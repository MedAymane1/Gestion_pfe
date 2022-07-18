<?php 

if(isset($_POST['apogee']) && 
   isset($_POST['cne']) &&
   isset($_POST['nom_etd']) && 
   isset($_POST['prenom_etd']) &&   
   isset($_POST['email_etd'])){

    include "../../db_conn.php";

    $apogee = $_POST['apogee'];
    $cne = $_POST['cne'];
    $nom = $_POST['nom_etd'];
    $prenom = $_POST['prenom_etd'];
    $email = $_POST['email_etd'];

    $data = "apogee=".$apogee."&cne=".$cne."&nom_etd=".$nom."&prenom_etd=".$prenom."&email_etd=".$email;
    
    if (empty($apogee)) {
    	$em = "Apogee is required";
    	header("Location: ../index_etd.php?error=$em&$data");
	    exit;
    }else if(empty($cne)){
    	$em = "CNE is required";
    	header("Location: ../index_etd.php?error=$em&$data");
	    exit;
    }else if(empty($nom)){
      $em = "First name is required";
      header("Location: ../index_etd.php?error=$em&$data");
      exit;
   }else if(empty($prenom)){
      $em = "Last name is required";
      header("Location: ../index_etd.php?error=$em&$data");
      exit;
   }else 
     if(empty($email)){
    	$em = "Email is required";
    	header("Location: ../index_etd.php?error=$em&$data");
	    exit;
    }else {

      //  verifie list
      $sqlGetetudiant = "SELECT apogee FROM liste_etd WHERE apogee = ? AND cne= ?";
      $stmtGetetudiant = $conn->prepare($sqlGetetudiant);
      $stmtGetetudiant->execute([$apogee,$cne]);

      if($stmtGetetudiant->rowCount() == 0){
      $em = "You are not exist in the list";
      header("Location: ../index_etd.php?error=$em&$data");
      exit;
      }


      // verifie a table d'etudiant
      $sqlIfEtudiantExist = "SELECT apogee FROM etudiant WHERE apogee = ? OR cne = ?";
      $stmtIfEtudiantExist = $conn->prepare($sqlIfEtudiantExist);
      $stmtIfEtudiantExist->execute([$apogee, $cne]);

      if($stmtIfEtudiantExist->rowCount() != 0){
      $em = "You are already registered !!";
      header("Location: ../index_etd.php?error=$em&$data");
      exit;
      }

      if (isset($_FILES['img_etd']['name']) AND !empty($_FILES['img_etd']['name'])) {
         
         
         $img_name = $_FILES['img_etd']['name'];
         $tmp_name = $_FILES['img_etd']['tmp_name'];
         $error = $_FILES['img_etd']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png' ,'webp');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($cne, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../../Uploads/Images/Students_images/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql = "INSERT INTO etudiant(apogee, cne, nom_etd, prenom_etd, email_etd, img_etd) 
                 VALUES(?,?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$apogee, $cne, $nom, $prenom, $email, $new_img_name]);

               header("Location: ../index_etd.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../index_etd.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../index_etd.php?error=$em&$data");
            exit;
         }

        
      }else {

         



       	$sql = "INSERT INTO etudiant(apogee, cne, nom_etd, prenom_etd, email_etd ) 
       	        VALUES(?,?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$apogee, $cne, $nom, $prenom, $email]);

       	header("Location: ../index_etd.php?success=You have been successfully registered");
   	    exit;
      }
    }


}else {
	header("Location: ../index_etd.php?error=error");
	exit;
}
