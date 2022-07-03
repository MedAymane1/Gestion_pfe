const member = document.querySelectorAll(".continer_all_chat .user_space .users-list-chat a");
const chat_area = document.querySelector(".continer_all_chat .chats_space");
const users_list = document.querySelector(".continer_all_chat .user_space");
const chat_zoone = document.querySelector("chats_zoone");
const icon_arrow_left = document.getElementById("arrow-left");

member.forEach(function(e){
    e.onclick =()=>{
        if(window.innerWidth <= 850){
            users_list.style.display = "none";  
            chat_area.style.display = "flex";
            chat_area.classList.remove("un_active_chat");
            chat_area.classList.add("active_chat");
        }else{
            chat_area.style.display = "flex";
            chat_area.classList.remove("un_active_chat");
            chat_area.classList.add("active_chat");
        }
        }
    }

)
window.onload = ()=>{
    if(window.innerWidth <= 850 ){
        users_list.style.display = "flex"; 
    }

    if(window.innerWidth <= 550){
        users_list.style.display = "flex";
        chat_area.style.display = "none";
    }

}


setInterval(function(){
    // console.log(chat_area.classList.contains("un_active_chat"));
    if(window.innerWidth < 850 && chat_area.classList.contains("un_active_chat")){
       users_list.style.display = "flex";
    }
    if(window.innerWidth < 850 && chat_area.classList.contains("active_chat")){
        chat_area.style.display = "flex";
    }
},500)



icon_arrow_left.onclick=()=>{
    chat_area.style.display = "none";
    users_list.style.display = "flex"; 
    chat_area.classList.remove("active_chat");
    chat_area.classList.add("un_active_chat");

}