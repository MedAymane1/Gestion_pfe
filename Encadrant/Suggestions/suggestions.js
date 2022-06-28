//select list items from the database
document.onload = getSuggestions();
function getSuggestions() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Suggestions/sugg_back.php?status=getSuggestions", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        document.getElementById("sugg-list").innerHTML = xhr.response;
      }
    }
  }
  xhr.send();
}

// Insert new list item into the database
function newSuggest() {
  let suggText = document.getElementById("new-sugg");
  if (suggText.value === '') {
    alert("You must write something!");
  }
  else {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if(xhr.readyState === XMLHttpRequest.DONE) {
        if(xhr.status === 200) {
          suggText.value = "";
          // call the function getSuggestions to refresh suggestions list
          getSuggestions();
        }
      }
    }
    xhr.open("POST", "../Suggestions/sugg_back.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("suggText=" + suggText.value);
  }
}

// delete a list item the database
function removeSugg(btnValue) {
  let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if(xhr.readyState === XMLHttpRequest.DONE) {
        if(xhr.status === 200) {
          // call the function getSuggestions to refresh suggestions list
          getSuggestions();
        }
      }
    }
    xhr.open("POST", "../Suggestions/sugg_back.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("suggId=" + btnValue);
}
