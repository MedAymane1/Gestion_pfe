<?php
include_once "../../../db_conn.php";

// Get members
if( isset($_GET["id_group"]) ) {
    try {
        $id_grp = $_GET["id_group"];
        $query = "SELECT apogee, nom_etd, prenom_etd, img_etd
                  FROM etudiant 
                  WHERE id_grp=$id_grp";
        $res = $conn->query($query);

        $response = "";
        while( $data = $res->fetch() ) {
            $img = "../../Uploads/Images/Students_images/" . $data["img_etd"];
            $full_name = $data["nom_etd"] . " " . $data["prenom_etd"];

            $response .= '<div class="member1">
                            <img src="' . $img . '" alt="echec">
                            <h5>' . $full_name . '</h5>
                            <span>
                                <i class="fa-solid fa-user-lock"></i>
                                <span class="text_muted1">' . $data["apogee"] . '</span>
                            </span>
                            <i class="bx bx-minus-circle remove1"
                               data-apogee="' . $data["apogee"] . '"
                               onclick="deleteMember(this)"></i>
                          </div>';
        }
        $response .= '<i class="fa-solid fa-user-plus add_member1"
                         onclick="getAddMember()"></i>';
        echo $response;
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete member
if( isset($_POST["apogee"]) ) {
    if( $_POST["status"] === "delete" ) {
        try {
            $apogee = $_POST["apogee"];
            $query1 = "UPDATE etudiant SET id_grp = NULL WHERE apogee=$apogee";
            $conn->exec($query1);
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

// Get the students list from the database
if( isset($_GET["status"]) ) {
    if($_GET["status"] === "get_students") {
        try{
            $query2 = "SELECT apogee, cne, nom_etd, prenom_etd 
                      FROM etudiant ORDER BY nom_etd ASC";
            $res = $conn->query($query2);
            $response = '<thead>
                            <tr>
                                <th class="check_cell1">Select</th>
                                <th>Apogee</th>
                                <th>CNE</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                        </thead>
                        <tbody>';
            while($data = $res->fetch()) {
                $response .= '<tr>
                                <td class="check_cell1">
                                    <input type="checkbox"
                                        name="member[]"
                                        class="form-check-input"
                                        value="' . $data["apogee"] . '">
                                </td>
                                <td>' . $data["apogee"] . '</td>
                                <td>' . $data["cne"] . '</td>
                                <td>' . $data["nom_etd"] . '</td>
                                <td>' . $data["prenom_etd"] . '</td>
                              </tr>';
            }
            $response .= '</tbody>';
            echo $response;
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

// Add new member
if( isset($_POST["add_member"]) ) {
    try {
        $id_group = $_POST["id_group"];
        $query3 = "SELECT apogee FROM etudiant WHERE id_grp=$id_group";
        $result = $conn->query($query3);
        if( $result->rowCount() === 3 ) {
            echo '<div class="alert alert-danger alert-dismissable my-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>This group has 3 members!!. First remove a member before adding another member</strong>
                        </div>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                  </div>';
            exit(-1);
        }
        if( !empty($_POST["member"]) ) {
            if( count($_POST["member"]) > 1) {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>Cannot select more than one member</strong>
                            </div>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    </div>';
                exit(-1);
            }
            
            $member = $_POST["member"][0];
            $query4 = "SELECT nom_etd, prenom_etd, id_grp
                       FROM etudiant WHERE apogee=$member";
            $res = $conn->query($query4);
            $data = $res->fetch();

            if( $data["id_grp"] != NULL) {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>' . 
                                    $data["nom_etd"] . " " . $data["prenom_etd"] . 
                                    ' is already a member of another group
                                </strong>
                            </div>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    </div>';
                exit(-1);
            }
            $query5 = "UPDATE etudiant SET id_grp=$id_group WHERE apogee=$member";
            $conn->exec($query5);
            
        }
        else {
            echo '<div class="alert alert-danger alert-dismissable my-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Please select a member to add to the group </strong>
                        </div>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                </div>';
            exit(-1);
        }
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
