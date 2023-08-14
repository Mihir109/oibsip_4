<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $host="localhost";
    $dbusername ="root";
    $dbpassword="";
    $dbanme = "auth";

    $conn= new mysqli($host, $dbusername, $dbpassword, $dbanme);

    if($conn->connect_error)
    {
        die("connection failed:".$conn->connection_error); 
    }

    $query="SELECT *FROM login WHERE email='$email' AND password='$password'";

    $result = $conn->query($query);
    if($result ->num_rows==1)
    {
        header("Location: welcome.html");
        exit();
    }
    else
    {
        header("Location: error.html");
        exit();
    }
    $conn->close();
}
?>
