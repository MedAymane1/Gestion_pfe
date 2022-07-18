<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup_enc.php" 
    	      method="post"
    	      enctype="multipart/form-data"
			  style="">

    		<h4 class="display-4  fs-1" style="color: #fff;">ENCADRANT</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert"  style="width: auto; height: 5vh; margin-top: -4vh;">
			  <p style="margin-top: -2vh;"><?php echo $_GET['error']; ?></p>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert" style="width: auto; height: 5vh; margin-top: -4vh;">
			  <p style="margin-top: -2vh;"><?php echo $_GET['success']; ?></p>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">First name</label>
		    <input type="text" 
			       style="color:aqua"
				   placeholder="First name"
		           class="form-control"
		           name="nom_enc"
		           value="<?php echo (isset($_GET['nom_enc']))?$_GET['nom_enc']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Last name</label>
		    <input type="text" 
			       style="color:aqua"
			       placeholder="Last name"
		           class="form-control"
		           name="prenom_enc"
		           value="<?php echo (isset($_GET['prenom_enc']))?$_GET['prenom_enc']:"" ?>">
		  </div>

          <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Username</label>
		    <input type="text" 
			       style="color:aqua"
			       placeholder="Username"
		           class="form-control"
		           name="username"
		           value="<?php echo (isset($_GET['username']))?$_GET['username']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Email</label>
		    <input type="email" 
			       style="color:aqua"
			       placeholder="supervisor@example.com"
		           class="form-control"
		           name="email_enc"
		           value="<?php echo (isset($_GET['email_enc']))?$_GET['email_enc']:"" ?>">
		  </div>


		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Personal code</label>
		    <input type="text" 
			       style="color:aqua"
			       placeholder="Personal code"
		           class="form-control"
		           name="code_enc"
		           value="<?php echo (isset($_GET['code_enc']))?$_GET['code_enc']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Password</label>
		    <input type="password"
		           style="color:aqua"
			       placeholder="Password" 
		           class="form-control"
		           name="passwd">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Profile image</label>
		    <input type="file" 
		           class="form-control"
		           name="img_enc">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <a href="index.php" class="link-secondary" style="color:white; margin-left:1.9vh">Login</a>
          <a href="index_etd.php" class="link-secondary" style="color:white; margin-left:1.9vh"> I'm a student?</a>
		</form>
    </div>
</body>
</html>