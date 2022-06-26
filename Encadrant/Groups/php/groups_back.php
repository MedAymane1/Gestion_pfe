<?php
include_once "../../../db_conn.php";

// Get the groups cards from database
if( isset($_GET["code_enc"]) && isset($_GET["status"]) ) {
    if($_GET["status"] === "get_groups") {
        try {
            $request = "SELECT id_grp, nom_grp, img_grp
                        FROM groupe ORDER BY id_grp ASC" ;
            $res = $conn->query($request);
            $response = '<div class="col pt-5 pb-3">
                            <div class="card group1 mx-4" onclick="newGroup()">
                                <img src="../../Uploads/Default_images/add-group.jpg"
                                     alt="Echec">
                                <div class="card-body">
                                    <h5 class="card-title">New group</h5>                        
                                </div>
                            </div>
                        </div>';
            while($data = $res->fetch()) {
                $response .= '<div class="col pt-5">
                                <div class="card group1 mx-4 position-relative"
                                     data-id="' . $data["id_grp"] . '" 
                                     onmouseleave="hideMenu_2(this)">
                                    <span id="menu-btn"
                                          class="menu_btn1"
                                          onclick="showMenu(this)">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="action_menu1 d_none1"
                                         onmouseleave="hideMenu(this)">
                                        <ul>
                                            <li data-id="' . $data["id_grp"] . '"
                                                onclick="">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                                Edite group
                                            </li>
                                            <li data-id="' . $data["id_grp"] . '"
                                                onclick="deleteGroup(this)">
                                                <i class="fa-regular fa-trash-can"></i>
                                                Delete group
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="../../Uploads/Default_images/' . $data["img_grp"] . '"
                                         alt="Echec">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $data["nom_grp"] . '</h5>
                                    </div>
                                </div>
                              </div>';
            }
            echo $response;
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

// delete group from the database
if( isset($_POST["code_enc"]) && isset($_POST["idGroup"]) && isset($_POST["status"]) ) {
    if( $_POST["status"] === "delete" ) {
        try {
            $id = $_POST["idGroup"];
            $request = "DELETE FROM compte WHERE id_compte = (
                            SELECT id_compte FROM groupe WHERE id_grp=$id)";
            $response = $conn->exec($request);
            echo $response;
        }
        catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
