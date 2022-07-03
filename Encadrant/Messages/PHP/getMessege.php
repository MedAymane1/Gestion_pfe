<?php 
session_start();
include_once "../../../db_conn.php";
if(isset($_SESSION['code_enc']) && $_POST['status'] == "getHeaderChat" && isset($_POST['id_grp'])){
    $id_grp= $_POST['id_grp'];
    $code_enc =$_SESSION['code_enc'];
    $header ="";
    try{
        $sql ="SELECT * FROM groupe WHERE id_grp ='$id_grp' AND code_enc ='$code_enc'";
        if($result = $conn->query($sql)){
            $donnes= $result->fetch();
            $header='<a href="#" id="arrow-left" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
            <img src="../../Uploads/Images/Groups_images/'.$donnes['img_grp'].'" alt="">
            <div class="details">
                <span>'.$donnes['nom_grp'].'</span>
            </div>';
            echo $header;
        }
    }catch(Exception $e){ 
        die('Erreur : '.$e->getMessage());
    
    }

}

if(isset($_SESSION['code_enc']) && $_POST['status'] == "getchats" && isset($_POST['id_grp'])){
    $id_grp= $_POST['id_grp'];
    $code_enc =$_SESSION['code_enc'];
    $messeg ="";
    try{
        $sql="SELECT * FROM message WHERE (	incoming_msg_id = '$id_grp' AND outgoing_msg_id = '$code_enc')
        OR (incoming_msg_id = '$code_enc' AND outgoing_msg_id =' $id_grp') ORDER BY msg_id"; 
        $result = $conn->query($sql);
        while($donnees = $result->fetch()){
            if($donnees['outgoing_msg_id'] == $code_enc){
                $messeg ='<div class="chat outgoing">
                                <div class="details">
                                    <p>'.$donnees['msg'].'</p>
                                </div>
                         </div>';

            }else{
                $sql3="SELECT * FROM groupe WHERE id_grp ='$id_grp'";
                $img= $conn->query($sql3);
                $donnes=$img->fetch();

                $messeg='<div class="chat incoming">
                <img src="../../Uploads/Images/Groups_images/'.$donnes['img_grp'].'" alt="">
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
