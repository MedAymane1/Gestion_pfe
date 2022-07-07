<?php

include_once "../../db_conn.php";

// Get the accounts list
if( isset($_GET["status"]) ) {
    try {
        $response = "";
        $query = "WITH allData(id, statut, cod) AS ((SELECT id_compte, statut, code_enc
                                                    FROM compte NATURAL JOIN encadrant)
                                                    UNION
                                                    (SELECT id_compte, statut, code_enc
                                                    FROM compte NATURAL JOIN groupe))
                                                    SELECT *
                                                    FROM allData
                                                    ORDER BY cod, statut";
        $res = $conn->query($query);

        while ($data = $res->fetch()) {
            // create list item with a supervisor's data
            if ($data["statut"] === "Encadrant") {
                $id_cmpt_enc = $data["id"];
                $query1 = "SELECT nom_enc, prenom_enc, email_enc, img_enc
                            FROM encadrant
                            WHERE id_compte=$id_cmpt_enc";
                $res1 = $conn->query($query1);
                $data1 = $res1->fetch();

                $full_name = $data1["nom_enc"] . " " . $data1["prenom_enc"];
                $img_enc = "../../Uploads/Images/Supervisors_images/" . $data1["img_enc"];
                $response .= '<li data-codeEnc="' . $data["cod"] . '">
                                <div class="account3">
                                    <div class="d-flex">
                                        <img src="' . $img_enc . '" alt="echec">
                                        <div class="p_info3">
                                            <h5 class="fw-bold">' . $full_name . '</h5>
                                            <span>
                                                <i class="fa-solid fa-envelope"></i>
                                                ' . $data1["email_enc"] . '
                                            </span><br>
                                            <span>
                                                <i class="fa-solid fa-user-lock"></i>
                                                ' . $data["cod"] . '
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="status3">
                                            <h5>
                                                ' . $data["statut"] . '
                                            </h5>
                                        </div>
                                        <div class="delete3">
                                            <i class="fa-solid fa-trash"
                                               data-id="' . $data["id"] . '"
                                               onclick="deleteAccount(this)"></i>
                                        </div>
                                    </div>
                                </div>
                              </li>';
            }

            // create list item with a group's data
            if ($data["statut"] === "Groupe") {
                $id_cmpt_grp = $data["id"];
                $code = $data["cod"];

                // Get group info
                $query2 = "SELECT id_grp, nom_grp, img_grp
                            FROM groupe
                            WHERE id_compte=$id_cmpt_grp";
                $res2 = $conn->query($query2);
                $data2 = $res2->fetch();
                $img_grp = "../../Uploads/Images/Groups_images/" . $data2["img_grp"];
                $id_grp = $data2["id_grp"];

                // Get the supervisor full name
                $query3 = "SELECT nom_enc, prenom_enc FROM encadrant WHERE code_enc=$code";
                $res3 = $conn->query($query3);
                $data3 = $res3->fetch();
                $enc_name = $data3["nom_enc"] . " " . $data3["prenom_enc"];

                // Get the full name of group members
                $members = "";
                $query4 = "SELECT nom_etd, prenom_etd FROM etudiant WHERE id_grp=$id_grp";
                $res4 = $conn->query($query4);
                while( $data4 = $res4->fetch() ) {
                    $members .= '<span>
                                    ' . $data4["nom_etd"] . " " . $data4["prenom_etd"] . '
                                 </span><br>';
                }

                $response .= '<li data-codeEnc="' . $data["cod"] . '">
                                <div class="account3">
                                    <div class="d-flex">
                                        <img src="' . $img_grp . '" alt="echec">
                                        <div class="p_info3">
                                            <h5 class="fw-bold">' . $data2["nom_grp"] . '</h5>
                                            <span class="title3">Supervisor name: </span><br>
                                            <span class="ps-3">
                                                ' . $enc_name . '
                                            </span>
                                        </div>
                                        <div class="members3">
                                            <h5 class="fw-bold">Members</h5>
                                            ' . $members . '
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="status3">
                                            <h5>
                                                ' . $data["statut"] . '
                                            </h5>
                                        </div>
                                        <div class="delete3">
                                            <i class="fa-solid fa-trash"
                                               data-id="' . $data["id"] . '"
                                               onclick="deleteAccount(this)"></i>
                                        </div>
                                    </div>
                                </div>
                              </li>';
            }
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
        $id =  $_POST["id"];
        $query5 = "DELETE FROM compte WHERE id_compte=$id";
        $conn->exec($query5);
        echo "done";
        exit(-1);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
