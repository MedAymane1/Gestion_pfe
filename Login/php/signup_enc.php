<?php 

if(isset($_POST['nom_enc']) && 
   isset($_POST['prenom_enc']) &&
   isset($_POST['username']) &&
   isset($_POST['email_enc']) && 
   isset($_POST['code_enc']) &&  
   // isset($_POST['statut']) && 
   isset($_POST['passwd'])){

    include "../../db_conn.php";

    $nom = $_POST['nom_enc'];
    $prenom = $_POST['prenom_enc'];
    $username = $_POST['username'];
    $email = $_POST['email_enc'];
    $code = $_POST['code_enc'];
    $passwd = $_POST['passwd'];
                     

    $data = "nom_enc=".$nom."&prenom_enc=".$prenom."&username=".$username."&email_enc=".$email."&code_enc=".$code;
    
    if (empty($nom)) {
    	$em = "First name is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else if(empty($prenom)){
    	$em = "Last name is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else if(empty($username)){ 
      $em = "Username is required";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
   }else if(empty($email)){
      $em = "Email is required";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
   }else if(empty($code)){
      $em = "Personal code is required";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
   }else 
     if(empty($passwd)){
    	$em = "Password is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else {
         //   verifie compte
      $sqlIfCompteExist = "SELECT id_compte FROM compte WHERE username = ?";
               $stmtIfCompteExist = $conn->prepare($sqlIfCompteExist);
               $stmtIfCompteExist->execute([$username]);

      if($stmtIfCompteExist->rowCount() != 0){
         $em = "Username already exist";
         header("Location: ../index_enc.php?error=$em&$data");
         exit;
      }

      //  verifie dans liste

      $sqlGetencadrant = "SELECT code_enc FROM liste_enc WHERE code_enc = ?";
      $stmtGetencadrant = $conn->prepare($sqlGetencadrant);
      $stmtGetencadrant->execute([$code]);

      if($stmtGetencadrant->rowCount() == 0){
      $em = "Encadrant not exist with this code";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
      }

      // verifie si exist dans la table encadrant

      $sqlIfEncadrantExist = "SELECT code_enc FROM encadrant WHERE code_enc = ?";
      $stmtIfEncadrantExist = $conn->prepare($sqlIfEncadrantExist);
      $stmtIfEncadrantExist->execute([$code]);

      if($stmtIfEncadrantExist->rowCount() != 0){
      $em = "Encadrant already exist";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
      }
      


      // hashing the password
      $passwd = password_hash($passwd, PASSWORD_DEFAULT);

      if (isset($_FILES['img_enc']['name']) AND !empty($_FILES['img_enc']['name'])) {
         
         
         $img_name = $_FILES['img_enc']['name'];
         $tmp_name = $_FILES['img_enc']['tmp_name'];
         $error = $_FILES['img_enc']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png' ,'webp');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../../Uploads/Images/Supervisors_images/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql1 = "INSERT INTO compte(username, passwd , statut)
                VALUES(?,?,?)";
               $stmt1 = $conn->prepare($sql1);
               $stmt1->execute([$username, $passwd,'Encadrant']);
               
               $sqlGetIdCompte = "SELECT id_compte FROM compte WHERE username = ?";
               $stmtGetIdCompte = $conn->prepare($sqlGetIdCompte);
               $stmtGetIdCompte->execute([$username]);

               if($stmtGetIdCompte->rowCount() != 0){
                  $userId = $stmtGetIdCompte->fetch();
                     
                     $id_compte =  $userId['id_compte'];

               $sql = "INSERT INTO encadrant(nom_enc, prenom_enc, email_enc, code_enc, img_enc , id_compte) 
                  VALUES(?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$nom, $prenom, $email, $code, $new_img_name, $id_compte]);
                header("Location: ../index.php?success=Your account has been created successfully ");
                 exit;
               }
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index_enc.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index_enc.php?error=$em&$data");
            exit;
         }
      }else {

         $sql1 = "INSERT INTO compte(username, passwd, statut)
                VALUES(?,?,?)";
               $stmt1 = $conn->prepare($sql1);
               $stmt1->execute([$username, $passwd,'Encadrant']);


               $sqlGetIdCompte = "SELECT id_compte FROM compte WHERE username = ?";
               $stmtGetIdCompte = $conn->prepare($sqlGetIdCompte);
               $stmtGetIdCompte->execute([$username]);

               if($stmtGetIdCompte->rowCount() != 0){
                  $userId = $stmtGetIdCompte->fetch();
                     
                     $id_compte =  $userId['id_compte'];





               $sql = "INSERT INTO encadrant(nom_enc, prenom_enc, email_enc, code_enc, id_compte) 
                  VALUES(?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$nom, $prenom, $email, $code, $id_compte]);
                header("Location: ../index.php?success=Your account has been created successfully ");
                 exit;
               
        
      }
    }

  }
}else {
	header("Location: ../index_enc.php?error=error");
	exit;
}