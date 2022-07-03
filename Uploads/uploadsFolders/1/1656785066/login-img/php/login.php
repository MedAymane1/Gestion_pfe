<?php 
session_start();

if(isset($_POST['email']) && 
   isset($_POST['passwd'])){

    include "../db_conn.php";

    $uname = $_POST['email'];
    $pass = $_POST['passwd'];

    $data = "email=".$email;
    
    if(empty($email)){
    	$em = "Email is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM etudiant WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$email]);
       $sql2 = "SELECT * FROM encadrant WHERE email = ?";
    	$stmt2 = $conn->prepare($sql2);
    	$stmt2->execute([$email]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $useremail =  $user['useremail'];
          $pass =  $user['passwd'];
          $nom =  $user['nom_etd'];
          $apogee =  $user['apogee'];
          $img =  $user['img'];

          if($useremail === $email){
             if(password_verify($pass, $password)){
                 $_SESSION['apogee'] = $apogee;
                 $_SESSION['nom_etd'] = $nom;
                 $_SESSION['img'] = $img;

                 header("Location: ../home.php");
                 exit;
             }else {
               $em = "Incorect Email or password";
               header("Location: ../login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorect Email or password";
            header("Location: ../login.php?error=$em&$data");
            exit;
         }

      }elseif($stmt2->rowCount() == 1){
         $user = $stmt2->fetch();

         $useremail =  $user['useremail'];
         $pass =  $user['passwd'];
         $nom =  $user['nom_enc'];
         $code =  $user['code_enc'];
         $img =  $user['img'];

         if($useremail === $email){
            if(password_verify($pass, $password)){
                $_SESSION['code_enc'] = $code;
                $_SESSION['nom_enc'] = $nom;
                $_SESSION['img'] = $img;

                header("Location: ../home.php");
                exit;
            }else {
              $em = "Incorect Email or password";
              header("Location: ../login.php?error=$em&$data");
              exit;
           }

         }else {
           $em = "Incorect Email or password";
           header("Location: ../login.php?error=$em&$data");
           exit;
        }

     }else {
         $em = "Incorect Email or password";
         header("Location: ../login.php?error=$em&$data");
         exit;
      }
    }


   }else {
	header("Location: ../login.php?error=error");
	exit;
}
