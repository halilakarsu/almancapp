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

class B1_2_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'B1.2 Orta Seviye'
        ], [
            'level_slug' => Str::slug('B1.2 Orta Seviye'),
            'level_description' => 'B1 seviyesi ikinci aşaması. Passiv, Konjunktiv II ve İkili Bağlaçlar.',
            'order_index' => 5,
            'is_active' => true
        ]);

        $topics = [
            'Edilgen Çatı (Passiv - Präsens & Präteritum)' => [
                'desc' => 'Eylemi yapanın değil eylemin önemli olduğu cümleler (yapılır, yapıldı).',
                'words' => [
                    ['g' => 'werden', 't' => 'olmak (Passiv yardımcı fiili)'], ['g' => 'wurde', 't' => 'oldu (Passiv geçmiş)'],
                    ['g' => 'bauen', 't' => 'inşa etmek'], ['g' => 'reparieren', 't' => 'tamir etmek'],
                    ['g' => 'operieren', 't' => 'ameliyat etmek'], ['g' => 'untersuchen', 't' => 'muayene etmek/incelemek'],
                    ['g' => 'einladen', 't' => 'davet etmek'], ['g' => 'schreiben', 't' => 'yazmak'],
                    ['g' => 'lesen', 't' => 'okumak'], ['g' => 'kochen', 't' => 'pişirmek'],
                    ['g' => 'essen', 't' => 'yemek'], ['g' => 'trinken', 't' => 'içmek'],
                    ['g' => 'putzen', 't' => 'temizlemek'], ['g' => 'waschen', 't' => 'yıkamak'],
                    ['g' => 'erfinden', 't' => 'icat etmek'], ['g' => 'entdecken', 't' => 'keşfetmek'],
                    ['g' => 'stehlen', 't' => 'çalmak (hırsızlık)'], ['g' => 'finden', 't' => 'bulmak'],
                    ['g' => 'verkaufen', 't' => 'satmak'], ['g' => 'kaufen', 't' => 'satın almak']
                ],
                'sentences' => [
                    ['g' => 'Das Haus wird gebaut.', 't' => 'Ev inşa ediliyor.'],
                    ['g' => 'Das Auto wurde gestern repariert.', 't' => 'Araba dün tamir edildi.'],
                    ['g' => 'Der Patient wird operiert.', 't' => 'Hasta ameliyat ediliyor.'],
                    ['g' => 'Der Brief wird geschrieben.', 't' => 'Mektup yazılıyor.'],
                    ['g' => 'Das Buch wurde von vielen Leuten gelesen.', 't' => 'Kitap birçok insan tarafından okundu.'],
                    ['g' => 'Die Suppe wird gekocht.', 't' => 'Çorba pişiriliyor.'],
                    ['g' => 'Die Fenster werden geputzt.', 't' => 'Pencereler temizleniyor.'],
                    ['g' => 'Das Auto wird gewaschen.', 't' => 'Araba yıkanıyor.'],
                    ['g' => 'Das Telefon wurde erfunden.', 't' => 'Telefon icat edildi.'],
                    ['g' => 'Amerika wurde von Kolumbus entdeckt.', 't' => 'Amerika Kolomb tarafından keşfedildi.'],
                    ['g' => 'Mein Fahrrad wurde gestohlen.', 't' => 'Bisikletim çalındı.'],
                    ['g' => 'Der Schlüssel wurde gefunden.', 't' => 'Anahtar bulundu.'],
                    ['g' => 'Das Haus wird verkauft.', 't' => 'Ev satılıyor.'],
                    ['g' => 'Die Computer wurden gekauft.', 't' => 'Bilgisayarlar satın alındı.'],
                    ['g' => 'Er wird zur Party eingeladen.', 't' => 'O partiye davet ediliyor.'],
                    ['g' => 'Wir wurden nicht informiert.', 't' => 'Biz bilgilendirilmedik.'],
                    ['g' => 'Die Rechnung wird bezahlt.', 't' => 'Hesap ödeniyor.'],
                    ['g' => 'Das Zimmer wurde aufgeräumt.', 't' => 'Oda toplandı.'],
                    ['g' => 'Die Zeitung wird jeden Morgen gebracht.', 't' => 'Gazete her sabah getirilir.'],
                    ['g' => 'Das Problem wurde schnell gelöst.', 't' => 'Problem hızlıca çözüldü.']
                ],
                'questions' => [
                    ['q' => 'Das Haus ___ im Moment gebaut.', 'a' => 'wird', 'w' => ['wurde', 'werden', 'wurden']],
                    ['q' => 'Die Briefe ___ gestern verschickt.', 'a' => 'wurden', 'w' => ['wurde', 'wird', 'werden']],
                    ['q' => 'Das Auto ___ repariert.', 'a' => 'wird', 'w' => ['werde', 'wirst', 'wurden']],
                    ['q' => 'Amerika ___ 1492 entdeckt.', 'a' => 'wurde', 'w' => ['wird', 'werden', 'wurden']],
                    ['q' => 'Die Kuchen ___ von meiner Oma gebacken.', 'a' => 'werden', 'w' => ['wird', 'wurde', 'wurdest']],
                    ['q' => 'Das Fahrrad ___ gestohlen.', 'a' => 'wurde', 'w' => ['wird', 'werden', 'wurden']],
                    ['q' => 'Der Patient ___ vom Arzt untersucht.', 'a' => 'wird', 'w' => ['werden', 'wurde', 'wurden']],
                    ['q' => 'Die Rechnungen ___ noch nicht bezahlt.', 'a' => 'wurden', 'w' => ['wurde', 'wird', 'werden']],
                    ['q' => 'Hier ___ jeden Tag geputzt.', 'a' => 'wird', 'w' => ['wurde', 'werden', 'wurden']],
                    ['q' => 'Die Tür ___ nachts abgeschlossen.', 'a' => 'wird', 'w' => ['werden', 'wurde', 'wurden']],
                    ['q' => 'Der Text ___ aus dem Englischen übersetzt.', 'a' => 'wurde', 'w' => ['wurden', 'wird', 'werden']],
                    ['q' => 'Viele neue Häuser ___ in dieser Straße gebaut.', 'a' => 'werden', 'w' => ['wird', 'wurde', 'wurdest']],
                    ['q' => 'Das Fenster ___ gestern kaputt gemacht.', 'a' => 'wurde', 'w' => ['wird', 'werden', 'wurden']],
                    ['q' => 'Der Müll ___ jede Woche abgeholt.', 'a' => 'wird', 'w' => ['werden', 'wurde', 'wurden']],
                    ['q' => 'Ich ___ zur Party eingeladen.', 'a' => 'wurde', 'w' => ['wurden', 'wird', 'werde']],
                    ['q' => 'Das Essen ___ gerade gekocht.', 'a' => 'wird', 'w' => ['werden', 'wurde', 'wurden']],
                    ['q' => 'Die Fehler ___ schnell korrigiert.', 'a' => 'wurden', 'w' => ['wurde', 'wird', 'werden']],
                    ['q' => 'Das Paket ___ heute Morgen geliefert.', 'a' => 'wurde', 'w' => ['wird', 'werden', 'wurden']],
                    ['q' => 'Die Bücher ___ oft gelesen.', 'a' => 'werden', 'w' => ['wird', 'wurde', 'wurdest']],
                    ['q' => 'Das Gesetz ___ im Parlament beschlossen.', 'a' => 'wurde', 'w' => ['wird', 'werden', 'wurden']],
                ]
            ],
            'Konjunktiv II (Dilek ve Tavsiyeler)' => [
                'desc' => 'Gerçek dışı istekler (hätte/wäre/würde) ve tavsiyeler (sollte).',
                'words' => [
                    ['g' => 'hätte', 't' => 'sahip olsaydım / -im olsaydı'], ['g' => 'wäre', 't' => 'olsaydım / olsaydı'],
                    ['g' => 'würde', 't' => 'yapardım (yardımcı fiil)'], ['g' => 'könnte', 't' => 'yapabilseydim / yapabilirdi'],
                    ['g' => 'sollte', 't' => 'yapmalıydı (tavsiye)'], ['g' => 'der Wunsch', 't' => 'dilek'],
                    ['g' => 'der Ratschlag', 't' => 'tavsiye'], ['g' => 'reich', 't' => 'zengin'],
                    ['g' => 'gesund', 't' => 'sağlıklı'], ['g' => 'krank', 't' => 'hasta'],
                    ['g' => 'das Geld', 't' => 'para'], ['g' => 'die Zeit', 't' => 'zaman'],
                    ['g' => 'der Urlaub', 't' => 'tatil'], ['g' => 'fliegen', 't' => 'uçmak'],
                    ['g' => 'reisen', 't' => 'seyahat etmek'], ['g' => 'kaufen', 't' => 'satın almak'],
                    ['g' => 'helfen', 't' => 'yardım etmek'], ['g' => 'bitten', 't' => 'rica etmek'],
                    ['g' => 'gern', 't' => 'severek / seve seve'], ['g' => 'vielleicht', 't' => 'belki']
                ],
                'sentences' => [
                    ['g' => 'Ich hätte gern ein Eis.', 't' => 'Bir dondurma alırdım (istiyorum).'],
                    ['g' => 'Wenn ich reich wäre, würde ich reisen.', 't' => 'Eğer zengin olsaydım, seyahat ederdim.'],
                    ['g' => 'Du solltest zum Arzt gehen.', 't' => 'Doktora gitmelisin (tavsiye).'],
                    ['g' => 'Könnten Sie mir bitte helfen?', 't' => 'Bana yardım edebilir miydiniz?'],
                    ['g' => 'Ich wünschte, ich hätte mehr Zeit.', 't' => 'Keşke daha fazla zamanım olsaydı.'],
                    ['g' => 'Wenn das Wetter besser wäre, würden wir grillen.', 't' => 'Hava daha iyi olsaydı, mangal yapardık.'],
                    ['g' => 'Er würde ein Auto kaufen, wenn er Geld hätte.', 't' => 'Eğer parası olsaydı bir araba satın alırdı.'],
                    ['g' => 'An deiner Stelle würde ich lernen.', 't' => 'Senin yerinde olsam çalışırdım.'],
                    ['g' => 'Hätten Sie einen Moment Zeit?', 't' => 'Bir saniye vaktiniz var mıydı?'],
                    ['g' => 'Wir wären froh, wenn du kommst.', 't' => 'Gelirsen sevinirdik.'],
                    ['g' => 'Du solltest weniger rauchen.', 't' => 'Daha az sigara içmelisin.'],
                    ['g' => 'Ich würde gerne mitkommen, aber ich muss arbeiten.', 't' => 'Gelmek isterdim ama çalışmam lazım.'],
                    ['g' => 'Wenn er nicht so müde wäre, ginge er ins Kino.', 't' => 'O kadar yorgun olmasaydı, sinemaya giderdi.'],
                    ['g' => 'Sie hätte gern einen Hund.', 't' => 'O bir köpeği olsun isterdi.'],
                    ['g' => 'Könntest du mir das Salz geben?', 't' => 'Bana tuzu verebilir misin?'],
                    ['g' => 'Es wäre schön, wenn wir uns wiedersehen.', 't' => 'Tekrar görüşürsek güzel olurdu.'],
                    ['g' => 'Ihr solltet mehr schlafen.', 't' => 'Daha fazla uyumalısınız.'],
                    ['g' => 'Wenn ich du wäre, würde ich das nicht tun.', 't' => 'Eğer sen olsaydım, bunu yapmazdım.'],
                    ['g' => 'Würden Sie bitte das Fenster schließen?', 't' => 'Lütfen pencereyi kapatır mıydınız?'],
                    ['g' => 'Ich hätte das nicht gesagt.', 't' => 'Ben olsam bunu söylemezdim.']
                ],
                'questions' => [
                    ['q' => 'Ich ___ gern einen Kaffee.', 'a' => 'hätte', 'w' => ['wäre', 'würde', 'könnte']],
                    ['q' => 'Wenn ich Zeit ___, würde ich dir helfen.', 'a' => 'hätte', 'w' => ['habe', 'wäre', 'würde']],
                    ['q' => 'An deiner Stelle ___ ich zum Arzt gehen.', 'a' => 'würde', 'w' => ['wäre', 'hätte', 'sollte']],
                    ['q' => 'Du bist krank. Du ___ im Bett bleiben.', 'a' => 'solltest', 'w' => ['würdest', 'wärest', 'hättest']],
                    ['q' => '___ Sie mir bitte helfen?', 'a' => 'Könnten', 'w' => ['Hätten', 'Wären', 'Sollten']],
                    ['q' => 'Wenn das Wetter schön ___, würden wir spazieren gehen.', 'a' => 'wäre', 'w' => ['ist', 'hätte', 'würde']],
                    ['q' => 'Ich ___ gern nach Italien fliegen.', 'a' => 'würde', 'w' => ['wäre', 'hätte', 'könnte']],
                    ['q' => '___ Sie bitte die Tür zumachen?', 'a' => 'Würden', 'w' => ['Wären', 'Hätten', 'Sollten']],
                    ['q' => 'Wir ___ froh, wenn das klappt.', 'a' => 'wären', 'w' => ['hätten', 'würden', 'könnten']],
                    ['q' => 'Er ___ gern ein neues Auto, aber er hat kein Geld.', 'a' => 'hätte', 'w' => ['wäre', 'würde', 'könnte']],
                    ['q' => 'Wenn ich du ___, würde ich das Angebot annehmen.', 'a' => 'wäre', 'w' => ['hätte', 'bin', 'würde']],
                    ['q' => 'Ihr ___ besser zuhören.', 'a' => 'solltet', 'w' => ['würdet', 'wäret', 'hättet']],
                    ['q' => '___ du mir das Buch leihen?', 'a' => 'Könntest', 'w' => ['Hättest', 'Wärest', 'Solltest']],
                    ['q' => 'Es ___ nett, wenn du kommst.', 'a' => 'wäre', 'w' => ['ist', 'hätte', 'würde']],
                    ['q' => 'Ich ___ das nicht getan.', 'a' => 'hätte', 'w' => ['wäre', 'würde', 'könnte']],
                    ['q' => 'Wenn er nicht so viel essen ___, wäre er dünner.', 'a' => 'würde', 'w' => ['hätte', 'wäre', 'könnte']],
                    ['q' => 'Sie ___ gern reich.', 'a' => 'wäre', 'w' => ['hätte', 'würde', 'könnte']],
                    ['q' => '___ wir doch nur mehr Zeit!', 'a' => 'Hätten', 'w' => ['Wären', 'Würden', 'Könnten']],
                    ['q' => 'Du ___ dich bei ihm entschuldigen.', 'a' => 'solltest', 'w' => ['würdest', 'wärest', 'hättest']],
                    ['q' => 'Ich ___ dir gerne helfen, aber ich kann nicht.', 'a' => 'würde', 'w' => ['wäre', 'hätte', 'könnte']],
                ]
            ],
            'İkili Bağlaçlar (Zweiteilige Konjunktionen)' => [
                'desc' => 'entweder...oder, weder...noch, nicht nur...sondern auch gibi bağlaçlar.',
                'words' => [
                    ['g' => 'entweder ... oder', 't' => 'ya ... ya da'], ['g' => 'weder ... noch', 't' => 'ne ... ne de'],
                    ['g' => 'nicht nur ... sondern auch', 't' => 'sadece ... değil, aynı zamanda'], ['g' => 'sowohl ... als auch', 't' => 'hem ... hem de'],
                    ['g' => 'zwar ... aber', 't' => 'gerçi ... ama'], ['g' => 'einerseits ... andererseits', 't' => 'bir yandan ... diğer yandan'],
                    ['g' => 'je ... desto', 't' => 'ne kadar ... o kadar'], ['g' => 'trinken', 't' => 'içmek'],
                    ['g' => 'essen', 't' => 'yemek'], ['g' => 'sprechen', 't' => 'konuşmak'],
                    ['g' => 'arbeiten', 't' => 'çalışmak'], ['g' => 'studieren', 't' => 'üniversite okumak'],
                    ['g' => 'kalt', 't' => 'soğuk'], ['g' => 'warm', 't' => 'sıcak'],
                    ['g' => 'teuer', 't' => 'pahalı'], ['g' => 'billig', 't' => 'ucuz'],
                    ['g' => 'schnell', 't' => 'hızlı'], ['g' => 'langsam', 't' => 'yavaş'],
                    ['g' => 'gesund', 't' => 'sağlıklı'], ['g' => 'krank', 't' => 'hasta']
                ],
                'sentences' => [
                    ['g' => 'Ich trinke entweder Kaffee oder Tee.', 't' => 'Ya kahve ya da çay içerim.'],
                    ['g' => 'Er spricht weder Englisch noch Deutsch.', 't' => 'O ne İngilizce ne de Almanca konuşuyor.'],
                    ['g' => 'Sie ist nicht nur intelligent, sondern auch sehr fleißig.', 't' => 'O sadece zeki değil, aynı zamanda çok çalışkan.'],
                    ['g' => 'Ich mag sowohl Katzen als auch Hunde.', 't' => 'Hem kedileri hem de köpekleri severim.'],
                    ['g' => 'Das Auto ist zwar klein, aber sehr schnell.', 't' => 'Araba gerçi küçük ama çok hızlı.'],
                    ['g' => 'Einerseits möchte ich reisen, andererseits habe ich kein Geld.', 't' => 'Bir yandan seyahat etmek istiyorum, diğer yandan param yok.'],
                    ['g' => 'Je mehr ich lerne, desto besser werde ich.', 't' => 'Ne kadar çok öğrenirsem o kadar iyi olurum.'],
                    ['g' => 'Wir können entweder ins Kino oder ins Theater gehen.', 't' => 'Ya sinemaya ya da tiyatroya gidebiliriz.'],
                    ['g' => 'Er hat weder Zeit noch Lust.', 't' => 'Onun ne zamanı var ne de isteği.'],
                    ['g' => 'Sie spielt nicht nur Klavier, sondern singt auch.', 't' => 'O sadece piyano çalmakla kalmıyor, şarkı da söylüyor.'],
                    ['g' => 'Das Essen war sowohl lecker als auch gesund.', 't' => 'Yemek hem lezzetliydi hem de sağlıklıydı.'],
                    ['g' => 'Das Hotel ist zwar teuer, aber sehr schön.', 't' => 'Otel gerçi pahalı ama çok güzel.'],
                    ['g' => 'Je älter man wird, desto klüger wird man oft.', 't' => 'İnsan ne kadar yaşlanırsa genelde o kadar akıllanır.'],
                    ['g' => 'Ich habe entweder heute Abend oder morgen Zeit.', 't' => 'Ya bu akşam ya da yarın vaktim var.'],
                    ['g' => 'Er trinkt weder Alkohol noch raucht er.', 't' => 'O ne alkol içer ne de sigara kullanır.'],
                    ['g' => 'Die Stadt ist nicht nur groß, sondern auch laut.', 't' => 'Şehir sadece büyük değil, aynı zamanda gürültülü.'],
                    ['g' => 'Ich kenne sowohl seinen Bruder als auch seine Schwester.', 't' => 'Hem erkek kardeşini hem de kız kardeşini tanıyorum.'],
                    ['g' => 'Sie arbeitet zwar viel, aber sie verdient wenig.', 't' => 'Gerçi çok çalışıyor ama az kazanıyor.'],
                    ['g' => 'Einerseits ist das Angebot gut, andererseits ist es riskant.', 't' => 'Bir yandan teklif iyi, diğer yandan riskli.'],
                    ['g' => 'Je schneller wir fahren, desto früher sind wir da.', 't' => 'Ne kadar hızlı gidersek, o kadar erken orada oluruz.']
                ],
                'questions' => [
                    ['q' => 'Ich trinke ___ Kaffee noch Tee.', 'a' => 'weder', 'w' => ['entweder', 'nicht', 'zwar']],
                    ['q' => 'Wir fahren ___ nach Spanien oder nach Italien.', 'a' => 'entweder', 'w' => ['weder', 'sowohl', 'nicht nur']],
                    ['q' => 'Er spricht nicht nur Deutsch, ___ auch Französisch.', 'a' => 'sondern', 'w' => ['als', 'aber', 'oder']],
                    ['q' => 'Sie mag ___ Katzen als auch Hunde.', 'a' => 'sowohl', 'w' => ['entweder', 'weder', 'zwar']],
                    ['q' => 'Das Auto ist ___ teuer, aber sehr gut.', 'a' => 'zwar', 'w' => ['weder', 'sowohl', 'entweder']],
                    ['q' => '___ mehr ich schlafe, desto müder bin ich.', 'a' => 'Je', 'w' => ['Desto', 'Als', 'Wenn']],
                    ['q' => 'Er hat weder Geld ___ Zeit.', 'a' => 'noch', 'w' => ['oder', 'als', 'aber']],
                    ['q' => 'Du kannst entweder bleiben ___ gehen.', 'a' => 'oder', 'w' => ['noch', 'als', 'aber']],
                    ['q' => 'Einerseits ist es schön hier, ___ ist es zu laut.', 'a' => 'andererseits', 'w' => ['sondern', 'desto', 'aber']],
                    ['q' => 'Ich esse nicht nur Fleisch, ___ auch viel Gemüse.', 'a' => 'sondern', 'w' => ['als', 'noch', 'oder']],
                    ['q' => 'Er ist sowohl klug ___ fleißig.', 'a' => 'als auch', 'w' => ['noch', 'oder', 'sondern auch']],
                    ['q' => 'Je schneller du läufst, ___ eher bist du da.', 'a' => 'desto', 'w' => ['je', 'als', 'dann']],
                    ['q' => 'Ich habe ___ Hunger noch Durst.', 'a' => 'weder', 'w' => ['entweder', 'nicht', 'zwar']],
                    ['q' => 'Das Wetter ist zwar schlecht, ___ wir gehen trotzdem raus.', 'a' => 'aber', 'w' => ['sondern', 'als', 'oder']],
                    ['q' => 'Wir müssen uns ___ heute oder morgen entscheiden.', 'a' => 'entweder', 'w' => ['weder', 'zwar', 'sowohl']],
                    ['q' => 'Sie ist nicht nur schön, ___ auch sehr nett.', 'a' => 'sondern', 'w' => ['als', 'aber', 'noch']],
                    ['q' => 'Ich kenne sowohl ihn ___ seinen Vater.', 'a' => 'als auch', 'w' => ['noch', 'oder', 'aber']],
                    ['q' => 'Je kälter es ist, ___ dicker muss man sich anziehen.', 'a' => 'desto', 'w' => ['je', 'als', 'um']],
                    ['q' => 'Sie hat ___ angerufen noch eine Nachricht geschrieben.', 'a' => 'weder', 'w' => ['entweder', 'nicht', 'zwar']],
                    ['q' => 'Das ist ___ schwierig, aber ich schaffe das.', 'a' => 'zwar', 'w' => ['weder', 'sowohl', 'entweder']],
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
                    $q->answers()->delete();
                    
                    $q->answers()->create([
                        'answer_text' => $qData['a'],
                        'is_correct' => true,
                        'order_index' => 1,
                        'is_active' => true
                    ]);

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
