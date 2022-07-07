<?php

session_start();
$id = $_SESSION["code_enc"];

include_once "../../db_conn.php";

//select list items from the database
if( isset($_GET["status"]) ) {
    try {
        $request = "SELECT text_sugg FROM  suggestion WHERE code_enc = $id";
        $res = $conn->query($request);
        $response = "";
        while($data = $res->fetch()) {
            $response .= '<li>' . $data["text_sugg"]. '</li>';
        }
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
