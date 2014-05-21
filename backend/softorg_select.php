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
		SELECT users.mail, 
			users.name AS usersname, 
			soft.name AS softname
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id 
			AND userssoft.soft_id = soft.id
		ORDER BY users.id";
        break;
    case 1:
        echo "Select 2<br>";//+
		$query = "
		SELECT soft.name AS softname, softcategories.name AS softcategoriesname, platforms.name AS platformsname
		FROM soft, softcategories, softplatforms, platforms
		WHERE softplatforms.soft_id = soft.id AND softplatforms.platforms_id = platforms.id
		ORDER BY softname, softcategoriesname, platformsname";
        break;
    case 2:
        echo "Select 3<br>";//+
		$query = "
		SELECT soft.name AS softname, platforms.name AS platformsname, tags.name AS tagsname
		FROM soft, softplatforms, platforms, tags, softtags
		WHERE softplatforms.soft_id = soft.id 
			AND softplatforms.platforms_id = platforms.id 
			AND softtags.soft_id = soft.id
			AND softtags.tags_id = tags.id
		ORDER BY softname, platformsname, tagsname";
        break;
    case 3:
        echo "Select 4<br>";//+
		$query = "
		SELECT developers.name AS developersname, soft.name AS softname
		FROM developers, soft
		WHERE developers.id = soft.developers_id";
        break;
    case 4:
        echo "Select 5<br>";//+
        $query = "
		SELECT soft.name AS softname,
			users.mail, 
			users.name AS usersname			
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id 
			AND userssoft.soft_id = soft.id
		ORDER BY soft.id";
        break;
    case 5:
        echo "Select 6<br>";//+
		$query = "
		SELECT users.mail, users.name AS usersname, SUM(soft.price)
		FROM users, soft, userssoft
		WHERE userssoft.users_id = users.id AND userssoft.soft_id = soft.id
		GROUP BY users.mail";
        break;
    case 6:
        echo "Select 7<br>";//+
		$query = "
		SELECT developers.name AS developersname, COUNT(*)
		FROM developers
		CROSS JOIN (SELECT DISTINCT users.id AS usersname, soft.developers_id AS softdevelopersid
		        FROM users, soft, userssoft
		        WHERE users.id = userssoft.users_id 
					AND soft.id = userssoft.soft_id
				) results
			ON developers.id = results.softdevelopersid
		GROUP BY developers.id";
        break;
    case 7:
        echo "Select 8<br>";//+
		$query = "
		SELECT platforms.name AS platformsname, COUNT(*)
		FROM platforms
		CROSS JOIN (SELECT DISTINCT users.id AS usersname, softplatforms.platforms_id AS softplatformsid
		        FROM users, soft, userssoft, softplatforms
		        WHERE users.id = userssoft.users_id 
					AND soft.id = userssoft.soft_id 
					AND softplatforms.soft_id = soft.id
				) results
			ON platforms.id = results.softplatformsid
		GROUP BY platforms.id";
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
