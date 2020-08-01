
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>      
    <!-- </tr> -->
  </thead>
  <tbody>

  <?php 

  // select all from the posts table.
  $query = "SELECT * FROM posts";

  // mysqli_query function sends in the above query and connection. 
  $select_posts = mysqli_query($connection,$query);

  //condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_posts)) {

    // values we bring back and assign to variable
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    
    //display 
    echo "<tr>";    
    echo "<td>$post_id</td>";
    echo "<td> $post_author</td>";
    echo "<td> $post_title</td>";
      
      // select ALL from the table where [column name] variable is equal to this [column name] variable.
      $request_to = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                          
      // function to send query into the database. 
      $select_categories_id = mysqli_query($connection,$request_to);
       
      // while the condition is true fetch the row representing the array from ($variable - see above)
      while($row = mysqli_fetch_array($select_categories_id)) {
        // Then assign the array to a variable
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        // display the cat title 
        echo "<td>{$cat_title}</td>";
      }
      
    echo "<td>$post_status</td>";
    echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
    echo "<td>$post_tags</td>";
    echo "<td>$post_comment_count</td>";
    echo "<td>$post_date</td>";
    //passing the page and the post id. 
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    //send it to the url
    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "</tr>";
  }

  ?>

  </tbody>
</table><!-- table table-bordered table-hover -->

<?php

// if this is set
if(isset($_GET['delete'])){

  // then convert this into the $the_post_id variable
  $the_post_id = $_GET['delete']; 

  // delete
  $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

  // function performs a query against a database to send in. 
  $delete_query = mysqli_query($connection,$query);

}

?>