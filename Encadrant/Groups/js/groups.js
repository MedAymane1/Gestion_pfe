// Get the groups cards from database
let allGroups = document.getElementById("all-groups");
allGroups.onload = getGroups();

function getGroups() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/groups_back.php?code_enc=123456&status=get_groups", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // console.log(xhr.response);
        allGroups.innerHTML = xhr.response;
        // call the function showMenu
        // showMenu();
      }
    }
  };
  xhr.send();
}

// Show/Hide the groups cards menu
/* function showMenu() {
  let groupMenu = document.querySelectorAll("#menu-btn");
  groupMenu.forEach((element) => {
    element.addEventListener("click", () => {
      element.nextElementSibling.classList.toggle("d_none1");
    });
  });
} */
function showMenu(element) {
  element.nextElementSibling.classList.toggle("d_none1");
}
function hideMenu(element) {
  element.classList.toggle("d_none1");
}

// delete group from the database
function deleteGroup(id) {
  let idGroup = id.getAttribute("data-id");
  id.parentElement.parentElement.classList.toggle("d_none1");
  
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
  xhr.send("code_enc=123456&idGroup=" + idGroup + "&status=delete");
}

// Get and show the add group interface, hide the groups cards
function newGroup() {
  let groups = document.getElementById("all-groups");
  let newGroup = document.getElementById("new-group");
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      groups.style.display = "none";
      newGroup.style.display = "block";
      newGroup.innerHTML = this.response;
      // Call the getStudents function to append the students list into the table
      getStudents();
    }
  };
  xhr.open("GET", "new_group1.php", true);
  xhr.send();
}

// Get the students list by XMLHttpRequest and append it into the table
function getStudents() {
  let stu = document.getElementById("my-table");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "groups1_back.php?code_enc=123456&status=get_students", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // console.log(xhr.response);
        stu.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}
