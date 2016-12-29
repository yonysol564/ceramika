<?php
	get_header();
	$object = get_queried_object();
	$category_title 	= get_cat_name( $object->term_id );	  
	$category_desc 		= category_description( $object->term_id  ); 
	$page_banner     	= get_field('page_banner' ,$object);
?>

<div class="banner inner-banner">
	<figure class="sha-dow"><img src="<?php echo $page_banner['url']; ?>" width="1400" height="351" alt="page banner" class="pic" /></figure>
	<div class="inner-bancon"><h1 class="head_h1"><?php echo $object->name; ?></h1></div>
</div>
<div class="main-content">
	<div class="main-gallery catalogue-main">
        <div class="gallery-section">
			<?php
			    if( have_posts() ) {
			        while( have_posts() ) : the_post(); 
			        $pro_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			   	?>
            	<div class="gallery-items">
					<figure class="gallery-itemlnk">
						<a href="<?php echo $pro_img; ?>" class="lnk fancyboxCatalogGallery" rel="catalog">
							<img class="pic" src="<?php echo $pro_img; ?>"" width="339" height="342" alt="" />
						</a>
					</figure>
				</div>
			    <?php endwhile; } ?>	  
            <div class="clear"></div>
        </div>
    
    <div class="pagenation-section">
    	<div class="pagenation-block">
			<div class="my_pagination">
    			<?php my_pagination(); ?>
			</div>
            <div class="clear"></div>
        </div>
    </div>

	<?php if ($category_desc) { ?>
        <div class="container">
            <div class="gallery-content catalogue-content">
                <?php echo 	$category_desc; ?>
            </div> 
        </div>
	<?php } ?>

    </div>
</div>
<div class="push"></div>

<?php
get_sidebar();
get_footer();
?>