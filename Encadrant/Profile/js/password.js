// Get the change password form, append it in div#pass-box
function getPassForm() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../Profile/php/password.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        data=xhr.response;
        console.log(data);  
        document.getElementById("pass-box").innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}


// Hide the profile space, show change password space
function toggleToPass() {
  document.getElementById("prfl-box").classList.toggle("d_none2");
  document.getElementById("pass-box").classList.toggle("d_none2");
  getPassForm();
}



//
function cancelChange() {
  document.getElementById("prfl-box").classList.toggle("d_none2");
  document.getElementById("pass-box").classList.toggle("d_none2");
}

// 
function changePasswd(btn) {
  let alert = document.querySelector("form .alert_area_pass2");
  let data = document.querySelector("#pass-box form");
  let formData = new FormData(data);
  formData.append("changePass", btn);
  
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Profile/php/password_back.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // console.log(xhr.response);
        if(xhr.response === "done") {
          cancelChange();
          swal("Done!", "Your password has been changed successfully", "success");
        }
        else {
          alert.classList.remove("d_none2");
          alert.innerHTML = xhr.response;
          // console.log(xhr.response);
        }
      }
    }
  };
  xhr.send(formData);
}