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

class A2_2_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'A2.2 Temel Seviye'
        ], [
            'level_slug' => Str::slug('A2.2 Temel Seviye'),
            'level_description' => 'A2 seviyesinin ikinci aşaması. Sıfat çekimleri, wenn/als ve dönüşlü fiiller.',
            'order_index' => 3,
            'is_active' => true
        ]);

        $topics = [
            'Belirli Artikel ile Sıfat Çekimleri' => [
                'desc' => 'Adjektivdeklination mit bestimmtem Artikel (der, die, das ile sıfat kullanımı).',
                'words' => [
                    ['g' => 'der alte Mann', 't' => 'yaşlı adam'], ['g' => 'die junge Frau', 't' => 'genç kadın'],
                    ['g' => 'das kleine Kind', 't' => 'küçük çocuk'], ['g' => 'der rote Apfel', 't' => 'kırmızı elma'],
                    ['g' => 'die blaue Tasche', 't' => 'mavi çanta'], ['g' => 'das schnelle Auto', 't' => 'hızlı araba'],
                    ['g' => 'die schönen Blumen', 't' => 'güzel çiçekler'], ['g' => 'der warme Tee', 't' => 'sıcak çay'],
                    ['g' => 'die kalte Milch', 't' => 'soğuk süt'], ['g' => 'das neue Buch', 't' => 'yeni kitap'],
                    ['g' => 'den alten Mann', 't' => 'yaşlı adamı (Akk)'], ['g' => 'die junge Frau', 't' => 'genç kadını (Akk)'],
                    ['g' => 'das kleine Kind', 't' => 'küçük çocuğu (Akk)'], ['g' => 'dem alten Mann', 't' => 'yaşlı adama (Dat)'],
                    ['g' => 'der jungen Frau', 't' => 'genç kadına (Dat)'], ['g' => 'dem kleinen Kind', 't' => 'küçük çocuğa (Dat)'],
                    ['g' => 'den schönen Blumen', 't' => 'güzel çiçeklere (Dat)'], ['g' => 'das teure Haus', 't' => 'pahalı ev'],
                    ['g' => 'der gute Freund', 't' => 'iyi arkadaş'], ['g' => 'die wichtige Frage', 't' => 'önemli soru']
                ],
                'sentences' => [
                    ['g' => 'Der alte Mann sitzt im Park.', 't' => 'Yaşlı adam parkta oturuyor.'],
                    ['g' => 'Ich sehe den alten Mann.', 't' => 'Yaşlı adamı görüyorum.'],
                    ['g' => 'Ich helfe dem alten Mann.', 't' => 'Yaşlı adama yardım ediyorum.'],
                    ['g' => 'Die junge Frau liest ein Buch.', 't' => 'Genç kadın bir kitap okuyor.'],
                    ['g' => 'Er fragt die junge Frau.', 't' => 'O, genç kadına soruyor.'],
                    ['g' => 'Das Buch gehört der jungen Frau.', 't' => 'Kitap genç kadına ait.'],
                    ['g' => 'Das kleine Kind spielt mit dem Ball.', 't' => 'Küçük çocuk topla oynuyor.'],
                    ['g' => 'Wir lieben das kleine Kind.', 't' => 'Küçük çocuğu seviyoruz.'],
                    ['g' => 'Die Eltern kaufen dem kleinen Kind ein Spielzeug.', 't' => 'Ebeveynler küçük çocuğa bir oyuncak alıyorlar.'],
                    ['g' => 'Die schönen Blumen stehen auf dem Tisch.', 't' => 'Güzel çiçekler masanın üzerinde duruyor.'],
                    ['g' => 'Er kauft die schönen Blumen.', 't' => 'O güzel çiçekleri satın alıyor.'],
                    ['g' => 'Das Wasser für den warmen Tee kocht.', 't' => 'Sıcak çay için su kaynıyor.'],
                    ['g' => 'Ich trinke die kalte Milch.', 't' => 'Soğuk sütü içiyorum.'],
                    ['g' => 'Das ist das neue Buch von Kafka.', 't' => 'Bu Kafka\'nın yeni kitabıdır.'],
                    ['g' => 'Ich kaufe das teure Auto nicht.', 't' => 'Pahalı arabayı satın almıyorum.'],
                    ['g' => 'Der gute Freund hilft immer.', 't' => 'İyi arkadaş her zaman yardım eder.'],
                    ['g' => 'Hast du die wichtige Frage verstanden?', 't' => 'Önemli soruyu anladın mı?'],
                    ['g' => 'Wir wohnen in dem neuen Haus.', 't' => 'Yeni evde yaşıyoruz.'],
                    ['g' => 'Die Katze schläft unter dem großen Tisch.', 't' => 'Kedi büyük masanın altında uyuyor.'],
                    ['g' => 'Ich spreche mit dem klugen Lehrer.', 't' => 'Zeki öğretmenle konuşuyorum.']
                ],
                'questions' => [
                    ['q' => 'Der ___ Hund spielt im Garten.', 'a' => 'kleine', 'w' => ['kleinen', 'kleiner', 'kleinem']],
                    ['q' => 'Ich trinke den ___ Kaffee.', 'a' => 'warmen', 'w' => ['warme', 'warmer', 'warmem']],
                    ['q' => 'Wir wohnen in dem ___ Haus.', 'a' => 'neuen', 'w' => ['neue', 'neuer', 'neues']],
                    ['q' => 'Die ___ Frau kommt aus Berlin.', 'a' => 'junge', 'w' => ['jungen', 'junger', 'junges']],
                    ['q' => 'Er kauft das ___ Auto.', 'a' => 'teure', 'w' => ['teuren', 'teurer', 'teurem']],
                    ['q' => 'Ich helfe dem ___ Mann.', 'a' => 'alten', 'w' => ['alte', 'alter', 'altem']],
                    ['q' => 'Die ___ Kinder spielen Fußball.', 'a' => 'kleinen', 'w' => ['kleine', 'kleiner', 'kleinem']],
                    ['q' => 'Hast du den ___ Film gesehen?', 'a' => 'neuen', 'w' => ['neue', 'neuer', 'neues']],
                    ['q' => 'Das ist die Jacke der ___ Frau.', 'a' => 'jungen', 'w' => ['junge', 'junger', 'junges']],
                    ['q' => 'Wir sitzen unter dem ___ Baum.', 'a' => 'großen', 'w' => ['große', 'großer', 'großem']],
                    ['q' => 'Der ___ Tisch steht in der Küche.', 'a' => 'runde', 'w' => ['runden', 'runder', 'rundes']],
                    ['q' => 'Ich spreche mit der ___ Lehrerin.', 'a' => 'netten', 'w' => ['nette', 'netter', 'nettem']],
                    ['q' => 'Siehst du das ___ Haus?', 'a' => 'schöne', 'w' => ['schönen', 'schöner', 'schönem']],
                    ['q' => 'Das Auto gehört dem ___ Chef.', 'a' => 'strengen', 'w' => ['strenge', 'strenger', 'strengem']],
                    ['q' => 'Ich liebe die ___ Blumen.', 'a' => 'schönen', 'w' => ['schöne', 'schöner', 'schönem']],
                    ['q' => 'Der ___ Stift schreibt nicht mehr.', 'a' => 'blaue', 'w' => ['blauen', 'blauer', 'blauem']],
                    ['q' => 'Gefällt dir der ___ Mantel?', 'a' => 'schwarze', 'w' => ['schwarzen', 'schwarzer', 'schwarzem']],
                    ['q' => 'Ich antworte auf die ___ Frage.', 'a' => 'wichtige', 'w' => ['wichtigen', 'wichtiger', 'wichtiges']],
                    ['q' => 'Das Kind freut sich über den ___ Ball.', 'a' => 'roten', 'w' => ['rote', 'roter', 'rotem']],
                    ['q' => 'Wir gehen durch den ___ Park.', 'a' => 'großen', 'w' => ['große', 'großer', 'großem']],
                ]
            ],
            'Zaman Bildiren Yan Cümleler (wenn / als)' => [
                'desc' => 'Nebensätze mit wenn (geniş/gelecek zaman) und als (geçmişte tek seferlik olay).',
                'words' => [
                    ['g' => 'wenn', 't' => 'eğer / ne zaman (geniş zaman)'], ['g' => 'als', 't' => '-dığında (geçmişte tek olay)'],
                    ['g' => 'die Zeit', 't' => 'zaman'], ['g' => 'die Vergangenheit', 't' => 'geçmiş'],
                    ['g' => 'die Zukunft', 't' => 'gelecek'], ['g' => 'das Wetter', 't' => 'hava durumu'],
                    ['g' => 'der Regen', 't' => 'yağmur'], ['g' => 'der Schnee', 't' => 'kar'],
                    ['g' => 'die Sonne', 't' => 'güneş'], ['g' => 'klein', 't' => 'küçük'],
                    ['g' => 'jung', 't' => 'genç'], ['g' => 'alt', 't' => 'yaşlı/eski'],
                    ['g' => 'ankommen', 't' => 'varmak'], ['g' => 'abfahren', 't' => 'hareket etmek/kalkmak'],
                    ['g' => 'das Kind', 't' => 'çocuk'], ['g' => 'passieren', 't' => 'olmak/meydana gelmek'],
                    ['g' => 'erleben', 't' => 'tecrübe etmek'], ['g' => 'sich erinnern', 't' => 'hatırlamak'],
                    ['g' => 'träumen', 't' => 'rüya görmek'], ['g' => 'erwachen', 't' => 'uyanmak']
                ],
                'sentences' => [
                    ['g' => 'Wenn ich Zeit habe, lese ich ein Buch.', 't' => 'Eğer zamanım olursa, bir kitap okurum.'],
                    ['g' => 'Als ich ein Kind war, spielte ich jeden Tag draußen.', 't' => 'Çocukken her gün dışarıda oynardım.'],
                    ['g' => 'Wenn es regnet, bleiben wir zu Hause.', 't' => 'Yağmur yağarsa, evde kalırız.'],
                    ['g' => 'Als sie nach Berlin kam, war sie sehr glücklich.', 't' => 'Berlin\'e geldiğinde çok mutluydu.'],
                    ['g' => 'Ich rufe dich an, wenn ich ankomme.', 't' => 'Vardığımda seni ararım.'],
                    ['g' => 'Als mein Vater gestern anrief, schlief ich schon.', 't' => 'Babam dün aradığında ben çoktan uyuyordum.'],
                    ['g' => 'Immer wenn er müde ist, trinkt er Kaffee.', 't' => 'Ne zaman yorgun olsa kahve içer.'],
                    ['g' => 'Als er das sah, war er schockiert.', 't' => 'Bunu gördüğünde şok oldu.'],
                    ['g' => 'Wir gehen spazieren, wenn die Sonne scheint.', 't' => 'Güneş açarsa yürüyüşe çıkarız.'],
                    ['g' => 'Als ich 18 Jahre alt war, machte ich meinen Führerschein.', 't' => '18 yaşındayken ehliyetimi aldım.'],
                    ['g' => 'Wenn du Hilfe brauchst, sag mir Bescheid.', 't' => 'Eğer yardıma ihtiyacın olursa bana haber ver.'],
                    ['g' => 'Als wir ankamen, war der Zug schon weg.', 't' => 'Vardığımızda tren çoktan gitmişti.'],
                    ['g' => 'Ich freue mich, wenn du kommst.', 't' => 'Gelirsen sevinirim.'],
                    ['g' => 'Als das Telefon klingelte, stand ich auf.', 't' => 'Telefon çaldığında ayağa kalktım.'],
                    ['g' => 'Wenn der Winter kommt, wird es kalt.', 't' => 'Kış gelince hava soğur.'],
                    ['g' => 'Als er die Tür öffnete, sah er den Brief.', 't' => 'Kapıyı açtığında mektubu gördü.'],
                    ['g' => 'Ich bin immer glücklich, wenn ich Musik höre.', 't' => 'Müzik dinlediğimde hep mutlu olurum.'],
                    ['g' => 'Als wir in Spanien waren, war das Wetter toll.', 't' => 'İspanya\'dayken hava harikaydı.'],
                    ['g' => 'Komm schnell, wenn du kannst.', 't' => 'Eğer yapabilirsen hızlı gel.'],
                    ['g' => 'Als sie das hörte, weinte sie.', 't' => 'Bunu duyduğunda ağladı.']
                ],
                'questions' => [
                    ['q' => '___ ich ein Kind war, wollte ich Pilot werden.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Ich trinke Kaffee, ___ ich müde bin.', 'a' => 'wenn', 'w' => ['als', 'dass', 'ob']],
                    ['q' => '___ wir gestern ankamen, war es schon dunkel.', 'a' => 'Als', 'w' => ['Wenn', 'Wann', 'Weil']],
                    ['q' => '___ das Wetter am Wochenende schön ist, fahren wir ans Meer.', 'a' => 'Wenn', 'w' => ['Als', 'Dass', 'Weil']],
                    ['q' => 'Er war sehr traurig, ___ sein Hund weggelaufen ist.', 'a' => 'als', 'w' => ['wenn', 'dass', 'ob']],
                    ['q' => 'Sag mir Bescheid, ___ du fertig bist.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                    ['q' => '___ ich nach Hause kam, lag ein Paket vor der Tür.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Immer ___ ich in Berlin bin, besuche ich das Museum.', 'a' => 'wenn', 'w' => ['als', 'wann', 'ob']],
                    ['q' => '___ sie die Nachricht hörte, begann sie zu weinen.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Wir spielen Fußball, ___ es nicht regnet.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                    ['q' => '___ er 18 wurde, kaufte er ein Auto.', 'a' => 'Als', 'w' => ['Wenn', 'Wann', 'Weil']],
                    ['q' => 'Ich helfe dir, ___ du ein Problem hast.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                    ['q' => '___ das Konzert begann, wurde es still.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Ruf mich an, ___ du am Bahnhof bist.', 'a' => 'wenn', 'w' => ['als', 'wann', 'ob']],
                    ['q' => '___ wir in Paris waren, haben wir den Eiffelturm gesehen.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Er ist glücklich, ___ sie ihm schreibt.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                    ['q' => '___ ich das erste Mal flog, hatte ich Angst.', 'a' => 'Als', 'w' => ['Wenn', 'Wann', 'Weil']],
                    ['q' => 'Kauf bitte Milch, ___ du in den Supermarkt gehst.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                    ['q' => '___ der Lehrer in die Klasse kam, standen die Schüler auf.', 'a' => 'Als', 'w' => ['Wenn', 'Weil', 'Dass']],
                    ['q' => 'Ich gehe spazieren, ___ die Sonne scheint.', 'a' => 'wenn', 'w' => ['als', 'wann', 'dass']],
                ]
            ],
            'Dönüşlü Fiiller (Reflexivverben)' => [
                'desc' => 'Dönüşlü fiiller ve dönüşlü zamirler (mich, dich, sich, uns, euch).',
                'words' => [
                    ['g' => 'sich freuen', 't' => 'sevinmek'], ['g' => 'sich ärgern', 't' => 'kızmak/sinirlenmek'],
                    ['g' => 'sich erinnern', 't' => 'hatırlamak'], ['g' => 'sich interessieren', 't' => 'ilgilenmek'],
                    ['g' => 'sich waschen', 't' => 'yıkanmak'], ['g' => 'sich anziehen', 't' => 'giyinmek'],
                    ['g' => 'sich duschen', 't' => 'duş almak'], ['g' => 'sich rasieren', 't' => 'tıraş olmak'],
                    ['g' => 'sich beeilen', 't' => 'acele etmek'], ['g' => 'sich ausruhen', 't' => 'dinlenmek'],
                    ['g' => 'sich treffen', 't' => 'buluşmak'], ['g' => 'sich unterhalten', 't' => 'sohbet etmek'],
                    ['g' => 'sich verlieben', 't' => 'aşık olmak'], ['g' => 'sich vorstellen', 't' => 'kendini tanıtmak'],
                    ['g' => 'sich kümmern', 't' => 'ilgilenmek/bakmak'], ['g' => 'sich bedanken', 't' => 'teşekkür etmek'],
                    ['g' => 'sich entschuldigen', 't' => 'özür dilemek'], ['g' => 'sich beschweren', 't' => 'şikayet etmek'],
                    ['g' => 'sich fühlen', 't' => 'hissetmek'], ['g' => 'sich setzen', 't' => 'oturmak']
                ],
                'sentences' => [
                    ['g' => 'Ich freue mich auf das Wochenende.', 't' => 'Hafta sonu için seviniyorum/sabırsızlanıyorum.'],
                    ['g' => 'Du wäschst dich jeden Morgen.', 't' => 'Sen her sabah yıkanıyorsun.'],
                    ['g' => 'Er ärgert sich über den Verkehr.', 't' => 'O trafiğe sinirleniyor.'],
                    ['g' => 'Wir treffen uns um acht Uhr.', 't' => 'Saat sekizde buluşuyoruz.'],
                    ['g' => 'Ihr müsst euch beeilen!', 't' => 'Acele etmelisiniz!'],
                    ['g' => 'Sie interessieren sich für Kunst.', 't' => 'Onlar sanatla ilgileniyorlar.'],
                    ['g' => 'Ich ziehe mich schnell an.', 't' => 'Hızlıca giyiniyorum.'],
                    ['g' => 'Erinnerst du dich an mich?', 't' => 'Beni hatırlıyor musun?'],
                    ['g' => 'Er duscht sich kalt.', 't' => 'O soğuk duş alıyor.'],
                    ['g' => 'Wir ruhen uns nach der Arbeit aus.', 't' => 'İşten sonra dinleniyoruz.'],
                    ['g' => 'Zieht ihr euch warm an?', 't' => 'Sıkı mı giyiniyorsunuz?'],
                    ['g' => 'Sie unterhalten sich über Politik.', 't' => 'Politika hakkında sohbet ediyorlar.'],
                    ['g' => 'Ich rasiere mich heute nicht.', 't' => 'Bugün tıraş olmuyorum.'],
                    ['g' => 'Stellst du dich bitte vor?', 't' => 'Lütfen kendini tanıtır mısın?'],
                    ['g' => 'Sie kümmert sich um ihre kleine Schwester.', 't' => 'O küçük kız kardeşiyle ilgileniyor.'],
                    ['g' => 'Wir bedanken uns für die Einladung.', 't' => 'Davet için teşekkür ederiz.'],
                    ['g' => 'Er entschuldigt sich für seinen Fehler.', 't' => 'O hatası için özür diliyor.'],
                    ['g' => 'Die Nachbarn beschweren sich über den Lärm.', 't' => 'Komşular gürültüden şikayet ediyorlar.'],
                    ['g' => 'Wie fühlst du dich heute?', 't' => 'Bugün nasıl hissediyorsun?'],
                    ['g' => 'Setzen Sie sich bitte!', 't' => 'Lütfen oturun!']
                ],
                'questions' => [
                    ['q' => 'Ich freue ___ auf den Urlaub.', 'a' => 'mich', 'w' => ['mir', 'dich', 'sich']],
                    ['q' => 'Du musst ___ beeilen.', 'a' => 'dich', 'w' => ['mich', 'dir', 'sich']],
                    ['q' => 'Er interessiert ___ für Geschichte.', 'a' => 'sich', 'w' => ['mich', 'dich', 'ihn']],
                    ['q' => 'Wir treffen ___ morgen im Café.', 'a' => 'uns', 'w' => ['wir', 'euch', 'sich']],
                    ['q' => 'Könnt ihr ___ bitte vorstellen?', 'a' => 'euch', 'w' => ['uns', 'sich', 'ihr']],
                    ['q' => 'Die Kinder waschen ___ vor dem Essen.', 'a' => 'sich', 'w' => ['sie', 'euch', 'uns']],
                    ['q' => 'Ich erinnere ___ nicht an seinen Namen.', 'a' => 'mich', 'w' => ['mir', 'dich', 'sich']],
                    ['q' => 'Ärgerst du ___ oft über das Wetter?', 'a' => 'dich', 'w' => ['mich', 'dir', 'sich']],
                    ['q' => 'Sie zieht ___ schnell an.', 'a' => 'sich', 'w' => ['ihr', 'sie', 'uns']],
                    ['q' => 'Setzen Sie ___ bitte!', 'a' => 'sich', 'w' => ['Ihnen', 'Sie', 'euch']],
                    ['q' => 'Wir ruhen ___ nach der Arbeit aus.', 'a' => 'uns', 'w' => ['wir', 'euch', 'sich']],
                    ['q' => 'Er entschuldigt ___ für die Verspätung.', 'a' => 'sich', 'w' => ['ihn', 'mich', 'dich']],
                    ['q' => 'Wie fühlst du ___ heute?', 'a' => 'dich', 'w' => ['mich', 'dir', 'sich']],
                    ['q' => 'Ich bedanke ___ für Ihre Hilfe.', 'a' => 'mich', 'w' => ['mir', 'dich', 'sich']],
                    ['q' => 'Habt ihr ___ schon geduscht?', 'a' => 'euch', 'w' => ['uns', 'sich', 'ihr']],
                    ['q' => 'Sie unterhalten ___ über das Buch.', 'a' => 'sich', 'w' => ['sie', 'ihnen', 'uns']],
                    ['q' => 'Mein Vater rasiert ___ jeden Morgen.', 'a' => 'sich', 'w' => ['ihn', 'mich', 'dich']],
                    ['q' => 'Wir kümmern ___ um den Hund.', 'a' => 'uns', 'w' => ['wir', 'euch', 'sich']],
                    ['q' => 'Sie beschwert ___ über das kalte Essen.', 'a' => 'sich', 'w' => ['ihr', 'mich', 'dich']],
                    ['q' => 'Ich habe ___ in sie verliebt.', 'a' => 'mich', 'w' => ['mir', 'sich', 'dich']],
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
