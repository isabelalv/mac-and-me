<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "", "macnmedb");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    
    if (isset($_POST['submit'])) {
   //if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      $myhash = MD5($mypassword);

      $sql = "SELECT Email FROM currentUsers WHERE Email = '".$myusername."' and Password = '".$myhash."'";


      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);

    session_start();
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
          //here we start the session
          //this is your thing, Angela, I dont know how you're doing it
          
//         session_register("myusername");
//         $_SESSION['login_user'] = $myusername;
         
        $_SESSION['username'] = $myusername;
        $_SESSION['password'] = $mypassword;
        $_SESSION['loggedIn'] = true; 
        echo $_SESSION['loggedIn'];
            //this redirects to the member homepage
        header("location: http://localhost/mac-and-me-master/member.php");
    }
    else {
        echo "hi";
        echo '<script type="text/javascript">',
                'displayError();',
                '</script>'
                ;
        //echo '<script>displayError();</script>';
        }
   }
?>


    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Mac & Me - Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

        <script type="text/javascript">
            function displayError() {
                alert("Your Email or Password is Invalid");
            };
        </script>
    </head>

    <body class="no-sidebar">
        <div id="page-wrapper">

            <!-- Header -->
            <div id="header-wrapper">
                <div id="header" class="container">

                    <!-- Logo -->
                    <h1 id="logo"><a href="index.html">Mac & Me</a></h1>

                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li class="break"><a href="sign-up.html">Sign Up</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    </nav>

                </div>
            </div>

            <div id="footer-wrapper">
                <div id="footer" class="container">
                    <div class="log-form" style="text-align: center; width:30%;margin-left:auto;margin-right:auto;">
                        <h2 style="text-align: center">Login</h2>
                        <p></p>
                        <form action="" method="post">
                            <input name="username" type="text" title="username" placeholder="username" />
                            <input name="password" type="text" title="password" placeholder="password" />
                            <p></p>
                            <button name="submit" type="submit" class="btn">Login</button>
                        </form>
                    </div>
                    <!--end log form -->
                </div>

            </div>


        </div>


        <!-- Scripts -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
    <ul id="hero" style="position: absolute; right: 20px; top: 10px;">
        <li><a href="order-now.php" class="button"><strong>Cart</strong></a></li>
    </ul>

    </html>