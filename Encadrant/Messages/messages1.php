<div class="continer_all_chat pt-5">


    <!-- users_space -->
    <div class="user_space">
        <div class="wrapper3 users">
            <section class="users">
                <header>
                    <div class="content">
                        <img src=<?php echo $img ?> alt="">
                        <div class="details">
                            <span><?php echo $fullName?></span>
                        </div>
                    </div>
                    <!-- <a href="#" class="logout">logout</a> -->
                </header>
                <div class="search">
                    <span class="text">select user to start chat</span>
                    <input type="text" placeholder="Enter name to search">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="users-list-chat">
                  <!-- groups list chat -->
                </div>
            </section>
        </div>
    </div>


    
    <!-- chats_space -->
    <div class="chats_space un_active_chat">
        <div class="chats_zoone">
            <div class="wrapper3 chat-zone">
                <section class="chat-area">
                    <header id="headerChat">
                        <a href="#" id="arrow-left" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                        <img src="../../Uploads/Images/Groups_images/group-image.png" alt="">
                        <div class="details">
                            <span>User name</span>
                        </div>
                    </header>
                    <div class="chat-box">
                       <!-- messages space -->
                    </div>
                    <form action="#" class="typing-area">
                        <input type="text" placeholder="type message ..." id="input-fieldChat"  name="msg">
                        <button><i onclick="insertMessge()" class="fa-brands fa-telegram"></i></button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
