<?php session_start();
if(!isset($_SESSION['unique_id'])){
    header('Location: login.php');
    $unique_id_user =$_SESSION['unique_id'];
}?>
<?php 
include_once("header.php")
?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header> 
            <?php
                include_once("php/confiq.php");  
                $user_id=$_GET['user_id'];
                $sql = "SELECT * FROM users WHERE unique_id = '$user_id'";
                $get_all_info_user = $conn->query($sql);
                $donnees = $get_all_info_user ->fetch();
                $frist_name = $donnees['fname'];
                $last_name = $donnees['lname'];
                $status= $donnees['status'];
                $imag =$donnees['image'];
                $get_all_info_user->closeCursor();
                ?>
                  <a href="users.php" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>

                    <img src="PHP/Images/<?php echo $imag ?>" alt="">
                    <div class="details">
                        <span><?php echo "$frist_name  $last_name"; ?></span>
                        <p><?php echo "$status"; ?></p>
                    </div>         
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="member-6.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="member-6.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="member-6.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, nihil?</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" placeholder="type message ...">
                <button><i class="fa-brands fa-telegram"></i></button>
            </form>
        </section>
    </div>
    <script src="javaScript/chats.js"></script>
</body>
</html>