<?php 
include_once("confiq.php");
// session_start();
// $unique_id = $_SESSION['unique_id'];
$searchTerm = $_POST['searchterm'];
$outPut ="";
$sql ="SELECT * FROM users WHERE fname LIKE '%".$searchTerm."%' OR lname LIKE '%".$searchTerm."%'";
$get_all_users_info = $conn->query($sql);
$NB_Ligne = $get_all_users_info->rowCount();

if($NB_Ligne > 0){
    include("data.php");  
    $get_all_users_info->closeCursor();
}else{
    $output = "NO user found related to your search term";
}

?>