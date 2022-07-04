<?php 

if(isset($_POST['nom_enc']) && 
   isset($_POST['prenom_enc']) &&
   isset($_POST['email']) && 
   isset($_POST['code_enc']) &&   
   isset($_POST['passwd'])){

    include "../db_conn.php";

    $nom = $_POST['nom_enc'];
    $prenom = $_POST['prenom_enc'];
    $email = $_POST['email'];
    $code = $_POST['code_enc'];
    $pass = $_POST['passwd'];

    $data = "nom_enc=".$nom."&prenom_enc=".$prenom."&email=".$email."&code_enc=".$code;
    
    if (empty($nom)) {
    	$em = "Nom is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else if(empty($prenom)){
    	$em = "Prenom is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
      $em = "Email is required";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
   }else if(empty($code)){
      $em = "Apogee is required";
      header("Location: ../index_enc.php?error=$em&$data");
      exit;
   }else 
     if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../index_enc.php?error=$em&$data");
	    exit;
    }else {
      // hashing the password
      $pass = password_hash($pass, PASSWORD_DEFAULT);

      if (isset($_FILES['img']['name']) AND !empty($_FILES['img']['name'])) {
         
         
         $img_name = $_FILES['img']['name'];
         $tmp_name = $_FILES['img']['tmp_name'];
         $error = $_FILES['img']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png' ,'webp');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($prenom, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql = "INSERT INTO encadrant(nom_enc, prenom_enc, email, code_enc, passwd, img) 
                 VALUES(?,?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$nom, $prenom, $email, $code, $pass, $new_img_name]);

               header("Location: ../index_enc.php?success=Your account has been created successfully");
                exit;
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
       	$sql = "INSERT INTO encadrant(nom_enc, prenom_enc, email, code_enc, passwd) 
       	        VALUES(?,?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$nom, $prenom, $email, $code, $pass]);

       	header("Location: ../index_enc.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../index_enc.php?error=error");
	exit;
}