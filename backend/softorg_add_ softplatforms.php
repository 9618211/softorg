<? 
include 'vars_db.php';
$table = "softplatforms"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `softplatforms`, `id`, `soft_id`, `platforms_id`
$sql = mysql_query("INSERT INTO $table SET 
	`soft_id` = '".mysql_real_escape_string($_POST['soft_id'])."', 
	`platforms_id` = '".mysql_real_escape_string($_POST['platforms_id'])."'") or die(mysql_error()); 
mysql_close($link);
?>