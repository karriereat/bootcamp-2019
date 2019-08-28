-- -------------------------------------------------------------
-- TablePlus 2.4(228)
--
-- https://tableplus.com/
--
-- Database: bootcamp_2019
-- Generation Time: 2019-08-08 16:01:22.5490
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


INSERT INTO `articles` (`id`, `createDate`, `changeDate`, `date`, `title`, `text`, `userId`) VALUES ('2', '1565187238', '1565187238', '1565187238', 'Cupcake Ipsum', 'Cupcake ipsum dolor sit. Amet I love liquorice jujubes pudding croissant I love pudding. Apple pie macaroon toffee jujubes pie tart cookie applicake caramels. Halvah macaroon I love lollipop. Wypas I love pudding brownie cheesecake tart jelly-o. Bear claw cookie chocolate bar jujubes toffee.', '2'),
('3', '1565187256', '1565187256', '1565136000', 'Lorizzle', 'Lorizzle ipsum bling bling sit amizzle, consectetuer adipiscing elit. Nizzle sapien velizzle, bling bling volutpat, suscipit , gravida vel, arcu. Check it out hizzle that\'s the shizzle. We gonna chung erizzle. Fo izzle dolor fo turpis tempizzle tempor. Gangsta boom shackalack mofo et turpizzle. Sizzle izzle tortor. Pellentesque uhuh ... yih!', '1'),
('4', '1565187256', '1565187256', '1565049600', 'Samuel L. Ipsum', 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they\'re actually proud of that shit. ', '2'),
('5', '1565187256', '1565187256', '1564963200', 'Bacon Ipsum', 'Bacon ipsum dolor sit amet salami jowl corned beef, andouille flank tongue ball tip kielbasa pastrami tri-tip meatloaf short loin beef biltong. Cow bresaola ground round strip steak fatback meatball shoulder leberkas pastrami sausage corned beef t-bone pork belly drumstick.', '1'),
('6', '1565187256', '1565187256', '1564876800', 'Veggie Ipsum', 'Veggies sunt bona vobis, proinde vos postulo esse magis grape pea sprouts horseradish courgette maize spinach prairie turnip jícama coriander quandong gourd broccoli seakale gumbo. Parsley corn lentil zucchini radicchio maize burdock avocado sea lettuce. Garbanzo tigernut earthnut pea fennel.', '2'),
('7', '1565187256', '1565187256', '1564790400', 'Cheese Ipsum', 'I love cheese, especially airedale queso. Cheese and biscuits halloumi cauliflower cheese cottage cheese swiss boursin fondue caerphilly. Cow port-salut camembert de normandie macaroni cheese feta who moved my cheese babybel boursin. Red leicester roquefort boursin squirty cheese jarlsberg blue castello caerphilly chalk and cheese. Lancashire.', '1'),
('8', '1565187256', '1565187256', '1564704000', 'Beer Ipsum', 'Secondary fermentation degrees plato units of bitterness, cask conditioned ale ibu real ale pint glass craft beer. krausen goblet grainy ibu brewhouse lagering finishing hops. Trappist, black malt chocolate malt balthazar gravity dextrin saccharification trappist final gravity. Aau scotch ale, adjunct. hops bung infusion, cask conditioning pitching malt extract.', '3'),
('9', '1565187256', '1565187256', '1564617600', 'Hipster Ipsum', 'Est Schlitz shoreditch fashion axe. Messenger bag cupidatat Williamsburg sustainable aliqua, artisan duis pickled pitchfork. Semiotics Banksy ad roof party, jean shorts selvage mollit vero consectetur hashtag before they sold out blue bottle qui nihil aute. Aliquip artisan retro squid ullamco. Vegan enim Williamsburg, eu umami shabby chic single-origin coffee et.', '1');

INSERT INTO `articles_categories` (`id`, `categoryId`, `articleId`) VALUES ('2', '1', '2'),
('3', '2', '3'),
('4', '1', '4'),
('5', '2', '5'),
('6', '1', '6'),
('7', '2', '7'),
('8', '1', '8'),
('9', '2', '9'),
('10', '1', '9'),
('11', '2', '8'),
('12', '1', '5'),
('13', '2', '2'),
('14', '1', '7');

INSERT INTO `categories` (`id`, `name`) VALUES ('1', 'Pasta'),
('2', 'Pizza'),
('3', 'Vegetarisch');

INSERT INTO `users` (`id`, `email`, `username`, `password`, `createDate`, `lastLogin`, `isActive`) VALUES ('1', 'markus@karriere.at', 'markus', 'test1234', '0', '1565263661', '1'),
('2', 'manuel@karriere.at', 'manuel', 'test4321', '0', '1565263661', '1'),
('3', 'herbert@karriere.at', 'herbert', 'test1111', '0', '1565263661', '1');




/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;