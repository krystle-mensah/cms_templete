<?php include "includes/admin_header.php"; ?>

	<div id="wrapper">
		<!-- ////checking the db connection in admin -->
		<?php ////if ($connection) echo "conn"; ?>
		<!-- Navigation -->
		<?php include "includes/admin_navigation.php"; ?>
	
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Welcome to admin
							<!--
							156. Setting Values with Sessions 
							Im going to echo some of the sessions 
							-->
							<small><?php echo $_SESSION['username'] ?></small>
						</h1><!-- page-header -->
					</div> <!-- col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

		</div><!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
