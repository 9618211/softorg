<? 
include 'vars_db.php';
$table = "userssoft"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `userssoft`, `id`, `users_id`, `soft_id`
$sql = mysql_query("INSERT INTO $table SET 
	`users_id` = '".mysql_real_escape_string($_POST['users_id'])."', 
	`soft_id` = '".mysql_real_escape_string($_POST['soft_id'])."'") or die(mysql_error()); 
mysql_close($link);
?>