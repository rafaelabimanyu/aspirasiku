<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'category_id', 'title', 'content', 'attachment', 'status', 'is_private', 'complaint_date'])]
class Complaint extends Model
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
            'is_private' => 'boolean',
            'complaint_date' => 'datetime',
        ];
    }

    /**
     * Get the user who created this complaint (masyarakat).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of this complaint.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the response (tanggapan) for this complaint.
     */
    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
