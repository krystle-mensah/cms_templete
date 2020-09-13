<?php 

//echo $db['db_host'] = "localhost";  // localhost

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

echo define( $db['db_host'], 'hello'); // 1

echo constant($db['db_host']);


//define("GREETING","Hello you! How are you today?");
//echo constant("GREETING");



?>