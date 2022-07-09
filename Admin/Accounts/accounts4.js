// 
document.onload = getAccounts();
function getAccounts() {
  let acc = document.getElementById("accounts-list");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Accounts/accounts_back.php?status=accounts", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        acc.innerHTML = xhr.response;
        // console.log(xhr.response);
      }
    }
  };
  xhr.send();
}

//
function searchAccount() {
  // Declare variables
  let input, ul, li, i, codeEnc;
  input = document.getElementById("search-acc");
  ul = document.getElementById("accounts-list");
  li = ul.getElementsByTagName("li");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    codeEnc = li[i].getAttribute("data-codeEnc");
    if (li[i]) {
      if (codeEnc.indexOf(input.value) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
}

// 
function deleteAccount(id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Accounts/accounts_back.php", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        getAccounts();
        console.log(xhr.response);
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("delete=delete&id=" + id.getAttribute("data-id"));
}
