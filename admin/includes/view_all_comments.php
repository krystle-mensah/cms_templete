
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
    </tr>
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

    echo "<td>$comment_email</td>";  
    echo "<td>$comment_status</td>";

    // select all where post id is equal to the comment_post_id
    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    // then we send it in
    $select_post_id_query = mysqli_query($connection, $query);

    //while $var is true condition it to fetch a result $row as an associative array:
    while($row = mysqli_fetch_assoc($select_post_id_query)) {
      
      $post_id = $row['post_id'];
      
      $post_title = $row['post_title'];

      echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

    }

    // echo "<td>some title</td>";
    echo "<td>$comment_date</td>";
    //passing the page and the post id. 
    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
    //send it to the url
    echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
    //send it to the url to be catch
    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
    echo "</tr>";

  }

  ?>

  </tbody>
</table><!-- table table-bordered table-hover -->

<?php

//  if the unapprove=$comment_id link is pressed
if(isset($_GET['approve'])){

  //  then convert that into the $var.
  $the_comment_id = $_GET['approve']; 
  
  // then query the database for {$the_comment_id}
  $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
  
  // function performs a query against a database to send in. 
  $approve_query = mysqli_query($connection,$query);
  
  // then refresh the page everytime it is submited
  header("Location: comments.php");
}

//  if the unapprove=$comment_id link is pressed
if(isset($_GET['unapprove'])){

  //  CATCH $comment_id and convert that into the $var.
  $the_comment_id = $_GET['unapprove']; 
  
  // then  the database for {$the_comment_id}
  $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
  
  // function performs a query against a database to send in. 
  $unapprove_query = mysqli_query($connection,$query);
  
  // then refresh the page everytime it is submited
  header("Location: comments.php");
  
}

//  if the delete=$comment_id link is pressed
if(isset($_GET['delete'])){

//  then convert that into the $the_comment_id.
$the_comment_id = $_GET['delete']; 

// then query the database for {$the_comment_id}
$query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";

// function performs a query against a database to send in. 
$delete_query = mysqli_query($connection,$query);

// then refresh the page everytime it is submited
header("Location: comments.php");

}

?>