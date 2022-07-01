<?php 
session_start();
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
     foreach ($files as $file) {
       (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
     }
     return rmdir($dir);
   }

if(isset($_SESSION['id_grp']) && isset($_POST['folder_id']))

$id_grp =$_SESSION['id_grp'];
$folder_id =$_POST['folder_id'];
include_once "../../../db_conn.php";

try{
    // folder_id  folder_name folder_path id_grp
    $sql ="SELECT folder_path ,folder_name FROM folder_path WHERE id_grp = '$id_grp' AND folder_id = '$folder_id'";
    $result = $conn->query($sql);
    $donnees=$result->fetch();
    $path =$donnees['folder_path'];
    // ../../../Uploads/uploadsFolders/3/1656276566/
    // include "../../../Uploads/uploadsFolders/3/"
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
?>
