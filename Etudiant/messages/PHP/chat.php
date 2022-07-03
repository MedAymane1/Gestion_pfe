<?php 
session_start();
include_once "../../../db_conn.php";

//get header chat
if(isset($_SESSION['code_enc']) && isset($_SESSION['id_grp']) && $_POST['status']=="getHeaderChat"){
    $id_grp= $_SESSION['id_grp'];
    $code_enc =$_SESSION['code_enc'];
    $header ="";
    try{
        $sql ="SELECT * FROM encadrant WHERE code_enc ='$code_enc'";
        if($result = $conn->query($sql)){
            $donnes= $result->fetch();
            $fullName = $donnes['nom_enc'] . " " . $donnes['prenom_enc'];
            $header='<a href="#" id="arrow-left" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
            <img src="../../Uploads/Images/Supervisors_images/'.$donnes['img_enc'].'" alt="">
            <div class="details">
                <span>'.$fullName.'</span>
                <p>active now</p>
            </div>';
            echo $header;
        }
    }catch(Exception $e){ 
        die('Erreur : '.$e->getMessage());
    
    }

}

if(isset($_SESSION['code_enc']) && isset($_SESSION['id_grp']) && $_POST['status']=="getchats"){
    $id_grp= $_SESSION['id_grp'] ;
    $code_enc = $_SESSION['code_enc'];
    $messeg ="";
    try{
        $sql="SELECT * FROM message WHERE (	incoming_msg_id = '$code_enc' AND outgoing_msg_id = '$id_grp')
        OR (incoming_msg_id = '$id_grp' AND outgoing_msg_id =' $code_enc') ORDER BY msg_id"; 
        $result = $conn->query($sql);
        while($donnees = $result->fetch()){
            if($donnees['outgoing_msg_id'] == $id_grp){
                $messeg ='<div class="chat outgoing">
                                <div class="details">
                                    <p>'.$donnees['msg'].'</p>
                                </div>
                         </div>';

            }else{
                $sql2="SELECT * FROM encadrant WHERE code_enc = '$code_enc'";
                $img = $conn->query($sql2);
                $donnes =$img->fetch();

                $messeg='<div class="chat incoming">
                <img src="../../Uploads/Images/Supervisors_images/'.$donnes['img_enc'].'" alt="">
                <div class="details">
                    <p>'.$donnees['msg'].'</p>
                </div>
            </div>';
            }
            
            echo $messeg;
        }
    }catch(Exception $e){ 
        die('Erreur : '.$e->getMessage());
    
    }


}

//insert message 
if(isset($_SESSION['code_enc']) && $_POST['status'] == "insertmsg" && isset($_SESSION['id_grp']) && isset($_POST['msg'])){
    $code_enc = $_SESSION['code_enc'];
    $id_grp = $_SESSION['id_grp'];
    $msg=$_POST['msg'];
    if(!empty($msg)){
        // 	msg_id	incoming_msg_id	outgoing_msg_id	msg
        $sql ="INSERT INTO  message (incoming_msg_id,outgoing_msg_id,msg)
            value('$code_enc','$id_grp','$msg')";
            $inset_message = $conn->exec($sql);
            echo "insert done";
    }
}
