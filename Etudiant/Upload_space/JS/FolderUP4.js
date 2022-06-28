const form_folder = document.getElementById("form-folder"),
FolderInput = document.querySelector(".input-folder");

form_folder.addEventListener("click", () =>{
  FolderInput.click();
});

function foldername(file){
    pathfolder = file.split("").map((el)=>{
     if(el === "/"){
       return " /";
     }else{
       return el;
     }
    }).join("");
  
    namefolder = pathfolder.split(" ").filter((ele)=>{
      return !ele.startsWith("/");
    }).join("");
    return namefolder;
  
  }

  //show folders uploaded 
  // let uploded_folders_space = document.getElementById("folder_uploaded_space");

  function schowFolders(){
    let uploded_folders_space = document.getElementById("folder_uploaded_space");
    let formData = new FormData();
    formData.append("status", "folder");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST","../Upload_space/PHP/showFoldersFiles.php", true);
      xhr2.onload =()=>{
        let data = xhr2.response;
        uploded_folders_space.innerHTML= data;
      }
    xhr2.send(formData);
    }

    //schow folder for every 1s 
    setInterval(() => {
      schowFolders();
    }, 1000);

//upload folder 
FolderInput.onchange = ({target})=>{
    let files = target.files;
    const formDataUpload = new FormData(form_folder);
    //add status upload 
    status_up_folder ="upload_folder";
    formDataUpload.append('status', status_up_folder);
    // add folder to form
    name_folder = foldername(files[0].webkitRelativePath);
    formDataUpload.append('folder_name', name_folder);
    //add nb files uploaded
    let length = files.length;
    formDataUpload.append('length', length);

    //add file path for all files 
    for (let i = 0; i < files.length; i++) { 
                let filePathParamName = `filepath${i}`;;
                formDataUpload.append(filePathParamName, files[i].webkitRelativePath);
            }
            let xhr = new XMLHttpRequest();  
            xhr.open("POST","../Upload_space/PHP/FolderUpload_.php", true);
                xhr.onload =()=>{
                    let data = xhr.response;
                    console.log(data);
                    if(data === "folder is successfully uploaded"){
                      swal("success", "Folder is successfully uploaded", "success");
                      FolderInput.value="";
                    }else{
                      swal("failed to uploaed", "upload fialed ", "error");
                      FolderInput.value="";
                    }
                }
                xhr.send(formDataUpload);
  }
//end upload folder

//delete folder
function deleteFolder(ele){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this folder!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      folder_id= ele.getAttribute("data-folder");
       const formData = new FormData();
       formData.append('folder_id', folder_id);
       let xhr = new XMLHttpRequest();
       xhr.open("POST","../Upload_space/PHP/deleteFolder.php", true);
        xhr.onload =()=>{
          let data = xhr.response;
          console.log(data);
          if(data === "folder deleted"){
            swal("Your folder has been deleted!", {
              icon: "success",
            });
          }else{
            swal("failed to delete ", "try again!!", "error");
          }
        }
        xhr.send(formData);
    } else {
      swal("Your folder is safe!");
    }
  })
}
