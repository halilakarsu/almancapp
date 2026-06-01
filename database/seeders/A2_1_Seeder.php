<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Word;
use App\Models\Question;
use App\Models\Test;

class A2_1_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'A2.1 Temel Seviye'
        ], [
            'level_slug' => Str::slug('A2.1 Temel Seviye'),
            'level_description' => 'A2 seviyesinin ilk aşaması. Präteritum, yan cümleler ve daha karmaşık yapılar.',
            'order_index' => 2,
            'is_active' => true
        ]);

        $topics = [
            'Modal Fiillerin Geçmiş Zamanı (Präteritum)' => [
                'desc' => 'wollte, konnte, musste, durfte, sollte kullanımları.',
                'words' => [
                    ['g' => 'wollen', 't' => 'istemek'], ['g' => 'wollte', 't' => 'istedi'],
                    ['g' => 'können', 't' => 'yapabilmek'], ['g' => 'konnte', 't' => 'yapabildi'],
                    ['g' => 'müssen', 't' => 'zorunda olmak'], ['g' => 'musste', 't' => 'zorundaydı'],
                    ['g' => 'dürfen', 't' => 'izinli olmak'], ['g' => 'durfte', 't' => 'izinliydi'],
                    ['g' => 'sollen', 't' => 'gerekmek'], ['g' => 'sollte', 't' => 'gerekiyordu'],
                    ['g' => 'gestern', 't' => 'dün'], ['g' => 'früher', 't' => 'eskiden'],
                    ['g' => 'damals', 't' => 'o zamanlar'], ['g' => 'die Kindheit', 't' => 'çocukluk'],
                    ['g' => 'die Erlaubnis', 't' => 'izin'], ['g' => 'der Zwang', 't' => 'zorunluluk'],
                    ['g' => 'die Fähigkeit', 't' => 'yetenek'], ['g' => 'der Wunsch', 't' => 'istek'],
                    ['g' => 'die Pflicht', 't' => 'görev'], ['g' => 'verboten', 't' => 'yasak']
                ],
                'sentences' => [
                    ['g' => 'Ich wollte gestern ins Kino gehen.', 't' => 'Dün sinemaya gitmek istedim.'],
                    ['g' => 'Er konnte sehr schnell laufen.', 't' => 'O çok hızlı koşabiliyordu.'],
                    ['g' => 'Wir mussten am Wochenende arbeiten.', 't' => 'Hafta sonu çalışmak zorundaydık.'],
                    ['g' => 'Als Kind durfte ich nicht lange aufbleiben.', 't' => 'Çocukken geç saatlere kadar ayakta kalmama izin yoktu.'],
                    ['g' => 'Sie sollte ihre Medizin nehmen.', 't' => 'İlacını alması gerekiyordu.'],
                    ['g' => 'Konntest du das Auto reparieren?', 't' => 'Arabayı tamir edebildin mi?'],
                    ['g' => 'Wolltet ihr nach Berlin fahren?', 't' => 'Berlin\'e gitmek mi istiyordunuz?'],
                    ['g' => 'Warum durftest du nicht mitkommen?', 't' => 'Neden bizimle gelmene izin yoktu?'],
                    ['g' => 'Ich musste meine Hausaufgaben machen.', 't' => 'Ödevlerimi yapmak zorundaydım.'],
                    ['g' => 'Er wollte Arzt werden.', 't' => 'O doktor olmak istiyordu.'],
                    ['g' => 'Wir konnten das Problem lösen.', 't' => 'Problemi çözebildik.'],
                    ['g' => 'Musstest du gestern kochen?', 't' => 'Dün yemek yapmak zorunda mıydın?'],
                    ['g' => 'Sie durften hier nicht rauchen.', 't' => 'Burada sigara içmelerine izin verilmiyordu.'],
                    ['g' => 'Solltest du nicht lernen?', 't' => 'Ders çalışman gerekmiyor muydu?'],
                    ['g' => 'Damals wollte ich Pilot werden.', 't' => 'O zamanlar pilot olmak istiyordum.'],
                    ['g' => 'Er konnte gut Deutsch sprechen.', 't' => 'O iyi Almanca konuşabiliyordu.'],
                    ['g' => 'Wir mussten pünktlich sein.', 't' => 'Dakik olmak zorundaydık.'],
                    ['g' => 'Durftet ihr draußen spielen?', 't' => 'Dışarıda oynamanıza izin var mıydı?'],
                    ['g' => 'Sie wollte ein neues Auto kaufen.', 't' => 'Yeni bir araba almak istiyordu.'],
                    ['g' => 'Ich sollte mehr Sport machen.', 't' => 'Daha fazla spor yapmalıydım.']
                ],
                'questions' => [
                    ['q' => 'Gestern ___ ich viel arbeiten.', 'a' => 'musste', 'w' => ['muss', 'müsste', 'müssen']],
                    ['q' => 'Als Kind ___ ich nicht schwimmen.', 'a' => 'konnte', 'w' => ['kann', 'könnte', 'können']],
                    ['q' => 'Wir ___ nach Italien fahren, aber wir hatten keine Zeit.', 'a' => 'wollten', 'w' => ['wollen', 'will', 'wollt']],
                    ['q' => '___ du gestern ins Kino gehen?', 'a' => 'Wolltest', 'w' => ['Willst', 'Wollen', 'Wollte']],
                    ['q' => 'Er ___ früh ins Bett gehen, weil er müde war.', 'a' => 'musste', 'w' => ['muss', 'musst', 'mussten']],
                    ['q' => 'Früher ___ man hier rauchen. Jetzt ist es verboten.', 'a' => 'durfte', 'w' => ['darf', 'dürfen', 'durften']],
                    ['q' => 'Ich ___ dir helfen, aber ich hatte keine Zeit.', 'a' => 'wollte', 'w' => ['will', 'wollen', 'wollten']],
                    ['q' => '___ ihr die Hausaufgaben machen?', 'a' => 'Musstet', 'w' => ['Müssen', 'Mussten', 'Musste']],
                    ['q' => 'Sie ___ gut Klavier spielen, als sie jung war.', 'a' => 'konnte', 'w' => ['kann', 'können', 'konnten']],
                    ['q' => 'Mein Vater sagte, ich ___ mein Zimmer aufräumen.', 'a' => 'sollte', 'w' => ['soll', 'sollen', 'sollten']],
                    ['q' => 'Wir ___ nicht ins Konzert gehen, weil die Tickets zu teuer waren.', 'a' => 'konnten', 'w' => ['können', 'kann', 'konnte']],
                    ['q' => '___ er den Test bestehen?', 'a' => 'Konnte', 'w' => ['Kann', 'Können', 'Konnten']],
                    ['q' => 'Als ich 10 war, ___ ich abends nicht fernsehen.', 'a' => 'durfte', 'w' => ['darf', 'dürfen', 'durften']],
                    ['q' => 'Sie ___ gestern einen Kuchen backen.', 'a' => 'wollte', 'w' => ['will', 'wollen', 'wollten']],
                    ['q' => 'Warum ___ du so früh gehen?', 'a' => 'musstest', 'w' => ['musst', 'musste', 'müssen']],
                    ['q' => 'Die Kinder ___ gestern im Garten spielen.', 'a' => 'durften', 'w' => ['dürfen', 'darf', 'durfte']],
                    ['q' => 'Ich ___ gestern nicht kommen, weil ich krank war.', 'a' => 'konnte', 'w' => ['kann', 'können', 'konnten']],
                    ['q' => '___ Sie das bitte wiederholen? (Höflich)', 'a' => 'Könnten', 'w' => ['Können', 'Konnte', 'Kann']],
                    ['q' => 'Er ___ das eigentlich nicht tun.', 'a' => 'sollte', 'w' => ['soll', 'sollen', 'sollten']],
                    ['q' => 'Wir ___ damals kein Geld für Urlaub.', 'a' => 'hatten', 'w' => ['haben', 'hat', 'habt']],
                ]
            ],
            'Yan Cümleler (weil, dass)' => [
                'desc' => 'Sebep bildiren (weil) ve isim cümlecikleri (dass).',
                'words' => [
                    ['g' => 'weil', 't' => 'çünkü'], ['g' => 'dass', 't' => '-dığını/-diğini'],
                    ['g' => 'denken', 't' => 'düşünmek'], ['g' => 'glauben', 't' => 'inanmak/sanmak'],
                    ['g' => 'wissen', 't' => 'bilmek'], ['g' => 'hoffen', 't' => 'ummak'],
                    ['g' => 'sagen', 't' => 'söylemek'], ['g' => 'sehen', 't' => 'görmek'],
                    ['g' => 'der Grund', 't' => 'sebep/neden'], ['g' => 'die Meinung', 't' => 'fikir/görüş'],
                    ['g' => 'müde', 't' => 'yorgun'], ['g' => 'krank', 't' => 'hasta'],
                    ['g' => 'glücklich', 't' => 'mutlu'], ['g' => 'traurig', 't' => 'üzgün'],
                    ['g' => 'wichtig', 't' => 'önemli'], ['g' => 'richtig', 't' => 'doğru'],
                    ['g' => 'falsch', 't' => 'yanlış'], ['g' => 'sicher', 't' => 'emin'],
                    ['g' => 'vielleicht', 't' => 'belki'], ['g' => 'natürlich', 't' => 'elbette']
                ],
                'sentences' => [
                    ['g' => 'Ich bleibe zu Hause, weil ich krank bin.', 't' => 'Evde kalıyorum çünkü hastayım.'],
                    ['g' => 'Ich glaube, dass er heute kommt.', 't' => 'Onun bugün geleceğini sanıyorum.'],
                    ['g' => 'Er lernt Deutsch, weil er in Berlin arbeitet.', 't' => 'Almanca öğreniyor çünkü Berlin\'de çalışıyor.'],
                    ['g' => 'Weißt du, dass sie schwanger ist?', 't' => 'Onun hamile olduğunu biliyor musun?'],
                    ['g' => 'Wir gehen nicht spazieren, weil es regnet.', 't' => 'Yürüyüşe çıkmıyoruz çünkü yağmur yağıyor.'],
                    ['g' => 'Ich hoffe, dass das Wetter morgen besser wird.', 't' => 'Umarım yarın hava daha iyi olur.'],
                    ['g' => 'Sie freut sich, weil sie eine gute Note hat.', 't' => 'Seviniyor çünkü iyi bir not aldı.'],
                    ['g' => 'Er sagt, dass er keine Zeit hat.', 't' => 'Zamanı olmadığını söylüyor.'],
                    ['g' => 'Ich trinke Kaffee, weil ich müde bin.', 't' => 'Kahve içiyorum çünkü yorgunum.'],
                    ['g' => 'Es ist wichtig, dass du viel Wasser trinkst.', 't' => 'Çok su içmen önemlidir.'],
                    ['g' => 'Wir essen Pizza, weil wir Hunger haben.', 't' => 'Pizza yiyoruz çünkü açız.'],
                    ['g' => 'Ich finde, dass dieser Film sehr gut ist.', 't' => 'Bence bu film çok iyi.'],
                    ['g' => 'Sie weint, weil ihr Hund weggelaufen ist.', 't' => 'Ağlıyor çünkü köpeği kaçtı.'],
                    ['g' => 'Denkst du, dass er die Wahrheit sagt?', 't' => 'Onun doğruyu söylediğini düşünüyor musun?'],
                    ['g' => 'Er kommt zu spät, weil er den Bus verpasst hat.', 't' => 'Geç kalıyor çünkü otobüsü kaçırdı.'],
                    ['g' => 'Ich bin sicher, dass wir das schaffen.', 't' => 'Bunu başaracağımıza eminim.'],
                    ['g' => 'Sie lernt viel, weil sie die Prüfung bestehen will.', 't' => 'Çok çalışıyor çünkü sınavı geçmek istiyor.'],
                    ['g' => 'Ich habe gehört, dass du nach Italien fliegst.', 't' => 'İtalya\'ya uçacağını duydum.'],
                    ['g' => 'Ich gehe ins Bett, weil ich schlafen möchte.', 't' => 'Yatağa gidiyorum çünkü uyumak istiyorum.'],
                    ['g' => 'Er weiß nicht, dass ich hier bin.', 't' => 'Benim burada olduğumu bilmiyor.']
                ],
                'questions' => [
                    ['q' => 'Ich lerne Deutsch, ___ ich in Deutschland arbeiten möchte.', 'a' => 'weil', 'w' => ['dass', 'und', 'oder']],
                    ['q' => 'Ich glaube, ___ es morgen regnet.', 'a' => 'dass', 'w' => ['weil', 'wenn', 'aber']],
                    ['q' => 'Er geht zum Arzt, ___ er krank ist.', 'a' => 'weil', 'w' => ['dass', 'und', 'denn']],
                    ['q' => 'Ich weiß, ___ du Recht hast.', 'a' => 'dass', 'w' => ['weil', 'denn', 'oder']],
                    ['q' => 'Wir bleiben zu Hause, ___ das Wetter schlecht ist.', 'a' => 'weil', 'w' => ['dass', 'und', 'aber']],
                    ['q' => 'Sie sagt, ___ sie heute keine Zeit hat.', 'a' => 'dass', 'w' => ['weil', 'denn', 'sondern']],
                    ['q' => 'Ich trinke Tee, ___ mir kalt ist.', 'a' => 'weil', 'w' => ['dass', 'denn', 'und']],
                    ['q' => 'Es ist wichtig, ___ man Sport macht.', 'a' => 'dass', 'w' => ['weil', 'denn', 'aber']],
                    ['q' => 'Er kauft ein neues Auto, ___ sein altes kaputt ist.', 'a' => 'weil', 'w' => ['dass', 'denn', 'oder']],
                    ['q' => 'Ich hoffe, ___ du bald wieder gesund bist.', 'a' => 'dass', 'w' => ['weil', 'denn', 'und']],
                    ['q' => 'Sie freut sich, ___ sie die Prüfung bestanden hat.', 'a' => 'weil', 'w' => ['dass', 'aber', 'denn']],
                    ['q' => 'Denkst du, ___ er den Job bekommt?', 'a' => 'dass', 'w' => ['weil', 'denn', 'und']],
                    ['q' => 'Wir gehen nicht ins Kino, ___ der Film langweilig ist.', 'a' => 'weil', 'w' => ['dass', 'denn', 'oder']],
                    ['q' => 'Ich finde, ___ du sehr gut Deutsch sprichst.', 'a' => 'dass', 'w' => ['weil', 'denn', 'aber']],
                    ['q' => 'Er schläft, ___ er sehr müde ist.', 'a' => 'weil', 'w' => ['dass', 'denn', 'und']],
                    ['q' => 'Ich bin sicher, ___ er uns helfen wird.', 'a' => 'dass', 'w' => ['weil', 'denn', 'oder']],
                    ['q' => 'Sie weint, ___ sie traurig ist.', 'a' => 'weil', 'w' => ['dass', 'denn', 'aber']],
                    ['q' => 'Ich habe gehört, ___ ihr umzieht.', 'a' => 'dass', 'w' => ['weil', 'denn', 'und']],
                    ['q' => 'Ich nehme einen Regenschirm mit, ___ es regnet.', 'a' => 'weil', 'w' => ['dass', 'denn', 'oder']],
                    ['q' => 'Er hat mir gesagt, ___ er morgen kommt.', 'a' => 'dass', 'w' => ['weil', 'denn', 'aber']],
                ]
            ],
            'Karşılaştırma Dereceleri (Komparativ & Superlativ)' => [
                'desc' => 'Daha... ve En... kalıpları (groß, größer, am größten).',
                'words' => [
                    ['g' => 'gut', 't' => 'iyi'], ['g' => 'besser', 't' => 'daha iyi'], ['g' => 'am besten', 't' => 'en iyi'],
                    ['g' => 'viel', 't' => 'çok'], ['g' => 'mehr', 't' => 'daha çok'], ['g' => 'am meisten', 't' => 'en çok'],
                    ['g' => 'gern', 't' => 'severek'], ['g' => 'lieber', 't' => 'daha çok severek'], ['g' => 'am liebsten', 't' => 'en çok severek'],
                    ['g' => 'groß', 't' => 'büyük'], ['g' => 'größer', 't' => 'daha büyük'], ['g' => 'am größten', 't' => 'en büyük'],
                    ['g' => 'klein', 't' => 'küçük'], ['g' => 'kleiner', 't' => 'daha küçük'], ['g' => 'am kleinsten', 't' => 'en küçük'],
                    ['g' => 'schnell', 't' => 'hızlı'], ['g' => 'schneller', 't' => 'daha hızlı'], ['g' => 'am schnellsten', 't' => 'en hızlı'],
                    ['g' => 'teuer', 't' => 'pahalı'], ['g' => 'als', 't' => '-den/-dan (karşılaştırma)'],
                ],
                'sentences' => [
                    ['g' => 'Mein Haus ist groß.', 't' => 'Benim evim büyüktür.'],
                    ['g' => 'Dein Haus ist größer als mein Haus.', 't' => 'Senin evin benim evimden daha büyüktür.'],
                    ['g' => 'Sein Haus ist am größten.', 't' => 'Onun evi en büyüktür.'],
                    ['g' => 'Ich trinke gern Tee.', 't' => 'Çay içmeyi severim.'],
                    ['g' => 'Ich trinke lieber Kaffee.', 't' => 'Kahve içmeyi daha çok severim.'],
                    ['g' => 'Am liebsten trinke ich Wasser.', 't' => 'En çok su içmeyi severim.'],
                    ['g' => 'Dieser Computer ist teuer.', 't' => 'Bu bilgisayar pahalı.'],
                    ['g' => 'Jenes Handy ist teurer als der Computer.', 't' => 'Şu telefon bilgisayardan daha pahalı.'],
                    ['g' => 'Das Auto ist am teuersten.', 't' => 'Araba en pahalısı.'],
                    ['g' => 'Er rennt schnell.', 't' => 'O hızlı koşar.'],
                    ['g' => 'Sie rennt schneller als er.', 't' => 'O ondan daha hızlı koşar.'],
                    ['g' => 'Der Gepard rennt am schnellsten.', 't' => 'Çita en hızlı koşar.'],
                    ['g' => 'Ich habe viel Geld.', 't' => 'Çok param var.'],
                    ['g' => 'Du hast mehr Geld als ich.', 't' => 'Senin benden daha çok paran var.'],
                    ['g' => 'Er hat am meisten Geld.', 't' => 'En çok para onda.'],
                    ['g' => 'Das Wetter ist heute gut.', 't' => 'Bugün hava iyi.'],
                    ['g' => 'Morgen wird es besser.', 't' => 'Yarın daha iyi olacak.'],
                    ['g' => 'Im Sommer ist das Wetter am besten.', 't' => 'Yazın hava en iyisidir.'],
                    ['g' => 'Ist dein Bruder älter als du?', 't' => 'Erkek kardeşin senden daha mı yaşlı?'],
                    ['g' => 'Wer ist am jüngsten in der Familie?', 't' => 'Ailede en genç kim?']
                ],
                'questions' => [
                    ['q' => 'Ein Elefant ist ___ als eine Maus.', 'a' => 'größer', 'w' => ['groß', 'am größten', 'größesten']],
                    ['q' => 'Ich trinke gern Tee, aber Kaffee trinke ich ___.', 'a' => 'lieber', 'w' => ['gern', 'am liebsten', 'liebe']],
                    ['q' => 'Das Flugzeug ist ___ als das Auto.', 'a' => 'schneller', 'w' => ['schnell', 'am schnellsten', 'schnellst']],
                    ['q' => 'Der Mount Everest ist der ___ Berg der Welt.', 'a' => 'höchste', 'w' => ['hoch', 'höher', 'hohe']],
                    ['q' => 'Pizza schmeckt ___, aber Pasta schmeckt mir besser.', 'a' => 'gut', 'w' => ['besser', 'am besten', 'gute']],
                    ['q' => 'Wer hat ___ Geld?', 'a' => 'am meisten', 'w' => ['viel', 'mehr', 'meisten']],
                    ['q' => 'Mein Auto ist ___ als dein Auto.', 'a' => 'teurer', 'w' => ['teuer', 'am teuersten', 'teure']],
                    ['q' => 'Heute ist es ___ als gestern.', 'a' => 'kälter', 'w' => ['kalt', 'am kältesten', 'kältest']],
                    ['q' => 'Er arbeitet ___ als sein Kollege.', 'a' => 'mehr', 'w' => ['viel', 'am meisten', 'mehre']],
                    ['q' => 'Welches Tier ist ___?', 'a' => 'am schnellsten', 'w' => ['schnell', 'schneller', 'schnelle']],
                    ['q' => 'Mein Bruder ist 5 Jahre ___ als ich.', 'a' => 'älter', 'w' => ['alt', 'am ältesten', 'älteste']],
                    ['q' => 'Dieser Test ist ___ als der letzte.', 'a' => 'einfacher', 'w' => ['einfach', 'am einfachsten', 'einfache']],
                    ['q' => 'Ich schwimme ___, aber ich spiele lieber Fußball.', 'a' => 'gern', 'w' => ['lieber', 'am liebsten', 'gerne']],
                    ['q' => 'Das ist das ___ Buch, das ich je gelesen habe.', 'a' => 'beste', 'w' => ['gut', 'besser', 'besten']],
                    ['q' => 'Im Winter ist es ___.', 'a' => 'am kältesten', 'w' => ['kalt', 'kälter', 'kältest']],
                    ['q' => 'Deine Tasche ist ___ als meine.', 'a' => 'schwerer', 'w' => ['schwer', 'am schwersten', 'schwere']],
                    ['q' => 'Sie singt ___ als ich.', 'a' => 'schöner', 'w' => ['schön', 'am schönsten', 'schöne']],
                    ['q' => 'Wer rennt ___?', 'a' => 'am schnellsten', 'w' => ['schnell', 'schneller', 'schnelle']],
                    ['q' => 'Dieser Weg ist ___ als der andere.', 'a' => 'kürzer', 'w' => ['kurz', 'am kürzesten', 'kurze']],
                    ['q' => 'Welcher Kuchen schmeckt ___?', 'a' => 'am besten', 'w' => ['gut', 'besser', 'beste']],
                ]
            ]
        ];

        $orderIndex = 1;

        foreach ($topics as $title => $data) {
            $lesson = Lesson::firstOrCreate([
                'lesson_title' => $title
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['desc'],
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $orderIndex++,
                'is_active' => true
            ]);

            // Add Words
            foreach ($data['words'] as $idx => $word) {
                Word::firstOrCreate([
                    'lesson_id' => $lesson->id,
                    'word_german' => $word['g']
                ], [
                    'word_turkish' => $word['t'],
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
            }

            // Add Exercises (Sentences)
            $exercise = Exercise::firstOrCreate([
                'lesson_id' => $lesson->id,
                'title' => $title . ' Alıştırmaları'
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            foreach ($data['sentences'] as $idx => $sentence) {
                ExerciseItem::firstOrCreate([
                    'exercise_id' => $exercise->id,
                    'german' => $sentence['g']
                ], [
                    'turkish' => $sentence['t'],
                    'order_index' => $idx + 1
                ]);
            }

            // Add Tests and Questions
            $test = Test::firstOrCreate([
                'test_title' => $title . ' Testi',
                'lesson_id' => $lesson->id
            ], [
                'description' => 'Her konu başlığı için özel hazırlanmış 20 soruluk pekiştirme testi.',
                'is_active' => true
            ]);

            $createdQuestions = [];
            foreach ($data['questions'] as $idx => $qData) {
                $q = Question::firstOrCreate([
                    'lesson_id' => $lesson->id,
                    'question_text' => $qData['q']
                ], [
                    'question_type' => 'multiple_choice',
                    'order_index' => $idx + 1,
                    'is_active' => true,
                    'explanation' => '',
                    'media_url' => ''
                ]);

                if ($q->wasRecentlyCreated || $q->answers()->count() === 0) {
                    $q->answers()->delete(); // just in case
                    
                    // Correct
                    $q->answers()->create([
                        'answer_text' => $qData['a'],
                        'is_correct' => true,
                        'order_index' => 1,
                        'is_active' => true
                    ]);

                    // Wrongs
                    foreach ($qData['w'] as $aIdx => $wrong) {
                        $q->answers()->create([
                            'answer_text' => $wrong,
                            'is_correct' => false,
                            'order_index' => $aIdx + 2,
                            'is_active' => true
                        ]);
                    }
                }
                
                $createdQuestions[$q->id] = ['order_index' => $idx + 1];
            }

            if (!empty($createdQuestions)) {
                $test->questions()->sync($createdQuestions);
            }
        }
    }
}
