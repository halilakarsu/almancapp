<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\Lesson;

class CardSeeder extends Seeder
{
    public function run(): void
    {
        // Tüm dersleri çek
        $lessons = Lesson::all()->keyBy('id');
        $lessonTitles = $lessons->pluck('lesson_title', 'id');

        // Başlık anahtar kelimesine göre ders ID bul (case-insensitive)
        $findLesson = function(string $keyword) use ($lessonTitles): ?int {
            foreach ($lessonTitles as $id => $title) {
                if (stripos($title, $keyword) !== false) {
                    return $id;
                }
            }
            return null;
        };

        // Fallback: ilk mevcut ders ID'si
        $fallbackId = $lessonTitles->keys()->first();

        // Ders ID'lerini tespit et
        $idSelamlasma  = $findLesson('Selamlasma') ?? $findLesson('Kişisel') ?? $fallbackId;
        $idSayilar     = $findLesson('Sayılar')    ?? $fallbackId;
        $idRenkler     = $findLesson('Renkler')    ?? $fallbackId;
        $idAile        = $findLesson('Aile')        ?? $fallbackId;
        $idYiyecek     = $findLesson('Yiyecek')    ?? $findLesson('Yeme')   ?? $fallbackId;
        $idFiiller     = $findLesson('Fiil')        ?? $fallbackId;
        $idZaman       = $findLesson('Günler')      ?? $findLesson('Zaman') ?? $fallbackId;
        $idSifatlar    = $findLesson('Sıfat')       ?? $fallbackId;
        $idTanisma     = $findLesson('Kişisel')     ?? $fallbackId;
        $idGunlukHayat = $findLesson('Günler')      ?? $fallbackId;
        $idModal       = $findLesson('Modal')       ?? $findLesson('Möchten') ?? $fallbackId;
        $idGrammar     = $findLesson('Nominativ')   ?? $findLesson('Artikel') ?? $fallbackId;

        // ── KARTLAR ─────────────────────────────────────────────────────────────
        $cards = [

            // ─── SELAMLASMA + TEMEL KELİMELER ──────────────────────────────────
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Guten Morgen',    'turkish_content'=>'Günaydın',                    'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Guten Tag',       'turkish_content'=>'İyi günler',                  'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Guten Abend',     'turkish_content'=>'İyi akşamlar',                'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Gute Nacht',      'turkish_content'=>'İyi geceler',                 'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Hallo',           'turkish_content'=>'Merhaba',                     'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Tschüss',         'turkish_content'=>'Hoşça kal',                   'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Auf Wiedersehen', 'turkish_content'=>'Güle güle (resmi)',            'difficulty'=>2],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Bitte',           'turkish_content'=>'Lütfen / Rica ederim',         'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Danke',           'turkish_content'=>'Teşekkür ederim',             'difficulty'=>1],
            ['lesson_id'=>$idSelamlasma,'type'=>'word','german_content'=>'Entschuldigung',  'turkish_content'=>'Özür dilerim / Afedersiniz',  'difficulty'=>2],

            // ─── SAYILAR ────────────────────────────────────────────────────────
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'eins',     'turkish_content'=>'bir',    'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'zwei',     'turkish_content'=>'iki',    'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'drei',     'turkish_content'=>'üç',     'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'vier',     'turkish_content'=>'dört',   'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'fünf',     'turkish_content'=>'beş',    'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'zehn',     'turkish_content'=>'on',     'difficulty'=>1],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'zwanzig',  'turkish_content'=>'yirmi',  'difficulty'=>2],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'hundert',  'turkish_content'=>'yüz',    'difficulty'=>2],
            ['lesson_id'=>$idSayilar,'type'=>'word','german_content'=>'tausend',  'turkish_content'=>'bin',    'difficulty'=>2],

            // ─── RENKLER ────────────────────────────────────────────────────────
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'rot',      'turkish_content'=>'kırmızı','difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'blau',     'turkish_content'=>'mavi',   'difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'grün',     'turkish_content'=>'yeşil',  'difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'gelb',     'turkish_content'=>'sarı',   'difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'schwarz',  'turkish_content'=>'siyah',  'difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'weiß',     'turkish_content'=>'beyaz',  'difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'grau',     'turkish_content'=>'gri',    'difficulty'=>2],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'orange',   'turkish_content'=>'turuncu','difficulty'=>1],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'lila',     'turkish_content'=>'mor',    'difficulty'=>2],
            ['lesson_id'=>$idRenkler,'type'=>'word','german_content'=>'rosa',     'turkish_content'=>'pembe',  'difficulty'=>2],

            // ─── AİLE ───────────────────────────────────────────────────────────
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'die Mutter',     'turkish_content'=>'anne',        'difficulty'=>1],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'der Vater',      'turkish_content'=>'baba',        'difficulty'=>1],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'das Kind',       'turkish_content'=>'çocuk',       'difficulty'=>1],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'die Schwester',  'turkish_content'=>'kız kardeş',  'difficulty'=>2],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'der Bruder',     'turkish_content'=>'erkek kardeş','difficulty'=>2],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'die Großmutter', 'turkish_content'=>'büyükanne',   'difficulty'=>2],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'der Großvater',  'turkish_content'=>'büyükbaba',   'difficulty'=>2],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'die Tante',      'turkish_content'=>'teyze / hala','difficulty'=>2],
            ['lesson_id'=>$idAile,'type'=>'word','german_content'=>'der Onkel',      'turkish_content'=>'amca / dayı', 'difficulty'=>2],

            // ─── YİYECEK & İÇECEK ───────────────────────────────────────────────
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'das Wasser',   'turkish_content'=>'su',          'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'der Kaffee',   'turkish_content'=>'kahve',       'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'das Brot',     'turkish_content'=>'ekmek',       'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'die Milch',    'turkish_content'=>'süt',         'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'der Apfel',    'turkish_content'=>'elma',        'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'das Fleisch',  'turkish_content'=>'et',          'difficulty'=>2],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'der Käse',     'turkish_content'=>'peynir',      'difficulty'=>2],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'die Suppe',    'turkish_content'=>'çorba',       'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'der Salat',    'turkish_content'=>'salata',      'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'word','german_content'=>'das Eis',      'turkish_content'=>'dondurma/buz','difficulty'=>1],

            // ─── FİİLLER ────────────────────────────────────────────────────────
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'gehen',      'turkish_content'=>'gitmek',              'difficulty'=>1],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'kommen',     'turkish_content'=>'gelmek',              'difficulty'=>1],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'sprechen',   'turkish_content'=>'konuşmak',            'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'lernen',     'turkish_content'=>'öğrenmek',            'difficulty'=>1],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'arbeiten',   'turkish_content'=>'çalışmak',            'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'kaufen',     'turkish_content'=>'satın almak',         'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'wohnen',     'turkish_content'=>'oturmak / yaşamak',   'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'verstehen',  'turkish_content'=>'anlamak',             'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'lesen',      'turkish_content'=>'okumak',              'difficulty'=>1],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'schreiben',  'turkish_content'=>'yazmak',              'difficulty'=>2],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'hören',      'turkish_content'=>'dinlemek / duymak',   'difficulty'=>1],
            ['lesson_id'=>$idFiiller,'type'=>'word','german_content'=>'sehen',      'turkish_content'=>'görmek',              'difficulty'=>1],

            // ─── ZAMAN ──────────────────────────────────────────────────────────
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'heute',       'turkish_content'=>'bugün',       'difficulty'=>1],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'morgen',      'turkish_content'=>'yarın',       'difficulty'=>1],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'gestern',     'turkish_content'=>'dün',         'difficulty'=>1],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'jetzt',       'turkish_content'=>'şimdi',       'difficulty'=>1],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'immer',       'turkish_content'=>'her zaman',   'difficulty'=>2],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'nie',         'turkish_content'=>'hiçbir zaman','difficulty'=>2],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'die Woche',   'turkish_content'=>'hafta',       'difficulty'=>2],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'der Monat',   'turkish_content'=>'ay',          'difficulty'=>2],
            ['lesson_id'=>$idZaman,'type'=>'word','german_content'=>'das Jahr',    'turkish_content'=>'yıl',         'difficulty'=>1],

            // ─── SIFATLAR ────────────────────────────────────────────────────────
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'groß',     'turkish_content'=>'büyük',   'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'klein',    'turkish_content'=>'küçük',   'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'schön',    'turkish_content'=>'güzel',   'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'gut',      'turkish_content'=>'iyi',     'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'schlecht', 'turkish_content'=>'kötü',    'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'billig',   'turkish_content'=>'ucuz',    'difficulty'=>2],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'teuer',    'turkish_content'=>'pahalı',  'difficulty'=>2],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'neu',      'turkish_content'=>'yeni',    'difficulty'=>1],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'alt',      'turkish_content'=>'eski/yaşlı','difficulty'=>2],
            ['lesson_id'=>$idSifatlar,'type'=>'word','german_content'=>'lecker',   'turkish_content'=>'lezzetli','difficulty'=>2],

            // ─── CÜMLE KARTLARI ──────────────────────────────────────────────────

            // Tanışma cümleleri
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Wie heißen Sie?',                     'turkish_content'=>'Adınız ne?',                           'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Ich heiße Thomas.',                   'turkish_content'=>'Benim adım Thomas.',                   'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Woher kommen Sie?',                   'turkish_content'=>'Nerelisiniz?',                         'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Ich komme aus der Türkei.',           'turkish_content'=>'Ben Türkiye\'den geliyorum.',           'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Wie geht es Ihnen?',                  'turkish_content'=>'Nasılsınız?',                          'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Mir geht es gut, danke.',             'turkish_content'=>'İyiyim, teşekkür ederim.',             'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Ich bin 25 Jahre alt.',               'turkish_content'=>'25 yaşındayım.',                       'difficulty'=>1],
            ['lesson_id'=>$idTanisma,'type'=>'sentence','german_content'=>'Ich spreche ein bisschen Deutsch.',   'turkish_content'=>'Biraz Almanca konuşuyorum.',           'difficulty'=>2],

            // Alışveriş / Restoran cümleleri
            ['lesson_id'=>$idYiyecek,'type'=>'sentence','german_content'=>'Was kostet das?',                 'turkish_content'=>'Bu ne kadar?',                    'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'sentence','german_content'=>'Ich möchte das kaufen.',          'turkish_content'=>'Bunu satın almak istiyorum.',      'difficulty'=>2],
            ['lesson_id'=>$idYiyecek,'type'=>'sentence','german_content'=>'Die Rechnung bitte!',             'turkish_content'=>'Hesabı alabilir miyim!',           'difficulty'=>1],
            ['lesson_id'=>$idYiyecek,'type'=>'sentence','german_content'=>'Ich hätte gern einen Kaffee.',    'turkish_content'=>'Bir kahve alırdım.',               'difficulty'=>2],
            ['lesson_id'=>$idYiyecek,'type'=>'sentence','german_content'=>'Das schmeckt sehr gut!',          'turkish_content'=>'Bu çok lezzetli!',                 'difficulty'=>2],

            // Modal fiil cümleleri
            ['lesson_id'=>$idModal,'type'=>'sentence','german_content'=>'Ich möchte Deutsch lernen.',        'turkish_content'=>'Almanca öğrenmek istiyorum.',      'difficulty'=>2],
            ['lesson_id'=>$idModal,'type'=>'sentence','german_content'=>'Können Sie das wiederholen?',       'turkish_content'=>'Tekrar edebilir misiniz?',         'difficulty'=>3],
            ['lesson_id'=>$idModal,'type'=>'sentence','german_content'=>'Ich muss zur Arbeit gehen.',        'turkish_content'=>'İşe gitmek zorundayım.',           'difficulty'=>2],
            ['lesson_id'=>$idModal,'type'=>'sentence','german_content'=>'Darf ich hier sitzen?',             'turkish_content'=>'Buraya oturabilir miyim?',         'difficulty'=>2],

            // Günlük hayat cümleleri
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Heute ist Montag.',                          'turkish_content'=>'Bugün Pazartesi.',                'difficulty'=>1],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Das Wetter ist schön heute.',                'turkish_content'=>'Bugün hava güzel.',               'difficulty'=>1],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Ich lerne jeden Tag Deutsch.',               'turkish_content'=>'Her gün Almanca öğreniyorum.',    'difficulty'=>2],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Ich stehe um 7 Uhr auf.',                    'turkish_content'=>'Saat 7\'de kalkıyorum.',          'difficulty'=>2],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Ich fahre mit dem Bus zur Arbeit.',          'turkish_content'=>'İşe otobüsle gidiyorum.',         'difficulty'=>2],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Ich verstehe das nicht.',                   'turkish_content'=>'Bunu anlamıyorum.',               'difficulty'=>2],
            ['lesson_id'=>$idGunlukHayat,'type'=>'sentence','german_content'=>'Wie bitte?',                                 'turkish_content'=>'Efendim? / Tekrar eder misiniz?', 'difficulty'=>1],

            // Yön tarifi
            ['lesson_id'=>$idGrammar,'type'=>'sentence','german_content'=>'Wo ist der Bahnhof?',             'turkish_content'=>'İstasyon nerede?',                'difficulty'=>1],
            ['lesson_id'=>$idGrammar,'type'=>'sentence','german_content'=>'Gehen Sie geradeaus.',            'turkish_content'=>'Düz gidin.',                      'difficulty'=>1],
            ['lesson_id'=>$idGrammar,'type'=>'sentence','german_content'=>'Biegen Sie rechts ab.',           'turkish_content'=>'Sağa dönün.',                     'difficulty'=>2],
            ['lesson_id'=>$idGrammar,'type'=>'sentence','german_content'=>'Das ist eine gute Idee.',         'turkish_content'=>'Bu iyi bir fikir.',               'difficulty'=>2],
            ['lesson_id'=>$idGrammar,'type'=>'sentence','german_content'=>'Ich freue mich, Sie kennenzulernen.','turkish_content'=>'Sizi tanımaktan memnun oldum.','difficulty'=>3],
        ];

        $count = 0;
        foreach ($cards as $i => $card) {
            Card::firstOrCreate(
                [
                    'german_content' => $card['german_content'],
                    'type'           => $card['type'],
                ],
                [
                    'turkish_content' => $card['turkish_content'],
                    'difficulty'      => $card['difficulty'],
                    'lesson_id'       => $card['lesson_id'],
                    'is_active'       => true,
                    'order_index'     => $i + 1,
                ]
            );
            $count++;
        }

        $this->command->info("✅ {$count} kart başarıyla oluşturuldu.");

        // Hangi derse kaç kart gittiğini göster
        $grouped = collect($cards)->groupBy('lesson_id');
        foreach ($grouped as $lid => $group) {
            $title = Lesson::find($lid)?->lesson_title ?? "ID:{$lid}";
            $this->command->info("  → {$title}: " . count($group) . " kart");
        }
    }
}
