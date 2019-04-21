<?php
	session_start();
	require 'db.php';
	if ( $_SESSION['logged_in'] != 1 ) 
  	{
    	$_SESSION['message'] = "You must log in before viewing this page";
    	header("location: error.php");    
  	}
    $user_id = $_SESSION['user_id'];
    
    $result_resignAdmin = $mysqli->query("UPDATE user SET isAdmin=0 WHERE user_id='$user_id'");

    header("location: profile.php");


?>