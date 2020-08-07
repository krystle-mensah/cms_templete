<?php include "includes/db.php" ?>

<!-- include header.php page here -->
<?php include "includes/header.php" ?>

	<!-- Navigation -->
	<?php include "includes/navigation.php"?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">



<?php 

// Detact event on the index
if(isset($_GET['p_id'])){
	// Each value when clicked
	$the_post_id = $_GET['p_id'];
}

?>
				
				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>

			<?php
			 // select all posts from database where the id is equal to the event var. 
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

			// function to perform a query against the database and i pass in the connection a query.  
			$select_all_posts_query = mysqli_query($connection,$query);

			// while the condition is true fetch the row representing the array from $select_all_posts_query 
			while($row = mysqli_fetch_array($select_all_posts_query)) {

				// Then assign the row array to a variable
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				// reference form the database
				$post_image = $row['post_image'];
				$post_content = $row['post_content'];

				?>
				
				<!-- Then display the fetch row form the database in the browser.  -->
				<!-- First Blog Post -->
				<h2>
					<a href="#"><?php echo $post_title ?></a>
				</h2>
				<p class="lead">
					by <a href="index.php"><?php echo $post_author ?></a>
				</p>
				
				<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
				
				<hr>
				<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
				
				<hr>
				
				<p><?php echo $post_content ?></p>

				<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

				<hr>
			
			<?php } ?>

		<!-- Blog Comments -->

				<?php
				
				// if detected
				if(isset($_POST['create_comment'])){

					//echo $_POST['comment_author'];

					// and get this from the url
					$the_post_id = $_GET['p_id'];

					// then catch the data from the form in $var.
					$comment_author = $_POST['comment_author'];
					$comment_email = $_POST['comment_email'];
					$comment_content = $_POST['comment_content'];

					// insert into comment table and the colums of the table. comment_status will be static.  
					$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";
					
					// values when sending in from our form
					$query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

					//send the query in
					$create_comment_query = mysqli_query($connection, $query);

					// if this is not a query 
					if(!$create_comment_query){

						//send me a message with why it faild
						die('Query FAILED' . mysqli_error($connection));
					}

				}

				?>

				<!-- Comments Form -->
				<div class="well">
					<h4>Leave a Comment:</h4>
					<form action="" method="post" role="form">
						<div class="form-group">
							<label for="Author">Author</label>
							<input type="text" class="form-control" name="comment_author">
						</div>
						<div class="form-group">
							<label for="Email">Email</label>
							<!-- type adds validation -->
							<input type="email" class="form-control" name="comment_email">
						</div>
						<div class="form-group">
							<label for="comment">Your Comment</label>
							<textarea name="comment_content" class="form-control" rows="3"></textarea>
						</div>
						<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
					</form>
				</div>

				<hr>

				<!-- Posted Comments -->

				<?php 

// selsct all from comments where COL is equal to $the_post_id = $_GET['p_id']; 
$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";

//and comment_status equal approved
$query .= "AND comment_status = 'approved' ";

// order by the newest comment first
$query .= "ORDER BY comment_id DESC ";

// sending query in
$select_comment_query = mysqli_query($connection, $query);

// if not a query 
if(!$select_comment_query) {
		// kill script and terminte with a message
		die('Query Failed' . mysqli_error($connection));
}

// while $var is true condition it to fetch a result $row as an associative array:
while ($row = mysqli_fetch_array($select_comment_query)) {
// catch the row and hold in $var.
$comment_date   = $row['comment_date']; 
$comment_content = $row['comment_content'];
$comment_author = $row['comment_author'];
		
				?>

<!-- Comment -->
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://placehold.it/64x64" alt="">
		</a>
		<div class="media-body">
			<h4 class="media-heading"><?php echo $comment_author; ?>
				<small><?php echo $comment_date; ?></small>
			</h4>
			<?php echo $comment_content; ?>
		</div>
	</div>


<?php }?>


			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

<?php include "includes/footer.php" ?>