<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;

class FinalA1CurriculumSeeder extends Seeder
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

        $finalTopics = [
            'Ayrılabilir Fiiller' => [
                'desc' => 'Trennbare Verben (Ayrılabilir Fiiller)',
                'items' => [
                    ['g' => 'Ich kaufe im Supermarkt ein.', 't' => 'Süpermarketten alışveriş yapıyorum.'],
                    ['g' => 'Wann rufst du mich an?', 't' => 'Beni ne zaman arıyorsun?'],
                    ['g' => 'Er steht um sechs Uhr auf.', 't' => 'O saat altıda kalkıyor.'],
                    ['g' => 'Wir fangen jetzt an.', 't' => 'Şimdi başlıyoruz.'],
                    ['g' => 'Machst du das Fenster auf?', 't' => 'Pencereyi açıyor musun?'],
                    ['g' => 'Sie macht die Tür zu.', 't' => 'O kapıyı kapatıyor.'],
                    ['g' => 'Kommst du heute mit?', 't' => 'Bugün birlikte geliyor musun?'],
                    ['g' => 'Wir sehen am Abend fern.', 't' => 'Akşam televizyon izliyoruz.'],
                    ['g' => 'Ziehst du die Jacke an?', 't' => 'Ceketi giyiyor musun?'],
                    ['g' => 'Der Zug kommt um zehn Uhr an.', 't' => 'Tren saat onda varıyor.'],
                ]
            ],
            'İyelik Zamirleri' => [
                'desc' => 'Possessivpronomen (Benim, senin...)',
                'items' => [
                    ['g' => 'Das ist mein Buch.', 't' => 'Bu benim kitabım.'],
                    ['g' => 'Ist das dein Handy?', 't' => 'Bu senin cep telefonun mu?'],
                    ['g' => 'Er sucht seinen Schlüssel.', 't' => 'O anahtarını arıyor.'],
                    ['g' => 'Sie liebt ihren Hund.', 't' => 'O köpeğini seviyor.'],
                    ['g' => 'Wir verkaufen unser Haus.', 't' => 'Evimizi satıyoruz.'],
                    ['g' => 'Habt ihr eure Hausaufgaben?', 't' => 'Ödevleriniz yanınızda mı?'],
                    ['g' => 'Sie besuchen ihre Eltern.', 't' => 'Onlar ebeveynlerini ziyaret ediyorlar.'],
                    ['g' => 'Wo ist Ihr Pass, Herr Schmidt?', 't' => 'Pasaportunuz nerede, Bay Schmidt?'],
                    ['g' => 'Das ist meine Tasche.', 't' => 'Bu benim çantam.'],
                    ['g' => 'Dein Vater ist nett.', 't' => 'Senin baban nazik.'],
                ]
            ],
            'Aile Üyeleri' => [
                'desc' => 'Die Familie (Aile Üyeleri)',
                'items' => [
                    ['g' => 'die Mutter', 't' => 'anne'], ['g' => 'der Vater', 't' => 'baba'], ['g' => 'die Eltern', 't' => 'ebeveynler'],
                    ['g' => 'der Bruder', 't' => 'erkek kardeş'], ['g' => 'die Schwester', 't' => 'kız kardeş'], ['g' => 'die Geschwister', 't' => 'kardeşler'],
                    ['g' => 'der Sohn', 't' => 'oğul'], ['g' => 'die Tochter', 't' => 'kız evlat'], ['g' => 'die Großmutter', 't' => 'anneanne/babaanne'],
                    ['g' => 'der Großvater', 't' => 'dede'], ['g' => 'die Großeltern', 't' => 'büyükanne ve büyükbaba'], ['g' => 'der Onkel', 't' => 'amca/dayı'],
                    ['g' => 'die Tante', 't' => 'hala/teyze'], ['g' => 'der Cousin', 't' => 'erkek kuzen'], ['g' => 'die Cousine', 't' => 'kız kuzen'],
                    ['g' => 'das Kind', 't' => 'çocuk'], ['g' => 'der Mann', 't' => 'koca/erkek'], ['g' => 'die Frau', 't' => 'karı/kadın'],
                    ['g' => 'Mein Bruder ist 20 Jahre alt.', 't' => 'Erkek kardeşim 20 yaşında.'], ['g' => 'Hast du Geschwister?', 't' => 'Kardeşin var mı?'],
                ]
            ],
            'Yiyecek ve İçecekler' => [
                'desc' => 'Essen und Trinken (Gıda ve Mutfak)',
                'items' => [
                    ['g' => 'das Brot', 't' => 'ekmek'], ['g' => 'der Käse', 't' => 'peynir'], ['g' => 'die Milch', 't' => 'süt'],
                    ['g' => 'das Ei', 't' => 'yumurta'], ['g' => 'der Apfel', 't' => 'elma'], ['g' => 'die Banane', 't' => 'muz'],
                    ['g' => 'das Fleisch', 't' => 'et'], ['g' => 'der Fisch', 't' => 'balık'], ['g' => 'das Gemüse', 't' => 'sebze'],
                    ['g' => 'das Obst', 't' => 'meyve'], ['g' => 'der Saft', 't' => 'meyve suyu'], ['g' => 'das Wasser', 't' => 'su'],
                    ['g' => 'der Tee', 't' => 'çay'], ['g' => 'der Kaffee', 't' => 'kahve'], ['g' => 'die Pizza', 't' => 'pizza'],
                    ['g' => 'der Reis', 't' => 'pirinç/pilav'], ['g' => 'Ich habe Hunger.', 't' => 'Açım.'], ['g' => 'Ich habe Durst.', 't' => 'Susadım.'],
                    ['g' => 'Was isst du gerne?', 't' => 'Severek ne yersin?'], ['g' => 'Die Rechnung bitte.', 't' => 'Hesap lütfen.'],
                ]
            ],
            'Geçmiş Zaman (Perfekt)' => [
                'desc' => 'Perfekt (Yakın Geçmiş Zaman)',
                'items' => [
                    ['g' => 'Ich habe Pizza gegessen.', 't' => 'Pizza yedim.'],
                    ['g' => 'Hast du Kaffee getrunken?', 't' => 'Kahve içtin mi?'],
                    ['g' => 'Er hat Deutsch gelernt.', 't' => 'O Almanca öğrendi.'],
                    ['g' => 'Wir haben Musik gehört.', 't' => 'Müzik dinledik.'],
                    ['g' => 'Habt ihr Fußball gespielt?', 't' => 'Futbol oynadınız mı?'],
                    ['g' => 'Sie haben ein Auto gekauft.', 't' => 'Onlar bir araba satın aldılar.'],
                    ['g' => 'Ich bin nach Hause gegangen.', 't' => 'Eve gittim.'],
                    ['g' => 'Bist du nach Berlin gefahren?', 't' => 'Berlin\'e mi gittin?'],
                    ['g' => 'Wir sind im Park spazieren gegangen.', 't' => 'Parkta yürüyüş yaptık.'],
                    ['g' => 'Er ist spät gekommen.', 't' => 'O geç geldi.'],
                ]
            ],
            'Vücudumuz ve Sağlık' => [
                'desc' => 'Körperteile & Gesundheit (Vücut ve Sağlık)',
                'items' => [
                    ['g' => 'der Kopf', 't' => 'baş'], ['g' => 'das Auge', 't' => 'göz'], ['g' => 'die Nase', 't' => 'burun'],
                    ['g' => 'der Mund', 't' => 'ağız'], ['g' => 'die Hand', 't' => 'el'], ['g' => 'der Fuß', 't' => 'ayak'],
                    ['g' => 'Ich bin krank.', 't' => 'Hastayım.'], ['g' => 'Mein Kopf tut weh.', 't' => 'Başım ağrıyor.'],
                    ['g' => 'Ich habe Halsschmerzen.', 't' => 'Boğaz ağrım var.'], ['g' => 'Er muss zum Arzt gehen.', 't' => 'O doktora gitmeli.'],
                ]
            ],
            'Ev ve Eşyalar' => [
                'desc' => 'Haus & Möbel (Ev ve Mobilya)',
                'items' => [
                    ['g' => 'die Küche', 't' => 'mutfak'], ['g' => 'das Schlafzimmer', 't' => 'yatak odası'], ['g' => 'das Bad', 't' => 'banyo'],
                    ['g' => 'das Wohnzimmer', 't' => 'oturma odası'], ['g' => 'der Tisch', 't' => 'masa'], ['g' => 'der Stuhl', 't' => 'sandalye'],
                    ['g' => 'das Bett', 't' => 'yatak'], ['g' => 'der Schrank', 't' => 'dolap'], ['g' => 'das Sofa', 't' => 'koltuk'],
                    ['g' => 'Das Haus ist groß.', 't' => 'Ev büyüktür.'],
                ]
            ],
            'Kıyafetler' => [
                'desc' => 'Die Kleidung (Kıyafetler)',
                'items' => [
                    ['g' => 'das T-Shirt', 't' => 'tişört'], ['g' => 'die Hose', 't' => 'pantolon'], ['g' => 'das Kleid', 't' => 'elbise'],
                    ['g' => 'der Rock', 't' => 'etek'], ['g' => 'die Jacke', 't' => 'ceket'], ['g' => 'die Schuhe', 't' => 'ayakkabı'],
                    ['g' => 'der Hut', 't' => 'şapka'], ['g' => 'Ich ziehe meine Hose an.', 't' => 'Pantolonumu giyiyorum.'],
                    ['g' => 'Das Kleid ist blau.', 't' => 'Elbise mavidir.'], ['g' => 'Er trägt einen Mantel.', 't' => 'O bir palto giyiyor.'],
                ]
            ],
            'Emir Kipi (Imperativ)' => [
                'desc' => 'Imperativ (Emir Cümleleri)',
                'items' => [
                    ['g' => 'Komm hierher!', 't' => 'Buraya gel!'], ['g' => 'Lies das Buch!', 't' => 'Kitabı oku!'], ['g' => 'Schreib deinen Namen!', 't' => 'Adını yaz!'],
                    ['g' => 'Trink viel Wasser!', 't' => 'Bol su iç!'], ['g' => 'Seid leise!', 't' => 'Sessiz olun!'], ['g' => 'Sprechen Sie bitte langsam!', 't' => 'Lütfen yavaş konuşun!'],
                    ['g' => 'Essen Sie bitte!', 't' => 'Lütfen yemeğinizi yiyin!'], ['g' => 'Mach das Licht aus!', 't' => 'Işığı kapat!'],
                    ['g' => 'Ruf mich an!', 't' => 'Beni ara!'], ['g' => 'Warte mal!', 't' => 'Beklesene!'],
                ]
            ],
            'Sıfatlar (Adjektive)' => [
                'desc' => 'Adjektive (Sıfatlar ve Zıt Anlamlar)',
                'items' => [
                    ['g' => 'gut - schlecht', 't' => 'iyi - kötü'], ['g' => 'groß - klein', 't' => 'büyük - küçük'], ['g' => 'schön - hässlich', 't' => 'güzel - çirkin'],
                    ['g' => 'teuer - billig', 't' => 'pahalı - ucuz'], ['g' => 'alt - neu', 't' => 'eski - yeni'], ['g' => 'schnell - langsam', 't' => 'hızlı - yavaş'],
                    ['g' => 'einfach - schwer', 't' => 'kolay - zor'], ['g' => 'glücklich - traurig', 't' => 'mutlu - üzgün'],
                    ['g' => 'gesund - krank', 't' => 'sağlıklı - hasta'], ['g' => 'warm - kalt', 't' => 'sıcak - soğuk'],
                ]
            ],
            'Sayılar (21-100)' => [
                'desc' => 'Die Zahlen (Büyük Sayılar)',
                'items' => [
                    ['g' => 'einundzwanzig', 't' => 'yirmi bir'], ['g' => 'zweiundzwanzig', 't' => 'yirmi iki'], ['g' => 'dreißig', 't' => 'otuz'],
                    ['g' => 'vierzig', 't' => 'kırk'], ['g' => 'fünfzig', 't' => 'elli'], ['g' => 'sechzig', 't' => 'altmış'],
                    ['g' => 'siebzig', 't' => 'yetmiş'], ['g' => 'achtzig', 't' => 'seksen'], ['g' => 'neunzig', 't' => 'doksan'], ['g' => 'hundert', 't' => 'yüz'],
                ]
            ],
        ];

        $order = 200; // High order index
        foreach ($finalTopics as $title => $data) {
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
