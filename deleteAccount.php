<?php
session_start();
require 'db.php';
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";
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

   	$delete_courses = $mysqli->query("DELETE FROM user WHERE user_id='$user_id'");

   	header("location: index.php");

?>
