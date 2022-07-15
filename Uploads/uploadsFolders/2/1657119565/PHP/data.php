<?php
while( $donnees = $get_all_users_info->fetch()){
    $outPut =' <a href="chats.php?user_id='.$donnees['unique_id'].'">
                <div class="content">
                      <img src="PHP/Images/'.$donnees['image'].'" alt="">
                    <div class="details">
                         <span>'.$donnees['fname']." ".$donnees['lname'].'</span>
                        <p>this is test message</p>
                    </div>
                     </div>
                     <div class="status">
                         <i class="fa-solid fa-circle"></i> 
                </div>
             </a>';
             echo $outPut;
    }     
?>