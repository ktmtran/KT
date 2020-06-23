<?php

$conImage = file_get_contents('./backend/contactImage.txt');
$mainImage = file_get_contents('./backend/mainImage.txt');
$bemoLogo = file_get_contents('./backend/bemoLogo.txt');

$noindex = file_get_contents('./backend/noindex.txt');
$myemail = file_get_contents('./backend/myemail.txt');
$mainContent = file_get_contents('./backend/mainContent.txt');

$mainTitle = file_get_contents('./backend/metaTitleMain.txt');
$mainDesc = file_get_contents('./backend/metaDescMain.txt');
$conTitle = file_get_contents('./backend/metaTitleContact.txt');
$conDesc = file_get_contents('./backend/metaDescContact.txt');

$pixelID = file_get_contents('./backend/pixelID.txt');
$googleTag = file_get_contents('./backend/googleTag.txt');

if ($noindex)
    $noindexStatus = "On";
else
    $noindexStatus = "Off";

if (isset($_POST['noindexOn']) and $noindexStatus == "Off") {
    $noindex = "<meta name=robots content=noindex>";
    $noindexStatus = "On";
    file_put_contents('./backend/noindex.txt', $noindex);
    echo "<b>No-index is now ON.</b>";
}

if (isset($_POST['noindexOff']) and $noindexStatus == "On") {
    $noindex = "";
    $noindexStatus = "Off";
    file_put_contents('./backend/noindex.txt', $noindex);
    echo "<b>No-index is now OFF.</b>";
}

if (isset($_POST['updateEmail'])) {
    $myemail = $_POST['sendTo'];
    file_put_contents('./backend/myemail.txt', $myemail);
    echo "<b>Successfully updated the contact form email!</b><br>";
}

if (isset($_POST['updatePixID'])) {
    $pixelID = $_POST['pixID'];
    file_put_contents('./backend/pixelID.txt', $pixelID);
    echo "<b>Successfully updated the FB Pixel ID.</b><br>";
}

if (isset($_POST['updateGoogTag'])) {
    $googleTag = $_POST['googTag'];
    file_put_contents('./backend/googleTag.txt', $googleTag);
    echo "<b>Successfully updated the Google Measurement ID.</b><br>";
}

if (isset($_POST['updateText'])) {
    $mainContent = $_POST['newText'];
    file_put_contents('./backend/mainContent.txt', $mainContent);
    echo "<b>Successfully updated the content on the main page.</b>";
}

if (isset($_POST['updateConImage'])) {
    $conImage = $_POST['newConImage'];
    file_put_contents('./backend/contactImage.txt', $conImage);
    echo "<b>Successfully updated the contact image.</b><br>";
}

if (isset($_POST['updateMainImage'])) {
    $mainImage = $_POST['newMainImage'];
    file_put_contents('./backend/mainImage.txt', $mainImage);
    echo "<b>Successfully updated the main image.</b><br>";
}

if (isset($_POST['updateBemoLogo'])) {
    $bemoLogo = $_POST['newBemoLogo'];
    file_put_contents('./backend/bemoLogo.txt', $bemoLogo);
    echo "<b>Successfully updated the BeMo Logo.</b><br>";
}

if (isset($_POST['resetImages'])) {
    $conImage = file_get_contents('./backend/contactImage-og.txt');
    $mainImage = file_get_contents('./backend/mainImage-og.txt');
    $bemoLogo = file_get_contents('./backend/bemoLogo-og.txt');

    file_put_contents('./backend/contactImage.txt', $conImage);
    file_put_contents('./backend/mainImage.txt', $mainImage);
    file_put_contents('./backend/bemoLogo.txt', $bemoLogo);
    echo "<b>Successfully reset all the images.</b><br>";
}

if (isset($_POST['updateMain'])) {
    $mainTitle = $_POST['newMainTitle'];
    $mainDesc = $_POST['newMainDesc'];
    file_put_contents('./backend/metaTitleMain.txt', $mainTitle);
    file_put_contents('./backend/metaDescMain.txt', $mainDesc);
    echo "<b>Successfully updated the main page metadata</b><br>";
}

if (isset($_POST['updateContact'])) {
    $conTitle = $_POST['newContactTitle'];
    $conDesc = $_POST['newContactDesc'];
    file_put_contents('./backend/metaTitleContact.txt', $conTitle);
    file_put_contents('./backend/metaDescContact.txt', $conDesc);
    echo "<b>Successfully updated the contact page metadata</b><br>";
}

if (isset($_POST['resetMain'])) {
    $mainTitle = file_get_contents('./backend/metaTitleMain-og.txt');
    $mainDesc = file_get_contents('./backend/metaDescMain-og.txt');
    file_put_contents('./backend/metaTitleMain.txt', $mainTitle);
    file_put_contents('./backend/metaDescMain.txt', $mainDesc);
    echo "<b>Successfully reset the main page metadata.</b><br>";
}

