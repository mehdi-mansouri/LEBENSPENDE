<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
if (isset($_COOKIE['email'])) {
  $sql="SELECT username,email,id,password FROM user WHERE email=? AND password=?";
  $result=$conn->prepare($sql);
  $result->bindValue(1,$_COOKIE['email']); 
  $result->bindValue(2,$_COOKIE['password']);
  $result->execute(); 

  if ($result->rowCount()>=1) {
    $rows=$result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username']=$rows['username'];
    $_SESSION['email']=$_COOKIE['email'];
    $_SESSION['password']=$_COOKIE['password'];
    $_SESSION['login']=true;
    $successmassage=true;
 
  
}
}
