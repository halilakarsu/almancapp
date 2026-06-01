<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;

class GrammarCasesSeeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'A1 Başlangıç Seviyesi'
        ], [
            'level_slug' => Str::slug('A1 Başlangıç Seviyesi'),
            'level_description' => 'Almancaya giriş seviyesi. Günlük hayat, temel gramer ve iletişim becerileri.',
            'order_index' => 1,
            'is_active' => true
        ]);

        $grammarTopics = [
            'Nominativ ve Artikeller' => [
                'desc' => 'Nominativ (Yalın Hal) ve der, die, das, ein, eine kullanımı',
                'items' => [
                    ['g' => 'Das ist der Tisch.', 't' => 'Bu masadır.'], ['g' => 'Das ist ein Tisch.', 't' => 'Bu bir masadır.'],
                    ['g' => 'Das ist die Tasche.', 't' => 'Bu çantadır.'], ['g' => 'Das ist eine Tasche.', 't' => 'Bu bir çantadır.'],
                    ['g' => 'Das ist das Buch.', 't' => 'Bu kitaptır.'], ['g' => 'Das ist ein Buch.', 't' => 'Bu bir kitaptır.'],
                    ['g' => 'Der Mann ist hier.', 't' => 'Adam buradadır.'], ['g' => 'Die Frau lernt Deutsch.', 't' => 'Kadın Almanca öğreniyor.'],
                    ['g' => 'Das Kind spielt.', 't' => 'Çocuk oynuyor.'], ['g' => 'Ein Apfel ist rot.', 't' => 'Bir elma kırmızıdır.'],
                    ['g' => 'Eine Blume ist schön.', 't' => 'Bir çiçek güzeldir.'], ['g' => 'Ein Haus ist groß.', 't' => 'Bir ev büyüktür.'],
                    ['g' => 'Wer ist das?', 't' => 'Bu kim?'], ['g' => 'Was ist das?', 't' => 'Bu ne?'],
                    ['g' => 'Das sind die Kinder.', 't' => 'Bunlar çocuklardır.'], ['g' => 'Das ist der Stuhl.', 't' => 'Bu sandalyedir.'],
                    ['g' => 'Die Sonne scheint.', 't' => 'Güneş parlıyor.'], ['g' => 'Das Wasser ist kalt.', 't' => 'Su soğuktur.'],
                    ['g' => 'Ein Auto ist teuer.', 't' => 'Bir araba pahalıdır.'], ['g' => 'Die Lampe ist hell.', 't' => 'Lamba parlaktır.'],
                ]
            ],
            'Akkusativ Hali' => [
                'desc' => 'Akkusativ (-i Hali) ve den, die, das, einen, eine kullanımı',
                'items' => [
                    ['g' => 'Ich habe den Schlüssel.', 't' => 'Anahtara sahibim (Anahtar bende).'], ['g' => 'Ich habe einen Schlüssel.', 't' => 'Bir anahtarım var.'],
                    ['g' => 'Er kauft die Zeitung.', 't' => 'O gazeteyi satın alıyor.'], ['g' => 'Er kauft eine Zeitung.', 't' => 'O bir gazete satın alıyor.'],
                    ['g' => 'Wir brauchen das Auto.', 't' => 'Arabaya ihtiyacımız var.'], ['g' => 'Wir brauchen ein Auto.', 't' => 'Bir arabaya ihtiyacımız var.'],
                    ['g' => 'Ich esse den Apfel.', 't' => 'Elmayı yiyorum.'], ['g' => 'Ich esse einen Apfel.', 't' => 'Bir elma yiyorum.'],
                    ['g' => 'Sie sucht die Brille.', 't' => 'O gözlüğü arıyor.'], ['g' => 'Sie sucht eine Brille.', 't' => 'O bir gözlük arıyor.'],
                    ['g' => 'Hast du das Handy?', 't' => 'Cep telefonu sende mi?'], ['g' => 'Hast du ein Handy?', 't' => 'Bir cep telefonun var mı?'],
                    ['g' => 'Ich trinke den Tee.', 't' => 'Çayı içiyorum.'], ['g' => 'Ich trinke einen Tee.', 't' => 'Bir çay içiyorum.'],
                    ['g' => 'Er liest das Buch.', 't' => 'O kitabı okuyor.'], ['g' => 'Er liest ein Buch.', 't' => 'O bir kitap okuyor.'],
                    ['g' => 'Wir besuchen den Freund.', 't' => 'Arkadaşı ziyaret ediyoruz.'], ['g' => 'Wir besuchen einen Freund.', 't' => 'Bir arkadaşı ziyaret ediyoruz.'],
                    ['g' => 'Ich sehe den Film.', 't' => 'Filmi izliyorum.'], ['g' => 'Ich sehe einen Film.', 't' => 'Bir film izliyorum.'],
                ]
            ],
            'Dativ Hali' => [
                'desc' => 'Dativ (-e Hali) ve dem, der, dem kullanımı',
                'items' => [
                    ['g' => 'Ich danke dem Mann.', 't' => 'Adama teşekkür ediyorum.'], ['g' => 'Ich danke der Frau.', 't' => 'Kadına teşekkür ediyorum.'],
                    ['g' => 'Ich danke dem Kind.', 't' => 'Çocuğa teşekkür ediyorum.'], ['g' => 'Das Auto gehört dem Vater.', 't' => 'Araba babaya ait.'],
                    ['g' => 'Das Haus gehört der Familie.', 't' => 'Ev aileye ait.'], ['g' => 'Ich helfe dem Lehrer.', 't' => 'Öğretmene yardım ediyorum.'],
                    ['g' => 'Ich helfe der Studentin.', 't' => 'Öğrenciye yardım ediyorum.'], ['g' => 'Wie geht es dem Baby?', 't' => 'Bebek nasıl?'],
                    ['g' => 'Das schmeckt dem Gast.', 't' => 'Bu misafirin hoşuna gidiyor.'], ['g' => 'Er antwortet dem Chef.', 't' => 'O şefe cevap veriyor.'],
                    ['g' => 'Ich schreibe der Mutter.', 't' => 'Anneye yazıyorum.'], ['g' => 'Wir vertrauen dem Arzt.', 't' => 'Doktora güveniyoruz.'],
                    ['g' => 'Das Kleid passt der Frau.', 't' => 'Elbise kadına oluyor.'], ['g' => 'Ich gratuliere dem Freund.', 't' => 'Arkadaşı tebrik ediyorum.'],
                    ['g' => 'Was schenkst du dem Kind?', 't' => 'Çocuğa ne hediye ediyorsun?'], ['g' => 'Er gibt dem Hund das Essen.', 't' => 'O köpeğe yemeği veriyor.'],
                    ['g' => 'Wir folgen dem Führer.', 't' => 'Rehberi takip ediyoruz.'], ['g' => 'Ich höre dem Lehrer zu.', 't' => 'Öğretmeni dinliyorum.'],
                    ['g' => 'Das passiert dem besten Mann.', 't' => 'Bu en iyi adamın başına gelir.'], ['g' => 'Ich glaube dem Zeugen.', 't' => 'Tanığa inanıyorum.'],
                ]
            ],
            'Olumsuz Artikeller' => [
                'desc' => 'Artikellerde Olumsuzluk (kein, keine kullanımı)',
                'items' => [
                    ['g' => 'Das ist kein Tisch.', 't' => 'Bu bir masa değil.'], ['g' => 'Das ist keine Tasche.', 't' => 'Bu bir çanta değil.'],
                    ['g' => 'Das ist kein Buch.', 't' => 'Bu bir kitap değil.'], ['g' => 'Ich habe keinen Hunger.', 't' => 'Aç değilim.'],
                    ['g' => 'Er hat keine Zeit.', 't' => 'Onun vakti yok.'], ['g' => 'Wir brauchen kein Auto.', 't' => 'Bir arabaya ihtiyacımız yok.'],
                    ['g' => 'Das ist keine Blume.', 't' => 'Bu bir çiçek değil.'], ['g' => 'Er kauft keinen Apfel.', 't' => 'O bir elma satın almıyor.'],
                    ['g' => 'Ich trinke keinen Kaffee.', 't' => 'Kahve içmiyorum.'], ['g' => 'Wir haben keine Kinder.', 't' => 'Çocuklarımız yok.'],
                    ['g' => 'Er liest keine Zeitung.', 't' => 'O gazete okumuyor.'], ['g' => 'Das ist kein Problem.', 't' => 'Bu bir problem değil.'],
                    ['g' => 'Ich sehe keinen Fehler.', 't' => 'Bir hata görmüyorum.'], ['g' => 'Sie sucht keine Arbeit.', 't' => 'O iş aramıyor.'],
                    ['g' => 'Wir machen keine Pause.', 't' => 'Mola vermiyoruz.'], ['g' => 'Hast du kein Handy?', 't' => 'Cep telefonun yok mu?'],
                    ['g' => 'Das ist kein Hund.', 't' => 'Bu bir köpek değil.'], ['g' => 'Ich brauche keine Hilfe.', 't' => 'Yardıma ihtiyacım yok.'],
                    ['g' => 'Er hat keine Lust.', 't' => 'Canı istemiyor.'], ['g' => 'Das ist kein guter Tag.', 't' => 'Bu iyi bir gün değil.'],
                ]
            ],
        ];

        $order = 100; // High order index to put these at the end
        foreach ($grammarTopics as $title => $data) {
            $lesson = Lesson::updateOrCreate([
                'lesson_title' => $title
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['desc'],
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $order++,
                'is_active' => true
            ]);

            Content::where('lesson_id', $lesson->id)->delete();
            foreach ($data['items'] as $idx => $item) {
                Content::create([
                    'lesson_id' => $lesson->id,
                    'content_german' => $item['g'],
                    'content_turkish' => $item['t'],
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
            }

            $exercise = Exercise::updateOrCreate([
                'lesson_id' => $lesson->id,
                'title' => $title . ' Alıştırmaları'
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            ExerciseItem::where('exercise_id', $exercise->id)->delete();
            foreach ($data['items'] as $idx => $item) {
                ExerciseItem::create([
                    'exercise_id' => $exercise->id,
                    'german' => $item['g'],
                    'turkish' => $item['t'],
                    'order_index' => $idx + 1
                ]);
            }
        }
    }
}
