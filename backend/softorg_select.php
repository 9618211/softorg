<? 
include 'vars_db.php';
$k = $_GET['query']; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  

$tableusers = "users";
$tableuserssoft = "userssoft";
$tablesoft = "soft";
$tabledevelopers = "developers";

switch ($k) {
    case 0:
        echo "Select 1<br>";//+
        $query = "
		SELECT users.mail, users.name AS usersname, soft.name AS softname
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id
		ORDER BY users.id";
        break;
    case 1:
        echo "Select 2<br>";
		$query = "
		SELECT $tableusers.`mail`, $tableusers.`name`, $tablesoft.`name`
		FROM $tableusers, $tablesoft, $tableuserssoft
		WHERE $tableuserssoft.`users_id` = $tableusers.`id` AND $tableuserssoft.`soft_id` = $tablesoft.`id`";
        break;
    case 2:
        echo "Select 3<br>";
		/*$query = "
		SELECT users.mail, users.name, soft.name
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id";*/
		$query = "
		SELECT users.id, users.mail, users.password, users.name AS usersname, users.customers_id, users.online, soft.name AS softname
		FROM users, userssoft, soft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id";
        break;
    case 3:
        echo "Select 4<br>";//+
		$query = "
		SELECT developers.name AS developersname, soft.name AS softname
		FROM developers, soft
		WHERE developers.id = soft.developers_id";
        break;
    case 4:
        echo "Select 5<br>";
        $query = "
		SELECT developers.name AS developersname, soft.name AS softname
		FROM developers, soft
		WHERE developers.id = soft.developers_id";
        break;
    case 5:
        echo "Select 6<br>";
		$query = "
		SELECT users.mail, users.name, soft.name
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id";
        break;
    case 6:
        echo "Select 7<br>";
		$query = "
		SELECT users.mail, users.name, soft.name
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id";
        break;
    case 7:
        echo "Select 8<br>";
		$query = "
		SELECT users.mail, users.name, soft.name
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id";
        break;
}


$result = mysql_query($query) or die(mysql_error()); 
$number = mysql_num_rows($result);
if ($number > 0) {
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
}
echo "</table>\n";
mysql_free_result($result);
mysql_close($link);
?>
