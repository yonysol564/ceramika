<?php  
    $footer_con      = get_field('footer_con', 'option');
    $footer_faceimg  = get_field('footer_faceimg', 'option');
    $footer_facelink  = get_field('footer_facelink', 'option');
    $footer_instaimg = get_field('footer_instaimg', 'option');
    $footer_instalink     = get_field('footer_instalink', 'option');
    $footer_youtubeimg    = get_field('footer_youtubeimg', 'option');
    $footer_youtubelink  = get_field('footer_youtubelink', 'option');
    $overal_design   = get_field('overal_design', 'option');
    $copyright  = get_field('copyright', 'option');
    $copyright_ink  = get_field('copyright_ink', 'option');
    $back_top  = get_field('back_top', 'option'); 
    $footer_email  = get_field('footer_email', 'option'); 
?>

</div>  <!-- End Wraper -->
<footer>
	<div class="container">
        <div class="footer-info">
            <div class="footer-links">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu_one', 'container' => '', 'menu_class' => 'footer_menu_one' ) ); ?>
            </div>
            <div class="footer-links more-links">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu_tow', 'container' => '', 'menu_class' => 'footer_menu_tow' ) ); ?>
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu_three', 'container' => '', 'menu_class' => 'footer_menu_three' ) ); ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footer-moreinfo">
            <div class="addre-section">
                <div class="pera_p">    
                    <?php echo $footer_con; ?>
				</div>
            </div>

            <div class="footer-social">
                <div class="social-icons">
                    <a href="#" class="pvt-lnk">PRIVATE</a> 
                    <figure class="social-lnks">
						<a href="mailto:<?php echo $footer_email; ?>" class="socialLinks_a">
							<img class="icon" src="<?php echo THEME_DIR; ?>/images/email-icon.png" width="36" height="29" alt="שלח לחבר" />
						</a>
					</figure>
                    <figure class="social-lnks">
						<a href="<?php echo $footer_youtubelink; ?>" rel="nofollow" target="_blank" class="socialLinks_a">
							<img class="icon" src="<?php echo $footer_youtubeimg['url']; ?>" width="30" height="29" alt="youTube" />
						</a>
					</figure>
                    <figure class="social-lnks">
						<a href="<?php echo $footer_instalink; ?>" rel="nofollow" target="_blank" class="socialLinks_a">
							<img class="icon" src="<?php echo $footer_instaimg['url']; ?>" width="29" height="29" alt="Instagram" />
						</a>
					</figure>
                    <figure class="social-lnks no_mar">
						<a href="<?php echo $footer_facelink; ?>" rel="nofollow" target="_blank" class="socialLinks_a">
							<img class="icon" src="<?php echo $footer_faceimg['url']; ?>" width="14" height="29" alt="Facebook" />
						</a>
					</figure>
                    <div class="clear"></div>
                </div>
                <div class="pera_p">    
                    <?php echo $overal_design; ?>
					<!-- <span class="pink-col">o</span>verallstudio design -->
					<a href="<?php echo $copyright_ink; ?>" target="dooble" class="dooble"><?php echo $copyright; ?></a>
				</div>
            </div>
            <div class="clear"></div>
            <button type="button" class="back-topbut"><?php echo $back_top; ?></button>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
