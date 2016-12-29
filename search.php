<?php get_header(); ?>
	<div class="about_bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/aboutbg.jpg');">
		<div class="row">
			<div class="large-6 columns header_col">
			<div class="top_div">
				<h1><?php _e('SEARCH RESULTS','insightec');?></h1>
			</div>
			<div class="bottom_div">
				
			</div>
			</div>
		</div>
	</div>

	<section class="search_sec">	
		<form role="search" method="get" action="<?php echo home_url(); ?>">  
			<div class="row">
				<div class="large-10 columns">
					<div class="input_div">
				      <input class="form-control input_search" type="search" name="s" id="search" placeholder="<?php _e('Type here to search','insightec');?>">
				    </div>
				</div>

				<div class="large-2 columns">
				    <div class="input_button">
				      <button class="search-submit" type="submit" role="button"><?php _e('Find','insightec');?></button>
				    </div>
				</div>   
			</div>
		</form>
	</section>

	<section class="search_results">	
		<div role="main" class="row">
			<div class="large-12 columns col_head">
				<h4>
				<?php 
					echo sprintf( __( '%s results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
				</h4>
			</div>
			<div class="large-12 columns border_row">
				<div class="border_con">
					
				</div>
			</div>
			<div class="large-12 columns results_div">
			  <ul>
				<?php while(have_posts()): the_post(); ?>
					    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>	
				<?php endwhile; ?>
			  </ul>
			</div>	  
			<?php get_template_part('pagination'); ?>
			<div class="large-12 columns pagination_col">	
				<div class="pagi_page">
					<span><?php _e('PAGE','insightec');?></span>
				</div>
				<div class="pagination_div">
					<ul class="pagination" role="navigation" aria-label="Pagination">
					  <li class="pagination-previous disabled"></li>
					  <li class="current"><span class="show-for-sr"><?php _e('You are on page','insightec');?></span> 1</li>
					  <li><a href="#" aria-label="Page 2">2</a></li>
					  <li><a href="#" aria-label="Page 3">3</a></li>
					  <li><a href="#" aria-label="Page 4">4</a></li>
					  <li class="pagination-next"><a href="#" aria-label="Next page"></a></li>
					</ul>
				</div>
			</div>
		</div>

	</section>
<?php get_footer(); ?>