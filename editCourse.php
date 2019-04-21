<?php
	session_start();
	require 'db.php';
	if ( $_SESSION['logged_in'] != 1 ) 
  	{
    	$_SESSION['message'] = "You must log in before viewing this page";
    	header("location: error.php");    
  	}
    $user_id = $_SESSION['user_id'];
	$courseID = $_SESSION['course_id'];
	
	$delete_chapters = $mysqli->query("DELETE FROM chapters WHERE course_id='$courseID'");
	$delete_videos = $mysqli->query("DELETE FROM videos WHERE course_id='$courseID'");
	$delete_problems = $mysqli->query("DELETE FROM problems WHERE course_id='$courseID'");
	$delete_discussions = $mysqli->query("DELETE FROM discussions WHERE course_id='$courseID'");
	$delete_htmls = $mysqli->query("DELETE FROM htmls WHERE course_id='$courseID'");

	$updateQuery = "UPDATE courses SET isUpdated='0' WHERE course_id='$courseID';";
    $mysqli->query($updateQuery);  

	header("location: courseDash.php"); 

?>
