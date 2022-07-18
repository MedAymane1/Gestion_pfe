<div class="container py-3" id="prfl-box">
    <h1 class="text-primary">Edit Profile</h1>
    <hr>
    <form id="prfl-grp" method="POST" onsubmit="event.preventDefault()">
        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-lg-3 col-md-5 pt-4 mb-3">
                <div class="text-center">
                    <img src="<?php echo $img ?>"
                         class="profil_img2"
                         alt="Failed to load image">
                    <div>
                        <label for="file-image" class="py-2">
                            Change your profile picture
                        </label>
                        <input type="file"
                               name="image"
                               id="file-image"
                               class="form-control"
                               accept="image/*">
                    </div>
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-lg-9">
                <div class="alert_area2">
        
                </div>
                <h3 class="py-2">Group info</h3>

                <div class="row mb-3">
                    <label for="nom_grp" class="col-md-3 form-label">Group name:</label>
                    <div class="col-md-9">
                        <input id="fname"
                               name="nom_grp"
                               class="form-control"
                               type="text"
                               value="<?php echo $nom_grp ?>">
                    </div>
                </div>

               

                <div class="row mb-3">
                    <label for="userName" class="col-md-3 form-label">Group User name:</label>
                    <div class="col-md-9">
                        <input id="userName"
                               name="userName"
                               class="form-control"
                               type="text"
                               value="<?php echo $username ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 form-label">Password:</label>
                    <div class="col-md-9">
                        <input class="form-control"
                               type="password"
                               value="password is crypted" disabled>
                    </div>
                </div>

                <div class="pt-4 d-flex justify-content-end align-items-center mb-2">
                    <a class="change_pass2" onclick="toggleToPass()">Change my password</a>
                    <button type="submit"
                            class="btn btn-primary ms-4"
                            value="button"
                            onclick="changeInfos(this.value)">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </form>

<!-- members group -->

    <h3 class="py-2">Group Members</h3>
       <hr>
       
    <div>
    <!-- card group --> 
    <div id="members" class="row gy-3 my-3 " style="grid-column-gap: 4rem;">
        <!--  -->
       
    

  </div>
</div>



    <!-- end  -->
</div>

<div id="pass-box" class="pass_box2 d_none2">
    <!--  -->
    
</div>