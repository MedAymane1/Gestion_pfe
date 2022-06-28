<?php

session_start();
$id = $_SESSION["code_enc"];

include_once "../../db_conn.php";

//select list items from the database
if( isset($_GET["status"]) ) {
    try {
        $request = "SELECT * FROM  suggestion WHERE code_enc = $id";
        $res = $conn->query($request);
        $response = "";
        while($data = $res->fetch()) {
            $response .= '<li>'.
                            $data["text_sugg"].
                            '<button value=' . $data["id_sugg"].
                                    ' class="close5" 
                                    onclick="removeSugg(this.value)">
                                &#215
                            </button>
                          </li>';
        }
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Insert new list item into the database
if( isset($_POST["suggText"]) ) {
    try {
        $text = $_POST["suggText"];
        $request = "INSERT INTO suggestion(text_sugg, code_enc) VALUE ('$text', $id)";
        $conn->exec($request);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// delete a list item the database
if( isset($_POST["suggId"]) ) {
    try {
        $id_sugg = $_POST["suggId"];
        $request = "DELETE FROM suggestion WHERE id_sugg=$id_sugg AND code_enc=$id";
        $conn->exec($request);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
