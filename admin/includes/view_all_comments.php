
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comments</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>            
    <!-- </tr> -->
  </thead>
  <tbody>

  <?php 

  // select all from the posts table.
  $query = "SELECT * FROM comments";

  // mysqli_query function sends in the above query and connection. 
  $select_comments = mysqli_query($connection,$query);

  //condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_comments)) {

    // values we bring back and assign to variable
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    $comment_date = $row['comment_date'];
    
    //display 
    echo "<tr>";    
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";
      
      // // select ALL from the table where [column name] variable is equal to this [column name] variable.
      // $request_to = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                          
      // // function to send query into the database. 
      // $select_categories_id = mysqli_query($connection,$request_to);
       
      // // while the condition is true fetch the row representing the array from ($variable - see above)
      // while($row = mysqli_fetch_array($select_categories_id)) {
      //   // Then assign the array to a variable
      //   $cat_id = $row['cat_id'];
      //   $cat_title = $row['cat_title'];
      //   // display the cat title 
      //   echo "<td>{$cat_title}</td>";
      // }
      
    echo "<td>$comment_status</td>";
    echo "<td>$comment_date</td>";
    //passing the page and the post id. 
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Approve</a></td>";
    //send it to the url
    echo "<td><a href='posts.php?delete={$post_id}'>Unapprove</a></td>";
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

// // if this is set
// if(isset($_GET['delete'])){

//   // then convert this into the $the_post_id variable
//   $the_post_id = $_GET['delete']; 

//   // delete
//   $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

//   // function performs a query against a database to send in. 
//   $delete_query = mysqli_query($connection,$query);

// }

?>