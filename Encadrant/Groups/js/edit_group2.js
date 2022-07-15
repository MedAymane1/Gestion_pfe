// Get the edit groups interface
function editGroup(data) {
  let dataId = data.getAttribute("data-id");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/edit_group.php?idGrp=" + dataId, true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("edit-group").innerHTML = xhr.response;
        document.getElementById("all-groups").classList.toggle("d_none1");
        document.getElementById("edit-group").classList.toggle("d_none1");
        getGroupMembers(dataId);
      }
    }
  };
  xhr.send();
}

// Get group members
function getGroupMembers(dataId) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/edit_group_back.php?id_group=" + dataId, true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.querySelector("#grp-prfl-box #members-box").innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

// Go back to the all groups interface
function goBack1() {
  document.getElementById("edit-group").classList.toggle("d_none1");
  document.getElementById("all-groups").classList.toggle("d_none1");
}

// Delete a member from the group
function deleteMember(data) {
  swal({
    title: "Are you sure?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      let apogee = data.getAttribute("data-apogee");
      let xhr = new XMLHttpRequest();

      xhr.open("POST", "../Groups/php/edit_group_back.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let idGrp = document.getElementById("grp-prfl-box").getAttribute("data-id");
            getGroupMembers(idGrp);
          }
        }
      };
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("apogee=" + apogee + "&status=delete");
    }
  });
}

// Get add member interface
function getAddMember() {
  let xhr = new XMLHttpRequest();
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("add-member").innerHTML = xhr.response;
        document.getElementById("edit-group").classList.toggle("d_none1");
        document.getElementById("add-member").classList.toggle("d_none1");
        getStudentsList();
      }
    }
  };
  xhr.open("GET", "../Groups/php/add_member.php", true);
  xhr.send();
}

// Get the students list by XMLHttpRequest and append it into the table
function getStudentsList() {
  let stu = document.getElementById("list-stu");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/edit_group_back.php?status=get_students", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        stu.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

// Filter the list of students by the apogee entered in the search box
function searchNewMember() {
  // Declare variables
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search-new-mmber");
  filter = input.value;
  table = document.getElementById("list-stu");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// Return to the edit groups interface
function cancelAdd() {
  document.getElementById("add-member").classList.toggle("d_none1");
  document.getElementById("edit-group").classList.toggle("d_none1");
}

// Add new member to the group
function addMember(btn) {
  let form = document.querySelector("#add-member form");
  let formData = new FormData(form);
  let alert = document.querySelector("#add-member #alert-area");
  let idGrp = document.getElementById("grp-prfl-box").getAttribute("data-id");
  formData.append("add_member", btn);
  formData.append("id_group", idGrp);

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Groups/php/edit_group_back.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if(xhr.response === "") {
          cancelAdd();
          getGroupMembers(idGrp);
        }
        else {
          alert.innerHTML = xhr.response;
        }
      }
    }
  };
  xhr.send(formData);
}
