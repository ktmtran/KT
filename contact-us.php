<!DOCTYPE html>

<?php 
    $contactImage = file_get_contents('./backend/contactImage.txt');
    $bemoLogo = file_get_contents('./backend/bemoLogo.txt');
    $noindex = file_get_contents('./backend/noindex.txt');
    $metaTitle = file_get_contents('./backend/metaTitleContact.txt');
    $metaDesc = file_get_contents('./backend/metaDescContact.txt');
    $myemail = file_get_contents('./backend/myemail.txt');
    $name = "";
    $email = "";
    $request = "";

    if (isset($_POST['submit'])) {
        $to = $myemail;
        $subject = "BeMo Contact Form";
        $txt = $_POST['request'];
        $headers = "From: webmaster@example.com";
        mail($to,$subject,$txt,$headers);

        $name = "";
        $email = "";
        $request = "";
    }

    if (isset($_POST['reset'])) {
        $name = "";
        $email = "";
        $request = "";
        echo "<b>Successfully reset fields.</b>";
    }
?>

<html lang="en">
    <head>
        <?php include('fbpixel.php'); 
            include('googleTag.php'); ?>

        <title><?php echo $metaTitle; ?></title>
        <meta name="description" content="<?php echo $metaDesc; ?>" />
        <meta charset="UTF-8">

        <?php echo $noindex; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script>
            /* So bottom-right arrow doesn't show when at the top. */
            var myScrollFunc = function() {
                myID = document.getElementById("myID");
                var y = window.scrollY;
                if (y >= 100) {
                    myID.className = "upArrow show"
                } else {
                    myID.className = "upArrow hide"
                }
            };

            window.addEventListener("scroll", myScrollFunc);

            /* For the small screen, dynamic, hamburger navbar.  */
            function navFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

        <style>
            body {
                margin: 0px;
                font-family: arial;
                color: #373737;
            }

            .active { color: #010864; }
            .active:link { color: #010864; }
            .active:visited { color: #010864; }
            .active:hover { color: #010864; }
            .active:after {
                display: block;
                content: "";
                width: 40%;
                margin: 0 auto;
                padding-top: 1px;
                border-bottom: solid 1px black;
            }

            .fa {
              padding: 8px;
              font-size: 19px;
              width: 15px;
              text-align: center;
              text-decoration: none;
              margin: 0px 1px;
            }

            .fa:hover {
                opacity: 0.7;
            }

            .fa-facebook {
              background: #000066;
              color: white !important;
            }

            .fa-twitter {
              background: #000066;
              color: white !important;
            }

            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color: #FFFFFF;
              font-size: 17px;
            }

            li {
              float: right;
            }

            li a {
              display: block;
              color: white;
              text-align: center;
              padding: 30.5px 27px;
              text-decoration: none;
              letter-spacing: 1px;
            }

            .orangeLink { color: #ff6600; }
            .orangeLink:link { color: #ff6600; }
            .orangeLink:visited { color: #FF6600; }
            .orangeLink:hover { color: #909090; }

            a:link { color: black; }
            a:visited { color: black; }
            a:hover { color: black; }

            #name, #email, #request { border: none; }

            #reset, #submit {
                background: #999999;
                padding: 7px 28px 7px 28px;
                margin: 10px 10px 0 0;
                font-size: 0.8em;
                border: none;
                cursor: pointer;
                color: #010864;
                outline: none;
            }

            #inputs { margin: 50px; }

            input[type="text"], input, textarea {
                background-color: #CCCCCC;
                outline: none;
            }

            .contactInfo {
                letter-spacing: 2px;
                line-height: 16px;
            }

            .boxes {
                text-align: center;
                text-transform: uppercase;
                font-size: 11.8px;
                letter-spacing: 1px;
            }

            .centre { text-align: center; }

            .header {
                position: fixed;
                background-color: #FFFFFF;
                width: 100%;
                opacity: 0.93;
            }

            .footer {
                width: 100%;
                background-color: #000066;
                color: white;
                text-align: left;
                font-size: 13px;
                padding: 0.65vw 0;
            }

            .padLogo { padding-left: 43px; }

            .upArrow {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 97.9%;
                background: transparent;
                color: #D6D6D6;
                text-align: right;
                font-size: 80px;
                margin: 4.2% 0px;
            }

            .upArrow { 
                color: #B2B2B2; 
                text-decoration: none; 
            }
            .upArrow:link { color: #D6D6D6; }
            .upArrow:visited { color: #D6D6D6; }
            .upArrow:hover { color: #D6D6D6; }

            .hide {
                opacity:0;
            }
            .show {
                opacity:1;
                font-size: 80px;
            }

            #link {
                padding: 0;
                margin: 0;
                font-size: 0;
            }

            .topnav {
              overflow: hidden;
              background-color: #FFF;
            }

            .topnav a {
              float: left;
              display: block;
              color: #373737;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }

            .topnav .icon {
              display: none;
            }

            @media screen and (max-width: 600px) {
              .topnav a:not(:first-child) {display: none;}
              .topnav a.icon {
                float: right;
                display: block;
              }
            }

            @media screen and (max-width: 600px) {
              .topnav.responsive {position: relative;}
              .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
              }
              .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
              }
            }

            .padLeft {
                float: right;
                margin: 1.2vw 2.88vw;
                letter-spacing: 1px;
                font-size: 17px;
            }

            #twitter:link { padding-right: 5.65vw; }

        </style>
    </head>


    <body>

        <!-- Header -->
        <div class="header">
            <div class="topnav" id="myTopnav">

                <div class="padLogo">
                    <a href="index.php" id="link">
                        <img alt="contact page image" 
                            src="<?php echo $bemoLogo ?>" 
                            width="167" height="100" />
                    </a>
                </div>

                <div class="padLeft">
                    <a href="index.php">Main</a>
                    <a href="#htp">How To Prepare</a>
                    <a href="#cdaQ">CDA Interview Questions</a>
                    <a href="#" class="active">Contact Us</a>
                    <a href="javascript:void(0);" 
                        class="icon" onclick="navFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

            </div>
        </div>


        <!-- Contact Page Picture -->
        <img src="<?php echo $contactImage; ?>" alt="Contact Page Image" 
            style="width: 100%" />


        <div id="inputs">

            <!-- BeMo Contact Information -->
            <div class="contactInfo">
                <p style="line-height: 117%;"><br>
                    <span style="font-size:17px; font-weight:bold; ">
                        BeMo Academic Consulting Inc.
                    </span>
                </p>

                <p style="line-height: 0px;"><br>
                    <span style="font-size:13px; font-weight:bold; ">
                        <u>Toll Free</u></span>
                        <span style="font-size:13px; ">:</span> 
                        <span style="font-size:14px; ">1-855-900-BeMo (2366)
                     </span>
                </p>

                <p>
                    <span style="font-size:13px; font-weight:bold; ">
                        <u>Email</u></span>
                    <span style="font-size:13px; ">:</span>
                    <span style="font-size:14px; ">
                    info@bemoacademicconsulting.com</span>
                </p>
            </div>

            <!-- Input Boxes -->
            <form action="#" method="post">
                <div class="boxes"><br>
                    Name: * <br><br>
                    <input id="name" name="name" 
                        value="<?php echo $name;?>" 
                        style="width: 86%; height: 30px" /> <br><br><br>

                    Email Address: * <br><br>
                    <input id="email" name="email" 
                        value="<?php echo $email;?>" 
                        style="width: 86%; height: 30px" /> <br><br><br>

                    How can we help you? * <br><br>
                    <textarea rows="8" cols="38" id="request" 
                        name="request" style="width: 86%; 
                        height: 135px"><?php echo $request; ?></textarea>
                        <br><br><br>

                    <!-- Reset and Submit Buttons  -->
                    <input type="reset" id="reset" name="reset" 
                        value="RESET">
                    <input type="submit" id="submit" name="submit" 
                        value="SUBMIT">
                </div>
            </form>

            <!-- Note under buttons -->
            <div class="centre"><br>
                <span style="font-size: 15px;"><br> 
                    <u><b>Note</b></u>: 
                    If you are having difficulties with our contact us form 
                    above, send us an email to 
                    info@bemoacademicconsulting.com (copy &amp; paste the 
                    email address)
                </span>
            </div><br>

        </div>


        <!-- Footer  -->
        <div class="footer">
            <p style="text-align: left; width: 80%; display: inline-block; 
                margin-left: 5vw">&copy;2013-2016 BeMo Academic Consulting 
                Inc. All rights reserved. 
                <a class="orangeLink" 
                   href="#disclaimer"><u>Disclaimer & Privacy Policy</u></a>
                <a class="orangeLink" href="#contact"><u>Contact Us</u></a>
            </p>

            <!-- FB and Twitter Icons -->
            <p style="text-align: right; width: 14.5%; 
                display: inline-block;">

                <a href="#fb" class="fa fa-facebook"></a>
                <a id="twitter" href="#twitter" class="fa fa-twitter"></a>
            </p>

        </div>

        <!-- Bottom-left up arrow -->
        <div id="myID" class="upArrow hide">
            <a class="upArrow" href="#">&uarr;</a>
        </div>


    </body>
</html>
