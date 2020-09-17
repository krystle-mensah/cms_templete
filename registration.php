<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php

//first check if the from is working

if( isset( $_POST['submit'] ) ){
	// test
	//echo 'submitted'; //output - click button and we see submitted

	// now we wont to get the values from the user

	$user_firstname = $_POST['user_firstname'];
	$user_lastname 	= $_POST['user_lastname'];
	$username 			= $_POST['username'];
	$email 	  			= $_POST['email']; 
	$password 			= $_POST['password'];

	// check if field are empty

	if( !empty( $user_firstname ) && !empty( $user_lastname ) && !empty( $username ) && !empty( $email ) && !empty( $password ) ){

	// NOW CLEAN DATA

	$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
	$user_lastname 	= mysqli_real_escape_string($connection, $user_lastname);
	$username 			= mysqli_real_escape_string($connection, $username);
	$email 	  			= mysqli_real_escape_string($connection, $email);
	$password 			= mysqli_real_escape_string($connection, $password);

	$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
	
	//now Query the database for these table and theres columns.

	$query = "INSERT INTO users (username, user_email, user_firstname, user_lastname, user_password, user_role)";

	$query .= "VALUES ('{$username}', '{$email}', '{$user_firstname}', '{$user_lastname}', '{$password}', 'subscriber')";

	$register_user_query = mysqli_query($connection, $query);

	if(!$register_user_query) {
		die("QUERY FAILED " . mysqli_error($connection));
	}

	// messge for registion successful

	$message = " Your registration has been submitted.";

	} else {

		$message = " Fields cannot be empty ";
	}//if empty

} else {

	$message = " ";

}//isset 



?>


	<!-- Navigation -->
	<?php  include "includes/navigation.php"; ?>
	
	<!-- Page Content -->
	<div class="container">
	
		<section id="login">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<div class="form-wrap">
						<h1>Register</h1>
							<form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
								
								<h6 class="text-align: center"><?php echo $message; ?></h6>

								<div class="form-group">
									<label for="firstname" class="sr-only">Firstname</label>
									<input type="text" name="user_firstname" id="" class="form-control" placeholder="Enter first name">
								</div>
								<div class="form-group">
									<label for="lastname" class="sr-only">Lastname</label>
									<input type="text" name="user_lastname" id="" class="form-control" placeholder="Enter last name">
								</div>
								<div class="form-group">
									<label for="username" class="sr-only">username</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
								</div>
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
								</div>
								<div class="form-group">
									<label for="password" class="sr-only">Password</label>
									<input type="password" name="password" id="key" class="form-control" placeholder="Password">
								</div>
						
								<input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
							</form>
						
						</div>
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</section>

		<hr>



<?php include "includes/footer.php";?>
