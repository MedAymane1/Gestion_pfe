// Get and show the add group interface, hide the groups cards
function newGroup() {
  let groups = document.getElementById("all-groups");
  let newGroup = document.getElementById("new-group");
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      groups.classList.toggle("d_none1");
      newGroup.innerHTML = this.response;
      // Call the getStudents function to append the students list into the table
      getStudents();
      newGroup.classList.toggle("d_none1");
    }
  };
  xhr.open("GET", "../Groups/php/new_group.php", true);
  xhr.send();
}

// Get the students list by XMLHttpRequest and append it into the table
function getStudents() {
  let stu = document.getElementById("list-etd");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Groups/php/new_group_back.php?status=get_students", true);
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
function searchStudent() {
  // Declare variables
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search-etd");
  filter = input.value;
  table = document.getElementById("list-etd");
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

// Get the 'nom, prenom' that belongs to the checked checkboxes and display thre in the div#member-add
function selectMember() {
  // Select all checkboxes using querySelectorAll.
  var checkboxes = document.querySelectorAll("input[type=checkbox]");
  let enabledMembers = [];
  let div = document.getElementById("member-add");

  // Use Array.forEach to add an event listener to each checkbox.
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      enabledMembers = Array.from(checkboxes) // Convert checkboxes to an array to use filter and map.
        .filter((i) => i.checked); // Use Array.filter to remove unchecked checkboxes.

      let n = 0;
      div.innerHTML = "";
      for (let i = 0; i < enabledMembers.length; i++) {
        // Use parentElement to get the checked checkBox row in the table
        let row = enabledMembers[i].parentElement.parentElement;
        // Store the columns "Nom and Prenom" values in two variables
        let prenom = row.children[3].innerText, nom = row.children[4].innerText;
        let mmbr = ` <span> Member ${++n}: ${prenom} ${nom}  </span><br> `;
        div.innerHTML += mmbr;
      }
      if (div.innerHTML === "") {
        div.innerHTML = `<span class="selected_etd1">No member selected</span>`;
      }
    });
  });
}

//Go back to all groups interface
function goBack() {
  document.getElementById("new-group").classList.toggle("d_none1");
  document.getElementById("all-groups").classList.toggle("d_none1");
}

// Create a formData, append new group's info in the formData, send it in an XMLHttpRequest
function CreateGrp(btn) {
  let form = document.querySelector(".box1 form");
  let formData = new FormData(form);
  let alert = document.getElementById("alert-area");

  formData.append("submit", btn);
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Groups/php/new_group_back.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if(xhr.response === "") {
          document.getElementById("new-group").classList.toggle("d_none1");
          getGroups();
          document.getElementById("all-groups").classList.toggle("d_none1");
        }
        else {
          alert.innerHTML = xhr.response;
        }
      }
    }
  };
  xhr.send(formData);
}
