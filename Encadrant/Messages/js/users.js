let searchbar =document.querySelector(".users .search input");
let serchBtn =document.querySelector(".users .search button");
serchBtn.onclick =()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    serchBtn.classList.toggle("active");
}