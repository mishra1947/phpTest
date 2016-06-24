<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "india@123";

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$select_menu = "SELECT a.item_name, a.restaurant_id, a.id 
                FROM menus a, restaurant_accounts b 
                WHERE a.restaurant_id = b.restaurant_id
                ORDER BY  b.restaurant_id ASC";
mysql_select_db('MunchAdo');
$retval = mysql_query( $select_menu, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$count =0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "ID: {$row['id']}  <br> ".
         "Restaurant Id:{$row['restaurant_id']}  <br> ".
         "Menu item:{$row['item_name']}  <br> ".
         "<b style='color: red;'>--------------------------------</b><br>";
         $count++;
} 
echo "<b style='float: right'>Total Records: ".$count."</b>";
mysql_close($conn);
?>