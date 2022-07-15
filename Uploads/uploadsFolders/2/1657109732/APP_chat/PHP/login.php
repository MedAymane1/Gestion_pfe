<?php

session_start();

include_once("confiq.php");

$email = $_POST['email'];
$password = $_POST['password'];

if( !empty($email) && !empty($password)){
    $check_email_and_password = $conn->query("SELECT COUNT(email) FROM users WHERE email = '$email'AND password ='$password'");
    // calcule le numbre de ligne 
    $donnees= $check_email_and_password->fetch();
    $nbLn2 = $donnees['COUNT(email)'];
    $check_email_and_password->closeCursor();
    if($nbLn2>0){
        $get_unique_id = $conn->query("SELECT unique_id FROM users WHERE email = '$email'AND password ='$password'");
        $donnees =  $get_unique_id->fetch();
        $_SESSION['unique_id']= $donnees['unique_id'];
        $get_unique_id->closeCursor();
       echo "success";

    }else{
        echo "Email or Paaword is incorreect!";
    }

}else{
    echo "All input field are required!";
}


?>