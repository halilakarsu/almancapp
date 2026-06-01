<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Word;

class A1_Words_Fixer extends Seeder
{
    public function run(): void
    {
        $data = [
            'Möchten: Almanca Modal Fiiller' => [
                ['möchten','istemek (nazik)'],['ich möchte','ben istiyorum'],['du möchtest','sen istiyorsun'],
                ['er möchte','o istiyor'],['wir möchten','biz istiyoruz'],['das Essen','yemek'],
                ['das Getränk','içecek'],['die Speisekarte','menü'],['bitte','lütfen'],
                ['bestellen','sipariş vermek'],['das Restaurant','restoran'],['der Kellner','garson'],
                ['zahlen','ödemek'],['die Rechnung','hesap'],['gern','memnuniyetle'],
                ['noch einmal','bir daha'],['der Kaffee','kahve'],['der Tee','çay'],
                ['das Wasser','su'],['danke','teşekkür ederim'],
            ],
            'Wollen: Almanca Modal Fiiller' => [
                ['wollen','istemek (kararlı)'],['ich will','ben istiyorum'],['du willst','sen istiyorsun'],
                ['er will','o istiyor'],['wir wollen','biz istiyoruz'],['reisen','seyahat etmek'],
                ['kaufen','satın almak'],['die Reise','yolculuk'],['das Ziel','hedef'],
                ['der Plan','plan'],['morgen','yarın'],['heute','bugün'],
                ['sofort','hemen'],['zusammen','birlikte'],['allein','yalnız'],
                ['der Wunsch','istek/dilek'],['unbedingt','mutlaka'],['vielleicht','belki'],
                ['bestimmt','kesinlikle'],['nie','hiçbir zaman'],
            ],
            'Dürfen: Almanca Modal Fiiller' => [
                ['dürfen','izinli olmak'],['ich darf','benim iznim var'],['du darfst','senin iznin var'],
                ['er darf nicht','onun izni yok'],['verboten','yasak'],['erlaubt','izinli'],
                ['rauchen','sigara içmek'],['parken','park etmek'],['eintreten','girmek'],
                ['das Verbot','yasak'],['die Erlaubnis','izin'],['hier','burada'],
                ['draußen','dışarıda'],['leise','sessizce'],['laut','gürültülü'],
                ['der Lärm','gürültü'],['stören','rahatsız etmek'],['schlafen','uyumak'],
                ['das Schild','tabela'],['öffentlich','kamuya açık'],
            ],
            'Können: Almanca Modal Fiiller' => [
                ['können','yapabilmek'],['ich kann','ben yapabilirim'],['du kannst','sen yapabilirsin'],
                ['er kann','o yapabilir'],['schwimmen','yüzmek'],['sprechen','konuşmak'],
                ['lesen','okumak'],['schreiben','yazmak'],['kochen','yemek pişirmek'],
                ['fahren','sürmek/gitmek'],['die Fähigkeit','yetenek'],['gut','iyi'],
                ['schlecht','kötü'],['leider','maalesef'],['natürlich','tabii ki'],
                ['helfen','yardım etmek'],['verstehen','anlamak'],['erklären','açıklamak'],
                ['wiederholen','tekrarlamak'],['langsam','yavaş'],
            ],
            'Müssen: Almanca Modal Fiiller' => [
                ['müssen','zorunda olmak'],['ich muss','ben zorundayım'],['du musst','sen zorundasın'],
                ['er muss','o zorunda'],['die Pflicht','görev/zorunluluk'],['arbeiten','çalışmak'],
                ['pünktlich','dakik'],['früh','erken'],['aufstehen','kalkmak'],
                ['lernen','öğrenmek'],['der Termin','randevu'],['wichtig','önemli'],
                ['dringend','acil'],['sofort','hemen'],['leider','maalesef'],
                ['die Prüfung','sınav'],['bestehen','geçmek (sınav)'],['vorbereiten','hazırlamak'],
                ['die Hausaufgabe','ev ödevi'],['fertig','hazır/bitti'],
            ],
            'Sollen: Almanca Modal Fiiller' => [
                ['sollen','gerekiyor (başkasına göre)'],['ich soll','benim gerekiyor'],['du sollst','senin gerekiyor'],
                ['er soll','onun gerekiyor'],['der Auftrag','görev'],['ausrichten','iletmek'],
                ['mitbringen','yanında getirmek'],['anrufen','aramak (telefon)'],
                ['warten','beklemek'],['zurückkommen','geri dönmek'],['laut','göre/duyulan'],
                ['angeblich','sözde/iddiaya göre'],['der Arzt','doktor'],['das Rezept','reçete'],
                ['einnehmen','içmek (ilaç)'],['die Tablette','tablet/hap'],['ruhen','dinlenmek'],
                ['trinken','içmek'],['essen','yemek'],['schlafen','uyumak'],
            ],
            'Gehen Fiili ve Cümle Yapısı' => [
                ['gehen','gitmek'],['ich gehe','ben gidiyorum'],['du gehst','sen gidiyorsun'],
                ['er geht','o gidiyor'],['wir gehen','biz gidiyoruz'],['spazieren gehen','yürüyüşe çıkmak'],
                ['einkaufen gehen','alışverişe gitmek'],['schlafen gehen','uyumaya gitmek'],
                ['nach Hause','eve (yöne)'],['in die Schule','okula'],['zur Arbeit','işe'],
                ['ins Kino','sinemaya'],['in den Park','parka'],['zu Fuß','yürüyerek'],
                ['die Richtung','yön'],['geradeaus','düz/doğru'],['links','sol'],
                ['rechts','sağ'],['weit','uzak'],['nah','yakın'],
            ],
            'Trinken Fiili ve Cümle Yapısı' => [
                ['trinken','içmek'],['ich trinke','ben içiyorum'],['du trinkst','sen içiyorsun'],
                ['er trinkt','o içiyor'],['wir trinken','biz içiyoruz'],['das Getränk','içecek'],
                ['der Saft','meyve suyu'],['das Bier','bira'],['der Wein','şarap'],
                ['die Milch','süt'],['täglich','her gün'],['morgens','sabahları'],
                ['abends','akşamları'],['gern','severek'],['lieber','daha çok severek'],
                ['viel','çok'],['wenig','az'],['genug','yeterli'],['zu viel','fazla'],['kalt','soğuk'],
            ],
            'Haben Fiili ve Cümle Yapısı' => [
                ['haben','sahip olmak'],['ich habe','benim var'],['du hast','senin var'],
                ['er hat','onun var'],['wir haben','bizim var'],['Hunger haben','acıkmak'],
                ['Durst haben','susamak'],['Angst haben','korkmak'],['Zeit haben','zamanı olmak'],
                ['Lust haben','canı istemek'],['Recht haben','haklı olmak'],['Unrecht haben','haksız olmak'],
                ['das Geld','para'],['die Zeit','zaman'],['das Problem','sorun'],
                ['die Lösung','çözüm'],['die Idee','fikir'],['der Fehler','hata'],
                ['die Chance','şans/fırsat'],['das Glück','şans/mutluluk'],
            ],
            'Kommen Fiili ve Cümle Yapısı' => [
                ['kommen','gelmek'],['ich komme','ben geliyorum'],['du kommst','sen geliyorsun'],
                ['er kommt','o geliyor'],['wir kommen','biz geliyoruz'],['ankommen','varmak'],
                ['herkommen','buraya gelmek'],['zurückkommen','geri gelmek'],
                ['aus Deutschland','Almanya\'dan'],['aus der Türkei','Türkiye\'den'],
                ['pünktlich','dakik'],['zu spät','geç'],['bald','yakında'],
                ['der Besucher','ziyaretçi'],['der Gast','misafir'],['willkommen','hoş geldiniz'],
                ['die Ankunft','varış'],['woher','nereden'],['wohin','nereye'],['der Weg','yol'],
            ],
            'Kaufen Fiili ve Cümle Yapısı' => [
                ['kaufen','satın almak'],['ich kaufe','ben satın alıyorum'],['du kaufst','sen satın alıyorsun'],
                ['er kauft','o satın alıyor'],['einkaufen','alışveriş yapmak'],
                ['der Supermarkt','süpermarket'],['das Geschäft','dükkan'],['der Laden','mağaza'],
                ['die Ware','ürün/mal'],['der Preis','fiyat'],['teuer','pahalı'],['billig','ucuz'],
                ['das Angebot','teklif/indirim'],['der Rabatt','indirim'],['bezahlen','ödemek'],
                ['die Kasse','kasa'],['das Wechselgeld','para üstü'],['der Einkaufswagen','alışveriş arabası'],
                ['der Bon','fiş'],['die Tüte','poşet'],
            ],
            'Wohnen Fiili ve Cümle Yapısı' => [
                ['wohnen','yaşamak/oturmak'],['ich wohne','ben yaşıyorum'],['du wohnst','sen yaşıyorsun'],
                ['er wohnt','o yaşıyor'],['wir wohnen','biz yaşıyoruz'],['die Wohnung','daire'],
                ['das Haus','ev'],['die Adresse','adres'],['die Straße','sokak/cadde'],
                ['die Stadt','şehir'],['das Dorf','köy'],['der Stadteil','semt/mahalle'],
                ['die Postleitzahl','posta kodu'],['der Mieter','kiracı'],['die Miete','kira'],
                ['der Vermieter','ev sahibi'],['das Zimmer','oda'],['möbliert','mobilyalı'],
                ['ruhig','sessiz/sakin'],['zentral','merkezi'],
            ],
            'Brauchen Fiili ve Cümle Yapısı' => [
                ['brauchen','ihtiyaç duymak'],['ich brauche','benim ihtiyacım var'],['du brauchst','senin ihtiyacın var'],
                ['er braucht','onun ihtiyacı var'],['wir brauchen','bizim ihtiyacımız var'],
                ['die Hilfe','yardım'],['das Geld','para'],['die Zeit','zaman'],['die Ruhe','huzur/dinginlik'],
                ['die Unterstützung','destek'],['dringend','acilen'],['unbedingt','mutlaka'],
                ['wenig','az'],['viel','çok'],['nichts','hiçbir şey'],['etwas','bir şey'],
                ['jemanden','birini'],['niemanden','hiç kimseyi'],['noch','henüz/hâlâ'],['kein','hiç'],
            ],
            'Lernen Fiili ve Cümle Yapısı' => [
                ['lernen','öğrenmek/ders çalışmak'],['ich lerne','ben öğreniyorum'],['du lernst','sen öğreniyorsun'],
                ['er lernt','o öğreniyor'],['wir lernen','biz öğreniyoruz'],['die Sprache','dil'],
                ['das Vokabular','kelime hazinesi'],['die Grammatik','dilbilgisi'],['üben','pratik yapmak'],
                ['wiederholen','tekrarlamak'],['verstehen','anlamak'],['auswendig','ezberden'],
                ['fleißig','çalışkan'],['die Hausaufgabe','ödev'],['das Lehrbuch','ders kitabı'],
                ['der Kurs','kurs'],['der Lehrer','öğretmen'],['die Schule','okul'],
                ['die Prüfung','sınav'],['täglich','her gün'],
            ],
            'Saatler' => [
                ['die Uhr','saat (zaman)'],['die Stunde','saat (süre)'],['die Minute','dakika'],
                ['die Sekunde','saniye'],['Wie viel Uhr ist es?','Saat kaç?'],['Es ist acht Uhr.','Saat sekiz.'],
                ['halb','buçuk (yarım)'],['Viertel vor','çeyrek kala'],['Viertel nach','çeyrek geçe'],
                ['morgens','sabahleyin'],['mittags','öğleyin'],['abends','akşamleyin'],
                ['nachts','gece (geç)'],['der Mittag','öğle'],['die Mitternacht','gece yarısı'],
                ['früh','erken'],['spät','geç'],['pünktlich','dakik'],
                ['der Wecker','çalar saat'],['der Terminkalender','ajanda'],
            ],
            'Nominativ ve Artikeller' => [
                ['der (Nominativ)','eril yalın hal'],['die (Nominativ)','dişil yalın hal'],
                ['das (Nominativ)','nötr yalın hal'],['ein (mask.)','bir (eril)'],
                ['eine (fem.)','bir (dişil)'],['ein (neutr.)','bir (nötr)'],
                ['der Mann','adam'],['die Frau','kadın'],['das Kind','çocuk'],
                ['der Tisch','masa'],['die Lampe','lamba'],['das Buch','kitap'],
                ['der Hund','köpek'],['die Katze','kedi'],['das Auto','araba'],
                ['der Lehrer','öğretmen (erkek)'],['die Lehrerin','öğretmen (kadın)'],
                ['das Haus','ev'],['die Schule','okul'],['der Bahnhof','tren istasyonu'],
            ],
            'Akkusativ Hali' => [
                ['den (Akk. mask.)','eril -i hali'],['die (Akk. fem.)','dişil -i hali'],
                ['das (Akk. neutr.)','nötr -i hali'],['einen (Akk. mask.)','bir (eril -i)'],
                ['eine (Akk. fem.)','bir (dişil -i)'],['ein (Akk. neutr.)','bir (nötr -i)'],
                ['sehen','görmek'],['kaufen','satın almak'],['haben','sahip olmak'],
                ['brauchen','ihtiyaç duymak'],['suchen','aramak'],['finden','bulmak'],
                ['essen','yemek'],['trinken','içmek'],['lesen','okumak'],
                ['schreiben','yazmak'],['hören','duymak'],['lieben','sevmek'],
                ['nehmen','almak'],['bringen','getirmek'],
            ],
            'Dativ Hali' => [
                ['dem (Dat. mask.)','eril -e/-a hali'],['der (Dat. fem.)','dişil -e/-a hali'],
                ['dem (Dat. neutr.)','nötr -e/-a hali'],['einem (Dat. mask.)','bir (eril Dat)'],
                ['einer (Dat. fem.)','bir (dişil Dat)'],['einem (Dat. neutr.)','bir (nötr Dat)'],
                ['mit','ile (Dat)'],['aus','... den/-dan (Dat)'],['bei','yanında (Dat)'],
                ['nach','sonra/... e doğru (Dat)'],['seit','... den beri (Dat)'],
                ['von','... den (Dat)'],['zu','... e (Dat)'],['helfen','yardım etmek (Dat)'],
                ['gehören','ait olmak (Dat)'],['danken','teşekkür etmek (Dat)'],
                ['antworten','yanıtlamak (Dat)'],['gefallen','hoşuna gitmek (Dat)'],
                ['folgen','takip etmek (Dat)'],['passen','uymak (Dat)'],
            ],
            'Olumsuz Artikeller' => [
                ['kein (mask. Nom.)','hiç (eril yalın)'],['keine (fem. Nom.)','hiç (dişil yalın)'],
                ['kein (neutr. Nom.)','hiç (nötr yalın)'],['keinen (mask. Akk.)','hiç (eril -i)'],
                ['keine (fem. Akk.)','hiç (dişil -i)'],['kein (neutr. Akk.)','hiç (nötr -i)'],
                ['nicht','değil'],['nie','hiçbir zaman'],['niemand','hiç kimse'],
                ['nichts','hiçbir şey'],['kein Geld','hiç para'],['keine Zeit','hiç zaman'],
                ['kein Problem','sorun değil'],['keine Ahnung','hiç fikrim yok'],
                ['gar nicht','hiç de değil'],['überhaupt nicht','kesinlikle değil'],
                ['noch nicht','henüz değil'],['nicht mehr','artık değil'],
                ['kein Buch','hiç kitap'],['keinen Hunger','hiç açlık yok'],
            ],
            'Ayrılabilir Fiiller' => [
                ['anrufen','telefon etmek'],['aufstehen','kalkmak'],['einkaufen','alışveriş yapmak'],
                ['einschlafen','uyuyakalmak'],['fernsehen','televizyon izlemek'],['anfangen','başlamak'],
                ['aufmachen','açmak'],['zumachen','kapatmak'],['mitkommen','birlikte gelmek'],
                ['mitbringen','yanında getirmek'],['abholen','almaya gelmek'],['anziehen','giymek'],
                ['ausziehen','çıkarmak (kıyafet)'],['aufräumen','toplamak/düzenlemek'],
                ['abfahren','kalkmak (araç)'],['ankommen','varmak'],['vorstellen','tanıtmak'],
                ['zurückgeben','geri vermek'],['weitergehen','devam etmek'],['nachschauen','kontrol etmek'],
            ],
            'İyelik Zamirleri' => [
                ['mein','benim (eril/nötr)'],['meine','benim (dişil/çoğul)'],
                ['dein','senin (eril/nötr)'],['deine','senin (dişil/çoğul)'],
                ['sein','onun (erkek, eril/nötr)'],['seine','onun (erkek, dişil/çoğul)'],
                ['ihr','onun (kadın, eril/nötr)'],['ihre','onun (kadın, dişil/çoğul)'],
                ['unser','bizim (eril/nötr)'],['unsere','bizim (dişil/çoğul)'],
                ['euer','sizin (eril/nötr)'],['eure','sizin (dişil/çoğul)'],
                ['ihr','onların (eril/nötr)'],['ihre','onların (dişil/çoğul)'],
                ['Ihr','sizin (resmi, eril/nötr)'],['Ihre','sizin (resmi, dişil/çoğul)'],
                ['meinen','benimkini (eril Akk)'],['deinen','seninkini (eril Akk)'],
                ['meiner','benimkine (dişil Dat)'],['seinem','onunkine (eril/nötr Dat)'],
            ],
            'Geçmiş Zaman (Perfekt)' => [
                ['haben + Partizip II','geçmiş zaman yardımcı fiili'],['sein + Partizip II','geçmiş zaman (hareket)'],
                ['gemacht','yaptı (machen)'],['gegessen','yedi (essen)'],['getrunken','içti (trinken)'],
                ['gegangen','gitti (gehen)'],['gekommen','geldi (kommen)'],['geschlafen','uyudu (schlafen)'],
                ['geschrieben','yazdı (schreiben)'],['gelesen','okudu (lesen)'],
                ['gesprochen','konuştu (sprechen)'],['gefahren','sürdü/gitti (fahren)'],
                ['geflogen','uçtu (fliegen)'],['geblieben','kaldı (bleiben)'],
                ['gewesen','oldu/vardı (sein)'],['gehabt','sahipti (haben)'],
                ['gearbeitet','çalıştı (arbeiten)'],['gespielt','oynadı (spielen)'],
                ['gehört','duydu (hören)'],['gekauft','satın aldı (kaufen)'],
            ],
            'Emir Kipi (Imperativ)' => [
                ['Komm!','Gel! (sen)'],['Kommt!','Gelin! (siz/çoğul)'],['Kommen Sie!','Gelin! (resmi)'],
                ['Geh!','Git! (sen)'],['Schreib!','Yaz! (sen)'],['Schreibt!','Yazın! (siz/çoğul)'],
                ['Lesen Sie!','Okuyun! (resmi)'],['Hör zu!','Dinle! (sen)'],['Seid ruhig!','Sakin olun!'],
                ['Macht die Tür auf!','Kapıyı açın!'],['Ruf mich an!','Beni ara!'],
                ['Warte!','Bekle!'],['Esst langsam!','Yavaş yiyin!'],['Trink Wasser!','Su iç!'],
                ['Schlaf gut!','İyi uyu!'],['Steh auf!','Kalk!'],['Mach das Licht an!','Işığı aç!'],
                ['Bitte!','Lütfen!'],['Danke!','Teşekkürler!'],['Entschuldigung!','Özür dilerim!'],
            ],
            'Sıfatlar (Adjektive)' => [
                ['groß','büyük'],['klein','küçük'],['lang','uzun'],['kurz','kısa'],
                ['dick','kalın/şişman'],['dünn','ince/zayıf'],['hoch','yüksek'],['niedrig','alçak'],
                ['neu','yeni'],['alt','eski/yaşlı'],['jung','genç'],['schön','güzel'],
                ['hässlich','çirkin'],['sauber','temiz'],['schmutzig','kirli'],
                ['laut','gürültülü'],['leise','sessiz'],['schnell','hızlı'],['langsam','yavaş'],
                ['einfach','kolay'],
            ],
        ];

        foreach ($data as $lessonTitle => $words) {
            $lesson = Lesson::where('lesson_title', $lessonTitle)->first();
            if (!$lesson) {
                echo "SKIP (not found): $lessonTitle\n";
                continue;
            }
            $added = 0;
            foreach ($words as $idx => [$g, $t]) {
                Word::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'word_german' => $g],
                    ['word_turkish' => $t, 'order_index' => $idx + 1, 'is_active' => true, 'frequency_rank' => $idx + 1]
                );
                $added++;
            }
            echo "OK: $lessonTitle ($added words)\n";
        }
    }
}
