<?php
/* Template Name: Homepage */ 
get_header(); 
$family_design = get_field('family_design', 'option');
?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="banner hpBanner">
		<div class="swiper-container" data-items="1" data-effect="fade" data-arrows="true" data-autoplay="true">
			<div class="swiper-wrapper">
				<?php if( have_rows('home_slider') ): ?>
				    <?php while ( have_rows('home_slider') ) : the_row(); 
				        $home_slider_img = get_sub_field('home_slider_img');
				    ?>            
					    <figure class="swiper-slide hpBannerItem">
					    	<img src="<?php echo $home_slider_img['url']; ?>" alt="slider" class="pic" />
					    </figure>
				    <?php endwhile; ?>       
				<?php endif;?>
			</div>
		</div>
        <button type="button" class="lft-arrow next"></button>
        <button type="button" class="lft-arrow rgt-arrow prev"></button>
    </div>
    <div class="main-content">
    	<div class="main-gallery">
        	<div class="container">
        		<div class="gallery-nav">
					<?php if( have_rows('home_links') ): $cnt = 1; ?>
					    <?php while ( have_rows('home_links') ) : the_row(); 
					        $home_links_title = get_sub_field('home_links_title');
					        $home_links_url = get_sub_field('home_links_url');
					        $home_links_icon = get_sub_field('home_links_icon');
					    ?>            
		                	<div class="gallery-navitem">
								<figure>
									<a href="<?php echo $home_links_url; ?>" class="lnk">
										<h2 class="txt"><?php echo $home_links_title; ?></h2>
										<span class="hpIcons" style="background-image: url( <?php echo $home_links_icon['url']; ?> );">
											<span class="hpIconsHover" style="background-image: url( <?php echo $home_links_icon['url']; ?> );"></span>
										</span>
									</a>
								</figure>
							</div>
					    <?php $cnt++; endwhile; ?>       
					<?php endif;?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="family-designs"><?php echo $family_design; ?></div>
            <div class="gallery-section">
				<?php 
					$choose_cats = get_field('choose_cats');
					foreach ($choose_cats as $cat) { 
						$term_link = get_term_link( $cat );
						$productcat_img = get_field('productcat_img', $cat);
						$term_link = add_query_arg(array('gallery_paged' => '1'), $term_link ) ;
					?>
						 <div class="gallery-items">
							<figure class="gallery-itemlnk">
								<a href="<?php echo $term_link; ?>" class="lnk">
									<img class="pic" src="<?php echo $productcat_img['url']; ?>" width="344" height="327" alt="<?php echo $cat->name; ?>" />
									<span class="gallery-title">
										<span class="title-align">
											<h3 class="title-middle"><?php echo $cat->name; ?></h3>
										</span>
									</span>
								</a>
							</figure>
						</div>
					<?php }
				?>				
                <div class="clear"></div>
            </div>
            <div class="container">
	            <div class="gallery-content">
					<?php the_content(); ?>
                </div> 
            </div>
        </div>
    </div>
    <div class="push"></div>

<?php endwhile; // End of the loop. ?>
<?php
get_sidebar();
get_footer();