if (isset($_POST['resetContact'])) {
    $conTitle = file_get_contents('./backend/metaTitleContact-og.txt');
    $conDesc = file_get_contents('./backend/metaDescContact-og.txt');
    file_put_contents('./backend/metaTitleContact.txt', $conTitle);
    file_put_contents('./backend/metaDescContact.txt', $conDesc);
    echo "<b>Successfully reset the contact page metadata.</b><br>";
}

if (isset($_POST['resetText'])) {
    $mainContent = file_get_contents('./backend/mainContent-og.txt');
    file_put_contents('./backend/mainContent.txt', $mainContent);
    echo "<b>Successfully reset the main page text.</b><br>";
}

if (isset($_POST['sendEmail'])) {
    $to = $myemail;
    $subject = "Test Email";
    $txt = "Hello, this is a test e-mail.";
    $headers = "From: webmaster@example.com" . "\r\n" .
    "CC: someone@else.com";

    mail($to,$subject,$txt,$headers);
    echo "<b>Successfully sent your email!</b>";
}

?>

<html>
    <head>
        <?php include('fbpixel.php'); 
            include('googleTag.php'); ?>

        <title>Test</title>

        <!-- Scripts for the textbox with toolbar -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://tinymce.cachefly.net/4.0/tinymce.min.js">
        </script>
            
        <script type="application/x-javascript">
            tinymce.init({selector:'#TypeHere'});
        </script>

    </head>
    
    <body>
        <form action="" method="post">

            <div style="display: inline-block; padding: 3%; ">
                <b>Main Page</b><br>
                    Meta-Title:
                <input type="text" name="newMainTitle" style="width: 285px"
                    value="<?php echo $mainTitle; ?>" /><br>
                Meta-Description: <br>
                <textarea rows="8" cols="38" name="newMainDesc" 
                    style="width: 400px; height: 100px"><?php echo 
                    $mainDesc; ?></textarea><br>
                <input type="submit" name="updateMain" value="Update" />
                <input type="submit" name="resetMain" value="Reset" />
            </div>


            <div style="display: inline-block; padding: 3%; ">
                <b>Contact Page</b><br>
                    Meta-Title:
                <input type="text" name="newContactTitle" 
                    style="width: 285px" value="<?php echo $conTitle; ?>" 
                    /><br>
                Meta-Description: <br>
                <textarea rows="8" cols="38" name="newContactDesc" 
                    style="width: 400px; height: 100px"><?php echo 
                    $conDesc; ?></textarea><br>
                <input type="submit" name="updateContact" value="Update" />
                <input type="submit" name="resetContact" value="Reset" />
            </div><br><br>


            <div style="display: inline-block; padding: 3%; ">
                BeMo Logo:<br>
                <img src="<?php echo $bemoLogo; ?>" width="167" 
                    height="100" /><br>
                <input type="text" name="newBemoLogo"
                    value="<?php echo $bemoLogo; ?>" /><br>
                <input type="submit" name="updateBemoLogo" 
                    value="Update" />
            </div>


            <div style="display: inline-block; padding: 3%; ">
                Image for Main Page: <br>
                <img src="<?php echo $mainImage; ?>" width="167" 
                    height="100" /><br>
                <input type="text" name="newMainImage"
                    value="<?php echo $mainImage; ?>" /><br>
                <input type="submit" name="updateMainImage" 
                    value="Update" />
            </div>


            <div style="display: inline-block; padding: 3%; ">
                Image for Contact Page: <br>
                <img src="<?php echo $conImage; ?>" width="167"
                    height="100" /><br>
                <input type="text" name="newConImage"
                    value="<?php echo $conImage; ?>" /><br>
                <input type="submit" name="updateConImage" 
                    value="Update" />
            </div>


            <div style="padding: 3%; ">
                Reset all images: <br>
                <input type="submit" name="resetImages" 
                    value="Reset" /><br><br>


                No-index is currently: <?php echo $noindexStatus; ?><br>
                <input type="submit" name="noindexOn" value="On" />
                <input type="submit" name="noindexOff" value="Off"
                    /><br><br>


                Email for Contact Form:
                <input type="text" name="sendTo" 
                    value="<?php echo $myemail; ?>" /><br>
                <input type="submit" name="updateEmail" value="Update" />
                <input type="submit" name="sendEmail" value="Test Email"
                    /><br>
            </div>

            
            <div style="display: inline-block; padding: 3%; ">
                Facebook Pixel ID:
                <input type="text" name="pixID" 
                    value="<?php echo $pixelID; ?>" /><br>
                <input type="submit" name="updatePixID" value="Update" />
            </div>
            
            
            <div style="display: inline-block; padding: 3%; ">
                Google Measurement ID:
                <input type="text" name="googTag"
                    value="<?php echo $googleTag; ?>" /><br>
                <input type="submit" name="updateGoogTag" value="Update" />
            </div><br><br> 


            Content on Main Page:
            <textarea rows="8" cols="38" id="TypeHere" name="newText" 
                style="width: 86%; height: 135px"><?php echo 
                $mainContent; ?></textarea><br>
            <input type="submit" name="updateText" value="Update" />
            <input type="submit" name="resetText" value="Reset" />
        </form>

    </body>
</html>
