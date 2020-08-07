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
				
				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>

			<?php
			 // select all the post table colums from database. 
			$query = "SELECT * FROM posts";
			//echo $query; //SELECT * FROM posts

			// function to perform a query against the database and i pass in the connection a query.  
			$select_all_posts_query = mysqli_query($connection,$query);
			
			//echo 	$select_all_posts_query; //Object of class mysqli_result could not be converted to string
			
			// while the condition is true fetch the row representing the array from $select_all_posts_query 
			while($row = mysqli_fetch_array($select_all_posts_query)) {
				
				//echo $row; // Notice: Array to string conversion

				// Then assign the row array to a variable
				$post_id = $row['post_id']; // 2
				$post_title = $row['post_title']; //
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				// reference form the database
				$post_image = $row['post_image'];
				
				// return content from 0 string to 400 string includeding spaces
				$post_content = substr($row['post_content'],0,400);

				?>
				
				<!-- Then display the fetch row form the database in the browser.  -->
				<!-- First Blog Post -->
				<h2>
					<!-- when clicked that the specific post -->
					<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
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

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

<?php include "includes/footer.php" ?>