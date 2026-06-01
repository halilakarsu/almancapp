<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\Question;

class A1_Tests_Fixer extends Seeder
{
    // Each topic: 20 questions, each with 1 correct + 3 wrong answers
    private array $tests = [];

    public function run(): void
    {
        $this->tests = [
            'Möchten: Almanca Modal Fiiller' => [
                ['Ich ___ bitte einen Kaffee.','möchte',['will','kann','soll']],
                ['Was ___ Sie trinken?','möchten',['wollen','können','sollen']],
                ['Er ___ nach Berlin fahren.','möchte',['will','kann','muss']],
                ['Wir ___ einen Tisch reservieren.','möchten',['wollen','dürfen','sollen']],
                ['___ du etwas essen?','Möchtest',['Willst','Kannst','Darfst']],
                ['Sie ___ Ärztin werden.','möchte',['will','kann','soll']],
                ['Ich ___ bitte die Rechnung.','möchte',['will','muss','soll']],
                ['Das Kind ___ Schokolade haben.','möchte',['will','kann','muss']],
                ['___ ihr ins Museum gehen?','Möchtet',['Wollt','Könnt','Dürft']],
                ['Sie ___ nicht warten.','möchte',['will','kann','muss']],
                ['"Möchten" gehört zu den ___ Verben.','Modalverben',['Hilfsverben','Trennbaren Verben','Reflexivverben']],
                ['Was ___ Sie zum Nachtisch?','möchten',['wollen','können','sollen']],
                ['Ich ___ kein Fleisch essen.','möchte',['will','kann','muss']],
                ['___ Sie lieber Kaffee oder Tee?','Möchten',['Wollen','Können','Sollen']],
                ['Die Form von "möchten" für "er" ist ___.','möchte',['möchtet','möchten','möchtest']],
                ['Ich ___ gerne mit Ihnen sprechen.','möchte',['will','muss','soll']],
                ['___ du mitkommen?','Möchtest',['Willst','Kannst','Darfst']],
                ['Sie ___ sich bedanken.','möchten',['wollen','können','sollen']],
                ['Ich ___ eine Fahrkarte kaufen.','möchte',['will','muss','soll']],
                ['Wie heißt "möchten" auf Türkisch?','istemek (nazik)','istemek (güçlü)','zorunda olmak','izinli olmak'],
            ],
            'Können: Almanca Modal Fiiller' => [
                ['Ich ___ gut schwimmen.','kann',['will','muss','soll']],
                ['___ du Klavier spielen?','Kannst',['Willst','Musst','Darfst']],
                ['Er ___ kein Deutsch sprechen.','kann',['will','muss','soll']],
                ['___ Sie mir bitte helfen?','Können',['Wollen','Müssen','Sollen']],
                ['Das ___ ich nicht verstehen.','kann',['will','muss','soll']],
                ['___ wir morgen sprechen?','Können',['Wollen','Müssen','Sollen']],
                ['Ich ___ leider nicht kommen.','kann',['will','muss','soll']],
                ['Sie ___ sehr gut kochen.','kann',['will','muss','soll']],
                ['___ du bitte langsamer sprechen?','Kannst',['Willst','Musst','Darfst']],
                ['Das Kind ___ schon lesen.','kann',['will','muss','soll']],
                ['Wir ___ das Problem lösen.','können',['wollen','müssen','sollen']],
                ['___ ich bitte Wasser haben?','Kann',['Will','Muss','Soll']],
                ['Er ___ sehr schnell lesen.','kann',['will','muss','soll']],
                ['Ich ___ gut Fahrrad fahren.','kann',['will','muss','soll']],
                ['"Können" bedeutet auf Türkisch ___.','yapabilmek',['istemek','zorunda olmak','gerekmek']],
                ['Die Pluralform von "können" ist ___.','können',['kannen','könnt','kann']],
                ['"Ich kann" - was ist die Form für "du"?','du kannst',['du kann','du könnt','du könnte']],
                ['___ ihr das alleine machen?','Könnt',['Kannen','Könntet','Kann']],
                ['Ich ___ das alleine machen.','kann',['will','muss','soll']],
                ['___ wir das zusammen machen?','Können',['Wollen','Müssen','Sollen']],
            ],
            'Müssen: Almanca Modal Fiiller' => [
                ['Ich ___ jeden Tag arbeiten.','muss',['will','kann','soll']],
                ['Du ___ jetzt schlafen gehen.','musst',['willst','kannst','sollst']],
                ['Er ___ pünktlich sein.','muss',['will','kann','soll']],
                ['Wir ___ früh aufstehen.','müssen',['wollen','können','sollen']],
                ['___ ich das wirklich machen?','Muss',['Will','Kann','Soll']],
                ['Das Kind ___ Hausaufgaben machen.','muss',['will','kann','soll']],
                ['Ich ___ zum Arzt gehen.','muss',['will','kann','soll']],
                ['___ wir das bezahlen?','Müssen',['Wollen','Können','Sollen']],
                ['Du ___ mehr Wasser trinken.','musst',['willst','kannst','sollst']],
                ['Wir ___ uns beeilen.','müssen',['wollen','können','sollen']],
                ['"Müssen" bedeutet auf Türkisch ___.','zorunda olmak',['istemek','yapabilmek','izinli olmak']],
                ['Er ___ die Prüfung bestehen.','muss',['will','kann','soll']],
                ['"Ich muss" - die Form für "du" ist ___.','du musst',['du müsst','du muss','du müssen']],
                ['Das ___ ein Fehler sein.','muss',['will','kann','soll']],
                ['Ich ___ jeden Tag üben.','muss',['will','kann','soll']],
                ['___ sie morgen arbeiten?','Muss',['Will','Kann','Soll']],
                ['Du ___ dich entscheiden.','musst',['willst','kannst','sollst']],
                ['Ich ___ leider absagen.','muss',['will','kann','soll']],
                ['Wir ___ das bis Freitag fertigmachen.','müssen',['wollen','können','sollen']],
                ['Er ___ jeden Tag Medikamente nehmen.','muss',['will','kann','soll']],
            ],
            'Nominativ ve Artikeller' => [
                ['___ Mann kommt aus Deutschland.','Der',['Die','Das','Ein']],
                ['___ Frau arbeitet als Lehrerin.','Die',['Der','Das','Eine']],
                ['___ Kind spielt im Garten.','Das',['Der','Die','Ein']],
                ['Ist das ___ Buch?','ein',['eine','der','die']],
                ['Das ist ___ Lampe.','eine',['ein','der','das']],
                ['___ Hund bellt laut.','Der',['Die','Das','Ein']],
                ['___ Katze schläft.','Die',['Der','Das','Eine']],
                ['___ Auto ist rot.','Das',['Der','Die','Ein']],
                ['"Der" ist der Artikel für ___ Nomen.','maskuline',['feminine','neutrale','alle']],
                ['"Die" ist der Artikel für ___ Nomen.','feminine',['maskuline','neutrale','alle']],
                ['"Das" ist der Artikel für ___ Nomen.','neutrale',['maskuline','feminine','alle']],
                ['___ Lehrer erklärt die Aufgabe.','Der',['Die','Das','Ein']],
                ['___ Schule ist groß.','Die',['Der','Das','Eine']],
                ['___ Haus hat einen Garten.','Das',['Der','Die','Ein']],
                ['Wie heißt der Nominativ-Artikel für "Tisch"?','der',['die','das','ein']],
                ['___ Bahnhof ist weit.','Der',['Die','Das','Ein']],
                ['___ ist das? – Das ist eine Katze.','Was',['Wer','Wo','Wie']],
                ['___ Tisch ist aus Holz.','Der',['Die','Das','Ein']],
                ['Im Nominativ hat "Frau" den Artikel ___.','die',['der','das','eine']],
                ['___ ist neu: der Stuhl oder der Tisch?','Welcher',['Welche','Welches','Was']],
            ],
            'Akkusativ Hali' => [
                ['Ich sehe ___ Mann.','den',['der','dem','ein']],
                ['Er kauft ___ Buch.','das',['dem','den','ein']],
                ['Sie trinkt ___ Tee.','den',['der','dem','einen']],
                ['Wir haben ___ Katze.','eine',['ein','einer','einen']],
                ['Ich suche ___ Schlüssel.','den',['der','dem','ein']],
                ['Er liest ___ Zeitung.','die',['der','dem','eine']],
                ['Kaufst du ___ Auto?','das',['dem','den','ein']],
                ['Ich esse ___ Apfel.','einen',['ein','eine','einer']],
                ['Sie liebt ___ Hund.','den',['der','dem','einen']],
                ['Er bringt ___ Kaffee.','den',['der','dem','einen']],
                ['Im Akkusativ ändert sich nur der Artikel für ___ Nomen.','maskuline',['feminine','neutrale','alle']],
                ['Ich brauche ___ Stift.','einen',['ein','eine','einer']],
                ['Er hört ___ Musik.','die',['der','dem','eine']],
                ['Wir besuchen ___ Museum.','das',['dem','den','ein']],
                ['Sie nimmt ___ Bus.','den',['der','dem','einen']],
                ['Ich finde ___ Lösung.','die',['der','dem','eine']],
                ['"Den" ist der Akkusativartikel für ___.','maskuline Nomen',['feminine Nomen','neutrale Nomen','Pluralnomen']],
                ['Er liebt ___ Frau.','die',['der','dem','eine']],
                ['Ich schreibe ___ Brief.','einen',['ein','eine','einer']],
                ['Sie sieht ___ Kind.','das',['dem','den','ein']],
            ],
            'Ayrılabilir Fiiller' => [
                ['Ich ___ um 7 Uhr ___.','stehe ... auf',['stehe ... ein','komme ... an','gehe ... weg']],
                ['Er ___ mich heute ___.','ruft ... an',['macht ... auf','räumt ... auf','zieht ... an']],
                ['Wir ___ im Supermarkt ___.','kaufen ... ein',['stehen ... auf','kommen ... an','fahren ... ab']],
                ['___ du heute mit?','Kommst',['Gehst','Fährst','Stehst']],
                ['Sie ___ die Tür ___.','macht ... auf',['ruft ... an','zieht ... an','hört ... auf']],
                ['Er ___ die Jacke ___.','zieht ... an',['macht ... zu','räumt ... auf','steht ... auf']],
                ['Wir ___ den Hund ___.','holen ... ab',['stehen ... auf','kommen ... an','fahren ... ab']],
                ['___ du mit dem Rauchen ___?','Hörst ... auf',['Machst ... auf','Rufst ... an','Stehst ... auf']],
                ['Der Zug ___ um 9 Uhr ___.','fährt ... ab',['kommt ... an','steht ... auf','macht ... auf']],
                ['Bei trennbaren Verben geht der Präfix ans ___.','Ende des Satzes',['Anfang','Mitte','überall']],
                ['Ich ___ mein Zimmer ___.','räume ... auf',['mache ... auf','ziehe ... an','höre ... auf']],
                ['Sie ___ sich ___.','stellt ... vor',['ruft ... an','macht ... auf','zieht ... an']],
                ['Wie heißt "aufstehen" auf Türkisch?','kalkmak',['gitmek','gelmek','başlamak']],
                ['___ die Tür bitte ___!','Mach ... auf',['Ruf ... an','Steh ... auf','Zieh ... an']],
                ['Er ___ das Buch ___.','gibt ... zurück',['macht ... auf','ruft ... an','zieht ... an']],
                ['"Anrufen" ist ein ___ Verb.','trennbares',['reflexives','modales','untrennbares']],
                ['Ich ___ das Programm ___.','schaue ... nach',['mache ... auf','höre ... auf','stehe ... auf']],
                ['Wir ___ gemeinsam ___.','gehen ... mit',['stehen ... auf','kommen ... an','fahren ... ab']],
                ['___ du heute Abend ___?','Schläfst ... ein',['Stehst ... auf','Kommst ... an','Fährst ... ab']],
                ['Er ___ früh ___.','steht ... auf',['kommt ... an','fährt ... ab','geht ... mit']],
            ],
        ];

        foreach ($this->tests as $lessonTitle => $questions) {
            $lesson = Lesson::where('lesson_title', $lessonTitle)->first();
            if (!$lesson) { echo "SKIP: $lessonTitle\n"; continue; }

            $test = Test::firstOrCreate(
                ['lesson_id' => $lesson->id, 'test_title' => $lessonTitle . ' Testi'],
                ['description' => '20 soruluk pekiştirme testi.', 'is_active' => true]
            );

            $syncData = [];
            foreach ($questions as $idx => $q) {
                [$qText, $correct] = [$q[0], $q[1]];
                $wrongs = array_slice($q, 2);
                if (is_array($wrongs[0])) $wrongs = $wrongs[0];

                $question = Question::firstOrCreate(
                    ['lesson_id' => $lesson->id, 'question_text' => $qText],
                    ['question_type' => 'multiple_choice', 'order_index' => $idx + 1, 'is_active' => true, 'explanation' => '', 'media_url' => '']
                );

                if ($question->answers()->count() === 0) {
                    $question->answers()->create(['answer_text' => $correct, 'is_correct' => true, 'order_index' => 1, 'is_active' => true]);
                    foreach ($wrongs as $wi => $w) {
                        $question->answers()->create(['answer_text' => $w, 'is_correct' => false, 'order_index' => $wi + 2, 'is_active' => true]);
                    }
                }
                $syncData[$question->id] = ['order_index' => $idx + 1];
            }
            $test->questions()->sync($syncData);
            echo "OK: $lessonTitle (" . count($questions) . " questions)\n";
        }
    }
}
