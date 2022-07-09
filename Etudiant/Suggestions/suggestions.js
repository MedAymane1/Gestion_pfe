//select list items from the database
document.onload = getSuggestions();
function getSuggestions() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Suggestions/sugg_back.php?status=getSuggestions", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("sugg-list").innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}
