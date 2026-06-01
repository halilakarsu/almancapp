<?php

namespace App\Listeners;

use App\Events\LessonCompleted;
use App\Services\BadgeService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AwardBadge
{
    protected $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }

    public function handle(LessonCompleted $event): void
    {
        $this->badgeService->checkAndAward($event->user);
    }
}
