<?php include "SessionChecks.php" ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include_once "styles1.php" ?>
</head>
<!-- onload="renderDate()" removed form tag bady  -->

<body id="body-pd" class="bg-light" >
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="d-flex align-items-center">  
            <div class="px-4">
                <span class="fs-5"><?php echo $nom_grp ;?></span>
            </div>
            <div class="header_img">
                <img src="<?php echo $img;?>" alt="Image Not Found">
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
                    <a href="#grp" class="nav_link active" title="groupe">
                        <i class="bx bx-group nav_icon"></i>
                        <span class="nav_name">Groups</span>
                    </a>
                    <a href="#prfl" class="nav_link" title="profile">
                        <i class="bx bx-user nav_icon"></i>
                        <span class="nav_name">Profile</span>
                    </a>
                    <a href="#msg" class="nav_link" title="messages">
                        <i class="bx bx-conversation nav_icon"></i>
                        <span class="nav_name">Messages</span>
                    </a>
                    <!-- <a href="#clndr" class="nav_link" title="calendar">
                        <i class="bx bx-calendar nav_icon"></i>
                        <span class="nav_name">Calendar</span>
                    </a> -->
                    <a href="#sugg" class="nav_link" title="suggestions">
                        <!-- <i class="bx bxs-briefcase nav_icon"></i> -->
                        <i class="bx bx-briefcase nav_icon" ></i>
                        <span class="nav_name">Suggestions</span>
                    </a>
                    <a href="#comm" class="nav_link" title="comments" >
                        <!-- <i class="bx bxs-briefcase nav_icon"></i> -->
                        <i class="bx bx-comment nav_icon" ></i>
                        <span class="nav_name">Comments</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link" >
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>

    <!--Container main start-->
    <main class="height_100">
        <!-- group space -->
        <section class="cont active_link" id="groupe">
           <?php include "../Upload_space/upload.php";?>
            
        </section>

        <!-- profil space -->
        <section class="cont unactive_link" id="profile">
            <?php include "../profile/profile.php" ?>

        </section>
        
        <!-- messages space -->
        <section class="cont message unactive_link" id="messages">

           <?php include "../messages/messages.php";?>
            
        </section>
        
        <!-- calendar space -->
        <!-- <section class="cont unactive_link" id="calendar">
            
        </section> -->
        
        <!-- suggestions space -->
        <section class="cont unactive_link" id="suggestions">
            <?php
                include "../Suggestions/suggestions.php";
            ?>
        </section>

        <!-- Comments space -->
        <section class="cont unactive_link" id="comments">
            <?php include "../comments/comment.php";?>
        </section>
    </main>
    <!--Container main end-->

    <?php include_once "scripts1.php" ?>
</body>

</html>