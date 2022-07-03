<?php

session_start();
include_once "../../../db_conn.php";

if(isset($_SESSION['id_grp'])&& isset($_SESSION['code_enc'])){

      try{
        $code_enc =$_SESSION['code_enc'];
        $id_grp=$_SESSION['id_grp'];

        $sql="SELECT * FROM comments WHERE code_enc='$code_enc' AND id_grp='$id_grp' ORDER BY id_comment DESC";
        $result=$conn->query($sql);
        if($result->rowCount()>0){
          while($donnes=$result->fetch()){
            $comment='<div class="col-lg-5 rounded bg-light p-3">
                           <div class="card mb-2 border-secondary">
                               <div class="card-header bg-secondary py-1 text-light">
                                      <span class="font-italic">T: '.$donnes['comment_title'].' </span>
                                      <span class="float-right font-italic"style=" position: absolute; right: 1rem;"> On : '.$donnes['date'].' </span>
              
                                </div>
                            <div class="card-body py-2">
                                  <p class="card-text">'.$donnes['comment_body'].'</p> 
                             </div>
            
                          </div>
                       </div>';
                 echo $comment;      

          }
        }

  }catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

}


