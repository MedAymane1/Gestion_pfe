
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="css/assl.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
				style=""
    	      action="php/login3.php" 
    	      method="post"
			  style="">

    		<h4 class="display-4  fs-1" style="color: #fff;">LOGIN</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert" >
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">User name</label>
		    <input type="text"
				   style="color:aqua"
			       placeholder="User name"
		           class="form-control"
		           name="username"
		           value="<?php echo (isset($_GET['username']))?$_GET['username']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label" style="margin-bottom:-4vh; margin-top:0.9vh">Password</label>
		    <input type="password" 
			       style="color:aqua"
			       placeholder="Password"
		           class="form-control"
		           name="passwd">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Login</button>
		  <a href="index.php" class="link-secondary" style="color:white; margin-left:1.9vh">Sign Up</a>
		</form>
    </div>
</body>
</html>

