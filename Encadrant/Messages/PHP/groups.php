<?php 
session_start();
if(isset($_SESSION['code_enc']) && $_POST['status']="groupslist"){
    $code_enc = $_SESSION['code_enc'];
    $groups ="";
    include_once "../../../db_conn.php";
    try{

        $Sql1 ="SELECT * FROM groupe WHERE code_enc ='$code_enc'";
        $result =$conn->query($Sql1);
        if($result->rowCount() == 0){
            $groups= "NO groups are available to chat";
        }else{
  
            while($donnes =$result->fetch()){
                $id_grp =$donnes['id_grp'];

                //get last message
                $sql_mesg = "SELECT * FROM message  WHERE (incoming_msg_id = $id_grp OR outgoing_msg_id ='$id_grp')
                AND (incoming_msg_id = '$code_enc' OR outgoing_msg_id = '$code_enc') ORDER BY msg_id DESC LIMIT 1 ";
                 $Result_mesg = $conn->query($sql_mesg); 
                 $donnees_mesg =$Result_mesg->fetch();

                if($Result_mesg->rowCount() >0){
                $outgoing = $donnees_mesg['outgoing_msg_id'];

                   $result_last_msg =  $donnees_mesg['msg'];
                  //trimming messageif word more than 28 
                  (strlen($result_last_msg)>28) ? $msg = substr($result_last_msg,0,28).'....':$msg =$result_last_msg;
                  // adding you text before msg if login is send msg
                  ($code_enc == $outgoing) ? $you ="you:  " : $you ="";
                  $msg=$you.$msg;
                }else{
                  $msg = "NO message available";
                }

                $groups =' <a href="#" data-id_grp='.$donnes['id_grp'].' onclick="getallChats(this)" >
                                <div class="content">
                                    <img src="../../Uploads/Images/Groups_images/'.$donnes['img_grp'].'" alt="">
                                       <div class="details">
                                            <span>'.$donnes['nom_grp'].'</span>
                                            <p>'.$msg.'</p>
                                     </div>
                              </div>
                          </a>';
                          echo $groups;
            }
            
        }
    }catch(Exception $e){ 
        die('Erreur : '.$e->getMessage());
    
    }
}

?>