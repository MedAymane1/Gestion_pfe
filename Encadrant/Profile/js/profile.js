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
        if(xhr.response === "done") {
          alert.innerHTML = "";
          // Update the header image
          let src = document.getElementById("profile-img").getAttribute("src");
          document.querySelector("#header #header-img").src = src;

          // Update the header full name
          let fname = document.querySelector("#prfl-box #fname").value;
          let lname = document.querySelector("#prfl-box #lname").value;
          let fullName = lname + " " + fname;
          document.querySelector("#header #user-full-name").innerHTML = fullName;

          swal("Done!", "Profile updated successfully", "success");
        }
        else {
          alert.innerHTML = xhr.response;
        }
      }
    }
  };
  xhr.send(formData);
}
