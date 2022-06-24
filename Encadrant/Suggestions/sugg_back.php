<?php

include_once "../../db_conn.php";

//select list items from the database
if( isset($_GET["code_enc"]) ) {
    try {
        $request = "SELECT * FROM  suggestion WHERE code_enc = 65478924";
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
if( isset($_POST["codeEnc"]) && isset($_POST["suggText"]) ) {
    try {
        $code = $_POST["codeEnc"];
        $text = $_POST["suggText"];
        $request = "INSERT INTO suggestion(text_sugg, code_enc) VALUE ('$text', $code)";
        $response = $conn->exec($request);
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// delete a list item the database
if( isset($_POST["codeEnc"]) && isset($_POST["suggId"]) ) {
    try {
        $code = $_POST["codeEnc"];
        $id = $_POST["suggId"];
        $request = "DELETE FROM suggestion WHERE id_sugg=$id AND code_enc=$code";
        $response = $conn->exec($request);
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
