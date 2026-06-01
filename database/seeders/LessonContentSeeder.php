<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonContentSeeder extends Seeder
{
    public function run(): void
    {
        $lessonId = 8; // "Kendini Tanıtma" dersi

        // İçerikler (ifadeler)
        $contents = [
            ['de' => 'Ich heiße Anna.',           'tr' => 'Benim adım Anna.'],
            ['de' => 'Wie heißen Sie?',            'tr' => 'Adınız ne?'],
            ['de' => 'Ich komme aus der Türkei.',  'tr' => 'Türkiye\'den geliyorum.'],
            ['de' => 'Woher kommen Sie?',          'tr' => 'Neredensiniz?'],
            ['de' => 'Ich bin 25 Jahre alt.',      'tr' => '25 yaşındayım.'],
            ['de' => 'Wie alt sind Sie?',          'tr' => 'Kaç yaşındasınız?'],
            ['de' => 'Ich wohne in Berlin.',       'tr' => 'Berlin\'de yaşıyorum.'],
            ['de' => 'Ich spreche ein bisschen Deutsch.', 'tr' => 'Biraz Almanca konuşuyorum.'],
            ['de' => 'Freut mich!',                'tr' => 'Tanıştığıma memnun oldum!'],
            ['de' => 'Guten Morgen!',              'tr' => 'Günaydın!'],
            ['de' => 'Guten Tag!',                 'tr' => 'İyi günler!'],
            ['de' => 'Guten Abend!',               'tr' => 'İyi akşamlar!'],
            ['de' => 'Auf Wiedersehen!',            'tr' => 'Görüşürüz! (resmi)'],
            ['de' => 'Tschüss!',                   'tr' => 'Hoşça kal! (samimi)'],
            ['de' => 'Bitte.',                     'tr' => 'Lütfen / Rica ederim.'],
            ['de' => 'Danke schön!',               'tr' => 'Çok teşekkür ederim!'],
            ['de' => 'Entschuldigung!',            'tr' => 'Özür dilerim! / Pardon!'],
            ['de' => 'Ich verstehe nicht.',        'tr' => 'Anlamıyorum.'],
            ['de' => 'Können Sie langsamer sprechen?', 'tr' => 'Daha yavaş konuşabilir misiniz?'],
            ['de' => 'Ich bin Lehrer.',            'tr' => 'Ben öğretmenim.'],
        ];

        // Kelimeler
        $words = [
            ['de' => 'der Name',      'tr' => 'isim, ad'],
            ['de' => 'das Alter',     'tr' => 'yaş'],
            ['de' => 'die Sprache',   'tr' => 'dil'],
            ['de' => 'das Land',      'tr' => 'ülke'],
            ['de' => 'die Stadt',     'tr' => 'şehir'],
            ['de' => 'der Beruf',     'tr' => 'meslek'],
            ['de' => 'die Familie',   'tr' => 'aile'],
            ['de' => 'der Freund',    'tr' => 'erkek arkadaş / dost'],
            ['de' => 'die Freundin',  'tr' => 'kız arkadaş / dost (k)'],
            ['de' => 'wohnen',        'tr' => 'yaşamak, ikamet etmek'],
            ['de' => 'sprechen',      'tr' => 'konuşmak'],
            ['de' => 'kommen',        'tr' => 'gelmek'],
            ['de' => 'heißen',        'tr' => 'adı olmak'],
            ['de' => 'sein',          'tr' => 'olmak (is/am/are)'],
            ['de' => 'arbeiten',      'tr' => 'çalışmak'],
        ];

        // Önce eskiyi temizle
        DB::table('contents')->where('lesson_id', $lessonId)->delete();
        DB::table('words')->where('lesson_id', $lessonId)->delete();

        // Contents ekle
        foreach ($contents as $i => $c) {
            DB::table('contents')->insert([
                'lesson_id'       => $lessonId,
                'content_german'  => $c['de'],
                'content_turkish' => $c['tr'],
                'order_index'     => $i,
                'is_active'       => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }

        // Words ekle
        foreach ($words as $i => $w) {
            DB::table('words')->insert([
                'lesson_id'    => $lessonId,
                'word_german'  => $w['de'],
                'word_turkish' => $w['tr'],
                'order_index'  => $i,
                'is_active'    => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        $this->command->info('✅ ' . count($contents) . ' içerik ve ' . count($words) . ' kelime eklendi.');
    }
}
