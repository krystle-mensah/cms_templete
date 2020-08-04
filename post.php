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

// listening for an event on the index
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
			 // select all post from database where the id is equal to the event var. 
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

					// then catch the data from the form. 
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

				<!-- Comment -->
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="http://placehold.it/64x64" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Start Bootstrap
							<small>August 25, 2014 at 9:30 PM</small>
						</h4>
						Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
					</div>
				</div>

				<!-- Comment -->
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="http://placehold.it/64x64" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Start Bootstrap
							<small>August 25, 2014 at 9:30 PM</small>
						</h4>
						Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						<!-- Nested Comment -->
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object" src="http://placehold.it/64x64" alt="">
							</a>
							<div class="media-body">
								<h4 class="media-heading">Nested Start Bootstrap
									<small>August 25, 2014 at 9:30 PM</small>
								</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							</div>
						</div>
						<!-- End Nested Comment -->
					</div>
				</div>






			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

<?php include "includes/footer.php" ?>