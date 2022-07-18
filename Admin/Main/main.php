<!-- 
session_start();
if( !isset($_SESSION['id_compte']) ) {
    header("Location: ../../Login/logout.php");
    exit(-1);
}

include_once "../../db_conn.php";

try {
    $id = $_SESSION["id_compte"];
    $query = "SELECT * FROM encadrant NATURAL JOIN compte WHERE id_compte=$id";
    $res = $conn->query($query);
    $data = $res->fetch();
    
    $code_enc = $_SESSION["code_enc"] = $data["code_enc"];
    $nom_enc = $data["nom_enc"];
    $prenom_enc = $data["prenom_enc"];
    $fullName = $nom_enc . " " . $prenom_enc;
    $email_enc = $data["email_enc"];
    $username = $data["username"];
    $passwd = $data["passwd"];
    $img ="../../Uploads/Images/Supervisors_images/" .  $data["img_enc"];
}
catch(Exception $e) {
    die("Error: " . $e->getMessage());
}
 -->

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include_once "styles.php" ?>
</head>

<body id="body-pd" class="bg-light">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="d-flex align-items-center">  
            <div class="px-4">
                <span class="fs-5">Admin</span>
            </div>
            <div class="header_img">
                <img src="../../Uploads/Images/Supervisors_images/profile-image.png"
                     alt="Image Not Found">
            </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class="fa-solid fa-graduation-cap nav_logo-icon"></i>
                    <!-- <i class="bx bxs-graduation nav_logo-icon"></i>
                    <span class="nav_logo-name">BBBootstrap</span> -->
                </a>

                <div class="nav_list">
                    <a class="nav_link active" title="list-etd">
                        <i class="fa-solid fa-list fs-5"></i>
                        <span class="nav_name">Students list</span>
                    </a>
                    <a class="nav_link" title="list-enc">
                        <i class="fa-solid fa-list fs-5"></i>
                        <span class="nav_name">Supervisors list</span>
                    </a>
                    <a class="nav_link" title="accounts">
                        <i class="fa-solid fa-users fs-5"></i>
                        <span class="nav_name">Accounts</span>
                    </a>
                    <a class="nav_link" title="reg-stu">
                        <i class="fa-solid fa-user-graduate fs-5"></i>
                        <span class="nav_name">Registered students</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>

    <!--Container main start-->
    <main class="height_100">
        <!-- Students list space -->
        <section class="cont active_link" id="list-etd">
            <?php
                include "../List_etd/list_etd.php";
            ?>
        </section>

        <!-- Supervisors list space -->
        <section class="cont unactive_link" id="list-enc">
            <?php
                include "../List_enc/list_enc.php";
            ?>
        </section>
        
        <!-- accounts space -->
        <section class="cont message unactive_link" id="accounts">
            <?php
                include "../Accounts/accounts.php";
            ?>
        </section>
        
        <!-- registered students space -->
        <section class="cont unactive_link" id="reg-stu">
            <?php
                include "../Students/students.php";
            ?>
        </section>
        
        <!-- suggestions space -->
        <!-- <section class="cont unactive_link" id="sugg">
            
        </section> -->
    </main>
    <!--Container main end-->

    <?php include_once "scripts.php" ?>
</body>

</html>