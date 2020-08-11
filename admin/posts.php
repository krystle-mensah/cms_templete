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

            <?php 

            //check if the 'source' has been declared
            if(isset($_GET['source'])){

              // if ture assign variable
              $source = $_GET['source'];

            // we have to put an else because im getting an undefined variable.  
            } else {

              // variable assigned to eptmy string
              $source = '';

            }

            // compare variable with each case.
            switch($source){
              // if source is equal to add post
              case 'add_post';

              //then display this
              include "includes/add_post.php";
            
              // stop
              break;

              // if source is equal to this page
              case 'edit_post';

              //then display this
              include "includes/edit_post.php";
            
              // stop
              break;

              // if case's fail then default to this page.
              default: 

              include "includes/view_all_posts.php";
              
              // stop running  
              break;

            }

            ?>

					</div> <!-- col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->

		</div><!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
