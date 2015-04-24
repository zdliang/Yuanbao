<?php
// Connecting, selecting database
//Database=yuanbao;Data Source=ap-cdbr-azure-east-c.cloudapp.net;User Id=b38b9a71f4f907;Password=5b3f6d06
//$link = mysql_connect('127.0.0.1', 'admin', '1a2b3c') or die('Could not connect: ' . mysql_error());
$link = mysql_connect('ap-cdbr-azure-east-c.cloudapp.net', 'b38b9a71f4f907', '5b3f6d06') or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('yuanbao') or die('Could not select database');

// Performing SQL query
$query = "SELECT * FROM yuanbao.close_predict where symbol='000001'";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>