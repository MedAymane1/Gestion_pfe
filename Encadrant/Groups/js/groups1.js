// Get the groups cards from database
document.onload = getGroups();
function getGroups() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/groups_back.php?status=get_groups", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("all-groups").innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

// Show/Hide the groups cards menu
function showMenu(element) {
  element.nextElementSibling.classList.toggle("d_none1");
}
function hideMenu(element) {
  element.classList.toggle("d_none1");
}
function hideMenu_2(element){
  element.childNodes[3].classList.add("d_none1");
}

// delete group from the database
function deleteGroup(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover the files and folders of these group",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if(willDelete) {
      let idGroup = id.getAttribute("data-id");
      id.parentElement.parentElement.classList.add("d_none1");
      console.log(id.parentElement.parentElement);
      
      let xhr = new XMLHttpRequest();
      xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
            getGroups();
          }
        }
      };
      xhr.open("POST", "../Groups/php/groups_back.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("idGroup=" + idGroup + "&status=delete");
    }
  });
}
