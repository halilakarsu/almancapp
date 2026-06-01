<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Test;
use App\Models\Question;

class A1_ABC_Filler_Seeder extends Seeder
{
    public function run(): void
    {
        $lessons = Lesson::whereHas('level', function($q) { 
            $q->where('level_title', 'like', '%A1%'); 
        })->get();

        foreach ($lessons as $l) {
            $this->fillWords($l);
            $this->fillExercises($l);
            $this->fillTests($l);
        }
    }

    private function fillWords($l)
    {
        $count = $l->words()->count();
        if ($count >= 20) return;

        $needed = 20 - $count;
        for ($i = 0; $i < $needed; $i++) {
            Word::create([
                'lesson_id' => $l->id,
                'word_german' => 'Extra Wort ' . ($i + 1) . ' für ' . $l->lesson_title,
                'word_turkish' => $l->lesson_title . ' için ek kelime ' . ($i + 1),
                'order_index' => $count + $i + 1,
                'is_active' => true
            ]);
        }
    }

    private function fillExercises($l)
    {
        $exercise = Exercise::firstOrCreate(
            ['lesson_id' => $l->id],
            ['title' => $l->lesson_title . ' Alıştırmaları', 'order_index' => 1, 'is_active' => true]
        );
        
        $count = $exercise->items()->count();
        if ($count >= 20) return;

        $needed = 20 - $count;
        for ($i = 0; $i < $needed; $i++) {
            ExerciseItem::create([
                'exercise_id' => $exercise->id,
                'german' => 'Das ist ein Beispielsatz ' . ($i + 1) . ' für ' . $l->lesson_title . '.',
                'turkish' => $l->lesson_title . ' için örnek cümle ' . ($i + 1) . '.',
                'order_index' => $count + $i + 1
            ]);
        }
    }

    private function fillTests($l)
    {
        $test = Test::firstOrCreate(
            ['lesson_id' => $l->id],
            ['test_title' => $l->lesson_title . ' Testi', 'description' => 'Pekiştirme testi.', 'is_active' => true]
        );

        $count = $test->questions()->count();
        if ($count >= 20) return;

        $needed = 20 - $count;
        for ($i = 0; $i < $needed; $i++) {
            $q = Question::create([
                'lesson_id' => $l->id,
                'question_text' => $l->lesson_title . ' ile ilgili soru ' . ($i + 1) . '?',
                'question_type' => 'multiple_choice',
                'explanation' => '',
                'order_index' => $count + $i + 1,
                'is_active' => true
            ]);

            $q->answers()->create(['answer_text' => 'Doğru Cevap', 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
            $q->answers()->create(['answer_text' => 'Yanlış 1', 'is_correct' => false, 'order_index' => 2, 'is_active' => true]);
            $q->answers()->create(['answer_text' => 'Yanlış 2', 'is_correct' => false, 'order_index' => 3, 'is_active' => true]);
            $q->answers()->create(['answer_text' => 'Yanlış 3', 'is_correct' => false, 'order_index' => 4, 'is_active' => true]);

            $test->questions()->attach($q->id, ['order_index' => $count + $i + 1]);
        }
    }
}
