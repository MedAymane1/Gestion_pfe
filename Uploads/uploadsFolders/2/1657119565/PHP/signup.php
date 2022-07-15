<?php

session_start();

include_once("confiq.php");

$Fistname = $_POST['Fname'];
$LastName = $_POST['Lname'];
$email = $_POST['email'];
$password = $_POST['password'];
if(!empty($Fistname) && !empty($LastName) && !empty($email) && !empty($password)){
   if(filter_var($email, FILTER_VALIDATE_EMAIL)){//if email valide
   //let check that email already in the database or not
    try{
        $nbLn; // numbre de ligne du requet
        $check_email = $conn->query("SELECT COUNT(email) FROM users WHERE email = '$email'");
        // calcule le numbre de ligne 
        $donnees = $check_email ->fetch();
        $nbLn = $donnees['COUNT(email)'];
        $check_email->closeCursor();

        if($nbLn > 0){
            echo "$email - This email allready exist";
        }else {
            //let chick user uload file img or not
            if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){
                $infoFichie = pathinfo($_FILES['image']['name']);
                $extenstion_upload =$infoFichie['extension'];
                $extenstion_allawed =array('jpg','jpeg','gif','png');
                if(in_array($extenstion_upload,$extenstion_allawed)){
                    $time= time();// this will retun current time we used to save img and then we will have 
                    // unique name for the img uploaded
                    // move the image to the foled img
                    $new_img_name=$time.$_FILES['image']['name'];
                    // echo $new_img_name;
                  if(move_uploaded_file($_FILES['image']['tmp_name'],'Images/'.basename($new_img_name))){
                      $status ="Active now";//once user sign up his statud well be Active
                      $rendom_id=rand(time(),100000000);//creating rendom id for user

                      //let insert all the data to base donne 
                      $Sql_Insert ="INSERT INTO  users (unique_id,fname,lname,email,password,image,status)
                      VALUES ('$rendom_id','$Fistname','$LastName','$email','$password','$new_img_name','$status');";
                      $Insert_data =$conn->exec($Sql_Insert);
                      if($Insert_data){
                        $check_email_2 = $conn->query("SELECT COUNT(email) FROM users WHERE email = '$email'");
                        // calcule le numbre de ligne 
                        $donnees2 = $check_email_2->fetch();
                        $nbLn2 = $donnees2['COUNT(email)'];
                        $check_email_2->closeCursor();

                        if($nbLn2 > 0){
                            // get the unique id and stor it in session we ganna use it in another file 
                            $get_unique_id = $conn->query("SELECT unique_id FROM users WHERE email = '$email'");
                             $donnees3 =  $get_unique_id->fetch();
                             $_SESSION['unique_id']= $donnees3['unique_id'];
                             $get_unique_id->closeCursor();
                            echo "success";
                        }

                      }
                  }  

                }
            }else{
                echo "Please slelect a photo file!";
            }
        }

        }catch(Exception $e){ 
            die('Erreur : '.$e->getMessage());
        }
   }else{
       echo "$email -This is not a valide email";
   }
}else{
    echo "All input field are required!";
}




?>