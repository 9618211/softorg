<? 
include 'vars_db.php';

$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  

$query = "
CREATE TABLE IF NOT EXISTS `tags` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
";
// `tags`, `id`, `name`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `paysystems` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `data` VARCHAR(32) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
); 
";
// `paysystems`, `id`, `name`, `data`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `platforms` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
";
// `platforms`, `id`, `name`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `softcategories` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
";
// `softcategories`, `id`, `name`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `customers` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `bik` VARCHAR(32) NULL DEFAULT NULL,
  `bankaccount` VARCHAR(32) NULL DEFAULT NULL,
  `paysystems_id` TINYINT NULL DEFAULT NULL,
  FOREIGN KEY (paysystems_id) REFERENCES paysystems (id),
  PRIMARY KEY (`id`)
);
";
// `customers`, `id`, `name`, `bik`, `bankaccount`, `paysystems_id`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `developers` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `customers_id` TINYINT NULL DEFAULT NULL,
  FOREIGN KEY (customers_id) REFERENCES customers (id),
  PRIMARY KEY (`id`)
);
";
// `developers`, `id`, `name`, `customers_id`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `users` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `mail` VARCHAR(32) NULL DEFAULT NULL,
  `password` VARCHAR(32) NULL DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `customers_id` TINYINT NULL DEFAULT NULL,
  `online` TINYINT(1) NULL DEFAULT NULL,
  FOREIGN KEY (customers_id) REFERENCES customers (id),
  PRIMARY KEY (`id`)
);
";
// `users`, `id`, `mail`, `password`, `name`, `customers_id`, `online`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `soft` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `developers_id` TINYINT NULL DEFAULT NULL,
  `softcategories_id` TINYINT NULL DEFAULT NULL,
  `path` VARCHAR(256) NULL DEFAULT NULL,
  FOREIGN KEY (developers_id) REFERENCES developers (id),
  FOREIGN KEY (softcategories_id) REFERENCES softcategories (id),
  PRIMARY KEY (`id`)
);
";
// `soft`, `id`, `name`, `developers_id`, `softcategories_id`, `path`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `softtags` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `soft_id` TINYINT NULL DEFAULT NULL,
  `tags_id` TINYINT NULL DEFAULT NULL,
  FOREIGN KEY (soft_id) REFERENCES soft (id),
  FOREIGN KEY (tags_id) REFERENCES tags (id),
  PRIMARY KEY (`id`)
);
";
// `softtags`, `id`, `soft_id`, `tags_id`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `softplatforms` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `soft_id` TINYINT NULL DEFAULT NULL,
  `platforms_id` TINYINT NULL DEFAULT NULL,
  FOREIGN KEY (soft_id) REFERENCES soft (id),
  FOREIGN KEY (platforms_id) REFERENCES platforms (id),
  PRIMARY KEY (`id`)
);
";
// `softplatforms`, `id`, `soft_id`, `platforms_id`

$result = mysql_query($query) or die(mysql_error()); 

$query = "
CREATE TABLE IF NOT EXISTS `userssoft` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `users_id` TINYINT NULL DEFAULT NULL,
  `soft_id` TINYINT NULL DEFAULT NULL,
  FOREIGN KEY (users_id) REFERENCES users (id),
  FOREIGN KEY (soft_id) REFERENCES soft (id),
  PRIMARY KEY (`id`)
);
";
// `userssoft`, `id`, `users_id`, `soft_id`

$result = mysql_query($query) or die(mysql_error()); 

mysql_close($link);
?>