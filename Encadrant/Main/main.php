<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include_once "php/styles.php" ?>
</head>

<body id="body-pd" class="bg-light" onload="renderDate()">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="d-flex align-items-center">  
            <div class="px-4">
                <span class="fs-5">User name</span>
            </div>
            <div class="header_img">
                <img src="../../images/hczKIze.jpg" alt="Image Not Found">
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
                    <a href="#grp" class="nav_link active" title="grp">
                        <i class="bx bx-group nav_icon"></i>
                        <span class="nav_name">Groups</span>
                    </a>
                    <a href="#prfl" class="nav_link" title="prfl">
                        <i class="bx bx-user nav_icon"></i>
                        <span class="nav_name">Profile</span>
                    </a>
                    <a href="#msg" class="nav_link" title="msg">
                        <i class="bx bx-conversation nav_icon"></i>
                        <span class="nav_name">Messages</span>
                    </a>
                    <a href="#clndr" class="nav_link" title="clndr">
                        <i class="bx bx-calendar nav_icon"></i>
                        <span class="nav_name">Calendar</span>
                    </a>
                    <a href="#sugg" class="nav_link" title="sugg">
                        <!-- <i class="bx bxs-briefcase nav_icon"></i> -->
                        <i class="bx bx-briefcase nav_icon" ></i>
                        <span class="nav_name">Suggestions</span>
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
        <!-- group space -->
        <section class="cont active_link" id="grp">
            <?php
            include_once "../Groups/groups.php";
            ?>
        </section>

        <!-- profil space -->
        <section class="cont unactive_link" id="prfl">
            <?php
            include_once "../Profile/profile.php";
            ?>
        </section>
        
        <!-- messages space -->
        <section class="cont message unactive_link" id="msg">
            <?php
            include_once "../Messages/messages.php";
            ?>
        </section>
        
        <!-- calendar space -->
        <section class="cont unactive_link" id="clndr">
            <?php
            include_once "../Calendar/calendar.php";
            ?>
        </section>
        
        <!-- suggestions space -->
        <section class="cont unactive_link" id="sugg">
            <?php
            include_once "../Suggestions/suggestions.php";
            ?>
        </section>
    </main>
    <!--Container main end-->

    <?php include_once "php/scripts.php" ?>
</body>

</html>