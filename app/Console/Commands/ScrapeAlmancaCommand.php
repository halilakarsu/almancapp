<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeAlmancaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-almanca-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting scraping process...');
        
        $level = \App\Models\Level::firstOrCreate(
            ['level_title' => 'A1'],
            ['is_active' => true, 'order_index' => 1]
        );

        $pages = [
            ['title' => 'Almanca Aylar', 'url' => 'https://www.limasollunaci.com/almanca-aylar-monate', 'type' => 'word', 'cols' => ['de' => 0, 'tr' => 2]],
            ['title' => 'Almanca Günler', 'url' => 'https://www.limasollunaci.com/almanca-gunler-wochentage', 'type' => 'word', 'cols' => ['de' => 0, 'tr' => 2]],
            ['title' => 'Almanca Sayılar', 'url' => 'https://www.limasollunaci.com/almanca-sayilar-zahlen', 'type' => 'word', 'cols' => ['de' => 1, 'tr' => 0]],
            ['title' => 'Almanca Mevsimler', 'url' => 'https://www.limasollunaci.com/almanca-mevsimler-jahreszeiten', 'type' => 'word', 'cols' => ['de' => 0, 'tr' => 2]],
            ['title' => 'Almanca Renkler', 'url' => 'https://www.limasollunaci.com/almanca-renkler-farben', 'type' => 'word', 'cols' => ['de' => 0, 'tr' => 2]],
            ['title' => 'Almanca Şahıs Zamirleri', 'url' => 'https://www.limasollunaci.com/almanca-gramer-sahis-zamirleri-personel-pronomen', 'type' => 'word', 'cols' => ['de' => 0, 'tr' => 1]],
            ['title' => 'Sık Kullanılan 1000 Kelime', 'url' => 'https://www.limasollunaci.com/almanca-kelimeler-en-cok-kullanilan-1000-kelime-ve-cumle', 'type' => 'word', 'cols' => ['de' => 1, 'tr' => 2]]
        ];

        foreach ($pages as $index => $page) {
            $this->info("Scraping: {$page['title']}");
            
            $lesson = \App\Models\Lesson::firstOrCreate(
                ['lesson_title' => $page['title']],
                ['level_id' => $level->id, 'order_index' => ($index + 10), 'is_active' => true]
            );

            $html = @file_get_contents($page['url']);
            if (!$html) {
                $this->error("Failed to load URL: {$page['url']}");
                continue;
            }

            $dom = new \DOMDocument();
            @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
            $xpath = new \DOMXPath($dom);
            
            $rows = $xpath->query("//table//tr");
            if ($rows->length == 0) {
                $this->warn("No tables found.");
                continue;
            }

            $addedCount = 0;
            foreach ($rows as $row) {
                $cells = $xpath->query(".//td", $row);
                
                if ($cells->length <= max($page['cols']['de'], $page['cols']['tr'])) {
                    continue;
                }

                $deText = trim($cells->item($page['cols']['de'])->nodeValue);
                $trText = trim($cells->item($page['cols']['tr'])->nodeValue);

                if (empty($deText) || empty($trText) || stripos($deText, 'Yazılışı') !== false || stripos($deText, 'German') !== false || stripos($deText, 'Okunuşu') !== false) {
                    continue;
                }
                
                if ($page['type'] === 'word') {
                    \App\Models\Word::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'word_german' => $deText],
                        ['word_turkish' => $trText, 'is_active' => true, 'order_index' => $addedCount]
                    );
                } else {
                    \App\Models\Content::firstOrCreate(
                        ['lesson_id' => $lesson->id, 'content_german' => $deText],
                        ['content_turkish' => $trText, 'is_active' => true, 'order_index' => $addedCount]
                    );
                }
                $addedCount++;
            }
            $this->info("Added {$addedCount} items to {$page['title']}.");
        }
        $this->info('All scraping tasks completed!');
    }
}
