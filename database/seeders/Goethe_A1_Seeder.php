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

class Goethe_A1_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::where('level_title', 'like', '%A1%')->first();
        
        $data = [
            'A1 Goethe: Kişisel Bilgiler' => [
                'words' => [
                    ['der Name','isim'],['die Adresse','adres'],['das Alter','yaş'],['das Geburtsdatum','doğum tarihi'],
                    ['der Geburtsort','doğum yeri'],['das Geschlecht','cinsiyet'],['der Familienstand','medeni hal'],
                    ['verheiratet','evli'],['ledig','bekar'],['geschieden','boşanmış'],['die Telefonnummer','telefon numarası'],
                    ['das Land','ülke'],['die Herkunft','köken/asıl'],['aus','-den/-dan (gelmek)'],['heißen','adı olmak'],
                    ['wohnen','ikamet etmek'],['kommen','gelmek'],['sprechen','konuşmak'],['die Sprache','dil'],['die Staatsangehörigkeit','tabiyet/uyruk']
                ],
                'sentences' => [
                    ['Mein Name ist Thomas Schmidt.','Benim adım Thomas Schmidt.'],
                    ['Können Sie mir Ihre Adresse sagen?','Adresinizi bana söyleyebilir misiniz?'],
                    ['Wie alt sind Sie? - 26 Jahre.','Kaç yaşındasınız? - 26.'],
                    ['Bitte schreiben Sie Ihr Geburtsdatum auf.','Lütfen doğum tarihinizi yazın.'],
                    ['Mein Geburtsort ist Berlin.','Doğum yerim Berlin.'],
                    ['Sind Sie verheiratet oder ledig?','Evli misiniz yoksa bekar mı?'],
                    ['Ich bin geschieden.','Ben boşanmışım.'],
                    ['Meine Herkunft ist die Türkei.','Kökenim Türkiye.'],
                    ['Ich komme aus Brasilien.','Brezilya\'dan geliyorum.'],
                    ['Wie heißen Sie?','Adınız ne?'],
                    ['Wo wohnen Sie? - In München.','Nerede yaşıyorsunuz? - Münih\'te.'],
                    ['Welche Sprachen sprechen Sie?','Hangi dilleri konuşuyorsunuz?'],
                    ['Ich spreche Deutsch und Englisch.','Almanca ve İngilizce konuşuyorum.'],
                    ['Hier ist meine Telefonnummer.','İşte telefon numaram.'],
                    ['Das ist mein Familienname.','Bu benim soyadım.'],
                    ['Sind alle da?','Herkes burada mı?'],
                    ['Er kommt allein.','O yalnız geliyor.'],
                    ['Das ist Herr Klein.','Bu Bay Klein.'],
                    ['Sehr geehrte Damen und Herren.','Sayın Bayanlar ve Baylar.'],
                    ['Freut mich, Sie kennenzulernen.','Sizinle tanıştığıma memnun oldum.']
                ]
            ],
            'A1 Goethe: Barınma ve Ev' => [
                'words' => [
                    ['die Wohnung','daire/konut'],['das Haus','ev'],['das Zimmer','oda'],['die Küche','mutfak'],
                    ['das Bad','banyo'],['der Balkon','balkon'],['die Miete','kira'],['der Vermieter','ev sahibi'],
                    ['der Schlüssel','anahtar'],['die Möbel','mobilyalar'],['der Tisch','masa'],['der Stuhl','sandalye'],
                    ['das Bett','yatak'],['der Schrank','dolap'],['das Licht','ışık'],['der Herd','ocak/fırın'],
                    ['der Kühlschrank','buzdolabı'],['das Fenster','pencere'],['die Tür','kapı'],['der Stock','kat']
                ],
                'sentences' => [
                    ['Wir haben eine kleine Wohnung.','Küçük bir dairemiz var.'],
                    ['Das Haus ist sehr alt.','Ev çok eski.'],
                    ['Die Wohnung hat drei Zimmer.','Dairenin üç odası var.'],
                    ['Der neue Herd kommt in die Küche.','Yeni ocak mutfağa geliyor.'],
                    ['Wir haben kein großes Bad.','Büyük bir banyomuz yok.'],
                    ['Die Wohnung hat einen kleinen Balkon.','Dairenin küçük bir balkonu var.'],
                    ['Die Miete für die Wohnung ist 600 Euro.','Dairenin kirası 600 Euro.'],
                    ['Unser Vermieter heißt Huber.','Ev sahibimizin adı Huber.'],
                    ['Ich finde meinen Schlüssel nicht.','Anahtarımı bulamıyorum.'],
                    ['Sind die Möbel neu?','Mobilyalar yeni mi?'],
                    ['Das Buch liegt auf dem Tisch.','Kitap masanın üzerinde duruyor.'],
                    ['Setzen Sie sich bitte auf den Stuhl.','Lütfen sandalyeye oturun.'],
                    ['Wir brauchen noch ein Kinderbett.','Hâlâ bir çocuk yatağına ihtiyacımız var.'],
                    ['Die Gläser stehen im Schrank.','Bardaklar dolapta duruyor.'],
                    ['Mach bitte das Licht an!','Lütfen ışığı aç!'],
                    ['Öffne bitte das Fenster!','Lütfen pencereyi aç!'],
                    ['Bitte schließen Sie die Tür.','Lütfen kapıyı kapatın.'],
                    ['Unsere Wohnung liegt im ersten Stock.','Dairemiz birinci katta.'],
                    ['Das Zimmer ist groß und hell.','Oda büyük ve aydınlık.'],
                    ['Wo ist die Toilette?','Tuvalet nerede?']
                ]
            ],
            'A1 Goethe: Yeme ve İçme' => [
                'words' => [
                    ['das Essen','yemek'],['das Trinken','içecek'],['das Brot','ekmek'],['das Brötchen','küçük ekmek/poğaça'],
                    ['die Butter','tereyağı'],['der Käse','peynir'],['das Fleisch','et'],['der Fisch','balık'],
                    ['das Gemüse','sebze'],['das Obst','meyve'],['der Apfel','elma'],['die Banane','muz'],
                    ['die Kartoffel','patates'],['der Reis','pirinç/pilav'],['der Salat','salata'],['das Wasser','su'],
                    ['der Kaffee','kahve'],['der Tee','çay'],['der Saft','meyve suyu'],['das Bier','bira']
                ],
                'sentences' => [
                    ['Was gibt es zu essen?','Yemekte ne var?'],
                    ['Haben Sie auch Weißbrot?','Beyaz ekmeğiniz de var mı?'],
                    ['Für mich bitte ein Brötchen mit Butter.','Benim için tereyağlı bir poğaça lütfen.'],
                    ['Möchtest du Käse aufs Brot?','Ekmeğin üzerine peynir ister misin?'],
                    ['Ich esse gern Fisch. Fleisch mag ich nicht.','Balık yemeyi severim. Eti sevmem.'],
                    ['Gemüse brauchen wir auch noch.','Sebzeye de ihtiyacımız var.'],
                    ['Im Sommer ist das Obst billig.','Yazın meyve ucuzdur.'],
                    ['Ein Pfund Äpfel, bitte.','Bir pound (yarım kilo) elma lütfen.'],
                    ['Ich esse am liebsten Pizza.','En çok pizza yemeyi severim.'],
                    ['Möchten Sie Wasser mit oder ohne Gas?','Gazlı mı yoksa gazsız mı su istersiniz?'],
                    ['Zum Frühstück trinke ich immer Kaffee.','Kahvaltıda her zaman kahve içerim.'],
                    ['Möchten Sie lieber Kaffee oder Tee?','Kahve mi yoksa çay mı tercih edersiniz?'],
                    ['Drei Bananen, bitte!','Üç muz lütfen!'],
                    ['Möchtest du einen Apfelsaft?','Elma suyu ister misin?'],
                    ['Noch ein Bier, bitte.','Bir bira daha lütfen.'],
                    ['Der Kaffee schmeckt bitter.','Kahvenin tadı acı.'],
                    ['Das Essen schmeckt wunderbar.','Yemek harika.'],
                    ['Ich habe Hunger und Durst.','Açım ve susadım.'],
                    ['Guten Appetit!','Afiyet olsun!'],
                    ['Die Rechnung, bitte!','Hesap lütfen!']
                ]
            ]
        ];

        $orderIndex = 200;

        foreach ($data as $title => $content) {
            $lesson = Lesson::updateOrCreate(
                ['lesson_title' => $title],
                [
                    'level_id' => $level->id,
                    'lesson_description_tr' => $title . ' Goethe A1 Müfredatı',
                    'lesson_image' => 'assets/img/logo.png',
                    'order_index' => $orderIndex++,
                    'is_active' => true
                ]
            );

            // Words
            foreach ($content['words'] as $idx => $w) {
                Word::updateOrCreate(
                    ['lesson_id' => $lesson->id, 'word_german' => $w[0]],
                    ['word_turkish' => $w[1], 'order_index' => $idx + 1, 'is_active' => true]
                );
            }

            // Exercise
            $ex = Exercise::updateOrCreate(['lesson_id' => $lesson->id], ['title' => $title . ' Alıştırmaları', 'is_active' => true]);
            $ex->items()->delete();
            foreach ($content['sentences'] as $idx => $s) {
                ExerciseItem::create(['exercise_id' => $ex->id, 'german' => $s[0], 'turkish' => $s[1], 'order_index' => $idx + 1]);
            }

            // Test
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
                // Random wrongs
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
