<?php

include_once "../../db_conn.php";

// Get the accounts list
if( isset($_GET["status"]) ) {
    try {
        $response = "";
        $query = "SELECT * FROM etudiant";
        $res = $conn->query($query);

        while ($data = $res->fetch()) {
            $full_name = $data["nom_etd"] . " " . $data["prenom_etd"];
            $img_etd = "../../Uploads/Images/Students_images/" . $data["img_etd"];
            $response .= '<li data-apogee="' . $data["apogee"] . '">
                            <div class="registered4">
                                <div class="d-flex">
                                    <img src="' . $img_etd . '" alt="echec">
                                    <div class="info4">
                                        <h5 class="fw-bold">' . $full_name . '</h5>
                                        <span>
                                            <i class="fa-solid fa-envelope"></i>
                                            ' . $data["email_etd"] . '
                                        </span><br>
                                        <span>
                                            <span class="title4">CNE: </span>
                                            ' . $data["cne"] . '
                                        </span><br>
                                        <span>
                                            <span class="title4">Apogee: </span>
                                            ' . $data["apogee"] . '
                                        </span>
                                    </div>
                                </div>
                                <div class="delete3">
                                    <i class="fa-solid fa-trash"
                                        data-apogee="' . $data["apogee"] . '"
                                        onclick="deleteRegistered(this)"></i>
                                </div>
                            </div>
                          </li>';
        }
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete an account
if( isset($_POST["delete"]) ) {
    try{
        $apogee =  $_POST["apogee"];
        $query1 = "DELETE FROM etudiant WHERE apogee=$apogee";
        $conn->exec($query1);
        echo "done";
        exit(-1);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
