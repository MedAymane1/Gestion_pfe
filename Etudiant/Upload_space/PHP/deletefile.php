<?php 
session_start();
if(isset($_SESSION['id_grp']) && isset($_POST['new_file_name'])){

    $id_grp =$_SESSION['id_grp'];
    $new_file_name =$_POST['new_file_name'];
    include_once "../../../db_conn.php";
try{

     $sql ="SELECT path_file FROM file_path WHERE id_grp = '$id_grp' AND new_file_name = '$new_file_name'";
     $result = $conn->query($sql);
     $donnees=$result->fetch();
     $path =$donnees['path_file'];
    
     //delete file with path $path
      unlink($path);
    //  test if file removed or not 
     if(file_exists($path)){
        echo "file still exest";
     }else{
        $sql ="DELETE FROM file_path WHERE id_grp ='$id_grp' AND new_file_name = '$new_file_name'";
        $conn->exec($sql);
        echo "file deleted";
     }


}catch(Exception $e){ 
    die('Erreur : '.$e->getMessage());

}

}
?>