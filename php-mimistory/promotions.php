<?php
    /*
    Plugin Name: Mimistory PHP Archive
    Plugin URI: http://www.flippakitten.com/plugins/
    Description: Show all your previous sends using Mad Mimi
    Author: James Gascoigne-Taylor
    Version: 0.0.1
    Author URI: http://www.flippakitten.com/
 */

    require('includes/MadMimi.class.php');
    require('includes/model-settings.php');
    include('includes/style-color.html');
    $mimi = new MadMimi($cleanUserName, $cleanApi_key);
    $promotions = new SimpleXMLElement($mimi->Promotions());

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
s
            <?php
        }
    }
?>

