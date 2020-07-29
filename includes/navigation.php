<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./index.php">Start Bootstrap</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">

					<?php 
					// select all from the categories table. 
					$query = "SELECT * FROM categories";
					// send in te connection and query with the mysqli_query function
					$select_all_categories_query = mysqli_query($connection,$query);
					// while the condition is true fetch the row representing the array from $select_all_categories_query 
					while($row = mysqli_fetch_array($select_all_categories_query)) {
						// then assign the array to a variable
						$cat_title = $row['cat_title'];

						// then display the fetch row form the database in the browser. 
						echo "<li><a href='/cms/'>{$cat_title}</a></li>";
					}
					?> 
					<li>
						<a href="admin">Admin</a>
					</li>
					
				</ul>
			</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>