<?php include "includes/admin_header.php"; ?>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "includes/admin_navigation.php"; ?>
	
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Welcome to admin
							<small>Author</small>
						</h1><!-- page-header -->

						<div class="col-xs-6">

						<?php 
						
  
  

  // if anything happens when add category is clicked
  if(isset($_POST['submit'])) {
    ////display this
    ////echo "<h1>hello</h1>";

    $cat_title = $_POST['cat_title'];

    //// if cat_title is equal to empty string or function to check is var is empty
    if($cat_title == "" || empty($cat_title)) {
      //// Then display this.
      echo "This field should not empty";

    }else{

      //// insert what user inputs to the categories table and colum cat_title. 
      $query = "INSERT INTO categories(cat_title) ";
      
      // //and assign value to variable. 
      $query .= "VALUE('{$cat_title}')";

      //// then function to send query in to the database. 
      $create_category_query = mysqli_query($connection, $query);
    
      //// check if query was succesful
      if(!$create_category_query) {
        
        //// function to terminate query and function for description of problem.  
        die('QUERY FAILED' . mysqli_error($connection));

      }

    } // End else

  } // isset function

?>

							<form action="" method="post">
								<div class="form-group">
								<label for="cat-title">Add Category</label>
									<input class="form-control" type="text" name="cat_title">
								</div><!-- form-group -->
								<div class="form-group">
									<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
								</div><!-- form-group -->
							</form> <!-- Add Category form -->

							<?php // UPDATE AND INCLUDE QUERY

							// DECTECT - if the edited link is declared 
							if(isset($_GET['edit'])){

								// IF TRUE - ASSIGN TO cat_id. 
								$cat_id = $_GET['edit'];

								// PATH TO UPDATE_CATEGORIES.PHP
								include "includes/update_categories.php";

							}

							?>

						</div> <!-- col-xs-6 -->

						<!-- END - Category form -->

						<div class="col-xs-6">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Category Title</th>
									</tr>
								</thead>
								<tbody>
								<?php
								
//select all from the categories table.
$query = "SELECT * FROM categories";
										
//function sends in the query and connection. 
$select_categories = mysqli_query($connection,$query);

// while the condition is true fetch the row representing the array from ($variable)
while($row = mysqli_fetch_array($select_categories)) {
	// Then assign the array to a variable
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	echo "<tr>";
	// Then display the fetch row form the database in the browser. 
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		// delete button
		echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
		// Edited link
		echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
	echo "</tr>";
}


?>
									<?php 
									
									

										
									
										//check for the delete key
										if(isset($_GET['delete'])) {
											// if good save it in here
											$the_cat_id = $_GET['delete'];
									
											// query to delete from categories where, then we reference the column in the database which is called cat_id equal to the $the_cat_id
											$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
									
											// send in
											$delete_query = mysqli_query($connection, $query);
									
											// refrash in this location
											header("Location: categories.php");
											
										}
									
									
									
									?>	
								
								</tbody>
							</table> <!-- table table-bordered table-hover -->

						</div><!-- col-xs-6 -->
						
					</div> <!-- col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

		</div><!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
