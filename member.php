<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "macnmedb");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//here we check of the session is active, right Angela?
//also, does the active session change how we access the info of the user in the database?
//can I get a username from the session to search the database with?

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Mac & Me - Member Homepage</title>
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
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!--        this is where the header ends-->

            <!--        this is where the body begins-->
            <div class="row">
                <div class="column left" style="float:left; padding: 75px; height: 300px; width:25%;">
                    <h2>Profile Info</h2>
                    </br>
                    <table style="padding:20px;">

                        <tr>
                            <td style="padding:5px;">Name</th>
                                <td style="padding:5px;">Your email</th>
                        </tr>
                        <tr>
                            <td style="padding:5px;">Email</td>
                            <td style="padding:5px;">Your email</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">Address</td>
                            <td style="padding:5px;">Your address</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">City</td>
                            <td style="padding:5px;">Your city</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">State</td>
                            <td style="padding:5px;">Your state</td>
                        </tr>
                        <tr>
                            <td style="padding:5px;">Zip Code</td>
                            <td style="padding:5px;">Your zip code</td>
                        </tr>
                    </table>
                </div>
                <div class="column right" style="float: left;padding: 75px; height: 300px; width:75%;">
                    <h2>Reviews</h2>
                    <div>
                        <p style="padding: 30px;">This is one review from a fake customer. They are very satisfied with our product. </br> <em>- The Happy Customer</em></p>
                    </div>

                    <div>
                        <p style="padding: 30px;">This is another review from a fake customer. They are very satisfied with our product. </br> <em>- The Second Happy Customer</em></p>
                    </div>

                    <div>
                        <p style="padding: 30px;">This is another review from a fake customer. They are very satisfied with our product. </br> <em>- The Third Happy Customer</em></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <ul id="hero" style="position: absolute; right: 20px; top: 10px;">
        <li><a href="order-now.php" class="button"><strong>Cart</strong></a></li>
    </ul>

    </html>
