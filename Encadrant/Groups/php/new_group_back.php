<?php

session_start();

include_once "../../../db_conn.php";

// Get the students list from the database
if( isset($_GET["status"]) ) {
    if($_GET["status"] === "get_students") {
        try{
            $query = "SELECT apogee, cne, nom_etd, prenom_etd 
                      FROM etudiant ORDER BY nom_etd ASC";
            $res = $conn->query($query);
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
                                        value="' . $data["apogee"] . '"
                                        onclick="selectMember()">
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

// Insert created group in the database
if( isset($_POST["submit"]) ) {
    // check that all data are exist and valid
    if( isset($_POST["groupName"]) ) {
        if( empty($_POST["groupName"]) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Group name is required</strong>
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

    if( isset($_POST["groupUser"]) ) {
        if( !empty($_POST["groupUser"]) ) {
            try {
                $user = $_POST["groupUser"];
                $query = "SELECT id_compte FROM compte WHERE username='$user'";
                $res = $conn->query($query);
                if( $res->rowCount() != 0 ) {
                    echo '<div class="alert alert-danger alert-dismissable">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>
                                        This userName is already used. Try another one
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
            }
            catch(Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }
        else {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Group user name is required</strong>
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

    if( isset($_POST["passwd"]) ) {
        if( empty($_POST["passwd"]) ) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Password is required</strong>
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

    if( !empty($_POST["member"]) ) {
        if( count($_POST["member"]) <= 3) {
            foreach( $_POST["member"] as $member ) {
                try {
                    $query = "SELECT nom_etd, prenom_etd, id_grp 
                              FROM etudiant WHERE apogee=$member";
                    $res = $conn->query($query);
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
                }
                catch(Exception $e) {
                    die("Error: " . $e->getMessage());
                }
            }
        }
        else {
            echo '<div class="alert alert-danger alert-dismissable">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Cannot select more than three members</strong>
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
    else {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>The group must have at least one member</strong>
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
    
    // create a new 'account, group' and update the group-id value for each member
    try {
        $username = $_POST["groupUser"];
        $password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);
        $grpName = $_POST["groupName"];
        $nbMembre = count($_POST["member"]);
        $codeEnc = $_SESSION["code_enc"];

        $conn->beginTransaction();
        $sql1 = "INSERT INTO compte(username, passwd, statut)
                    VALUES ('$username', '$password', 'Groupe')";
        $conn->exec($sql1);
    
        $sql2 = "INSERT INTO groupe(nom_grp, nb_membre, id_compte, code_enc) 
                    VALUES ('$grpName', $nbMembre, LAST_INSERT_ID(), $codeEnc)";
        $conn->exec($sql2);
        
        foreach($_POST["member"] as $mmbr) {
            $sql3 = "UPDATE etudiant SET id_grp=LAST_INSERT_ID() WHERE apogee=$mmbr";
            $conn->exec($sql3);
        }
        $conn->commit();
    }
    catch(Exception $e) {
        $conn->rollBack();
        die("Error: " . $e->getMessage());
    }
}
?>
