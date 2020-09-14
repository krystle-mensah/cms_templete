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
	$the_post_author = $_GET['author'];
}

?>
				
				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>

			<?php
			 // select all posts from database where the id is equal to the event var. 
			$query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";

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
					All post by <?php echo $post_author ?>
				</p>
				
				<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
				
				<hr>
				<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
				
				<hr>
				
				<p><?php echo $post_content ?></p>

				<hr>
			
			<?php } ?>

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

<?php include "includes/footer.php" ?>