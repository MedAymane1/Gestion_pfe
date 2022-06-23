<?php
    include '../../Main/db_process.php' ;
    $query = "SELECT * FROM list_etd ORDER BY nom ASC" ;
    try {
        $res = dbSelect($query);
?>

<div class="container px-4">
    <h1 class="text-primary">Create Group</h1><hr><br>

    <form action="Create_grp_db.php" method="post">
        <div class="row">
            <div class="col-sm-5 d-flex align-items-center pb-3">
                <label for="grp-name" class="fs-5">Put a name for the group:</label>
            </div>
            <div class="col-sm-7 pb-3">
                <input type="text" name="grpName" id="grp-name" class="grp_name1" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div><span class="fs-5">Selected members:</span></div>
                <!-- for the selected members -->
                <div id="member-add" class="ps-3 pb-3"></div>
            </div>
            <div class="col-sm-6 d-flex align-items-center justify-content-end pb-3">
                <button type="submit"
                        name="btn"
                        class="btn btn-primary me-4 fs-5">Create Group</button>
            </div>
        </div>

        <h4 class="py-3">Choose group members:</h4>
        <input type="text"
            id="my-input"
            class="search_etd1"
            onkeyup="searchStudent()"
            placeholder="Search for apogees....">
            
        <div class="overflow-auto">
            <table id="my-table" class="list_etd1" onclick="selectMember()">
                <thead>
                    <tr>
                        <th>Apogee</th>
                        <th>CNE</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th class="check_cell1">Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $res->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $data['apogee']; ?></td>
                        <td><?php echo $data['cne']; ?></td>
                        <td><?php echo $data['nom']; ?></td>
                        <td><?php echo $data['prenom']; ?></td>
                        <td class="check_cell1">
                            <input type="checkbox"
                                   name="member[]"
                                   class="form-check-input"
                                   value="<?php echo $data['apogee']; ?>">
                        </td>
                    </tr>
                    <?php
                    } // End of while
                    $res->closeCursor();
                    } // End of try
                    catch(Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
