const formchat = document.querySelector(".typing-area");
const inputFieldchat = document.getElementById("input-fieldChat")
const BtnSend = document.querySelector(".typing-area button");
const chatbox = document.querySelector(".chat-box");
const chatheader = document.getElementById("headerChatgroup");

formchat.addEventListener("submit", function(event){
    event.preventDefault()
  });

//get chat header function
function getTitleChat(){
    let  form =new FormData();
    form.append("status", "getHeaderChat")
    // statuss="getHeaderChat"
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../messages/PHP/chat.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatheader.innerHTML =data;
                // chatheader.setAttribute("data-id_grp",id_grp)
           }
        }
    }
    xhr.send(form);
}
getTitleChat();

function insertMessge(){
    let form =new FormData(formchat);
    form.append("status", "insertmsg");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../messages/PHP/chat.php",true);
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

    chatbox.onmouseenter =()=>{
        chatbox.classList.add("active");
    }
    
    chatbox.onmouseleave =()=>{
        chatbox.classList.remove("active");
    }
    
    
    function ScrolltoBottom(){
        chatbox.scrollTop =  chatbox.scrollHeight;
    }


setInterval(() => {
    let  form =new FormData()
    form.append("status", "getchats")
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../messages/PHP/chat.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatbox.innerHTML=data;
                ScrolltoBottom();
           }
        }
    }
    xhr.send(form);
    } , 1000);