const form = document.querySelector("form"),
FolderInput = document.querySelector(".file-input");

form.addEventListener("click", () =>{
  FolderInput.click();
});

const form_file = document.getElementById("form-file"),
fileInput = document.querySelector(".file-input-file");


form_file.addEventListener("click", () =>{
  fileInput.click();
});

fileInput.onchange = ({target})=>{
  let file = target.files[0];
  console.log(file.webkitRelativePath);

  // if(file){
  //   let fileName = file.name;
  //   if(fileName.length >= 12){
  //     let splitName = fileName.split('.');
  //     fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
  //   }
    // uploadFile(fileName);
  }
// }


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

FolderInput.onchange = ({target})=>{
  let files = target.files;
  let length = files.length;
  for (let i = 0; i < length; i++) { 
    console.log(foldername(files[i].webkitRelativePath));
}
}


// function uploadFile(name){
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "php/upload.php");
//   xhr.upload.addEventListener("progress", ({loaded, total}) =>{
//     let fileLoaded = Math.floor((loaded / total) * 100);
//     let fileTotal = Math.floor(total / 1000);
//     let fileSize;
//     (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
//     let progressHTML = `<li class="row">
//                           <i class="fas fa-file-alt"></i>
//                           <div class="content">
//                             <div class="details">
//                               <span class="name">${name} • Uploading</span>
//                               <span class="percent">${fileLoaded}%</span>
//                             </div>
//                             <div class="progress-bar">
//                               <div class="progress" style="width: ${fileLoaded}%"></div>
//                             </div>
//                           </div>
//                         </li>`;
//     uploadedArea.classList.add("onprogress");
//     progressArea.innerHTML = progressHTML;
//     if(loaded == total){
//       progressArea.innerHTML = "";
//       let uploadedHTML = `<li class="row">
//                             <div class="content upload">
//                               <i class="fas fa-file-alt"></i>
//                               <div class="details">
//                                 <span class="name">${name} • Uploaded</span>
//                                 <span class="size">${fileSize}</span>
//                               </div>
//                             </div>
//                             <i class="fas fa-check"></i>
//                           </li>`;
//       uploadedArea.classList.remove("onprogress");
//       uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
//     }
//   });
//   let data = new FormData(form);
//   xhr.send(data);
// }