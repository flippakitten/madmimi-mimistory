<html>
<head>
<link rel="stylesheet" href="css/style-mimistory.css" type="text/css" />
<link rel="stylesheet" href="css/farbtastic.css" type="text/css" />

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/farbtastic.js"></script>

<style type="text/css">
    
</style>
<script type="text/javascript">

  $(document).ready(function() {

    $('#headingColor').click(function(){
        $('#colorpicker').farbtastic('#headingColor');
        $('#colorpicker').fadeIn('slow');
    });
    $('#headingColor').blur(function(){
        $('#colorpicker').hide();
    });
    $('#textColor').click(function(){
        $('#colorpicker2').farbtastic('#textColor');
        $('#colorpicker2').fadeIn('slow');
    });
    $('#textColor').blur(function(){
        $('#colorpicker2').hide();
    });
    $('#linkColor').click(function(){
        $('#colorpicker3').farbtastic('#linkColor');
        $('#colorpicker3').fadeIn('slow');
    });
    $('#linkColor').blur(function(){
        $('#colorpicker3').hide();
    });
    $('.preview').click(function(){
        $('#previewDiv').fadeIn('slow');
        var headingColor = $('#headingColor').val();
        var linkColor = $('#linkColor').val();
        var textColor = $('#textColor').val();
        $('#previewDiv').css('color',textColor);
        $('#previewHeading').css('color',headingColor);
        $('#previewLink').css('color',linkColor);
    });

  });

</script>
</head>

<body>
<a href="promotions.php"><h1>Promotions</h1></a>
<form action="promotions.php" method="post">
    <input type="hidden" name="cmd" value="getPromotions" />
    <div class="topForm">
        <label>Username:</label> <input name="username" /><br />
        <label>API Key:&nbsp;&nbsp; </label><input name="api_key" /><br />
        <label>Heading Colour:</label><input name="headingColor" id="headingColor" value="#c2c2c2"/><br />
        <label>Text Colour:</label><input name="textColor" id="textColor" value="#c2c2c2"/><br />
        <label>Link Colour:</label><input name="linkColor" id="linkColor" value="#c2c2c2"/><br />
        <input class="preview button" type="button" value="preview" /><input class="button" type="submit" value="away we go" />
    </div>
    <div class="colorpicker" id="colorpicker"></div>
    <div class="colorpicker" id="colorpicker2"></div>
    <div class="colorpicker" id="colorpicker3"></div>
</form>
<div id="previewDiv" style="clear:both;height:54px;margin-left:10px;margin-top:10px;">
    <img id="previewImage" style="height:44px; overflow:hidden;float:left" src="https://snaps.madmimi.com/v2/thumbs.php?size=b&amp;wait=120&amp;url=https%3A%2F%2Fmadmimi.com%2Fp%2F94e265" alt="https://snaps.madmimi.com/v2/thumbs.php?size=b&amp;wait=120&amp;url=https%3A%2F%2Fmadmimi.com%2Fp%2F94e265">
    <div style="float:left;margin-left:10px">
            <h2 id="previewHeading" style="margin:0; margin-bottom:3px;padding:0">Test</h2>
            Link: <a id="previewLink" href="http://www.madmimi.com/p/94e265" target="_blank" title="Created on 2014-10-08 17:55:32 +0300">http://www.madmimi.com/p/94e265</a>
    </div>
</div>
<hr />

<?php
if ($_POST['cmd'] == 'getPromotions'){
    require('MadMimi.class.php');
    $cleanUserName = strip_tags(stripslashes($_POST['username']));
    $cleanApi_key = strip_tags(stripslashes($_POST['api_key']));
    $cleanHeadingColor = strip_tags(stripslashes($_POST['headingColor']));
    $cleanTextColor = strip_tags(stripslashes($_POST['textColor']));
    $cleanLinkColor = strip_tags(stripslashes($_POST['linkColor']));
    //james@muthasun.co.za
    //05a12369da334b16cfbeb19f8cf9cc17
    $mimi = new MadMimi($cleanUserName, $cleanApi_key);
    $promotions = new SimpleXMLElement($mimi->Promotions());
    //$mailings = new SimpleXMLElement($mimi->https://api.madmimi.com/promotions.xml)

    foreach ($promotions as $promotion) {
        if ($promotion['hidden'] == 'false'){
        ?>
                    <div id="promotionsDiv" style="clear:both;height:54px;margin-left:10px;margin-top:10px;color:<?php echo $cleanTextColor; ?>;">
                            <img style="height:44px; overflow:hidden;float:left" src="<?php echo $promotion['thumbnail']; ?>" alt="<?php echo $promotion['thumbnail']; ?>" />
                            <div style="float:left;margin-left:10px">
                                    <h2 id="promotionsHeading" style="margin:0; margin-bottom:3px;padding:0;color:<?php echo $cleanHeadingColor; ?>;"><?php echo $promotion['name']; ?></h2>
                                    Link: <a id="promotionsLink" style="font-family: sans-serif;font-size:12px;text-decoration:none;color:<?php echo $cleanLinkColor; ?>;" href="http://www.madmimi.com/p/<?php echo $promotion['mimio']; ?>" target="_blank" title="Created on <?php echo $promotion['updated_at']; ?>">http://www.madmimi.com/p/<?php echo $promotion['mimio']; ?></a><br />
                            </div>

                </div>

            <?php
        }
    }
}
?>

</body>
</html>
