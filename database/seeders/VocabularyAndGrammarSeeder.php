<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;

class VocabularyAndGrammarSeeder extends Seeder
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

        $topics = [
            'Aylar' => [
                'desc' => 'Almanca Aylar (Die Monate)',
                'items' => [
                    ['g' => 'Januar', 't' => 'Ocak'], ['g' => 'Februar', 't' => 'Şubat'], ['g' => 'März', 't' => 'Mart'], ['g' => 'April', 't' => 'Nisan'],
                    ['g' => 'Mai', 't' => 'Mayıs'], ['g' => 'Juni', 't' => 'Haziran'], ['g' => 'Juli', 't' => 'Temmuz'], ['g' => 'August', 't' => 'Ağustos'],
                    ['g' => 'September', 't' => 'Eylül'], ['g' => 'Oktober', 't' => 'Ekim'], ['g' => 'November', 't' => 'Kasım'], ['g' => 'Dezember', 't' => 'Aralık'],
                    ['g' => 'Der Januar ist kalt.', 't' => 'Ocak soğuktur.'], ['g' => 'Im Mai ist es schön.', 't' => 'Mayıs ayında hava güzeldir.'],
                    ['g' => 'Mein Geburtstag ist im Juli.', 't' => 'Doğum günüm temmuzdadır.'], ['g' => 'Wie heißt der erste Monat?', 't' => 'İlk ayın adı nedir?'],
                    ['g' => 'Der Juni hat 30 Tage.', 't' => 'Haziran 30 gündür.'], ['g' => 'Wir fahren im August in den Urlaub.', 't' => 'Ağustos ayında tatile gidiyoruz.'],
                    ['g' => 'Es regnet oft im April.', 't' => 'Nisan\'da sık sık yağmur yağar.'], ['g' => 'Der Dezember ist der letzte Monat.', 't' => 'Aralık son aydır.'],
                ]
            ],
            'Günler ve Mevsimler' => [
                'desc' => 'Günler ve Mevsimler (Tage und Jahreszeiten)',
                'items' => [
                    ['g' => 'Montag', 't' => 'Pazartesi'], ['g' => 'Dienstag', 't' => 'Salı'], ['g' => 'Mittwoch', 't' => 'Çarşamba'], ['g' => 'Donnerstag', 't' => 'Perşembe'],
                    ['g' => 'Freitag', 't' => 'Cuma'], ['g' => 'Samstag', 't' => 'Cumartesi'], ['g' => 'Sonntag', 't' => 'Pazar'], ['g' => 'das Wochenende', 't' => 'Hafta sonu'],
                    ['g' => 'heute', 't' => 'bugün'], ['g' => 'morgen', 't' => 'yarın'], ['g' => 'der Frühling', 't' => 'İlkbahar'], ['g' => 'der Sommer', 't' => 'Yaz'],
                    ['g' => 'der Herbst', 't' => 'Sonbahar'], ['g' => 'der Winter', 't' => 'Kış'], ['g' => 'Heute ist Montag.', 't' => 'Bugün Pazartesi.'],
                    ['g' => 'Am Freitag habe ich frei.', 't' => 'Cuma günü boşum.'], ['g' => 'Im Sommer ist es heiß.', 't' => 'Yazın hava sıcaktır.'],
                    ['g' => 'Im Winter schneit es.', 't' => 'Kışın kar yağar.'], ['g' => 'Was machst du am Wochenende?', 't' => 'Hafta sonu ne yapıyorsun?'],
                    ['g' => 'Der Frühling kommt bald.', 't' => 'İlkbahar yakında geliyor.'],
                ]
            ],
            'Renkler' => [
                'desc' => 'Renkler (Die Farben)',
                'items' => [
                    ['g' => 'rot', 't' => 'kırmızı'], ['g' => 'blau', 't' => 'mavi'], ['g' => 'gelb', 't' => 'sarı'], ['g' => 'grün', 't' => 'yeşil'],
                    ['g' => 'schwarz', 't' => 'siyah'], ['g' => 'weiß', 't' => 'beyaz'], ['g' => 'grau', 't' => 'gri'], ['g' => 'braun', 't' => 'kahverengi'],
                    ['g' => 'orange', 't' => 'turuncu'], ['g' => 'lila', 't' => 'mor'], ['g' => 'rosa', 't' => 'pembe'], ['g' => 'hellblau', 't' => 'açık mavi'],
                    ['g' => 'dunkelgrün', 't' => 'koyu yeşil'], ['g' => 'bunt', 't' => 'renkli'], ['g' => 'Die Blume ist rot.', 't' => 'Çiçek kırmızıdır.'],
                    ['g' => 'Der Himmel ist blau.', 't' => 'Gökyüzü mavidir.'], ['g' => 'Mein Auto ist schwarz.', 't' => 'Arabam siyahtır.'],
                    ['g' => 'Welche Farbe hat die Sonne?', 't' => 'Güneş ne renktir?'], ['g' => 'Ich mag die Farbe Grün.', 't' => 'Yeşil rengi severim.'],
                    ['g' => 'Der Schnee ist weiß.', 't' => 'Kar beyazdır.'],
                ]
            ],
            'Meslekler' => [
                'desc' => 'Meslekler (Die Berufe)',
                'items' => [
                    ['g' => 'der Lehrer', 't' => 'öğretmen'], ['g' => 'der Arzt', 't' => 'doktor'], ['g' => 'der Ingenieur', 't' => 'mühendis'], ['g' => 'der Koch', 't' => 'aşçı'],
                    ['g' => 'der Kellner', 't' => 'garson'], ['g' => 'der Polizist', 't' => 'polis'], ['g' => 'der Student', 't' => 'öğrenci'], ['g' => 'der Verkäufer', 't' => 'satıcı'],
                    ['g' => 'der Fahrer', 't' => 'şoför'], ['g' => 'der Programmierer', 't' => 'programcı'], ['g' => 'der Mechaniker', 't' => 'tamirci'], ['g' => 'der Pilot', 't' => 'pilot'],
                    ['g' => 'Ich bin Lehrer von Beruf.', 't' => 'Mesleğim öğretmenlik.'], ['g' => 'Was bist du von Beruf?', 't' => 'Mesleğin ne?'],
                    ['g' => 'Er arbeitet als Arzt.', 't' => 'O doktor olarak çalışıyor.'], ['g' => 'Sie ist eine gute Köchin.', 't' => 'O iyi bir aşçı.'],
                    ['g' => 'Mein Vater ist Ingenieur.', 't' => 'Babam mühendistir.'], ['g' => 'Wo arbeitest du?', 't' => 'Nerede çalışıyorsun?'],
                    ['g' => 'Ich arbeite in einem Büro.', 't' => 'Bir ofiste çalışıyorum.'], ['g' => 'Sind Sie Studentin?', 't' => 'Öğrenci misiniz?'],
                ]
            ],
            'Sayılar' => [
                'desc' => 'Sayılar (Die Zahlen 1-20)',
                'items' => [
                    ['g' => 'eins', 't' => 'bir'], ['g' => 'zwei', 't' => 'iki'], ['g' => 'drei', 't' => 'üç'], ['g' => 'vier', 't' => 'dört'],
                    ['g' => 'fünf', 't' => 'beş'], ['g' => 'sechs', 't' => 'altı'], ['g' => 'sieben', 't' => 'yedi'], ['g' => 'acht', 't' => 'sekiz'],
                    ['g' => 'neun', 't' => 'dokuz'], ['g' => 'zehn', 't' => 'on'], ['g' => 'elf', 't' => 'on bir'], ['g' => 'zwölf', 't' => 'on iki'],
                    ['g' => 'dreizehn', 't' => 'on üç'], ['g' => 'vierzehn', 't' => 'on dört'], ['g' => 'fünfzehn', 't' => 'on beş'], ['g' => 'sechzehn', 't' => 'on altı'],
                    ['g' => 'siebzehn', 't' => 'on yedi'], ['g' => 'achtzehn', 't' => 'on sekiz'], ['g' => 'neunzehn', 't' => 'on dokuz'], ['g' => 'zwanzig', 't' => 'yirmi'],
                ]
            ],
            'Saatler' => [
                'desc' => 'Saatler (Die Uhrzeit)',
                'items' => [
                    ['g' => 'Wie spät ist es?', 't' => 'Saat kaç?'], ['g' => 'Es ist ein Uhr.', 't' => 'Saat bir.'], ['g' => 'Es ist halb drei.', 't' => 'Saat iki buçuk.'], ['g' => 'Es ist Viertel vor vier.', 't' => 'Saat dörde çeyrek var.'],
                    ['g' => 'Es ist Viertel nach fünf.', 't' => 'Saat beşi çeyrek geçiyor.'], ['g' => 'Es ist zehn nach sechs.', 't' => 'Saat altıyı on geçiyor.'], ['g' => 'Es ist fünf vor sieben.', 't' => 'Saat yediye beş var.'], ['g' => 'Um wie viel Uhr kommst du?', 't' => 'Saat kaçta geliyorsun?'],
                    ['g' => 'Um neun Uhr.', 't' => 'Saat dokuzda.'], ['g' => 'Der Kurs beginnt um acht Uhr.', 't' => 'Kurs saat sekizde başlıyor.'], ['g' => 'Wie viel Uhr haben wir?', 't' => 'Saat kaç?'], ['g' => 'Es ist tam on iki.', 't' => 'Saat tam on iki.'],
                    ['g' => 'Es ist kurz vor eins.', 't' => 'Bire az var.'], ['g' => 'Es ist kurz nach zwei.', 't' => 'İkiyi biraz geçiyor.'], ['g' => 'Wann stehst du auf?', 't' => 'Kaçta kalkıyorsun?'], ['g' => 'Ich stehe um sieben Uhr auf.', 't' => 'Saat yedide kalkıyorum.'],
                    ['g' => 'Es ist Mittag.', 't' => 'Öğlen vakti.'], ['g' => 'Es ist Mitternacht.', 't' => 'Gece yarısı.'], ['g' => 'Es ist acht Uhr morgens.', 't' => 'Sabah saat sekiz.'], ['g' => 'Es ist sechs Uhr abends.', 't' => 'Akşam saat altı.'],
                ]
            ],
            'Edatlar' => [
                'desc' => 'Edatlar (Die Präpositionen)',
                'items' => [
                    ['g' => 'in', 't' => 'içinde'], ['g' => 'auf', 't' => 'üstünde'], ['g' => 'an', 't' => 'bitişiğinde'], ['g' => 'unter', 't' => 'altında'],
                    ['g' => 'über', 't' => 'üstünde (temas yok)'], ['g' => 'vor', 't' => 'önünde'], ['g' => 'hinter', 't' => 'arkasında'], ['g' => 'neben', 't' => 'yanında'],
                    ['g' => 'zwischen', 't' => 'arasında'], ['g' => 'mit', 't' => 'ile'], ['g' => 'ohne', 't' => 'olmadan'], ['g' => 'Ich bin im Kino.', 't' => 'Sinemadayım.'],
                    ['g' => 'Das Buch liegt auf dem Tisch.', 't' => 'Kitap masanın üstünde.'], ['g' => 'Wir gehen in den Park.', 't' => 'Parka gidiyoruz.'], ['g' => 'Das Bild hängt an der Wand.', 't' => 'Resim duvarda asılı.'], ['g' => 'Der Hund schläft unter dem Bett.', 't' => 'Köpek yatağın altında uyuyor.'],
                    ['g' => 'Ich komme mit dem Bus.', 't' => 'Otobüsle geliyorum.'], ['g' => 'Kaffee ohne Zucker, bitte.', 't' => 'Şekersiz kahve lütfe.'], ['g' => 'Das Auto steht vor dem Haus.', 't' => 'Araba evin önünde duruyor.'], ['g' => 'Die Bank ist neben der Post.', 't' => 'Banka postanenin yanındadır.'],
                ]
            ],
            'W-Soruları' => [
                'desc' => 'Soru Kelimeleri (W-Fragen)',
                'items' => [
                    ['g' => 'Wer?', 't' => 'Kim?'], ['g' => 'Was?', 't' => 'Ne?'], ['g' => 'Wo?', 't' => 'Nerede?'], ['g' => 'Wohin?', 't' => 'Nereye?'],
                    ['g' => 'Woher?', 't' => 'Nereden?'], ['g' => 'Wann?', 't' => 'Ne zaman?'], ['g' => 'Warum?', 't' => 'Neden?'], ['g' => 'Wie?', 't' => 'Nasıl?'],
                    ['g' => 'Wer bist du?', 't' => 'Sen kimsin?'], ['g' => 'Was machst du?', 't' => 'Ne yapıyorsun?'], ['g' => 'Wo wohnst du?', 't' => 'Nerede yaşıyorsun?'], ['g' => 'Wohin gehst du?', 't' => 'Nereye gidiyorsun?'],
                    ['g' => 'Woher kommst du?', 't' => 'Nereden geliyorsun?'], ['g' => 'Wann kommst du?', 't' => 'Ne zaman geliyorsun?'], ['g' => 'Warum lernst du Deutsch?', 't' => 'Neden Almanca öğreniyorsun?'], ['g' => 'Wie geht es dir?', 't' => 'Nasılsın?'],
                    ['g' => 'Wie alt bist du?', 't' => 'Kaç yaşındasın?'], ['g' => 'Wie viel kostet das?', 't' => 'Bu ne kadar?'], ['g' => 'Wie viele Kinder haben Sie?', 't' => 'Kaç çocuğunuz var?'], ['g' => 'Wo ist die Toilette?', 't' => 'Tuvalet nerede?'],
                ]
            ],
            'Kişi Zamirleri' => [
                'desc' => 'Kişi Zamirleri (Personalpronomen)',
                'items' => [
                    ['g' => 'ich', 't' => 'ben'], ['g' => 'du', 't' => 'sen'], ['g' => 'er', 't' => 'o (erke)'], ['g' => 'sie', 't' => 'o (kadın)'],
                    ['g' => 'es', 't' => 'o (nötr)'], ['g' => 'wir', 't' => 'biz'], ['g' => 'ihr', 't' => 'siz (çoğul)'], ['g' => 'sie', 't' => 'onlar'],
                    ['g' => 'Sie', 't' => 'Siz (resmi)'], ['g' => 'Ich bin Ahmet.', 't' => 'Ben Ahmet\'im.'], ['g' => 'Du bist mein Freund.', 't' => 'Sen benim arkadaşımsın.'], ['g' => 'Er kommt aus Berlin.', 't' => 'O Berlin\'den geliyor.'],
                    ['g' => 'Sie heißt Maria.', 't' => 'Onun adı Maria.'], ['g' => 'Es ist ein Kind.', 't' => 'O bir çocuk.'], ['g' => 'Wir lernen zusammen.', 't' => 'Biz birlikte öğreniyoruz.'], ['g' => 'Ihr geht nach Hause.', 't' => 'Siz eve gidiyorsunuz.'],
                    ['g' => 'Sie spielen Fußball.', 't' => 'Onlar futbol oynuyorlar.'], ['g' => 'Wie heißen Sie?', 't' => 'Adınız nedir?'], ['g' => 'Wo wohnen Sie?', 't' => 'Nerede yaşıyorsunuz?'], ['g' => 'Wir sind hier.', 't' => 'Biz buradayız.'],
                ]
            ],
        ];

        $order = 50; // Start order index for these new lessons
        foreach ($topics as $title => $data) {
            $lesson = Lesson::updateOrCreate([
                'lesson_title' => $title
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['desc'],
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $order++,
                'is_active' => true
            ]);

            // Clear and recreate contents
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

            // Clear and recreate exercises
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
