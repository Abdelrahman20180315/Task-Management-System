<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = auth()->user()->tasks()->count();
        $completedTasks = auth()->user()->tasks()->where('status', 'completed')->count();
        $pendingTasks = auth()->user()->tasks()->where('status', 'pending')->count();

        return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks'));
    }
}
