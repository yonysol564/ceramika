<?php 
    get_header(); 
    $page_notfound = get_field( 'page_notfound' , 'option');
    $back_home = get_field( 'back_home' , 'option');
?>
<div class="banner magazin-banner">
	<figure><img src="<?php echo THEME_DIR; ?>/images/banner01.jpg" width="1400" height="248" alt="page banner" class="pic" /></figure>
</div> 
    <div class="main-content">
        <div class="container">
            <div class="inner-nav">
            	<?php get_template_part('inc/breadcrumbs'); ?>
            <div class="clear"></div>
            </div>
            <div class="jobs-main">
                <h1 class="head_h2"><?php echo $page_notfound; ?></h1>                		
                <div class="back_404">
					<a class="back_home" href="<?php echo home_url(); ?>"><?php echo $back_home; ?></a>
				</div>
            </div>            
        </div>            
    </div>
    <div class="push"></div>

<?php get_footer(); ?>

