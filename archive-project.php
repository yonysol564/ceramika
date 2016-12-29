<?php get_header();  ?>
<?php 
	$object = get_queried_object();
	$page_banner    = get_field('projects_banner', 'option');
	$projects_title = get_field('projects_title', 'option');
	$read_more_text = get_field('read_more_text' ,'option');
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
					<h1 class="head_h2" style="border:none;"><?php echo $projects_title; ?></h1>
				</div>
            	<div class="magazinItemsWrapper">
	            	<?php  
		            	$args = array(
		                    'post_type'      => 'project',
		                    'posts_per_page' => -1,
		                    'orderby'        => 'rand'
		                );
		                $projects = new WP_Query($args);
	            	?>
		            <?php if( $projects->have_posts() ) {
		                    while( $projects->have_posts() ) : $projects->the_post(); 
		                    $pro_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		            ?>
						<div class="magzin-con">
							<h3 class="head"><?php the_title(); ?></h3>
							<a href="<?php the_permalink(); ?>">
								<figure class="fig">
									<img class="fig-pic" src="<?php echo $pro_img; ?>" width="315" height="238" alt="<?php the_title(); ?>" />
								</figure>
							</a>
							<div class="pera_p">
								<?php dynamic_excerpt(160, $post); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="read"><?php echo $read_more_text; ?></a>
						</div>
					 <?php endwhile; } wp_reset_query(); ?>  
					<div class="clear"></div>
				</div>
            </div>            
        </div>
    </div>
    <div class="push"></div>
<?php
get_sidebar();
get_footer();
