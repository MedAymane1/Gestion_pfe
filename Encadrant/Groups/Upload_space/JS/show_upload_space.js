//get folders from data base 
function schowFolders(){
  let folder_uploaded_space = document.getElementById("folder_uploaded_space");
  let uploadSpace = document.getElementById("contener_uploadss");
  let formData = new FormData();
  id_grp=uploadSpace.getAttribute("data-id");
  formData.append("status", "folder");
  formData.append("id_grp", id_grp);
  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP/showFoldersFiles.php", true);
    xhr.onload =()=>{
      let data = xhr.response;
      folder_uploaded_space.innerHTML= data;
    }
  xhr.send(formData);
}

//get files from data base
function schowFiles(){

  let file_uploaded_space = document.getElementById("uploded_files_space");
  let uploadSpace = document.getElementById("contener_uploadss");
  let formData = new FormData();
  id_grp=uploadSpace.getAttribute("data-id");
  formData.append("status", "files");
  formData.append("id_grp", id_grp);
  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP/showFoldersFiles.php", true);
    xhr.onload =()=>{
      let data = xhr.response;
      file_uploaded_space.innerHTML= data;
    }
  xhr.send(formData);
}

//schow all folders and files groups
function schowUploadspace(ele){   
 let groups = document.getElementById("container");
 let uploadSpace = document.getElementById("contener_uploadss");
 groups.classList.toggle("d_none1");
 uploadSpace.style.display="flex";
 uploadSpace.setAttribute("data-status","active")
 id_grp=ele.getAttribute("data-id");
 uploadSpace.setAttribute("data-id",id_grp);
  schowFolders();
  schowFiles();
}


setInterval(() => {
  let uploadSpace = document.getElementById("contener_uploadss");
  if(uploadSpace.getAttribute("data-status")=== "active"){
    schowFolders();
    schowFiles();
  }
}, 1000);



function backtgroups(){
  let groups = document.getElementById("container");
 let uploadSpace = document.getElementById("contener_uploadss");
 groups.classList.toggle("d_none1");
 uploadSpace.style.display="none";
 uploadSpace.setAttribute("data-status","unactive")
}

//delete folder 
// function deleteFolderEnc(ele){
//   swal({
//     title: "Are you sure?",
//     text: "Once deleted, you will not be able to recover this folder!",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//       folder_id= ele.getAttribute("data-folder");
//        const formData = new FormData();
//        formData.append('folder_id', folder_id);
//        formData.append('status', "folder");
//        let xhr = new XMLHttpRequest();
//        xhr.open("POST","../Upload_space/PHP/deleteFolder.php", true);
//         xhr.onload =()=>{
//           let data = xhr.response;
//           console.log(data);
//           if(data === "folder deleted"){
//             swal("Your folder has been deleted!", {
//               icon: "success",
//             });
//           }else{
//             swal("failed to delete ", "try again!!", "error");
//           }
//         }
//         xhr.send(formData);
//     } else {
//       swal("Your folder is safe!");
//     }
//   })
// }
