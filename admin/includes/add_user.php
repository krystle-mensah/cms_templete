



<?php 



// if this is declared/PRESSED
if(isset($_POST['create_user'])){
  
  // create a test
  //echo $_POST['title'];

  // assign all values from form to variables
  $user_firstname        = $_POST['user_firstname'];
  $user_lastname  = $_POST['user_lastname'];
  $user_role  = $_POST['user_role'];
  // $post_image        = $_FILES['image']['name'];
  // $post_image_temp   = $_FILES['image']['tmp_name'];
  $user_name         = $_POST['user_name'];
  $user_email      = $_POST['user_email'];
  $user_password         = date('user_password');

  // function to move files to new place. temp place the images folder 
  //move_uploaded_file($post_image_temp, "../images/$post_image" );

  // query to insert to database
  $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags, post_comment_count, post_status) ";

  // values we are inserting from the from. we are not getting the hard code from the $post_comment_count = 4; here any more
  $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') "; 
  
  // then we send the query in
  $create_post_query = mysqli_query($connection, $query); 

  // function to confirm result
  confirmQuery($create_post_query);

}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
   
    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber">select option</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
    </select>
    
  </div> <!-- form-group -->

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
  </div> -->

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="user_name">
  </div>

  <div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>

</form>