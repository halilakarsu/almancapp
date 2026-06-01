-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Nis 2026, 11:09:31
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `almingo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `condition_type` varchar(255) DEFAULT NULL,
  `condition_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `badges`
--

INSERT INTO `badges` (`id`, `name`, `description`, `icon`, `condition_type`, `condition_value`, `created_at`, `updated_at`) VALUES
(1, 'İlk Adım', 'İlk dersini başarıyla tamamladın!', 'badge1.png', NULL, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 'XP Avcısı', '500 XP barajını aştın!', 'badge2.png', NULL, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 'Bilge', '5 farklı dersi devirdin.', 'badge3.png', NULL, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `badge_user`
--

CREATE TABLE `badge_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` bigint(20) UNSIGNED NOT NULL,
  `earned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('almancaapp-cache-admin@admin.com|127.0.0.1', 'i:2;', 1776276504),
('almancaapp-cache-admin@admin.com|127.0.0.1:timer', 'i:1776276504;', 1776276504),
('almancaapp-cache-admin@hotmail.com|127.0.0.1', 'i:1;', 1776277582),
('almancaapp-cache-admin@hotmail.com|127.0.0.1:timer', 'i:1776277582;', 1776277582),
('almancaapp-cache-student@almingo.com|127.0.0.1', 'i:1;', 1776275951),
('almancaapp-cache-student@almingo.com|127.0.0.1:timer', 'i:1776275951;', 1776275951),
('laravel-cache-admin@admin.com|127.0.0.1', 'i:1;', 1776114951),
('laravel-cache-admin@admin.com|127.0.0.1:timer', 'i:1776114951;', 1776114951);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `level` enum('A1','A2','B1','B2','C1') NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `order_index` int(11) NOT NULL DEFAULT 0,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `description`, `level`, `is_published`, `order_index`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Almanca Alfabe ve Telaffuz', 'almanca-alfabe-ve-telaffuz', 'Harfler, özel karakterler (ö, ü, ä, ß) ve telaffuz kuralları.', 'A1', 1, 1, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 'Selamlaşma ve Vedalaşma', 'selamlasma-ve-vedalasma', 'Günlük pratik selamlaşma kalıpları.', 'A1', 1, 2, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 'Sayılar ve Saatler', 'sayilar-ve-saatler', '0-100 arası sayılar ve saati sorma/söyleme.', 'A1', 1, 3, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 'Aile ve Akrabalar', 'aile-ve-akrabalar', 'Aile bireylerini tanıtma ve iyelik zamirleri.', 'A1', 1, 4, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 'Renkler ve Nesneler', 'renkler-ve-nesneler', 'Etrafımızdaki nesneler ve renk uyumları.', 'A1', 1, 5, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 'Restoranda Sipariş', 'restoranda-siparis', 'Yemek siparişi verme ve hesap isteme diyalogları.', 'A2', 1, 6, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 'Geçmiş Zaman (Perfekt)', 'gecmis-zaman-perfekt', 'Dün ne yaptığını anlatma kuralları.', 'A2', 1, 7, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 'Vücudumuz ve Sağlık', 'vucudumuz-ve-saglik', 'Doktor randevusu ve şikayet belirtme.', 'A2', 1, 8, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 'Şehir Gezisi ve Yol Tarifi', 'sehir-gezisi-ve-yol-tarifi', 'Yön sorma ve toplu taşıma kullanımı.', 'A2', 1, 9, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 'Alışveriş Dünyası', 'alisveris-dunyasi', 'Kıyafetler, fiyatlar ve mağaza diyalogları.', 'A2', 1, 10, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 'İş Hayatı ve Mülakatlar', 'is-hayati-ve-mulakatlar', 'CV hazırlama ve profesyonel görüşmeler.', 'B1', 1, 11, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 'Çevre ve Doğayı Koruma', 'cevre-ve-dogayi-koruma', 'İklim değişikliği ve geri dönüşüm tartışmaları.', 'B1', 1, 12, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(13, 'Alman Kültürü ve Bayramlar', 'alman-kulturu-ve-bayramlar', 'Önemli günler, gelenekler ve festivaller.', 'B1', 1, 13, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(14, 'Teknoloji ve Sosyal Medya', 'teknoloji-ve-sosyal-medya', 'Dijital dünyanın avantajları ve dezavantajları.', 'B1', 1, 14, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(15, 'Seyahat Planlama', 'seyahat-planlama', 'Otel rezervasyonu ve tatil türleri.', 'B1', 1, 15, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(16, 'Akademik Almanca Giriş', 'akademik-almanca-giris', 'Üniversite hayatı ve makale okuma teknikleri.', 'B2', 1, 16, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(17, 'Siyaset ve Toplum', 'siyaset-ve-toplum', 'Güncel haberleri analiz etme ve tartışma.', 'B2', 1, 17, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(18, 'Edebiyat ve Sanat', 'edebiyat-ve-sanat', 'Klasik Alman yazarlarından örnek metinler.', 'B2', 1, 18, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(19, 'Ekonomi ve Finans', 'ekonomi-ve-finans', 'Piyasa terimleri ve ekonomik yorumlar.', 'B2', 1, 19, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(20, 'Hukuk ve Haklar', 'hukuk-ve-haklar', 'Temel haklar ve hukuki süreçler hakkında bilgilendirme.', 'B2', 1, 20, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(21, 'İleri Düzey Retorik', 'ileri-duzey-retorik', 'Topluluk önünde konuşma ve ikna teknikleri.', 'C1', 1, 21, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(22, 'Felsefi Metin Analizi', 'felsefi-metin-analizi', 'Kant ve Nietzsche\'den seçme pasajlar.', 'C1', 1, 22, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(23, 'Bilimsel Araştırma Yöntemleri', 'bilimsel-arastirma-yontemleri', 'Tez yazım kuralları ve kaynakça kullanımı.', 'C1', 1, 23, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(24, 'Karmaşık Dilbilgisi Yapıları', 'karmasik-dilbilgisi-yapilari', 'Pasif yapılar ve yan cümlelerin ileri düzey kullanımı.', 'C1', 1, 24, NULL, '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `enrolled_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `enrolled_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 2, 17, NULL, NULL, '2026-04-13 18:20:18', '2026-04-13 18:20:18'),
(2, 2, 2, NULL, NULL, '2026-04-13 18:22:45', '2026-04-13 18:22:45'),
(3, 2, 1, NULL, NULL, '2026-04-13 18:26:38', '2026-04-13 18:26:38'),
(4, 2, 18, NULL, NULL, '2026-04-13 18:33:34', '2026-04-13 18:33:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `type` enum('reading','video','exercise') NOT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `order_index` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `title`, `slug`, `content`, `type`, `duration_minutes`, `order_index`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 1, 'A1 - Almanca Alfabe ve Telaffuz (Ders 1)', 'almanca-alfabe-ve-telaffuz-lesson-1-69dd5cb167408', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Almanca Alfabe ve Telaffuz - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Almanca Alfabe ve Telaffuz</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 1, 'A1 - Almanca Alfabe ve Telaffuz (Ders 2)', 'almanca-alfabe-ve-telaffuz-lesson-2-69dd5cb174967', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Almanca Alfabe ve Telaffuz - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Almanca Alfabe ve Telaffuz</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 1, 'A1 - Almanca Alfabe ve Telaffuz (Ders 3)', 'almanca-alfabe-ve-telaffuz-lesson-3-69dd5cb17bc78', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Almanca Alfabe ve Telaffuz - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Almanca Alfabe ve Telaffuz</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 2, 'A1 - Selamlaşma ve Vedalaşma (Ders 1)', 'selamlasma-ve-vedalasma-lesson-1-69dd5cb181da1', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Selamlaşma ve Vedalaşma - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Selamlaşma ve Vedalaşma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 2, 'A1 - Selamlaşma ve Vedalaşma (Ders 2)', 'selamlasma-ve-vedalasma-lesson-2-69dd5cb1871ea', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Selamlaşma ve Vedalaşma - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Selamlaşma ve Vedalaşma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 2, 'A1 - Selamlaşma ve Vedalaşma (Ders 3)', 'selamlasma-ve-vedalasma-lesson-3-69dd5cb18cd92', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Selamlaşma ve Vedalaşma - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Selamlaşma ve Vedalaşma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 3, 'A1 - Sayılar ve Saatler (Ders 1)', 'sayilar-ve-saatler-lesson-1-69dd5cb19350a', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Sayılar ve Saatler - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Sayılar ve Saatler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 3, 'A1 - Sayılar ve Saatler (Ders 2)', 'sayilar-ve-saatler-lesson-2-69dd5cb197401', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Sayılar ve Saatler - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Sayılar ve Saatler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 3, 'A1 - Sayılar ve Saatler (Ders 3)', 'sayilar-ve-saatler-lesson-3-69dd5cb19b27c', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Sayılar ve Saatler - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Sayılar ve Saatler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 4, 'A1 - Aile ve Akrabalar (Ders 1)', 'aile-ve-akrabalar-lesson-1-69dd5cb1a06c9', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Aile ve Akrabalar - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Aile ve Akrabalar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 4, 'A1 - Aile ve Akrabalar (Ders 2)', 'aile-ve-akrabalar-lesson-2-69dd5cb1a5634', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Aile ve Akrabalar - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Aile ve Akrabalar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 4, 'A1 - Aile ve Akrabalar (Ders 3)', 'aile-ve-akrabalar-lesson-3-69dd5cb1aa09b', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Aile ve Akrabalar - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Aile ve Akrabalar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(13, 5, 'A1 - Renkler ve Nesneler (Ders 1)', 'renkler-ve-nesneler-lesson-1-69dd5cb1ae368', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Renkler ve Nesneler - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Renkler ve Nesneler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(14, 5, 'A1 - Renkler ve Nesneler (Ders 2)', 'renkler-ve-nesneler-lesson-2-69dd5cb1b2307', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Renkler ve Nesneler - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Renkler ve Nesneler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(15, 5, 'A1 - Renkler ve Nesneler (Ders 3)', 'renkler-ve-nesneler-lesson-3-69dd5cb1b5ddb', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Renkler ve Nesneler - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Renkler ve Nesneler</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(16, 6, 'A2 - Restoranda Sipariş (Ders 1)', 'restoranda-siparis-lesson-1-69dd5cb1bae47', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Restoranda Sipariş - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Restoranda Sipariş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(17, 6, 'A2 - Restoranda Sipariş (Ders 2)', 'restoranda-siparis-lesson-2-69dd5cb1bfdd3', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Restoranda Sipariş - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Restoranda Sipariş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(18, 6, 'A2 - Restoranda Sipariş (Ders 3)', 'restoranda-siparis-lesson-3-69dd5cb1c49fe', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Restoranda Sipariş - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Restoranda Sipariş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(19, 7, 'A2 - Geçmiş Zaman (Perfekt) (Ders 1)', 'gecmis-zaman-perfekt-lesson-1-69dd5cb1c8ecc', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Geçmiş Zaman (Perfekt) - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Geçmiş Zaman (Perfekt)</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(20, 7, 'A2 - Geçmiş Zaman (Perfekt) (Ders 2)', 'gecmis-zaman-perfekt-lesson-2-69dd5cb1cc9d3', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Geçmiş Zaman (Perfekt) - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Geçmiş Zaman (Perfekt)</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(21, 7, 'A2 - Geçmiş Zaman (Perfekt) (Ders 3)', 'gecmis-zaman-perfekt-lesson-3-69dd5cb1d02cc', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Geçmiş Zaman (Perfekt) - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Geçmiş Zaman (Perfekt)</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(22, 8, 'A2 - Vücudumuz ve Sağlık (Ders 1)', 'vucudumuz-ve-saglik-lesson-1-69dd5cb1d3417', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Vücudumuz ve Sağlık - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Vücudumuz ve Sağlık</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(23, 8, 'A2 - Vücudumuz ve Sağlık (Ders 2)', 'vucudumuz-ve-saglik-lesson-2-69dd5cb1d64a1', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Vücudumuz ve Sağlık - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Vücudumuz ve Sağlık</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(24, 8, 'A2 - Vücudumuz ve Sağlık (Ders 3)', 'vucudumuz-ve-saglik-lesson-3-69dd5cb1d91cc', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Vücudumuz ve Sağlık - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Vücudumuz ve Sağlık</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(25, 9, 'A2 - Şehir Gezisi ve Yol Tarifi (Ders 1)', 'sehir-gezisi-ve-yol-tarifi-lesson-1-69dd5cb1dc31d', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Şehir Gezisi ve Yol Tarifi - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Şehir Gezisi ve Yol Tarifi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(26, 9, 'A2 - Şehir Gezisi ve Yol Tarifi (Ders 2)', 'sehir-gezisi-ve-yol-tarifi-lesson-2-69dd5cb1df006', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Şehir Gezisi ve Yol Tarifi - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Şehir Gezisi ve Yol Tarifi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(27, 9, 'A2 - Şehir Gezisi ve Yol Tarifi (Ders 3)', 'sehir-gezisi-ve-yol-tarifi-lesson-3-69dd5cb1e1ff2', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Şehir Gezisi ve Yol Tarifi - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Şehir Gezisi ve Yol Tarifi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(28, 10, 'A2 - Alışveriş Dünyası (Ders 1)', 'alisveris-dunyasi-lesson-1-69dd5cb1e6a1a', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alışveriş Dünyası - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alışveriş Dünyası</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(29, 10, 'A2 - Alışveriş Dünyası (Ders 2)', 'alisveris-dunyasi-lesson-2-69dd5cb1eafd0', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alışveriş Dünyası - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alışveriş Dünyası</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(30, 10, 'A2 - Alışveriş Dünyası (Ders 3)', 'alisveris-dunyasi-lesson-3-69dd5cb1eead1', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alışveriş Dünyası - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alışveriş Dünyası</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(31, 11, 'B1 - İş Hayatı ve Mülakatlar (Ders 1)', 'is-hayati-ve-mulakatlar-lesson-1-69dd5cb1f2220', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İş Hayatı ve Mülakatlar - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İş Hayatı ve Mülakatlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(32, 11, 'B1 - İş Hayatı ve Mülakatlar (Ders 2)', 'is-hayati-ve-mulakatlar-lesson-2-69dd5cb200eb3', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İş Hayatı ve Mülakatlar - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İş Hayatı ve Mülakatlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26');
INSERT INTO `lessons` (`id`, `course_id`, `title`, `slug`, `content`, `type`, `duration_minutes`, `order_index`, `is_published`, `created_at`, `updated_at`) VALUES
(33, 11, 'B1 - İş Hayatı ve Mülakatlar (Ders 3)', 'is-hayati-ve-mulakatlar-lesson-3-69dd5cb203b13', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İş Hayatı ve Mülakatlar - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İş Hayatı ve Mülakatlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(34, 12, 'B1 - Çevre ve Doğayı Koruma (Ders 1)', 'cevre-ve-dogayi-koruma-lesson-1-69dd5cb206bfd', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Çevre ve Doğayı Koruma - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Çevre ve Doğayı Koruma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(35, 12, 'B1 - Çevre ve Doğayı Koruma (Ders 2)', 'cevre-ve-dogayi-koruma-lesson-2-69dd5cb209968', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Çevre ve Doğayı Koruma - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Çevre ve Doğayı Koruma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(36, 12, 'B1 - Çevre ve Doğayı Koruma (Ders 3)', 'cevre-ve-dogayi-koruma-lesson-3-69dd5cb20c674', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Çevre ve Doğayı Koruma - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Çevre ve Doğayı Koruma</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(37, 13, 'B1 - Alman Kültürü ve Bayramlar (Ders 1)', 'alman-kulturu-ve-bayramlar-lesson-1-69dd5cb20f8e7', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alman Kültürü ve Bayramlar - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alman Kültürü ve Bayramlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(38, 13, 'B1 - Alman Kültürü ve Bayramlar (Ders 2)', 'alman-kulturu-ve-bayramlar-lesson-2-69dd5cb2127b6', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alman Kültürü ve Bayramlar - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alman Kültürü ve Bayramlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(39, 13, 'B1 - Alman Kültürü ve Bayramlar (Ders 3)', 'alman-kulturu-ve-bayramlar-lesson-3-69dd5cb215d07', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Alman Kültürü ve Bayramlar - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Alman Kültürü ve Bayramlar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(40, 14, 'B1 - Teknoloji ve Sosyal Medya (Ders 1)', 'teknoloji-ve-sosyal-medya-lesson-1-69dd5cb21aa9c', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Teknoloji ve Sosyal Medya - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Teknoloji ve Sosyal Medya</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(41, 14, 'B1 - Teknoloji ve Sosyal Medya (Ders 2)', 'teknoloji-ve-sosyal-medya-lesson-2-69dd5cb21f818', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Teknoloji ve Sosyal Medya - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Teknoloji ve Sosyal Medya</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(42, 14, 'B1 - Teknoloji ve Sosyal Medya (Ders 3)', 'teknoloji-ve-sosyal-medya-lesson-3-69dd5cb223ef4', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Teknoloji ve Sosyal Medya - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Teknoloji ve Sosyal Medya</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(43, 15, 'B1 - Seyahat Planlama (Ders 1)', 'seyahat-planlama-lesson-1-69dd5cb228044', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Seyahat Planlama - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Seyahat Planlama</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(44, 15, 'B1 - Seyahat Planlama (Ders 2)', 'seyahat-planlama-lesson-2-69dd5cb22bbd1', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Seyahat Planlama - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Seyahat Planlama</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(45, 15, 'B1 - Seyahat Planlama (Ders 3)', 'seyahat-planlama-lesson-3-69dd5cb22fcfe', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Seyahat Planlama - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Seyahat Planlama</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(46, 16, 'B2 - Akademik Almanca Giriş (Ders 1)', 'akademik-almanca-giris-lesson-1-69dd5cb233f23', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Akademik Almanca Giriş - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Akademik Almanca Giriş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(47, 16, 'B2 - Akademik Almanca Giriş (Ders 2)', 'akademik-almanca-giris-lesson-2-69dd5cb237dac', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Akademik Almanca Giriş - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Akademik Almanca Giriş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(48, 16, 'B2 - Akademik Almanca Giriş (Ders 3)', 'akademik-almanca-giris-lesson-3-69dd5cb23bbe2', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Akademik Almanca Giriş - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Akademik Almanca Giriş</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(49, 17, 'B2 - Siyaset ve Toplum (Ders 1)', 'siyaset-ve-toplum-lesson-1-69dd5cb2400d2', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Siyaset ve Toplum - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Siyaset ve Toplum</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(50, 17, 'B2 - Siyaset ve Toplum (Ders 2)', 'siyaset-ve-toplum-lesson-2-69dd5cb244cfc', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Siyaset ve Toplum - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Siyaset ve Toplum</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(51, 17, 'B2 - Siyaset ve Toplum (Ders 3)', 'siyaset-ve-toplum-lesson-3-69dd5cb24955a', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Siyaset ve Toplum - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Siyaset ve Toplum</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(52, 18, 'B2 - Edebiyat ve Sanat (Ders 1)', 'edebiyat-ve-sanat-lesson-1-69dd5cb24e38b', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Edebiyat ve Sanat - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Edebiyat ve Sanat</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(53, 18, 'B2 - Edebiyat ve Sanat (Ders 2)', 'edebiyat-ve-sanat-lesson-2-69dd5cb251e52', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Edebiyat ve Sanat - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Edebiyat ve Sanat</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(54, 18, 'B2 - Edebiyat ve Sanat (Ders 3)', 'edebiyat-ve-sanat-lesson-3-69dd5cb255610', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Edebiyat ve Sanat - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Edebiyat ve Sanat</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(55, 19, 'B2 - Ekonomi ve Finans (Ders 1)', 'ekonomi-ve-finans-lesson-1-69dd5cb2586ea', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Ekonomi ve Finans - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Ekonomi ve Finans</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(56, 19, 'B2 - Ekonomi ve Finans (Ders 2)', 'ekonomi-ve-finans-lesson-2-69dd5cb25b3d3', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Ekonomi ve Finans - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Ekonomi ve Finans</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(57, 19, 'B2 - Ekonomi ve Finans (Ders 3)', 'ekonomi-ve-finans-lesson-3-69dd5cb25e1f2', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Ekonomi ve Finans - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Ekonomi ve Finans</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(58, 20, 'B2 - Hukuk ve Haklar (Ders 1)', 'hukuk-ve-haklar-lesson-1-69dd5cb2623eb', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Hukuk ve Haklar - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Hukuk ve Haklar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(59, 20, 'B2 - Hukuk ve Haklar (Ders 2)', 'hukuk-ve-haklar-lesson-2-69dd5cb266a17', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Hukuk ve Haklar - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Hukuk ve Haklar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(60, 20, 'B2 - Hukuk ve Haklar (Ders 3)', 'hukuk-ve-haklar-lesson-3-69dd5cb26aaa1', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Hukuk ve Haklar - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Hukuk ve Haklar</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(61, 21, 'C1 - İleri Düzey Retorik (Ders 1)', 'ileri-duzey-retorik-lesson-1-69dd5cb26f1fb', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İleri Düzey Retorik - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İleri Düzey Retorik</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(62, 21, 'C1 - İleri Düzey Retorik (Ders 2)', 'ileri-duzey-retorik-lesson-2-69dd5cb272dcd', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İleri Düzey Retorik - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İleri Düzey Retorik</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(63, 21, 'C1 - İleri Düzey Retorik (Ders 3)', 'ileri-duzey-retorik-lesson-3-69dd5cb27d0df', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>İleri Düzey Retorik - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>İleri Düzey Retorik</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(64, 22, 'C1 - Felsefi Metin Analizi (Ders 1)', 'felsefi-metin-analizi-lesson-1-69dd5cb2896cd', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Felsefi Metin Analizi - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Felsefi Metin Analizi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26');
INSERT INTO `lessons` (`id`, `course_id`, `title`, `slug`, `content`, `type`, `duration_minutes`, `order_index`, `is_published`, `created_at`, `updated_at`) VALUES
(65, 22, 'C1 - Felsefi Metin Analizi (Ders 2)', 'felsefi-metin-analizi-lesson-2-69dd5cb28d28a', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Felsefi Metin Analizi - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Felsefi Metin Analizi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(66, 22, 'C1 - Felsefi Metin Analizi (Ders 3)', 'felsefi-metin-analizi-lesson-3-69dd5cb2923bf', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Felsefi Metin Analizi - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Felsefi Metin Analizi</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(67, 23, 'C1 - Bilimsel Araştırma Yöntemleri (Ders 1)', 'bilimsel-arastirma-yontemleri-lesson-1-69dd5cb2b8fe9', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Bilimsel Araştırma Yöntemleri - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Bilimsel Araştırma Yöntemleri</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(68, 23, 'C1 - Bilimsel Araştırma Yöntemleri (Ders 2)', 'bilimsel-arastirma-yontemleri-lesson-2-69dd5cb2c2103', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Bilimsel Araştırma Yöntemleri - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Bilimsel Araştırma Yöntemleri</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(69, 23, 'C1 - Bilimsel Araştırma Yöntemleri (Ders 3)', 'bilimsel-arastirma-yontemleri-lesson-3-69dd5cb2c82d4', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Bilimsel Araştırma Yöntemleri - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Bilimsel Araştırma Yöntemleri</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(70, 24, 'C1 - Karmaşık Dilbilgisi Yapıları (Ders 1)', 'karmasik-dilbilgisi-yapilari-lesson-1-69dd5cb2cde1f', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Karmaşık Dilbilgisi Yapıları - Bölüm 1</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Karmaşık Dilbilgisi Yapıları</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 1, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(71, 24, 'C1 - Karmaşık Dilbilgisi Yapıları (Ders 2)', 'karmasik-dilbilgisi-yapilari-lesson-2-69dd5cb2d2543', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Karmaşık Dilbilgisi Yapıları - Bölüm 2</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Karmaşık Dilbilgisi Yapıları</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 2, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(72, 24, 'C1 - Karmaşık Dilbilgisi Yapıları (Ders 3)', 'karmasik-dilbilgisi-yapilari-lesson-3-69dd5cb2d62ac', '\r\n            <div class=\'prose max-w-none\'>\r\n                <h2 class=\'text-2xl font-black text-indigo-700 mb-4\'>Karmaşık Dilbilgisi Yapıları - Bölüm 3</h2>\r\n                <p class=\'mb-4\'>Bu derste <strong>Karmaşık Dilbilgisi Yapıları</strong> konusunun derinliklerine iniyoruz. Almancada bu konu oldukça kritiktir.</p>\r\n                <div class=\'bg-yellow-50 p-6 rounded-2xl border-l-8 border-yellow-400 mb-6\'>\r\n                    <h4 class=\'font-bold mb-2\'>💡 Önemli İpucu:</h4>\r\n                    <p>Almancada kelimelerin artikellerine (der, die, das) her zaman dikkat etmelisiniz. Bu konuyu öğrenirken kelimeleri artikelleriyle ezberlemek işinizi %50 kolaylaştıracaktır.</p>\r\n                </div>\r\n                <p class=\'mb-4\'>Örnek cümleleri inceleyelim:</p>\r\n                <ul class=\'space-y-2 mb-6\'>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Das ist ein Beispiel. (Bu bir örnektir.)</li>\r\n                    <li class=\'flex items-start gap-2\'><span class=\'text-green-500 font-bold\'>✓</span> Ich lerne Deutsch mit Almingo. (Almingo ile Almanca öğreniyorum.)</li>\r\n                </ul>\r\n                <p>Şimdi aşağıda yer alan kelime listesine göz atın ve ardından teste geçerek bilginizi ölçün!</p>\r\n            </div>\r\n        ', 'reading', 15, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_13_201103_create_courses_table', 1),
(5, '2026_04_13_201104_create_lessons_table', 1),
(6, '2026_04_13_201104_create_quizzes_table', 1),
(7, '2026_04_13_201105_create_questions_table', 1),
(8, '2026_04_13_201105_create_user_progress_table', 1),
(9, '2026_04_13_201106_create_badges_table', 1),
(10, '2026_04_13_201108_create_badge_user_table', 1),
(11, '2026_04_13_201244_create_question_options_table', 1),
(12, '2026_04_13_201244_create_vocabularies_table', 1),
(13, '2026_04_13_201245_create_user_quiz_attempts_table', 1),
(14, '2026_04_13_201246_create_enrollments_table', 1),
(15, '2026_04_13_201246_create_user_quiz_answers_table', 1),
(16, '2026_04_15_184433_create_topics_table', 2),
(17, '2026_04_15_185839_create_words_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `order_index` int(11) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `type`, `order_index`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 2, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 3, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 4, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 5, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 6, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 7, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 8, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 9, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 10, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 11, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 12, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(13, 13, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(14, 14, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(15, 15, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(16, 16, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(17, 17, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(18, 18, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(19, 19, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(20, 20, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(21, 21, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(22, 22, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(23, 23, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(24, 24, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(25, 25, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(26, 26, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(27, 27, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(28, 28, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(29, 29, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(30, 30, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(31, 31, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(32, 32, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(33, 33, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(34, 34, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(35, 35, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(36, 36, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(37, 37, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(38, 38, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(39, 39, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(40, 40, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(41, 41, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(42, 42, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(43, 43, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(44, 44, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(45, 45, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(46, 46, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(47, 47, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(48, 48, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(49, 49, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(50, 50, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(51, 51, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(52, 52, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(53, 53, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(54, 54, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(55, 55, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(56, 56, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(57, 57, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(58, 58, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(59, 59, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(60, 60, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(61, 61, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(62, 62, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(63, 63, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(64, 64, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(65, 65, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(66, 66, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(67, 67, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(68, 68, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(69, 69, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(70, 70, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(71, 71, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(72, 72, 'Hangisi \"Okumak\" anlamına gelir?', 'multiple_choice', 1, 100, '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 1, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 1, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 2, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 2, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 2, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 3, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 3, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 3, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 4, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 4, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 4, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(13, 5, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(14, 5, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(15, 5, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(16, 6, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(17, 6, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(18, 6, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(19, 7, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(20, 7, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(21, 7, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(22, 8, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(23, 8, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(24, 8, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(25, 9, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(26, 9, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(27, 9, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(28, 10, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(29, 10, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(30, 10, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(31, 11, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(32, 11, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(33, 11, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(34, 12, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(35, 12, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(36, 12, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(37, 13, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(38, 13, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(39, 13, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(40, 14, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(41, 14, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(42, 14, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(43, 15, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(44, 15, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(45, 15, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(46, 16, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(47, 16, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(48, 16, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(49, 17, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(50, 17, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(51, 17, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(52, 18, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(53, 18, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(54, 18, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(55, 19, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(56, 19, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(57, 19, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(58, 20, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(59, 20, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(60, 20, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(61, 21, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(62, 21, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(63, 21, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(64, 22, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(65, 22, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(66, 22, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(67, 23, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(68, 23, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(69, 23, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(70, 24, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(71, 24, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(72, 24, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(73, 25, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(74, 25, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(75, 25, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(76, 26, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(77, 26, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(78, 26, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(79, 27, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(80, 27, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(81, 27, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(82, 28, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(83, 28, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(84, 28, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(85, 29, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(86, 29, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(87, 29, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(88, 30, 'Lesen', 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(89, 30, 'Laufen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(90, 30, 'Schlafen', 0, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(91, 31, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(92, 31, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(93, 31, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(94, 32, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(95, 32, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(96, 32, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(97, 33, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(98, 33, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(99, 33, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(100, 34, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(101, 34, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(102, 34, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(103, 35, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(104, 35, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(105, 35, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(106, 36, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(107, 36, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(108, 36, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(109, 37, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(110, 37, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(111, 37, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(112, 38, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(113, 38, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(114, 38, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(115, 39, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(116, 39, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(117, 39, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(118, 40, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(119, 40, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(120, 40, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(121, 41, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(122, 41, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(123, 41, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(124, 42, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(125, 42, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(126, 42, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(127, 43, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(128, 43, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(129, 43, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(130, 44, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(131, 44, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(132, 44, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(133, 45, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(134, 45, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(135, 45, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(136, 46, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(137, 46, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(138, 46, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(139, 47, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(140, 47, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(141, 47, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(142, 48, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(143, 48, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(144, 48, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(145, 49, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(146, 49, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(147, 49, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(148, 50, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(149, 50, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(150, 50, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(151, 51, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(152, 51, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(153, 51, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(154, 52, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(155, 52, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(156, 52, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(157, 53, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(158, 53, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(159, 53, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(160, 54, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(161, 54, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(162, 54, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(163, 55, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(164, 55, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(165, 55, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(166, 56, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(167, 56, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(168, 56, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(169, 57, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(170, 57, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(171, 57, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(172, 58, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(173, 58, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(174, 58, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(175, 59, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(176, 59, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(177, 59, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(178, 60, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(179, 60, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(180, 60, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(181, 61, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(182, 61, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(183, 61, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(184, 62, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(185, 62, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(186, 62, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(187, 63, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(188, 63, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(189, 63, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(190, 64, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(191, 64, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(192, 64, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(193, 65, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(194, 65, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(195, 65, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(196, 66, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(197, 66, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(198, 66, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(199, 67, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(200, 67, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(201, 67, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(202, 68, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(203, 68, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(204, 68, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(205, 69, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(206, 69, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(207, 69, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(208, 70, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(209, 70, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(210, 70, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(211, 71, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(212, 71, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(213, 71, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(214, 72, 'Lesen', 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(215, 72, 'Laufen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(216, 72, 'Schlafen', 0, '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('multiple_choice','fill_blank','matching') NOT NULL,
  `pass_score` int(11) NOT NULL,
  `max_attempts` int(11) DEFAULT NULL,
  `order_index` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `quizzes`
--

INSERT INTO `quizzes` (`id`, `lesson_id`, `title`, `type`, `pass_score`, `max_attempts`, `order_index`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 2, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 3, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 4, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 5, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 6, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 7, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 8, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 9, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 10, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 11, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 12, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(13, 13, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(14, 14, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(15, 15, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(16, 16, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(17, 17, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(18, 18, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(19, 19, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(20, 20, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(21, 21, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(22, 22, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(23, 23, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(24, 24, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(25, 25, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(26, 26, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(27, 27, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(28, 28, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(29, 29, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(30, 30, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(31, 31, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(32, 32, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(33, 33, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(34, 34, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(35, 35, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(36, 36, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(37, 37, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(38, 38, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(39, 39, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(40, 40, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(41, 41, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(42, 42, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(43, 43, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(44, 44, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(45, 45, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(46, 46, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(47, 47, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(48, 48, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(49, 49, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(50, 50, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(51, 51, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(52, 52, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(53, 53, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(54, 54, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(55, 55, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(56, 56, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(57, 57, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(58, 58, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(59, 59, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(60, 60, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(61, 61, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(62, 62, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(63, 63, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(64, 64, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(65, 65, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(66, 66, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(67, 67, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(68, 68, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(69, 69, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(70, 70, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(71, 71, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(72, 72, 'Ders Sonu Değerlendirmesi', 'multiple_choice', 60, 3, 1, '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O1IHselhyHgT2Q3uubCvtXY1DU53er0MtJDLHlpm', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNWVKVmFUUjRGM25CaDZHM0piMUxuQXFMaDVsdjMxUVl3YXFEc1pmRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90b3BpY3MvY3JlYXRlIjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi50b3BpY3MuY3JlYXRlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1776282321),
('wsPMClqKOCDNci19MD5NkQ38uqROrmQS9liXDYPt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRURTdlRpMHJpdUl0MzkyRUMxYmozdnN1MVlTZ2VnQXZKb1pRclZ2VSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1776276573);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') NOT NULL DEFAULT 'student',
  `current_level` enum('A1','A2','B1','B2','C1') DEFAULT NULL,
  `xp_points` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `current_level`, `xp_points`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Almingo Admin', 'admin@almingo.com', NULL, '$2y$12$LMlFJPSszJ1pDUVmr4UUZOqyuyoC0W6o2mz4Nfh4Bjort8muiyyfe', 'admin', 'C1', 0, NULL, '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 'Browser Tester', 'tester@almingo.com', NULL, '$2y$12$KmV9Tx8A7AmA5JQVXolbEepgYbS5SxDwItZe0rm.cAjrkShCIo2q.', 'student', NULL, 0, NULL, '2026-04-13 18:15:32', '2026-04-13 18:15:32'),
(3, 'sea63@hotmail.com', 'sea63@hotmail.com', NULL, '$2y$12$T5v/osYnqjtiuRvTlTRUguz8NzdKYSXoCK41yH1T6sBKPiZKUkmMG', 'student', NULL, 0, NULL, '2026-04-15 15:08:08', '2026-04-15 15:08:08'),
(4, 'Admin', 'admin@almancapp.com', NULL, '$2y$12$hD2G.uvtILqEBNJU3CE3z.S6.1Xc27.1QvABR1EgRJybR6yarYzRS', 'admin', NULL, 0, NULL, '2026-04-15 15:23:56', '2026-04-15 15:32:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_progress`
--

CREATE TABLE `user_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('not_started','in_progress','completed') NOT NULL DEFAULT 'not_started',
  `completed_at` timestamp NULL DEFAULT NULL,
  `time_spent_seconds` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_quiz_answers`
--

CREATE TABLE `user_quiz_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attempt_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `selected_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text_answer` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_quiz_attempts`
--

CREATE TABLE `user_quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) DEFAULT NULL,
  `passed` tinyint(1) NOT NULL DEFAULT 0,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vocabularies`
--

CREATE TABLE `vocabularies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `german_word` varchar(255) NOT NULL,
  `turkish_meaning` varchar(255) NOT NULL,
  `english_meaning` varchar(255) DEFAULT NULL,
  `example_sentence` text DEFAULT NULL,
  `audio_file` varchar(255) DEFAULT NULL,
  `difficulty_level` varchar(255) DEFAULT NULL,
  `word_type` enum('noun','verb','adjective','adverb','pronoun','preposition','conjunction','phrase') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `vocabularies`
--

INSERT INTO `vocabularies` (`id`, `lesson_id`, `german_word`, `turkish_meaning`, `english_meaning`, `example_sentence`, `audio_file`, `difficulty_level`, `word_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(2, 1, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(3, 1, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(4, 1, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(5, 1, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(6, 2, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(7, 2, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(8, 2, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(9, 2, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(10, 2, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(11, 3, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(12, 3, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(13, 3, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(14, 3, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(15, 3, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(16, 4, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(17, 4, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(18, 4, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(19, 4, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(20, 4, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(21, 5, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(22, 5, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(23, 5, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(24, 5, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(25, 5, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(26, 6, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(27, 6, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(28, 6, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(29, 6, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(30, 6, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(31, 7, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(32, 7, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(33, 7, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(34, 7, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(35, 7, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(36, 8, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(37, 8, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(38, 8, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(39, 8, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(40, 8, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(41, 9, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(42, 9, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(43, 9, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(44, 9, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(45, 9, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(46, 10, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(47, 10, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(48, 10, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(49, 10, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(50, 10, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(51, 11, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(52, 11, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(53, 11, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(54, 11, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(55, 11, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(56, 12, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(57, 12, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(58, 12, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(59, 12, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(60, 12, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(61, 13, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(62, 13, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(63, 13, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(64, 13, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(65, 13, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(66, 14, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(67, 14, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(68, 14, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(69, 14, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(70, 14, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(71, 15, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(72, 15, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(73, 15, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(74, 15, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(75, 15, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(76, 16, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(77, 16, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(78, 16, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(79, 16, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(80, 16, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(81, 17, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(82, 17, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(83, 17, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(84, 17, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(85, 17, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(86, 18, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(87, 18, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(88, 18, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(89, 18, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(90, 18, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(91, 19, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(92, 19, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(93, 19, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(94, 19, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(95, 19, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(96, 20, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(97, 20, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(98, 20, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(99, 20, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(100, 20, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(101, 21, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(102, 21, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(103, 21, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(104, 21, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(105, 21, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(106, 22, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(107, 22, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(108, 22, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(109, 22, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(110, 22, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(111, 23, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(112, 23, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(113, 23, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(114, 23, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(115, 23, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(116, 24, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(117, 24, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(118, 24, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(119, 24, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(120, 24, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(121, 25, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(122, 25, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(123, 25, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(124, 25, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(125, 25, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(126, 26, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(127, 26, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(128, 26, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(129, 26, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(130, 26, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(131, 27, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(132, 27, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(133, 27, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(134, 27, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(135, 27, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(136, 28, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(137, 28, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(138, 28, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(139, 28, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(140, 28, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(141, 29, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(142, 29, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(143, 29, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(144, 29, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(145, 29, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(146, 30, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(147, 30, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(148, 30, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(149, 30, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(150, 30, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'A2', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(151, 31, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(152, 31, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(153, 31, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(154, 31, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(155, 31, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:25', '2026-04-13 18:14:25'),
(156, 32, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(157, 32, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(158, 32, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(159, 32, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(160, 32, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(161, 33, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(162, 33, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(163, 33, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(164, 33, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(165, 33, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(166, 34, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(167, 34, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(168, 34, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(169, 34, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(170, 34, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(171, 35, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(172, 35, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(173, 35, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(174, 35, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(175, 35, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(176, 36, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(177, 36, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(178, 36, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(179, 36, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(180, 36, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(181, 37, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(182, 37, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(183, 37, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(184, 37, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(185, 37, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(186, 38, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(187, 38, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(188, 38, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(189, 38, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(190, 38, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(191, 39, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(192, 39, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(193, 39, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(194, 39, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(195, 39, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(196, 40, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(197, 40, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(198, 40, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(199, 40, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(200, 40, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(201, 41, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(202, 41, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(203, 41, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(204, 41, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(205, 41, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(206, 42, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(207, 42, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(208, 42, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(209, 42, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(210, 42, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(211, 43, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(212, 43, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(213, 43, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(214, 43, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(215, 43, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(216, 44, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(217, 44, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(218, 44, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(219, 44, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(220, 44, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(221, 45, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(222, 45, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(223, 45, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(224, 45, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(225, 45, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(226, 46, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(227, 46, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(228, 46, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(229, 46, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(230, 46, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(231, 47, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(232, 47, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(233, 47, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(234, 47, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(235, 47, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(236, 48, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(237, 48, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(238, 48, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(239, 48, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(240, 48, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(241, 49, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(242, 49, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(243, 49, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(244, 49, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(245, 49, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(246, 50, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(247, 50, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(248, 50, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(249, 50, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(250, 50, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(251, 51, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(252, 51, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(253, 51, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(254, 51, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(255, 51, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(256, 52, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(257, 52, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(258, 52, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(259, 52, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(260, 52, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(261, 53, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(262, 53, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(263, 53, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(264, 53, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(265, 53, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(266, 54, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(267, 54, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(268, 54, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(269, 54, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(270, 54, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(271, 55, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(272, 55, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(273, 55, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(274, 55, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(275, 55, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(276, 56, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(277, 56, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(278, 56, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(279, 56, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(280, 56, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(281, 57, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(282, 57, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(283, 57, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(284, 57, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(285, 57, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(286, 58, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(287, 58, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(288, 58, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(289, 58, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(290, 58, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(291, 59, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(292, 59, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(293, 59, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(294, 59, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(295, 59, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(296, 60, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(297, 60, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(298, 60, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(299, 60, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(300, 60, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'B2', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(301, 61, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(302, 61, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(303, 61, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(304, 61, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(305, 61, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(306, 62, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(307, 62, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(308, 62, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(309, 62, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(310, 62, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(311, 63, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(312, 63, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(313, 63, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(314, 63, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(315, 63, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(316, 64, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(317, 64, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(318, 64, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(319, 64, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(320, 64, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(321, 65, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(322, 65, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(323, 65, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(324, 65, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(325, 65, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(326, 66, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(327, 66, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(328, 66, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(329, 66, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(330, 66, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(331, 67, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(332, 67, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(333, 67, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(334, 67, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(335, 67, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(336, 68, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(337, 68, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(338, 68, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(339, 68, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(340, 68, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(341, 69, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(342, 69, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(343, 69, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(344, 69, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(345, 69, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(346, 70, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(347, 70, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(348, 70, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(349, 70, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(350, 70, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(351, 71, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(352, 71, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(353, 71, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(354, 71, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(355, 71, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(356, 72, 'Das Buch', 'Kitap', 'Book', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(357, 72, 'Schreiben', 'Yazmak', 'Write', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(358, 72, 'Lesen', 'Okumak', 'Read', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(359, 72, 'Sprechen', 'Konuşmak', 'Speak', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26'),
(360, 72, 'Arbeiten', 'Çalışmak', 'Work', NULL, NULL, 'C1', 'noun', '2026-04-13 18:14:26', '2026-04-13 18:14:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `words`
--

CREATE TABLE `words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `german_word` varchar(255) NOT NULL,
  `turkish_meaning` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `badge_user`
--
ALTER TABLE `badge_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `badge_user_user_id_foreign` (`user_id`),
  ADD KEY `badge_user_badge_id_foreign` (`badge_id`);

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`);

--
-- Tablo için indeksler `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessons_slug_unique` (`slug`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Tablo için indeksler `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Tablo için indeksler `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_lesson_id_foreign` (`lesson_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_progress_user_id_foreign` (`user_id`),
  ADD KEY `user_progress_lesson_id_foreign` (`lesson_id`);

--
-- Tablo için indeksler `user_quiz_answers`
--
ALTER TABLE `user_quiz_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_quiz_answers_attempt_id_foreign` (`attempt_id`),
  ADD KEY `user_quiz_answers_question_id_foreign` (`question_id`),
  ADD KEY `user_quiz_answers_selected_option_id_foreign` (`selected_option_id`);

--
-- Tablo için indeksler `user_quiz_attempts`
--
ALTER TABLE `user_quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_quiz_attempts_user_id_foreign` (`user_id`),
  ADD KEY `user_quiz_attempts_quiz_id_foreign` (`quiz_id`);

--
-- Tablo için indeksler `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vocabularies_lesson_id_foreign` (`lesson_id`);

--
-- Tablo için indeksler `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `badge_user`
--
ALTER TABLE `badge_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- Tablo için AUTO_INCREMENT değeri `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user_quiz_answers`
--
ALTER TABLE `user_quiz_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user_quiz_attempts`
--
ALTER TABLE `user_quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `vocabularies`
--
ALTER TABLE `vocabularies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- Tablo için AUTO_INCREMENT değeri `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `badge_user`
--
ALTER TABLE `badge_user`
  ADD CONSTRAINT `badge_user_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `badge_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_quiz_answers`
--
ALTER TABLE `user_quiz_answers`
  ADD CONSTRAINT `user_quiz_answers_attempt_id_foreign` FOREIGN KEY (`attempt_id`) REFERENCES `user_quiz_attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_quiz_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_quiz_answers_selected_option_id_foreign` FOREIGN KEY (`selected_option_id`) REFERENCES `question_options` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `user_quiz_attempts`
--
ALTER TABLE `user_quiz_attempts`
  ADD CONSTRAINT `user_quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_quiz_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD CONSTRAINT `vocabularies_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
