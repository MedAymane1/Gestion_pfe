<?php
include_once "../../../db_conn.php";

try {
    $id_grp = $_GET["idGrp"];
    $query = "SELECT nom_grp, img_grp, username
              FROM groupe NATURAL JOIN compte
              WHERE id_grp=$id_grp";
    $res = $conn->query($query);
    $data = $res->fetch();
    $img = "../../Uploads/Images/Groups_images/" . $data["img_grp"];
}
catch(Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<div class="container py-3" id="grp-prfl-box" data-id="<?php echo $_GET["idGrp"] ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-primary">Edit Group</h1>
        <i class="fa-solid fa-arrow-left-long back_icon1" onclick="goBack1()"></i>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-5 pt-4 mb-3">
            <div class="text-center">
                <img src="<?php echo $img ?>"
                        class="group_img1"
                        alt="echec">
            </div>
        </div>

        <div class="col-lg-9">
            <h3 class="py-2">Members</h3>

            <div class="members_box1" id="members-box">
                <!--  -->
            </div>

            <h3 class="py-2">Group info</h3>

            <div class="row mb-3">
                <label for="fname" class="col-md-3 form-label">Group name:</label>
                <div class="col-md-9">
                    <input id="fname"
                            name="fname"
                            class="form-control"
                            type="text"
                            value="<?php echo $data["nom_grp"] ?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="userName" class="col-md-3 form-label">Group user name:</label>
                <div class="col-md-9">
                    <input id="userName"
                            name="userName"
                            class="form-control"
                            type="text"
                            value="<?php echo $data["username"] ?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-3 form-label">Password:</label>
                <div class="col-md-9">
                    <input class="form-control"
                            type="password"
                            value="password is crypted" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    <i class="fa-solid fa-user-minus remove1"
                               data-apogee="' . $data["apogee"] . '"
                               onclick="deleteMember(this)"></i>
 -->