<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Word;
use App\Models\Exercise;
use App\Models\ExerciseItem;
use App\Models\Test;
use App\Models\Question;

class B2_Seeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            ['B2.1 Bağımsız Kullanıcı', 6, 'Passiv modal, Konjunktiv I, Nominalstil ve akademik dil.'],
            ['B2.2 Bağımsız Kullanıcı', 7, 'Genitiv, Partizipialattribute, modal fiil öznel anlam.'],
        ];

        $topics = [
            'B2.1 Bağımsız Kullanıcı' => [
                'Edilgen Çatı ve Modal Fiiller (Passiv + Modal)' => [
                    'words' => [
                        ['Das muss gemacht werden','Bu yapılmalıdır'],['Das kann gelöst werden','Bu çözülebilir'],
                        ['Das darf nicht vergessen werden','Bu unutulmamalıdır'],['Das soll überprüft werden','Bu kontrol edilmelidir'],
                        ['Das will erreicht werden','Bu ulaşılmak isteniyor'],['die Möglichkeit','olasılık'],
                        ['die Notwendigkeit','zorunluluk'],['die Erlaubnis','izin'],['die Pflicht','yükümlülük'],
                        ['überprüfen','kontrol etmek'],['erreichen','ulaşmak'],['verbessern','iyileştirmek'],
                        ['lösen','çözmek'],['umsetzen','uygulamak'],['die Maßnahme','önlem'],
                        ['der Fortschritt','ilerleme'],['die Herausforderung','zorluk/meydan okuma'],
                        ['die Verantwortung','sorumluluk'],['berücksichtigen','dikkate almak'],['vermeiden','önlemek'],
                    ],
                    'sentences' => [
                        ['Das Problem muss sofort gelöst werden.','Problem hemen çözülmelidir.'],
                        ['Der Bericht kann bis Montag fertiggestellt werden.','Rapor Pazartesiye kadar tamamlanabilir.'],
                        ['Diese Regel darf nicht gebrochen werden.','Bu kural çiğnenemez.'],
                        ['Das Projekt soll bis Ende des Jahres abgeschlossen werden.','Proje yıl sonuna kadar tamamlanmalıdır.'],
                        ['Die Fehler müssen korrigiert werden.','Hatalar düzeltilmelidir.'],
                        ['Der Plan kann noch geändert werden.','Plan hâlâ değiştirilebilir.'],
                        ['Alle Dokumente sollen eingereicht werden.','Tüm belgeler teslim edilmelidir.'],
                        ['Das Budget darf nicht überschritten werden.','Bütçe aşılmamalıdır.'],
                        ['Die Ergebnisse müssen analysiert werden.','Sonuçlar analiz edilmelidir.'],
                        ['Das System kann verbessert werden.','Sistem iyileştirilebilir.'],
                        ['Alle Maßnahmen müssen ergriffen werden.','Tüm önlemler alınmalıdır.'],
                        ['Der Vertrag kann noch unterschrieben werden.','Sözleşme hâlâ imzalanabilir.'],
                        ['Die Aufgabe muss bis morgen erledigt werden.','Görev yarına kadar tamamlanmalıdır.'],
                        ['Das darf auf keinen Fall vergessen werden.','Bu hiçbir şekilde unutulmamalıdır.'],
                        ['Die Kosten können reduziert werden.','Maliyetler azaltılabilir.'],
                        ['Der Termin muss eingehalten werden.','Randevuya uyulmalıdır.'],
                        ['Das Ergebnis soll präsentiert werden.','Sonuç sunulmalıdır.'],
                        ['Die Daten müssen gesichert werden.','Veriler yedeklenmelidir.'],
                        ['Das kann nicht akzeptiert werden.','Bu kabul edilemez.'],
                        ['Alle Beteiligten müssen informiert werden.','Tüm ilgililer bilgilendirilmelidir.'],
                    ],
                    'questions' => [
                        ['Das Problem ___ sofort gelöst werden.','muss',['kann','darf','soll']],
                        ['Der Fehler ___ korrigiert werden.','muss',['kann','darf','will']],
                        ['Das Budget ___ nicht überschritten werden.','darf',['muss','soll','kann']],
                        ['Der Plan ___ noch geändert werden.','kann',['muss','darf','soll']],
                        ['Alle Dokumente ___ eingereicht werden.','sollen',['müssen','dürfen','können']],
                        ['Das Ergebnis ___ präsentiert werden.','soll',['muss','darf','kann']],
                        ['Die Kosten ___ reduziert werden.','können',['müssen','dürfen','sollen']],
                        ['Das ___ auf keinen Fall vergessen werden.','darf',['muss','soll','kann']],
                        ['Alle Maßnahmen ___ ergriffen werden.','müssen',['können','dürfen','sollen']],
                        ['Der Vertrag ___ unterschrieben werden.','muss',['soll','darf','kann']],
                        ['Die Daten ___ gesichert werden.','müssen',['können','dürfen','sollen']],
                        ['"Passiv + Modal" bedeutet: Die ___ steht im Vordergrund.','Handlung',['Person','Zeit','Ort']],
                        ['Das System ___ verbessert werden.','kann',['muss','darf','soll']],
                        ['Der Termin ___ eingehalten werden.','muss',['kann','darf','soll']],
                        ['Die Ergebnisse ___ analysiert werden.','müssen',['können','dürfen','sollen']],
                        ['Das ___ nicht akzeptiert werden.','kann',['muss','darf','soll']],
                        ['Alle Beteiligten ___ informiert werden.','müssen',['können','dürfen','sollen']],
                        ['Das Projekt ___ abgeschlossen werden.','soll',['muss','darf','kann']],
                        ['Der Bericht ___ fertiggestellt werden.','kann',['muss','darf','soll']],
                        ['Die Aufgabe ___ erledigt werden.','muss',['kann','darf','soll']],
                    ],
                ],
                'Dolaylı Anlatım (Konjunktiv I - Indirekte Rede)' => [
                    'words' => [
                        ['er sagt, er sei','o olduğunu söylüyor'],['er sagt, er habe','sahip olduğunu söylüyor'],
                        ['er sagt, er gehe','gittiğini söylüyor'],['er sagt, er komme','geleceğini söylüyor'],
                        ['er sagt, er wisse','bildiğini söylüyor'],['behaupten','iddia etmek'],
                        ['berichten','bildirmek'],['erklären','açıklamak'],['mitteilen','bildirmek'],
                        ['laut Bericht','rapora göre'],['laut Aussage','ifadeye göre'],
                        ['der Zeuge','tanık'],['die Aussage','ifade/açıklama'],['die Nachricht','haber'],
                        ['der Bericht','rapor'],['angeblich','iddiaya göre'],['angeblich nicht','iddiaya göre değil'],
                        ['die Meldung','duyuru/haber'],['die Behauptung','iddia'],['der Sprecher','sözcü'],
                    ],
                    'sentences' => [
                        ['Er sagt, er sei krank.','O hasta olduğunu söylüyor.'],
                        ['Sie behauptet, sie habe das nicht getan.','O bunu yapmadığını iddia ediyor.'],
                        ['Der Zeuge sagt, er habe den Mann gesehen.','Tanık adamı gördüğünü söylüyor.'],
                        ['Die Nachricht berichtet, der Minister sei zurückgetreten.','Haberler bakanın istifa ettiğini bildiriyor.'],
                        ['Er erklärt, er wisse nichts davon.','Bundan hiçbir şey bilmediğini açıklıyor.'],
                        ['Sie teilt mit, sie komme morgen nicht.','Yarın gelmeyeceğini bildiriyor.'],
                        ['Laut Bericht sei die Lage kritisch.','Rapora göre durum kritikmiş.'],
                        ['Der Sprecher sagt, die Verhandlungen gingen weiter.','Sözcü müzakerelerin devam ettiğini söylüyor.'],
                        ['Er behauptet, er sei unschuldig.','Masum olduğunu iddia ediyor.'],
                        ['Die Zeitung schreibt, die Preise stiegen weiter.','Gazete fiyatların artmaya devam ettiğini yazıyor.'],
                        ['Sie sagt, sie habe keine Zeit.','Zamanı olmadığını söylüyor.'],
                        ['Er berichtet, er sei in Berlin gewesen.','Berlin\'de olduğunu bildiriyor.'],
                        ['Laut Aussage habe er das Auto nicht gestohlen.','İfadeye göre arabayı çalmamış.'],
                        ['Der Arzt erklärt, der Patient brauche Ruhe.','Doktor hastanın dinlenmesi gerektiğini açıklıyor.'],
                        ['Sie behauptet, sie kenne ihn nicht.','Onu tanımadığını iddia ediyor.'],
                        ['Die Meldung besagt, das Wetter werde besser.','Haber havanın düzeleceğini söylüyor.'],
                        ['Er teilt mit, er komme zu spät.','Geç kalacağını bildiriyor.'],
                        ['Laut Bericht sei die Firma bankrott.','Rapora göre şirket iflasın eşiğindeymiş.'],
                        ['Sie sagt, sie habe das Buch gelesen.','Kitabı okuduğunu söylüyor.'],
                        ['Er erklärt, er werde morgen abreisen.','Yarın hareket edeceğini açıklıyor.'],
                    ],
                    'questions' => [
                        ['Er sagt, er ___ krank.','sei',['ist','wäre','sein']],
                        ['Sie behauptet, sie ___ das nicht getan.','habe',['hat','hätte','haben']],
                        ['Der Zeuge sagt, er ___ den Mann gesehen.','habe',['hat','hätte','haben']],
                        ['Laut Bericht ___ die Lage kritisch.','sei',['ist','wäre','sein']],
                        ['Er erklärt, er ___ nichts davon.','wisse',['weiß','wüsste','wissen']],
                        ['"Indirekte Rede" benutzt den ___.','Konjunktiv I',['Konjunktiv II','Imperativ','Passiv']],
                        ['Sie sagt, sie ___ keine Zeit.','habe',['hat','hätte','haben']],
                        ['Er berichtet, er ___ in Berlin gewesen.','sei',['ist','wäre','sein']],
                        ['Die Zeitung schreibt, die Preise ___ weiter.','stiegen',['steigen','stiegen würden','steigern']],
                        ['Er teilt mit, er ___ zu spät.','komme',['kommt','käme','kommen']],
                        ['"Er sagt, er sei krank." - "sei" ist ___','Konjunktiv I von sein',['Konjunktiv II von sein','Präteritum von sein','Passiv']],
                        ['Sie behauptet, sie ___ ihn nicht.','kenne',['kennt','kenne','kennen']],
                        ['Laut Aussage ___ er das Auto nicht gestohlen.','habe',['hat','hätte','haben']],
                        ['Der Arzt erklärt, der Patient ___ Ruhe.','brauche',['braucht','bräuchte','brauchen']],
                        ['Er sagt, er ___ morgen abreisen.','werde',['wird','würde','werden']],
                        ['Die Meldung besagt, das Wetter ___ besser.','werde',['wird','würde','werden']],
                        ['Er sagt, er ___ das Buch gelesen.','habe',['hat','hätte','haben']],
                        ['Laut Bericht ___ die Firma bankrott.','sei',['ist','wäre','sein']],
                        ['Sie teilt mit, sie ___ morgen nicht.','komme',['kommt','käme','kommen']],
                        ['Der Sprecher sagt, die Verhandlungen ___ weiter.','gingen',['gehen','gingen würden','gehen zu']],
                    ],
                ],
            ],
            'B2.2 Bağımsız Kullanıcı' => [
                'Genitiv ve Genitiv Alan Edatlar' => [
                    'words' => [
                        ['wegen + Genitiv','... yüzünden'],['trotz + Genitiv','... e rağmen'],
                        ['während + Genitiv','... sırasında'],['innerhalb + Genitiv','... içinde'],
                        ['außerhalb + Genitiv','... dışında'],['aufgrund + Genitiv','... nedeniyle'],
                        ['mithilfe + Genitiv','... yardımıyla'],['anstatt + Genitiv','... yerine'],
                        ['des Mannes','adamın (eril Genitiv)'],['der Frau','kadının (dişil Genitiv)'],
                        ['des Kindes','çocuğun (nötr Genitiv)'],['der Kinder','çocukların (çoğul Genitiv)'],
                        ['der Anfang','başlangıç'],['das Ende','son'],['die Ursache','neden/sebep'],
                        ['die Folge','sonuç'],['der Grund','gerekçe'],['die Dauer','süre'],
                        ['der Bereich','alan/bölge'],['der Zeitraum','zaman aralığı'],
                    ],
                    'sentences' => [
                        ['Wegen des Regens blieben wir zu Hause.','Yağmur yüzünden evde kaldık.'],
                        ['Trotz des schlechten Wetters gingen wir spazieren.','Kötü havaya rağmen yürüyüşe çıktık.'],
                        ['Während des Essens spricht man nicht.','Yemek sırasında konuşulmaz.'],
                        ['Innerhalb des Gebäudes ist Rauchen verboten.','Bina içinde sigara içmek yasaktır.'],
                        ['Außerhalb der Stadt gibt es viele Wälder.','Şehrin dışında çok orman var.'],
                        ['Aufgrund seiner Erfahrung bekam er den Job.','Deneyimi sayesinde işi aldı.'],
                        ['Mithilfe der Technologie lösten wir das Problem.','Teknoloji yardımıyla problemi çözdük.'],
                        ['Anstatt des Kaffees trinke ich lieber Tee.','Kahve yerine çay içmeyi tercih ediyorum.'],
                        ['Das ist das Auto des Mannes.','Bu adamın arabası.'],
                        ['Die Tasche der Frau ist rot.','Kadının çantası kırmızı.'],
                        ['Der Name des Kindes ist Max.','Çocuğun adı Max.'],
                        ['Wegen der Baustelle ist die Straße gesperrt.','İnşaat nedeniyle yol kapalı.'],
                        ['Trotz des Verbots rauchte er.','Yasağa rağmen sigara içti.'],
                        ['Während des Fluges schlief er.','Uçuş sırasında uyudu.'],
                        ['Innerhalb eines Jahres lernte sie Deutsch.','Bir yıl içinde Almanca öğrendi.'],
                        ['Außerhalb der Arbeitszeit bin ich nicht erreichbar.','Mesai saatleri dışında ulaşılamam.'],
                        ['Aufgrund des Fehlers mussten wir alles wiederholen.','Hata nedeniyle her şeyi tekrarlamak zorunda kaldık.'],
                        ['Mithilfe eines Wörterbuchs verstand ich den Text.','Sözlük yardımıyla metni anladım.'],
                        ['Anstatt zu arbeiten surfte er im Internet.','Çalışmak yerine internette gezindi.'],
                        ['Die Qualität der Produkte ist sehr hoch.','Ürünlerin kalitesi çok yüksek.'],
                    ],
                    'questions' => [
                        ['___ des Regens blieben wir zu Hause.','Wegen',['Trotz','Während','Innerhalb']],
                        ['___ des schlechten Wetters gingen wir spazieren.','Trotz',['Wegen','Während','Außerhalb']],
                        ['___ des Essens spricht man nicht.','Während',['Wegen','Trotz','Innerhalb']],
                        ['___ des Gebäudes ist Rauchen verboten.','Innerhalb',['Außerhalb','Wegen','Trotz']],
                        ['___ der Stadt gibt es viele Wälder.','Außerhalb',['Innerhalb','Wegen','Trotz']],
                        ['___ seiner Erfahrung bekam er den Job.','Aufgrund',['Mithilfe','Anstatt','Trotz']],
                        ['___ der Technologie lösten wir das Problem.','Mithilfe',['Aufgrund','Wegen','Trotz']],
                        ['___ des Kaffees trinke ich lieber Tee.','Anstatt',['Wegen','Trotz','Mithilfe']],
                        ['Das Auto ___ Mannes ist neu.','des',['der','dem','den']],
                        ['Die Tasche ___ Frau ist rot.','der',['des','dem','den']],
                        ['Der Name ___ Kindes ist Max.','des',['der','dem','den']],
                        ['___ der Baustelle ist die Straße gesperrt.','Wegen',['Trotz','Während','Innerhalb']],
                        ['___ des Verbots rauchte er.','Trotz',['Wegen','Während','Innerhalb']],
                        ['___ des Fluges schlief er.','Während',['Wegen','Trotz','Außerhalb']],
                        ['___ eines Jahres lernte sie Deutsch.','Innerhalb',['Außerhalb','Wegen','Trotz']],
                        ['Die Qualität ___ Produkte ist hoch.','der',['des','dem','den']],
                        ['"wegen" verlangt den ___.','Genitiv',['Dativ','Akkusativ','Nominativ']],
                        ['"trotz" verlangt den ___.','Genitiv',['Dativ','Akkusativ','Nominativ']],
                        ['"während" verlangt den ___.','Genitiv',['Dativ','Akkusativ','Nominativ']],
                        ['"innerhalb" verlangt den ___.','Genitiv',['Dativ','Akkusativ','Nominativ']],
                    ],
                ],
                'Modal Fiillerin Öznel Anlamı (Epistemische Modalität)' => [
                    'words' => [
                        ['Er muss krank sein.','Hasta olmalı. (tahmin)'],['Er könnte krank sein.','Hasta olabilir. (olasılık)'],
                        ['Er dürfte recht haben.','Haklı olsa gerek. (muhtemel)'],['Er soll reich sein.','Zengin olduğu söyleniyor.'],
                        ['Er will das gesehen haben.','Bunu gördüğünü iddia ediyor.'],['die Vermutung','tahmin'],
                        ['die Wahrscheinlichkeit','olasılık'],['sicher','kesin'],['wahrscheinlich','muhtemelen'],
                        ['vielleicht','belki'],['möglicherweise','olasılıkla'],['angeblich','iddiaya göre'],
                        ['zweifellos','şüphesiz'],['kaum','neredeyse hiç'],['bestimmt','kesinlikle'],
                        ['wohl','galiba/sanırım'],['eigentlich','aslında'],['offenbar','açıkça/görünüşe göre'],
                        ['vermutlich','muhtemelen'],['scheinbar','görünüşe göre'],
                    ],
                    'sentences' => [
                        ['Er muss sehr müde sein. (Vermutung)','Çok yorgun olmalı. (tahmin)'],
                        ['Das könnte ein Problem sein.','Bu bir sorun olabilir.'],
                        ['Sie dürfte die Beste in der Klasse sein.','Sınıfın en iyisi olsa gerek.'],
                        ['Er soll sehr reich sein.','Çok zengin olduğu söyleniyor.'],
                        ['Er will das selbst erlebt haben.','Bunu bizzat yaşadığını iddia ediyor.'],
                        ['Er muss zu Hause sein. Das Licht brennt.','Evde olmalı. Işıklar yanıyor.'],
                        ['Sie könnte die Lösung gefunden haben.','Çözümü bulmuş olabilir.'],
                        ['Das dürfte schwierig sein.','Bu zor olsa gerek.'],
                        ['Er soll gelogen haben.','Yalan söylediği söyleniyor.'],
                        ['Sie will nichts gewusst haben.','Hiçbir şey bilmediğini iddia ediyor.'],
                        ['Es muss einen Fehler gegeben haben.','Bir hata olmuş olmalı.'],
                        ['Das könnte die Ursache sein.','Bu neden olabilir.'],
                        ['Er dürfte schon angekommen sein.','Çoktan varmış olsa gerek.'],
                        ['Der Zeuge soll gelogen haben.','Tanığın yalan söylediği söyleniyor.'],
                        ['Sie will das nicht gewollt haben.','Bunu istemediğini iddia ediyor.'],
                        ['Er muss das gewusst haben.','Bunu bilmiş olmalı.'],
                        ['Das könnte noch schlimmer werden.','Bu daha da kötüleşebilir.'],
                        ['Er dürfte recht haben.','Haklı olsa gerek.'],
                        ['Der Chef soll sehr streng sein.','Patronun çok sert olduğu söyleniyor.'],
                        ['Sie will das Geld nicht genommen haben.','Parayı almadığını iddia ediyor.'],
                    ],
                    'questions' => [
                        ['Er ___ sehr müde sein. (starke Vermutung)','muss',['könnte','dürfte','soll']],
                        ['Das ___ ein Problem sein. (Möglichkeit)','könnte',['muss','dürfte','soll']],
                        ['Sie ___ die Beste sein. (Wahrscheinlichkeit)','dürfte',['muss','könnte','soll']],
                        ['Er ___ sehr reich sein. (Gerücht)','soll',['muss','könnte','dürfte']],
                        ['Er ___ das selbst erlebt haben. (Behauptung)','will',['muss','könnte','soll']],
                        ['Es ___ einen Fehler gegeben haben.','muss',['könnte','dürfte','soll']],
                        ['Das ___ die Ursache sein. (vielleicht)','könnte',['muss','dürfte','soll']],
                        ['Er ___ schon angekommen sein. (wahrscheinlich)','dürfte',['muss','könnte','soll']],
                        ['Der Zeuge ___ gelogen haben. (man sagt)','soll',['muss','könnte','dürfte']],
                        ['Sie ___ das nicht gewollt haben. (Behauptung)','will',['muss','könnte','soll']],
                        ['"Er muss krank sein" drückt ___ aus.','eine Vermutung',['einen Befehl','eine Erlaubnis','einen Wunsch']],
                        ['"Er soll reich sein" bedeutet: ___ sagt es.','jemand anderes',['er selbst','niemand','der Sprecher']],
                        ['"Er will das gesehen haben" - er ___ das behauptet.','selbst',['jemand anderes','niemand','alle']],
                        ['Das ___ schwierig sein. (Einschätzung)','dürfte',['muss','könnte','soll']],
                        ['Er ___ zu Hause sein - das Licht brennt.','muss',['könnte','dürfte','soll']],
                        ['Er ___ gelogen haben. (Vorwurf/Gerücht)','soll',['muss','könnte','dürfte']],
                        ['Sie ___ nichts gewusst haben. (eigene Aussage)','will',['muss','könnte','soll']],
                        ['Er ___ recht haben. (Wahrscheinlichkeit)','dürfte',['muss','könnte','soll']],
                        ['Das ___ noch schlimmer werden. (Möglichkeit)','könnte',['muss','dürfte','soll']],
                        ['Er ___ das gewusst haben. (Schlussfolgerung)','muss',['könnte','dürfte','soll']],
                    ],
                ],
            ],
        ];

        foreach ($levels as [$title, $order, $desc]) {
            $level = Level::firstOrCreate(
                ['level_title' => $title],
                ['level_slug' => Str::slug($title), 'level_description' => $desc, 'order_index' => $order, 'is_active' => true]
            );

            $lessonOrder = 1;
            foreach ($topics[$title] as $lessonTitle => $data) {
                $lesson = Lesson::firstOrCreate(
                    ['lesson_title' => $lessonTitle],
                    ['level_id' => $level->id, 'lesson_description_tr' => $lessonTitle, 'lesson_image' => 'assets/img/logo.png', 'order_index' => $lessonOrder++, 'is_active' => true]
                );

                foreach ($data['words'] as $idx => [$g, $t]) {
                    Word::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'word_german' => $g],
                        ['word_turkish' => $t, 'order_index' => $idx + 1, 'is_active' => true]
                    );
                }

                $exercise = Exercise::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'title' => $lessonTitle . ' Alıştırmaları'],
                    ['order_index' => 1, 'is_active' => true]
                );
                $exercise->items()->delete();
                foreach ($data['sentences'] as $idx => [$g, $t]) {
                    ExerciseItem::create(['exercise_id' => $exercise->id, 'german' => $g, 'turkish' => $t, 'order_index' => $idx + 1]);
                }

                $test = Test::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'test_title' => $lessonTitle . ' Testi'],
                    ['description' => '20 soruluk B2 pekiştirme testi.', 'is_active' => true]
                );

                $sync = [];
                foreach ($data['questions'] as $idx => $q) {
                    $question = Question::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'question_text' => $q[0]],
                        ['question_type' => 'multiple_choice', 'order_index' => $idx + 1, 'is_active' => true, 'explanation' => '', 'media_url' => '']
                    );
                    if ($question->answers()->count() === 0) {
                        $question->answers()->create(['answer_text' => $q[1], 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                        foreach ($q[2] as $wi => $w) {
                            $question->answers()->create(['answer_text' => $w, 'is_correct' => false, 'order_index' => $wi + 2, 'is_active' => true]);
                        }
                    }
                    $sync[$question->id] = ['order_index' => $idx + 1];
                }
                $test->questions()->sync($sync);
                echo "OK: $lessonTitle\n";
            }
        }
    }
}
