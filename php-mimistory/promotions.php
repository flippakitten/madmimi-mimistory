<?php
    /*
    Plugin Name: Mimistory PHP Archive
    Plugin URI: http://www.flippakitten.com/plugins/
    Description: Show all your previous sends using Mad Mimi
    Author: James Gascoigne-Taylor
    Version: 0.0.1
    Author URI: http://www.flippakitten.com/
 */

    // Include library to connect to Mad Mimi
    require('includes/MadMimi.class.php');
    // Include connection settings
    require('includes/model-settings.php');
    // Include colour css setup from setup.php
    include('includes/style-color.html');
    $mimi = new MadMimi($cleanUserName, $cleanApi_key);
    $promotions = new SimpleXMLElement($mimi->Promotions());
    ?>
    <style type="text/css">
            #promotionsDiv{
                clear:both;
                height:54px;
                margin-left:10px;
                margin-top:10px;
                font-family: sans-serif;
                font-size:12px;
                color:#c2c2c2;
            }
            #promotionsDiv img{
                height:44px; 
                overflow:hidden;
                float:left
            }
            .textDiv{
                float:left;
                margin-left:10px
            }
            #promotionsHeading{
                margin:0; 
                margin-bottom:3px;
                padding:0;
            }
            #promotionsLink{
                font-family: sans-serif;
                font-size:12px;
                text-decoration:none;
            }
        </style>
    <?php
    // Loop to pull in promotions
    foreach ($promotions as $promotion) {
        if ($promotion['hidden'] == 'false'){
        ?>
            <div id="promotionsDiv">
                <img src="<?php echo $promotion['thumbnail']; ?>" alt="<?php echo $promotion['thumbnail']; ?>" />
                <div class="textDiv">
                    <h2 id="promotionsHeading"><?php echo $promotion['name']; ?></h2>
                    Link: <a id="promotionsLink" href="http://www.madmimi.com/p/<?php echo $promotion['mimio']; ?>" target="_blank" title="Created on <?php echo $promotion['updated_at']; ?>">http://www.madmimi.com/p/<?php echo $promotion['mimio']; ?></a><br />
                </div>
            </div>
            <?php
        }
    }
?>

