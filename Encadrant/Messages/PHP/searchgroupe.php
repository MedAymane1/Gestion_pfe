<?php 
session_start();
// search for goup name
if(isset($_SESSION['code_enc']) && $_POST['status']="searchgroups" && isset($_POST['searchterm'])){
    include_once "../../../db_conn.php";
    $searchTerm = $_POST['searchterm'];
    $code_enc = $_SESSION['code_enc'];
$groups ="";
$sql ="SELECT * FROM groupe WHERE code_enc = '$code_enc'  AND  ( nom_grp LIKE '%$searchTerm%')";

$result = $conn->query($sql);
$NB_Ligne = $result->rowCount();

if($NB_Ligne > 0){
    while($donnes =$result->fetch()){

        $groups =' <a href="#">
                        <div class="content">
                            <img src="../../Uploads/Images/Groups_images/'.$donnes['img_grp'].'" alt="">
                               <div class="details">
                                    <span>'.$donnes['nom_grp'].'</span>
                                    <p>this is test message</p>
                             </div>
                      </div>
                      <div class="status">
                             <i class="fa-solid fa-circle"></i>
                      </div>
                  </a>';
                  echo $groups;     
}
}else{
    echo "NO user found related to your search term";
}
}
?>