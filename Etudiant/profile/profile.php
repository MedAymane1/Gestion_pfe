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
                <h3 class="py-2"> info</h3>

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
    <!-- card groupe -->
   
</div>
<div id="pass-box" class="pass_box2 d_none2">
    <!--  -->
</div>