<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lesson_title',
        'description',
        'level_id',
        'is_active',
        'order_index',
        'lesson_image',
        'created_at',
        'updated_at',
    ];

    /**
     * Return the public URL of the lesson cover image, or null.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->lesson_image
            ? asset('storage/' . $this->lesson_image)
            : null;
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }



    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
