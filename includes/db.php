<?php

// -- FAST CONNECTION
////assign variable to open a new connection to server with this parameters
//$connection = mysqli_connect('localhost', 'root','','cms');
//// if connection is ture
//if($connection) {
  //// display this in the browser else do nothing. 
  //echo "We are connected";
//}



// SECURE CONNECTION

// db array assigned to value's
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

// foreach db array use key to loop through each value.
foreach($db as $key => $value){
  
  define(strtoupper($key),$value);

}

//assign variable to open a new connection to server with contants
$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

//// if connection is ture
//if($connection) {
  //// display this in the browser else do nothing. 
  //echo "We are connected";
//}

