<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

// 158. Logout Page Improved Validation

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");

?>