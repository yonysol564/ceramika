<?php
/* Template Name: Jobs */ 
	get_header(); 
    $job_role = get_field('job_role','option');
    $job_desc = get_field('job_desc','option');
    $job_needs = get_field('job_needs','option');
    $job_comment = get_field('job_comment','option');
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
                <div class="job_section">
                <?php 
                    $args = array(
                        'post_type'      => 'job',
                        'posts_per_page' => -1,
                    );
                    $jobs = new WP_Query($args);
                 ?>
                 <?php
                    if( $jobs->have_posts() ) {
                        $row = $jobs->found_posts;
                        $cnt = 1;
                        $margin_class = '';
                        while( $jobs->have_posts() ) : $jobs->the_post(); 
                        // $job_role_text = get_field('job_role_text');
                        // $job_desc_text = get_field('job_desc_text');
                        $job_needs_text = get_field('job_needs_text');
                        $job_comment_text = get_field('job_comment_text');
                        $job_email_to = get_field('job_email_to');
                        if ($cnt%2 == 0) { $margin_class = 'even'; } else { $margin_class = 'odd'; }
                    ?>
                        <div class="col_job <?php echo $margin_class; ?>">
                            <div class="inner_col">
                                <div class="">
                                    <div class="pera_p"><b><?php echo $job_role; ?></b></div>
                                    <div class="pera_p"><?php the_title(); ?></div>
                                    <div class="pera_p"><b><?php echo $job_desc; ?></b></div>
                                    <div class="pera_p"><?php the_content(); ?></div>
                                    <div class="pera_p"><b><?php echo $job_needs; ?></b></div>
                                    <div class="pera_p"><?php echo $job_needs_text; ?></div>
                                    <div class="pera_p"><b><?php echo $job_comment; ?></b></div>
                                    <div class="pera_p"><?php echo $job_comment_text; ?></div>
                                    <a href="mailto:<?php echo $job_email_to; ?>" class="emilid"><?php echo $job_email_to; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php if ($cnt%2 == 0) { 
                            if($row == $cnt){ $last = 'last'; }
                        ?> 
                            <div class="margin_height <?php echo $last; ?>"></div> 
                        <?php }  ?>
                    <?php $cnt++; endwhile; }  wp_reset_query(); ?>  
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
?>
