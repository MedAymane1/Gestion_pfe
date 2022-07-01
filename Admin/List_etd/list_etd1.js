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

// Show the choose file button
function getInputFile() {
  document.getElementById("import-file-box").classList.remove("d_none");
}

// 
function importFile(btn) {
  let form = document.querySelector("#import-file-box form");
  console.log(form);
  let formData = new FormData(form);
  formData.append("import", btn);
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "../List_etd/php/import_file.php", true);
  xhr.onload = () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
          if(xhr.status === 200) {
              console.log(xhr.response);
          }
      }
  }
  xhr.send(formData);
}