<?php
/* Template Name: Contact */ 
	get_header(); 
	$con_icon1   = get_field('con_icon1');
	$con_icon2   = get_field('con_icon2');
	$con_icon3   = get_field('con_icon3');
	$con_icon4   = get_field('con_icon4');
	$con_icon5   = get_field('con_icon5');
	$con_info     	= get_field('con_info');
	$open_hours   	= get_field('open_hours');
	$contact_free 	= get_field('contact_free_text');
	$contact_form	= get_field('conntact_form');
	$locations     	= get_field('contact_map');
?>

<?php
while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('inc/page', 'banner'); ?>
    <div class="main-content">
    	<div class="contact-main">
            <div class="container">
                <div class="inner-nav">
	            	<?php get_template_part('inc/breadcrumbs'); ?>
	              <div class="clear"></div>
	            </div>
                <h1 class="head_h2"><?php the_title(); ?></h1>  
                <div class="contact-info">
                	<div class="address-section">
                    	<div class="address-items fl_rf">
                        	<figure class="icon">
                        		<img src="<?php echo $con_icon1['url']; ?>" width="52" height="51" alt="icon1" />
                        	</figure>
							<?php echo $con_info; ?>
                        </div>
                        <div class="address-items fl_lf">
                        	<figure class="icon">
                        		<img src="<?php echo $con_icon2['url']; ?>" width="52" height="51" alt="icon2" />
                        	</figure>
                        	<?php echo $open_hours; ?>
                        </div>
                    </div>
                    <div class="address-mailadd">
                    	<figure class="icon">
                    		<img src="<?php echo $con_icon3['url']; ?>" width="52" height="51" alt="icon3" />
                    	</figure>
                    	<div class="pera_p">
                    		<?php if( have_rows('contact_people') ): ?>
                    		    <?php while ( have_rows('contact_people') ) : the_row(); 
                    		        $con_fullname = get_sub_field('con_fullname');
                    		        $con_role = get_sub_field('con_role');
                    		        $con_email = get_sub_field('con_email');
                    		     ?>             
                           			 <b><?php echo $con_fullname; ?></b> / <?php echo $con_role; ?> / 
                           			 <a class="emaiid" href="mailto:<?php echo $con_email; ?>"><?php echo $con_email; ?></a><br> 
                    		    <?php endwhile; ?>       
                    		<?php endif;?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>                  		
            </div> 
            <div class="more-contacts">
            	<div class="container">
                	<div class="address-section">
                    	<div class="address-items fl_rf">
                        	<figure class="icon">
                        		<img src="<?php echo $con_icon4['url']; ?>" width="52" height="51" alt="icon4" />
                        	</figure>
                            <div class="wrap_waze">
                                <div class="pera_p">
                                    <span>
                                        <a href="waze://?q=<?php echo $locations['address']; ?>" title="" target="_blank">
                                            Waze
                                            <img src="<?php echo THEME_DIR; ?>/images/wazenew.png" alt="waze" />
                                        </a>, <b>Google</b>
                                    </span>
                                </div>
                            </div>
                            <?php echo $contact_free; ?>
                        </div>
                        <div class="contact-form">
                        	<figure class="icon">
                        		<img src="<?php echo $con_icon5['url']; ?>" width="52" height="51" alt="icon5" />
                        	</figure>
                        	<?php echo do_shortcode($contact_form); ?>
                        </div>  
                        <div class="clear"></div>                      
                    </div>

                    <div class="map-section">
                        <script>
                            var locations = [ "<?php echo $locations['address']; ?>", <?php echo $locations['lat']; ?> , <?php echo $locations['lng']; ?> ];
                        </script>
                        <div class="map_div" id="contact_map">
                        </div>
					</div>
<!--                     <div class="waze_div">
                        <a href="waze://?q=<?php // echo $locations['address']; ?>" title="" target="_blank">
                            <img src="<?php // echo THEME_DIR; ?>/images/waze.png" alt="waze" />
                        </a>
                    </div> -->
                    <div class="clear"></div>
                </div>
            </div>           
        </div>
    </div>
    <div class="push"></div>
<?php
endwhile; // End of the loop.
get_sidebar();
get_footer();
