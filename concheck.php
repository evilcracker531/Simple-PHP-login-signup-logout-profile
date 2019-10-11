<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="usertest";
// Create connection
$con = new mysqli($servername, $username, $password,$dbname);

// Check connection
 if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 } 
 echo "Connected successfully ";

// $sql=" Create Database usertest";
// if($con->query($sql)==True){
//     echo " Done creating db ";
// }
// else{
//     echo " db Not created ";
// }


$sql="USE user";
if($con->query($sql)==true)
{
    echo " using DB ";
}
else{
    echo " not use";
}

$sql = "CREATE TABLE user (
    email VARCHAR(20) PRIMARY KEY, 
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    pwd VARCHAR(15) ,
    phone int(10)  
    )";

if ($con->query($sql) === TRUE) {
    echo " Table userinfo test created successfully";
} else {
    echo "Error creating table: " . $con->error;
}


// $sql = "INSERT INTO user VALUES ('John1@gamil.com', 'john', 'matheives','hello','india','mumbai')";

// if ($con->query($sql) === TRUE) {
//     echo " New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }
// /*
// if ($con->query($sql) === TRUE) {
//     $last_id = $con->insert_id;
//     echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }

?>

