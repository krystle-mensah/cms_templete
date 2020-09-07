<?php 

// if this is declared/PRESSED
if(isset($_POST['create_user'])){
  
  // create a test
  //echo $_POST['title'];

  // VALUES PICK UP
  $user_firstname        = $_POST['user_firstname'];
  $user_lastname  = $_POST['user_lastname'];
  $user_role  = $_POST['user_role'];
  $username         = $_POST['username'];
  $user_email      = $_POST['user_email'];
  $user_password         = $_POST['user_password'];

  // PASSWORD encryption.
  $user_password =  mysqli_real_escape_string($connection, $user_password);

  //create hash format
  $hashFormat = '$2y$10$';

  // create salt which should be at least 22 charters any charecters
  $salt = 'iusesomecrazystrings22';

  // now we put them together to pass into the crypt function. this well make it very secure
  $hashF_and_salt = $hashFormat . $salt;

  // now we pass it in with the function crypt()
  $user_password = crypt($user_password, $hashF_and_salt);


  // INSERT INTO DATABASE, IN THESE TABLE AND THESES COLUMNS 
  $query = "INSERT INTO users(user_firstname,user_lastname,user_role, username,user_email,user_password) ";

  // INSERT VALUES FROM USER
  $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') "; 
  
  // SEND IN 
  $create_user_query = mysqli_query($connection, $query); 

  // CONFIRM
  confirmQuery($create_user_query);

  // let them no it was created
  echo "<p class='success-button'>User Created. <a href='users.php'>View Users</a>"; 

}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
   
    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber">select option</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
    </select>
    
  </div> <!-- form-group -->

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
  </div> -->

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>

</form>