<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Test;
use App\Models\Question;

class C_Levels_Seeder extends Seeder
{
    public function run(): void
    {
        $allData = [
            'C1.1 İleri Seviye' => [
                'order' => 8,
                'desc' => 'Modal partikeller, akademik yazım ve ileri düzey deyimler.',
                'lessons' => [
                    'Modal Partikeller (Modalpartikeln)' => [
                        'words' => [
                            ['doch','pekiştirme/zıtlık bildiren partikel'],['ja','bilinen bir şeyi vurgulayan partikel'],
                            ['halt','kabul/çaresizlik bildiren partikel (Güney Almanya)'],['eben','işte böyle/tam da'],
                            ['wohl','galiba/sanırım'],['eigentlich','aslında/gerçekte'],
                            ['bloß','sadece/yalnızca (uyarı)'],['nur','sadece (kısıtlama)'],
                            ['mal','bir an için/şöyle bir (yumuşatma)'],['schon','zaten/tabii ki'],
                            ['noch','hâlâ/dahası'],['immer noch','hâlâ devam ediyor'],
                            ['schließlich','sonuçta/nihayetinde'],['überhaupt','hiç/genel olarak'],
                            ['sowieso','nasılsa/zaten'],['ohnehin','nasılsa/zaten'],
                            ['allerdings','gerçi/şu var ki'],['freilich','elbette (resmi)'],
                            ['ruhig','rahatça/çekinmeden'],['etwa','yoksa/acaba (soru)'],
                        ],
                        'sentences' => [
                            ['Das weißt du doch.','Bunu zaten biliyorsun.'],
                            ['Das ist ja interessant!','Bu gerçekten ilginç!'],
                            ['Das ist halt so.','İşte böyle, yapacak bir şey yok.'],
                            ['Das ist eben das Problem.','İşte tam da bu problem.'],
                            ['Er ist wohl noch nicht da.','Galiba henüz orada değil.'],
                            ['Was willst du eigentlich?','Aslında ne istiyorsun?'],
                            ['Komm bloß nicht zu spät!','Sakın geç kalma!'],
                            ['Ich habe nur eine Frage.','Sadece bir sorum var.'],
                            ['Schau mal, wie schön das ist!','Bir bak, ne kadar güzel!'],
                            ['Das habe ich schon gewusst.','Bunu zaten biliyordum.'],
                            ['Er ist immer noch nicht da.','O hâlâ orada değil.'],
                            ['Schließlich bist du der Chef.','Sonuçta sen bossun.'],
                            ['Hast du das überhaupt verstanden?','Bunu hiç anladın mı?'],
                            ['Das macht er sowieso nicht.','Nasılsa onu yapmaz.'],
                            ['Ich gehe ohnehin dorthin.','Ben nasılsa oraya gidiyorum.'],
                            ['Es ist allerdings nicht einfach.','Gerçi kolay değil.'],
                            ['Das ist freilich richtig.','Bu elbette doğrudur.'],
                            ['Du kannst ruhig fragen.','Çekinmeden sorabilirsin.'],
                            ['Ist das etwa falsch?','Bu yanlış mı yoksa?'],
                            ['Du hast doch keine Zeit!','Zamanın yok ki!'],
                        ],
                        'questions' => [
                            ['"Das weißt du ___." - Welches Partikel passt?','doch',['ja','halt','mal']],
                            ['"Das ist ___ interessant!" - Ausdruck der Überraschung','ja',['doch','halt','eben']],
                            ['"Das ist ___ so." - Resignation/Akzeptanz','halt',['doch','ja','wohl']],
                            ['"Das ist ___ das Problem." - Genau das','eben',['doch','ja','halt']],
                            ['"Er ist ___ noch nicht da." - Vermutung','wohl',['doch','ja','halt']],
                            ['"Was willst du ___?" - im Grunde','eigentlich',['wohl','doch','ja']],
                            ['"Komm ___ nicht zu spät!" - dringende Warnung','bloß',['mal','nur','schon']],
                            ['"Schau ___, wie schön!" - Aufforderung zum Hinschauen','mal',['bloß','nur','schon']],
                            ['"Das habe ich ___ gewusst." - von Anfang an','schon',['mal','bloß','noch']],
                            ['"Er ist immer ___ nicht da." - fortdauernd','noch',['schon','mal','bloß']],
                            ['"___ bist du der Chef." - letztendlich','Schließlich',['Wohl','Eigentlich','Eben']],
                            ['"Hast du das ___ verstanden?" - in Frage stellen','überhaupt',['schon','mal','halt']],
                            ['"Das macht er ___ nicht." - wie erwartet','sowieso',['ohnehin','schon','mal']],
                            ['"Es ist ___ nicht einfach." - Einschränkung','allerdings',['schließlich','ohnehin','sowieso']],
                            ['"Du kannst ___ fragen." - Ermutigung','ruhig',['mal','bloß','eben']],
                            ['"Ist das ___ falsch?" - überraschte Frage','etwa',['wohl','doch','ja']],
                            ['"Du hast ___ keine Zeit!" - Widerspruch','doch',['ja','halt','mal']],
                            ['"Das ist ___ richtig." - formelle Bestätigung','freilich',['allerdings','schließlich','eigentlich']],
                            ['Modalpartikeln ___ die Aussage eines Satzes.','färben',['ändern','ersetzen','negieren']],
                            ['"Ohnehin" ist ein Synonym für ___.','sowieso',['allerdings','eigentlich','wohl']],
                        ],
                    ],
                ],
            ],
            'C2.1 Üst Düzey' => [
                'order' => 9,
                'desc' => 'Anadil düzeyine yakın dil kullanımı. Nüanslar, deyimler ve edebi dil.',
                'lessons' => [
                    'Deyimler ve Atasözleri (Redewendungen & Sprichwörter)' => [
                        'words' => [
                            ['Morgenstund hat Gold im Mund.','Erken kalkan yol alır.'],
                            ['Das ist nicht mein Bier.','Bu benim işim değil.'],
                            ['Die Katze aus dem Sack lassen.','Gerçeği ortaya çıkarmak.'],
                            ['Eulen nach Athen tragen.','Deve kuşu ile deve olmak. (gereksiz şey götürmek)'],
                            ['Das Handtuch werfen.','Pes etmek / havlu atmak.'],
                            ['Auf den Busch klopfen.','Dolaylı yoldan bilgi almaya çalışmak.'],
                            ['Den Nagel auf den Kopf treffen.','Tam on ikiden vurmak.'],
                            ['Schwein haben.','Şans getirmek / şanslı olmak.'],
                            ['Ins Fettnäpfchen treten.','Pot kırmak.'],
                            ['Jemandem auf den Zahn fühlen.','Birisini sorgulamak/yoklamak.'],
                            ['Alles hat ein Ende, nur die Wurst hat zwei.','Her şeyin bir sonu vardır.'],
                            ['Wie man in den Wald ruft, so schallt es heraus.','Ne ekersen onu biçersin.'],
                            ['Viele Köche verderben den Brei.','Çok aşçı yemeği bozar.'],
                            ['Übung macht den Meister.','Pratik yapmak ustayı yaratır.'],
                            ['Der Apfel fällt nicht weit vom Stamm.','Armut dibine düşer.'],
                            ['Andere Länder, andere Sitten.','Başka ülkeler, başka adetler.'],
                            ['Wer zuletzt lacht, lacht am besten.','En son gülen en iyi güler.'],
                            ['Reden ist Silber, Schweigen ist Gold.','Söz gümüş, sükut altındır.'],
                            ['Ausnahmen bestätigen die Regel.','İstisnalar kuralı kanıtlar.'],
                            ['Ein Unglück kommt selten allein.','Musibetler genelde tek gelmez.'],
                        ],
                        'sentences' => [
                            ['Er hat wirklich den Nagel auf den Kopf getroffen.','O gerçekten tam on ikiden vurdu.'],
                            ['Sie hat Schwein gehabt - sie hat die Prüfung bestanden.','Şansı varmış - sınavı geçti.'],
                            ['Ich habe ins Fettnäpfchen getreten, als ich seinen Namen falsch sagte.','İsmini yanlış söyleyerek pot kırdım.'],
                            ['Es ist Zeit, das Handtuch zu werfen.','Havluyu atmak zamanı geldi.'],
                            ['Er ließ endlich die Katze aus dem Sack.','O sonunda gerçeği ortaya çıkardı.'],
                            ['Übung macht den Meister - also übe jeden Tag!','Pratik ustayı yaratır - o yüzden her gün pratik yap!'],
                            ['Das ist nicht mein Bier - frag jemand anderen.','Bu benim işim değil - başkasına sor.'],
                            ['Viele Köche verderben den Brei - lass nur eine Person entscheiden.','Çok aşçı yemeği bozar - sadece bir kişinin karar vermesine izin ver.'],
                            ['Der Apfel fällt nicht weit vom Stamm - er ist wie sein Vater.','Armut dibine düşer - o, babası gibi.'],
                            ['Wer zuletzt lacht, lacht am besten.','En son gülen en iyi güler.'],
                            ['Reden ist Silber, Schweigen ist Gold - manchmal ist es besser, nichts zu sagen.','Söz gümüş, sükut altın - bazen hiçbir şey söylememek daha iyidir.'],
                            ['Andere Länder, andere Sitten - du musst dich anpassen.','Başka ülkeler, başka adetler - uyum sağlamalısın.'],
                            ['Morgenstund hat Gold im Mund - deswegen stehe ich früh auf.','Erken kalkan yol alır - bu yüzden erken kalkıyorum.'],
                            ['Er hat mich auf den Zahn gefühlt.','O beni sorguladı.'],
                            ['Ausnahmen bestätigen die Regel.','İstisnalar kuralı kanıtlar.'],
                            ['Ein Unglück kommt selten allein - erst der Unfall, dann die Kündigung.','Musibetler tek gelmez - önce kaza, sonra işten çıkarılma.'],
                            ['Wie man in den Wald ruft, so schallt es heraus.','Ne ekersen onu biçersin.'],
                            ['Er klopft auf den Busch, um mehr Informationen zu bekommen.','Daha fazla bilgi almak için dolaylı yoldan sordu.'],
                            ['Du trägst Eulen nach Athen, wenn du Eis in die Antarktis bringst.','Antarktika\'ya buz götürürsen boşa uğraşmış olursun.'],
                            ['Alles hat ein Ende - auch dieser Kurs.','Her şeyin bir sonu vardır - bu kursun da.'],
                        ],
                        'questions' => [
                            ['"Den Nagel auf den Kopf treffen" bedeutet ___','genau das Richtige sagen',['einen Fehler machen','laut schlagen','etwas vergessen']],
                            ['"Schwein haben" bedeutet ___','Glück haben',['krank sein','ein Tier kaufen','unglücklich sein']],
                            ['"Ins Fettnäpfchen treten" bedeutet ___','etwas Unpassendes tun',['eine Küche betreten','Fett kaufen','Recht haben']],
                            ['"Das Handtuch werfen" bedeutet ___','aufgeben',['sich waschen','kämpfen','anfangen']],
                            ['"Die Katze aus dem Sack lassen" bedeutet ___','ein Geheimnis enthüllen',['eine Katze kaufen','lügen','flüchten']],
                            ['"Viele Köche verderben den Brei" bedeutet ___','zu viele Leute erschweren die Aufgabe',['Kochen ist schwer','Brei schmeckt nicht','Köche sind faul']],
                            ['"Übung macht den Meister" - was ist die Aussage?','Durch Üben wird man besser',['Meister üben nicht','Talente sind angeboren','Theorie ist wichtiger']],
                            ['"Der Apfel fällt nicht weit vom Stamm" bedeutet ___','Kinder ähneln ihren Eltern',['Äpfel sind lecker','Bäume sind groß','Früchte fallen']],
                            ['"Reden ist Silber, Schweigen ist Gold" - was ist besser?','manchmal Schweigen',['immer Reden','lautes Reden','Singen']],
                            ['"Morgenstund hat Gold im Mund" - wann ist man am produktivsten?','am Morgen',['am Abend','in der Nacht','am Mittag']],
                            ['"Andere Länder, andere ___"','Sitten',['Sprachen','Gesetze','Währungen']],
                            ['"Ein Unglück kommt selten ___"','allein',['früh','schnell','alleine']],
                            ['"Ausnahmen bestätigen die ___"','Regel',['Norm','Ausnahme','Sprache']],
                            ['"Wer zuletzt lacht, lacht am ___"','besten',['lautesten','längsten','meisten']],
                            ['"Wie man in den ___ ruft, so schallt es heraus."','Wald',['See','Berg','Park']],
                            ['"Das ist nicht mein ___" (Redewendung)','Bier',['Problem','Haus','Auto']],
                            ['"Auf den ___ klopfen" = indirekt fragen','Busch',['Tisch','Kopf','Nagel']],
                            ['"Jemandem auf den ___ fühlen" = ausfragen','Zahn',['Kopf','Arm','Rücken']],
                            ['"Eulen nach ___ tragen" = etwas Unnötiges tun','Athen',['Berlin','Rom','Paris']],
                            ['Ein deutsches Sprichwort über Fleiß: "Übung macht den ___.','Meister',['Besten','Experten','Sieger']],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($allData as $levelTitle => $levelData) {
            $level = Level::firstOrCreate(
                ['level_title' => $levelTitle],
                ['level_slug' => Str::slug($levelTitle), 'level_description' => $levelData['desc'], 'order_index' => $levelData['order'], 'is_active' => true]
            );

            $lessonOrder = 1;
            foreach ($levelData['lessons'] as $lessonTitle => $data) {
                $lesson = Lesson::firstOrCreate(
                    ['lesson_title' => $lessonTitle],
                    ['level_id' => $level->id, 'lesson_description_tr' => $lessonTitle, 'lesson_image' => 'assets/img/logo.png', 'order_index' => $lessonOrder++, 'is_active' => true]
                );

                foreach ($data['words'] as $idx => [$g, $t]) {
                    Word::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'word_german' => $g],
                        ['word_turkish' => $t, 'order_index' => $idx + 1, 'is_active' => true]
                    );
                }

                $exercise = Exercise::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'title' => $lessonTitle . ' Alıştırmaları'],
                    ['order_index' => 1, 'is_active' => true]
                );
                $exercise->items()->delete();
                foreach ($data['sentences'] as $idx => [$g, $t]) {
                    ExerciseItem::create(['exercise_id' => $exercise->id, 'german' => $g, 'turkish' => $t, 'order_index' => $idx + 1]);
                }

                $test = Test::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'test_title' => $lessonTitle . ' Testi'],
                    ['description' => '20 soruluk pekiştirme testi.', 'is_active' => true]
                );

                $sync = [];
                foreach ($data['questions'] as $idx => $q) {
                    $question = Question::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'question_text' => $q[0]],
                        ['question_type' => 'multiple_choice', 'order_index' => $idx + 1, 'is_active' => true, 'explanation' => '', 'media_url' => '']
                    );
                    if ($question->answers()->count() === 0) {
                        $question->answers()->create(['answer_text' => $q[1], 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                        foreach ($q[2] as $wi => $w) {
                            $question->answers()->create(['answer_text' => $w, 'is_correct' => false, 'order_index' => $wi + 2, 'is_active' => true]);
                        }
                    }
                    $sync[$question->id] = ['order_index' => $idx + 1];
                }
                $test->questions()->sync($sync);
                echo "OK: $lessonTitle\n";
            }
        }
    }
}
