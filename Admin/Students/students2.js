// 
document.onload = getRegistered();
function getRegistered() {
  let reg = document.getElementById("registered-list");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Students/students_back.php?status=students", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        reg.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

//
function searchRegistered() {
  let input, ul, li, i, apogee;
  input = document.getElementById("search-reg");
  ul = document.getElementById("registered-list");
  li = ul.getElementsByTagName("li");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    apogee = li[i].getAttribute("data-apogee");
    if (li[i]) {
      if (apogee.indexOf(input.value) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
}

// 
function deleteRegistered(id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Students/students_back.php", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        getRegistered();
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("delete=delete&apogee=" + id.getAttribute("data-apogee"));
}
