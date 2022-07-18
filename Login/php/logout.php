<?php
session_start();
if(isset($_SESSION['id_compte'])){
    $id_compte=$_SESSION['id_compte'];
    if(isset($_GET['logout_id'])){
            session_unset();
            session_destroy();
            //after destroy session go th log in page 
            header('Location: ../index.php');
        }else{
            //if $_GET['logout_id'] did not set go back to the main page

            include_once("../../db_conn.php");
            $sql="SELECT statut FROM compte WHERE id_compte= '$id_compte'";
            $resute=$conn->query($sql);
            $donnees=$resute->fetch();
            if($donnees['statut'] == "Encadrant"){
                //header encadrant page
                 header("Location: ../../Encadrant/Main/main.php");  
                 exit;
                }
            if($donnees['statut'] == "Groupe"){
                //header groupe page
                header("Location: ../../Etudiant/Main/main.php");
                    exit;
            }
            if($donnees['statut'] == "Admin"){
                //header admin page
                 header("Location: ../../Admin/Main/main.php");
                 exit;
                }
    
        }
    }else{
    header('Location: ../index.php');
}
?>