<?php

include_once "../../../db_conn.php";

// Get the students list from the database
if( isset($_GET["status"]) ) {
    if( $_GET["status"] === "list_etd" ) {
        try{
            $query = "SELECT apogee, cne, nom_etd, prenom_etd 
                      FROM etudiant ORDER BY nom_etd ASC";
            $res = $conn->query($query);
            $response = '<thead>
                            <tr>
                                <th>Apogee</th>
                                <th>CNE</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';
            while($data = $res->fetch()) {
                $response .= '<tr>
                                <td>' . $data["apogee"] . '</td>
                                <td>' . $data["cne"] . '</td>
                                <td>' . $data["nom_etd"] . '</td>
                                <td>' . $data["prenom_etd"] . '</td>
                                <td>
                                    <button type="submit"
                                            class="btn btn-success">
                                        Edit
                                    </button>
                                    <button type="submit"
                                            class="btn btn-danger">
                                        Delete
                                    </button>
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
