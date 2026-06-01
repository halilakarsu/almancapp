<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Content;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;

class A1LessonSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seviye Oluştur
        $level = Level::firstOrCreate([
            'level_title' => 'A1 Başlangıç Seviyesi'
        ], [
            'level_description' => 'Almancaya giriş seviyesi. Günlük hayat, restoran, yön sorma ve alışveriş gibi konularda temel beceriler kazanacaksınız.',
            'order_index' => 1,
            'is_active' => true
        ]);

        // 2. Kapsamlı Ders: Restoranda
        $lesson = Lesson::firstOrCreate([
            'lesson_title' => '2. Restoranda Sipariş Verme (Im Restaurant)'
        ], [
            'level_id' => $level->id,
            'lesson_description' => 'Bir restorana gittiğinizde menü isteme, yiyecek ve içecek sipariş etme, hesap ödeme ve temel yemek kelimelerini öğreneceksiniz.',
            'order_index' => 2,
            'is_active' => true
        ]);

        // 3. Uzun Kelime Listesi (Yemekler, İçecekler, Fiiller)
        $words = [
            ['word_german' => 'die Speisekarte', 'word_turkish' => 'Menü', 'word_description' => 'Restoranda yemek listesi.'],
            ['word_german' => 'der Kellner', 'word_turkish' => 'Garson (Erkek)', 'word_description' => 'Servis yapan erkek çalışan.'],
            ['word_german' => 'die Kellnerin', 'word_turkish' => 'Garson (Kadın)', 'word_description' => 'Servis yapan kadın çalışan.'],
            ['word_german' => 'das Wasser', 'word_turkish' => 'Su', 'word_description' => 'İçecek (das Mineralwasser = Maden suyu)'],
            ['word_german' => 'der Kaffee', 'word_turkish' => 'Kahve', 'word_description' => 'Sıcak içecek.'],
            ['word_german' => 'das Brot', 'word_turkish' => 'Ekmek', 'word_description' => 'Fırın ürünü.'],
            ['word_german' => 'der Salat', 'word_turkish' => 'Salata', 'word_description' => 'Soğuk başlangıç.'],
            ['word_german' => 'die Suppe', 'word_turkish' => 'Çorba', 'word_description' => 'Sıcak başlangıç.'],
            ['word_german' => 'essen', 'word_turkish' => 'Yemek (Fiil)', 'word_description' => 'Örn: Ich esse einen Apfel.'],
            ['word_german' => 'trinken', 'word_turkish' => 'İçmek (Fiil)', 'word_description' => 'Örn: Ich trinke Wasser.'],
            ['word_german' => 'bestellen', 'word_turkish' => 'Sipariş vermek', 'word_description' => 'Garsona isteğini iletmek.'],
            ['word_german' => 'die Rechnung', 'word_turkish' => 'Hesap', 'word_description' => 'Yemek sonrası ödenen tutar belgesi.'],
            ['word_german' => 'lecker', 'word_turkish' => 'Lezzetli', 'word_description' => 'Yemeğin tadı güzel olduğunda kullanılır.'],
            ['word_german' => 'das Hähnchen', 'word_turkish' => 'Tavuk', 'word_description' => 'Tavuk eti.'],
            ['word_german' => 'der Fisch', 'word_turkish' => 'Balık', 'word_description' => 'Deniz ürünü.'],
        ];

        foreach ($words as $i => $w) {
            Word::firstOrCreate(
                ['word_german' => $w['word_german'], 'lesson_id' => $lesson->id],
                [
                    'word_turkish' => $w['word_turkish'],
                    'word_description' => $w['word_description'],
                    'order_index' => $i + 1,
                    'is_active' => true
                ]
            );
        }

        // 4. Kapsamlı İçerikler ve Kalıplar
        $contents = [
            ['content_german' => 'Entschuldigung, die Speisekarte bitte!', 'content_turkish' => 'Afedersiniz, menüyü alabilir miyim lütfen?'],
            ['content_german' => 'Was möchten Sie trinken?', 'content_turkish' => 'Ne içmek istersiniz?'],
            ['content_german' => 'Ich hätte gern ein Wasser, bitte.', 'content_turkish' => 'Bir su alırdım, lütfen.'],
            ['content_german' => 'Ich trinke einen Kaffee.', 'content_turkish' => 'Ben bir kahve içeceğim.'],
            ['content_german' => 'Und was möchten Sie essen?', 'content_turkish' => 'Peki ne yemek istersiniz?'],
            ['content_german' => 'Ich nehme den Fisch mit Salat.', 'content_turkish' => 'Ben salatalı balık alacağım.'],
            ['content_german' => 'Ist das Essen lecker?', 'content_turkish' => 'Yemek lezzetli mi?'],
            ['content_german' => 'Ja, es ist sehr lecker!', 'content_turkish' => 'Evet, çok lezzetli!'],
            ['content_german' => 'Zahlen, bitte!', 'content_turkish' => 'Hesabı alabilir miyim, lütfen!'],
            ['content_german' => 'Zusammen oder getrennt?', 'content_turkish' => 'Birlikte mi yoksa ayrı ayrı mı (ödeyeceksiniz)?'],
            ['content_german' => 'Zusammen, bitte. Das macht 25 Euro.', 'content_turkish' => 'Birlikte lütfen. Toplam 25 Euro yapıyor.'],
        ];

        foreach ($contents as $i => $c) {
            Content::firstOrCreate(
                ['content_german' => $c['content_german'], 'lesson_id' => $lesson->id],
                [
                    'content_turkish' => $c['content_turkish'],
                    'order_index' => $i + 1,
                    'is_active' => true
                ]
            );
        }

        // 5. Bir sürü soru ekleyelim
        $questionsData = [
            [
                'q' => 'Garsonu çağırıp hesabı istemek için hangi kalıp kullanılır?',
                'answers' => [
                    ['a' => 'Zahlen, bitte!', 'c' => true],
                    ['a' => 'Hallo, wie geht es?', 'c' => false],
                    ['a' => 'Ein Wasser, bitte.', 'c' => false],
                    ['a' => 'Ich heiße Ali.', 'c' => false],
                ]
            ],
            [
                'q' => '"das Brot" kelimesinin Türkçe karşılığı nedir?',
                'answers' => [
                    ['a' => 'Ekmek', 'c' => true],
                    ['a' => 'Su', 'c' => false],
                    ['a' => 'Tavuk', 'c' => false],
                    ['a' => 'Balık', 'c' => false],
                ]
            ],
            [
                'q' => 'Garson size "Was möchten Sie trinken?" diye sorduğunda nasıl cevap verirsiniz?',
                'answers' => [
                    ['a' => 'Ich hätte gern ein Wasser, bitte.', 'c' => true],
                    ['a' => 'Zusammen, bitte.', 'c' => false],
                    ['a' => 'Die Speisekarte, bitte.', 'c' => false],
                    ['a' => 'Das Essen ist lecker.', 'c' => false],
                ]
            ],
            [
                'q' => '"die Rechnung" ne anlama gelir?',
                'answers' => [
                    ['a' => 'Garson', 'c' => false],
                    ['a' => 'Hesap', 'c' => true],
                    ['a' => 'Menü', 'c' => false],
                    ['a' => 'Salata', 'c' => false],
                ]
            ],
            [
                'q' => 'Eğer yemek çok lezzetliyse garsona ne söylersiniz?',
                'answers' => [
                    ['a' => 'Es ist sehr lecker!', 'c' => true],
                    ['a' => 'Getrennt, bitte!', 'c' => false],
                    ['a' => 'Ich esse Fisch.', 'c' => false],
                    ['a' => 'Die Speisekarte.', 'c' => false],
                ]
            ]
        ];

        $createdQuestions = [];

        foreach ($questionsData as $idx => $qData) {
            $q = Question::firstOrCreate([
                'question_text' => $qData['q'],
                'lesson_id' => $lesson->id
            ], [
                'question_type' => 'multiple_choice',
                'order_index' => $idx + 1,
                'is_active' => true,
                'explanation' => '',
                'media_url' => ''
            ]);

            if ($q->wasRecentlyCreated || $q->answers()->count() === 0) {
                // Remove existing to avoid duplicates if re-running
                $q->answers()->delete();
                foreach ($qData['answers'] as $aIdx => $ans) {
                    $q->answers()->create([
                        'answer_text' => $ans['a'],
                        'is_correct' => $ans['c'],
                        'order_index' => $aIdx + 1,
                        'is_active' => true
                    ]);
                }
            }
            $createdQuestions[$q->id] = ['order_index' => $idx + 1];
        }

        // 6. Kapsamlı Test
        $test = Test::firstOrCreate([
            'test_title' => 'Bölüm Sonu Değerlendirmesi: Restoranda',
            'lesson_id' => $lesson->id
        ], [
            'description' => 'Restoranda sipariş verme, kelime haznesi ve diyalog kurma becerilerinizi ölçecek 5 soruluk detaylı test.',
            'is_active' => true
        ]);

        if (!empty($createdQuestions)) {
            $test->questions()->sync($createdQuestions);
        }
    }
}
