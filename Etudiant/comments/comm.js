let containerComment = document.getElementById('commentaire');


// getComment
setInterval(() => {
  
  let xhr = new XMLHttpRequest();
    xhr.open("GET","../comments/PHP/comm.php", true);
    xhr.onload =()=>{
      let data = xhr.response;
      // console.log(data);
      containerComment.innerHTML = data;
    }
    
  xhr.send();
  
}, 1000);



