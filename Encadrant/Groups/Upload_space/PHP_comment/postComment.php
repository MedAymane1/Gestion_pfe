<?php

session_start();
include_once "../../../../db_conn.php";

if(isset($_POST['id_grp'])&& isset($_SESSION['code_enc']) && isset($_POST['comment_title']) && isset($_POST['comment_body']) && $_POST['status']== "postComment"){

    if(!empty($_POST['comment_title']) && !empty($_POST['comment_body'])){
        try{
        $code_enc =$_SESSION['code_enc'];
        $id_grp=$_POST['id_grp'];
        $comment_title=$_POST['comment_title'];
        $comment_body=$_POST['comment_body'];
        $date=date("Y-m-d");

        $sql="INSERT INTO comments(comment_title,comment_body,date,code_enc,id_grp) 
    VALUES('$comment_title','$comment_body','$date','$code_enc','$id_grp')"; 

    if($conn->exec($sql)){

        echo "Posted Successfully!"; 
    }
    else {
        echo "Failed to post comment!"; 
    }

  }catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

}
}


if(isset($_POST['id_grp'] )&& isset($_SESSION['code_enc'])  && $_POST['status'] == "showcomment"){
    $code_enc =$_SESSION['code_enc'];
    $id_grp=$_POST['id_grp'];
    try{
    $sql="SELECT * FROM comments WHERE code_enc='$code_enc' AND id_grp='$id_grp' ORDER BY id_comment DESC";
                   $result=$conn->query($sql);

                   while($row=$result->fetch()){

                    $schow ='<div class="card mb-2 border-secondary">
                    <div class="card-header bg-secondary py-1 text-light">
                    <span class="font-italic">T:'.$row['comment_title'].'</span>
                    <span class="float-right font-italic"> On : '.$row['date'].'</span>
                    
                  </div>
                               <div class="card-body py-2">
                    <p class="card-text">'.$row['comment_body'].'</p> 
                               </div>
                               
                  <div class="card-footer py-2 " >
                    <div class="d-flex justify-content-end">
                     <i class="fas fa-trash" data-id_comment="'.$row['id_comment'].'" onclick="DeleteComment(this)"></i>
                    <i class="fas fa-edit ms-3"  onclick="getallComment(this)" data-id_comment="'.$row['id_comment'].'"></i></a>
                    </div>
                  </div>
            </div>';

            echo $schow;

                   }
        }catch (Exception $e){
                 die('Erreur : ' . $e->getMessage());
                  }
                       

}

if(isset($_POST['id_grp'] )&& isset($_SESSION['code_enc'])  && $_POST['status'] == "gettitle"  && isset($_POST['id_comment'])) {    
    $code_enc =$_SESSION['code_enc'];
    $id_grp=$_POST['id_grp'];
    $id_comment=$_POST['id_comment'];
    try{
    $sql="SELECT * FROM comments WHERE code_enc='$code_enc' AND id_grp='$id_grp' AND id_comment='$id_comment'";
                   $result=$conn->query($sql);
                   $row=$result->fetch();
                   $comment_title=$row['comment_title'];
                   echo $comment_title;
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }

}

if(isset($_POST['id_grp'] )&& isset($_SESSION['code_enc'])  && $_POST['status'] == "getComment"  && isset($_POST['id_comment'])) {    
    $code_enc =$_SESSION['code_enc'];
    $id_grp=$_POST['id_grp'];
    $id_comment=$_POST['id_comment'];
    try{
    $sql="SELECT * FROM comments WHERE code_enc='$code_enc' AND id_grp='$id_grp' AND id_comment='$id_comment'";
                   $result=$conn->query($sql);
                   $row=$result->fetch();
                   $comment_body=$row['comment_body'];
                   echo $comment_body;
}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
}

if(isset($_POST['id_grp'])&& isset($_SESSION['code_enc']) && isset($_POST['comment_title']) && isset($_POST['comment_body']) && $_POST['status']== "editComment" && isset($_POST['id_comment'])){

    if(!empty($_POST['comment_title']) && !empty($_POST['comment_body'])){
        try{
        
        $comment_title=$_POST['comment_title'];
        $comment_body=$_POST['comment_body'];
        $date=date("Y-m-d");
        $id_comment=$_POST['id_comment'];

        $sql="UPDATE comments SET comment_title='$comment_title', comment_body='$comment_body', date='$date' WHERE id_comment='$id_comment'";
        if($conn->query($sql)){
             echo "Edited Successfully!";
        }else {
        echo "Failed to Edit comment!"; 
    }

  }catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

}
}

if(isset($_POST['id_grp'])&& isset($_SESSION['code_enc']) && $_POST['status']== "deltComment" && isset($_POST['id_comment'])){

    try{
        
        $id_comment=$_POST['id_comment'];
        $sql=" DELETE FROM  comments WHERE id_comment = $id_comment";
        if($conn->exec($sql)){
            echo "Comment deleted successfully!";
        }else{
            echo "Failed to delete comment!";
        }

    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }

}

?>