<?php
if(!empty($_GET['grp_id']) && !empty($_GET['new_file_name'])){
    include_once "../../../../db_conn.php";
    $new_file_name = $_GET['new_file_name'];
    $id_grp =$_GET['grp_id'];
    try{
    $sql = "SELECT * FROM file_path WHERE id_grp ='$id_grp' AND new_file_name = '$new_file_name'";
    $result = $conn->query($sql);
     $donnes =$result->fetch();
    $file_name = $donnes['file_name'];
    $path_file = "../".$donnes['path_file'];
    if(file_exists($path_file)){
            // $fileName = basename($filePath);

            $fileSize = filesize($filePath);
    
            // Output headers.
            header("Cache-Control: private");
            header("Content-Type: application/stream");
            header("Content-Length: ".$fileSize);
            header("Content-Disposition: attachment; filename=".$file_name);
    
            // Output file.
            readfile ($filePath);                   
            exit();
        }
        // else {
        //     die('The provided file path is not valid.');
        // }
    else{
        echo "file not find";
    }
   }catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
}


?>