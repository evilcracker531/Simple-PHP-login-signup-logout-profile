<!doctype>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"type="text/css" href="./style.css" />
    
</head>
<title>login</title>

<body>
<?php

?>
  <body style="background-color:#AAAAAA;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
              
            <li class="form-inline my-2 my-lg-0">
            <a class="nav-link enabled" href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
          </li>
          <li class="nav-item">
                  <a class="nav-link enabled" href="profile.php" tabindex="-1" aria-disabled="true">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link enabled" href="change.php" tabindex="-1" aria-disabled="true">Change Password</a>
                </li>
                <li class="form-inline my-2 my-lg-0">
                  <a class="nav-link enabled" href="signup.html" tabindex="-1" aria-disabled="true">Sign up</a>
                </li>


              </ul>
              
            </div>
          </nav>

<br></br>

        


                <?php
if(isset($_COOKIE['username']) and isset($_COOKIE['pass']))
{
$username=$_COOKIE['username'];
$pass=$_COOKIE['pass'];
$con = new mysqli('localhost', 'root', '','user');
$sql="SELECT * FROM user WHERE username='$username' and hashedpwd='$pass' ";
$result=$con->query($sql);    
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);  
if($count == 1) 
{
            setcookie('username',($username),time()+24*60*60,"/","", 0);
            setcookie('pass',($pass),time()+24*60*60,"/","", 0);
            $_SESSION['id']=$username;
        } 
}
?>
<?php

function getPass($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    
    $username=$_POST['username'];
    $phone=($_POST['phone']);
    $con = new mysqli('localhost', 'root', '','user');
    $sql="SELECT * FROM user WHERE username='$username' and phone='$phone' ";
    $result=$con->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);  
    if($count == 1) 
    {
            $n=10; 
            $newpass=getPass($n);
            echo "<center><h1>New Password: ".$newpass."</h1></center>";
            $hashednewpass=md5($newpass);
            $sql = "UPDATE User SET hashedpwd='$hashednewpass' WHERE  username='$username' and phone='$phone' ";
            if ($con->query($sql) === TRUE) {
            setcookie('username',($username),time()+24*60*60,"/","", 0);
            setcookie('pass',($hashednewpass),time()+24*60*60,"/","", 0);
            session_start();
            $_SESSION['id']=$username;
        
            }
            
    }
    
 else{
            
            ?>      
            <script>
            alert("Invalid username or password");
            document.getElementById("demo").innerHTML = "Paragraph changed!";
            </script>
        <?php 
    }
}
?>


<form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"  enctype="multipart/form-dat">
  <center><h1>Password Reset </h1>
  <p>
      <label>username : </label><input type = "text"  name = "username" /><br>
      <label>phone Number : </label><input type = "text" name = "phone" />
  </p>
  <p id="demo"></p>
  <input type = "submit"  id = "submit" value = "submit"/>
</form>
</center>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
