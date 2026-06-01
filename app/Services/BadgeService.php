<?php

namespace App\Services;

use App\Models\User;
use App\Models\Badge;

class BadgeService
{
    public function checkAndAward(User $user)
    {
        // 1. "İlk Adım" Rozeti (En az 1 ders tamamlayanlara)
        $completedLessons = $user->userProgress()->where('status', 'completed')->count();
        if ($completedLessons >= 1) {
            $this->awardBadge($user, 'İlk Adım', 'İlk dersini başarıyla tamamladın!');
        }

        // 2. "XP Avcısı" Rozeti (500 XP üzerine)
        if ($user->xp_points >= 500) {
            $this->awardBadge($user, 'XP Avcısı', '500 XP barajını aştın!');
        }

        // 3. "Bilge" Rozeti (Ders tamamlanma sayısı 5 ve üzeriyse)
        if ($completedLessons >= 5) {
            $this->awardBadge($user, 'Bilge', '5 farklı dersi devirdin.');
        }
    }

    private function awardBadge(User $user, string $name, string $description)
    {
        $badge = Badge::firstOrCreate(
            ['name' => $name],
            ['description' => $description, 'icon' => 'default_icon.png']
        );

        if (!$user->badges()->where('badge_id', $badge->id)->exists()) {
            $user->badges()->attach($badge->id);
            // Optionally flash message or log activity
        }
    }
}
