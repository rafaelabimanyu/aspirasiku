<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'description'])]
class Category extends Model
{
    use HasFactory;

    /**
     * Get the complaints under this category.
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
