<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Content;
use App\Models\Question;
use App\Models\Test;
use App\Models\Exercise;
use App\Models\ExerciseItem;

class ModalVerbsSeeder extends Seeder
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

        $modalVerbs = [
            'Möchten' => [
                'description' => 'İstemek (Kibarca/Arzu)',
                'content' => [
                    ['g' => 'Ich möchte einen Kaffee trinken.', 't' => 'Kahve içmek istiyorum.'],
                    ['g' => 'Möchtest du mit mir ins Kino gehen?', 't' => 'Benimle sinemaya gitmek ister misin?'],
                    ['g' => 'Was möchten Sie essen?', 't' => 'Ne yemek istersiniz?'],
                    ['g' => 'Wir möchten nach Deutschland reisen.', 't' => 'Almanya\'ya seyahat etmek istiyoruz.'],
                    ['g' => 'Möchtet ihr etwas Wasser?', 't' => 'Biraz su ister misiniz?'],
                    ['g' => 'Er möchte heute nicht arbeiten.', 't' => 'O bugün çalışmak istemiyor.'],
                    ['g' => 'Sie möchte ein neues Auto kaufen.', 't' => 'O yeni bir araba satın almak istiyor.'],
                    ['g' => 'Möchten Sie hier warten?', 't' => 'Burada mı beklemek istersiniz?'],
                    ['g' => 'Ich möchte gerne bezahlen.', 't' => 'Ödeme yapmak istiyorum (hesap lütfen).'],
                    ['g' => 'Was möchtest du zum Geburtstag?', 't' => 'Doğum günün için ne istersin?'],
                ],
                'questions' => [
                    ['q' => '"Ich möchte einen Kaffee trinken." cümlesinin Türkçe karşılığı nedir?', 'a' => 'Kahve içmek istiyorum.', 'others' => ['Çay içmek istiyorum.', 'Kahve sevmiyorum.', 'Su içmek istiyorum.']],
                    ['q' => 'Birine "Ne yemek istersiniz?" diye kibarca sormak için hangisi kullanılır?', 'a' => 'Was möchten Sie essen?', 'others' => ['Was willst du essen?', 'Was isst du?', 'Was hast du gegessen?']],
                    ['q' => '"Möchtest du mit mir ins Kino gehen?" sorusuna verilecek olumlu cevap hangisidir?', 'a' => 'Ja, gerne!', 'others' => ['Nein, danke.', 'Ich habe keine Zeit.', 'Vielleicht morgen.']],
                    ['q' => 'Almanya\'ya seyahat etmek istiyoruz demek için hangi fiil formu kullanılır?', 'a' => 'Wir möchten...', 'others' => ['Ich möchte...', 'Du möchtest...', 'Er möchte...']],
                    ['q' => '"Möchten Sie hier warten?" cümlesindeki "warten" ne anlama gelir?', 'a' => 'Beklemek', 'others' => ['Yürümek', 'Konuşmak', 'Okumak']],
                    ['q' => 'Hesap isterken "Ödemek istiyorum" anlamına gelen cümle hangisidir?', 'a' => 'Ich möchte gerne bezahlen.', 'others' => ['Ich möchte essen.', 'Ich möchte gehen.', 'Ich möchte trinken.']],
                    ['q' => '"Sie möchte ein neues Auto kaufen." cümlesinde kim araba almak istiyor?', 'a' => 'O (Kadın)', 'others' => ['Sen', 'Biz', 'Onlar']],
                    ['q' => 'Birine su teklif ederken "Biraz su ister misiniz?" nasıl denir?', 'a' => 'Möchten Sie etwas Wasser?', 'others' => ['Trinken Sie Wasser?', 'Haben Sie Wasser?', 'Ist das Wasser?']],
                    ['q' => '"Was möchtest du zum Geburtstag?" sorusu neyi sormaktadır?', 'a' => 'Doğum günü hediyesi isteğini', 'others' => ['Yaşını', 'Doğum tarihini', 'Nerede doğduğunu']],
                    ['q' => '"Er möchte heute nicht arbeiten." cümlesinde "çalışmak" fiili hangisidir?', 'a' => 'arbeiten', 'others' => ['spielen', 'lernen', 'kochen']],
                ]
            ],
            'Wollen' => [
                'description' => 'İstemek (Niyet/Kesinlik)',
                'content' => [
                    ['g' => 'Ich will Deutsch lernen.', 't' => 'Almanca öğrenmek istiyorum.'],
                    ['g' => 'Willst du heute Fußball spielen?', 't' => 'Bugün futbol oynamak istiyor musun?'],
                    ['g' => 'Er will Arzt werden.', 't' => 'O doktor olmak istiyor.'],
                    ['g' => 'Wir wollen am Wochenende wandern gehen.', 't' => 'Hafta sonu yürüyüşe gitmek istiyoruz.'],
                    ['g' => 'Wollt ihr Pizza essen?', 't' => 'Pizza yemek istiyor musunuz?'],
                    ['g' => 'Sie wollen ein Haus bauen.', 't' => 'Onlar bir ev inşa etmek istiyorlar.'],
                    ['g' => 'Ich will nicht mehr warten.', 't' => 'Daha fazla beklemek istemiyorum.'],
                    ['g' => 'Was willst du von mir?', 't' => 'Benden ne istiyorsun?'],
                    ['g' => 'Willst du mitkommen?', 't' => 'Gelmek istiyor musun?'],
                    ['g' => 'Er will alles alleine machen.', 't' => 'Her şeyi tek başına yapmak istiyor.'],
                ],
                'questions' => [
                    ['q' => '"Ich will Deutsch lernen." cümlesinde niyet belirten fiil hangisidir?', 'a' => 'will', 'others' => ['Deutsch', 'lernen', 'Ich']],
                    ['q' => '"Bugün futbol oynamak istiyor musun?" sorusunun Almancası nedir?', 'a' => 'Willst du heute Fußball spielen?', 'others' => ['Spielst du Fußball?', 'Kannst du Fußball spielen?', 'Möchtest du Fußball?']],
                    ['q' => 'Doktor olmak isteyen biri hangisini söyler?', 'a' => 'Ich will Arzt werden.', 'others' => ['Ich bin Arzt.', 'Ich war Arzt.', 'Ich werde Arzt.']],
                    ['q' => '"Wir wollen am Wochenende wandern gehen." cümlesinde ne zaman yürüyüşe gidilecek?', 'a' => 'Hafta sonu', 'others' => ['Bugün', 'Yarın', 'Akşam']],
                    ['q' => '"Wollt ihr Pizza essen?" sorusu kime yöneltilmiştir?', 'a' => 'Siz (Çoğul)', 'others' => ['Sen', 'Onlar', 'Biz']],
                    ['q' => '"Onlar bir ev inşa etmek istiyorlar" cümlesindeki fiil hangisidir?', 'a' => 'bauen', 'others' => ['kaufen', 'wohnen', 'mieten']],
                    ['q' => '"Ich will nicht mehr warten." cümlesindeki "nicht mehr" ne anlama gelir?', 'a' => 'Artık değil / Daha fazla değil', 'others' => ['Her zaman', 'Asla', 'Belki']],
                    ['q' => '"Was willst du von mir?" sorusunun Türkçe karşılığı nedir?', 'a' => 'Benden ne istiyorsun?', 'others' => ['Nereye gidiyorsun?', 'Kimsin?', 'Nasılsın?']],
                    ['q' => '"Willst du mitkommen?" sorusu ne anlama gelir?', 'a' => 'Birlikte gelmek istiyor musun?', 'others' => ['Gidecek misin?', 'Burada mısın?', 'Neredesin?']],
                    ['q' => '"Er will alles alleine machen." cümlesinde "tek başına" anlamına gelen kelime hangisidir?', 'a' => 'alleine', 'others' => ['alles', 'machen', 'will']],
                ]
            ],
            'Dürfen' => [
                'description' => 'İzinli olmak / Yasak (Olumsuzda)',
                'content' => [
                    ['g' => 'Hier darf man nicht parken.', 't' => 'Buraya park edilemez.'],
                    ['g' => 'Darf ich dich etwas fragen?', 't' => 'Sana bir şey sorabilir miyim?'],
                    ['g' => 'Kinder dürfen hier spielen.', 't' => 'Çocuklar burada oynayabilir.'],
                    ['g' => 'Darf ich hier rauchen?', 't' => 'Burada sigara içebilir miyim?'],
                    ['g' => 'Sie dürfen jetzt gehen.', 't' => 'Şimdi gidebilirsiniz.'],
                    ['g' => 'Man darf im Museum nicht fotografieren.', 't' => 'Müzede fotoğraf çekilemez.'],
                    ['g' => 'Darf ich reinkommen?', 't' => 'İçeri girebilir miyim?'],
                    ['g' => 'Wir dürfen heute länger schlafen.', 't' => 'Bugün daha uzun uyuyabiliriz.'],
                    ['g' => 'Darf man hier laut Musik hören?', 't' => 'Burada yüksek sesle müzik dinlenebilir mi?'],
                    ['g' => 'Du darfst das nicht vergessen.', 't' => 'Bunu unutmamalısın.'],
                ],
                'questions' => [
                    ['q' => '"Hier darf man nicht parken." cümlesi ne ifade eder?', 'a' => 'Park yasağını', 'others' => ['Park serbestliğini', 'Otopark ücretini', 'Park yerinin doluluğunu']],
                    ['q' => 'Birinden izin isterken "Bir şey sorabilir miyim?" nasıl denir?', 'a' => 'Darf ich etwas fragen?', 'others' => ['Kann ich fragen?', 'Will ich fragen?', 'Muss ich fragen?']],
                    ['q' => '"Kinder dürfen hier spielen." cümlesinde izin verilen grup kimdir?', 'a' => 'Çocuklar', 'others' => ['Yetişkinler', 'Hayvanlar', 'Herkes']],
                    ['q' => 'Sigara içmek için izin istenirken kullanılan cümle hangisidir?', 'a' => 'Darf ich hier rauchen?', 'others' => ['Rauche ich?', 'Will ich rauchen?', 'Muss ich rauchen?']],
                    ['q' => '"Sie dürfen jetzt gehen." cümlesinde izin veren fiil hangisidir?', 'a' => 'dürfen', 'others' => ['gehen', 'jetzt', 'Sie']],
                    ['q' => '"Man darf im Museum nicht fotografieren." cümlesinde yasak olan eylem nedir?', 'a' => 'Fotoğraf çekmek', 'others' => ['Konuşmak', 'Koşmak', 'Yemek yemek']],
                    ['q' => 'İçeri girmek için izin istenirken "Darf ich ...?" boşluğuna ne gelmelidir?', 'a' => 'reinkommen', 'others' => ['rausgehen', 'schlafen', 'trinken']],
                    ['q' => '"Wir dürfen heute länger schlafen." cümlesi ne anlatır?', 'a' => 'Geç kalkmaya izinleri olduğunu', 'others' => ['Erken kalkmaları gerektiğini', 'Uykusuz olduklarını', 'Hiç uyumayacaklarını']],
                    ['q' => '"Darf man hier laut Musik hören?" sorusundaki "laut" ne demektir?', 'a' => 'Yüksek sesle', 'others' => ['Yavaş', 'Güzel', 'Kötü']],
                    ['q' => '"Du darfst das nicht vergessen." cümlesi ne anlam taşır?', 'a' => 'Bunu unutmaman gerekir (Önemli/Yasak)', 'others' => ['Unutabilirsin', 'Hatırlamıyorsun', 'Unutmak iyidir']],
                ]
            ],
            'Können' => [
                'description' => 'Ebilmek (Yetenek / Olasılık)',
                'content' => [
                    ['g' => 'Ich kann gut schwimmen.', 't' => 'İyi yüzebilirim.'],
                    ['g' => 'Kannst du mir helfen?', 't' => 'Bana yardım edebilir misin?'],
                    ['g' => 'Er kann Gitarre spielen.', 't' => 'O gitar çalabiliyor.'],
                    ['g' => 'Wir können morgen kommen.', 't' => 'Yarın gelebiliriz.'],
                    ['g' => 'Könnt ihr Deutsch sprechen?', 't' => 'Almanca konuşabiliyor musunuz?'],
                    ['g' => 'Sie können hier warten.', 't' => 'Burada bekleyebilirsiniz.'],
                    ['g' => 'Kann ich das Fenster öffnen?', 't' => 'Pencereyi açabilir miyim?'],
                    ['g' => 'Man kann hier billig essen.', 't' => 'Burada ucuza yemek yenilebilir.'],
                    ['g' => 'Ich kann heute nicht arbeiten.', 't' => 'Bugün çalışamam.'],
                    ['g' => 'Kannst du Klavier spielen?', 't' => 'Piyano çalabiliyor musun?'],
                ],
                'questions' => [
                    ['q' => '"Ich kann gut schwimmen." cümlesi neyi ifade eder?', 'a' => 'Bir yeteneği', 'others' => ['Bir zorunluluğu', 'Bir izni', 'Bir niyeti']],
                    ['q' => 'Yardım isterken hangisi daha uygundur?', 'a' => 'Kannst du mir helfen?', 'others' => ['Willst du helfen?', 'Darfst du helfen?', 'Musst du helfen?']],
                    ['q' => 'Gitar çalabilen biri için hangisi söylenir?', 'a' => 'Er kann Gitarre spielen.', 'others' => ['Er spielt Gitarre.', 'Er will Gitarre spielen.', 'Er muss Gitarre spielen.']],
                    ['q' => '"Wir können morgen kommen." cümlesinde "können" ne ifade eder?', 'a' => 'Olasılık/İmkan', 'others' => ['Yasak', 'Zorunluluk', 'Tavsiye']],
                    ['q' => '"Könnt ihr Deutsch sprechen?" sorusu kime yöneltilmiştir?', 'a' => 'Siz (Çoğul)', 'others' => ['Sen', 'Onlar', 'Biz']],
                    ['q' => '"Burada bekleyebilirsiniz" cümlesinin Almancası nedir?', 'a' => 'Sie können hier warten.', 'others' => ['Sie müssen hier warten.', 'Sie wollen hier warten.', 'Sie dürfen hier warten.']],
                    ['q' => 'Pencereyi açmak için izin/imkan sorarken hangisi kullanılır?', 'a' => 'Kann ich das Fenster öffnen?', 'others' => ['Will ich das Fenster öffnen?', 'Muss ich das Fenster öffnen?', 'Soll ich das Fenster öffnen?']],
                    ['q' => '"Man kann hier billig essen." cümlesindeki "billig" ne demektir?', 'a' => 'Ucuz', 'others' => ['Pahalı', 'Lezzetli', 'Hızlı']],
                    ['q' => '"Ich kann heute nicht arbeiten." cümlesi ne anlama gelir?', 'a' => 'Bugün çalışamam (Mümkün değil)', 'others' => ['Bugün çalışmak istemiyorum', 'Bugün çalışmamalıyım', 'Bugün çalışmak zorundayım']],
                    ['q' => '"Kannst du Klavier spielen?" sorusunda hangi enstrüman sorulmaktadır?', 'a' => 'Piyano', 'others' => ['Gitar', 'Keman', 'Flüt']],
                ]
            ],
            'Müssen' => [
                'description' => 'Zorunluluk',
                'content' => [
                    ['g' => 'Ich muss zur Arbeit gehen.', 't' => 'İşe gitmem gerekiyor.'],
                    ['g' => 'Musst du heute lernen?', 't' => 'Bugün ders çalışman gerekiyor mu?'],
                    ['g' => 'Er muss früh aufstehen.', 't' => 'O erken kalkmalı.'],
                    ['g' => 'Wir müssen den Bus nehmen.', 't' => 'Otobüse binmeliyiz.'],
                    ['g' => 'Müsst ihr jetzt gehen?', 't' => 'Şimdi gitmeniz mi gerekiyor?'],
                    ['g' => 'Sie müssen hier unterschreiben.', 't' => 'Burayı imzalamalısınız.'],
                    ['g' => 'Ich muss viel Wasser trinken.', 't' => 'Çok su içmeliyim.'],
                    ['g' => 'Man muss hier leise sein.', 't' => 'Burada sessiz olunmalı.'],
                    ['g' => 'Musst du wirklich gehen?', 't' => 'Gerçekten gitmen mi gerekiyor?'],
                    ['g' => 'Wir müssen die Hausaufgaben machen.', 't' => 'Ödevleri yapmalıyız.'],
                ],
                'questions' => [
                    ['q' => '"Ich muss zur Arbeit gehen." cümlesindeki "muss" ne ifade eder?', 'a' => 'Zorunluluk', 'others' => ['İstek', 'İzin', 'Yetenek']],
                    ['q' => '"Bugün ders çalışman gerekiyor mu?" sorusunun Almancası nedir?', 'a' => 'Musst du heute lernen?', 'others' => ['Kannst du heute lernen?', 'Willst du heute lernen?', 'Sollst du heute lernen?']],
                    ['q' => 'Erken kalkması gereken biri için hangisi söylenir?', 'a' => 'Er muss früh aufstehen.', 'others' => ['Er will früh aufstehen.', 'Er kann früh aufstehen.', 'Er darf früh aufstehen.']],
                    ['q' => '"Wir müssen den Bus nehmen." cümlesinde hangi taşıttan bahsediliyor?', 'a' => 'Otobüs', 'others' => ['Tren', 'Araba', 'Uçak']],
                    ['q' => '"Müsst ihr jetzt gehen?" sorusundaki "jetzt" ne demektir?', 'a' => 'Şimdi', 'others' => ['Sonra', 'Yarın', 'Bugün']],
                    ['q' => 'İmza atılması gerektiğini belirten cümle hangisidir?', 'a' => 'Sie müssen hier unterschreiben.', 'others' => ['Sie können hier lesen.', 'Sie wollen hier schreiben.', 'Sie dürfen hier warten.']],
                    ['q' => '"Ich muss viel Wasser trinken." cümlesindeki "viel" ne anlama gelir?', 'a' => 'Çok', 'others' => ['Az', 'Biraz', 'Hiç']],
                    ['q' => '"Man muss hier leise sein." cümlesi ne ifade eder?', 'a' => 'Sessiz olma zorunluluğunu', 'others' => ['Konuşma özgürlüğünü', 'Müzik dinlemeyi', 'Yüksek sesle gülmeyi']],
                    ['q' => '"Musst du wirklich gehen?" sorusundaki "wirklich" ne demektir?', 'a' => 'Gerçekten', 'others' => ['Belki', 'Asla', 'Yine']],
                    ['q' => '"Wir müssen die Hausaufgaben machen." cümlesindeki "Hausaufgaben" nedir?', 'a' => 'Ev ödevi', 'others' => ['Ev işi', 'Ev kuralları', 'Ev alışverişi']],
                ]
            ],
            'Sollen' => [
                'description' => 'Gereklilik (Tavsiye / Görev)',
                'content' => [
                    ['g' => 'Ich soll mehr Sport machen.', 't' => 'Daha fazla spor yapmalıyım.'],
                    ['g' => 'Soll ich das Fenster schließen?', 't' => 'Pencereyi kapatayım mı?'],
                    ['g' => 'Du sollst nicht lügen.', 't' => 'Yalan söylememelisin.'],
                    ['g' => 'Was soll ich machen?', 't' => 'Ne yapmalıyım?'],
                    ['g' => 'Er soll zum Arzt gehen.', 't' => 'O doktora gitmeli.'],
                    ['g' => 'Wir sollen hier warten.', 't' => 'Burada beklememiz söyleniyor.'],
                    ['g' => 'Sollt ihr nicht lernen?', 't' => 'Ders çalışmanız gerekmiyor mu?'],
                    ['g' => 'Sie sollen pünktlich sein.', 't' => 'Onlar dakik olmalı.'],
                    ['g' => 'Soll ich dir helfen?', 't' => 'Sana yardım edeyim mi?'],
                    ['g' => 'Man soll im Wald vorsichtig sein.', 't' => 'Ormanda dikkatli olunmalı.'],
                ],
                'questions' => [
                    ['q' => 'Doktorun spor yapmanızı tavsiye ettiği durum için hangisi kullanılır?', 'a' => 'Ich soll Sport machen.', 'others' => ['Ich will Sport machen.', 'Ich kann Sport machen.', 'Ich darf Sport machen.']],
                    ['q' => '"Pencereyi kapatayım mı?" diye birine danışırken hangisi söylenir?', 'a' => 'Soll ich das Fenster schließen?', 'others' => ['Muss ich das Fenster schließen?', 'Will ich das Fenster schließen?', 'Kann ich das Fenster schließen?']],
                    ['q' => '"Du sollst nicht lügen." cümlesindeki "lügen" ne demektir?', 'a' => 'Yalan söylemek', 'others' => ['Konuşmak', 'Gülmek', 'Koşmak']],
                    ['q' => '"Ne yapmalıyım?" sorusunun Almancası nedir?', 'a' => 'Was soll ich machen?', 'others' => ['Was mache ich?', 'Was kann ich machen?', 'Was will ich machen?']],
                    ['q' => '"Er soll zum Arzt gehen." cümlesinde nereye gitmesi tavsiye ediliyor?', 'a' => 'Doktora', 'others' => ['Okula', 'Eve', 'İşe']],
                    ['q' => 'Bize beklememiz söylendiğini nasıl ifade ederiz?', 'a' => 'Wir sollen warten.', 'others' => ['Wir wollen warten.', 'Wir können warten.', 'Wir müssen warten.']],
                    ['q' => '"Sollt ihr nicht lernen?" sorusu neyi ifade eder?', 'a' => 'Ders çalışmaları gerektiğini hatırlatır', 'others' => ['Ders çalışıp çalışmadıklarını sorar', 'Ders çalışmak isteyip istemediklerini sorar', 'Ders çalışabildiklerini sorar']],
                    ['q' => '"Sie sollen pünktlich sein." cümlesindeki "pünktlich" ne demektir?', 'a' => 'Dakik', 'others' => ['Geç', 'Erken', 'Hızlı']],
                    ['q' => '"Soll ich dir helfen?" sorusu ne amaçla sorulur?', 'a' => 'Yardım teklif etmek', 'others' => ['Yardım istemek', 'Yardım etmeyi reddetmek', 'Yardımı engellemek']],
                    ['q' => '"Man soll im Wald vorsichtig sein." cümlesindeki "vorsichtig" ne demektir?', 'a' => 'Dikkatli', 'others' => ['Korkusuz', 'Hızlı', 'Yalnız']],
                ]
            ],
        ];

        $order = 10; // Start after existing lessons if any
        foreach ($modalVerbs as $title => $data) {
            $lesson = Lesson::firstOrCreate([
                'lesson_title' => $title . ': Almanca Modal Fiiller'
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['description'] . ' fiilinin kullanımı ve örnek cümleler.',
                'lesson_image' => 'assets/img/logo.png', // Using the mascot logo
                'order_index' => $order++,
                'is_active' => true
            ]);

            // Add Content (Examples)
            foreach ($data['content'] as $idx => $c) {
                Content::firstOrCreate(
                    ['content_german' => $c['g'], 'lesson_id' => $lesson->id],
                    [
                        'content_turkish' => $c['t'],
                        'order_index' => $idx + 1,
                        'is_active' => true
                    ]
                );
            }

            // Create Exercises (Alıştırmalar)
            $exercise = Exercise::firstOrCreate([
                'title' => $title . ' Cümle Alıştırmaları',
                'lesson_id' => $lesson->id
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            foreach ($data['content'] as $idx => $c) {
                ExerciseItem::firstOrCreate([
                    'exercise_id' => $exercise->id,
                    'german' => $c['g']
                ], [
                    'turkish' => $c['t'],
                    'order_index' => $idx + 1
                ]);
            }
        }
    }
}
