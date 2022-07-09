<?php

include_once "../../../db_conn.php";

// Get the students list from the database
if( isset($_GET["status"]) ) {
    if( $_GET["status"] === "list_enc" ) {
        try{
            $query = "SELECT code_enc, nom_enc, prenom_enc 
                      FROM liste_enc ORDER BY nom_enc ASC";
            $res = $conn->query($query);
            $response = '<thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th class="action2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
            while($data = $res->fetch()) {
                $response .= '<tr>
                                <td>' . $data["code_enc"] . '</td>
                                <td>' . $data["nom_enc"] . '</td>
                                <td>' . $data["prenom_enc"] . '</td>
                                <td class="action2">
                                    <i class="fa-regular fa-trash-can"
                                       data-code="' . $data["code_enc"] . '"
                                       onclick="deleteSup(this)"></i>
                                </td>
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

// Add new student to the database
if( isset($_POST["addEnc"]) ) {
    $code = $_POST["code"];

    if( !empty($_POST["code"]) ) {
        try {
            $query1 = "SELECT COUNT(*) AS nbr FROM liste_enc WHERE code_enc=$code";
            $res = $conn->query($query1);
            $data = $res->fetch();
            if( $data["nbr"] === 1 ) {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>This supervisor is already on the list !!</strong>
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
                        <strong>Supervisor code is required</strong>
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
    
    if( empty($_POST["nom"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Please give a name to this supervisor !!</strong>
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
    
    if( empty($_POST["prenom"]) ) {
        echo '<div class="alert alert-danger alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Please give a name to this supervisor !!</strong>
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
    
    try {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
    
        $query3 = "INSERT INTO liste_enc VALUES($code, '$nom', '$prenom')";
        $conn->exec($query3);
        echo "done";
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete student from the list
if( isset($_POST["deleteEnc"]) ) {
    try {
        $codeEnc = $_POST["deleteEnc"];
        $query4 = "DELETE FROM liste_enc WHERE code_enc=$codeEnc";
        $conn->exec($query4);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete all students from the list
if( isset($_POST["deleteAllSups"]) ) {
    try {
        $query5 = "DELETE FROM liste_enc";
        $conn->exec($query5);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}


/* 
<button type="submit"
                                            class="btn btn-danger"
                                            value="' . $data["code_enc"] . '"
                                            onclick="deleteSup(this.value)">
                                        Delete
                                    </button>
*/