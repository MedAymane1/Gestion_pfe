<?php 

if(isset($_POST['nom_etd']) && 
   isset($_POST['prenom_etd']) &&
   isset($_POST['email']) && 
   isset($_POST['cne']) && 
   isset($_POST['apogee']) &&   
   isset($_POST['passwd'])){

    include "../db_conn.php";

    $nom = $_POST['nom_etd'];
    $prenom = $_POST['prenom_etd'];
    $email = $_POST['email'];
    $cne = $_POST['cne'];
    $apogee = $_POST['apogee'];
    $pass = $_POST['passwd'];

    $data = "nom_etd=".$nom."&prenom_etd=".$prenom."&email=".$email."&cne=".$cne."&apogee=".$apogee;
    
    if (empty($nom)) {
    	$em = "Nom is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($prenom)){
    	$em = "Prenom is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
      $em = "Email is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($cne)){
      $em = "CNE is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($apogee)){
      $em = "Apogee is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else 
     if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
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
               $sql = "INSERT INTO etudiant(nom_etd, prenom_etd, email, cne, apogee, passwd, img) 
                 VALUES(?,?,?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$nom, $prenom, $email, $cne, $apogee, $pass, $new_img_name]);

               header("Location: ../index.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO etudiant(nom_etd, prenom_etd, email, cne, apogee, passwd) 
       	        VALUES(?,?,?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$nom, $prenom, $email, $cne, $apogee, $pass]);

       	header("Location: ../index.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}
