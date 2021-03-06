
  <form action="" method="post">
    <div class="form-group">
    <label for="cat-title">Edit Category</label>

    <?php

    // if detected edit click
    if(isset($_GET['edit'])){
      
      // if TRUE - then catch it
      $cat_id = $_GET['edit'];

      // select all from the categories table where cat_id is equal to cat_id catched.
      $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                          
      // function to send query in to the database. 
      $select_categories_id = mysqli_query($connection,$query);
      
      // while the condition is true fetch the row representing the array from ($variable - see above)
      while($row = mysqli_fetch_array($select_categories_id)) {
        // Then assign the array to a variable
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        ?>
        <!-- if variable is detected echo it in the input -->
        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text" name="cat_title">

        <?php }
      
    } ?>

    <?php
    
    // UPDATE QUERY

    // If you detect this
    if(isset($_POST['update_category'])) {
      
      // then we get the cat_title
      $the_cat_title = $_POST['cat_title'];

      // query to update categories and set cat title to variable from form
      $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";

      // send in. function to perfrom agasint the database
      $update_query = mysqli_query($connection, $query);

      // if NOT
      if( !$update_query ){
        
        // kill script and return error.
        die("QUERY FAILED" . mysqli_error($connection));

      }
      
    }

    ?>

    </div><!-- form-group -->
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div><!-- form-group -->
  </form> <!-- Edit Category form -->
