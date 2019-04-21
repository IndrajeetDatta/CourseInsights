<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
if(isset($_POST['submit']))
{
  $viewUserID = $_POST['submit'];
  $_SESSION['viewUserID'] = $viewUserID;
}
else
{
  $viewUserID = $_SESSION['viewUserID'];
}

$result_user = $mysqli->query("SELECT * FROM user WHERE user_id = '$viewUserID'");
$viewUser = $result_user->fetch_assoc();
$_SESSION['viewuser_id'] = $viewUser['user_id'];
$_SESSION['viewemail'] = $viewUser['email'];
$_SESSION['viewfirst_name'] = $viewUser['f_name'];
$_SESSION['viewlast_name'] = $viewUser['l_name'];
$_SESSION['viewinstitution'] = $viewUser['institution'];
$_SESSION['viewtitle'] = $viewUser['title'];
$_SESSION['viewIsAdmin'] = $viewUser['isAdmin'];

$query_selectCourses = "SELECT * FROM courses WHERE user_id='$viewUserID'";
$result_viewCourses = $mysqli->query($query_selectCourses);

$viewFirstName=$_SESSION['viewfirst_name'];
$viewLastName=$_SESSION['viewlast_name'];
$viewEmail=$_SESSION['viewemail'];
$viewInstitution=$_SESSION['viewinstitution'];
$viewTitle=$_SESSION['viewtitle'];
$viewIsAdmin=$_SESSION['viewIsAdmin'];

$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$active = $_SESSION['active'];
$title = $_SESSION['title'];
$institution = $_SESSION['institution'];
$bio = $_SESSION['bio'];
$isAdmin = $_SESSION['isAdmin'];

     
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>

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
          <?php 
            if($viewIsAdmin == 0)
            {
              echo '
            <li class="nav-item">
                <a class="nav-link" href="addAdmin.php"> Make Admin </a>
            </li>';
            }
            ?>
            <?php 
            if($viewIsAdmin == 0)
            {
              echo '
              <li class="nav-item">
                 <a class="nav-link" href="deleteUser.php"> Delete User </a>
              </li>';
            }
            ?>
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
  <h3>User name: <?php echo $viewFirstName." ".$viewLastName; if($viewIsAdmin==1){echo ' (admin)';}?> </h3>
  <h3>Email: <?php echo $viewEmail ?></h3>
  <h3>Institute: <?php echo $viewInstitution ?> </h3>
  <h3>Title: <?php echo $viewTitle ?></h3>
    <h3 align="center"> User Courses </h3>
   <br />
    <form method="post" action="courseDash-admin.php">
       <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Course Name</th>
      <th>Course Number</th>
      <th></th>
     </tr>
      <?php
        while($row = mysqli_fetch_array($result_viewCourses))
        {
          echo '
          <tr>
          <td>'.$row["course_name"].'</td>
          <td>'.$row["course_number"].'</td>
          <td><button type="submit" name="courseID" value='.$row["course_id"].'> Go to course page </td>
          </tr>
          ';
        }
     ?>
    </table>
   </div>
    </form>
  
</div>
 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
