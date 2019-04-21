<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing admin  page!";
  header("location: error.php");    
}
	  $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $title = $_SESSION['title'];
    $institution = $_SESSION['institution'];
    $bio = $_SESSION['bio'];
    $isAdmin = $_SESSION['isAdmin'];
    $result_viewusers = $mysqli->query("SELECT * FROM user WHERE isAdmin=0");
    $result_viewadmins = $mysqli->query("SELECT * FROM user WHERE isAdmin=1 AND user_id !=$user_id");
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <?php include 'css/css.html'; ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Course Insights</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="adminProfile.php"> <?php echo $first_name.' '.$last_name.' (admin)' ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> Logout </a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron">
   <h3 align="center"> Other admins on the site </h3>
   <br />
    <form method="post" action="userPage-admin.php">
       <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>User ID</th>
      <th>User Name</th>
      <th>User Email</th>
      <th>Institution</th>
      <th>Title</th>
      <th></th>
     </tr>
      <?php
        while($row = mysqli_fetch_array($result_viewadmins))
        {
          echo '
          <tr>
          <td>'.$row["user_id"].'</td>
          <td>'.$row["f_name"].' '.$row["l_name"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["institution"].'</td>
          <td>'.$row["title"].'</td>
          <td><button type="submit" name="submit" value='.$row["user_id"].'>View User</td>
          </tr>
          ';
        }
     ?>
    </table>
   </div>
    </form><h3 align="center"> Users on the site </h3>
   <br />
    <form method="post" action="userPage-admin.php">
       <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>User ID</th>
      <th>User Name</th>
      <th>User Email</th>
      <th>Institution</th>
      <th>Title</th>
      <th></th>
     </tr>
      <?php
        while($row = mysqli_fetch_array($result_viewusers))
        {
          echo '
          <tr>
          <td>'.$row["user_id"].'</td>
          <td>'.$row["f_name"].' '.$row["l_name"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["institution"].'</td>
          <td>'.$row["title"].'</td>
          <td><button type="submit" name="submit" value='.$row["user_id"].'>View User</td>
          </tr>
          ';
        }
     ?>
    </table>
   </div>
    </form>
  
     </div>
 </div>
?>