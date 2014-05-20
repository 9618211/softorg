<? 
include 'vars_db.php';

$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  

// `tags`, `id`, `name`
$query = "
INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'tag1'),
(2, 'tag2'),
(3, 'tag3'),
(4, 'tag4');
";
$result = mysql_query($query) or die(mysql_error()); 

// `paysystems`, `id`, `name`, `data`
$query = "
INSERT INTO `paysystems` (`id`, `name`, `data`) VALUES
(1, 'paysystem1', 'data1'),
(2, 'paysystem2', 'data2'),
(3, 'paysystem3', 'data3'),
(4, 'paysystem3', 'data3');
";
$result = mysql_query($query) or die(mysql_error()); 

// `platforms`, `id`, `name`
$query = "
INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'windows'),
(2, 'mac os'),
(3, 'linux'),
(4, 'android');
";
$result = mysql_query($query) or die(mysql_error()); 

// `softcategories`, `id`, `name`
$query = "
INSERT INTO `softcategories` (`id`, `name`) VALUES
(1, 'business'),
(2, 'games'),
(3, 'media'),
(4, 'tools');
";
$result = mysql_query($query) or die(mysql_error()); 

// `customers`, `id`, `name`, `bik`, `bankaccount`, `paysystems_id`
$query = "
INSERT INTO `customers` (`id`, `name`, `bik`, `bankaccount`, `paysystems_id`) VALUES
(1, 'customer1', '144525957', '10101810600000000957', 1),
(2, 'customer2', '244525957', '20101810600000000957', 2),
(3, 'customer3', '344525957', '30101810600000000957', 3),
(4, 'customer4', '444525957', '40101810600000000957', 4);
";
$result = mysql_query($query) or die(mysql_error()); 

// `developers`, `id`, `name`, `customers_id`
$query = "
INSERT INTO `developers` (`id`, `name`, `customers_id`) VALUES
(1, 'DevCompany1', 1),
(2, 'DevCompany2', 2);
";
$result = mysql_query($query) or die(mysql_error()); 

// `users`, `id`, `mail`, `password`, `name`, `customers_id`, `online`
$query = "
INSERT INTO `users` (`id`, `mail`, `password`, `name`, `customers_id`, `online`) VALUES
(1, 'mail1@domain.com', '123', 'Adminov Admin Adminovich', 1, 0),
(2, 'mail2@domain.com', '123', 'Userov User Userovich', 2, 0),
(3, 'mail3@domain.com', '123', '', 3, 0),
(4, 'mail4@domain.com', '123', '', 4, 0);
";
$result = mysql_query($query) or die(mysql_error()); 

// `soft`, `id`, `name`, `developers_id`, `softcategories_id`, `path`
$query = "
INSERT INTO `soft` (`id`, `name`, `developers_id`, `softcategories_id`, `path`) VALUES
(1, 'soft1', 1, 1, 'soft1'),
(2, 'soft2', 1, 2, 'soft2'),
(3, 'soft3', 2, 2, 'soft3'),
(4, 'soft4', 2, 3, 'soft4');
";
$result = mysql_query($query) or die(mysql_error()); 

// `softtags`, `id`, `soft_id`, `tags_id`
$query = "
INSERT INTO `softtags` (`id`, `soft_id`, `tags_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 3),
(5, 4, 1);
";
$result = mysql_query($query) or die(mysql_error()); 

// `softplatforms`, `id`, `soft_id`, `platforms_id`
$query = "
INSERT INTO `softplatforms` (`id`, `soft_id`, `platforms_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 3),
(5, 4, 1);
";
$result = mysql_query($query) or die(mysql_error()); 

// `userssoft`, `id`, `users_id`, `soft_id`
$query = "
INSERT INTO `userssoft` (`id`, `users_id`, `soft_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 1, 4);
";
$result = mysql_query($query) or die(mysql_error()); 

mysql_close($link);
?>