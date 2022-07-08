<?php
session_start();
// if(isset($_SESSION[''])){
//     $logout_id = $_GET['logout_id'];
//     if(isset($logout_id)){
//         $status = "offline now";
//         $sql="UPDATE users SET status ='$status' WHERE unique_id ='$logout_id'";
//         $resulte = $conn->exec($sql);
//         if($sql){
//             session_unset();
//             session_destroy();
//             header('Location: ../login.php');
//         }else{
//             header('Location: ../users.php');
// }
//         }
//     }else{
//     header('Location: ../login.php');
// }
if(!isset($_SESSION['id_compte'])){
    header("Location: ../../Login/login.php");
    exit(-1);
}else{
    if(isset($_POST['id_compte'])){
        session_unset();
        session_destroy();
        header("Location: ../../Login/login.php");
    }else{
        header("Location: main.php");
    }


}







?>