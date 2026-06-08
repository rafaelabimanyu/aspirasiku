<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Store a newly created complaint in storage.
     */
    public function store(ComplaintRequest $request)
    {
        $data = $request->validated();
        
        $complaint = new Complaint();
        $complaint->user_id = Auth::id();
        $complaint->category_id = $data['category_id'];
        $complaint->title = $data['title'];
        $complaint->content = $data['content'];
        $complaint->is_private = $request->has('is_private') ? true : false;
        $complaint->complaint_date = now();
        $complaint->status = 'pending';

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('complaints', 'public');
            $complaint->attachment = $path;
        }

        $complaint->save();

        return redirect()->route('user.dashboard')->with('success', __('messages.complaint_submitted_success'));
    }

    /**
     * Display the specified complaint with its tracking timeline.
     */
    public function show($id)
    {
        $complaint = Complaint::with(['category', 'user', 'response', 'response.user'])->findOrFail($id);

        // Security check: If private, only the creator or admin/petugas can view
        $user = Auth::user();
        if ($complaint->is_private) {
            if (!$user || ($user->isMasyarakat() && $user->id !== $complaint->user_id)) {
                abort(403, __('messages.unauthorized_access'));
            }
        }

        return view('dashboard.complaints.show', compact('complaint'));
    }
}
