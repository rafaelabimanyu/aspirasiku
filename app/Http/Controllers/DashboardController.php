<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Admin dashboard view.
     */
    public function admin()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'process')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
        ];

        $recentComplaints = Complaint::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.admin', compact('stats', 'recentComplaints'));
    }

    /**
     * Petugas dashboard view.
     */
    public function petugas()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'process')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
        ];

        $recentComplaints = Complaint::with(['user', 'category'])
            ->whereIn('status', ['pending', 'process'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.petugas', compact('stats', 'recentComplaints'));
    }

    /**
     * User (Masyarakat) dashboard view.
     */
    public function user()
    {
        $user = Auth::user();
        
        $stats = [
            'total' => Complaint::where('user_id', $user->id)->count(),
            'pending' => Complaint::where('user_id', $user->id)->where('status', 'pending')->count(),
            'process' => Complaint::where('user_id', $user->id)->where('status', 'process')->count(),
            'resolved' => Complaint::where('user_id', $user->id)->where('status', 'resolved')->count(),
        ];

        $complaints = Complaint::with(['category', 'response'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard.user', compact('stats', 'complaints'));
    }
}
