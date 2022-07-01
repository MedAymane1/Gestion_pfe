<?php
// function to delete a whole folder 
function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
     foreach ($files as $file) {
       (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
     }
     return rmdir($dir);
   };
 
session_start();
if(!empty($_POST['folder_name']) && !empty($_POST['length']) && $_POST['status'] === "upload_folder" && isset($_SESSION['id_grp']) ){
  $test_upload = true;
  try{
    include_once "../../../db_conn.php";

       $id_grp =$_SESSION['id_grp'];
       $foldor_id =0;
      // set a id for folder_id using function randem() it alawys going to be uniqu

        $foldor_id = time();
        $path= "../../../Uploads/uploadsFolders/".$id_grp."/".$foldor_id."/";
        $folderName = $_POST['folder_name'];
        $length = $_POST['length'];


        for($i = 0; $i < $length; $i++){
          $folderpath = $path.dirname($_POST['filepath'.$i]);
          if(file_exists($folderpath)){
                // if folder exists upload file to folder
               move_uploaded_file($_FILES['files']['tmp_name'][$i], $folderpath."/".$_FILES['files']['name'][$i]);
               if(!file_exists($folderpath."/".$_FILES['files']['name'][$i])){
                $test_upload = false;
                break;
               }
            }else{
               mkdir($folderpath,0777,TRUE);
               move_uploaded_file($_FILES['files']['tmp_name'][$i], $folderpath."/".$_FILES['files']['name'][$i]);
               if(!file_exists($folderpath."/".$_FILES['files']['name'][$i])){
                $test_upload = false;
                break;
               } 
            }
        }
        if($test_upload === false){
          delTree($path);
          echo "ERORR : folder did not uploaded try again!!";
        }else{
          // 	folder_id	folder_name	folder_path	id_grp
            $sql = "INSERT INTO folder_path (folder_id, folder_name, folder_path,	id_grp)
               VALUES ( '$foldor_id', '$folderName', '$path', '$id_grp')";
               $conn->exec($sql);
               echo "folder is successfully uploaded";        
        }
    }catch(PDOException $e){
        echo "ERORR: " . $e->getMessage();
    }
}else{
      echo "ERORR : folder did not uploaded try again!!";
}
?>