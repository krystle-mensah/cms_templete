<?php include "db.php"; ?>

<!-- 
function session start - it well tell our server to start session 
-->

<?php session_start(); ?>

<?php 

// checking if login in button is clicked
if(isset($_POST['login'])){
  //TEST - if the below message is displaying
  //echo "found";
  //TEST -  if thos values. are displaying.
  //echo $username = $_POST['username'];
  //echo $password = $_POST['password'];


// IF TEST WORKED - CATCH USER INPUT.
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // CLEAN - USER INPUT to avoid mysql injections.
  // FUNCTION - Escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
  $username = mysqli_real_escape_string($connection, $username);
  $password =  mysqli_real_escape_string($connection, $password);

  //154. select user query

  // SELECT all from TABLE WHERE COLUMN MATCHES USER INPUT FROM FORM. 
  $query = "SELECT * FROM users WHERE  username = '{$username}' ";

  //FUNCTION - to bring BACK MATCH.
  $select_user_query = mysqli_query($connection, $query);

  /* 
  
  TEST - Try submitting a user and see if you get any error.
  
  IF NOT $var
  
  */

  if(!$select_user_query){

    die("QUERY FAILED" . mysqli_error($connection));

  }
  
  // WHILE input if ture condition it to loop through  
  while($row = mysqli_fetch_array($select_user_query)){
    // TEST - when we type the right user we a getting data
    //echo $db_id = $row['userId'];  // OUTPUT - 1. so where getting the row with the specific id

    // 155. Validating User Query Front End

    // now we have found the id for a specific user in our database we wont to pull some more information out of that

    $db_userId = $row['userId'];
    $db_username = $row['username'];  
    $db_user_password = $row['user_password'];  
    $db_user_email = $row['user_email']; 
    $db_user_firstname = $row['user_firstname']; 
    $db_user_lastname = $row['user_lastname']; 
    $db_user_email = $row['user_email']; 

  }

  //once we have the row with the speicfic id we need to validate it with an if statement

  //159. Login improved- Edwin from the Future

  // 3 equal signs means is it exactly identical
  if($username ===  $db_username && $password === $db_user_password){

    // 156. Setting Values with Sessions

    /*
    where going to turn on a session at the top of this page. this username that we are bringing from the database we are assigning it to a session called user name so every time we wont to access this user name in the  where going to have this value where every we pull it out from. so if we say echo $_SESSION['username'] somewhere else and we have our session turned on where goin to able to get this value $db_username;. we assign from right to left.

    157. Validating User Admin

    where using this page to set our sessions. then we using the admin header to receive it.
    */

    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;
    
    // locate user to the admin page
    header("Location: ../admin");

    // else if we dont find a match 
  } else {
    
    // relocate user to the index page
    header("Location: ../index.php");
  
  }

}

?>