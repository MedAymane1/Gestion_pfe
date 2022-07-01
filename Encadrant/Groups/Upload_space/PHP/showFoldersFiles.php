<?php 
session_start();

//schow folders
if(isset($_SESSION["id_compte"]) && $_POST['status']=="folder" && isset($_POST['id_grp'])) {
 include_once "../../../../db_conn.php";
 $id_grp=$_POST['id_grp'];
 $sql ="SELECT * FROM folder_path WHERE id_grp ='$id_grp' ORDER BY nb_folder DESC";
    $resulte = $conn->query($sql);
    if($resulte->rowCount() == 0){
        $schow="no folder uploaed yet !!";
    }else{
        while($donnes = $resulte->fetch()){
            $schow='<div class="folder">
            <div class="folder_name">
            <i class="fa-solid fa-folder-open"></i>
            <p>'.$donnes['folder_name'].'</p>
                            </div>
                        <div class="downlond">
                           <a href="../Groups/Upload_space/PHP/downloandFolder.php?group_id='.$id_grp.'&&folder_id='.$donnes['folder_id'].'">
                              <i class="bx bxs-down-arrow-square"></i>
                          </a>
                         </div>
                      <div class="button-remove">
                            <button  data-folder="'.$donnes['folder_id'].'"  onclick="deleteFolderEnc(this)">
                            <i class="fa-solid fa-trash-can"></i>
                            </button>
                      </div>
                </div>'
            ;
            echo $schow;
}
}
}

//schow files
if(isset($_SESSION["id_compte"]) && $_POST['status']=="files" && isset($_POST['id_grp'])){
    include_once "../../../../db_conn.php";
    $id_grp =$_POST['id_grp'];
    // new_file_name	file_name	path_file	id_grp	  
    $sql ="SELECT * FROM file_path WHERE id_grp ='$id_grp' ORDER BY nb_file DESC";
    $resulte = $conn->query($sql);
    if($resulte->rowCount() == 0){
        $schow=" no files uploaed yet!!";
    }else{
        while($donnes = $resulte->fetch()){
            $schow=' <div class="file">
                           <div class="file_name">
                           <i class="fa-solid fa-file"></i>
                           <p>'.$donnes['file_name'].'</p>
                            </div>
                           <div class="downlond">
                                <a href="../Groups/Upload_space/PHP/downloandfile.php?grp_id='.$id_grp.'&&new_file_name='.$donnes['new_file_name'].'"">
                                <i class="bx bxs-down-arrow-square"></i>
                                </a>
                              </div>
                             <div class="button-remove" data-file="'.$donnes['new_file_name'].'" onclick="deletefileEnc(this)">
                               <button>
                               <i class="fa-solid fa-trash-can"></i>
                                </button>
                          </div>
                    </div>'
            ;
            echo $schow;
        }
        $resulte->closeCursor();
    }
}


?>