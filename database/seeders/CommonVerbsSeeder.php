<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;

class CommonVerbsSeeder extends Seeder
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

        $verbsData = [
            'Gehen' => [
                'description' => 'Gitmek',
                'items' => [
                    ['g' => 'Ich gehe nach Hause.', 't' => 'Eve gidiyorum.'],
                    ['g' => 'Du gehst in den Park.', 't' => 'Parka gidiyorsun.'],
                    ['g' => 'Er geht ins Kino.', 't' => 'O sinemaya gidiyor.'],
                    ['g' => 'Wir gehen essen.', 't' => 'Yemeğe gidiyoruz.'],
                    ['g' => 'Ihr geht spazieren.', 't' => 'Yürüyüşe gidiyorsunuz.'],
                    ['g' => 'Sie gehen in die Schule.', 't' => 'Onlar okula gidiyorlar.'],
                    ['g' => 'Sie gehen nach Berlin.', 't' => 'Berlin\'e gidiyorlar.'],
                    ['g' => 'Es geht mir gut.', 't' => 'İyiyim (İyi gidiyor).'],
                    ['g' => 'Ich gehe zur Arbeit.', 't' => 'İşe gidiyorum.'],
                    ['g' => 'Wir gehen schlafen.', 't' => 'Uyumaya gidiyoruz.'],
                ]
            ],
            'Trinken' => [
                'description' => 'İçmek',
                'items' => [
                    ['g' => 'Ich trinke Wasser.', 't' => 'Su içiyorum.'],
                    ['g' => 'Du trinkst Tee.', 't' => 'Çay içiyorsun.'],
                    ['g' => 'Er trinkt Kaffee.', 't' => 'O kahve içiyor.'],
                    ['g' => 'Wir trinken Saft.', 't' => 'Meyve suyu içiyoruz.'],
                    ['g' => 'Ihr trinkt Bier.', 't' => 'Bira içiyorsunuz.'],
                    ['g' => 'Sie trinken Milch.', 't' => 'Onlar süt içiyorlar.'],
                    ['g' => 'Ich trinke gerne Cola.', 't' => 'Severek kola içerim.'],
                    ['g' => 'Sie trinkt Wein.', 't' => 'O şarap içiyor.'],
                    ['g' => 'Wir trinken zusammen.', 't' => 'Birlikte içiyoruz.'],
                    ['g' => 'Er trinkt viel Wasser.', 't' => 'O çok su içer.'],
                ]
            ],
            'Haben' => [
                'description' => 'Sahip Olmak',
                'items' => [
                    ['g' => 'Ich habe bir Auto.', 't' => 'Bir arabam var.'],
                    ['g' => 'Du hast Zeit.', 't' => 'Vaktin var.'],
                    ['g' => 'Er hat ein Haus.', 't' => 'Onun bir evi var.'],
                    ['g' => 'Wir haben Hunger.', 't' => 'Açız.'],
                    ['g' => 'Ihr habt Glück.', 't' => 'Şanslısınız.'],
                    ['g' => 'Sie haben Geld.', 't' => 'Onların parası var.'],
                    ['g' => 'Ich habe eine Frage.', 't' => 'Bir sorum var.'],
                    ['g' => 'Sie hat ein Handy.', 't' => 'Onun bir cep telefonu var.'],
                    ['g' => 'Wir haben Urlaub.', 't' => 'Tatilimiz var (Tatildeyiz).'],
                    ['g' => 'Er hat einen Hund.', 't' => 'Onun bir köpeği var.'],
                ]
            ],
            'Kommen' => [
                'description' => 'Gelmek',
                'items' => [
                    ['g' => 'Ich komme aus Berlin.', 't' => 'Berlin\'den geliyorum.'],
                    ['g' => 'Du kommst aus Izmir.', 't' => 'İzmir\'den geliyorsun.'],
                    ['g' => 'Er kommt heute.', 't' => 'O bugün geliyor.'],
                    ['g' => 'Wir kommen morgen.', 't' => 'Yarın geliyoruz.'],
                    ['g' => 'Ihr kommt mit.', 't' => 'Birlikte geliyorsunuz.'],
                    ['g' => 'Sie kommen aus Deutschland.', 't' => 'Almanya\'an geliyorlar.'],
                    ['g' => 'Ich komme gleich.', 't' => 'Hemen geliyorum.'],
                    ['g' => 'Sie kommt aus Paris.', 't' => 'O Paris\'ten geliyor.'],
                    ['g' => 'Wir kommen später.', 't' => 'Daha sonra geliyoruz.'],
                    ['g' => 'Er kommt pünktlich.', 't' => 'O tam vaktinde geliyor.'],
                ]
            ],
            'Kaufen' => [
                'description' => 'Satın Almak',
                'items' => [
                    ['g' => 'Ich kaufe Brot.', 't' => 'Ekmek satın alıyorum.'],
                    ['g' => 'Du kaufst Milch.', 't' => 'Süt satın alıyorsun.'],
                    ['g' => 'Er kauft ein Auto.', 't' => 'O bir araba satın alıyor.'],
                    ['g' => 'Wir kaufen Obst.', 't' => 'Meyve satın alıyoruz.'],
                    ['g' => 'Ihr kauft Gemüse.', 't' => 'Sebze satın alıyorsunuz.'],
                    ['g' => 'Sie kaufen ein Haus.', 't' => 'Onlar bir ev satın alıyorlar.'],
                    ['g' => 'Ich kaufe ein Ticket.', 't' => 'Bir bilet satın alıyorum.'],
                    ['g' => 'Sie kauft Kleidung.', 't' => 'O kıyafet satın alıyor.'],
                    ['g' => 'Wir kaufen Geschenke.', 't' => 'Hediyeler satın alıyoruz.'],
                    ['g' => 'Er kauft eine Zeitung.', 't' => 'O bir gazete satın alıyor.'],
                ]
            ],
            'Wohnen' => [
                'description' => 'Yaşamak / İkamet etmek',
                'items' => [
                    ['g' => 'Ich wohne in Berlin.', 't' => 'Berlin\'de yaşıyorum.'],
                    ['g' => 'Du wohnst in einem Haus.', 't' => 'Bir evde yaşıyorsun.'],
                    ['g' => 'Er wohnt in einer Wohnung.', 't' => 'Bir dairede yaşıyor.'],
                    ['g' => 'Wir wohnen in Izmir.', 't' => 'İzmir\'de yaşıyoruz.'],
                    ['g' => 'Ihr wohnt hier.', 't' => 'Burada yaşıyorsunuz.'],
                    ['g' => 'Sie wohnen dort.', 't' => 'Orada yaşıyorlar.'],
                    ['g' => 'Ich wohne allein.', 't' => 'Yalnız yaşıyorum.'],
                    ['g' => 'Sie wohnt bei Freunden.', 't' => 'Ailesinin yanında yaşıyor.'],
                    ['g' => 'Wir wohnen zusammen.', 't' => 'Birlikte yaşıyoruz.'],
                    ['g' => 'Er wohnt in Deutschland.', 't' => 'Almanya\'da yaşıyor.'],
                ]
            ],
            'Brauchen' => [
                'description' => 'İhtiyacı olmak',
                'items' => [
                    ['g' => 'Ich brauche Geld.', 't' => 'Paraya ihtiyacım var.'],
                    ['g' => 'Du brauchst Ruhe.', 't' => 'Sessizliğe/Huzura ihtiyacın var.'],
                    ['g' => 'Er braucht Hilfe.', 't' => 'Yardıma ihtiyacı var.'],
                    ['g' => 'Wir brauchen Zeit.', 't' => 'Zamana ihtiyacımız var.'],
                    ['g' => 'Ihr braucht Wasser.', 't' => 'Suya ihtiyacınız var.'],
                    ['g' => 'Sie brauchen ein Auto.', 't' => 'Bir arabaya ihtiyaçları var.'],
                    ['g' => 'Ich brauche ein Handy.', 't' => 'Bir cep telefonuna ihtiyacım var.'],
                    ['g' => 'Sie braucht ein Buch.', 't' => 'Bir kitaba ihtiyacı var.'],
                    ['g' => 'Wir brauchen Urlaub.', 't' => 'Tatile ihtiyacımız var.'],
                    ['g' => 'Er braucht ein Zimmer.', 't' => 'Bir odaya ihtiyacı var.'],
                ]
            ],
            'Lernen' => [
                'description' => 'Öğrenmek / Ders çalışmak',
                'items' => [
                    ['g' => 'Ich lerne Deutsch.', 't' => 'Almanca öğreniyorum.'],
                    ['g' => 'Du lernst Englisch.', 't' => 'İngilizce öğreniyorsun.'],
                    ['g' => 'Er lernt Mathe.', 't' => 'Matematik çalışıyor.'],
                    ['g' => 'Wir lernen viel.', 't' => 'Çok öğreniyoruz.'],
                    ['g' => 'Ihr lernt schnell.', 't' => 'Hızlı öğreniyorsunuz.'],
                    ['g' => 'Sie lernen zusammen.', 't' => 'Birlikte öğreniyorlar.'],
                    ['g' => 'Ich lerne kochen.', 't' => 'Yemek yapmayı öğreniyorum.'],
                    ['g' => 'Sie lernt Musik.', 't' => 'Müzik öğreniyor.'],
                    ['g' => 'Wir lernen heute.', 't' => 'Bugün çalışıyoruz.'],
                    ['g' => 'Er lernt Gitarre.', 't' => 'Gitar öğreniyor.'],
                ]
            ],
        ];

        $order = 30; // Start order index
        foreach ($verbsData as $verb => $data) {
            $lesson = Lesson::updateOrCreate([
                'lesson_title' => $verb . ' Fiili ve Cümle Yapısı'
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['description'] . ' fiilinin farklı şahıslara göre çekimi ve örnek cümleler.',
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $order++,
                'is_active' => true
            ]);

            // Clear old contents for this lesson to refresh with new simpler ones
            Content::where('lesson_id', $lesson->id)->delete();
            
            // Content
            foreach ($data['items'] as $idx => $item) {
                Content::create([
                    'lesson_id' => $lesson->id,
                    'content_german' => $item['g'],
                    'content_turkish' => $item['t'],
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
            }

            // Exercise
            $exercise = Exercise::updateOrCreate([
                'lesson_id' => $lesson->id,
                'title' => $verb . ' Fiili Cümle Alıştırmaları'
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            // Clear old items
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
