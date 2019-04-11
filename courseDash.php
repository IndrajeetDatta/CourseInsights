<?php
	session_start();
	require 'db.php';

    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $title = $_SESSION['title'];
    $institution = $_SESSION['institution'];
    $bio = $_SESSION['bio'];

	$courseID = $_POST['courseID'];
	$_SESSION['course_id'] = $courseID;
	$result = $mysqli->query("SELECT * FROM courses WHERE course_id='$courseID'");
	$course = $result->fetch_assoc();
	$isCourseUpdated = $course['isUpdated'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Course Dashboard </title>
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
	<?php 
		if($isCourseUpdated == 0)
		{
			echo ' 
			<div class="jumbotron">
			<h3 align="center"> You have not updated your course. Please update your course to see the visualization </h3>
   			<div class="form">	
   			 <form method="post" action="uploadcsv.php" enctype="multipart/form-data">
            <h3 align="center"> Chapters Table </h3>
            <input type="file" name="csv_chapters"/>
            <br /><br>
            <h3 align="center"> Videos Table </h3>
            <input type="file" name="csv_videos" />
            <br /><br>
            <h3 align="center"> Problems Table </h3>
            <input type="file" name="csv_problems" />
            <br /><br>
            <h3 align="center"> Discussions Table </h3>
            <input type="file" name="csv_discussions" />
            <br /><br>
            <h3 align="center"> HTMLs Table </h3>
            <input type="file" name="csv_htmls" />
            <br />
            <div>
              <input type="submit" name="upload" class="button button-block" value="Upload" />
              </form>
            </div>
    	</div>';
     
		}
		?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>