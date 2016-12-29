<?php
/* Template Name: Trends */ 
	get_header(); 
    $new_project = get_field('new_project' ,'option');
    $new_products_label = get_field('new_products_label' ,'option');
?>
<?php
while ( have_posts() ) : the_post(); ?>
    <div class="main-content">
        <div class="product-main">
            <div class="container">
                <?php get_template_part('inc/breadcrumbs'); ?>
            </div>
            <div class="container">
                <h1 class="head_h2"><?php echo $new_products_label; ?></h1>
            </div>
            <div class="product-block">
            <?php 
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 12,
                    'orderby'        => 'date'
                );
                $products = new WP_Query($args);
            ?>
            <?php if( $products->have_posts() ) {
                    while( $products->have_posts() ) : $products->the_post(); 
                    $pro_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            ?>
                <div class="product-items">
                    <figure>
                        <a href="#" class="product-lnk">
                            <img class="pic" src="<?php echo $pro_img; ?>" width="344" height="343" alt="<?php the_title(); ?>" />
                            <h3 class="txt"><?php the_title(); ?></h3>
                            <span class="new-tag"><?php echo $new_project; ?></span>
                        </a>
                    </figure>
                </div>
            <?php endwhile; } wp_reset_query(); ?>  
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="push"></div>
<?php
endwhile; // End of the loop.
get_sidebar();
get_footer();
?>
