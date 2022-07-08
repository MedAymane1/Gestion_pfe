const passwordfeil =document.querySelector(".form .field input[type='password']");
let toggleBtn =document.querySelector(".form .field i");
toggleBtn.onclick =()=>{
    if(passwordfeil.type =="password"){
        passwordfeil.type = "text";
        toggleBtn.classList.add("active");
    }else{
        passwordfeil.type ="password";
        toggleBtn.classList.remove("active");
    }
}