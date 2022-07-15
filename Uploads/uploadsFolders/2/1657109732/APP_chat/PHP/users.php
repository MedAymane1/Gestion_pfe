<?php 
 session_start();
 $unique_id = $_SESSION['unique_id'];
 include_once("confiq.php"); 
 $sql ="SELECT * FROM users WHERE unique_id != '$unique_id'";
 $get_all_users_info = $conn->query($sql);
 $NB_ligne = $get_all_users_info->rowCount();
 $outPut = "";
// echo $NB_ligne;
 if($NB_ligne == 1){
     $outPut= "NO users are available to chat";
 }elseif($NB_ligne > 0){
     include("data.php");  
     $get_all_users_info->closeCursor();  
 }
?>