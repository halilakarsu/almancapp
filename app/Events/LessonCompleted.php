<?php

namespace App\Events;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LessonCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $lesson;

    public function __construct(User $user, Lesson $lesson)
    {
        $this->user = $user;
        $this->lesson = $lesson;
    }
}
