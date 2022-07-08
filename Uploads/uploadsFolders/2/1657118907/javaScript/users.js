let searchbar =document.querySelector(".users .search input");
let searchBtn =document.querySelector(".users .search button");
let userLest = document.querySelector(".users-list");

searchBtn.onclick =()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchBtn.classList.toggle("active");
    searchbar.value="";
}

//search for a user 
searchbar.onkeyup = ()=>{
    let searchTerm = searchbar.value;
    if(searchTerm !=""){
        searchbar.classList.add("active");
    }else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","PHP/search.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userLest.innerHTML= data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchterm=" + searchTerm);
}
//for get all the users from data base and schow them in the user lest
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","PHP/users.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchbar.classList.contains("active")){//if searchbar do not have a active class add this data
                    userLest.innerHTML= data;
                }
            }
        }
    }
    xhr.send();
},500);