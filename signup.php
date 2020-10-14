<!doctype html>
<html>
<?php
  $email=htmlspecialchars($_POST['email']);
  $first=htmlspecialchars($_POST['fname']);
  $last=htmlspecialchars($_POST['lname']);
  $passwd=htmlspecialchars($_POST['pwd']);
  $phone=htmlspecialchars($_POST['phone']);

  $sql="INSERT INTO user values('$email','$first','$last','$passwd','$phone')";
  $con = new mysqli('localhost', 'root', '','usertest');
  if($con->query($sql)==TRUE)
  {
    echo "Signed up";
    header('Location: login.php');
      session_start();
  }
  else{
    echo "not signed up";
   // header('Location: sign_err.html'); Create A page sign up error 
      
  }
?>
