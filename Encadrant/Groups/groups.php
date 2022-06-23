<?php
include 'db_process.php' ;
$query = "SELECT * FROM groupe ORDER BY id_grp ASC" ;
try {
    $res = dbSelect($query);
?>

<div class="container" id="all-groups">
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <div class="col pt-5 pb-3">
            <div class="card group1 mx-4" onclick="newGroup()">
                <img src="../../Uploads/Default_images/add-group.jpg" alt="Echec">
                <div class="card-body">
                    <h5 class="card-title">New group</h5>                        
                </div>
            </div>
        </div>

        <?php
        while ($data = $res->fetch()) {
        ?>
        <div class="col pt-5 pb-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card group1 mx-4">
                    <img src="../../images/teamwork.png" alt="Echec">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['nom_grp']; ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <?php
        } // End of while
        $res->closeCursor();
        } // End of try
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        ?>
    </div>
</div>
<div id="new-group" class="d_none1"></div>
