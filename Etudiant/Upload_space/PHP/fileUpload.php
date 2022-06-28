<?php
session_start();
if(isset($_SESSION['id_grp']) && $_FILES['file'] && $_FILES['file']['error'] == 0){
    $id_grp=$_SESSION['id_grp'];
    $path = "../../../Uploads/uploadsFiles/".$id_grp."/";
    // new_file_name	file_name	path_file	id_grp
    try{
        include_once "../../../db_conn.php";
        $file_name = $_FILES['file']['name'];
        // let set a new file name 
        $new_file_name = time().$file_name;
        //check if folder "../../../Uploads/uploadsFolders/".$id_grp."/" exist or not 
        if(file_exists($path)){
            move_uploaded_file($_FILES['file']['tmp_name'], $path."/".$new_file_name);
            $filepath = $path.$new_file_name;
            //check if file upleoded 
            if(file_exists($filepath)){
            $sql = "INSERT INTO file_path (new_file_name, file_name, path_file,	id_grp)
            VALUES( '$new_file_name ', '$file_name', '$filepath', '$id_grp')";
            $conn->exec($sql);
            echo "file uploaded successfully";
            }else{
                echo "file not uploaded try again!!";
            }
        }else{
            // if folder  "../../../Uploads/uploadsFolders/".$id_grp."/"; not exest then create one 
            mkdir($path);
            move_uploaded_file($_FILES['file']['tmp_name'], $path."/".$new_file_name);
            //check if file upleoded 
            $filepath = $path.$new_file_name;
            if(file_exists($filepath)){
            $sql = "INSERT INTO file_path (new_file_name, file_name, path_file,	id_grp)
            VALUES( '$new_file_name ', '$file_name', '$filepath', '$id_grp')";
            $conn->exec($sql);
            echo "file uploaded successfully";
            }else{
                echo "file not uploaded try again!!";
            }

        }




    }catch(PDOException $e){
        echo "ERORR: " . $e->getMessage();
    }



}


?>