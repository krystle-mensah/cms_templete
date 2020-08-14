
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>

  <?php 

  // select all from table.
  $query = "SELECT * FROM users";

  // mysqli_query function sends in the above query and connection. 
  $select_users = mysqli_query($connection,$query);

  //condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_users)) {

    // values we bring back and assign to variable
    $userId = $row['userId'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    
    //display 
    echo "<tr>";    
    echo "<td>$userId</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>"; 
    echo "<td>$user_email</td>";  
    echo "<td>$user_role</td>";

    // POPULATE URL WITH - KEY&VALUE
    echo "<td><a href='users.php?change_to_admin=$userId'>admin</a></td>";
    echo "<td><a href='users.php?change_to_sub=$userId'>subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user=$userId'>Edit</a></td>";
    echo "<td><a href='users.php?delete=$userId'>Delete</a></td>";
    echo "</tr>";

  }

  ?>

  </tbody>
</table><!-- table table-bordered table-hover -->

<?php

//  IF SET GET [KEY] 
if(isset($_GET['change_to_admin'])){

  // CATCH THE ID
  $the_user_id = $_GET['change_to_admin'];
  
  // UPDATE table set COL equal to this value where COL equals THE ID
  $query="UPDATE users SET user_role = 'admin' WHERE userId = $the_user_id";
  
  // SEND IN 
  $change_to_admin_query = mysqli_query($connection,$query);
  
  // refresh the on submited at this location
  header("Location: users.php");
}

//  IF PRESSED
if(isset($_GET['change_to_sub'])){
//echo $_GET['change_to_sub']; 
  //  CATCH change_to_sub
  $the_user_id = $_GET['change_to_sub']; 
  
  // update table set col to equal this value where column equal to $var; 
  $query = "UPDATE users SET user_role = 'subscriber' WHERE userId = {$the_user_id}";
  
  // function performs a query against a database to send in. 
  $change_to_sub_query = mysqli_query($connection,$query);
  
  // then refresh the page everytime it is submited
  header("Location: users.php");
  
}

//  if pressed
if(isset($_GET['delete'])){

//  then convert that into the $var
$the_user_id = $_GET['delete']; 

// query the database for {$the_comment_id}
$query = "DELETE FROM users WHERE userId = {$the_user_id} ";

// function performs a query against a database to send in. 
$delete_user_query = mysqli_query($connection,$query);

// then refresh the page everytime it is submited
header("Location: users.php");

}

?>