// Get the students list by XMLHttpRequest and append it into the table
document.onload = getSupervisors();
function getSupervisors() {
  let sup = document.getElementById("data-enc");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../List_enc/php/list_enc_back.php?status=list_enc", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        sup.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

//
function searchSupervisor() {
  // Declare variables
  let input, table, tr, td, i, txtValue;
  input = document.getElementById("search-enc");
  table = document.getElementById("data-enc");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(input.value) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// Show the choose file button
function getInputFileEnc() {
  document.getElementById("import-file-box1").classList.toggle("d_none");
}

// 
function importFileEnc(btn) {
  let form = document.querySelector("#import-file-box1 form");
  let formData = new FormData(form);
  formData.append("import", btn);
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "../List_enc/php/import_list_enc.php", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        if(xhr.response === "done") {
          getSupervisors();
        }
        else {
          let alert = document.querySelector("#import-file-box1 form .alert_area2");
          alert.innerHTML = xhr.response;
        }
      }
    }
  }
  xhr.send(formData);
}

// 
function getAddSupervisor() {
  let newSup = document.getElementById("add-sup-box");
  let xhr = new XMLHttpRequest();

  xhr.open("GET", "../List_enc/php/add_enc.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        newSup.innerHTML = xhr.response;
        document.getElementById("list-enc-box").classList.toggle("d_none");
        newSup.classList.toggle("d_none");
      }
    }
  };
  xhr.send();
}

// 
function cancelAddSup() {
  document.getElementById("add-sup-box").classList.toggle("d_none");
  document.getElementById("list-enc-box").classList.toggle("d_none");
}

// 
function addSupervisor(btn) {
  let alert = document.querySelector("form #alert_area_enc");
  let data = document.querySelector("#add-sup-box form");
  let formData = new FormData(data);
  formData.append("addEnc", btn);
  
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../List_enc/php/list_enc_back.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        if(xhr.response === "done") {
          cancelAddSup();
          getSupervisors();
          swal("Done!", "Student has been added to the list successfully", "success");
        }
        else {
          alert.classList.remove("d_none");
          alert.innerHTML = xhr.response;
        }
      }
    }
  };
  xhr.send(formData);
}

// 
function deleteSup(btn) {
  // console.log(btn.getAttribute("data-code"));
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../List_enc/php/list_enc_back.php", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        getSupervisors();
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("deleteEnc=" + btn.getAttribute("data-code"));
}

// 
function deleteAllSups() {
  swal({
    title: "Are you sure?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if(willDelete) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../List_enc/php/list_enc_back.php", true);
      xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
            getSupervisors();
          }
        }
      }
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("deleteAllSups=destroy");
    }
  });
}
