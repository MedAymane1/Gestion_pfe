<?php 
session_start();
include_once "../../../db_conn.php";
if(isset($_SESSION['code_enc']) && $_POST['status'] == "insertmsg" && isset($_POST['id_grp']) && isset($_POST['msg'])){
    $code_enc = $_SESSION['code_enc'];
    $id_grp =$_POST['id_grp'];
    $msg=$_POST['msg'];
    if(!empty($msg)){
        // 	msg_id	incoming_msg_id	outgoing_msg_id	msg
        $sql ="INSERT INTO  message (incoming_msg_id,outgoing_msg_id,msg)
            value('$id_grp','$code_enc','$msg')";
            $inset_message = $conn->exec($sql);
            echo "insert done";
    }
}