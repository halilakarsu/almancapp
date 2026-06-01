<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'type',           // 'word' | 'sentence' | 'match' | 'scramble' | 'fill' | 'write'
        'german_content',
        'turkish_content',
        'image',
        'audio',
        'difficulty',     // 1=kolay, 2=orta, 3=zor
        'is_active',
        'order_index',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'difficulty' => 'integer',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserCardProgress::class);
    }

    public function progressFor($userId)
    {
        return $this->userProgress()->where('user_id', $userId)->first();
    }

    public function getDifficultyLabelAttribute(): string
    {
        return match ($this->difficulty) {
            1 => 'Kolay',
            2 => 'Orta',
            3 => 'Zor',
            default => 'Orta',
        };
    }
}
