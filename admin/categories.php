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

						<?php insert_categories(); ?>

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
									<?php findAllCategories(); ?>

									<?php deleteCategories(); ?>	
								
								</tbody>
							</table> <!-- table table-bordered table-hover -->

						</div><!-- col-xs-6 -->
						
					</div> <!-- col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

		</div><!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
