<?php 
include_once("header.php")
?>
<body>

    <div class="wrapper">
        <section class="form login">
            <header>Realtime chat app</header>
            <form action="#">
                <div class="error-txt">this is error message</div>    
                    <!-- email field -->
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="email" name="email" placeholder="Entre your Email ">
                    </div>
                   <!-- password field -->
                   <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Entre your Password">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                     <!-- submet  -->
                    <div class="field button">
                        <input type="submit" value="continue to chat" >
                    </div>
          </form>
            <div class="link">Not yet signed up?<a href="index.php">Sign in now</a></div>
        </section>
    </div>
    <script src="javaScript/pass-schow-hide.js"></script>
    <script src="javaScript/login.js"></script>
</body>
</html>