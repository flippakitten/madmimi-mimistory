<?php
    /*
    Plugin Name: Mimistory PHP Archive
    Plugin URI: http://www.flippakitten.com/plugins/
    Description: Show all your previous sends using Mad Mimi
    Author: James Gascoigne-Taylor
    Version: 0.0.1
    Author URI: http://www.flippakitten.com/
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style-setup.css" type="text/css" />
    <link rel="stylesheet" href="css/farbtastic.css" type="text/css" />

    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/farbtastic.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
</head>
<body style="width:100%;background-color:#c2c2c2">
<div style="text-align:center;padding:20px;width:500px;margin-left:auto;margin-right:auto;background-color:#ffffff;webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;-webkit-box-shadow: 3px 3px 4px -1px rgba(0,0,0,0.7);-moz-box-shadow: 3px 3px 4px -1px rgba(0,0,0,0.7);box-shadow: 3px 3px 4px -1px rgba(0,0,0,0.7);">
    <h1>Enter your Mad Mimi and colour settings</h1>
    <form action="setup.php" method="post" style="text-align:left;">
        <input type="hidden" name="cmd" value="setup" />
        <div class="topForm">
            <label>Username:</label> <input name="username" /><br />
            <label>API Key:&nbsp;&nbsp; </label><input name="api_key" /><br />
            <label>Heading Colour:</label><input name="headingColor" id="headingColor" value="#c2c2c2"/><br />
            <label>Text Colour:</label><input name="textColor" id="textColor" value="#c2c2c2"/><br />
            <label>Link Colour:</label><input name="linkColor" id="linkColor" value="#c2c2c2"/><br />
            <input class="preview button" type="button" value="preview" /><input class="button" type="submit" value="away we go" /><br />
        </div>
        <div class="colorpicker" id="colorpicker"></div>
        <div class="colorpicker" id="colorpicker2"></div>
        <div class="colorpicker" id="colorpicker3"></div>
    </form>
    <div id="previewDiv" style="clear:both;height:54px;margin-left:10px;margin-top:10px;text-align:left">
        <img id="previewImage" style="height:44px; overflow:hidden;float:left" src="https://snaps.madmimi.com/v2/thumbs.php?size=b&amp;wait=120&amp;url=https%3A%2F%2Fmadmimi.com%2Fp%2F94e265" alt="https://snaps.madmimi.com/v2/thumbs.php?size=b&amp;wait=120&amp;url=https%3A%2F%2Fmadmimi.com%2Fp%2F94e265">
        <div style="float:left;margin-left:10px">
                <h2 id="previewHeading" style="margin:0; margin-bottom:3px;padding:0">Test</h2>
                Link: <a id="previewLink" href="http://www.madmimi.com/p/94e265" target="_blank" title="Created on 2014-10-08 17:55:32 +0300">http://www.madmimi.com/p/94e265</a>
        </div>
    </div>
    <hr />
<?php
if ($_POST['cmd'] == 'setup'){
    $UserName = strip_tags(stripslashes($_POST['username']));
    $Api_key = strip_tags(stripslashes($_POST['api_key']));
    $cleanHeadingColor = strip_tags(stripslashes($_POST['headingColor']));
    $cleanTextColor = strip_tags(stripslashes($_POST['textColor']));
    $cleanLinkColor = strip_tags(stripslashes($_POST['linkColor']));
    
    //Write the CSS File to be used by promotions.php
    $file = "includes/style-color.html";
    $cssRules = "<style type='text/css'>\n";
    $cssRules .= "#promotionsDiv{color:" . $cleanTextColor . ";}\n";
    $cssRules .= "#promotionsHeading{color:". $cleanHeadingColor . ";}\n";
    $cssRules .= "#promotionsLink{color:". $cleanLinkColor . ";}\n";
    $cssRules .= "</style>";
    // Write the contents back to the file
    file_put_contents($file, $cssRules);

    //Write Settings File to be used by promotions.php
    $file = "includes/model-settings.php";
    $info = "<?php\n";
    $info .= "\$cleanUserName = '" . $UserName . "';\n";
    $info .= "\$cleanApi_key = '" . $Api_key . "';\n";
    $info .= "?>";
    file_put_contents($file, $info);
?>
<h2 style="text-align:center;color:#9ffe80">SETTINGS UPDATED</h2>
<a href="index.php" target="_BLANK">View Current Layout</a>
<?php
}
?>
</div>
</body>
</html>
