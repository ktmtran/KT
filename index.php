<!DOCTYPE html>

<?php 
    $mainImage = file_get_contents('./backend/mainImage.txt');
    $bemoLogo = file_get_contents('./backend/bemoLogo.txt');
    $mainContent = file_get_contents('./backend/mainContent.txt');
    $noindex = file_get_contents('./backend/noindex.txt');
    $metaTitle = file_get_contents('./backend/metaTitleMain.txt');
    $metaDesc = file_get_contents('./backend/metaDescMain.txt');
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
                margin: 0;
                font: 1.11111vw Arial, Verdana, Helvetica, sans-serif;
                color: #373737;
                line-height: 22px;
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

            .title {
                width: 100%;
                position: absolute;
                top: 51.5%;
                left: 50%;
                transform: translate(-50%, -50%);
                letter-spacing: 0.694444vw;
                color: #FFFFFF;
                font-size: 3.194444vw;
            }

            .header {
                position: fixed;
                background-color: #FFFFFF;
                width: 100%;
                opacity: 0.93;
                z-index: 9;
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
                padding-top: 0.9px;
                border-bottom: solid 1px black;
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

            .padRight {
                padding-right: 30px;
            }

            .padLogo {
                padding-left: 2.9861vw;
            }

            .orangeLink { color: #ff6600; text-decoration: none; }
            .orangeLink:link { color: #ff6600; }
            .orangeLink:visited { color: #FF6600; }
            .orangeLink:hover { color: #909090; }

            a:link { color: black; }
            a:visited { color: black; }
            a:hover { color: black; }

            #content {
                margin: 3.47222vw; 
                text-align: justify;
                font-size: 16px;
            }
            
            .imageContainer {
                position: relative;
                text-align: center;
                color: white;
            }

            .footer {
                width: 100%;
                background-color: #000066;
                color: white;
                text-align: left;
                font-size: 13px;
                padding: 0.65vw 0;
            }

            .upArrow {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 97.9%;
                background: transparent;
                color: #D6D6D6;
                text-align: right;
                font-size: 5em;
                margin: 6.6% 0px;
            }

            .hide {
                opacity:0;
            }
            .show {
                opacity:1;
                font-size: 16px;
            }

            .upArrow { 
                color: #B2B2B2; 
                text-decoration: none; 
            }
            .upArrow:link { color: #D6D6D6; }
            .upArrow:visited { color: #D6D6D6; }
            .upArrow:hover { color: #D6D6D6; }

            #link {
                padding: 0;
                margin: 0;
                font-size: 0;
            }

            #twitter:link { padding-right: 5.65vw; }

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
                margin: 1.1vw 2.88vw;
                letter-spacing: 1px;
                font-size: 17px;
            }

        </style>
    </head>

    <body>
        <!-- Header -->
        <div class="header">
            <div class="topnav" id="myTopnav">

                <!-- Logo -->
                <div class="padLogo">
                    <a href="index.php" id="link">
                        <img alt="contact page image" 
                            src="<?php echo $bemoLogo ?>" 
                            width="167" height="100" />
                    </a>
                </div>

                <!-- Links -->
                <div class="padLeft">
                    <a href="#" class="active">Main</a>
                    <a href="#htp">How To Prepare</a>
                    <a href="#cdaQ">CDA Interview Questions</a>
                    <a href="contact-us.php">Contact Us</a>
                    <a href="javascript:void(0);" 
                        class="icon" onclick="navFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

            </div>
        </div>


        <!-- Main Image and Title -->
        <div class="imageContainer">
            <img style="width:100%;" alt="homepage image" 
                src="<?php echo $mainImage; ?>" />

            <div class="title">CDA Interview Guide
                <hr style="width: 60%; margin-left: 20%; background: white; 
                    height: 2px; border: 0px;" />

            </div>
        </div>


        <!-- Main content, found in a separate .html file  -->
        <div id="content"> <?php echo $mainContent ?> </div>


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
