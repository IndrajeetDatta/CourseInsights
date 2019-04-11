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
else 
{
    // Makes it easier to read
  
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $title = $_SESSION['title'];
    $institution = $_SESSION['institution'];
    $bio = $_SESSION['bio'];
    
}
$message = '';

if(isset($_POST["upload"]))
{
  if(isset($_POST['courseName']) && isset($_POST['courseNumber']))
  {
    $courseName = $_POST['courseName'];
    echo $courseName;

     $courseNumber = $_POST['courseNumber'];
    echo $courseNumber;

     $sql_courses = "INSERT INTO courses"."(course_name, course_number, user_id) "."VALUES('$courseName', '$courseNumber', '$user_id');";

      echo $sql_courses;

      if ($mysqli->query($sql_courses))
        {

          echo "Courses database updated!";

        }
        else
        {
          echo "Update failed";
        }
  }

} 

  
    $userID = $mysqli->escape_string($user_id);
    $query_selectCourses = "SELECT * FROM courses WHERE user_id='$userID'";

    $result = $mysqli->query($query_selectCourses);
    if ( $result->num_rows == 0 )
    { // User doesn't exist
      echo "No Courses Found!";
    } 
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

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      
     
    </ul>
    
  </div>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"> <?php echo $first_name.' '.$last_name ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> Logout </a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron">
   <div class="form">
          <h1 align="center">Welcome <?= $first_name.' '.$last_name.'!' ?></h1>
            
          <!-- <p>
          <?php 
     
          // Display message about account verification link only once
          // if ( isset($_SESSION['message']) )
          // {
          //     echo $_SESSION['message'];
              
          //     // Don't annoy the user with more messages upon page refresh
          //     unset( $_SESSION['message'] );
          // }
          
          ?>
          </p> -->
          
          <!-- <?php
          
          // Keep reminding the user this account is not active, until they activate
          // if ( !$active ){
          //     echo
          //     '<div class="info">
          //     Account is unverified, please confirm your email by clicking
          //     on the email link!
          //     </div>';
          // }
          
          ?> -->
          
          <h3 align="left">Job Title: <?= $title ?> </h3>
          <h3 align="left">Institution: <?= $institution ?> </h3>
          <h3 align="left">Bio: <?= $bio ?></h3>
          <br>
          <br>

          <form method="post" enctype='multipart/form-data'>
            <h3 align="center"> Upload a new course for visualization! </h3>
            <!-- <p align="center"> Please Select Files(Only CSV Format)</label> </p> -->

            <div>            
              <h3 align="center"> Course Name </h3>
              <input type="text" name="courseName">
            </div>
            <div>            
              <h3 align="center"> Course Number </h3>
              <input type="text" name="courseNumber">
            </div>
           <!--  <br>
            <h3 align="center"> Chapters Table </h3>
            <input type="file" name="csv_file1"/>
            <br /><br>
            <h3 align="center"> Videos Table </h3>
            <input type="file" name="csv_file2" />
            <br /><br>
            <h3 align="center"> Problems Table </h3>
            <input type="file" name="csv_file3" />
            <br /><br>
            <h3 align="center"> Discussions Table </h3>
            <input type="file" name="csv_file4" />
            <br /><br>
            <h3 align="center"> HTMLs Table </h3>
            <input type="file" name="csv_file5" />
            <br /> -->
            <br>
            <div>
              <input type="submit" name="upload" class="button button-block" value="Upload" />
            </div>
          </form>
    </div>
    
    <h3 align="center"> Your Courses </h3>
   <br />
    <form method="post" action="courseDash.php">
       <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Course Name</th>
      <th>Course Number</th>
      <th></th>
     </tr>
      <?php
        while($row = mysqli_fetch_array($result))
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
