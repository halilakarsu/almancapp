<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Content;
use App\Models\Question;
use App\Models\Test;

class GoetheA1Seeder extends Seeder
{
    public function run(): void
    {
        // Seviye Oluştur Veya Bul
        $level = Level::firstOrCreate([
            'level_title' => 'A1 Başlangıç Seviyesi'
        ], [
            'level_description' => 'Almancaya giriş seviyesi. Günlük hayat, restoran, yön sorma ve alışveriş gibi konularda temel beceriler.',
            'order_index' => 1,
            'is_active' => true
        ]);

        // Ders Oluştur
        $lesson = Lesson::firstOrCreate([
            'lesson_title' => '3. Goethe Institut A1: Kelimeler ve Örnek Cümleler (A-B)'
        ], [
            'level_id' => $level->id,
            'lesson_description' => 'Goethe-Zertifikat A1 resmi kelime listesinden derlenmiş A ve B harfi ile başlayan kelimeler ile temel cümle kalıpları.',
            'order_index' => 3,
            'is_active' => true
        ]);

        // Goethe A1 Kelime Listesi
        $words = [
            ['w' => 'ab', 't' => '-den itibaren', 'd' => 'Zaman veya yer başlangıcı belirtir.'],
            ['w' => 'aber', 't' => 'ama, fakat', 'd' => 'Zıtlık bağlacı.'],
            ['w' => 'abfahren', 't' => 'kalkmak (taşıt)', 'd' => 'Tren, otobüs vb. araçların hareketi.'],
            ['w' => 'die Abfahrt', 't' => 'Kalkış', 'd' => 'Araç hareket saati veya yeri.'],
            ['w' => 'abholen', 't' => 'gidip almak, karşılamak', 'd' => 'Birini istasyondan veya bir yerden almak.'],
            ['w' => 'die Adresse', 't' => 'Adres', 'd' => 'İletişim bilgisi.'],
            ['w' => 'alle', 't' => 'herkes, hepsi', 'd' => 'Tüm kişiler veya eşyalar.'],
            ['w' => 'allein', 't' => 'yalnız', 'd' => 'Tek başına olmak.'],
            ['w' => 'also', 't' => 'öyleyse, demek ki', 'd' => 'Sonuç bağlacı.'],
            ['w' => 'alt', 't' => 'yaşlı, eski', 'd' => 'Yaş veya eşyanın durumu.'],
            ['w' => 'das Alter', 't' => 'Yaş', 'd' => 'Kaç yaşında olunduğu durumu.'],
            ['w' => 'anfangen', 't' => 'başlamak', 'd' => 'Bir işe veya eyleme başlamak.'],
            ['w' => 'der Anfang', 't' => 'Başlangıç', 'd' => 'Bir şeyin başı.'],
            ['w' => 'ankommen', 't' => 'varmak, ulaşmak', 'd' => 'Bir yere varış.'],
            ['w' => 'die Ankunft', 't' => 'Varış', 'd' => 'Verme anı veya saati.'],
            ['w' => 'anrufen', 't' => 'telefon etmek', 'd' => 'Birini aramak.'],
            ['w' => 'der Anruf', 't' => 'Telefon görüşmesi / Arama', 'd' => 'Gelen veya giden arama.'],
            ['w' => 'die Antwort', 't' => 'Cevap, yanıt', 'd' => 'Soruya verilen karşılık.'],
            ['w' => 'antworten', 't' => 'cevap vermek', 'd' => 'Yanıtlamak.'],
            ['w' => 'arbeiten', 't' => 'çalışmak', 'd' => 'İş yapmak.'],
            ['w' => 'die Arbeit', 't' => 'İş', 'd' => 'Meslek veya çalışma.'],
            ['w' => 'der Arzt', 't' => 'Doktor (Erkek)', 'd' => 'Hekim.'],
            ['w' => 'auch', 't' => 'de, da (dahi)', 'd' => 'Ayrıca anlamında.'],
            ['w' => 'auf', 't' => 'üzerinde', 'd' => 'Yer belirteci (Temas var).'],
            ['w' => 'aufstehen', 't' => 'ayağa kalkmak, uyanmak', 'd' => 'Yataktan veya koltuktan kalkmak.'],
            ['w' => 'das Auge', 't' => 'Göz', 'd' => 'Görme organı.'],
            ['w' => 'aus', 't' => '-den, -dan (İçinden)', 'd' => 'Bir yerden veya ülkeden çıkış.'],
            ['w' => 'der Ausflug', 't' => 'Gezi, tur', 'd' => 'Günübirlik seyahat.'],
            ['w' => 'ausfüllen', 't' => 'doldurmak', 'd' => 'Form doldurmak.'],
            ['w' => 'das Auto', 't' => 'Araba', 'd' => 'Otomobil.'],
            ['w' => 'baden', 't' => 'yıkanmak, banyo yapmak', 'd' => 'Suda yüzmek veya yıkanmak.'],
            ['w' => 'der Bahnhof', 't' => 'Tren istasyonu', 'd' => 'Trenlerin kalkış yeri.'],
            ['w' => 'der Bahnsteig', 't' => 'Peron', 'd' => 'İstasyonda binilecek alan.'],
            ['w' => 'bald', 't' => 'yakında', 'd' => 'Kısa süre içinde.'],
            ['w' => 'die Bank', 't' => 'Banka / Bank', 'd' => 'Finans kurumu veya oturak.'],
        ];

        foreach ($words as $i => $w) {
            Word::firstOrCreate(
                ['word_german' => $w['w'], 'lesson_id' => $lesson->id],
                [
                    'word_turkish' => $w['t'],
                    'word_description' => $w['d'],
                    'order_index' => $i + 1,
                    'is_active' => true
                ]
            );
        }

        // Goethe A1 Örnek Cümleler Listesi
        $contents = [
            ['g' => 'Ab hier bitte langsam fahren.', 't' => 'Buradan itibaren lütfen yavaş sürün.'],
            ['g' => 'Heute kann ich nicht, aber morgen.', 't' => 'Bugün yapamam, ama yarın olur.'],
            ['g' => 'Der Zug fährt um 8.00 Uhr ab.', 't' => 'Tren saat 8.00\'de kalkıyor.'],
            ['g' => 'Vor der Abfahrt rufe ich an.', 't' => 'Kalkıştan önce arayacağım.'],
            ['g' => 'Wann holst du mich ab?', 't' => 'Beni ne zaman alacaksın?'],
            ['g' => 'Haben Sie meine Adresse?', 't' => 'Adresim sizde var mı?'],
            ['g' => 'Sind alle da?', 't' => 'Herkes burada mı?'],
            ['g' => 'Er kommt allein.', 't' => 'O yalnız geliyor.'],
            ['g' => 'Also, bis morgen!', 't' => 'Öyleyse, yarına kadar (görüşürüz)!'],
            ['g' => 'Wie alt sind Sie?', 't' => 'Kaç yaşındasınız?'],
            ['g' => 'Mein Auto ist schon sehr alt.', 't' => 'Arabam zaten çok eski.'],
            ['g' => 'Der Unterricht fängt gleich an.', 't' => 'Ders birazdan başlıyor.'],
            ['g' => 'Wann kommst du an?', 't' => 'Ne zaman varıyorsun?'],
            ['g' => 'Ich rufe dich morgen an.', 't' => 'Seni yarın arayacağım.'],
            ['g' => 'Er gibt keine Antwort.', 't' => 'O hiçbir cevap vermiyor.'],
            ['g' => 'Wo arbeiten Sie?', 't' => 'Nerede çalışıyorsunuz?'],
            ['g' => 'Morgen habe ich viel Arbeit.', 't' => 'Yarın çok işim var.'],
            ['g' => 'Ich bin krank. Ich muss zum Arzt.', 't' => 'Hastayım. Doktora gitmeliyim.'],
            ['g' => 'Ich stehe jeden Tag um 7 Uhr auf.', 't' => 'Her gün saat 7\'de kalkarım.'],
            ['g' => 'Er kommt aus der Türkei.', 't' => 'O, Türkiye\'den geliyor.'],
            ['g' => 'Bitte füllen Sie dieses Formular aus.', 't' => 'Lütfen bu formu doldurun.'],
        ];

        foreach ($contents as $i => $c) {
            Content::firstOrCreate(
                ['content_german' => $c['g'], 'lesson_id' => $lesson->id],
                [
                    'content_turkish' => $c['t'],
                    'order_index' => $i + 1,
                    'is_active' => true
                ]
            );
        }

        // Test ve Sorular
        $questionsData = [
            [
                'q' => '"Ab hier bitte langsam fahren." cümlesinin anlamı nedir?',
                'answers' => [
                    ['a' => 'Buradan itibaren lütfen yavaş sürün.', 'c' => true],
                    ['a' => 'Lütfen hızlı gitmeyin.', 'c' => false],
                    ['a' => 'Tren kalkmak üzere.', 'c' => false],
                    ['a' => 'Arabam çok eski.', 'c' => false],
                ]
            ],
            [
                'q' => '"abholen" fiili ne anlama gelmektedir?',
                'answers' => [
                    ['a' => 'Gidip almak, karşılamak', 'c' => true],
                    ['a' => 'Ayağa kalkmak', 'c' => false],
                    ['a' => 'Cevap vermek', 'c' => false],
                    ['a' => 'Telefon etmek', 'c' => false],
                ]
            ],
            [
                'q' => '"Hastayım, doktora gitmeliyim." cümlesinin Goethe A1 listesine göre çevirisi nasıldır?',
                'answers' => [
                    ['a' => 'Ich bin krank. Ich muss zum Arzt.', 'c' => true],
                    ['a' => 'Wo arbeiten Sie?', 'c' => false],
                    ['a' => 'Er kommt aus der Türkei.', 'c' => false],
                    ['a' => 'Wann kommst du an?', 'c' => false],
                ]
            ],
            [
                'q' => 'Almancada form doldurmak eylemi hangi fiil ile ifade edilir?',
                'answers' => [
                    ['a' => 'ausfüllen', 'c' => true],
                    ['a' => 'anfangen', 'c' => false],
                    ['a' => 'aufstehen', 'c' => false],
                    ['a' => 'arbeiten', 'c' => false],
                ]
            ],
            [
                'q' => 'Trenin kalkışını bildiren doğru cümle hangisidir?',
                'answers' => [
                    ['a' => 'Der Zug fährt um 8.00 Uhr ab.', 'c' => true],
                    ['a' => 'Vor der Abfahrt rufe ich an.', 'c' => false],
                    ['a' => 'Der Unterricht fängt an.', 'c' => false],
                    ['a' => 'Er kommt allein.', 'c' => false],
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

        // Goethe A1 Test
        $test = Test::firstOrCreate([
            'test_title' => 'Goethe A1: A-B Harfleri Deneme Sınavı',
            'lesson_id' => $lesson->id
        ], [
            'description' => 'Goethe-Institut A1 sertifika sınavında sıkça çıkan A ve B harfi ile başlayan kelimelerden derlenmiş değerlendirme sınavı.',
            'is_active' => true
        ]);

        if (!empty($createdQuestions)) {
            $test->questions()->sync($createdQuestions);
        }
    }
}
