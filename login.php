<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "macnmedb");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM macnmedb WHERE Email = '$myusername' and Password = 'MD5('$mypassword')'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          //here we start the session
          //this is your thing, Angela, I dont know how you're doing it
          
//         session_register("myusername");
//         $_SESSION['login_user'] = $myusername;
         
          //this redirects to the member homepage
         header("location: member.php");
      }else {
          
         $error = "Your Login Name or Password is invalid";
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

            <div style="font-size:11px; color:#cc0000; margin-top:10px">
                <?php echo $error; ?>
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
                            <button type="submit" class="btn">Login</button>
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
