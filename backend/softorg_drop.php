<? 
include 'vars_db.php';

$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  

$query = "
DROP TABLE IF EXISTS 
`userssoft`,
`softplatforms`,
`softtags`,
`soft`,
`users`,
`developers`,
`customers`,
`softcategories`,
`platforms`,
`paysystems`,
`tags`
";

$result = mysql_query($query) or die(mysql_error()); 

mysql_close($link);

?>