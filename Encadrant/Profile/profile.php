<div class="container py-3">
    <h1 class="text-primary">Edit Profile</h1>
    <hr>
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-lg-3 col-md-5 pt-4 mb-3">
            <div class="text-center">
                <img src="../../images/avatar7.png"
                     class="profil_img2"
                     alt="Failed to load image">
                <div>
                    <label for="file-image" class="py-2">Change your profile picture</label>
                    <input type="file" id="file-image" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
        
        <!-- edit form column -->
        <div class="col-lg-9">
            <div class="alert alert-info alert-dismissable">
                <div class="d-flex justify-content-between">
                    <div>
                        This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <h3 class="py-2">Personal info</h3>
        
            <form action="" method="POST">
                <div class="row mb-3">
                    <label for="fname" class="col-md-3 form-label">First name:</label>
                    <div class="col-md-9">
                        <input id="fname" class="form-control" type="text" value="Mohamed">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="lname" class="col-md-3 form-label">Last name:</label>
                    <div class="col-md-9">
                        <input id="lname" class="form-control" type="text" value="EL ALAOUI E-CHARIF">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="code" class="col-md-3 form-label">Code:</label>
                    <div class="col-md-9">
                        <input id="code" class="form-control" type="text" placeholder="3216546" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label  for="email" class="col-md-3 form-label">Email:</label>
                    <div class="col-md-9">
                        <input id="email" class="form-control" type="email" value="moahmed.elalaoui@gmail.com">
                    </div>
                </div>

                <div class="row mb-3">
                    <label  for="userName" class="col-md-3 form-label">User name:</label>
                    <div class="col-md-9">
                        <input id="userName" class="form-control" type="text" value="chlaghem">
                    </div>
                </div>

                <div class="row mb-3">
                    <label  for="password" class="col-md-3 form-label">Password:</label>
                    <div class="col-md-9">
                        <input id="password" class="form-control" type="password" value="chlaghem">
                    </div>
                </div>

                <div class="pt-4 d-flex justify-content-end mb-2">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
