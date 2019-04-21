<?php
	session_start();
	require 'db.php';
	if ( $_SESSION['logged_in'] != 1 ) 
  	{
    	$_SESSION['message'] = "You must log in before viewing this page";
    	header("location: error.php");    
  	}

	$courseID = $_SESSION['course_id'];
	$isAdmin = $_SESSION['isAdmin'];
	$isAdminCourse = $_SESSION['isAdminCourse'];

	$delete_courses = $mysqli->query("DELETE FROM courses WHERE course_id='$courseID'");
	
	echo $isAdmin;
	
	if($isAdmin == 0)
	{
		header("location: profile.php"); 
	}
	else 
	{
		echo "This is admin";
		if($isAdminCourse == 1)
		{
			header("location: adminProfile.php");
		}
		else
		{
			header("location: userPage-admin.php");
		}
	}

?>
