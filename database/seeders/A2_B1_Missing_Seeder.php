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
use Illuminate\Support\Str;

class A2_B1_Missing_Seeder extends Seeder
{
    public function run(): void
    {
        $a2 = Level::where('level_title', 'like', '%A2%')->first();
        $b1 = Level::where('level_title', 'like', '%B1%')->first();

        $topics = [
            'A2' => [
                'Präteritum (Geçmiş Zaman)' => [
                    'words' => [
                        ['war','idi'], ['hatte','sahipti'], ['sagte','dedi'], ['machte','yaptı'], ['ging','gitti'],
                        ['kam','geldi'], ['sah','gördü'], ['aß','yedi'], ['trank','içti'], ['schlief','uyudu'],
                        ['schrieb','yazdı'], ['las','okudu'], ['fuhr','sürdü/gitti'], ['flog','uçtu'], ['dachte','düşündü'],
                        ['wollte','istedi'], ['konnte','yapabildi'], ['musste','zorundaydı'], ['durfte','izinliydi'], ['sollte','gerekiyordu']
                    ],
                    'sentences' => [
                        ['Gestern war das Wetter schön.','Dün hava güzeldi.'],
                        ['Ich hatte keine Zeit.','Vaktim yoktu.'],
                        ['Er sagte mir die Wahrheit.','Bana gerçeği söyledi.'],
                        ['Wir machten einen Ausflug.','Bir gezi yaptık.'],
                        ['Sie ging nach Hause.','O eve gitti.'],
                        ['Der Bus kam pünktlich.','Otobüs zamanında geldi.'],
                        ['Ich sah einen Film.','Bir film gördüm/izledim.'],
                        ['Wir aßen Pizza.','Pizza yedik.'],
                        ['Er trank einen Kaffee.','O bir kahve içti.'],
                        ['Das Kind schlief lange.','Çocuk uzun süre uyudu.'],
                        ['Sie schrieb einen Brief.','O bir mektup yazdı.'],
                        ['Ich las ein Buch.','Bir kitap okudum.'],
                        ['Wir fuhren nach Berlin.','Berlin\'e gittik.'],
                        ['Das Flugzeug flog schnell.','Uçak hızlı uçtu.'],
                        ['Ich dachte an dich.','Seni düşündüm.'],
                        ['Er wollte nicht kommen.','Gelmek istemedi.'],
                        ['Sie konnte gut singen.','O iyi şarkı söyleyebiliyordu.'],
                        ['Ich musste arbeiten.','Çalışmak zorundaydım.'],
                        ['Wir durften hier spielen.','Burada oynamamıza izin vardı.'],
                        ['Er sollte den Arzt rufen.','Doktoru araması gerekiyordu.']
                    ],
                    'questions' => [
                        ['Was ist das Präteritum von "sein" (ich)?','war',['bin','ist','wäre']],
                        ['Was ist das Präteritum von "haben" (er)?','hatte',['hat','hätte','habe']],
                        ['"Gestern ___ ich im Kino."','war',['bin','ist','werde']],
                        ['"Ich ___ keine Lust."','hatte',['habe','bin','war']],
                        ['"Er ___ nach Hause." (gehen)','ging',['geht','gegangen','gehe']],
                        ['"Wir ___ Pizza." (essen)','aßen',['essen','gegessen','esst']],
                        ['"Sie ___ einen Brief." (schreiben)','schrieb',['schreibt','geschrieben','schreibe']],
                        ['"Ich ___ ein Buch." (lesen)','las',['lese','gelesen','lest']],
                        ['"Der Bus ___ zu spät." (kommen)','kam',['kommt','gekommen','komme']],
                        ['"Das Kind ___ tief." (schlafen)','schlief',['schläft','geschlafen','schlafe']],
                        ['"Wir ___ nach Izmir." (fahren)','fuhren',['fahren','gefahren','fahrt']],
                        ['"Ich ___ an meine Mutter." (denken)','dachte',['denke','gedacht','denkst']],
                        ['"Er ___ nicht arbeiten." (wollen)','wollte',['will','gewollt','wollten']],
                        ['"Sie ___ gut schwimmen." (können)','konnte',['kann','gekonnt','könnten']],
                        ['"Wir ___ die Hausaufgaben machen." (müssen)','mussten',['müssen','gemusst','müssten']],
                        ['"Ich ___ fernsehen." (dürfen)','durfte',['darf','gedurft','dürften']],
                        ['"Man ___ leise sein." (sollen)','sollte',['soll','gesollt','sollen']],
                        ['Was ist das Präteritum von "sehen"?','sah',['sieht','gesehen','sehe']],
                        ['Was ist das Präteritum von "trinken"?','trank',['trinkt','getrunken','trinke']],
                        ['"Gestern ___ es." (regnen)','regnete',['regnet','geregnet','regnen']]
                    ]
                ],
                'İlgi Cümleleri (Relativsätze)' => [
                    'words' => [
                        ['der','ki o (eril)'], ['die','ki o (dişil)'], ['das','ki o (nötr)'], ['die (Pl.)','ki onlar'],
                        ['den (Akk.)','ki onu (eril)'], ['dem (Dat.)','ki ona (eril/nötr)'], ['der (Dat.)','ki ona (dişil)'],
                        ['dessen (Gen.)','ki onun (eril/nötr)'], ['deren (Gen.)','ki onun (dişil/çoğul)'],
                        ['der Mann, der...','... olan adam'], ['die Frau, die...','... olan kadın'], ['das Kind, das...','... olan çocuk'],
                        ['die Leute, die...','... olan insanlar'], ['das Auto, das...','... olan araba'],
                        ['das Haus, in dem...','içinde ... olan ev'], ['der Freund, mit dem...','birlikte ... olan arkadaş'],
                        ['die Stadt, aus der...','geldiği ... şehir'], ['das Buch, von dem...','hakkında ... olan kitap'],
                        ['alles, was...','... olan her şey'], ['jemand, der...','... olan birisi']
                    ],
                    'sentences' => [
                        ['Das ist der Mann, der in Berlin wohnt.','Bu Berlin\'de yaşayan adam.'],
                        ['Ich kenne die Frau, die dort arbeitet.','Orada çalışan kadını tanıyorum.'],
                        ['Das ist das Kind, das weint.','Bu ağlayan çocuk.'],
                        ['Die Leute, die hier wohnen, sind nett.','Burada yaşayan insanlar nazik.'],
                        ['Ich sehe den Hund, den du suchst.','Aradığın köpeği görüyorum.'],
                        ['Das ist der Freund, dem ich helfe.','Bu yardım ettiğim arkadaş.'],
                        ['Die Frau, der das Auto gehört, ist meine Tante.','Arabanın ait olduğu kadın teyzem.'],
                        ['Das ist das Haus, in dem ich lebe.','Bu benim yaşadığım ev.'],
                        ['Der Mann, mit dem ich sprach, ist Lehrer.','Konuştuğum adam öğretmen.'],
                        ['Das ist die Stadt, aus der ich komme.','Bu benim geldiğim şehir.'],
                        ['Das Buch, das auf dem Tisch liegt, ist neu.','Masanın üzerinde duran kitap yeni.'],
                        ['Die Tasche, die rot ist, gehört mir.','Kırmızı olan çanta bana ait.'],
                        ['Das ist der Schlüssel, den ich verloren habe.','Bu kaybettiğim anahtar.'],
                        ['Der Film, den wir sahen, war gut.','İzlediğimiz film iyiydi.'],
                        ['Die Kinder, die spielen, sind fröhlich.','Oynayan çocuklar neşeli.'],
                        ['Das ist das Geschenk, das ich dir schenke.','Bu sana verdiğim hediye.'],
                        ['Der Kaffee, den ich trinke, ist heiß.','İçtiğim kahve sıcak.'],
                        ['Die Pizza, die wir essen, schmeckt gut.','Yediğimiz pizza lezzetli.'],
                        ['Das ist der Weg, den wir gehen müssen.','Bu gitmemiz gereken yol.'],
                        ['Die Aufgabe, die ich mache, ist schwer.','Yaptığım görev zor.']
                    ],
                    'questions' => [
                        ['Das ist der Mann, ___ dort steht.','der',['den','dem','die']],
                        ['Ich kenne die Frau, ___ Klavier spielt.','die',['der','das','den']],
                        ['Das ist das Kind, ___ im Garten spielt.','das',['der','die','den']],
                        ['Ich suche den Hund, ___ ich gestern sah.','den',['der','dem','das']],
                        ['Das ist der Freund, ___ ich ein Geschenk gebe.','dem',['der','den','die']],
                        ['Die Frau, ___ das Haus gehört, ist nett.','der',['die','den','dem']],
                        ['Das ist das Buch, ___ ich lese.','das',['der','die','den']],
                        ['Die Leute, ___ hier wohnen, sind Freunde.','die',['der','das','den']],
                        ['Der Mann, mit ___ ich spreche, ist mein Chef.','dem',['der','den','die']],
                        ['Das ist die Stadt, aus ___ ich komme.','der',['die','das','den']],
                        ['Der Film, ___ wir sehen, ist spannend.','den',['der','das','dem']],
                        ['Die Tasche, ___ dort liegt, ist blau.','die',['der','das','den']],
                        ['Das Geschenk, ___ du mir gibst, ist schön.','das',['der','die','den']],
                        ['Der Kaffee, ___ er trinkt, ist kalt.','den',['der','das','dem']],
                        ['Die Kinder, ___ im Park sind, lachen.','die',['der','das','den']],
                        ['Das ist der Weg, ___ ich kenne.','den',['der','das','dem']],
                        ['Die Aufgabe, ___ wir lösen, ist einfach.','die',['der','das','den']],
                        ['Der Schlüssel, ___ auf dem Tisch liegt, ist alt.','der',['den','dem','das']],
                        ['Das Auto, ___ er fährt, ist teuer.','das',['der','die','den']],
                        ['Die Pizza, ___ sie isst, ist groß.','die',['der','das','den']]
                    ]
                ]
            ],
            'B1' => [
                'Gelecek Zaman (Futur I)' => [
                    'words' => [
                        ['werden','olmak/ecek-acak'], ['ich werde','olacağım'], ['du wirst','olacaksın'],
                        ['er wird','olacak'], ['wir werden','olacağız'], ['ihr werdet','olacaksınız'],
                        ['sie werden','olacaklar'], ['nächstes Jahr','gelecek yıl'], ['bald','yakında'],
                        ['später','sonra'], ['in Zukunft','gelecekte'], ['vielleicht','belki'],
                        ['bestimmt','kesinlikle'], ['wahrscheinlich','muhtemelen'], ['hoffen','ummak'],
                        ['glauben','inanmak/sanmak'], ['planen','planlamak'], ['die Reise','yolculuk'],
                        ['der Job','iş'], ['das Ziel','hedef']
                    ],
                    'sentences' => [
                        ['Ich werde morgen nach Berlin fahren.','Yarın Berlin\'e gideceğim.'],
                        ['Du wirst die Prüfung bestehen.','Sınavı geçeceksin.'],
                        ['Er wird bald kommen.','Yakında gelecek.'],
                        ['Wir werden im Sommer Urlaub machen.','Yazın tatil yapacağız.'],
                        ['Ihr werdet viel lernen.','Çok öğreneceksiniz.'],
                        ['Sie werden ein neues Haus kaufen.','Yeni bir ev alacaklar.'],
                        ['Nächstes Jahr werde ich fließen Deutsch sprechen.','Gelecek yıl akıcı Almanca konuşacağım.'],
                        ['Es wird morgen regnen.','Yarın yağmur yağacak.'],
                        ['Ich werde dir helfen.','Sana yardım edeceğim.'],
                        ['Wir werden das Ziel erreichen.','Hedefe ulaşacağız.'],
                        ['Was wirst du am Wochenende machen?','Hafta sonu ne yapacaksın?'],
                        ['Sie wird Ärztin werden.','O doktor olacak.'],
                        ['Ich glaube, das Wetter wird schön werden.','Bence hava güzel olacak.'],
                        ['Wir werden uns bald wiedersehen.','Yakında tekrar görüşeceğiz.'],
                        ['Werden Sie morgen arbeiten?','Yarın çalışacak mısınız?'],
                        ['Ich werde nie aufgeben.','Asla pes etmeyeceğim.'],
                        ['Wirst du mich anrufen?','Beni arayacak mısın?'],
                        ['Das werde ich nicht vergessen.','Bunu unutmayacağım.'],
                        ['Vielleicht wird er kommen.','Belki gelir.'],
                        ['Ich werde ein Buch schreiben.','Bir kitap yazacağım.']
                    ],
                    'questions' => [
                        ['"Ich ___ morgen kommen." (Futur I)','werde',['wird','wirst','werden']],
                        ['"Du ___ das schaffen!"','wirst',['werde','wird','werden']],
                        ['"Er ___ Arzt."','wird',['werde','wirst','werden']],
                        ['"Wir ___ im Sommer reisen."','werden',['werde','wird','wirst']],
                        ['"Ihr ___ viel Spaß haben."','werdet',['werde','wird','werden']],
                        ['"Sie ___ morgen anrufen."','werden',['werde','wird','wirst']],
                        ['"Was ___ du machen?"','wirst',['werde','wird','werden']],
                        ['"Es ___ regnen."','wird',['werde','wirst','werden']],
                        ['"Ich ___ dir helfen."','werde',['wird','wirst','werden']],
                        ['"Wir ___ gewinnen."','werden',['werde','wird','wirst']],
                        ['"Futur I" wird mit ___ + Infinitiv gebildet.','werden',['sein','haben','wollen']],
                        ['"Sie ___ Ärztin." (O olacak)','wird',['werde','werden','wirst']],
                        ['"Nächstes Jahr ___ ich nach Japan fliegen."','werde',['wird','wirst','werden']],
                        ['"Ich hoffe, du ___ gesund."','wirst',['werde','wird','werden']],
                        ['"Wir ___ uns bald sehen."','werden',['werde','wird','wirst']],
                        ['"Wirst du ___?" (çalışacak mısın)','arbeiten',['gearbeitet','arbeitet','arbeitest']],
                        ['"Ich werde es ___." (yapacağım)','machen',['gemacht','macht','machst']],
                        ['"Vielleicht ___ es schneien."','wird',['werde','wirst','werden']],
                        ['"Werdet ihr ___?" (gelecek misiniz)','kommen',['gekommen','kommt','kommst']],
                        ['"Ich werde nie ___." (unutmayacağım)','vergessen',['vergessen haben','vergesse','vergisst']]
                    ]
                ]
            ]
        ];

        foreach ($topics as $lvlCode => $lvlTopics) {
            $level = ($lvlCode == 'A2') ? $a2 : $b1;
            if (!$level) continue;

            $orderIndex = 100;
            foreach ($lvlTopics as $title => $data) {
                $lesson = Lesson::updateOrCreate([
                    'lesson_title' => $title
                ], [
                    'level_id' => $level->id,
                    'lesson_description_tr' => $title . ' üzerine kapsamlı ders.',
                    'lesson_image' => 'assets/img/logo.png',
                    'order_index' => $orderIndex++,
                    'is_active' => true
                ]);

                foreach ($data['words'] as $idx => $word) {
                    Word::updateOrCreate([
                        'lesson_id' => $lesson->id,
                        'word_german' => $word[0]
                    ], [
                        'word_turkish' => $word[1],
                        'order_index' => $idx + 1,
                        'is_active' => true
                    ]);
                }

                $exercise = Exercise::updateOrCreate(['lesson_id' => $lesson->id], ['title' => $title . ' Alıştırmaları', 'is_active' => true]);
                $exercise->items()->delete();
                foreach ($data['sentences'] as $idx => $sentence) {
                    ExerciseItem::create(['exercise_id' => $exercise->id, 'german' => $sentence[0], 'turkish' => $sentence[1], 'order_index' => $idx + 1]);
                }

                $test = Test::updateOrCreate(['lesson_id' => $lesson->id], ['test_title' => $title . ' Testi', 'is_active' => true]);
                $test->questions()->delete();
                foreach ($data['questions'] as $idx => $qData) {
                    $q = Question::create(['lesson_id' => $lesson->id, 'question_text' => $qData[0], 'question_type' => 'multiple_choice', 'explanation' => '', 'order_index' => $idx + 1, 'is_active' => true]);
                    $q->answers()->create(['answer_text' => $qData[1], 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                    foreach ($qData[2] as $wIdx => $wrong) $q->answers()->create(['answer_text' => $wrong, 'is_correct' => false, 'order_index' => $wIdx + 2, 'is_active' => true]);
                    $test->questions()->attach($q->id, ['order_index' => $idx + 1]);
                }
                echo "OK: $title\n";
            }
        }
    }
}
