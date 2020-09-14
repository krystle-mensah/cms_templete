<?php

// -- FAST CONNECTION
//assign variable to open a new connection to server with this parameters
////$connection = mysqli_connect('localhost', 'root','','cms');
// if connection is ture
////if($connection) {
  // display this in the browser else do nothing. 
  ////echo "We are connected";
////}

// SECURE CONNECTION

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "cms"; 

// db array assigned to value's
$db['db_host'] = $serverName;
$db['db_user'] = $username;
$db['db_pass'] = $password;
$db['db_name'] = $databaseName;

// foreach array use key name and loop through each value.
foreach($db as $key => $value){

  define(strtoupper($key),$value);

}

//assign variable to open a new connection to server with contants
$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// // if connection is ture
// if($connection) {
//   // display this in the browser else do nothing. 
//   echo "We are connected";
// }


