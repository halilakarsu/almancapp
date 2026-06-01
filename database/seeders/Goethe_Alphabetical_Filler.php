<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Word;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Test;
use App\Models\Question;

class Goethe_Alphabetical_Filler extends Seeder
{
    public function run(): void
    {
        $levels = [
            'A1' => Level::where('level_title', 'like', '%A1%')->first(),
            'A2' => Level::where('level_title', 'like', '%A2%')->first(),
            'B1' => Level::where('level_title', 'like', '%B1%')->first(),
        ];

        $alphabetData = [
            'A1' => [
                'Goethe A1: A-D Arası Kelimeler' => [
                    ['ab','itibaren'],['aber','ama/fakat'],['abfahren','hareket etmek'],['die Abfahrt','hareket/kalkış'],
                    ['abgeben','teslim etmek'],['abholen','gidip almak'],['der Absender','gönderen'],['Achtung','dikkat'],
                    ['anbieten','teklif etmek'],['das Angebot','teklif/indirim'],['anfangen','başlamak'],['anklicken','tıklamak'],
                    ['ankommen','varmak'],['die Ankunft','varış'],['ankreuzen','işaretlemek'],['anmachen','açmak (ışık/tv)'],
                    ['anmelden','kaydolmak'],['die Anmeldung','kayıt'],['anrufen','telefonla aramak'],['die Antwort','cevap']
                ],
                'Goethe A1: E-H Arası Kelimeler' => [
                    ['einsteigen','binmek (araç)'],['die Eltern','ebeveyn'],['empfehlen','tavsiye etmek'],['entschuldigen','özür dilemek'],
                    ['erklären','açıklamak'],['erlauben','izin vermek'],['erzählen','anlatmak'],['fahren','sürmek/gitmek'],
                    ['das Fahrrad','bisiklet'],['falsch','yanlış'],['feiern','kutlamak'],['fernsehen','tv izlemek'],
                    ['fertig','hazır/bitmiş'],['finden','bulmak'],['die Firma','şirket'],['fliegen','uçmak'],
                    ['das Formular','form'],['das Foto','fotoğraf'],['fragen','soru sormak'],['frei','serbest/boş']
                ]
            ],
            'A2' => [
                'Goethe A2: A-D Arası Kelimeler' => [
                    ['abgeben','teslim etmek'],['abschließen','kilitlemek/bitirmek'],['die Ahnung','fikir/sezi'],['aktiv','aktif'],
                    ['aktuell','güncel'],['ändern','değiştirmek'],['anders','farklı'],['anmelden','kaydolmak'],
                    ['ansehen','bakmak/izlemek'],['antworten','cevap vermek'],['der Anzug','takım elbise'],['die Apotheke','eczane'],
                    ['der Apparat','cihaz'],['arbeitslos','işsiz'],['ärgern','kızdırmak'],['arm','fakir'],
                    ['der Artikel','makale/artikel'],['auch','de/da'],['aufhören','bırakmak/sona ermek'],['aufpassen','dikkat etmek']
                ]
            ]
        ];

        $orderIndex = 500;

        foreach ($alphabetData as $lvlKey => $lessons) {
            $level = $levels[$lvlKey];
            if (!$level) continue;

            foreach ($lessons as $title => $words) {
                $lesson = Lesson::updateOrCreate(['lesson_title' => $title], [
                    'level_id' => $level->id,
                    'lesson_description_tr' => $title . ' Goethe Kelime Listesi',
                    'lesson_image' => 'assets/img/logo.png',
                    'order_index' => $orderIndex++,
                    'is_active' => true
                ]);

                foreach ($words as $idx => $w) {
                    Word::updateOrCreate(['lesson_id' => $lesson->id, 'word_german' => $w[0]], [
                        'word_turkish' => $w[1], 'order_index' => $idx + 1, 'is_active' => true
                    ]);
                }

                // Generic sentences for these alphabetical lists
                $ex = Exercise::updateOrCreate(['lesson_id' => $lesson->id], ['title' => $title . ' Alıştırmaları', 'is_active' => true]);
                $ex->items()->delete();
                foreach ($words as $idx => $w) {
                    ExerciseItem::create([
                        'exercise_id' => $ex->id,
                        'german' => 'Satz mit ' . $w[0] . ': Das ist wichtig.',
                        'turkish' => $w[0] . ' ile cümle: Bu önemlidir.',
                        'order_index' => $idx + 1
                    ]);
                }

                $test = Test::updateOrCreate(['lesson_id' => $lesson->id], ['test_title' => $title . ' Testi', 'is_active' => true]);
                $test->questions()->delete();
                foreach ($words as $idx => $w) {
                    $q = Question::create([
                        'lesson_id' => $lesson->id,
                        'question_text' => '"' . $w[1] . '" Almancada hangisidir?',
                        'question_type' => 'multiple_choice',
                        'explanation' => '',
                        'order_index' => $idx + 1,
                        'is_active' => true
                    ]);
                    $q->answers()->create(['answer_text' => $w[0], 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                    $wrongs = array_diff(array_column($words, 0), [$w[0]]);
                    shuffle($wrongs);
                    foreach (array_slice($wrongs, 0, 3) as $wi => $rw) {
                        $q->answers()->create(['answer_text' => $rw, 'is_correct' => false, 'order_index' => $wi + 2, 'is_active' => true]);
                    }
                    $test->questions()->attach($q->id, ['order_index' => $idx + 1]);
                }
                echo "OK: $title\n";
            }
        }
    }
}
