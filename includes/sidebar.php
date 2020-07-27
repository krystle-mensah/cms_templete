<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
  <h4>Blog Search</h4>
  <!--form to submit post data  -->
  <form action="search.php" method="post">

    <div class="input-group">
      <input name="search" type="text" class="form-control">
      <span class="input-group-btn">
          <button name="submit" class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
      </span> <!-- input-group-btn -->
    </div> <!-- input-group -->

  </form><!-- search form -->
  <!-- /.input-group -->
</div><!-- well -->

<!-- Blog Categories Well -->
<div class="well">

    <?php 
          
    // select all from the categories table.
    $query = "SELECT * FROM categories";
    
    // mysqli_query function sends in the query and connection. 
    $select_categories_sidebar = mysqli_query($connection,$query);
					
    ?> 

    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php 
            // while the condition is true fetch the row representing the array from $select_categories_sidebar 
            while($row = mysqli_fetch_array($select_categories_sidebar)) {
              // Then assign the array to a variable
              $cat_title = $row['cat_title'];

              // then display the fetch row form the database in the browser. 
              echo "<li><a href='/cms/'>{$cat_title}</a></li>";
            }

            ?>
                
            </ul>
        </div>
    </div><!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php";  ?>

</div>