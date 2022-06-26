<?php 
session_start();

if(isset($_POST['username']) && 
   isset($_POST['passwd'])){

    include "../../db_conn.php";

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    $data = "username=".$username;
    
    if(empty($username)){
    	$em = "User name is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;
    }else if(empty($passwd)){
    	$em = "Password is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;

    }else{

        $sql = "SELECT * FROM compte WHERE username='$username'";
        $stmt = $conn->query($sql);

        echo $stmt->rowCount();

        if($stmt->rowCount() === 1){
        while ($donnees = $stmt->fetch()){

            if(password_verify($passwd, $donnees['passwd'])){
            if($donnees['statut'] == "Encadrant"){
                $_SESSION['id_compte'] = $donnees['id_compte'];
                $_SESSION['statut'] = $donnees['status'];
                //header encadrant page
                 header("Location: ../../Encadrant/Main/main.php");
                 
                 exit;
                }
       
            if($donnees['statut'] == "Groupe"){
                $_SESSION['id_compte'] = $donnees['id_compte'];
                $_SESSION['statut'] = $donnees['status'];
                //header groupe page
                 header("Location: ../../Etudiant/Main/main.php");
                 
                 exit;
               }
           }  
            //admin with out hash
            if($passwd == $donnees['passwd']){ 
            if($donnees['statut'] == "Admin"){
                $_SESSION['id_compte'] = $donnees['id_compte'];
                $_SESSION['statut'] = $donnees['status'];
                //header admin page
                 header("Location: ../../Admin/Main/main.php");
                 
                 exit;
                }

            }}
        
    }else {
        $em = "Incorect User name or password";
        header("Location: ../login.php?error=$em&$data");
        exit;
     }
    }
}