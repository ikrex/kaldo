<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Task;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function index()
    {
        // Összegző adatok
        $totalContacts = ContactMessage::count();
        $newContacts = ContactMessage::where('is_read', false)->count();
        $upcomingTasks = Task::where('is_completed', false)
            ->where('due_date', '>=', Carbon::now())
            ->orderBy('due_date')
            ->limit(5)
            ->get();
        $overdueTasks = Task::where('is_completed', false)
            ->where('due_date', '<', Carbon::now())
            ->orderBy('due_date')
            ->get();

        // Legújabb üzenetek
        $latestContacts = ContactMessage::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalContacts',
            'newContacts',
            'upcomingTasks',
            'overdueTasks',
            'latestContacts'
        ));
    }
}
