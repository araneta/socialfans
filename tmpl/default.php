<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<div class="modul-box first" id="rss">
    <div class="module-boxpos">
        <div class="modul-box-top"></div>
        <div class="modul-box-content">
            <ul class="badges">
            	<?php
            	if(!empty($feedburnerusername))
            	{ 
            	?>
                <li>
                    <a rel="nofollow external" href="http://feeds.feedburner.com/<?php echo $feedburnerusername;?>">
                        <img src="<?php echo $cssurl; ?>blank.gif" alt="Subscribe to our RSS feed" class="feedburner" >
                        <span title="Subscribe to our RSS feed" class="overlay"></span>
                        <span class="badge"><span><?php echo $feedcount;?></span></span>
                    </a>
                </li>
                <?php
            	}
                if(!empty($twitterusername))
                { 
                ?>
                <li>
                    <a rel="nofollow external" href="http://www.twitter.com/<?php echo $twitterusername; ?>">
                        <img src="<?php echo $cssurl; ?>blank.gif" alt="Follow us on Twitter" class="twitter" >
                        <span title="Follow us on Twitter" class="overlay"></span>
                        <span class="badge"><span><?php echo $twitterfollowercount;?></span></span>
                    </a>
                </li>
                <?php
                }
                if(!empty($delurl))
                { 
                ?>
                <li>
                    <a rel="nofollow external" href="http://del.icio.us/post?url=<?php echo $delurl; ?>&amp;title=<?php echo $deltitle; ?>">
                        <img src="<?php echo $cssurl; ?>blank.gif" alt="Bookmark us at Delicious" class="delicious" >
                        <span title="Bookmark us at Delicious" class="overlay"></span>
                        <span class="badge"><span><?php echo $delbookmarkcount; ?></span></span>
                    </a>
                </li>
                <?php 
                }                
                if(!empty($fbpageid))
                { 
                ?>
                <li>
                    <a rel="nofollow external" href="<?php echo $fbpageurl;?>">
                        <img src="<?php echo $cssurl; ?>blank.gif" alt="Become a fan on Facebook " class="facebook" >
                        <span title="Become a fan on Facebook " class="overlay"></span>
                        <span class="badge"><span><?php echo $fbfanscount;?></span></span>
                    </a>
                </li>
                <?php
                } 
                ?>
            </ul>                        
            <div class="shadow"></div>
			<div class="modul-box-bottom"></div>
		</div>
	</div>
</div>