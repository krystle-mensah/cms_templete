<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<pre>
This is not working add the one from profolio.
</pre>

<!-- Check if the from is working -->
<?php if( isset( $_POST['submit'] ) ):
  // Test TEST - submit
  ////it by pressing the submit button and seeing the output
	////echo 'submitted'; //output - 
  $to 	   = 'krystle.mensah@gmail.com';
  // save from form this values
  $subject = $_POST['subject'];
  $body 	 = $_POST['body']; 
endif; ?>
<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
          <div class="form-wrap">
          <h1>Contact</h1>
            <form role="form" action="" method="post" id="login-form" autocomplete="off">
              
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
              </div>
              <div class="form-group">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="Subject" id="Subject" class="form-control" placeholder="Enter Subject">
              </div>
              <div class="form-group">
                <textarea name="" class="form-control" id="body" cols="30" rows="10"></textarea>
              </div>
          
              <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
            </form>
          
          </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </section> <!-- /#login -->

  <hr>



<?php include "includes/footer.php";?>
