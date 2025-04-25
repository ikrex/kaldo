<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Feladatok listázása
     */
    public function index(Request $request)
    {
        // Szűrés
        $query = Task::query();

        // Csak befejezetlen feladatok vagy összes
        $showCompleted = $request->has('show_completed') ? $request->show_completed : false;
        if (!$showCompleted) {
            $query->where('is_completed', false);
        }

        // Szűrés dátum szerint
        if ($request->has('due_date')) {
            if ($request->due_date === 'today') {
                $query->whereDate('due_date', now()->toDateString());
            } elseif ($request->due_date === 'week') {
                $query->whereBetween('due_date', [now(), now()->addWeek()]);
            } elseif ($request->due_date === 'month') {
                $query->whereBetween('due_date', [now(), now()->addMonth()]);
            } elseif ($request->due_date === 'overdue') {
                $query->where('due_date', '<', now())->where('is_completed', false);
            }
        }

        // Rendezés
        $orderBy = $request->orderBy ?? 'due_date';
        $order = $request->order ?? 'asc';
        $query->orderBy($orderBy, $order);

        // Betöltjük a kapcsolódó kontakt üzeneteket
        $query->with('contactMessage');

        // Lapozás
        $tasks = $query->paginate(10);

        // Kapcsolati üzenetek listája az új feladat létrehozásához
        $contacts = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.tasks.index', compact('tasks', 'contacts'));
    }

    /**
     * Új feladat létrehozása
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'contact_message_id' => 'nullable|exists:contact_messages,id',
        ]);

        // Felhasználó ID hozzáadása
        $validated['user_id'] = Auth::id();

        Task::create($validated);

        return redirect()->back()->with('success', 'Feladat sikeresen létrehozva.');
    }

    /**
     * Feladat frissítése
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'contact_message_id' => 'nullable|exists:contact_messages,id',
        ]);

        $task->update($validated);

        return redirect()->back()->with('success', 'Feladat sikeresen frissítve.');
    }

    /**
     * Feladat törlése
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success', 'Feladat sikeresen törölve.');
    }

    /**
     * Feladat befejezettnek jelölése
     */
    public function complete(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();

        return redirect()->back()->with('success', 'Feladat sikeresen frissítve.');
    }
}
