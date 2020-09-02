<?php include "db.php"; ?>

<?php session_start();?>

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
  
  // CLEAN INPUT - To avoid mysql injections.
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
    // echo $db_id = $row['userId'];  // OUTPUT - 1. so where getting the row with the specific id

    // now we have found the id for a specific user in our database we wont to pull some more information

    $db_userId = $row['userId']; 
    $db_user_firstname = $row['user_firstname']; 
    $db_username = $row['username'];  // OUTPUT - krys
    $db_user_password = $row['user_password'];   
    $db_user_lastname = $row['user_lastname']; 
    $db_user_email = $row['user_email'];
    $db_user_role = $row['user_role']; 

  }

  //once we have the row with the id we need to validate it with an if statement

  // 155. Validating User Query Front End

  if($username ===  $db_username && $password === $db_user_password){

    // Then create sessions

    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['username'] = $db_username;
    $_SESSION['user_password'] = $db_user_password;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_email'] = $db_user_email;
    $_SESSION['user_role'] = $db_user_role;
    
    // AND locate user to the admin page
    header("Location: ../admin");

    // ELSE we dont find a match 
  } else {
    
    // relocate user to the index page
    header("Location: ../index.php");
  
  }
  
} // isset 


?>