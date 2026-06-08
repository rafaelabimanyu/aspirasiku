<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['complaint_id', 'user_id', 'content', 'response_date'])]
class Response extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'response_date' => 'datetime',
        ];
    }

    /**
     * Get the complaint that this response belongs to.
     */
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    /**
     * Get the user (admin/petugas) who created this response.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the feedback rating given by the citizen for this response.
     */
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
