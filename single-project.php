<?php
	get_header(); 
	$page_banner     	 = get_field('page_banner');
	$page_banner_text    = get_field('page_banner_text');
	$about_main_img   	 = get_field('about_main_img');
	$read_more_text  	 = get_field('read_more_text','option');
	$intersted_you  	 = get_field('intersted_you','option');
?>
<?php
while ( have_posts() ) : the_post(); ?>
<?php $magazin_con = get_field('magazin_con'); ?>
<?php $magazin_more_con = get_field('magazin_more_con'); ?>
	<?php get_template_part('inc/page', 'banner'); ?>  
    <div class="main-content">
    	<div class="container">
        	<div class="inner-nav">
                <?php get_template_part('inc/breadcrumbs'); ?>
                <div class="clear"></div>
            </div>
            <div class="magzin-main">
            	<div class="magzin-content">
                	<h1 class="head_h2"><?php the_title(); ?></h1>                		
                    <div class="magzin-block">
                      	<?php the_content(); ?>
                        <?php $magazine_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<div class="project_img">
                        	<img class="pic" src="<?php echo $magazine_img; ?>" width="1005" alt="<?php the_title(); ?>" />
						</div>
                    </div>
            	</div>
                <div class="magzin-info">
                	<div class="head_h2"><?php echo $intersted_you; ?></div>
                    <div class="magzin-infoin">
                    	<?php 
							$args = array(
								'post_type'      => 'project',
								'posts_per_page' => -1,
								'orderby'        => 'rand',
								'post__not_in'   =>  array($post->ID)
							);
						    $projects = new WP_Query($args);
						 ?>
						<div class="swiper-container" data-items="3" data-arrows="true" data-center-slides="true" data-breakpoints-767="3" data-breakpoints-599="2">
							<div class="swiper-wrapper">
								<?php
								    if( $projects->have_posts() ) {
								        while( $projects->have_posts() ) : $projects->the_post(); 
								        $mag_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								   	?>
										<div class="magzin-con swiper-slide">
											<h3 class="head"><?php the_title(); ?></h3>
											<a href="<?php the_permalink(); ?>">
												<figure class="fig">
													<img class="fig-pic" src="<?php echo $mag_img; ?>" width="315" height="238" alt="<?php the_title(); ?>" />
												</figure>
											</a>
											<div class="pera_p">
												<?php dynamic_excerpt(160, $post); ?>
											</div>
											<a href="<?php the_permalink(); ?>" class="read"><?php echo $read_more_text; ?></a>
										</div>
								        <?php
								        endwhile;
								    }
								    wp_reset_query();
								?>												
							</div>
						</div>
                        <button type="button" class="lft-arrow next"></button>
                        <button type="button" class="lft-arrow rgt-arrow prev"></button>
                   		<div class="clear"></div>
                	</div>
                </div>
            </div>            
        </div>
    </div>
    <div class="push"></div>
<?php
endwhile; // End of the loop.
get_sidebar();
get_footer();
?>
