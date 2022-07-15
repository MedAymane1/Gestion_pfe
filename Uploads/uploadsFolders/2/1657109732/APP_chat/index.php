<?php 
include_once("header.php")
?>
<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime chat app</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">this is error message</div>
                <div class="name-details">
                    <!-- frst name field -->
                    <div class="field input">
                        <label for="">Frist Name</label>
                        <input type="text" name="Fname" placeholder="Frist Name" required>
                    </div>
                    <!-- last name field -->
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="Lname"  placeholder="Last Name" required>
                    </div>
                </div>    
                    <!-- email field -->
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="email" name="email"  placeholder="Entre your Email " required>
                    </div>
                   <!-- password field -->
                   <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Entre Password" required>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                     <!-- select image -->
                    <div class="field img">
                        <label for="">Select image</label>
                        <input name="image" type="file" >
                    </div>
                     <!-- submet  -->
                    <div class="field button">
                        <input type="submit" value="continue to chat" >
                    </div>
          </form>
            <div class="link">Already signed up?<a href="login.php">Log in now</a></div>
        </section>
    </div>
    <script src="javaScript/pass-schow-hide.js"></script>
    <script src="javaScript/signup.js"></script>
    <!-- <script src="javaScripta/signupa.js"></script> -->
</body>
</html>