<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Content;
use App\Models\Question;
use App\Models\Test;

class GoetheA1Part2Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'A1 Başlangıç Seviyesi'
        ], [
            'level_description' => 'Almancaya giriş seviyesi. Günlük hayat, restoran, yön sorma ve alışveriş gibi konularda temel beceriler.',
            'order_index' => 1,
            'is_active' => true
        ]);

        $lesson = Lesson::firstOrCreate([
            'lesson_title' => '4. Goethe Institut A1: Kelimeler ve Örnek Cümleler (C-F)'
        ], [
            'level_id' => $level->id,
            'lesson_description' => 'Goethe-Zertifikat A1 resmi kelime listesinden derlenmiş C, D, E ve F harfleri ile başlayan kelimeler ve örnek cümleler.',
            'order_index' => 4,
            'is_active' => true
        ]);

        // Goethe A1 Kelime Listesi (C, D, E, F)
        $words = [
            // C
            ['w' => 'das Café', 't' => 'Kafe', 'd' => 'Kahve ve hafif yiyeceklerin satıldığı yer.'],
            ['w' => 'der Computer', 't' => 'Bilgisayar', 'd' => 'Elektronik bilgi işlem cihazı.'],
            // D
            ['w' => 'da', 't' => 'orada, burada', 'd' => 'Bir şeyin mevcudiyetini veya yerini belirtir.'],
            ['w' => 'die Dame', 't' => 'Bayan', 'd' => 'Kadın (Kibar hitap).'],
            ['w' => 'daneben', 't' => 'yanında', 'd' => 'Hemen bitişiğinde.'],
            ['w' => 'danke', 't' => 'teşekkür ederim', 'd' => 'Minnettarlık ifadesi.'],
            ['w' => 'dann', 't' => 'sonra, ondan sonra', 'd' => 'Zaman veya sıra belirtir.'],
            ['w' => 'das Datum', 't' => 'Tarih', 'd' => 'Gün, ay, yıl bilgisi.'],
            ['w' => 'dein', 't' => 'senin', 'd' => 'İyelik zamiri (Sen).'],
            ['w' => 'denken', 't' => 'düşünmek', 'd' => 'Fikir yürütmek.'],
            ['w' => 'deutlich', 't' => 'açık, net, anlaşılır', 'd' => 'Kolayca anlaşılan (konuşma vb).'],
            ['w' => 'dieser', 't' => 'bu', 'd' => 'İşaret zamiri.'],
            ['w' => 'das Ding', 't' => 'Şey, nesne', 'd' => 'Belirsiz veya bilinen cansız varlık.'],
            ['w' => 'dort', 't' => 'orada', 'd' => 'Uzakta bir yer belirtir.'],
            ['w' => 'draußen', 't' => 'dışarıda', 'd' => 'Kapalı alanın dışında.'],
            ['w' => 'drucken', 't' => 'yazdırmak (yazıcı)', 'd' => 'Yazıcıdan çıktı almak.'],
            ['w' => 'durch', 't' => 'içinden, aracılığıyla', 'd' => 'Bir şeyin bir ucundan diğerine (örn: parkın içinden).'],
            ['w' => 'dürfen', 't' => 'izinli olmak, yapabilmek', 'd' => 'Bir şeyi yapmaya izni olmak.'],
            ['w' => 'der Durst', 't' => 'Susuzluk', 'd' => 'Su içme isteği.'],
            // E
            ['w' => 'ebenfalls', 't' => 'aynı şekilde, bilmukabele', 'd' => 'Size de (örn: iyi günler dileyene karşı).'],
            ['w' => 'die Ecke', 't' => 'Köşe', 'd' => 'Sokak veya oda köşesi.'],
            ['w' => 'das Ei', 't' => 'Yumurta', 'd' => 'Tavuk vb. yumurtası.'],
            ['w' => 'eilig', 't' => 'acele', 'd' => 'Acil olan durum.'],
            ['w' => 'ein', 't' => 'bir', 'd' => 'Belirsiz artikel.'],
            ['w' => 'einkaufen', 't' => 'alışveriş yapmak', 'd' => 'Mağazadan bir şeyler almak.'],
            ['w' => 'einladen', 't' => 'davet etmek', 'd' => 'Birini bir yere çağırmak.'],
            ['w' => 'die Einladung', 't' => 'Davetiye, davet', 'd' => 'Davet belgesi veya eylemi.'],
            ['w' => 'einmal', 't' => 'bir kez', 'd' => 'Sadece bir defa.'],
            ['w' => 'einsteigen', 't' => 'binmek (taşıta)', 'd' => 'Araca, trene vb. binmek.'],
            ['w' => 'der Eintritt', 't' => 'Giriş (ücreti)', 'd' => 'Bir yere girme hakkı veya parası.'],
            // F
            ['w' => 'fahren', 't' => 'sürmek, gitmek (taşıtla)', 'd' => 'Araçla seyahat etmek.'],
            ['w' => 'die Fahrkarte', 't' => 'Bilet (yolculuk)', 'd' => 'Seyahat bileti.'],
            ['w' => 'das Fahrrad', 't' => 'Bisiklet', 'd' => 'İki tekerlekli motorsuz taşıt.'],
            ['w' => 'falsch', 't' => 'yanlış', 'd' => 'Doğru olmayan.'],
            ['w' => 'die Familie', 't' => 'Aile', 'd' => 'Anne, baba, çocuk vb.'],
            ['w' => 'finden', 't' => 'bulmak', 'd' => 'Arayıp ulaşmak veya fikrinde olmak.'],
            ['w' => 'der Fisch', 't' => 'Balık', 'd' => 'Su canlısı / Yemek.'],
            ['w' => 'fliegen', 't' => 'uçmak', 'd' => 'Uçakla seyahat etmek.'],
            ['w' => 'das Flugzeug', 't' => 'Uçak', 'd' => 'Hava taşıtı.'],
            ['w' => 'das Formular', 't' => 'Form', 'd' => 'Doldurulacak belge.'],
            ['w' => 'das Foto', 't' => 'Fotoğraf', 'd' => 'Resim, kare.'],
            ['w' => 'fragen', 't' => 'sormak', 'd' => 'Soru yöneltmek.'],
            ['w' => 'die Frau', 't' => 'Kadın / Bayan', 'd' => 'Kadın (Hitap).'],
            ['w' => 'frei', 't' => 'boş, serbest, bedava', 'd' => 'Dolu olmayan veya ücretsiz.'],
            ['w' => 'die Freizeit', 't' => 'Boş zaman', 'd' => 'İş dışındaki zaman.'],
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
            ['g' => 'Kommen Sie bitte ins Café.', 't' => 'Lütfen kafeye gelin.'],
            ['g' => 'Wann bist du wieder da?', 't' => 'Ne zaman tekrar burada olacaksın?'],
            ['g' => 'Sehr geehrte Damen und Herren...', 't' => 'Saygıdeğer Hanımefendiler ve Beyefendiler...'],
            ['g' => 'Du siehst die Post. Daneben ist die Bank.', 't' => 'Postaneyi görüyorsun. Banka onun yanında.'],
            ['g' => 'Ich mache erst meine Hausaufgaben, dann spiele ich.', 't' => 'Önce ödevlerimi yapacağım, sonra oynayacağım.'],
            ['g' => 'Bitte schreiben Sie das Datum auf das Formular.', 't' => 'Lütfen forma tarihi yazın.'],
            ['g' => 'Ist das dein Auto?', 't' => 'Bu senin araban mı?'],
            ['g' => 'Sprechen Sie bitte deutlich.', 't' => 'Lütfen anlaşılır/net konuşun.'],
            ['g' => 'Dieses Auto ist zu teuer.', 't' => 'Bu araba çok pahalı.'],
            ['g' => 'Wir warten draußen auf dich.', 't' => 'Seni dışarıda bekliyoruz.'],
            ['g' => 'Gehen Sie durch diese Straße.', 't' => 'Bu sokağın içinden (boyunca) gidin.'],
            ['g' => 'Hier dürfen Sie nicht rauchen.', 't' => 'Burada sigara içmenize izin yok (içemezsiniz).'],
            ['g' => 'Ich habe großen Durst.', 't' => 'Çok susadım (Büyük susuzluğum var).'],
            ['g' => 'Schönes Wochenende! - Danke, ebenfalls.', 't' => 'İyi hafta sonları! - Teşekkürler, size de (bilmukabele).'],
            ['g' => 'Gehen Sie hier um die Ecke.', 't' => 'Buradan köşeyi dönün.'],
            ['g' => 'Ich habe es sehr eilig.', 't' => 'Çok acelem var.'],
            ['g' => 'Ich lade dich zu meiner Party ein.', 't' => 'Seni partime davet ediyorum.'],
            ['g' => 'Diese Medizin müssen Sie einmal am Tag nehmen.', 't' => 'Bu ilacı günde bir kez almalısınız.'],
            ['g' => 'Bitte schnell einsteigen, der Zug fährt ab.', 't' => 'Lütfen hızlıca binin, tren kalkıyor.'],
            ['g' => 'Der Eintritt kostet 5 Euro.', 't' => 'Giriş ücreti 5 Euro.'],
            ['g' => 'Ich fahre mit dem Zug nach Berlin.', 't' => 'Berlin\'e trenle gidiyorum.'],
            ['g' => 'Das ist leider falsch.', 't' => 'Bu maalesef yanlış.'],
            ['g' => 'Ich finde das Bild sehr schön.', 't' => 'Bu resmi çok güzel buluyorum.'],
            ['g' => 'Der Platz ist noch frei.', 't' => 'Bu yer (koltuk) hala boş.'],
            ['g' => 'Was machst du in deiner Freizeit?', 't' => 'Boş zamanında ne yaparsın?'],
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

        // Test ve Sorular (Açıklamalı/Çevirili)
        $questionsData = [
            [
                'q' => '"Gehen Sie hier um die Ecke." cümlesi yön soran birine ne söyler?',
                'answers' => [
                    ['a' => 'Buradan köşeyi dönün.', 'c' => true],
                    ['a' => 'Düz devam edin.', 'c' => false],
                    ['a' => 'Yolun karşısına geçin.', 'c' => false],
                    ['a' => 'Geri dönün.', 'c' => false],
                ]
            ],
            [
                'q' => 'Biri size "Schönes Wochenende!" (İyi hafta sonları) derse, Goethe A1 listesindeki kelimelere göre "Size de" demek için hangisini kullanırsınız?',
                'answers' => [
                    ['a' => 'Danke, ebenfalls.', 'c' => true],
                    ['a' => 'Das ist falsch.', 'c' => false],
                    ['a' => 'Ich habe es eilig.', 'c' => false],
                    ['a' => 'Bitte schnell einsteigen.', 'c' => false],
                ]
            ],
            [
                'q' => 'Trene binen yolculara "Lütfen hızlıca binin, tren kalkıyor." demek için hangi cümle kullanılır?',
                'answers' => [
                    ['a' => 'Bitte schnell einsteigen, der Zug fährt ab.', 'c' => true],
                    ['a' => 'Wir warten draußen auf dich.', 'c' => false],
                    ['a' => 'Hier dürfen Sie nicht rauchen.', 'c' => false],
                    ['a' => 'Ich fahre mit dem Zug nach Berlin.', 'c' => false],
                ]
            ],
            [
                'q' => '"Hier dürfen Sie nicht rauchen." tabelasını gören biri ne anlamalıdır?',
                'answers' => [
                    ['a' => 'Burada sigara içmek yasaktır / izin yoktur.', 'c' => true],
                    ['a' => 'Burada sigara içebilirsiniz.', 'c' => false],
                    ['a' => 'Burada beklemeniz gerekiyor.', 'c' => false],
                    ['a' => 'Giriş ücreti ödemelisiniz.', 'c' => false],
                ]
            ],
            [
                'q' => 'Goethe sertifika sınavında "Der Eintritt kostet 5 Euro." cümlesini duyarsanız ne isteniyordur?',
                'answers' => [
                    ['a' => 'Giriş için 5 Euro ödemeniz.', 'c' => true],
                    ['a' => 'Biletinizin 5 saat geçerli olduğu.', 'c' => false],
                    ['a' => 'Kafeden 5 Euro\'luk alışveriş yapmanız.', 'c' => false],
                    ['a' => 'Trene binmek için 5 Euro vermeniz.', 'c' => false],
                ]
            ],
            [
                'q' => 'Boş zamanlarınızda ne yaptığınızı soran "Was machst du in deiner Freizeit?" sorusundaki "die Freizeit" ne demektir?',
                'answers' => [
                    ['a' => 'Boş zaman', 'c' => true],
                    ['a' => 'İş saati', 'c' => false],
                    ['a' => 'Aile', 'c' => false],
                    ['a' => 'Fotoğraf', 'c' => false],
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

        // Goethe A1 Test 2
        $test = Test::firstOrCreate([
            'test_title' => 'Goethe A1: C-F Harfleri Deneme Sınavı',
            'lesson_id' => $lesson->id
        ], [
            'description' => 'Goethe-Institut A1 sertifika sınavında sıkça çıkan C, D, E ve F harfleri ile başlayan kelimelerden ve resmi okuma metinlerinden derlenmiş deneme sınavı.',
            'is_active' => true
        ]);

        if (!empty($createdQuestions)) {
            $test->questions()->sync($createdQuestions);
        }
    }
}
