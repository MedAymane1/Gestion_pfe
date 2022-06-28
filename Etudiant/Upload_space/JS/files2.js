const form_file = document.getElementById("form-file"),
fileInput = document.querySelector(".file-input-file");


form_file.addEventListener("click", () =>{
  fileInput.click();
});

function showfiles(){
  let uploded_files_space = document.getElementById("uploded_files_space");
    let formData = new FormData();
    formData.append("status", "files");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST","../Upload_space/PHP/showFoldersFiles.php", true);
      xhr2.onload =()=>{
        let data = xhr2.response;
        uploded_files_space.innerHTML= data;
      }
    xhr2.send(formData);
}

setInterval(() => {
  showfiles();
}, 1000);

//upload files
fileInput.onchange = ({target})=>{
    let file = target.files[0];
    const formDataUpload = new FormData(form_file);
    // console.log(file);
    let xhr = new XMLHttpRequest();  
    xhr.open("POST","../Upload_space/PHP/fileUpload.php", true);
        xhr.onload =()=>{
            let data = xhr.response;
            console.log(data);
            if(data == "file uploaded successfully"){
              swal("success", "Folder is successfully uploaded", "success");
              fileInput.value="";
            }else{
              // schowFolders();
              swal("failed to uploaed", "upload fialed ", "error");
              fileInput.value="";
            }
        }
        xhr.send(formDataUpload);
}

// delete file 
function deletefile(ele){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this folder!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      new_file_name= ele.getAttribute("data-file");
       const formData = new FormData();
       formData.append('new_file_name', new_file_name);
       let xhr = new XMLHttpRequest();
       xhr.open("POST","../Upload_space/PHP/deletefile.php", true);
        xhr.onload =()=>{
          let data = xhr.response;
          console.log(data);
          if(data === "file deleted"){
            swal("Your file has been deleted!", {
              icon: "success",
            });
          }else{
            swal("failed to delete ", "try again!!", "error");
          }
        }
        xhr.send(formData);
    } else {
      swal("Your file is safe!");
    }
  })
}
