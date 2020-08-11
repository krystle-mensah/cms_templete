<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">CMS Admin</a>
  </div> <!-- navbar-header -->

  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li><a href="../index.php">HOME SITE</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="fa fa-fw fa-user"></i> Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
      </ul> <!-- dropdown-menu -->
    </li> <!-- dropdown -->
  </ul> <!-- nav navbar-right top-nav -->

  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="posts_dropdown" class="collapse">
          <li><a href="./posts.php">View All Posts</a></li>
          <li><a href="posts.php?source=add_post">Add Posts</a></li>
        </ul> <!-- posts_dropdown --> 
      </li>
      <li><a href="./categories.php"><i class="fa fa-fw fa-file"></i> Categories</a></li>
      <li><a href="comments.php"><i class="fa fa-fw fa-dashboard"></i> Comments</a></li>
      <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="users_dropdown" class="collapse">
          <li><a href="users.php">View All Users</a></li>
          <li><a href="users.php?source=add_user">Add User</a></li>
        </ul><!-- users_dropdown -->
      </li>
      <li><a href="#"><i class="fa fa-fw fa-user"></i> Profile</a></li>
    </ul> <!-- nav navbar-nav side-nav -->
  </div><!-- /.navbar-collapse -->
</nav> <!-- navbar navbar-inverse navbar-fixed-top" role="navigation -->