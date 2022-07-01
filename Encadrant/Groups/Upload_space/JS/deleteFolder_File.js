// encadrant delete folder 
function deleteFolderEnc(ele){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this folder!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        let uploadSpace = document.getElementById("contener_uploadss");
        id_grp=uploadSpace.getAttribute("data-id");
        folder_id= ele.getAttribute("data-folder");
         const formData = new FormData();
         formData.append('status',"folder");
         formData.append('id_grp', id_grp);
         formData.append('folder_id', folder_id);
         let xhr = new XMLHttpRequest();
         xhr.open("POST","../Groups/Upload_space/PHP/deleteFolderFile.php", true);
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

  // encadrant delete file
  function deletefileEnc(ele){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this folder!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        let uploadSpace = document.getElementById("contener_uploadss");
        id_grp=uploadSpace.getAttribute("data-id");
        new_file_name= ele.getAttribute("data-file");
         const formData = new FormData();
         formData.append('status',"file");
         formData.append('id_grp', id_grp);
         formData.append('new_file_name', new_file_name);
         let xhr = new XMLHttpRequest();
         xhr.open("POST","../Groups/Upload_space/PHP/deleteFolderFile.php", true);
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