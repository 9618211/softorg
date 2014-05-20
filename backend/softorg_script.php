<? 
include 'vars_db.php';

$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  

$k = $_GET['query']; 
echo "$k<br>";

/*$query = "
CREATE TABLE IF NOT EXISTS users
(
	id int(5) NOT NULL AUTO_INCREMENT,
	login varchar(32) NOT NULL,
	pass varchar(32) NOT NULL,
	parentID int(5),
	fio varchar(256),
        email varchar(256),
	phone varchar(12),
        address varchar(256),
	FOREIGN KEY (parentID) REFERENCES users (id),
	PRIMARY KEY(`id`),
	UNIQUE KEY(`login`)
)TYPE=MyISAM
";

$result = mysql_query($query) or die(mysql_error()); */


$showtablequery="SHOW TABLES FROM $dbName";
$query_result=mysql_query($showtablequery);
while($showtablerow = mysql_fetch_array($query_result)) {
    echo $showtablerow[0]." ";
} 

$res = mysql_query("SELECT COUNT(*) FROM soft");
$row = mysql_fetch_row($res);
$total = $row[0]; // всего записей
echo $total;

if ($k <= $total) {
	echo "yes";
	$query = "
	INSERT INTO userssoft (users_id, soft_id)
	SELECT id, $k
	FROM users
	";
	$result = mysql_query($query) or die(mysql_error());
}

mysql_close($link);

?>