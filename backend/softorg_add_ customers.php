<? 
include 'vars_db.php';
$table = "customers"; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
// `customers`, `id`, `name`, `bik`, `bankaccount`, `paysystems_id`
$sql = mysql_query("INSERT INTO $table SET 
	`name` = '".mysql_real_escape_string($_POST['name'])."', 
	`bik` = '".mysql_real_escape_string($_POST['bik'])."',
	`bankaccount` = '".mysql_real_escape_string($_POST['bankaccount'])."',
	`paysystems_id` = '".mysql_real_escape_string($_POST['paysystems_id'])."'") or die(mysql_error()); 
mysql_close($link);
?>