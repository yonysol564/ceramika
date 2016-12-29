<?php get_header();  ?>
<?php 
	$object = get_queried_object();
	$category_title = get_cat_name( $object->term_id );	  
	$category_desc = category_description( $object->term_id  );
	$read_more_text  	 = get_field('read_more_text','option');
	$page_banner     	 = get_field('page_banner');
?>
	<?php get_template_part('inc/page', 'banner'); ?>
    <div class="main-content">
    	<div class="container">
        	<div class="inner-nav">
                <?php get_template_part('inc/breadcrumbs'); ?>
                <div class="clear"></div>
            </div>
            <div class="magzin-main">
				<div class="container">
					<h1 class="head_h2" style="border:none;"><?php echo $category_title; ?></h1>
				</div>
            	<div class="magazinItemsWrapper">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						$mag_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
						<div class="magzin-con">
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
					<?php endwhile; endif; ?>
					<div class="clear"></div>
				</div>
            </div>            
        </div>
    </div>
    <div class="push"></div>
<?php
get_sidebar();
get_footer();
