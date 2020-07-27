<?php

function confirmQuery($result) {

  //// make this var global
  global $connection;
  
  //if not a query
  if(!$result){

    // then do this
    die("QUERY FAILED" . mysqli_error($connection));

  }
}

function insert_categories(){
  
  //// make this var global
  global $connection;

  //// if anything happens when add category is clicked
  if(isset($_POST['submit'])) {
    ////display this
    ////echo "<h1>hello</h1>";

    $cat_title = $_POST['cat_title'];

    //// if cat_title is equal to empty string or function to check is var is empty
    if($cat_title == "" || empty($cat_title)) {
      //// Then display this.
      echo "This field should not empty";

    }else{

      //// insert what user inputs to the categories table and colum cat_title. 
      $query = "INSERT INTO categories(cat_title) ";
      
      // //and assign value to variable. 
      $query .= "VALUE('{$cat_title}')";

      //// then function to send query in to the database. 
      $create_category_query = mysqli_query($connection, $query);
    
      //// check if query was succesful
      if(!$create_category_query) {
        
        //// function to terminate query and function for description of problem.  
        die('QUERY FAILED' . mysqli_error($connection));

      }

    } // End else

  } // isset function

}

function findAllCategories() {

  //// make this var global
  global $connection;

  //select all from the categories table.
  $query = "SELECT * FROM categories";
											
  //function sends in the query and connection. 
  $select_categories = mysqli_query($connection,$query);

  // while the condition is true fetch the row representing the array from ($variable)
  while($row = mysqli_fetch_array($select_categories)) {
    // Then assign the array to a variable
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    // Then display the fetch row form the database in the browser. 
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_title}</td>";
      // delete button
      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
      // Edited link
      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
  }

}

function deleteCategories(){

  //// make this var global
  global $connection;

  //check for the delete key
  if(isset($_GET['delete'])) {
    // if good save it in here
    $the_cat_id = $_GET['delete'];

    // query to delete from categories where, then we reference the column in the database which is called cat_id equal to the $the_cat_id
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";

    // send in
    $delete_query = mysqli_query($connection, $query);

    // refrash in this location
    header("Location: categories.php");
    
  }

}

?>