<? 
include 'vars_db.php';
$table = "soft"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `soft`, `id`, `name`, `developers_id`, `softcategories_id`, `path`
$sql = mysql_query("INSERT INTO $table SET 
	`name` = '".mysql_real_escape_string($_POST['name'])."', 
	`developers_id` = '".mysql_real_escape_string($_POST['developers_id'])."',
	`softcategories_id` = '".mysql_real_escape_string($_POST['softcategories_id'])."',
	`path` = '".mysql_real_escape_string($_POST['path'])."'
	`price` = '".mysql_real_escape_string($_POST['price'])."'") or die(mysql_error()); 
mysql_close($link);
?>