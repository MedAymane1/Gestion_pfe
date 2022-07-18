
<!-- drop down file or folder  -->
        <!-- space for uploaded folders -->
        <div class="space_folder">
            <div class="title">
              <p>Folders uploaded</p>
            </div>
            <div class="uploded_folders_space schow "  id="folder_uploaded_space">
              <!-- folder space -->
              <!--  -->
            </div>
        </div>
        <!--space for uploaded folders   -->
        <div class="space_file">
            <div class="title">
                <p>Files uploaded</p>
            </div>
            <div class="uploded_files_space schow " id="uploded_files_space">
            
            </div>
        </div>
        <div class="chat_space" style=" box-shadow: 1px 1px 2px 2px; background:#b5b0b0; margin-left:10px; margin-top:10px; height:81vh" >
           




        <div class="row justify-content-center mb-2" style=" margin-top:-8px;">
           <div class="col-lg-5 bg-light rounded mt-2" style="width:95.5%; margin-top:-30px ; height:47vh"><br>
            <h4 class="text-center p-2">Write your comment!</h4>
            <form  method="POST" id="formComment" class="p-2" style="margin-top:-20px">
                <!-- <input type="hidden" name="id_comment" value="<?//= $user_id; ?>"> -->
                <div class="form-group">
                    <h6 >Title</h6>
                    <input type="text" id="comment_title" name="comment_title" class="form-control rounded-0" placeholder="Enter title" required  >
                </div>
                <div class="form-group">
                <h6 class="pt-2">Comment</h6>
                    <textarea name="comment_body" id="comment_body" class="form-control rounded-0" placeholder="Write your comment here"  required></textarea>
                </div>
                <div class="form-group mt-3 d-flex justify-content-between">
                        <input type="submit" id="submit_up" name="update" class="btn btn-success rounded-5 d_none1" value="Update Comment" onclick="EditComment(this)">
              
                        <input type="submit" id="submit_post" name="submit" class="btn btn-primary rounded-5" value="Post Comment" onclick = "postComment()">
                    <h5 class="float-right text-success p-2" id="success"></h5>
                </div>
            </form>
           </div> 
        </div>

<!-- afiche -->


        <div class="row justify-content-center" style=" margin-top:-5px;">
            <div class="col-lg-5 rounded bg-light p-3 " id="scr" style="width:95.5%; height:33.8vh">
                
            </div>
        </div>
                 
        </div>
        <i class="fa-solid fa-arrow-left-long back_icon1" id="back" onclick ="backtgroups()"></i>