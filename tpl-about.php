<?php
/* Template Name: About */ 
	get_header(); 
	$first_con = get_field('first_con');
    $sec_con = get_field('sec_con');
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
                <div class="pera_p aad_content">
                	<table cellpadding="0" cellspacing="0" border="0">
                		<tr>
                			<td>
								<?php echo $first_con; ?>
							</td>
                			<td>
								<?php echo $sec_con; ?>
							</td>
                		</tr>
                	</table>
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
