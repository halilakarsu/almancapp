
$lessonId = 8; // Kendini Tanıtma dersi

$data = [
    ['tr' => 'Merhaba', 'de' => 'Guten Tag'],
    ['tr' => 'Selam', 'de' => 'Grüß dich'],
    ['tr' => 'Hoşgeldiniz.', 'de' => 'Willkommen.'],
    ['tr' => 'Günaydın.', 'de' => 'Guten Morgen.'],
    ['tr' => 'İyi akşamlar.', 'de' => 'Guten Abend'],
    ['tr' => 'İyi geceler.', 'de' => 'Gute Nacht.'],
    ['tr' => 'Nasılsınız?', 'de' => 'Wie geht es Ihnen?'],
    ['tr' => 'İyiyim, tesekkür ederim.', 'de' => 'Danke, gut.'],
    ['tr' => 'Nasıl gidiyor?', 'de' => 'Wie geht’s, wie steht’s?'],
    ['tr' => 'Söyle, böyle.', 'de' => 'Es geht.'],
    ['tr' => 'Fena değil.', 'de' => 'Nicht schlecht.'],
    ['tr' => 'Benim Adım Ahmet Yıldırım.', 'de' => 'Ich heiße Ahmet Yildirim.'],
    ['tr' => 'Sizin adınız nedir?', 'de' => 'Wie heißen Sie?'],
    ['tr' => 'Nerelisiniz?', 'de' => 'Woher kommen Sie?'],
    ['tr' => 'Türkiye’liyim.', 'de' => 'Ich komme aus der Türkei.'],
    ['tr' => 'Öğrenci misiniz?', 'de' => 'Sind Sie Student?'],
    ['tr' => 'Evet, ben Yıldız Ünversitesinde okuyorum.', 'de' => 'Ja, ich bin Student auf der Yildiz Universität.'],
    ['tr' => 'Çalışıyor musunuz?', 'de' => 'Arbeiten Sie?'],
    ['tr' => 'Evet, bir şirkette bilgisayar programcılığı yapıyorum.', 'de' => 'Ja, ich bin Programmierer von Computern in einer Firma']
];

$maxIndex = Content::where('lesson_id', $lessonId)->max('order_index') ?? 0;

foreach ($data as $item) {
    $maxIndex++;
    \App\Models\Content::create([
        'lesson_id' => $lessonId,
        'content_german' => $item['de'],
        'content_turkish' => $item['tr'],
        'order_index' => $maxIndex,
        'is_active' => true
    ]);
}

echo "Bitti!\n";
