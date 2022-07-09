<div class="container py-2" id="prfl-box">
    <h3 class="text-primary">Edit Profile</h3>
    <hr>
    <form method="POST" onsubmit="event.preventDefault()">
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
                    <div class="alert alert-info alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                This is an 
                                <strong>.alert</strong>
                                . Use this to show important messages to the user.
                            </div>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    </div>
                </div>
                <h3 class="py-2">groupe info</h3>

                <div class="row mb-3">
                    <label for="fname" class="col-md-3 form-label">Group name:</label>
                    <div class="col-md-9">
                        <input id="fname"
                               name="fname"
                               class="form-control"
                               type="text"
                               value="<?php echo $prenom_enc ?>">
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
    <h3 class="text-primary">groupe members</h3>
    <hr>
<div id="members">
    <!-- card group --> 
    <div class="row gy-3 my-3">
        <!--  -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-radius: 15px; width:16rem">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="<?php echo $img ?>"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">amyn</h4>
                  <div class="info d-flex w-100 flex-column">
                      <div  id="cne" class="w-100 d-flex  ">
                          <p class="w-30" style="font-weight: 700;">cne   :</p>
                          <label class="w-70" for="fname" style="padding-left: 2rem;">12345 </label>
                      </div>
            
                      <div  id="apogee" class="w-100 d-flex ">
                          <p class="w-30" style="font-weight: 700;">apogee :</p>
                          <label class="w-70" for="fname" style="padding-left: 0.4rem;">12345 </label>
                      </div>

                    <div  id="gmal" class="w-100 d-flex">
                        <p class="w-30" style="font-weight: 700;">gmail:</p>
                        <label class="w-70" for="fname" style="padding-left: 0.4rem;">amynali265@gmail.com</label>
                    </div>

                  </div> 
             </div>
         </div>
     </div>
     <!--  -->
     <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-radius: 15px; width:16rem">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="<?php echo $img ?>"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">amyn</h4>
                  <div class="info d-flex w-100 flex-column">
                      <div  id="cne" class="w-100 d-flex  ">
                          <p class="w-30" style="font-weight: 700;">cne   :</p>
                          <label class="w-70" for="fname" style="padding-left: 2rem;">12345 </label>
                      </div>
            
                      <div  id="apogee" class="w-100 d-flex ">
                          <p class="w-30" style="font-weight: 700;">apogee :</p>
                          <label class="w-70" for="fname" style="padding-left: 0.4rem;">12345 </label>
                      </div>

                    <div  id="gmal" class="w-100 d-flex">
                        <p class="w-30" style="font-weight: 700;">gmail:</p>
                        <label class="w-70" for="fname" style="padding-left: 0.4rem;">amynali265@gmail.com</label>
                    </div>

                  </div> 
             </div>
         </div>
     </div>
     <!--  -->
     <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-radius: 15px; width:16rem">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="<?php echo $img ?>"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">amyn</h4>
                  <div class="info d-flex w-100 flex-column">
                      <div  id="cne" class="w-100 d-flex  ">
                          <p class="w-30" style="font-weight: 700;">cne   :</p>
                          <label class="w-70" for="fname" style="padding-left: 2rem;">12345 </label>
                      </div>
            
                      <div  id="apogee" class="w-100 d-flex ">
                          <p class="w-30" style="font-weight: 700;">apogee :</p>
                          <label class="w-70" for="fname" style="padding-left: 0.4rem;">12345 </label>
                      </div>

                    <div  id="gmal" class="w-100 d-flex">
                        <p class="w-30" style="font-weight: 700;">gmail:</p>
                        <label class="w-70" for="fname" style="padding-left: 0.4rem;">amynali265@gmail.com</label>
                    </div>

                  </div> 
             </div>
         </div>
     </div>
        
   </div>
    

</div>
<div id="pass-box" class="pass_box2 d_none2">
    <!--  -->
</div>