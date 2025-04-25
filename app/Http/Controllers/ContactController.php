<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Task;

class ContactController extends Controller
{
    /**
     * Kapcsolati üzenetek listázása
     */
    public function index(Request $request)
    {
        // Szűrés
        $query = ContactMessage::query();

        // Szűrés státusz szerint
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Szűrés olvasottság szerint
        if ($request->has('read')) {
            $isRead = $request->read === 'read';
            $query->where('is_read', $isRead);
        }

        // Keresés
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Rendezés
        $orderBy = $request->orderBy ?? 'created_at';
        $order = $request->order ?? 'desc';
        $query->orderBy($orderBy, $order);

        // Lapozás
        $contacts = $query->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Kapcsolati üzenet megtekintése
     */
    public function show(ContactMessage $contact)
    {
        // Jelöljük olvasottként
        if (!$contact->is_read) {
            $contact->is_read = true;
            $contact->save();
        }

        // Kapcsolódó feladatok
        $tasks = $contact->tasks()->orderBy('due_date')->get();

        return view('admin.contacts.show', compact('contact', 'tasks'));
    }

    /**
     * Kapcsolati üzenet frissítése
     */
    public function update(Request $request, ContactMessage $contact)
    {
        $validated = $request->validate([
            'notes' => 'nullable|string',
            'status' => 'required|string|in:new,in_progress,completed,archived',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.show', $contact)
            ->with('success', 'Kapcsolati üzenet sikeresen frissítve.');
    }

    /**
     * Kapcsolati üzenet törlése
     */
    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Kapcsolati üzenet sikeresen törölve.');
    }
}
