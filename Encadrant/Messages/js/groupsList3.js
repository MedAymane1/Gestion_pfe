let searchbar =document.querySelector(".users .search input");
let serchBtn =document.querySelector(".users .search button");
let groupsLest = document.querySelector(".users-list-chat");
serchBtn.onclick =()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    serchBtn.classList.toggle("active");
    searchbar.value="";
}


//get all groups from data base
setInterval(() => {
    statuss="groupslist"
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Messages/PHP/groups.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchbar.classList.contains("active")){//if searchbar do not have a active class add this data
                    groupsLest.innerHTML= data;
                }
            }
        }
    }
    // "searchterm=" + searchTerm
    xhr.send("status=" +statuss);
    
}, 1500);

//search for a user  isset($_SESSION['code_enc']) && $_POST['status']="groupslist"
searchbar.onkeyup = ()=>{
    statuss="searchgroups";
    let searchTerm = searchbar.value;
    if(searchTerm !=""){
        searchbar.classList.add("active");
    }else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Messages/PHP/searchgroupe.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                groupsLest.innerHTML= data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchterm=" + searchTerm,"status=" +statuss);
}

//get chats from data base 
