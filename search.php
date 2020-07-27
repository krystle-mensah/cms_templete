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


// Here we are checking for a submit.
if(isset($_POST['submit'])) {
  
  // user search word 
  $search = $_POST['search'];
  
  // query to select all post like our $search variable.
  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

  // Then we send the query in. 
  $search_query = mysqli_query($connection, $query);

  // If not a variable
  if(!$search_query) {

    // DIE - then kill everything after it then output something.
    // Function returns the last error description for the most recent function call, if any. 
    die("QUERY FAILED" . mysqli_error($connection));
  }

  // This function returns the number of rows in a result set and we pass in the query.  
  $count = mysqli_num_rows($search_query);

  if($count == 0 ) {

    echo "<h1> NO RESULT </h1>";

  } else {

    // while the condition is true fetch the row representing the array from $select_all_posts_query 
    while($row = mysqli_fetch_array($search_query)) {

      // Then assign the row array to a variable
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      // reference form the database
      $post_image = $row['post_image'];
      $post_content = $row['post_content'];

      ?>

      <!-- Then display the fetch row form the database in the browser.  -->
      
      <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
      </h1>

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
    
    <?php } 
  }

}

?>

<!-- catching the name="search" -->
<!-- test - echo $_POST['search']; -->
				
			</div>

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

		<hr>
<?php include "includes/footer.php" ?>