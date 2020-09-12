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

        // Here we are checking for a submit which is a button on sidebar.
        if(isset($_POST['submit'])) {
          
          // user search word 
          $search = $_POST['search'];// Output - what the user enters into search
          
          // Requst for the table where the field has values like search
          $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

          // Then we send the query in. 
          $search_query = mysqli_query($connection, $query);

          // If not a variable
          if(!$search_query) {

            // then print a message and terminate the current script: with error message and the connection.
            die("QUERY FAILED" . mysqli_error($connection));
          }

          //TEST
          // count rows coming out of our query
          // This function returns the number of rows in a result set and we pass in the query.  
          $count = mysqli_num_rows($search_query);
        
          if($count == 0 ) {

            echo "<h1> NO RESULT </h1>";

          } else {

            // fetch the row representing the array from $select_all_posts_query 
            while($row = mysqli_fetch_array($search_query)) {

              // Then assign the row value
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              // reference form the database
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];

              ?>
              
              <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
              </h1>

              <!-- BLOG POST -->
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

          }//IF STATEMENT

        } //IF SUBMIT

      ?>

<!-- catching the name="search" -->
<!-- test - echo $_POST['search']; -->
				
			</div><!-- ALIGEMENT--> 

			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php" ?>

		</div><!-- /.row -->

		<hr>
<?php include "includes/footer.php" ?>