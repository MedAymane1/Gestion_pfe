const form =document.querySelector(".login form");
const btnsubmit = document.querySelector(".login form .button input");
const errortext = document.querySelector(".error-txt");

form.onsubmit =(event)=>{
    event.preventDefault();
}
btnsubmit.onclick =()=>{
    let xhr = new XMLHttpRequest();
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
               if(data == "success"){
                   location.href="users.php";
               }else{
                errortext.textContent = data ;
                errortext.style.display = "block";
               }
            }
        }
    }
    xhr.open("POST","PHP/login.php",true);
    let formData = new FormData(form);
    // console.log(formData);
    xhr.send(formData);
}