<? 
include 'vars_db.php';
$table = "developers"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `developers`, `id`, `name`, `customers_id`
$sql = mysql_query("INSERT INTO $table SET 
	`name` = '".mysql_real_escape_string($_POST['name'])."', 
	`customers_id` = '".mysql_real_escape_string($_POST['customers_id'])."'") or die(mysql_error()); 
mysql_close($link);
?>