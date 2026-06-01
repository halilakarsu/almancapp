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

class Goethe_B1_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::where('level_title', 'like', '%B1%')->first();
        
        $data = [
            'B1 Goethe: Politika ve Toplum' => [
                'words' => [
                    ['die Demokratie','demokrasi'],['der Staat','devlet'],['die Regierung','hükümet'],['das Parlament','parlamento'],
                    ['der Politiker','politikacı'],['die Wahl','seçim'],['wählen','seçmek/oy vermek'],['die Freiheit','özgürlük'],
                    ['das Gesetz','yasa/kanun'],['die Kontrolle','kontrol/denetim'],['das Gericht','mahkeme'],['der Anwalt','avukat'],
                    ['die Reform','reform'],['der Protest','protesto'],['die Krise','kriz'],['die Mehrheit','çoğunluk'],
                    ['die Minderheit','azınlık'],['die Gesellschaft','toplum'],['der Bürger','vatandaş'],['das Recht','hak/hukuk']
                ],
                'sentences' => [
                    ['Die Politiker analysieren die Situation.','Politikacılar durumu analiz ediyor.'],
                    ['Wir müssen immer mehr Steuern zahlen.','Gittikçe daha fazla vergi ödemek zorundayız.'],
                    ['Das Parlament hat ein neues Gesetz beschlossen.','Parlamento yeni bir yasa kabul etti.'],
                    ['Die Regierung plant für nächstes Jahr eine Reform.','Hükümet gelecek yıl için bir reform planlıyor.'],
                    ['Es herrscht noch immer Krieg in diesem Land.','Bu ülkede hâlâ savaş hüküm sürüyor.'],
                    ['Die Wahl findet im Rathaus statt.','Seçim belediye binasında yapılıyor.'],
                    ['Wir wollen die Freiheit haben, unsere Meinung zu sagen.','Fikrimizi söyleme özgürlüğüne sahip olmak istiyoruz.'],
                    ['Ich muss unbedingt mit meinem Anwalt sprechen.','Mutlaka avukatımla konuşmam gerekiyor.'],
                    ['An den Grenzen gibt es kaum noch Kontrollen.','Sınırlarda artık neredeyse hiç kontrol yok.'],
                    ['Ich habe heute einen Termin beim Gericht.','Bugün mahkemede bir randevum var.'],
                    ['Alle Zeitungen haben über den Vorfall berichtet.','Tüm gazeteler olay hakkında haber yaptı.'],
                    ['Die Mehrheit der Menschen besitzt ein Handy.','İnsanların çoğunluğu bir cep telefonuna sahip.'],
                    ['Frauen sind in unserer Firma in der Minderheit.','Kadınlar şirketimizde azınlıkta.'],
                    ['Er will die Gesellschaft verändern.','Toplumu değiştirmek istiyor.'],
                    ['EU-Bürger können überall in Europa arbeiten.','AB vatandaşları Avrupa\'nın her yerinde çalışabilir.'],
                    ['Nach deutschem Recht ist das verboten.','Alman hukukuna göre bu yasaktır.'],
                    ['Die Wirtschaft steckt in einer schweren Krise.','Ekonomi ağır bir kriz içinde.'],
                    ['Das ist gegen die Vorschrift.','Bu yönetmeliğe aykırı.'],
                    ['Wir streiken für eine Lohnerhöhung.','Maaş artışı için grev yapıyoruz.'],
                    ['Die Polizei hat den Täter endlich gefasst.','Polis suçluyu sonunda yakaladı.']
                ]
            ],
            'B1 Goethe: Çevre ve Ekoloji' => [
                'words' => [
                    ['die Umwelt','çevre'],['der Umweltschutz','çevreyi koruma'],['das Klima','iklim'],['der Strom','elektrik/akım'],
                    ['die Energie','enerji'],['sparen','tasarruf etmek'],['schützen','korumak'],['die Natur','doğa'],
                    ['das Gift','zehir'],['giftig','zehirli'],['der Abfall','atık/çöp'],['die Luft','hava'],
                    ['sauber','temiz'],['schmutzig','kirli'],['die Sonne','güneş'],['der Wind','rüzgar'],
                    ['das Benzin','benzin'],['das Gas','gaz'],['der Müll','çöp'],['das Recycling','geri dönüşüm']
                ],
                'sentences' => [
                    ['Umweltschutz ist ein aktuelles Thema.','Çevreyi koruma güncel bir konu.'],
                    ['Wir müssen Energie sparen.','Enerji tasarrufu yapmalıyız.'],
                    ['Das Wetter hat sich geändert.','Hava değişti.'],
                    ['Wie kann ich im Haushalt Strom sparen?','Evde nasıl elektrik tasarrufu yapabilirim?'],
                    ['Bitte mach das Fenster auf. Ich brauche frische Luft.','Lütfen pencereyi aç. Taze havaya ihtiyacım var.'],
                    ['Vorsicht, das Gift dieser Pflanze ist gefährlich!','Dikkat, bu bitkinin zehri tehlikelidir!'],
                    ['Werfen Sie den Bioabfall bitte nicht zum normalen Müll.','Lütfen biyolojik atıkları normal çöpe atmayın.'],
                    ['Die Seeluft tut mir gut.','Deniz havası bana iyi geliyor.'],
                    ['Morgen wird es wahrscheinlich regnen.','Yarın muhtemelen yağmur yağacak.'],
                    ['Wir haben den ganzen Mai durch geheizt.','Tüm Mayıs ayı boyunca ısıtıcıyı çalıştırdık.'],
                    ['Das Benzin soll wieder teurer werden.','Benzin yine pahalanacakmış.'],
                    ['Wir kochen mit Gas.','Gazla yemek pişiriyoruz.'],
                    ['Bringst du bitte den Müll raus?','Lütfen çöpü dışarı çıkarır mısın?'],
                    ['Die Müllabfuhr kommt zweimal pro Woche.','Çöp toplama haftada iki kez geliyor.'],
                    ['Wir müssen den Müll trennen.','Çöpleri ayırmalıyız.'],
                    ['Dort an der Ampel kannst du über die Straße gehen.','Oradaki trafik ışığında karşıya geçebilirsin.'],
                    ['Das Wasser ist so rein, dass man es trinken kann.','Su o kadar temiz ki içilebilir.'],
                    ['Die Bäume blühen schon. Es ist Frühling.','Ağaçlar çoktan çiçek açtı. Bahar geldi.'],
                    ['Hier ist es sehr windig.','Burası çok rüzgarlı.'],
                    ['Wir müssen die Natur schützen.','Doğayı korumalıyız.']
                ]
            ]
        ];

        $orderIndex = 400;

        foreach ($data as $title => $content) {
            $lesson = Lesson::updateOrCreate(['lesson_title' => $title], [
                'level_id' => $level->id,
                'lesson_description_tr' => $title . ' Goethe B1 Müfredatı',
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $orderIndex++,
                'is_active' => true
            ]);

            foreach ($content['words'] as $idx => $w) {
                Word::updateOrCreate(['lesson_id' => $lesson->id, 'word_german' => $w[0]], [
                    'word_turkish' => $w[1], 'order_index' => $idx + 1, 'is_active' => true
                ]);
            }

            $ex = Exercise::updateOrCreate(['lesson_id' => $lesson->id], ['title' => $title . ' Alıştırmaları', 'is_active' => true]);
            $ex->items()->delete();
            foreach ($content['sentences'] as $idx => $s) {
                ExerciseItem::create(['exercise_id' => $ex->id, 'german' => $s[0], 'turkish' => $s[1], 'order_index' => $idx + 1]);
            }

            $test = Test::updateOrCreate(['lesson_id' => $lesson->id], ['test_title' => $title . ' Testi', 'is_active' => true]);
            $test->questions()->delete();
            foreach ($content['sentences'] as $idx => $s) {
                $q = Question::create([
                    'lesson_id' => $lesson->id,
                    'question_text' => '"' . $s[1] . '" cümlesinin Almancası nedir?',
                    'question_type' => 'multiple_choice',
                    'explanation' => '',
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
                $q->answers()->create(['answer_text' => $s[0], 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                $wrongs = array_diff(array_column($content['sentences'], 0), [$s[0]]);
                shuffle($wrongs);
                foreach (array_slice($wrongs, 0, 3) as $wi => $w) {
                    $q->answers()->create(['answer_text' => $w, 'is_correct' => false, 'order_index' => $wi + 2, 'is_active' => true]);
                }
                $test->questions()->attach($q->id, ['order_index' => $idx + 1]);
            }
            echo "OK: $title\n";
        }
    }
}
