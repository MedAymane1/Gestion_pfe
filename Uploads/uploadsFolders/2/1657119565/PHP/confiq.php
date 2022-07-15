<?php 
$server="localhost";
$user="root";
$password="";
try{
    $conn =new PDO("mysql:host=$server;dbname=chat",$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "data base connected";
}catch(PDOException $e){
    echo "conected failed" .$e->getMessage();
}
?>