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

class A1_ABC_Extra_Seeder extends Seeder
{
    public function run(): void
    {
        $level = Level::where('level_title', 'like', '%A1%')->first();
        if (!$level) {
            $level = Level::create([
                'level_title' => 'A1 Başlangıç Seviyesi',
                'level_slug' => 'a1-baslangic-seviyesi',
                'level_description' => 'Goethe ve TELC A1 standartlarına uygun başlangıç seviyesi.',
                'order_index' => 1,
                'is_active' => true
            ]);
        }

        $topics = [
            'Selamlaşma ve Vedalaşma Kalıpları' => [
                'words' => [
                    ['Hallo','Merhaba'], ['Guten Morgen','Günaydın'], ['Guten Tag','İyi günler'], ['Guten Abend','İyi akşamlar'],
                    ['Gute Nacht','İyi geceler'], ['Tschüss','Görüşürüz/Hoşça kal'], ['Auf Wiedersehen','Tekrar görüşmek üzere'],
                    ['Wie geht es dir?','Nasılsın?'], ['Wie geht es Ihnen?','Nasılsınız?'], ['Danke, gut','Teşekkürler, iyiyim'],
                    ['Sehr gut','Çok iyi'], ['Es geht','Şöyle böyle'], ['Schlecht','Kötü'], ['Willkommen','Hoş geldiniz'],
                    ['Bis bald','Yakında görüşürüz'], ['Bis später','Sonra görüşürüz'], ['Freut mich','Memnun oldum'],
                    ['Gleichfalls','Aynı şekilde/Sana da'], ['Schönen Tag noch','İyi günler dilerim'], ['Schönes Wochenende','İyi hafta sonları']
                ],
                'sentences' => [
                    ['Hallo, wie heißt du?','Merhaba, adın ne?'],
                    ['Guten Morgen, Herr Schmidt!','Günaydın, Bay Schmidt!'],
                    ['Wie geht es Ihnen heute?','Bugün nasılsınız?'],
                    ['Mir geht es sehr gut, danke.','Çok iyiyim, teşekkürler.'],
                    ['Tschüss, bis morgen!','Görüşürüz, yarına kadar!'],
                    ['Gute Nacht, schlaf gut!','İyi geceler, iyi uyu!'],
                    ['Auf Wiedersehen, Frau Müller!','Görüşmek üzere, Bayan Müller!'],
                    ['Freut mich, Sie kennenzulernen.','Sizinle tanıştığıma memnun oldum.'],
                    ['Schönen Tag noch! - Danke, gleichfalls!','İyi günler dilerim! - Teşekkürler, sana da!'],
                    ['Willkommen in Deutschland!','Almanya\'ya hoş geldiniz!'],
                    ['Wie geht es dir? - Es geht.','Nasılsın? - Şöyle böyle.'],
                    ['Bis bald, mein Freund!','Yakında görüşürüz, arkadaşım!'],
                    ['Guten Abend, was möchten Sie trinken?','İyi akşamlar, ne içmek istersiniz?'],
                    ['Hallo, ich bin Lukas.','Merhaba, ben Lukas.'],
                    ['Schönes Wochenende euch allen!','Hepinize iyi hafta sonları!'],
                    ['Bis später im Kino.','Sinemada sonra görüşürüz.'],
                    ['Guten Tag, kann ich Ihnen helfen?','İyi günler, size yardım edebilir miyim?'],
                    ['Wie ist dein Name?','Senin adın ne?'],
                    ['Ich komme aus der Türkei.','Türkiye\'den geliyorum.'],
                    ['Woher kommst du?','Nerelisin?']
                ],
                'questions' => [
                    ['Wie sagt man "Günaydın" auf Deutsch?','Guten Morgen',['Guten Tag','Guten Abend','Gute Nacht']],
                    ['Was sagt man am Abend zur Begrüßung?','Guten Abend',['Guten Morgen','Gute Nacht','Tschüss']],
                    ['"Nasılsın?" auf Deutsch ist:','Wie geht es dir?',['Wie heißt du?','Woher kommst du?','Wer bist du?']],
                    ['Was sagt man, wenn man geht?','Tschüss',['Hallo','Guten Tag','Willkommen']],
                    ['"Memnun oldum" auf Deutsch ist:','Freut mich',['Danke','Gleichfalls','Schlecht']],
                    ['Guten Morgen! - ___!','Guten Morgen',['Gute Nacht','Tschüss','Schlecht']],
                    ['Wie geht es ___? (Resmi)','Ihnen',['dir','du','Sie']],
                    ['Schönen Tag noch! - ___, gleichfalls!','Danke',['Hallo','Bitte','Tschüss']],
                    ['Auf ___!','Wiedersehen',['Bald','Später','Nacht']],
                    ['Bis ___!','bald',['Guten Tag','Hallo','Wie geht es']],
                    ['Woher ___ du?','kommst',['komme','kommt','kommen']],
                    ['Ich ___ aus Izmir.','komme',['kommst','kommt','kommen']],
                    ['Wie ___ du?','heißt',['heiße','heißt','heißen']],
                    ['Mein ___ ist Ali.','Name',['Tag','Nacht','Abend']],
                    ['___ Nacht!','Gute',['Guten','Guter','Gutes']],
                    ['___ Tag!','Guten',['Gute','Guter','Gutes']],
                    ['Willkommen ___ Berlin!','in',['aus','nach','zu']],
                    ['Wie geht es dir? - ___ gut.','Sehr',['Viel','Groß','Schön']],
                    ['Bis ___! (Sonra görüşürüz)','später',['bald','heute','morgen']],
                    ['Schönes ___!','Wochenende',['Tag','Abend','Morgen']]
                ]
            ],
            'Alfabe / Harfler' => [
                'words' => [
                    ['A wie Apfel','Elma gibi A'], ['B wie Ball','Top gibi B'], ['C wie Computer','Bilgisayar gibi C'],
                    ['D wie Deutschland','Almanya gibi D'], ['E wie Elefant','Fil gibi E'], ['F wie Fisch','Balık gibi F'],
                    ['G wie Gitarre','Gitar gibi G'], ['H wie Haus','Ev gibi H'], ['I wie Igel','Kirpi gibi I'],
                    ['J wie Jacke','Ceket gibi J'], ['K wie Kaffee','Kahve gibi K'], ['L wie Lampe','Lamba gibi L'],
                    ['M wie Maus','Fare gibi M'], ['N wie Nase','Burun gibi N'], ['O wie Opa','Dede gibi O'],
                    ['P wie Park','Park gibi P'], ['Q wie Quiz','Bilgi yarışması gibi Q'], ['R wie Radio','Radyo gibi R'],
                    ['S wie Sonne','Güneş gibi S'], ['T wie Tisch','Masa gibi T']
                ],
                'sentences' => [
                    ['Wie buchstabiert man das?','Bu nasıl hecelenir?'],
                    ['Können Sie Ihren Namen buchstabieren?','Adınızı heceleyebilir misiniz?'],
                    ['Mein Name wird mit A-L-I geschrieben.','Adım A-L-I ile yazılır.'],
                    ['Im Deutschen gibt es Umlaute: Ä, Ö, Ü.','Almancada umlautlar vardır: Ä, Ö, Ü.'],
                    ['Das ß heißt Eszett.','ß harfinin adı Eszett\'dir.'],
                    ['Apfel schreibt man mit A.','Apfel A ile yazılır.'],
                    ['Buchstabieren Sie bitte: Berlin.','Lütfen heceleyin: Berlin.'],
                    ['Welcher Buchstabe ist das?','Bu hangi harf?'],
                    ['Das ist ein großes M.','Bu büyük bir M.'],
                    ['Schreiben Sie das bitte auf.','Lütfen bunu yazın.'],
                    ['Das Wort hat fünk Buchstaben.','Kelime beş harften oluşuyor.'],
                    ['V wie Vogel.','Kuş gibi V.'],
                    ['W wie Wasser.','Su gibi W.'],
                    ['X wie Xylophon.','Ksilofon gibi X.'],
                    ['Y wie Yacht.','Yat gibi Y.'],
                    ['Z wie Zug.','Tren gibi Z.'],
                    ['Wie spricht man das aus?','Bu nasıl telaffuz edilir?'],
                    ['Der Buchstabe H ist stumm.','H harfi sessizdir (bazı durumlarda okunmaz).'],
                    ['Ei spricht man wie ai aus.','Ei, ai gibi okunur.'],
                    ['Eu spricht man wie oi aus.','Eu, oi gibi okunur.']
                ],
                'questions' => [
                    ['Wie viele Buchstaben hat das deutsche Alphabet (ohne Umlaute)?','26',['29','24','30']],
                    ['Welcher Buchstabe ist ein Umlaut?','Ö',['B','S','Z']],
                    ['Wie nennt man das "ß"?','Eszett',['Scharfes S','Doppel-S','Beta']],
                    ['Wie spricht man "ei" aus?','ai',['ei','oi','ui']],
                    ['Wie spricht man "eu" aus?','oi',['ai','ei','au']],
                    ['Welches Wort beginnt mit "B"?','Ball',['Apfel','Cekat','Deutschland']],
                    ['Buchstabieren Sie "Tag":','T-A-G',['D-A-G','T-E-G','T-A-K']],
                    ['Welcher Buchstabe folgt auf "L"?','M',['K','N','O']],
                    ['Wie schreibt man "Schule"?','S-C-H-U-L-E',['S-H-U-L-E','S-C-H-U-L','S-U-L-E']],
                    ['Wie spricht man "st" am Wortanfang aus?','scht',['st','ss','t']],
                    ['"V" spricht man oft wie ___ aus.','f',['v','w','b']],
                    ['"W" spricht man wie ___ aus.','v',['w','f','b']],
                    ['Welches Wort hat einen Umlaut?','Äpfel',['Apfel','Ball','Haus']],
                    ['Wie schreibt man "Ö"?','O-Umlaut',['O-Strich','O-Punkt','O-E']],
                    ['"J" spricht man wie ___ aus.','y',['j','dsch','i']],
                    ['"Z" spricht man wie ___ aus.','ts',['z','s','ss']],
                    ['Wie buchstabiert man "Haus"?','H-A-U-S',['H-O-U-S','H-A-S','A-U-S']],
                    ['Welcher Buchstabe ist der erste im Alphabet?','A',['B','Z','E']],
                    ['Welcher Buchstabe ist the letzte?','Z',['A','Y','X']],
                    ['Wie spricht man "ch" nach "i" aus? (ich)','weiches ch',['hartes ch','k','sch']]
                ]
            ],
            'İsimler ve Çoğul Yapıları (Nomen)' => [
                'words' => [
                    ['der Tisch - die Tische','masa - masalar'], ['das Buch - die Bücher','kitap - kitaplar'],
                    ['die Lampe - die Lampen','lamba - lambalar'], ['das Kind - die Kinder','çocuk - çocuklar'],
                    ['der Mann - die Männer','adam - adamlar'], ['die Frau - die Frauen','kadın - kadınlar'],
                    ['das Auto - die Autos','araba - arabalar'], ['der Apfel - die Äpfel','elma - elmalar'],
                    ['die Stadt - die Städte','şehir - şehirler'], ['der Baum - die Bäume','ağaç - ağaçlar'],
                    ['das Haus - die Häuser','ev - evler'], ['der Freund - die Freunde','arkadaş - arkadaşlar'],
                    ['die Freundin - die Freundinnen','kız arkadaş - kız arkadaşlar'], ['das Handy - die Handys','cep telefonu - cep telefonları'],
                    ['der Computer - die Computer','bilgisayar - bilgisayarlar'], ['die Schule - die Schulen','okul - okullar'],
                    ['das Zimmer - die Zimmer','oda - odalar'], ['der Hund - die Hunde','köpek - köpekler'],
                    ['die Katze - die Katzen','kedi - kediler'], ['der Stift - die Stifte','kalem - kalemler']
                ],
                'sentences' => [
                    ['Die Tische sind neu.','Masalar yeni.'],
                    ['Ich lese drei Bücher.','Üç kitap okuyorum.'],
                    ['Die Kinder spielen im Park.','Çocuklar parkta oynuyor.'],
                    ['Haben Sie Autos?','Arabalarınız var mı?'],
                    ['Die Frauen trinken Kaffee.','Kadınlar kahve içiyor.'],
                    ['Zwei Äpfel, bitte.','İki elma, lütfen.'],
                    ['Die Häuser in der Stadt sind teuer.','Şehirdeki evler pahalı.'],
                    ['Meine Freunde kommen heute.','Arkadaşlarım bugün geliyor.'],
                    ['Die Katzen schlafen auf dem Sofa.','Kediler kanepede uyuyor.'],
                    ['Hier sind viele Stifte.','Burada çok kalem var.'],
                    ['Die Computer sind kaputt.','Bilgisayarlar bozuk.'],
                    ['Wir besuchen iki okulu ziyaret ediyoruz.','İki okulu ziyaret ediyoruz.'],
                    ['Die Zimmer sind sauber.','Odalar temiz.'],
                    ['Wo sind die Schlüssel?','Anahtarlar nerede?'],
                    ['Die Bäume sind grün.','Ağaçlar yeşil.'],
                    ['Haben Sie Kinder?','Çocuklarınız var mı?'],
                    ['Die Männer arbeiten viel.','Adamlar çok çalışıyor.'],
                    ['Ich brauche zwei Handys.','İki cep telefonuna ihtiyacım var.'],
                    ['Die Lampen sind hell.','Lambalar parlak.'],
                    ['Die Städte sind groß.','Şehirler büyük.']
                ],
                'questions' => [
                    ['Was ist der Plural von "Tisch"?','die Tische',['die Tischs','die Tischer','die Tisch']],
                    ['Was ist der Plural von "Kind"?','die Kinder',['die Kind','die Kindes','die Kinds']],
                    ['Was ist der Plural von "Auto"?','die Autos',['die Auton','die Autoe','die Autö']],
                    ['Was ist der Plural von "Buch"?','die Bücher',['die Buchs','die Buchen','die Bucher']],
                    ['Was ist der Plural von "Frau"?','die Frauen',['die Frauer','die Fraus','die Fraue']],
                    ['Was ist der Plural von "Mann"?','die Männer',['die Mannes','die Manns','die Manner']],
                    ['Welchen Artikel haben alle Pluralnomen im Nominativ?','die',['der','das','den']],
                    ['Was ist der Plural von "Handy"?','die Handys',['die Handies','die Handy','die Handyen']],
                    ['Was ist der Plural von "Stadt"?','die Städte',['die Stadte','die Stadts','die Städten']],
                    ['Was ist der Plural von "Apfel"?','die Äpfel',['die Apfels','die Apfeln','die Apfel']],
                    ['Was ist der Plural von "Zimmer"?','die Zimmer',['die Zimmers','die Zimmern','die Zimmere']],
                    ['Was ist der Plural von "Computer"?','die Computer',['die Computers','die Computern','die Computere']],
                    ['Was ist der Plural von "Schule"?','die Schulen',['die Schuler','die Schuls','die Schule']],
                    ['Was ist der Plural von "Baum"?','die Bäume',['die Baume','die Baums','die Bäumer']],
                    ['Was ist der Plural von "Hund"?','die Hunde',['die Hunds','die Hunden','die Hunder']],
                    ['Was ist der Plural von "Katze"?','die Katzen',['die Katzs','die Katzer','die Katze']],
                    ['Was ist der Plural von "Freund"?','die Freunde',['die Freunds','die Freunder','die Freunden']],
                    ['Was ist der Plural von "Freundin"?','die Freundinnen',['die Freundins','die Freunder','die Freundinne']],
                    ['Was ist der Plural von "Haus"?','die Häuser',['die Haus','die Hauses','die Häusern']],
                    ['Was ist der Plural von "Stift"?','die Stifte',['die Stifts','die Stiften','die Stifter']]
                ]
            ],
            'Sıfatların Derecelendirilmesi (Positiv, Komparativ, Superlativ)' => [
                'words' => [
                    ['gut - besser - am besten','iyi - daha iyi - en iyi'], ['viel - mehr - am meisten','çok - daha çok - en çok'],
                    ['gern - lieber - am liebsten','severek - daha severek - en severek'], ['groß - größer - am größten','büyük - daha büyük - en büyük'],
                    ['klein - kleiner - am kleinsten','küçük - daha küçük - en küçük'], ['schnell - schneller - am schnellsten','hızlı - daha hızlı - en hızlı'],
                    ['langsam - langsamer - am langsamsten','yavaş - daha yavaş - en yavaş'], ['alt - älter - am ältesten','eski - daha eski - en eski'],
                    ['jung - jünger - am jüngsten','genç - daha genç - en genç'], ['teuer - teurer - am teuersten','pahalı - daha pahalı - en pahalı'],
                    ['billig - billiger - am billigsten','ucuz - daha ucuz - en ucuz'], ['schön - schöner - am schönsten','güzel - daha güzel - en güzel'],
                    ['stark - stärker - am stärksten','güçlü - daha güçlü - en güçlü'], ['schwach - schwächer - am schwächsten','zayıf - daha zayıf - en zayıf'],
                    ['warm - wärmer - am wärmsten','sıcak - daha sıcak - en sıcak'], ['kalt - kälter - am kältesten','soğuk - daha soğuk - en soğuk'],
                    ['hoch - höher - am höchsten','yüksek - daha yüksek - en yüksek'], ['nah - näher - am nächsten','yakın - daha yakın - en yakın'],
                    ['interessant - interessanter - am interessantesten','ilginç - daha ilginç - en ilginç'], ['fleißig - fleißiger - am fleißigsten','çalışkan - daha çalışkan - en çalışkan']
                ],
                'sentences' => [
                    ['Das Auto ist schnell, aber der Zug ist schneller.','Araba hızlı, ama tren daha hızlı.'],
                    ['Ich trinke gern Tee, ama kahveyi daha çok severim.','Severek çay içiyorum, ama kahveyi daha çok severim.'],
                    ['Berlin ist groß, aber İstanbul ist größer.','Berlin büyük, ama İstanbul daha büyük.'],
                    ['Das ist das schönste Haus in der Stadt.','Bu, şehirdeki en güzel ev.'],
                    ['Wer ist der fleißigste Schüler?','En çalışkan öğrenci kim?'],
                    ['Heute ist es wärmer als gestern.','Bugün dünden daha sıcak.'],
                    ['Dieser Berg ist am höchsten.','Bu dağ en yüksek.'],
                    ['Mein Bruder ist älter als ich.','Erkek kardeşim benden daha yaşlı.'],
                    ['Dieses Buch ist interessanter.','Bu kitap daha ilginç.'],
                    ['Ich laufe am schnellsten.','En hızlı ben koşuyorum.'],
                    ['Ist das die billigste Lampe?','Bu en ucuz lamba mı?'],
                    ['Gold ist teurer als Silber.','Altın gümüşten daha pahalı.'],
                    ['Das Wetter ist heute am schönsten.','Hava bugün en güzel.'],
                    ['Ich bin jünger als mein Freund.','Arkadaşımdan daha gencim.'],
                    ['Dieser Weg ist am kürzesten.','Bu yol en kısa.'],
                    ['Sie singt besser als er.','O ondan daha iyi şarkı söylüyor.'],
                    ['Ich esse am liebsten Pizza.','En severek pizza yerim.'],
                    ['Wer hat am meisten Geld?','En çok parası olan kim?'],
                    ['Dieser Turm ist höher als das Haus.','Bu kule evden daha yüksek.'],
                    ['Meine Mutter kocht am besten.','En iyi annem yemek pişirir.']
                ],
                'questions' => [
                    ['Was ist der Komparativ von "gut"?','besser',['guter','besten','gutere']],
                    ['Was ist der Superlativ von "gut"?','am besten',['am gutesten','am güter','am bestesten']],
                    ['Was ist der Komparativ von "viel"?','mehr',['vieler','meisten','viele']],
                    ['Was ist der Superlativ von "viel"?','am meisten',['am vielsten','am mehrsten','am meinsten']],
                    ['Was ist der Komparativ von "groß"?','größer',['grosser','groesser','am größten']],
                    ['Was ist der Komparativ von "schnell"?','schneller',['am schnellsten','schnellere','schnellsten']],
                    ['Was ist der Superlativ von "schön"?','am schönsten',['am schonsten','schöner','schönsten']],
                    ['"Berlin ist ___ als München." (groß)','größer',['groß','am größten','große']],
                    ['"Ich trinke ___ Kaffee als Tee." (gern)','lieber',['gern','am liebsten','gerner']],
                    ['"Wer rennt ___?" (schnell)','am schnellsten',['schneller','schnell','schnellste']],
                    ['"Dieses Auto ist ___ als das andere." (teuer)','teurer',['teuerer','am teuersten','teure']],
                    ['"Heute ist der ___ Tag des Jahres." (warm)','wärmste',['warmste','wärmere','am wärmsten']],
                    ['Was ist der Komparativ von "hoch"?','höher',['hocher','höcher','höhest']],
                    ['Was ist der Superlativ von "hoch"?','am höchsten',['am hohesten','am höchster','am höcher']],
                    ['Was ist der Komparativ von "nah"?','näher',['naher','naherer','nächster']],
                    ['Was ist der Superlativ von "nah"?','am nächsten',['am nahesten','am nächstener','am nahsten']],
                    ['"Mein Vater ist ___ als mein Onkel." (alt)','älter',['alter','am ältesten','alte']],
                    ['"Dieses Buch ist am ___." (interessant)','interessantesten',['interessanter','interessant','interessanteste']],
                    ['"Er arbeitet ___ als sein Bruder." (fleißig)','fleißiger',['fleißig','am fleißigsten','fleißige']],
                    ['Was ist der Komparativ von "jung"?','jünger',['junger','am jüngsten','jüngere']]
                ]
            ],
            'Zarflar (Adverbien)' => [
                'words' => [
                    ['heute','bugün'], ['morgen','yarın'], ['gestern','dün'], ['jetzt','şimdi'], ['sofort','hemen'],
                    ['immer','her zaman'], ['oft','sık sık'], ['manchmal','bazen'], ['selten','nadir'], ['nie','asla/hiç'],
                    ['hier','burada'], ['dort','orada'], ['da','orada/işte'], ['überall','her yerde'], ['nirgends','hiçbir yerde'],
                    ['oben','yukarıda'], ['unten','aşağıda'], ['vorn','önde'], ['hinten','arkada'], ['vielleicht','belki']
                ],
                'sentences' => [
                    ['Ich komme heute zu dir.','Bugün sana geliyorum.'],
                    ['Morgen habe ich keine Zeit.','Yarın vaktim yok.'],
                    ['Gestern war ich im Kino.','Dün sinemadaydım.'],
                    ['Wir müssen jetzt gehen.','Şimdi gitmemiz gerekiyor.'],
                    ['Komm sofort her!','Hemen buraya gel!'],
                    ['Ich trinke immer Wasser.','Her zaman su içerim.'],
                    ['Er kommt oft zu spät.','O sık sık geç kalıyor.'],
                    ['Manchmal esse ich Pizza.','Bazen pizza yerim.'],
                    ['Ich sehe selten fern.','Nadiren televizyon izlerim.'],
                    ['Er raucht nie.','O asla sigara içmez.'],
                    ['Der Schlüssel liegt hier.','Anahtar burada duruyor.'],
                    ['Dort ist der Bahnhof.','Tren istasyonu orada.'],
                    ['Da ist er ja!','İşte o orada!'],
                    ['Überall liegt Schnee.','Her yerde kar var.'],
                    ['Ich finde mein Handy nirgends.','Cep telefonumu hiçbir yerde bulamıyorum.'],
                    ['Das Buch liegt oben.','Kitap yukarıda duruyor.'],
                    ['Die Katze ist unten.','Kedi aşağıda.'],
                    ['Bitte kommen Sie nach vorn.','Lütfen öne gelin.'],
                    ['Er sits ganz hinten.','En arkada oturuyor.'],
                    ['Vielleicht kommen wir morgen.','Belki yarın geliriz.']
                ],
                'questions' => [
                    ['Was bedeutet "heute"?','bugün',['yarın','dün','şimdi']],
                    ['Was bedeutet "morgen"?','yarın',['bugün','dün','şimdi']],
                    ['Was bedeutet "gestern"?','dün',['bugün','yarın','şimdi']],
                    ['Was bedeutet "immer"?','her zaman',['sık sık','bazen','asla']],
                    ['Was bedeutet "nie"?','asla/hiç',['her zaman','sık sık','bazen']],
                    ['"Şimdi" auf Deutsch ist:','jetzt',['sofort','heute','morgen']],
                    ['"Hemen" auf Deutsch ist:','sofort',['jetzt','heute','morgen']],
                    ['"Sık sık" auf Deutsch ist:','oft',['immer','manchmal','selten']],
                    ['"Bazen" auf Deutsch ist:','manchmal',['immer','oft','selten']],
                    ['"Nadiren" auf Deutsch ist:','selten',['oft','manchmal','nie']],
                    ['"Burada" auf Deutsch ist:','hier',['dort','da','überall']],
                    ['"Her yerde" auf Deutsch ist:','überall',['hier','dort','nirgends']],
                    ['"Yukarıda" auf Deutsch ist:','oben',['unten','vorn','hinten']],
                    ['"Aşağıda" auf Deutsch ist:','unten',['oben','vorn','hinten']],
                    ['"Önde" auf Deutsch ist:','vorn',['hinten','oben','unten']],
                    ['"Belki" auf Deutsch ist:','vielleicht',['sofort','immer','oft']],
                    ['Welches Adverb passt? "Ich trinke ___ Wasser." (her zaman)','immer',['oft','manchmal','nie']],
                    ['Welches Adverb passt? "Er kommt ___ zu spät." (sık sık)','oft',['immer','selten','nie']],
                    ['Welches Adverb passt? "Komm ___!" (hemen)','sofort',['jetzt','heute','morgen']],
                    ['"Hiçbir yerde" auf Deutsch ist:','nirgends',['überall','da','dort']]
                ]
            ],
            'Bağlaçlar ve Cümle Yapısı (Bağlaçlar: und, aber, oder)' => [
                'words' => [
                    ['und','ve'], ['aber','ama'], ['oder','veya'], ['denn','çünkü'], ['sondern','bilakis/aksine'],
                    ['entweder ... oder','ya ... ya da'], ['zuerst','önce'], ['dann','sonra'], ['danach','ondan sonra'],
                    ['schließlich','sonunda'], ['trotzdem','yine de'], ['deshalb','bu yüzden'], ['darum','bu nedenle'],
                    ['weil','çünkü/olduğu için'], ['dass','olduğunu'], ['wenn','eğer/zaman'], ['als','zaman (-diğinde)'],
                    ['ob','olup olmadığını'], ['obwohl','rağmen'], ['während','sırasında']
                ],
                'sentences' => [
                    ['Ich lerne Deutsch und Englisch.','Almanca ve İngilizce öğreniyorum.'],
                    ['Er ist müde, aber er arbeitet.','O yorgun ama çalışıyor.'],
                    ['Möchten Sie Kaffee oder Tee?','Kahve mi yoksa çay mı istersiniz?'],
                    ['Ich bleibe zu Hause, denn ich bin krank.','Evde kalıyorum çünkü hastayım.'],
                    ['Ich trinke keinen Saft, sondern Wasser.','Meyve suyu değil, su içiyorum.'],
                    ['Zuerst frühstücke ich, dann gehe ich zur Arbeit.','Önce kahvaltı yapıyorum, sonra işe gidiyorum.'],
                    ['Er ist krank, trotzdem arbeitet er.','O hasta, yine de çalışıyor.'],
                    ['Es regnet, deshalb nehme ich einen Schirm.','Yağmur yağıyor, bu yüzden bir şemsiye alıyorum.'],
                    ['Ich komme, weil ich dich sehen will.','Geliyorum çünkü seni görmek istiyorum.'],
                    ['Er sagt, dass er morgen kommt.','Yarın geleceğini söylüyor.'],
                    ['Wenn es regnet, bleibe ich zu Hause.','Eğer yağmur yağarsa evde kalırım.'],
                    ['Als ich ein Kind war, wohnte ich in Berlin.','Çocukken Berlin\'de yaşıyordum.'],
                    ['Ich weiß nicht, ob er kommt.','Gelip gelmeyeceğini bilmiyorum.'],
                    ['Obwohl es kalt ist, geht er spazieren.','Hava soğuk olmasına rağmen yürüyüşe çıkıyor.'],
                    ['Während ben lerne, höre ich Musik.','Ders çalışırken müzik dinliyorum.'],
                    ['Entweder biz gehen ins Kino veya biz kalırız burada.','Ya sinemaya gideriz ya da burada kalırız.'],
                    ['Er lernt viel, darum ist er gut.','Çok çalışıyor, bu nedenle iyi.'],
                    ['Danach trinken wir einen Kaffee.','Ondan sonra bir kahve içeriz.'],
                    ['Schließlich sind wir fertig.','Sonunda bitirdik.'],
                    ['Ich habe Hunger und Durst.','Açım ve susadım.']
                ],
                'questions' => [
                    ['"Ve" auf Deutsch ist:','und',['aber','oder','denn']],
                    ['"Ama" auf Deutsch ist:','aber',['und','oder','sondern']],
                    ['"Veya" auf Deutsch ist:','oder',['und','aber','denn']],
                    ['"Çünkü" (Cümle yapısını bozmayan) auf Deutsch ist:','denn',['weil','da','deshalb']],
                    ['"Aksine/Bilakis" auf Deutsch ist:','sondern',['aber','und','oder']],
                    ['"Önce" auf Deutsch ist:','zuerst',['dann','danach','schließlich']],
                    ['"Sonra" auf Deutsch ist:','dann',['zuerst','denn','weil']],
                    ['"Bu yüzden" auf Deutsch ist:','deshalb',['weil','denn','und']],
                    ['"Çünkü" (Yan cümle kuran) auf Deutsch ist:','weil',['denn','deshalb','darum']],
                    ['"Eğer/Zaman" auf Deutsch ist:','wenn',['als','ob','dass']],
                    ['"Rağmen" auf Deutsch ist:','obwohl',['trotzdem','weil','denn']],
                    ['"Sırasında" auf Deutsch ist:','während',['wenn','als','ob']],
                    ['"Olup olmadığını" auf Deutsch ist:','ob',['wenn','als','dass']],
                    ['"Olduğunu" auf Deutsch ist:','dass',['ob','wenn','weil']],
                    ['"Yine de" auf Deutsch ist:','trotzdem',['obwohl','weil','deshalb']],
                    ['"Ya ... ya da" auf Deutsch ist:','entweder ... oder',['sowohl ... als auch','weder ... noch','nicht nur ... sondern auch']],
                    ['Welches Wort passt? "Ich bin müde, ___ ich arbeite."','aber',['und','oder','denn']],
                    ['Welches Wort passt? "Möchtest du Saft ___ Wasser?"','oder',['und','aber','denn']],
                    ['Welches Wort passt? "Ich esse Pizza ___ Pasta."','und',['aber','oder','denn']],
                    ['"Sonunda" auf Deutsch ist:','schließlich',['zuerst','dann','danach']]
                ]
            ]
        ];

        $orderIndex = 100; // Offset to avoid collisions

        foreach ($topics as $title => $data) {
            $lesson = Lesson::updateOrCreate([
                'lesson_title' => $title
            ], [
                'level_id' => $level->id,
                'lesson_description_tr' => $title . ' konusu üzerine kapsamlı içerik.',
                'lesson_image' => 'assets/img/logo.png',
                'order_index' => $orderIndex++,
                'is_active' => true
            ]);

            // Words
            foreach ($data['words'] as $idx => $word) {
                Word::updateOrCreate([
                    'lesson_id' => $lesson->id,
                    'word_german' => $word[0]
                ], [
                    'word_turkish' => $word[1],
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);
            }

            // Exercise
            $exercise = Exercise::updateOrCreate([
                'lesson_id' => $lesson->id,
                'title' => $title . ' Alıştırmaları'
            ], [
                'order_index' => 1,
                'is_active' => true
            ]);

            $exercise->items()->delete();
            foreach ($data['sentences'] as $idx => $sentence) {
                ExerciseItem::create([
                    'exercise_id' => $exercise->id,
                    'german' => $sentence[0],
                    'turkish' => $sentence[1],
                    'order_index' => $idx + 1
                ]);
            }

            // Test
            $test = Test::updateOrCreate([
                'lesson_id' => $lesson->id,
                'test_title' => $title . ' Testi'
            ], [
                'description' => '20 soruluk pekiştirme testi.',
                'is_active' => true
            ]);

            $test->questions()->delete(); // Clean up old questions for this test
            $syncData = [];
            foreach ($data['questions'] as $idx => $qData) {
                $question = Question::create([
                    'lesson_id' => $lesson->id,
                    'question_text' => $qData[0],
                    'question_type' => 'multiple_choice',
                    'explanation' => '',
                    'order_index' => $idx + 1,
                    'is_active' => true
                ]);

                // Correct Answer
                $question->answers()->create([
                    'answer_text' => $qData[1],
                    'is_correct' => true,
                    'order_index' => 1,
                    'is_active' => true
                ]);

                // Wrong Answers
                foreach ($qData[2] as $wIdx => $wrong) {
                    $question->answers()->create([
                        'answer_text' => $wrong,
                        'is_correct' => false,
                        'order_index' => $wIdx + 2,
                        'is_active' => true
                    ]);
                }
                $syncData[$question->id] = ['order_index' => $idx + 1];
            }
            $test->questions()->sync($syncData);
        }
    }
}
