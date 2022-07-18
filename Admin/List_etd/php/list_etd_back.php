<?php

include_once "../../../db_conn.php";

// Get the students list from the database
if( isset($_GET["status"]) ) {
    if( $_GET["status"] === "list_etd" ) {
        try{
            $query = "SELECT apogee, cne, nom_etd, prenom_etd 
                      FROM liste_etd ORDER BY nom_etd ASC";
            $res = $conn->query($query);
            $response = '<thead>
                            <tr>
                                <th>Apogee</th>
                                <th>CNE</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th class="action1">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
            while($data = $res->fetch()) {
                $response .= '<tr>
                                <td>' . $data["apogee"] . '</td>
                                <td>' . $data["cne"] . '</td>
                                <td>' . $data["nom_etd"] . '</td>
                                <td>' . $data["prenom_etd"] . '</td>
                                <td class="action1">
                                    <i class="fa-regular fa-trash-can"
                                       data-code="' . $data["apogee"] . '"
                                       onclick="deleteEtd(this)"></i>
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
if( isset($_POST["addEtd"]) ) {
    $apg = $_POST["apogee"];
    $cne = $_POST["cne"];

    if( !empty($_POST["apogee"]) ) {
        try {
            $query1 = "SELECT COUNT(*) AS nbr FROM liste_etd WHERE apogee=$apg";
            $res = $conn->query($query1);
            $data = $res->fetch();
            if( $data["nbr"] === 1 ) {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>This student is already on the list !!</strong>
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
                        <strong>Apogee is required</strong>
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

    if( !empty($_POST["cne"]) ) {
        try {
            $query2 = "SELECT COUNT(*) AS nbr FROM liste_etd WHERE cne='$cne'";
            $res = $conn->query($query2);
            $data = $res->fetch();
            if( $data["nbr"] === 1 ) {
                echo '<div class="alert alert-danger alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>This CNE is used !!</strong>
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
                        <strong>Please enter the CNE !!</strong>
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
                        <strong>Please give a name to this student !!</strong>
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
                        <strong>Please give a name to this student !!</strong>
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
    
        $query3 = "INSERT INTO liste_etd VALUES($apg, '$cne', '$nom', '$prenom')";
        $conn->exec($query3);
        echo "done";
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete student from the list
if( isset($_POST["deleteEtd"]) ) {
    try {
        $apogee = $_POST["deleteEtd"];
        $query4 = "DELETE FROM liste_etd WHERE apogee=$apogee";
        $conn->exec($query4);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete all students from the list
if( isset($_POST["deleteAll"]) ) {
    try {
        $query5 = "DELETE FROM liste_etd";
        $conn->exec($query5);
    }
    catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}


/* 
                                    <i class="fa-regular fa-trash-can"></i>
*/