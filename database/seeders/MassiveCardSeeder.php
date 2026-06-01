<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\Lesson;

class MassiveCardSeeder extends Seeder
{
    public function run(): void
    {
        $lessons = Lesson::all();
        
        $pools = [
            'modal' => [
                ['w' => 'können', 't' => 'yapabilmek'],
                ['w' => 'müssen', 't' => 'zorunda olmak'],
                ['w' => 'dürfen', 't' => 'izinli olmak'],
                ['w' => 'sollen', 't' => 'meli/malı'],
                ['w' => 'wollen', 't' => 'istemek'],
                ['w' => 'möchten', 't' => 'arzu etmek'],
                ['s' => 'Ich kann Deutsch sprechen.', 't' => 'Almanca konuşabiliyorum.'],
                ['s' => 'Du musst heute arbeiten.', 't' => 'Bugün çalışmalısın.'],
                ['s' => 'Darf ich hier rauchen?', 't' => 'Burada sigara içebilir miyim?'],
                ['s' => 'Soll ich das Fenster öffnen?', 't' => 'Pencereyi açmalı mıyım?'],
                ['s' => 'Ich will ein Auto kaufen.', 't' => 'Bir araba satın almak istiyorum.'],
                ['s' => 'Möchten Sie einen Kaffee?', 't' => 'Bir kahve ister misiniz?'],
            ],
            'verbs' => [
                ['w' => 'gehen', 't' => 'gitmek'],
                ['w' => 'kommen', 't' => 'gelmek'],
                ['w' => 'trinken', 't' => 'içmek'],
                ['w' => 'essen', 't' => 'yemek'],
                ['w' => 'schlafen', 't' => 'uyumak'],
                ['w' => 'laufen', 't' => 'koşmak'],
                ['w' => 'lernen', 't' => 'öğrenmek'],
                ['w' => 'schreiben', 't' => 'yazmak'],
                ['w' => 'lesen', 't' => 'okumak'],
                ['w' => 'hören', 't' => 'duymak/dinlemek'],
                ['s' => 'Ich gehe nach Hause.', 't' => 'Eve gidiyorum.'],
                ['s' => 'Wir trinken Wasser.', 't' => 'Su içiyoruz.'],
            ],
            'family' => [
                ['w' => 'Vater', 't' => 'baba'],
                ['w' => 'Mutter', 't' => 'anne'],
                ['w' => 'Sohn', 't' => 'oğul'],
                ['w' => 'Tochter', 't' => 'kız evlat'],
                ['w' => 'Bruder', 't' => 'erkek kardeş'],
                ['w' => 'Schwester', 't' => 'kız kardeş'],
                ['w' => 'Oma', 't' => 'büyükanne'],
                ['w' => 'Opa', 't' => 'büyükbaba'],
                ['w' => 'Onkel', 't' => 'amca/dayı'],
                ['w' => 'Tante', 't' => 'teyze/hala'],
            ],
            'numbers' => [
                ['w' => 'eins', 't' => 'bir'],
                ['w' => 'zwei', 't' => 'iki'],
                ['w' => 'drei', 't' => 'üç'],
                ['w' => 'zehn', 't' => 'on'],
                ['w' => 'elf', 't' => 'on bir'],
                ['w' => 'zwanzig', 't' => 'yirmi'],
                ['w' => 'hundert', 't' => 'yüz'],
                ['w' => 'tausend', 't' => 'bin'],
                ['s' => 'Ich habe zwei Brüder.', 't' => 'İki erkek kardeşim var.'],
                ['s' => 'Das kostet zehn Euro.', 't' => 'Bu on Euro.'],
            ],
            'professions' => [
                ['w' => 'Arzt', 't' => 'doktor'],
                ['w' => 'Lehrer', 't' => 'öğretmen'],
                ['w' => 'Ingenieur', 't' => 'mühendis'],
                ['w' => 'Kellner', 't' => 'garson'],
                ['w' => 'Bauer', 't' => 'çiftçi'],
                ['w' => 'Polizist', 't' => 'polis'],
                ['w' => 'Pilot', 't' => 'pilot'],
                ['w' => 'Koch', 't' => 'aşçı'],
                ['s' => 'Was bist du von Beruf?', 't' => 'Mesleğin nedir?'],
                ['s' => 'Ich arbeite als Lehrer.', 't' => 'Öğretmen olarak çalışıyorum.'],
            ],
            'time' => [
                ['w' => 'Montag', 't' => 'Pazartesi'],
                ['w' => 'Dienstag', 't' => 'Salı'],
                ['w' => 'Januar', 't' => 'Ocak'],
                ['w' => 'Februar', 't' => 'Şubat'],
                ['w' => 'Frühling', 't' => 'ilkbahar'],
                ['w' => 'Sommer', 't' => 'yaz'],
                ['w' => 'Uhr', 't' => 'saat'],
                ['w' => 'Minute', 't' => 'dakika'],
                ['s' => 'Wie spät ist es?', 't' => 'Saat kaç?'],
                ['s' => 'Es ist zwei Uhr.', 't' => 'Saat iki.'],
            ],
            'body' => [
                ['w' => 'Kopf', 't' => 'kafa'],
                ['w' => 'Hand', 't' => 'el'],
                ['w' => 'Bein', 't' => 'bacak'],
                ['w' => 'Auge', 't' => 'göz'],
                ['w' => 'Ohr', 't' => 'kulak'],
                ['w' => 'Mund', 't' => 'ağız'],
                ['w' => 'Nase', 't' => 'burun'],
                ['w' => 'Herz', 't' => 'kalp'],
                ['s' => 'Ich habe Kopfschmerzen.', 't' => 'Başım ağrıyor.'],
                ['s' => 'Das Herz schlägt.', 't' => 'Kalp atıyor.'],
            ],
            'house' => [
                ['w' => 'Haus', 't' => 'ev'],
                ['w' => 'Zimmer', 't' => 'oda'],
                ['w' => 'Küche', 't' => 'mutfak'],
                ['w' => 'Tisch', 't' => 'masa'],
                ['w' => 'Stuhl', 't' => 'sandalye'],
                ['w' => 'Bett', 't' => 'yatak'],
                ['w' => 'Fenster', 't' => 'pencere'],
                ['w' => 'Tür', 't' => 'kapı'],
                ['s' => 'Die Küche ist groß.', 't' => 'Mutfak büyük.'],
                ['s' => 'Ich bin zu Hause.', 't' => 'Evdeyim.'],
            ],
            'clothes' => [
                ['w' => 'Hemd', 't' => 'gömlek'],
                ['w' => 'Hose', 't' => 'pantolon'],
                ['w' => 'Schuh', 't' => 'ayakkabı'],
                ['w' => 'Mantel', 't' => 'manto'],
                ['w' => 'Hut', 't' => 'şapka'],
                ['w' => 'Kleid', 't' => 'elbise'],
                ['w' => 'Socken', 't' => 'çorap'],
                ['s' => 'Das Hemd ist blau.', 't' => 'Gömlek mavi.'],
                ['s' => 'Ich ziehe mich an.', 't' => 'Giyiniyorum.'],
            ],
            'general' => [
                ['w' => 'gut', 't' => 'iyi'],
                ['w' => 'schlecht', 't' => 'kötü'],
                ['w' => 'groß', 't' => 'büyük'],
                ['w' => 'klein', 't' => 'küçük'],
                ['w' => 'schnell', 't' => 'hızlı'],
                ['w' => 'langsam', 't' => 'yavaş'],
                ['w' => 'heute', 't' => 'bugün'],
                ['w' => 'morgen', 't' => 'yarın'],
                ['w' => 'hier', 't' => 'burada'],
                ['w' => 'dort', 't' => 'orada'],
                ['s' => 'Wie geht es dir?', 't' => 'Nasılsın?'],
                ['s' => 'Mir geht es gut.', 't' => 'İyiyim.'],
                ['s' => 'Vielen Dank.', 't' => 'Çok teşekkürler.'],
                ['s' => 'Kein Problem.', 't' => 'Sorun değil.'],
                ['s' => 'Ich verstehe.', 't' => 'Anlıyorum.'],
                ['s' => 'Das ist schön.', 't' => 'Bu güzel.'],
            ]
        ];

        foreach($lessons as $lesson) {
            $existingCount = Card::where('lesson_id', $lesson->id)->count();
            if ($existingCount >= 10) continue;
            
            $title = strtolower($lesson->lesson_title);
            $targetPool = 'general';
            
            if (str_contains($title, 'modal') || str_contains($title, 'möchten') || str_contains($title, 'wollen') || str_contains($title, 'sollen') || str_contains($title, 'dürfen') || str_contains($title, 'müssen')) {
                $targetPool = 'modal';
            } elseif (str_contains($title, 'familie') || str_contains($title, 'aile')) {
                $targetPool = 'family';
            } elseif (str_contains($title, 'sayı') || str_contains($title, 'number')) {
                $targetPool = 'numbers';
            } elseif (str_contains($title, 'meslek') || str_contains($title, 'job')) {
                $targetPool = 'professions';
            } elseif (str_contains($title, 'saat') || str_contains($title, 'zaman') || str_contains($title, 'gün') || str_contains($title, 'aylar')) {
                $targetPool = 'time';
            } elseif (str_contains($title, 'vücut') || str_contains($title, 'sağlık')) {
                $targetPool = 'body';
            } elseif (str_contains($title, 'ev') || str_contains($title, 'haus') || str_contains($title, 'eşya')) {
                $targetPool = 'house';
            } elseif (str_contains($title, 'kıyafet') || str_contains($title, 'kleidung')) {
                $targetPool = 'clothes';
            } elseif (str_contains($title, 'fiil') || str_contains($title, 'verben')) {
                $targetPool = 'verbs';
            }
            
            $poolData = $pools[$targetPool];
            // If pool is too small, mix with general
            if (count($poolData) < 10) {
                $poolData = array_merge($poolData, $pools['general']);
            }
            
            // Randomly shuffle to avoid same cards in all lessons
            shuffle($poolData);
            
            $needed = 10 - $existingCount;
            $added = 0;
            
            foreach($poolData as $item) {
                if ($added >= $needed) break;
                
                $german = isset($item['w']) ? $item['w'] : $item['s'];
                $turkish = $item['t'];
                $type = isset($item['w']) ? 'word' : 'sentence';
                
                // Check if card exists for THIS lesson to avoid duplicates
                $exists = Card::where('lesson_id', $lesson->id)
                             ->where('german_content', $german)
                             ->exists();
                
                if (!$exists) {
                    Card::create([
                        'lesson_id' => $lesson->id,
                        'type' => $type,
                        'german_content' => $german,
                        'turkish_content' => $turkish,
                        'difficulty' => rand(1, 2),
                        'is_active' => true,
                        'order_index' => $existingCount + $added + 1
                    ]);
                    $added++;
                }
            }
            
            // If still less than 10 (rare), add more from general
            if (($existingCount + $added) < 10) {
                $generalPool = $pools['general'];
                shuffle($generalPool);
                foreach($generalPool as $item) {
                    if (($existingCount + $added) >= 10) break;
                    $german = isset($item['w']) ? $item['w'] : $item['s'];
                    $exists = Card::where('lesson_id', $lesson->id)
                                 ->where('german_content', $german)
                                 ->exists();
                    if (!$exists) {
                        Card::create([
                            'lesson_id' => $lesson->id,
                            'type' => isset($item['w']) ? 'word' : 'sentence',
                            'german_content' => $german,
                            'turkish_content' => $item['t'],
                            'difficulty' => rand(1, 2),
                            'is_active' => true,
                            'order_index' => $existingCount + $added + 1
                        ]);
                        $added++;
                    }
                }
            }
        }
    }
}
