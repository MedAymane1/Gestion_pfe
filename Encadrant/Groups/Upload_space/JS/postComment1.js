let form = document.getElementById("formComment");
let comment_title= document.getElementById("comment_title");
let comment_body= document.getElementById("comment_body");
let submit_up= document.getElementById("submit_up");
let submit_post= document.getElementById("submit_post");
let successMsg = document.getElementById("success");
let speaceshowcomment=document.getElementById("scr");
let uploadSpace = document.getElementById("contener_uploadss");
form.addEventListener("submit", function(event){
    event.preventDefault()
  });

  // fonction show comment 
function showComment(){
    let uploadSpace = document.getElementById("contener_uploadss");
    let formData =new FormData();
    id_grp=uploadSpace.getAttribute("data-id");
    console.log(id_grp);
    formData.append("id_grp", id_grp);
    formData.append("status", "showcomment");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
    xhr.onload =()=>{
      let data = xhr.response;
      // console.log(data);
      speaceshowcomment.innerHTML = data;
    }
    
  xhr.send(formData);
}

// showComment()

//   fonction post
function postComment(){   
    // let uploadSpace = document.getElementById("contener_uploadss");
    let formData =new FormData(form);
    id_grp=uploadSpace.getAttribute("data-id");
    formData.append("id_grp", id_grp);
    formData.append("status", "postComment");

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
    xhr.onload =()=>{
      let data = xhr.response;
      console.log(data)
      if(data == "Posted Successfully!"){
        comment_title.value= "";
        comment_body.value= "";
        successMsg.innerHTML=data;
        showComment()
      }else{
        successMsg.innerHTML=data;
      }
    }
  xhr.send(formData);

}
// editfonction
function editComment(){   
  // let uploadSpace = document.getElementById("contener_uploadss");
  let formData =new FormData(form);
  id_grp=uploadSpace.getAttribute("data-id");
  formData.append("id_grp", id_grp);
  formData.append("status", "postComment");

  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
  xhr.onload =()=>{
    let data = xhr.response;
    console.log(data)
    if(data == "Posted Successfully!"){
      comment_title.value= "";
      comment_body.value= "";
      successMsg. innerHTML=data;
      showComment()
    }else{
      successMsg. innerHTML=data;
    }
  }
xhr.send(formData);

}

function getTitle(id_comment,id_grp) {

  let formData =new FormData();
  formData.append("id_comment",id_comment);
  formData.append("id_grp", id_grp);
  formData.append("status", "gettitle");


  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
  xhr.onload =()=>{
    let data = xhr.response;
    console.log(data)
    comment_title.value= data;
  }
  xhr.send(formData);

}
function getComment(id_comment,id_grp) {

  let formData =new FormData();
  formData.append("id_comment",id_comment);
  formData.append("id_grp", id_grp);
  formData.append("status", "getComment");


  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
  xhr.onload =()=>{
    let data = xhr.response;
    console.log(data)
    comment_body.value= data;
  }
  xhr.send(formData);

}


function getallComment(element){
  submit_up.classList.toggle("d_none1");
  submit_post.classList.toggle("d_none1");
  id_comment = element.getAttribute("data-id_comment");
  submit_up.setAttribute("data-id_comment",id_comment);
  id_grp=uploadSpace.getAttribute("data-id");
  getTitle(id_comment,id_grp)
  getComment(id_comment,id_grp)
}


function EditComment(element){   
  // let uploadSpace = document.getElementById("contener_uploadss");
  let formData =new FormData(form);
  id_grp=uploadSpace.getAttribute("data-id");
  id_comment=element.getAttribute("data-id_comment");
  formData.append("id_comment",id_comment);
  formData.append("id_grp", id_grp);
  formData.append("status", "editComment");

  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
  xhr.onload =()=>{
    let data = xhr.response;
    console.log(data)
    if(data == "Edited Successfully!"){
      comment_title.value= "";
      comment_body.value= "";
      successMsg. innerHTML=data;
      showComment()
    }else{
      successMsg. innerHTML=data;
    }
  }
xhr.send(formData);

}

function DeleteComment(element){   
  // let uploadSpace = document.getElementById("contener_uploadss");
  let formData =new FormData();
  id_grp=uploadSpace.getAttribute("data-id");
  id_comment=element.getAttribute("data-id_comment");
  formData.append("id_comment",id_comment);
  formData.append("id_grp", id_grp);
  formData.append("status", "deltComment");

  let xhr = new XMLHttpRequest();
  xhr.open("POST","../Groups/Upload_space/PHP_comment/postComment.php", true);
  xhr.onload =()=>{
    let data = xhr.response;
    console.log(data)
    if(data=="Comment deleted successfully!"){
      successMsg.innerHTML=data;
      showComment()
    }else{
      successMsg.innerHTML="Failed to delete comment!";
    }
    
  }
xhr.send(formData);

}