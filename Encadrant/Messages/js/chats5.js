const formchat = document.querySelector(".typing-area");
const inputFieldchat = document.getElementById("input-fieldChat")
const BtnSend = document.querySelector(".typing-area button");
const chatbox = document.querySelector(".chat-box");
const chatheader =document.getElementById("headerChat");

formchat.addEventListener("submit", function(event){
    event.preventDefault()
  });

//get chat header function
function getTitleChat(id_grp){
    let form =new FormData();
    form.append("status", "getHeaderChat")
    form.append("id_grp", id_grp)
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Messages/PHP/getMessege.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatheader.innerHTML =data;
                chatheader.setAttribute("data-id_grp",id_grp)
           }
        }
    }
    xhr.send(form);
}



function getallChats(ele){
    if( window.innerWidth <= 850){
        users_list.style.display = "none";
        chat_area.style.display = "flex";
    }
    id_grp =ele.getAttribute("data-id_grp");
    getTitleChat(id_grp);
}

// insert messge to data 
 function insertMessge(){
    if(chatheader.hasAttribute('data-id_grp') === true && inputFieldchat.value!=""){
    id_grp= chatheader.getAttribute('data-id_grp');
    let form =new FormData(formchat);
    form.append("status", "insertmsg");
    form.append("id_grp", id_grp);
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Messages/PHP/insertMessage.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                // let data = xhr.response;
                inputFieldchat.value="";
           }
        }
    }
    xhr.send(form);  
    }
 }


 
 chatbox.onmouseenter =()=>{
    chatbox.classList.add("active");
}

chatbox.onmouseleave =()=>{
    chatbox.classList.remove("active");
}


function ScrolltoBottom(){
    chatbox.scrollTop =  chatbox.scrollHeight;
}

//get chats from data base
setInterval(() => {

    if(chatheader.hasAttribute('data-id_grp') === true){
    id_grp= chatheader.getAttribute('data-id_grp');
    let form =new FormData();
    form.append("status", "getchats")
    form.append("id_grp", id_grp)
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Messages/PHP/getMessege.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatbox.innerHTML=data;
                if(!chatbox.classList.contains("active")){
                    ScrolltoBottom();
                }

           }
        }

    }
    xhr.send(form);
    } 
}, 1000);