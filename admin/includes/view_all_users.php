
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>

  <?php 

  // select all from table.
  $query = "SELECT * FROM users";

  // mysqli_query function sends in the above query and connection. 
  $select_users = mysqli_query($connection,$query);

  //condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_users)) {

    // values we bring back and assign to variable
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    
    //display 
    echo "<tr>";    
    echo "<td>$user_id</td>";
    echo "<td>$user_name</td>";
    echo "<td>$user_firstname</td>";
      
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
    
    echo "<td>$user_lastname</td>"; 
    echo "<td>$user_email</td>";  
    echo "<td>$user_role</td>";

    // select all where post id is equal to the comment_post_id
    //$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    // then we send it in
    //$select_post_id_query = mysqli_query($connection, $query);

    //while $var is true condition it to fetch a result $row as an associative array:
    // while($row = mysqli_fetch_assoc($select_post_id_query)) {
      
    //   $post_id = $row['post_id'];
      
    //   $post_title = $row['post_title'];

    //   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

    // }

    //passing the page and the post id. 
    echo "<td><a href='comments.php?approve='>Approve</a></td>";
    //send it to the url
    echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";
    //send it to the url to be catch
    echo "<td><a href='comments.php?delete='>Delete</a></td>";
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