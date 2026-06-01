<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Content;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Word;
use App\Models\Question;
use App\Models\Test;

class B1_1_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::firstOrCreate([
            'level_title' => 'B1.1 Orta Seviye'
        ], [
            'level_slug' => Str::slug('B1.1 Orta Seviye'),
            'level_description' => 'B1 seviyesi ilk aşaması. Präteritum, Plusquamperfekt ve Infinitiv mit zu.',
            'order_index' => 4,
            'is_active' => true
        ]);

        $topics = [
            'Präteritum (Geçmiş Zaman - Yazı Dili)' => [
                'desc' => 'Tüm fiiller için yazılı dilde geçmiş zaman (ging, sah, las...).',
                'words' => [
                    ['g' => 'gehen - ging', 't' => 'gitmek - gitti'], ['g' => 'sehen - sah', 't' => 'görmek - gördü'],
                    ['g' => 'lesen - las', 't' => 'okumak - okudu'], ['g' => 'schreiben - schrieb', 't' => 'yazmak - yazdı'],
                    ['g' => 'trinken - trank', 't' => 'içmek - içti'], ['g' => 'essen - aß', 't' => 'yemek - yedi'],
                    ['g' => 'schlafen - schlief', 't' => 'uyumak - uyudu'], ['g' => 'sprechen - sprach', 't' => 'konuşmak - konuştu'],
                    ['g' => 'finden - fand', 't' => 'bulmak - buldu'], ['g' => 'helfen - half', 't' => 'yardım etmek - yardım etti'],
                    ['g' => 'nehmen - nahm', 't' => 'almak - aldı'], ['g' => 'treffen - traf', 't' => 'buluşmak - buluştu'],
                    ['g' => 'verstehen - verstand', 't' => 'anlamak - anladı'], ['g' => 'bleiben - blieb', 't' => 'kalmak - kaldı'],
                    ['g' => 'denken - dachte', 't' => 'düşünmek - düşündü'], ['g' => 'bringen - brachte', 't' => 'getirmek - getirdi'],
                    ['g' => 'kennen - kannte', 't' => 'tanımak - tanıdı'], ['g' => 'wissen - wusste', 't' => 'bilmek - bildi'],
                    ['g' => 'bitten - bat', 't' => 'rica etmek - rica etti'], ['g' => 'sitzen - saß', 't' => 'oturmak - oturdu']
                ],
                'sentences' => [
                    ['g' => 'Er ging gestern spazieren.', 't' => 'O dün yürüyüşe çıktı.'],
                    ['g' => 'Ich sah einen schönen Film.', 't' => 'Güzel bir film gördüm/izledim.'],
                    ['g' => 'Sie las ein spannendes Buch.', 't' => 'O heyecan verici bir kitap okudu.'],
                    ['g' => 'Wir schrieben einen langen Brief.', 't' => 'Biz uzun bir mektup yazdık.'],
                    ['g' => 'Der Mann trank ein Glas Wasser.', 't' => 'Adam bir bardak su içti.'],
                    ['g' => 'Sie aßen gemeinsam im Restaurant.', 't' => 'Birlikte restoranda yemek yediler.'],
                    ['g' => 'Das Kind schlief sofort ein.', 't' => 'Çocuk hemen uyuyakaldı.'],
                    ['g' => 'Er sprach sehr gut Deutsch.', 't' => 'O çok iyi Almanca konuştu.'],
                    ['g' => 'Ich fand meine Schlüssel nicht.', 't' => 'Anahtarlarımı bulamadım.'],
                    ['g' => 'Der Lehrer half dem Schüler.', 't' => 'Öğretmen öğrenciye yardım etti.'],
                    ['g' => 'Sie nahm den frühen Zug.', 't' => 'O erken treni aldı.'],
                    ['g' => 'Wir trafen uns vor dem Kino.', 't' => 'Sinemanın önünde buluştuk.'],
                    ['g' => 'Er verstand die Frage nicht.', 't' => 'O soruyu anlamadı.'],
                    ['g' => 'Ich blieb eine Woche in Berlin.', 't' => 'Berlin\'de bir hafta kaldım.'],
                    ['g' => 'Ich dachte an dich.', 't' => 'Seni düşündüm.'],
                    ['g' => 'Sie brachte Blumen mit.', 't' => 'Yanında çiçek getirdi.'],
                    ['g' => 'Er kannte die Antwort.', 't' => 'O cevabı biliyordu/tanıyordu.'],
                    ['g' => 'Ich wusste das nicht.', 't' => 'Bunu bilmiyordum.'],
                    ['g' => 'Sie bat mich um Hilfe.', 't' => 'Benden yardım rica etti.'],
                    ['g' => 'Wir saßen im Garten.', 't' => 'Bahçede oturuyorduk.']
                ],
                'questions' => [
                    ['q' => 'Gestern ___ ich einen alten Freund.', 'a' => 'traf', 'w' => ['treffe', 'getroffen', 'treffte']],
                    ['q' => 'Der Junge ___ ein Buch.', 'a' => 'las', 'w' => ['liest', 'lese', 'leste']],
                    ['q' => 'Wir ___ gestern ins Kino.', 'a' => 'gingen', 'w' => ['gehen', 'gegangen', 'ging']],
                    ['q' => 'Sie ___ ihm bei der Arbeit.', 'a' => 'half', 'w' => ['hilft', 'geholfen', 'helfte']],
                    ['q' => 'Ich ___ nicht, wo er war.', 'a' => 'wusste', 'w' => ['weiß', 'gewusst', 'wisste']],
                    ['q' => 'Er ___ eine Pizza.', 'a' => 'aß', 'w' => ['isst', 'gegessen', 'ess']],
                    ['q' => 'Die Kinder ___ schnell ein.', 'a' => 'schliefen', 'w' => ['schlafen', 'geschlafen', 'schlieft']],
                    ['q' => 'Ich ___ den Film sehr gut.', 'a' => 'fand', 'w' => ['finde', 'gefunden', 'findte']],
                    ['q' => 'Sie ___ einen Brief an ihre Mutter.', 'a' => 'schrieb', 'w' => ['schreibt', 'geschrieben', 'schriebt']],
                    ['q' => 'Wir ___ im Park auf der Bank.', 'a' => 'saßen', 'w' => ['sitzen', 'gesessen', 'saßt']],
                    ['q' => 'Er ___ das Wasser schnell.', 'a' => 'trank', 'w' => ['trinkt', 'getrunken', 'tränkt']],
                    ['q' => 'Sie ___ den Bus um 8 Uhr.', 'a' => 'nahm', 'w' => ['nimmt', 'genommen', 'nahmt']],
                    ['q' => 'Ich ___ an meinen Urlaub.', 'a' => 'dachte', 'w' => ['denke', 'gedacht', 'denkte']],
                    ['q' => 'Der Mann ___ mit dem Chef.', 'a' => 'sprach', 'w' => ['spricht', 'gesprochen', 'spracht']],
                    ['q' => 'Wir ___ zu Hause.', 'a' => 'blieben', 'w' => ['bleiben', 'geblieben', 'bleibt']],
                    ['q' => 'Er ___ mir ein Geschenk.', 'a' => 'brachte', 'w' => ['bringt', 'gebracht', 'bringte']],
                    ['q' => 'Sie ___ das Thema nicht.', 'a' => 'verstand', 'w' => ['versteht', 'verstanden', 'verständ']],
                    ['q' => 'Ich ___ ihn schon lange.', 'a' => 'kannte', 'w' => ['kenne', 'gekannt', 'kennte']],
                    ['q' => 'Der Hund ___ plötzlich.', 'a' => 'sah', 'w' => ['sieht', 'gesehen', 'seht']],
                    ['q' => 'Er ___ um ein Glas Wasser.', 'a' => 'bat', 'w' => ['bittet', 'gebeten', 'bittete']],
                ]
            ],
            'Plusquamperfekt (Miş\'li Geçmiş Zaman)' => [
                'desc' => 'Geçmişte olan iki olaydan daha önce olanı anlatırken (hatte/war + Partizip II).',
                'words' => [
                    ['g' => 'nachdem', 't' => '-dikten sonra'], ['g' => 'bevor', 't' => '-meden önce'],
                    ['g' => 'schon', 't' => 'çoktan/zaten'], ['g' => 'als', 't' => '-dığında'],
                    ['g' => 'die Prüfung', 't' => 'sınav'], ['g' => 'das Essen', 't' => 'yemek'],
                    ['g' => 'fertig', 't' => 'hazır/bitmiş'], ['g' => 'ankommen', 't' => 'varmak'],
                    ['g' => 'abfahren', 't' => 'kalkmak (araç)'], ['g' => 'einschlafen', 't' => 'uyuyakalmak'],
                    ['g' => 'lernen', 't' => 'öğrenmek/çalışmak'], ['g' => 'aufstehen', 't' => 'kalkmak'],
                    ['g' => 'frühstücken', 't' => 'kahvaltı yapmak'], ['g' => 'vergessen', 't' => 'unutmak'],
                    ['g' => 'verlieren', 't' => 'kaybetmek'], ['g' => 'beginnen', 't' => 'başlamak'],
                    ['g' => 'enden', 't' => 'bitmek'], ['g' => 'kaufen', 't' => 'satın almak'],
                    ['g' => 'bezahlen', 't' => 'ödemek'], ['g' => 'bemerken', 't' => 'fark etmek']
                ],
                'sentences' => [
                    ['g' => 'Nachdem er gegessen hatte, ging er schlafen.', 't' => 'Yemeğini yedikten sonra uyumaya gitti.'],
                    ['g' => 'Als ich am Bahnhof ankam, war der Zug schon abgefahren.', 't' => 'İstasyona vardığımda tren çoktan gitmişti.'],
                    ['g' => 'Er kaufte das Auto, nachdem er Geld gespart hatte.', 't' => 'Para biriktirdikten sonra arabayı satın aldı.'],
                    ['g' => 'Bevor er nach Deutschland kam, hatte er Deutsch gelernt.', 't' => 'Almanya\'ya gelmeden önce Almanca öğrenmişti.'],
                    ['g' => 'Ich war müde, weil ich vorher viel gearbeitet hatte.', 't' => 'Yorgundum çünkü daha önce çok çalışmıştım.'],
                    ['g' => 'Sie weinte, weil sie ihren Ring verloren hatte.', 't' => 'Ağlıyordu çünkü yüzüğünü kaybetmişti.'],
                    ['g' => 'Wir konnten nicht ins Kino, weil der Film schon begonnen hatte.', 't' => 'Sinemaya giremedik çünkü film çoktan başlamıştı.'],
                    ['g' => 'Nachdem sie aufgestanden war, trank sie einen Kaffee.', 't' => 'Kalktıktan sonra bir kahve içti.'],
                    ['g' => 'Er bemerkte erst spät, dass er seine Tasche vergessen hatte.', 't' => 'Çantasını unuttuğunu ancak geç fark etti.'],
                    ['g' => 'Als wir ankamen, hatten sie schon gefrühstückt.', 't' => 'Biz vardığımızda onlar çoktan kahvaltı yapmışlardı.'],
                    ['g' => 'Ich hatte das Buch schon gelesen, bevor wir darüber sprachen.', 't' => 'Biz üzerine konuşmadan önce kitabı zaten okumuştum.'],
                    ['g' => 'Nachdem ich die Rechnung bezahlt hatte, verließ ich das Restaurant.', 't' => 'Hesabı ödedikten sonra restorandan ayrıldım.'],
                    ['g' => 'Er war wütend, weil sie ihn nicht angerufen hatte.', 't' => 'Kızgındı çünkü o onu aramamıştı.'],
                    ['g' => 'Als die Polizei ankam, waren die Diebe schon geflohen.', 't' => 'Polis geldiğinde hırsızlar çoktan kaçmıştı.'],
                    ['g' => 'Nachdem es geregnet hatte, war die Straße nass.', 't' => 'Yağmur yağdıktan sonra sokak ıslaktı.'],
                    ['g' => 'Ich hatte gehofft, dass du kommst.', 't' => 'Geleceğini ummuştum.'],
                    ['g' => 'Bevor er schlief, hatte er noch ein Buch gelesen.', 't' => 'Uyumadan önce bir kitap okumuştu.'],
                    ['g' => 'Als ich aufwachte, war sie schon gegangen.', 't' => 'Uyandığımda o çoktan gitmişti.'],
                    ['g' => 'Wir hatten uns lange nicht gesehen.', 't' => 'Uzun zamandır görüşmemiştik.'],
                    ['g' => 'Er fiel durch die Prüfung, weil er nicht gelernt hatte.', 't' => 'Sınavdan kaldı çünkü çalışmamıştı.']
                ],
                'questions' => [
                    ['q' => 'Als ich ankam, ___ der Zug schon abgefahren.', 'a' => 'war', 'w' => ['hatte', 'ist', 'habe']],
                    ['q' => 'Nachdem er gegessen ___, ging er ins Bett.', 'a' => 'hatte', 'w' => ['war', 'habe', 'ist']],
                    ['q' => 'Ich war müde, weil ich die ganze Nacht ___ hatte.', 'a' => 'gearbeitet', 'w' => ['arbeite', 'arbeitete', 'gearbeiten']],
                    ['q' => 'Bevor sie nach Berlin zog, ___ sie in München gewohnt.', 'a' => 'hatte', 'w' => ['war', 'habe', 'ist']],
                    ['q' => 'Wir konnten nicht rein, weil der Film schon ___ hatte.', 'a' => 'begonnen', 'w' => ['beginnt', 'beginnen', 'begann']],
                    ['q' => 'Als ich aufwachte, ___ die Sonne schon aufgegangen.', 'a' => 'war', 'w' => ['hatte', 'ist', 'habe']],
                    ['q' => 'Nachdem ich das Buch ___ hatte, gab ich es ihm zurück.', 'a' => 'gelesen', 'w' => ['lese', 'las', 'gelest']],
                    ['q' => 'Er war wütend, weil sie ihn nicht ___ hatte.', 'a' => 'angerufen', 'w' => ['anruft', 'anrief', 'angeruft']],
                    ['q' => 'Sie ___ das Auto gekauft, nachdem sie lange gespart hatte.', 'a' => 'hatte', 'w' => ['war', 'hat', 'ist']],
                    ['q' => 'Wir hatten uns lange nicht ___, als wir uns trafen.', 'a' => 'gesehen', 'w' => ['sehen', 'sahen', 'geseht']],
                    ['q' => 'Ich ___ noch nie in Paris gewesen, bevor wir dorthin fuhren.', 'a' => 'war', 'w' => ['hatte', 'bin', 'habe']],
                    ['q' => 'Nachdem er ___, ging er zur Arbeit.', 'a' => 'gefrühstückt hatte', 'w' => ['frühstückt hat', 'gefrühstückt war', 'frühstücken hatte']],
                    ['q' => 'Ich fiel durch, weil ich nicht ___ hatte.', 'a' => 'gelernt', 'w' => ['lerne', 'lernte', 'gelernten']],
                    ['q' => 'Als er nach Hause kam, ___ die Kinder schon eingeschlafen.', 'a' => 'waren', 'w' => ['hatten', 'sind', 'haben']],
                    ['q' => 'Sie bestanden den Test, weil sie den Kurs ___ hatten.', 'a' => 'besucht', 'w' => ['besuchen', 'besuchte', 'besuchten']],
                    ['q' => 'Nachdem es geregnet ___, schien die Sonne.', 'a' => 'hatte', 'w' => ['war', 'hat', 'ist']],
                    ['q' => 'Ich ___ vergessen, dir das zu sagen.', 'a' => 'hatte', 'w' => ['war', 'habe', 'ist']],
                    ['q' => 'Als wir ankamen, ___ das Konzert schon begonnen.', 'a' => 'hatte', 'w' => ['war', 'hat', 'ist']],
                    ['q' => 'Er ___ seine Schlüssel verloren, deshalb konnte er nicht rein.', 'a' => 'hatte', 'w' => ['war', 'hat', 'ist']],
                    ['q' => 'Nachdem sie ___ war, machte sie Kaffee.', 'a' => 'aufgestanden', 'w' => ['aufgestanden hatte', 'aufsteht', 'aufstand']],
                ]
            ],
            'Infinitiv mit "zu"' => [
                'desc' => '"zu" edatıyla kullanılan mastar cümleleri (Örn: Ich versuche, zu lernen).',
                'words' => [
                    ['g' => 'versuchen', 't' => 'denemek'], ['g' => 'vergessen', 't' => 'unutmak'],
                    ['g' => 'anfangen', 't' => 'başlamak'], ['g' => 'aufhören', 't' => 'bırakmak/son vermek'],
                    ['g' => 'hoffen', 't' => 'ummak'], ['g' => 'bitten', 't' => 'rica etmek'],
                    ['g' => 'versprechen', 't' => 'söz vermek'], ['g' => 'planen', 't' => 'planlamak'],
                    ['g' => 'sich entscheiden', 't' => 'karar vermek'], ['g' => 'es ist wichtig', 't' => 'önemlidir'],
                    ['g' => 'es ist schwer', 't' => 'zordur'], ['g' => 'es ist einfach', 't' => 'kolaydır'],
                    ['g' => 'es ist schön', 't' => 'güzeldir'], ['g' => 'Lust haben', 't' => 'canı istemek'],
                    ['g' => 'Zeit haben', 't' => 'zamanı olmak'], ['g' => 'Angst haben', 't' => 'korkmak'],
                    ['g' => 'verbieten', 't' => 'yasaklamak'], ['g' => 'erlauben', 't' => 'izin vermek'],
                    ['g' => 'vorhaben', 't' => 'niyeti olmak'], ['g' => 'empfehlen', 't' => 'tavsiye etmek']
                ],
                'sentences' => [
                    ['g' => 'Ich versuche, das Auto zu reparieren.', 't' => 'Arabayı tamir etmeyi deniyorum.'],
                    ['g' => 'Hast du vergessen, mich anzurufen?', 't' => 'Beni aramayı unuttun mu?'],
                    ['g' => 'Es ist wichtig, viel Wasser zu trinken.', 't' => 'Çok su içmek önemlidir.'],
                    ['g' => 'Ich habe keine Lust, heute zu kochen.', 't' => 'Bugün yemek yapmaya hiç canım istemiyor.'],
                    ['g' => 'Wir planen, nach Spanien zu reisen.', 't' => 'İspanya\'ya seyahat etmeyi planlıyoruz.'],
                    ['g' => 'Es ist schwer, Chinesisch zu lernen.', 't' => 'Çince öğrenmek zordur.'],
                    ['g' => 'Er fängt an, Gitarre zu spielen.', 't' => 'Gitar çalmaya başlıyor.'],
                    ['g' => 'Hör auf, so laut zu sprechen!', 't' => 'Bu kadar yüksek sesle konuşmayı bırak!'],
                    ['g' => 'Ich hoffe, dich bald zu sehen.', 't' => 'Seni yakında görmeyi umuyorum.'],
                    ['g' => 'Sie hat mir versprochen, pünktlich zu kommen.', 't' => 'Bana vaktinde geleceğine söz verdi.'],
                    ['g' => 'Hast du Zeit, mir zu helfen?', 't' => 'Bana yardım edecek zamanın var mı?'],
                    ['g' => 'Es ist schön, dich wiederzutreffen.', 't' => 'Seni tekrar görmek güzel.'],
                    ['g' => 'Der Arzt hat mir empfohlen, im Bett zu bleiben.', 't' => 'Doktor bana yatakta kalmamı tavsiye etti.'],
                    ['g' => 'Mein Vater hat mir verboten, spät nach Hause zu kommen.', 't' => 'Babam bana eve geç gelmeyi yasakladı.'],
                    ['g' => 'Ich habe vor, am Wochenende auszugehen.', 't' => 'Hafta sonu dışarı çıkma niyetim var.'],
                    ['g' => 'Sie hat Angst, Fehler zu machen.', 't' => 'O hata yapmaktan korkuyor.'],
                    ['g' => 'Wir haben uns entschieden, das Haus zu verkaufen.', 't' => 'Evi satmaya karar verdik.'],
                    ['g' => 'Er bat mich, das Fenster zuzumachen.', 't' => 'Benden pencereyi kapatmamı rica etti.'],
                    ['g' => 'Es ist nicht einfach, eine neue Sprache zu lernen.', 't' => 'Yeni bir dil öğrenmek kolay değildir.'],
                    ['g' => 'Ich habe vergessen, die Tür abzuschließen.', 't' => 'Kapıyı kilitlemeyi unuttum.']
                ],
                'questions' => [
                    ['q' => 'Ich versuche, das Problem ___ lösen.', 'a' => 'zu', 'w' => ['an', 'auf', 'um']],
                    ['q' => 'Es ist wichtig, jeden Tag ___ lernen.', 'a' => 'zu', 'w' => ['an', 'auf', 'mit']],
                    ['q' => 'Hast du vergessen, mich ___?', 'a' => 'anzurufen', 'w' => ['anrufen', 'zu anrufen', 'rufen an']],
                    ['q' => 'Wir planen, im Sommer nach Italien ___ fliegen.', 'a' => 'zu', 'w' => ['in', 'nach', 'auf']],
                    ['q' => 'Er hat keine Zeit, mit uns ins Kino ___ gehen.', 'a' => 'zu', 'w' => ['an', 'aus', 'mit']],
                    ['q' => 'Ich hoffe, die Prüfung ___ bestehen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Es ist schwer, ihn ___ verstehen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Sie fängt an, das Buch ___ lesen.', 'a' => 'zu', 'w' => ['an', 'um', 'mit']],
                    ['q' => 'Hör auf, mich ___ stören!', 'a' => 'zu', 'w' => ['an', 'auf', 'um']],
                    ['q' => 'Er hat mir versprochen, mir ___ helfen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Es ist schön, dich hier ___ sehen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Ich habe Lust, eine Pizza ___ essen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Er bat mich, das Fenster ___.', 'a' => 'zuzumachen', 'w' => ['zumachen', 'zu zumachen', 'machen zu']],
                    ['q' => 'Wir haben uns entschieden, das Auto ___ kaufen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Der Arzt empfahl ihr, mehr ___ schlafen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Ich habe vor, bald ___ kündigen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Er hat Angst, allein ___ fliegen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Es ist verboten, hier ___ parken.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Ich vergesse oft, die Blumen ___ gießen.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                    ['q' => 'Es ist nicht einfach, immer pünktlich ___ sein.', 'a' => 'zu', 'w' => ['an', 'um', 'auf']],
                ]
            ]
        ];

        $orderIndex = 1;

        foreach ($topics as $title => $data) {
            $lesson = Lesson::firstOrCreate([
                'lesson_title' => $title
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $data['desc'],
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $orderIndex++,
                'is_active' => true
            ]);

            foreach ($data['words'] as $idx => $word) {
                Word::firstOrCreate([
                    'lesson_id' => $lesson->id,
                    'word_german' => $word['g']
                ], [
                    'word_turkish' => $word['t'],
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
            }

            $exercise = Exercise::firstOrCreate([
                'lesson_id' => $lesson->id,
                'title' => $title . ' Alıştırmaları'
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            foreach ($data['sentences'] as $idx => $sentence) {
                ExerciseItem::firstOrCreate([
                    'exercise_id' => $exercise->id,
                    'german' => $sentence['g']
                ], [
                    'turkish' => $sentence['t'],
                    'order_index' => $idx + 1
                ]);
            }

            $test = Test::firstOrCreate([
                'test_title' => $title . ' Testi',
                'lesson_id' => $lesson->id
            ], [
                'description' => 'Her konu başlığı için özel hazırlanmış 20 soruluk pekiştirme testi.',
                'is_active' => true
            ]);

            $createdQuestions = [];
            foreach ($data['questions'] as $idx => $qData) {
                $q = Question::firstOrCreate([
                    'lesson_id' => $lesson->id,
                    'question_text' => $qData['q']
                ], [
                    'question_type' => 'multiple_choice',
                    'order_index' => $idx + 1,
                    'is_active' => true,
                    'explanation' => '',
                    'media_url' => ''
                ]);

                if ($q->wasRecentlyCreated || $q->answers()->count() === 0) {
                    $q->answers()->delete();
                    
                    $q->answers()->create([
                        'answer_text' => $qData['a'],
                        'is_correct' => true,
                        'order_index' => 1,
                        'is_active' => true
                    ]);

                    foreach ($qData['w'] as $aIdx => $wrong) {
                        $q->answers()->create([
                            'answer_text' => $wrong,
                            'is_correct' => false,
                            'order_index' => $aIdx + 2,
                            'is_active' => true
                        ]);
                    }
                }
                
                $createdQuestions[$q->id] = ['order_index' => $idx + 1];
            }

            if (!empty($createdQuestions)) {
                $test->questions()->sync($createdQuestions);
            }
        }
    }
}
