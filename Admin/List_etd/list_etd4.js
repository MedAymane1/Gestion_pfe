// Get the students list by XMLHttpRequest and append it into the table
document.onload = getStudents();
function getStudents() {
  let stu = document.getElementById("data-etd");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../List_etd/php/list_etd_back.php?status=list_etd", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        stu.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}

//
function searchStudent() {
  // Declare variables
  let input, table, tr, td, i, txtValue;
  input = document.getElementById("search-etd");
  table = document.getElementById("data-etd");
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
function getInputFile() {
  document.getElementById("import-file-box").classList.toggle("d_none");
}

// 
function importFile(btn) {
  let form = document.querySelector("#import-file-box form");
  let formData = new FormData(form);
  formData.append("import", btn);
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "../List_etd/php/import_file_etd.php", true);
  xhr.onload = () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
            if(xhr.response === "done") {
              getStudents();
            }
            else {
              document.querySelector("form .alert_area2").innerHTML = xhr.response;
            }
          }
      }
  }
  xhr.send(formData);
}

// 
function getAddStudent() {
  let newStd = document.getElementById("add-stu-box");
  let xhr = new XMLHttpRequest();

  xhr.open("GET", "../List_etd/php/add_etd.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        newStd.innerHTML = xhr.response;
        document.getElementById("list-box").classList.toggle("d_none");
        newStd.classList.toggle("d_none");
      }
    }
  };
  xhr.send();
}

// 
function cancelAdd() {
  document.getElementById("add-stu-box").classList.toggle("d_none");
  document.getElementById("list-box").classList.toggle("d_none");
}

// 
function addStudent(btn) {
  let alert = document.querySelector("form #alert_area_etd");
  let data = document.querySelector("#add-stu-box form");
  let formData = new FormData(data);
  formData.append("addEtd", btn);
  
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../List_etd/php/list_etd_back.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        if(xhr.response === "done") {
          cancelAdd();
          getStudents();
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
function deleteEtd(apogee) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../List_etd/php/list_etd_back.php", true);
  xhr.onload = ()=> {
    if(xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        console.log(xhr.response);
        getStudents();
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("deleteEtd=" + apogee);
}

// 
function deleteAll() {
  swal({
    title: "Are you sure?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if(willDelete) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../List_etd/php/list_etd_back.php", true);
      xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
            getStudents();
          }
        }
      }
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("deleteAll=destroy");
    }
  });
}
