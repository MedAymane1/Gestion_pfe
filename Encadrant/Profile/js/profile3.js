// Show the selected image to upload before saving changes
const file = document.querySelector("#file-image");
const img = document.querySelector(".profil_img2");
file.addEventListener("change", function () {
  const choosedFile = this.files[0];

  if (choosedFile) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      img.setAttribute("src", reader.result);
    });
    reader.readAsDataURL(choosedFile);
  }
});

// Update profile info
function changeInfos(btn) {
  let alert = document.querySelector(".alert_area2");
  let data = document.querySelector("#prfl form");
  let formData = new FormData(data);
  formData.append("change", btn);

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../Profile/php/profile_back1.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log(xhr.response);
        if(xhr.response === "done") {
          alert.innerHTML = "";
          swal("Done!", "Profile updated successfully", "success");
        }
        else {
          alert.innerHTML = xhr.response;
          // console.log(xhr.response);
        }
      }
    }
  };
  xhr.send(formData);
}

/* 
function changeInfos() {
  // let data = document.querySelector("#prfl form");
  let fName = document.getElementById("fname");
  let lName = document.getElementById("lname");
  let userName = document.getElementById("userName");
  let email = document.getElementById("email");
  
  
  if (valide(userName.value) === 1 ) {
    // console.log("user name already used");
    // alert.style.color = "red";
    userName.style.border = "2px solid red";
    userName.value = "";
    userName.placeholder = "Already used, try another one";
    return;
  }
  else {
    console.log("user name valid");
    userName.style.border = "2px solid green";
  }

  if (isEmpty(fName)) {
    fName.style.border = "2px solid red";
  }
  else {
    fName.style.border = "2px solid green";
  }
  
  let formData = new FormData();
}
// const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
// email.match(value)

// function verifie that the user name not used
function valide(input) {
  let xhr = new XMLHttpRequest(), response;
  xhr.onreadystatechange = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if(xhr.status === 200) {
        response = parseInt(xhr.responseText);
      }
    }
  };
  xhr.open("POST", "../Profile/profile_back.php", false);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("userName=" + input);
  return response;
}
*/