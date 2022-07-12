<?php 
session_start();

if(!isset($_SESSION['id_compte'])){
    header("Location: ../../Login/logout.php");
    exit(-1);
}else{

// test session 
include_once "../../db_conn.php";
// $_SESSION['id_compte'] =4;
$id_compte= $_SESSION['id_compte'];

$sql_id_groupe = "SELECT * FROM groupe NATURAL JOIN compte WHERE id_compte = '$id_compte'";
$resulte = $conn->query($sql_id_groupe);
$donness = $resulte->fetch();
$_SESSION['id_grp'] = $donness['id_grp'];
$_SESSION['code_enc']= $donness['code_enc'];
$_SESSION['img_grp']=$donness['img_grp'];
$username = $donness["username"];
$nom_grp=$donness['nom_grp'];
$img= "../../Uploads/Images/Groups_images/".$donness['img_grp'];

}

?>