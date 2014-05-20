<? 
include 'vars_db.php';
$table = "softtags"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `softtags`, `id`, `soft_id`, `tags_id`
$sql = mysql_query("INSERT INTO $table SET 
	`soft_id` = '".mysql_real_escape_string($_POST['soft_id'])."', 
	`tags_id` = '".mysql_real_escape_string($_POST['tags_id'])."'") or die(mysql_error()); 
mysql_close($link);
?>