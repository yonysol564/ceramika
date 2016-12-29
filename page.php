<?php
get_header(); ?>
	<section >
		<div class="row">
			<div class="large-12 columns">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<p>
						<?php the_content() ?>
					</p>
				<?php
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</section>
<?php
get_sidebar();
get_footer();
?>
