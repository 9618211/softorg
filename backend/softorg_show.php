<? 
include 'vars_db.php';
$table = $_GET['table']; 
$link = mysql_connect($hostname, $username, $password) OR DIE("connection problem"); 
mysql_select_db($dbName) or die(mysql_error());  
echo "$table<br>";
$query = "SELECT * FROM $table";
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