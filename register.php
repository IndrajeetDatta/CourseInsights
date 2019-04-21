<?php


$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['institution'] = $_POST['institution'];
$_SESSION['title'] = $_POST['title'];
$_SESSION['bio'] = $_POST['bio'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$institution = $mysqli->escape_string($_POST['institution']);
$title = $mysqli->escape_string($_POST['title']);
$bio = $mysqli->escape_string($_POST['bio']);

$result = $mysqli->query("SELECT * FROM user WHERE email='$email'") or die($mysqli->error());

if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { 
    $sql_user = "INSERT INTO user(f_name, l_name, email, password, hash, institution, title, bio) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash', '$institution', '$title', '$bio')";

    if ( $mysqli->query($sql_user))
    {

       
        $result = $mysqli->query("SELECT user_id FROM user WHERE email='$email'");
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] = 'Registration successful';
        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}