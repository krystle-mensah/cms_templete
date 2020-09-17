<?php include "includes/admin_header.php"; ?>

<?php 

//// TEST - For session
//// if (isset($_SESSION['username'])) {
////   echo $_SESSION['username'];
//// }

?>

<?php

// CHECK session is set
if(isset($_SESSION['username'])) {
  
  // IF SET CONVERT TO VAR.
  $username = $_SESSION['username'];

	// SELECT ALL FROM USER WHERE COLUMN = 'SESSION'
	$query = "SELECT * FROM users WHERE username = '{$username}' ";

	// SEND IN 
	$_select_user_profile_query = mysqli_query($connection, $query);

	// CONDITION TO LOOP THROUGH ROW {$username}
	while( $row = mysqli_fetch_array( $_select_user_profile_query ) ){

		// THEN PULL OUT VALUES FROM DATABASE
		$userId = $row['userId'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    //$user_role = $row['user_role'];

  }

}

// IF PRESSED
if(isset($_POST['edit_user'])){

  // PICK UP VAULES
  $user_firstname = $_POST['user_firstname'];
  $user_lastname  = $_POST['user_lastname'];
  //$user_role  = $_POST['user_role'];
  $username       = $_POST['username'];
  $user_email     = $_POST['user_email'];
  $user_password  = $_POST['user_password'];
  
  // INSERT INTO TABLE
  $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', username = '{$username}', user_email = '{$user_email}', 
  user_password = '{$user_password}' WHERE username = '{$username}' ";

  //SEND IT IN
  $edit_user_query = mysqli_query($connection, $query);
  
  // CONFIRM QUERY
  confirmQuery($edit_user_query); 

}



?>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "includes/admin_navigation.php"; ?>
	
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
            <h1 class="page-header">
							Profile page 
							<!-- <small>Author</small> -->
						</h1><!-- page-header -->
            


            <!-- multipart/form-data lets you send encoded data  -->
            <form action="" method="post" enctype="multipart/form-data"> 

              <div class="form-group">
                <label for="title">First Name</label>
                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
              </div>

              <div class="form-group">
                <label for="title">Last Name</label>
                <input type="text" value="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">
              </div>

              <!-- <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file"  name="image">
              </div> -->

              <div class="form-group">
                <label for="title">Username</label>
                <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
              </div>

              <div class="form-group">
                <label for="post_content">Email</label>
                <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
              </div>

              <div class="form-group">
                <label for="post_content">Password</label>
                <input autocomplete="off" type="password" class="form-control" name="user_password">
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
              </div>

            </form>

					</div> <!-- col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

		</div><!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
