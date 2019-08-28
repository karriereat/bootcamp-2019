-- -------------------------------------------------------------
-- TablePlus 2.8.1(252)
--
-- https://tableplus.com/
--
-- Database: bootcamp_2019_laravel
-- Generation Time: 2019-08-23 12:47:59.9380
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_categories_article_id_foreign` (`article_id`),
  KEY `articles_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `articles_categories_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `articles_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article_category` (`id`, `article_id`, `category_id`) VALUES ('4', '4', '1'),
('5', '2', '2'),
('6', '7', '3'),
('7', '9', '1'),
('8', '10', '2'),
('9', '11', '3'),
('10', '13', '1'),
('11', '12', '2'),
('12', '2', '3'),
('13', '4', '1'),
('14', '7', '2'),
('15', '9', '3'),
('16', '12', '3'),
('17', '13', '1');

INSERT INTO `articles` (`id`, `created_at`, `updated_at`, `title`, `text`, `date`, `user_id`) VALUES ('2', '2019-08-22 17:56:57', '2019-08-22 17:56:57', 'Cupcake Ipsum', 'Cupcake ipsum dolor sit. Amet I love liquorice jujubes pudding croissant I love pudding. Apple pie macaroon toffee jujubes pie tart cookie applicake caramels. Halvah macaroon I love lollipop. Wypas I love pudding brownie cheesecake tart jelly-o. Bear claw cookie chocolate bar jujubes toffee.', '2019-08-22 17:56:57', '1'),
('4', '2019-08-22 17:57:41', '2019-08-22 17:57:41', 'Lorizzle', 'Lorizzle ipsum bling bling sit amizzle, consectetuer adipiscing elit. Nizzle sapien velizzle, bling bling volutpat, suscipit , gravida vel, arcu. Check it out hizzle that\'s the shizzle. We gonna chung erizzle. Fo izzle dolor fo turpis tempizzle tempor. Gangsta boom shackalack mofo et turpizzle. Sizzle izzle tortor. Pellentesque uhuh ... yih!', '2019-08-22 17:57:41', '1'),
('7', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Samuel L. Ipsum', 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they\'re actually proud of that shit. ', '2019-08-22 18:17:25', '3'),
('9', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Bacon Ipsum', 'Bacon ipsum dolor sit amet salami jowl corned beef, andouille flank tongue ball tip kielbasa pastrami tri-tip meatloaf short loin beef biltong. Cow bresaola ground round strip steak fatback meatball shoulder leberkas pastrami sausage corned beef t-bone pork belly drumstick.', '2019-08-22 18:17:25', '1'),
('10', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Vegie Ipsum', 'Veggies sunt bona vobis, proinde vos postulo esse magis grape pea sprouts horseradish courgette maize spinach prairie turnip jícama coriander quandong gourd broccoli seakale gumbo. Parsley corn lentil zucchini radicchio maize burdock avocado sea lettuce. Garbanzo tigernut earthnut pea fennel.', '2019-08-22 18:17:25', '1'),
('11', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Cheese Ipsum', 'I love cheese, especially airedale queso. Cheese and biscuits halloumi cauliflower cheese cottage cheese swiss boursin fondue caerphilly. Cow port-salut camembert de normandie macaroni cheese feta who moved my cheese babybel boursin. Red leicester roquefort boursin squirty cheese jarlsberg blue castello caerphilly chalk and cheese. Lancashire.', '2019-08-22 18:17:25', '1'),
('12', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Beer Ipsum', 'Secondary fermentation degrees plato units of bitterness, cask conditioned ale ibu real ale pint glass craft beer. krausen goblet grainy ibu brewhouse lagering finishing hops. Trappist, black malt chocolate malt balthazar gravity dextrin saccharification trappist final gravity. Aau scotch ale, adjunct. hops bung infusion, cask conditioning pitching malt extract.', '2019-08-22 18:17:25', '1'),
('13', '2019-08-22 18:17:25', '2019-08-22 18:17:25', 'Hipster Ipsum', 'Est Schlitz shoreditch fashion axe. Messenger bag cupidatat Williamsburg sustainable aliqua, artisan duis pickled pitchfork. Semiotics Banksy ad roof party, jean shorts selvage mollit vero consectetur hashtag before they sold out blue bottle qui nihil aute. Aliquip artisan retro squid ullamco. Vegan enim Williamsburg, eu umami shabby chic single-origin coffee et.', '2019-08-22 18:17:25', '1');

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES ('1', '2019-08-22 17:57:41', '2019-08-22 17:57:41', 'Pasta'),
('2', '2019-08-22 17:57:41', '2019-08-22 17:57:41', 'Pizza'),
('3', '2019-08-22 17:57:41', '2019-08-22 17:57:41', 'Veggie');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '2014_10_12_000000_create_users_table', '1'),
('2', '2014_10_12_100000_create_password_resets_table', '1'),
('3', '2019_08_22_102312_create_articles_table', '1'),
('4', '2019_08_22_143509_create_categories_table', '1'),
('5', '2019_08_22_144742_create_articles_categories_table', '1');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Markus', 'foo@bar.at', NULL, '', NULL, '2019-08-22 15:56:16', '2019-08-22 15:56:16'),
('3', 'Foo', 'Bar', NULL, '', NULL, NULL, NULL);




/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;