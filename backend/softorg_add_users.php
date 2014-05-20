<? 
include 'vars_db.php';
$table = "users"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `users`, `id`, `mail`, `password`, `name`, `customers_id`, `online`
$sql = mysql_query("INSERT INTO $table SET 
	`mail` = '".mysql_real_escape_string($_POST['mail'])."', 
	`password` = '".mysql_real_escape_string($_POST['password'])."',
	`name` = '".mysql_real_escape_string($_POST['name'])."',
	`customers_id` = '".mysql_real_escape_string($_POST['customers_id'])."',
	`online` = '".mysql_real_escape_string($_POST['online'])."'") or die(mysql_error()); 
mysql_close($link);
?>