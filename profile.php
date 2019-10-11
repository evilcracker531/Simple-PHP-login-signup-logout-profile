<!doctype>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"type="text/css" href="./style.css" />
<title>profile</title>
</head>
<body>
<body style="background-color:#AAAAAA;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="form-inline my-2 my-lg-0">
            <a class="nav-link enabled" href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
          </li>
                <li class="form-inline my-2 my-lg-0">
                  <a class="nav-link enabled" href="signup.html" tabindex="-1" aria-disabled="true">Sign up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">How it works?</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Fundrise for
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Health</a>
                    <a class="dropdown-item" href="#">Education</a>
                    <a class="dropdown-item" href="#">Emergency</a>
                    <a class="dropdown-item" href="#">Charity</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link enabled" href="#" tabindex="-1" aria-disabled="true">About us</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>

<br></br>
<?php 
if(isset($_COOKIE['email']) and isset($_COOKIE['pass']))
{
$email=$_COOKIE['email'];
$pass=$_COOKIE['pass'];
$con = new mysqli('localhost', 'root', '','usertest');
$sql="SELECT * FROM user WHERE email='$email' and pwd='$pass' ";
$result=$con->query($sql);  
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        //first','$last','$passwd','$phone
        echo "  Email ID:".$row['email']."<br>";
        echo "  Phone No:".$row['phone']."<br>";
        echo "  Password:".$row['pwd'];
    }
}  
}
else
{
    echo "<h2   >Login first</h2>";

}
?>
</body>
</html>

