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
    	      enctype="multipart/form-data">

    		<h4 class="display-4  fs-1">Create Account Etu</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Nom</label>
		    <input type="text" 
		           class="form-control"
		           name="nom_etd"
		           value="<?php echo (isset($_GET['nom_etd']))?$_GET['nom_etd']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Prenom</label>
		    <input type="text" 
		           class="form-control"
		           name="prenom_etd"
		           value="<?php echo (isset($_GET['prenom_etd']))?$_GET['prenom_etd']:"" ?>">
		  </div>


		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" 
		           class="form-control"
		           name="email"
		           value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">CNE</label>
		    <input type="text" 
		           class="form-control"
		           name="cne"
		           value="<?php echo (isset($_GET['cne']))?$_GET['cne']:"" ?>">
		  </div>


		  <div class="mb-3">
		    <label class="form-label">Apogee</label>
		    <input type="text" 
		           class="form-control"
		           name="apogee"
		           value="<?php echo (isset($_GET['apogee']))?$_GET['apogee']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="passwd">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="img">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <a href="index_enc.php" class="link-secondary">Signup Encadrant?</a>
		  <a href="login.php" class="link-secondary" position="right">Login</a>
		  
		</form>
    </div>
</body>
</html>