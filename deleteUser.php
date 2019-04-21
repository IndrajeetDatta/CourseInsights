<?php
	session_start();
	require 'db.php';
	if ( $_SESSION['logged_in'] != 1 ) 
  	{
    	$_SESSION['message'] = "You must log in before viewing this page";
    	header("location: error.php");    
  	}
    $user_id = $_SESSION['viewUserID'];
    
    $delete_courses = $mysqli->query("DELETE FROM user WHERE user_id='$user_id'");

    header("location: viewUsers-admin.php");


?>