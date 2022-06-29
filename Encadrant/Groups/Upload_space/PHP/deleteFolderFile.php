<?php
session_start();
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
     foreach ($files as $file) {
       (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
     }
     return rmdir($dir);
   }

   //delete folder encadrant
   if(isset($_POST['id_grp']) && isset($_POST['folder_id']) && isset($_SESSION['id_compte']) && $_POST['status']=="folder"){
    include_once "../../../../db_conn.php";
    $id_grp =$_POST['id_grp'];
    $folder_id =$_POST['folder_id'];
    try{
        // folder_id  folder_name folder_path id_grp
        $sql ="SELECT folder_path  FROM folder_path WHERE id_grp = '$id_grp' AND folder_id = '$folder_id'";
        $result = $conn->query($sql);
        $donnees=$result->fetch();
        $path = "../".$donnees['folder_path'];
        // include "../../../../Uploads/uploadsFolders/3/1656466475"
        $delete_folder = delTree($path);
        if($delete_folder){
              $sql = "DELETE FROM folder_path WHERE id_grp = '$id_grp' AND folder_id = '$folder_id'";
                $conn->exec($sql);
                echo "folder deleted";
            }else{
                 echo "folder did not deleted";
                }
    }catch(Exception $e){ 
                    die('Erreur : '.$e->getMessage());
                }

   }
   //delete files encadrant
   if(isset($_POST['id_grp']) && isset($_POST['new_file_name']) && isset($_SESSION['id_compte']) && $_POST['status']=="file"){

    $id_grp =$_POST['id_grp'];
    $new_file_name =$_POST['new_file_name'];
    include_once "../../../../db_conn.php";
try{

     $sql ="SELECT path_file FROM file_path WHERE id_grp = '$id_grp' AND new_file_name = '$new_file_name'";
     $result = $conn->query($sql);
     $donnees=$result->fetch();
     $path ="../".$donnees['path_file'];
    
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