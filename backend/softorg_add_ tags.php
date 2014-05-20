<? 
include 'vars_db.php';
$table = "tags"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `tags`, `id`, `name`
$sql = mysql_query("INSERT INTO $table SET 
	`name` = '".mysql_real_escape_string($_POST['name'])."'") or die(mysql_error()); 
mysql_close($link);
?>