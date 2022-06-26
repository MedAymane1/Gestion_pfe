<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/assl.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450  p-3"
    	      action="php/signup.php" 
    	      method="post"
    	      enctype="multipart/form-data"
			  style="">

    		<h4 class="display-4  fs-1" style="color: #fff;">ETUDIANT</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert" style="width: auto; height: 5vh; margin-top: -4vh; ">
			  <p style="margin-top: -2vh;"><?php echo  $_GET['error']; ?></p>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert" style="width: auto; height: 5vh; margin-top: -4vh;">
			  <p style="margin-top: -2vh;"><?php echo $_GET['success']; ?></p>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Apogee</label>
		    <input type="text" 
				   placeholder="Apogee"
		           class="form-control"
		           name="apogee"
		           value="<?php echo (isset($_GET['apogee']))?$_GET['apogee']:"" ?>">
		  </div>

		  <div class="mb-3">
		  <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">CNE</label>
		    <input type="text" 
			       placeholder="Cne"
		           class="form-control"
		           name="cne"
		           value="<?php echo (isset($_GET['cne']))?$_GET['cne']:"" ?>">
		  </div>


		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Nom</label>
		    <input type="text" 
			       placeholder="Nom"
		           class="form-control"
		           name="nom_etd"
		           value="<?php echo (isset($_GET['nom_etd']))?$_GET['nom_etd']:"" ?>">
		  </div>
         
		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Prenom</label>
		    <input type="text" 
			       placeholder="Prenom"
		           class="form-control"
		           name="prenom_etd"
		           value="<?php echo (isset($_GET['prenom_etd']))?$_GET['prenom_etd']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Email</label>
		    <input type="email" 
				   placeholder="Email"
		           class="form-control"
		           name="email_etd"
		           value="<?php echo (isset($_GET['email_etd']))?$_GET['email_etd']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="img_etd">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <a href="index.php" class="link-secondary" style="color:white; margin-left:1.9vh">Signup Encadrant?</a>
		  
		</form>
    </div>
</body>
</html>


<!-- formaction="home.php" -->