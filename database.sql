-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 06:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vip_embed_1.3`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` enum('home','embed','view','download','link') NOT NULL DEFAULT 'home',
  `position` varchar(50) DEFAULT NULL,
  `ad_code` text DEFAULT NULL,
  `type` enum('banner','popad','','') NOT NULL DEFAULT 'banner',
  `status` enum('active','paused') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `page`, `position`, `ad_code`, `type`, `status`) VALUES
(1, 'home', 'top', '', 'banner', 'active'),
(2, 'home', 'player-right', '', 'banner', 'active'),
(3, 'home', 'player-bottom', '', 'banner', 'active'),
(4, 'home', NULL, '', 'popad', 'active'),
(5, 'view', 'player-top', '', 'banner', 'active'),
(6, 'view', 'player-bottom', '', 'banner', 'active'),
(7, 'view', NULL, '', 'popad', 'active'),
(8, 'download', 'title-bottom', '', 'banner', 'active'),
(9, 'download', 'links-group-middle', '', 'banner', 'active'),
(10, 'download', NULL, '', 'popad', 'active'),
(11, 'link', 'counter-top', '', 'banner', 'active'),
(12, 'link', 'counter-bottom', '', 'banner', 'active'),
(13, 'link', NULL, '', 'popad', 'active'),
(14, 'embed', NULL, '', 'popad', 'active'),
(15, 'view', 'sidebar', '', 'banner', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('movie_stream_link','movie_direct_link','movie_torrent_link','episode_stream_link','episode_direct_link','episode_torrent_link','new_movie','new_series','new_episode','referrals') COLLATE utf8mb4_bin NOT NULL,
  `stars` int(10) UNSIGNED NOT NULL,
  `status` enum('credited','pending','rejected') COLLATE utf8mb4_bin NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `failed_movies`
--

CREATE TABLE `failed_movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tmdb_id` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `type` enum('movie','episode','series') DEFAULT 'movie',
  `imdb_id` varchar(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `requests` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `deleted_at` datetime(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `deleted_at`) VALUES
(34, 'action', NULL),
(35, 'adventure', NULL),
(36, 'animation', NULL),
(37, 'comedy', NULL),
(38, 'crime', NULL),
(39, 'documentary', NULL),
(40, 'drama', NULL),
(41, 'family', NULL),
(42, 'fantasy', NULL),
(43, 'history', NULL),
(44, 'horror', NULL),
(45, 'mystery ', NULL),
(46, 'romance', NULL),
(47, 'thriller', NULL),
(48, 'sci-fi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre_translations`
--

CREATE TABLE `genre_translations` (
  `id` int(11) UNSIGNED NOT NULL,
  `genre_id` int(11) UNSIGNED NOT NULL,
  `lang` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `movie_id` int(11) UNSIGNED NOT NULL,
  `api_id` int(10) UNSIGNED DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `is_broken` tinyint(4) NOT NULL DEFAULT 0,
  `type` enum('stream','direct_dl','torrent_dl') DEFAULT 'direct_dl',
  `resolution` varchar(30) DEFAULT NULL,
  `quality` varchar(30) DEFAULT NULL,
  `requests` int(10) UNSIGNED DEFAULT 0,
  `size_val` varchar(11) DEFAULT '0',
  `size_lbl` enum('MB','GB') NOT NULL DEFAULT 'MB',
  `reports_not_working` tinyint(3) UNSIGNED DEFAULT 0,
  `reports_wrong_link` tinyint(3) UNSIGNED DEFAULT 0,
  `status` enum('active','rejected','pending','broken') DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `browser` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `platform` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `logged` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `imdb_id` varchar(11) DEFAULT NULL,
  `tmdb_id` varchar(11) DEFAULT NULL,
  `type` enum('movie','episode') NOT NULL DEFAULT 'movie',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` smallint(3) UNSIGNED DEFAULT 0,
  `poster` varchar(128) DEFAULT NULL,
  `banner` varchar(128) DEFAULT NULL,
  `season_id` int(11) UNSIGNED DEFAULT NULL,
  `episode` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` enum('public','draft') NOT NULL DEFAULT 'public',
  `year` year(4) DEFAULT NULL,
  `imdb_rate` decimal(3,1) DEFAULT NULL,
  `released_at` date DEFAULT NULL,
  `trailer` varchar(128) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `quality` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) UNSIGNED NOT NULL,
  `genre_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie_translations`
--

CREATE TABLE `movie_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `content` text COLLATE utf8mb4_bin DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_system_page` tinyint(4) DEFAULT 0,
  `real_page` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_bin DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('public','draft') COLLATE utf8mb4_bin DEFAULT 'public',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`, `is_system_page`, `real_page`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Earn Money with Us', 'PHA+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5J3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsIHJlbWFpbmluZyBlc3NlbnRpYWxseSB1bmNoYW5nZWQuIEl0IHdhcyBwb3B1bGFyaXNlZCBpbiB0aGUgMTk2MHMgd2l0aCB0aGUgcmVsZWFzZSBvZiBMZXRyYXNldCBzaGVldHMgY29udGFpbmluZyBMb3JlbSBJcHN1bSBwYXNzYWdlcywgYW5kIG1vcmUgcmVjZW50bHkgd2l0aCBkZXNrdG9wIHB1Ymxpc2hpbmcgc29mdHdhcmUgbGlrZSBBbGR1cyBQYWdlTWFrZXIgaW5jbHVkaW5nIHZlcnNpb25zIG9mIExvcmVtIElwc3VtLjwvcD48cD5Mb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkncyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLDxicj48L3A+', 'earn-money', 1, 'earn-money', '', '', 'public', '2022-06-09 05:50:47', '2022-06-09 06:11:48'),
(2, 'Privacy Policy', '', 'privacy-policy', 0, NULL, '', '', 'public', '2022-06-09 05:55:54', '2022-06-09 05:55:54'),
(3, 'Contact us', 'PHA+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5J3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwczxicj48L3A+', 'contact-us', 1, 'contact-us', '', '', 'public', '2022-06-09 06:02:35', '2022-06-09 06:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `content` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stars` int(11) UNSIGNED NOT NULL,
  `account_details` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `status` enum('completed','pending','rejected') COLLATE utf8mb4_bin NOT NULL DEFAULT 'pending',
  `money_balance` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ref_rewards`
--

CREATE TABLE `ref_rewards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `stars_per_view` tinyint(4) NOT NULL DEFAULT 1,
  `countries` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ref_rewards`
--

INSERT INTO `ref_rewards` (`id`, `name`, `stars_per_view`, `countries`) VALUES
(1, 'Tier #2', 3, '[\"AU\",\"DE\",\"NO\",\"GB\",\"US\"]'),
(2, 'Tier #3', 1, '[\"CA\",\"DK\",\"FI\",\"FR\"]'),
(10, 'Tier #1	', 5, '[\"BI\",\"CM\",\"TD\",\"CN\",\"DJ\"]'),
(11, 'Tier #4', 1, '[\"AF\",\"AL\"]');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `tmdb_id` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `type` enum('movie','tv') COLLATE utf8mb4_bin DEFAULT 'movie',
  `requests` int(10) UNSIGNED DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','imported','canceled') COLLATE utf8mb4_bin DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `requests_subscription`
--

CREATE TABLE `requests_subscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) UNSIGNED NOT NULL,
  `series_id` int(11) UNSIGNED NOT NULL,
  `season` tinyint(3) UNSIGNED NOT NULL,
  `total_episodes` tinyint(3) UNSIGNED DEFAULT NULL,
  `is_completed` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `imdb_id` varchar(11) DEFAULT NULL,
  `tmdb_id` varchar(11) DEFAULT NULL,
  `imdb_rate` decimal(3,1) DEFAULT 0.0,
  `released_at` date DEFAULT NULL,
  `poster` varchar(128) DEFAULT NULL,
  `banner` varchar(128) DEFAULT NULL,
  `total_seasons` tinyint(3) UNSIGNED DEFAULT NULL,
  `total_episodes` tinyint(3) UNSIGNED DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `is_completed` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('returning','ended') NOT NULL DEFAULT 'returning',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `series_genre`
--

CREATE TABLE `series_genre` (
  `series_id` int(11) UNSIGNED NOT NULL,
  `genre_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(60) NOT NULL,
  `value` text DEFAULT NULL,
  `data_type` varchar(31) DEFAULT 'string'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`, `data_type`) VALUES
('ad_block_detector', '1', 'bool'),
('allowed_referer_list', '[]', 'array'),
('anonymous_stream_server_name', 'server', 'string'),
('api_status_check_rate_limit', '100', 'int'),
('blacklisted_keywords', 'other, and', 'string'),
('cached_pages', 'null', 'array'),
('color_dot_on_player_links', '1', 'bool'),
('currency_code', 'USD', 'string'),
('custom_footer_codes', '', 'string'),
('custom_header_codes', '', 'string'),
('default_banner', 'default-banner.jpg', 'string'),
('default_embed_slug_type', 'tmdb', 'string'),
('default_keywords', '', 'string'),
('default_movies_permalink_type', 'tmdb_short', 'string'),
('default_poster', 'default-poster.jpg', 'string'),
('default_ref_reward', '1', 'int'),
('default_server', '2embed.ru', 'string'),
('default_theme', 'pirate', 'string'),
('dev_api', '0', 'bool'),
('dev_apikey', '', 'string'),
('dl_link_waiting_time', '30', 'int'),
('download_links_requests_limit', '25', 'int'),
('download_quality_formats', '[\"HD\",\"SD\",\"CAM\"]', 'array'),
('download_resolution_formats', '[\"720p.x265\",\"720p.x264\",\"480p.x265\"]', 'array'),
('download_slug', '', 'string'),
('download_system', '1', 'bool'),
('email_address', '', 'string'),
('embed_requests_limit', '25', 'string'),
('embed_slug', '', 'string'),
('episode_permalink_pattern', 'Watch-{ TV_TITLE }-season-{ SEASON }-episode-{ EPISODE }-{ YEAR }', 'string'),
('footer_content', '', 'string'),
('footer_links', 'Contact us @ contact-us\r\nAPI @ api\r\nSearch @ https://www.google.com/', 'string'),
('gcaptcha_secret_key', '', 'string'),
('gcaptcha_site_key', '', 'string'),
('home_latest_movies_per_page', '12', 'int'),
('home_latest_shows_per_page', '12', 'int'),
('home_trending_movies_per_page', '6', 'int'),
('home_trending_shows_per_page', '6', 'int'),
('is_2fa_login', '0', 'bool'),
('is_contact_form_gcaptcha', '0', 'bool'),
('is_count_down_timer', '1', 'bool'),
('is_download_link_captcha', '1', 'bool'),
('is_links_report', '1', 'bool'),
('is_login_gcaptcha_enabled', '0', 'bool'),
('is_media_download_to_server', '0', 'bool'),
('is_multi_lang', '0', 'bool'),
('is_referer_blocked', '0', 'bool'),
('is_register_gcaptcha_enabled', '0', 'bool'),
('is_request_captcha_enabled', '1', 'bool'),
('is_sidebar_disabled', '1', 'bool'),
('is_stream_gcaptcha_enabled', '0', 'bool'),
('is_telegram_card_enabled', '0', 'bool'),
('is_use_anonymous_stream_server', '0', 'boot'),
('items_per_imdb_top_page', '30', 'int'),
('items_per_new_release_page', '30', 'int'),
('items_per_recommend_page', '30', 'int'),
('items_per_trending_page', '30', 'int'),
('i_lic_vip_2', '', 'string'),
('keywords_from_title', '0', 'bool'),
('last_db_backup_at', '', 'string'),
('library_items_per_page', '30', 'int'),
('library_slug', '', 'string'),
('license', '', 'string'),
('license_type', 'extended', 'string'),
('lic_vip_r_date', '', 'string'),
('links_requests_limit', '25', 'int'),
('link_slug', '', 'string'),
('main_language', 'en-US', 'string'),
('max_download_links_per_user', '1', 'int'),
('max_steaming_links_per_user', '1', 'int'),
('max_stream_servers_per_group', '0', 'int'),
('max_torrent_links_per_user', '1', 'int'),
('min_payout_stars', '10', 'int'),
('movie_desc_as_meta', '0', 'bool'),
('movie_permalink_pattern', '{ MV_TITLE }-{ YEAR }-movie', 'string'),
('note_about_payout_date', '', 'string'),
('omdb_api_key', '', 'string'),
('payment_methods_for_payouts', '[\"paypal\",\"btc\"]', 'array'),
('player_autoplay', '0', 'bool'),
('player_home_page_btn', '0', 'bool'),
('player_title', '1', 'bool'),
('p_req', '0', 'bool'),
('ref_rewards_system', '0', 'bool'),
('renamed_servers', '', 'array'),
('report_requests_limit', '10', 'int'),
('request_system', '1', 'bool'),
('req_email_subscription', '1', 'bool'),
('secret_code', '', 'string'),
('selected_languages', '[]', 'array'),
('series_permalink_pattern', '{ TV_TITLE }-{ YEAR }-show', 'string'),
('site_copyright', 'copyright © 2022 all rights reserved', 'string'),
('site_description', '', 'string'),
('site_favicon', 'favicon.ico', 'string'),
('site_keywords', '', 'string'),
('site_logo', 'logo.png', 'string'),
('site_name', 'VIP Embed', 'string'),
('site_title', 'VIPEmbed', 'string'),
('smtp_settings', '{\"host\":\"\",\"user\":\"\",\"pass\":\"\",\"port\":\"\"}', 'array'),
('stars_exchange_rate', '0.001', 'string'),
('stars_for_episode_direct_link', '1', 'int'),
('stars_for_episode_stream_link', '1', 'int'),
('stars_for_episode_torrent_link', '1', 'int'),
('stars_for_movie_direct_link', '1', 'int'),
('stars_for_movie_stream_link', '1', 'int'),
('stars_for_movie_torrent_link', '1', 'int'),
('stars_for_new_episode', '1', 'int'),
('stars_for_new_movie', '1', 'int'),
('stars_for_new_series', '1', 'int'),
('stream_links_requests_limit', '25', 'int'),
('stream_quality_formats', '[\"HD\",\"SD\",\"CAM\"]', 'array'),
('stream_types', '[]', 'array'),
('telegram_username', 'jonty89', 'string'),
('timezone', 'Asia/Colombo', 'string'),
('tmdb_api_key', '', 'string'),
('users_system', '0', 'bool'),
('user_admin_approval', '0', 'bool'),
('user_email_verification', '0', 'bool'),
('version', '1.3', 'string'),
('views_anlytc_system', '1', 'bool'),
('view_slug', '', 'string'),
('watch_history_limit', '18', 'int'),
('web_page_cache', '0', 'bool'),
('web_page_cache_duration', '86400', 'int'),
('__a', '0', 'bool'),
('__t', '0', 'bool');

-- --------------------------------------------------------

--
-- Table structure for table `third_party_apis`
--

CREATE TABLE `third_party_apis` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `movie_api` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `series_api` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','paused') COLLATE utf8mb4_bin DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `token` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `type` enum('email_verification','password_reset','twofa') COLLATE utf8mb4_bin NOT NULL,
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `role` enum('admin','moderator','user') COLLATE utf8mb4_bin NOT NULL DEFAULT 'user',
  `is_email_verified` tinyint(4) DEFAULT 0,
  `is_admin_approved` tinyint(4) DEFAULT 0,
  `is_2fa_login` tinyint(4) DEFAULT 0,
  `status` enum('active','blocked','pending') COLLATE utf8mb4_bin NOT NULL DEFAULT 'pending',
  `last_logged_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `is_email_verified`, `is_admin_approved`, `is_2fa_login`, `status`, `last_logged_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$.sVMxgK3/R9k9EJNnqxLweI7p2YuEko.WBuEcAflwIAaAG/eLLuy6', 'admin', 1, 1, 0, 'active', '2022-06-15 09:01:36', NULL, '2022-06-15 09:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ref_user_id` int(10) UNSIGNED DEFAULT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_bin DEFAULT NULL,
  `views` tinyint(3) UNSIGNED DEFAULT 1,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earnings_user_id_fk` (`user_id`);

--
-- Indexes for table `failed_movies`
--
ALTER TABLE `failed_movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imdb_id` (`imdb_id`),
  ADD UNIQUE KEY `tmdb_id` (`tmdb_id`) USING BTREE;

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `genre_translations`
--
ALTER TABLE `genre_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_trans_unique_index` (`genre_id`,`lang`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_movie_id_fk` (`movie_id`),
  ADD KEY `links_api_id_fk` (`api_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_activity_user_id` (`user_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmdb_id` (`tmdb_id`),
  ADD UNIQUE KEY `imdb_id` (`imdb_id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD KEY `movie_genre_movie_id_fk` (`movie_id`),
  ADD KEY `movie_genre_g_id_fk` (`genre_id`);

--
-- Indexes for table `movie_translations`
--
ALTER TABLE `movie_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lang_unique_index` (`movie_id`,`lang`) USING BTREE;

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_t_unique_index` (`page_id`,`lang`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payouts_user_id_fk` (`user_id`);

--
-- Indexes for table `ref_rewards`
--
ALTER TABLE `ref_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_imdb` (`tmdb_id`);

--
-- Indexes for table `requests_subscription`
--
ALTER TABLE `requests_subscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_sub_unique_index` (`request_id`,`email`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seasons_series_id_fk` (`series_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imdb_id` (`imdb_id`),
  ADD UNIQUE KEY `tmdb_id` (`tmdb_id`);

--
-- Indexes for table `series_genre`
--
ALTER TABLE `series_genre`
  ADD KEY `series_genre_movie_id_fk` (`series_id`),
  ADD KEY `series_genre_g_id_fk` (`genre_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `third_party_apis`
--
ALTER TABLE `third_party_apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokens_identity` (`token`,`type`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `failed_movies`
--
ALTER TABLE `failed_movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `genre_translations`
--
ALTER TABLE `genre_translations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=729;

--
-- AUTO_INCREMENT for table `movie_translations`
--
ALTER TABLE `movie_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_rewards`
--
ALTER TABLE `ref_rewards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests_subscription`
--
ALTER TABLE `requests_subscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `third_party_apis`
--
ALTER TABLE `third_party_apis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre_translations`
--
ALTER TABLE `genre_translations`
  ADD CONSTRAINT `genre_translation_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_api_id_fk` FOREIGN KEY (`api_id`) REFERENCES `third_party_apis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `links_movie_id_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD CONSTRAINT `login_activity_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_g_id_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_movie_id_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_translations`
--
ALTER TABLE `movie_translations`
  ADD CONSTRAINT `translations_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `FK_page_translate` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `payouts_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests_subscription`
--
ALTER TABLE `requests_subscription`
  ADD CONSTRAINT `FK_req_id` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_series_id_fk` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `series_genre`
--
ALTER TABLE `series_genre`
  ADD CONSTRAINT `series_genre_g_id_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `series_genre_movie_id_fk` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
