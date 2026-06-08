<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application landing page.
     */
    public function index()
    {
        // Get total statistics
        $stats = [
            'total_complaints' => Complaint::count(),
            'resolved_complaints' => Complaint::where('status', 'resolved')->count(),
            'total_users' => User::where('role', 'masyarakat')->count(),
        ];

        // Get latest public complaints (up to 6)
        $publicComplaints = Complaint::with(['user', 'category'])
            ->where('is_private', false)
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('stats', 'publicComplaints'));
    }
}
