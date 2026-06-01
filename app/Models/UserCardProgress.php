<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCardProgress extends Model
{
    protected $table = 'user_card_progress';

    protected $fillable = [
        'user_id',
        'card_id',
        'status',        // new | learning | known
        'correct_count',
        'wrong_count',
        'last_seen_at',
        'repetitions',
        'ease_factor',
        'interval_days',
        'next_review_at',
    ];

    protected $casts = [
        'last_seen_at'   => 'datetime',
        'next_review_at' => 'datetime',
        'ease_factor'    => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    /**
     * SM-2 Spaced Repetition – quality: 5=biliyorum, 1=bilmiyorum
     */
    public function review(bool $knew): void
    {
        $quality = $knew ? 5 : 1;

        $this->last_seen_at = now();

        if ($knew) {
            $this->correct_count++;

            if ($this->repetitions === 0) {
                $this->interval_days = 1;
            } elseif ($this->repetitions === 1) {
                $this->interval_days = 6;
            } else {
                $this->interval_days = (int) round($this->interval_days * $this->ease_factor);
            }
            $this->repetitions++;

            // SM-2 ease factor update
            $newEF = $this->ease_factor + (0.1 - (5 - $quality) * (0.08 + (5 - $quality) * 0.02));
            $this->ease_factor = max(1.3, $newEF);

            // Status progression
            if ($this->correct_count >= 3) {
                $this->status = 'known';
            } else {
                $this->status = 'learning';
            }
        } else {
            $this->wrong_count++;
            $this->repetitions   = 0;
            $this->interval_days = 1;

            $newEF = $this->ease_factor + (0.1 - (5 - $quality) * (0.08 + (5 - $quality) * 0.02));
            $this->ease_factor = max(1.3, $newEF);

            $this->status = 'learning';
        }

        $this->next_review_at = now()->addDays($this->interval_days);
        $this->save();
    }
}
