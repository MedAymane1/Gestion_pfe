<?php

include "../Main/db_process.php";

if( isset($_GET["code_enc"]) ) {
    $query = "SELECT * FROM  suggestion WHERE code_enc = 123456";
    try {
        $res = dbSelect($query);
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

if( isset($_POST["codeEnc"]) && isset($_POST["suggText"]) ) {
    try {
        $code = $_POST["codeEnc"];
        $text = $_POST["suggText"];
        $query = "INSERT INTO suggestion(text_sugg, code_enc) VALUE ('$text', $code)";
        $res = dbProcess($query);
        echo $res;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

if( isset($_POST["codeEnc"]) && isset($_POST["suggId"]) ) {
    try {
        $code = $_POST["codeEnc"];
        $id = $_POST["suggId"];
        $query = "DELETE FROM suggestion WHERE id_sugg=$id AND code_enc=$code";
        $res = dbProcess($query);
        echo $res;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
