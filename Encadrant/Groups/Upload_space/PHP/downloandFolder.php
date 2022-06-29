<?php 
if(isset($_GET['group_id']) && isset($_GET['folder_id'])){
    include_once "../../../../db_conn.php";
    $id_grp =$_GET['group_id'];
    $id_folder =$_GET['folder_id'];

    try{  
        //	folder_id  folder_name folder_path id_grp
        $sql ="SELECT folder_path , folder_name FROM folder_path WHERE id_grp = '$id_grp' AND folder_id = '$id_folder'";
        $reponse = $conn->query($sql);
        while ($donnees = $reponse->fetch()){      
            $folder_path ="../".$donnees['folder_path'];
            $folder_name =$donnees['folder_name'];
           }

       $rootPath = realpath($folder_path);
    //    echo $rootPath;
       
       $zip_file ="zip.zip";
       //create a zip file
       touch($zip_file);
       
       // Initialize archive object
       $zip = new ZipArchive();
       
       $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
       
       // Create recursive directory iterator
       /** @var SplFileInfo[] $files */
       $files = new RecursiveIteratorIterator(
           new RecursiveDirectoryIterator($rootPath),
           RecursiveIteratorIterator::LEAVES_ONLY
       );
       
       foreach ($files as $name => $file)
       {
           // Skip directories (they would be added automatically)
           if (!$file->isDir())
           {
               // Get real and relative path for current file
               $filePath = $file->getRealPath();
               $relativePath = substr($filePath, strlen($rootPath) + 1);
               // Add current file to archive
               $zip->addFile($filePath,$relativePath);
           }
       }
       
       // Zip archive will be created only after closing object
       $zip->close();
       
       // download this created zip file 
       if(file_exists($zip_file)){
       $demo_name =  $folder_name.".zip";
       header('Content-type: application/zip');  
       header('Content-Disposition: attachment; filename="'.$demo_name.'"'); 
       
       readfile($zip_file);
       unlink($zip_file);
       }
       
       }catch (Exception $e){
         die('Erreur : ' . $e->getMessage());
       }
       }