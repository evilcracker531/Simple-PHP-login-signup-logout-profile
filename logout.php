<!doctype>
<html>
<title>Logout</title>
<body>
<?php
if(isset($_COOKIE['email']) and isset($_COOKIE['pass']))
{
    $email=$_COOKIE['email'];
    $pass=$_COOKIE['pass'];
    //setcookie('email',($email),time()+24*60*60,"/","", 0);
    setcookie("email", "$email",time()-24*3600,'/','',0);
    setcookie("pass", "$pass",time()-24*3600,'/','',0);
    session_destroy();
    echo "logged out";
    header('Location: login.php');
}
else{
    echo "not logged out";
}
?>
</body>
</html>