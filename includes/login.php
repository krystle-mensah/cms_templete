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

  //IF NOT $var
  if(!$select_user_query){

    //Print a message and terminate the current script:
    die("QUERY FAILED" . mysqli_error($connection));

  }
  
  //if query didnt fail

  // condition it to loop
  while($row = mysqli_fetch_array($select_user_query)){
    // TEST - when we type the right user we a getting data
    //echo $db_id = $row['userId'];  // OUTPUT - 1. so where getting the row with the specific id

    // 155. Validating User Query Front End

    // now we have found the id for a specific user in our database we wont to pull some more information

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

  // 3 equal signs means is it exactly identical.
  // if ture 
  if($username ===  $db_username && $password === $db_user_password){

    // 156. Setting Values with Sessions

    /*
    create a session for that user
     

    157. Validating User Admin. then we using the admin header to receive it.
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