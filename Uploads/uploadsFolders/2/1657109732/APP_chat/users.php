<?php 
session_start();
if(!isset($_SESSION['unique_id'])){
    header('Location: login.php');
    $unique_id_user =$_SESSION['unique_id'];
}
?>
<?php 
include_once("header.php")
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                // session_start();
                $unique_id_user =$_SESSION['unique_id'];
                include_once("php/confiq.php");  
                $sql = "SELECT * FROM users WHERE unique_id = '$unique_id_user'";
                $get_all_info_user = $conn->query($sql);
                $donnees = $get_all_info_user ->fetch();
                $frist_name = $donnees['fname'];
                $last_name = $donnees['lname'];
                $status= $donnees['status'];
                $imag =$donnees['image'];
                $get_all_info_user->closeCursor();
                ?>
                <div class="content">
                    <img src="PHP/Images/<?php echo $imag ?>" alt="">
                    <div class="details">
                        <span><?php echo "$frist_name  $last_name"; ?></span>
                        <p><?php echo "$status"; ?></p>
                    </div>
                </div>
                <a href="#" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">select user to start chat</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
               
               
            </div>
        </section>
    </div>
    <script src="javaScript/users.js"></script>
</body>
</html>