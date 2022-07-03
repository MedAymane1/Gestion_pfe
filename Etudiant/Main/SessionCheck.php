<?php 
session_start();

if( !isset($_SESSION['id_compte']) ) {
    header("Location: ../../Login/logout.php");
    exit(-1);
}
// test session 
include_once "../../db_conn.php";
// $_SESSION['id_compte'] =4;
$id_compte= $_SESSION['id_compte'];
// if session set set  $_SESSION['id_grp']; 
$sql_id_groupe = "SELECT id_grp FROM groupe WHERE id_compte = '$id_compte'";
$resulte = $conn->query($sql_id_groupe);
$donness = $resulte->fetch();
$_SESSION['id_grp'] = $donness['id_grp'];

?>