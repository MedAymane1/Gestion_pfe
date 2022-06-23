<?php

if(isset($_POST["btn"])) {
    echo "Group name :" . $_POST["grpName"] . '<br/>';
    
    if(!empty($_POST['member'])) {
        $nbMembers = 0;
        echo "Chosen member :" . '<br/>';
        foreach($_POST['member'] as $member){
            echo $member . '<br/>';
            $nbMembers++;
        }
        echo "Number of members :" . $nbMembers;
    }
}


?>
