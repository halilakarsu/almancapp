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

class Goethe_A2_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::where('level_title', 'like', '%A2%')->first();
        
        $data = [
            'A2 Goethe: Meslekler ve İş' => [
                'words' => [
                    ['der Arzt','doktor'],['der Lehrer','öğretmen'],['der Verkäufer','satıcı'],['der Handwerker','zanaatkar/usta'],
                    ['der Koch','aşçı'],['der Fahrer','şoför'],['der Journalist','gazeteci'],['der Ingenieur','mühendis'],
                    ['die Arbeit','iş'],['der Arbeitsplatz','iş yeri'],['arbeitslos','işsiz'],['verdienen','kazanmak (para)'],
                    ['kündigen','işten ayrılmak/feshetmek'],['sich bewerben','başvurmak'],['das Praktikum','staj'],['der Kollege','iş arkadaşı'],
                    ['der Chef','patron'],['die Firma','şirket'],['der Beruf','meslek'],['übernehmen','devralmak/üstlenmek']
                ],
                'sentences' => [
                    ['Mein Mann arbeitet bei der Polizei.','Kocam poliste çalışıyor.'],
                    ['Was sind Sie von Beruf?','Mesleğiniz nedir?'],
                    ['Ich suche eine neue Arbeitsstelle.','Yeni bir iş arıyorum.'],
                    ['Er verdient 1.500 Euro im Monat.','Ayda 1.500 Euro kazanıyor.'],
                    ['Meine Mutter ist Verkäuferin im Kaufhaus.','Annem mağazada satıcı.'],
                    ['Ich habe ein Praktikum bei Siemens gemacht.','Siemens\'te staj yaptım.'],
                    ['Mein neuer Kollege ist sehr nett.','Yeni iş arkadaşım çok nazik.'],
                    ['Ich möchte mich um diese Stelle bewerben.','Bu pozisyon için başvurmak istiyorum.'],
                    ['Haben Sie eine Arbeitserlaubnis?','Çalışma izniniz var mı?'],
                    ['Er hat seine Stelle gekündigt.','İşinden istifa etti.'],
                    ['Unser Chef ist sehr streng.','Patronumuz çok sert.'],
                    ['Ich muss heute Überstunden machen.','Bugün fazla mesai yapmam gerekiyor.'],
                    ['An meinem Arbeitsplatz fehlt ein Drucker.','İş yerimde bir yazıcı eksik.'],
                    ['Morgen habe ich einen Termin bei meiner Ärztin.','Yarın doktorumla bir randevum var.'],
                    ['Wie heißt die neue Kollegin?','Yeni meslektaşın adı ne?'],
                    ['Er arbeitet jetzt bei einer anderen Firma.','Şimdi başka bir şirkette çalışıyor.'],
                    ['Was machen Sie beruflich?','Mesleki olarak ne yapıyorsunuz?'],
                    ['Sind Sie berufstätig?','Çalışıyor musunuz?'],
                    ['In der Industrie gibt es immer weniger Arbeitsplätze.','Sanayide gittikçe daha az iş imkanı var.'],
                    ['Darf ich Sie kurz stören?','Sizi kısa bir süre rahatsız edebilir miyim?']
                ]
            ],
            'A2 Goethe: Aile ve Sosyal Çevre' => [
                'words' => [
                    ['das Kind','çocuk'],['die Eltern','ebeveyn'],['der Bruder','erkek kardeş'],['die Schwester','kız kardeş'],
                    ['die Großeltern','büyükanne ve büyükbaba'],['der Enkel','torun'],['die Geschwister','kardeşler'],['verheiratet','evli'],
                    ['ledig','bekar'],['getrennt','ayrı'],['geschieden','boşanmış'],['der Verwandte','akraba'],
                    ['der Freund','arkadaş'],['der Nachbar','komşu'],['besuchen','ziyaret etmek'],['einladen','davet etmek'],
                    ['die Hochzeit','düğün'],['der Geburtstag','doğum günü'],['schenken','hediye etmek'],['gratulieren','tebrik etmek']
                ],
                'sentences' => [
                    ['Meine Familie lebt in Spanien.','Ailem İspanya\'da yaşıyor.'],
                    ['Haben Sie Kinder? - Ja, zwei.','Çocuklarınız var mı? - Evet, iki.'],
                    ['Meine Großeltern leben in Japan.','Büyükannem ve büyükbabam Japonya\'da yaşıyor.'],
                    ['Ich habe leider keine Geschwister.','Maalesef hiç kardeşim yok.'],
                    ['Sind Sie verheiratet? - Nein, ledig.','Evli misiniz? - Hayır, bekar.'],
                    ['Wir bekommen am Wochenende Besuch.','Hafta sonu misafirimiz gelecek.'],
                    ['Darf ich dich mal besuchen?','Seni bir ara ziyaret edebilir miyim?'],
                    ['Herzlichen Glückwunsch zum Geburtstag!','Doğum günün kutlu olsun!'],
                    ['Danke für die Einladung!','Davet için teşekkürler!'],
                    ['Wir feiern heute ein Fest.','Bugün bir kutlama yapıyoruz.'],
                    ['Meine Tochter wünscht sich eine Katze.','Kızım bir kedi istiyor.'],
                    ['Wo habt ihr euch kennengelernt?','Siz nerede tanıştınız?'],
                    ['Ich bin mit meiner Freundin verabredet.','Kız arkadaşımla randevulaştım.'],
                    ['Wir wollen unsere Lehrerin ein Geschenk kaufen.','Öğretmenimize bir hediye almak istiyoruz.'],
                    ['Die Kinder spielen draußen im Garten.','Çocuklar dışarıda bahçede oynuyor.'],
                    ['Mein Nachbar beschwert sich immer.','Komşum her zaman şikayet eder.'],
                    ['Ich kenne die Leute, die hier wohnen.','Burada yaşayan insanları tanıyorum.'],
                    ['Wer betreut bei Ihnen die Kinder?','Sizde çocuklara kim bakıyor?'],
                    ['Wir haben gute Beziehungen zu unseren Nachbarn.','Komşularımızla iyi ilişkilerimiz var.'],
                    ['Ich möchte an dem Tanzkurs teilnehmen.','Dans kursuna katılmak istiyorum.']
                ]
            ]
        ];

        $orderIndex = 300;

        foreach ($data as $title => $content) {
            $lesson = Lesson::updateOrCreate(['lesson_title' => $title], [
                'level_id' => $level->id,
                'lesson_description_tr' => $title . ' Goethe A2 Müfredatı',
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
