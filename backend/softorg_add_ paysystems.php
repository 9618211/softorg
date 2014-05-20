<? 
include 'vars_db.php';
$table = "paysystems"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `paysystems`, `id`, `name`, `data`
$sql = mysql_query("INSERT INTO $table SET 
	`name` = '".mysql_real_escape_string($_POST['name'])."', 
	`data` = '".mysql_real_escape_string($_POST['data'])."'") or die(mysql_error()); 
mysql_close($link);
?>