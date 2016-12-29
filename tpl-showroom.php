<?php
/* Template Name: Showroom */ 
	get_header(); 
	$youtube_id = get_field('youtube_id');
?>
<?php
while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('inc/page', 'banner'); ?>
    <div class="main-content">
        <div class="container">
            <div class="inner-nav">
                <?php get_template_part('inc/breadcrumbs'); ?>
                <div class="clear"></div>
            </div>
            <div class="jobs-main">
                <h1 class="head_h2"><?php the_title(); ?></h1>                     
                <div class="pera_p aad_content showroomContent">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" frameborder="0" wmode="Opaque" allowfullscreen>  
                </iframe>
                    <?php the_content(); ?>
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
