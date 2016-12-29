<!doctype html>
<!--[if lt IE 10]><html lang="he" class="lt10"><![endif]-->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<title><?php the_title(); ?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
<?php if( is_tax() ):
	$obj = get_queried_object();
	?>
	<meta property="og:url" content="<?php echo get_permalink($post->ID); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $obj->name; ?>" />
	<meta property="og:description" content="<?php echo $obj->name; ?>" />
	<meta property="og:image" id="tax_image" content="" />
<?php endif; ?>
<link rel="icon" type="image/png" href="images/favicon.png" />
<link rel="shortcut icon" href="images/favicon.png" />
<!--[if lt IE 10]>
	<script type='text/javascript'>
		$(document).ready(function(){
			$.get('browsers.html' , function(data){
				$('body').html(data);
			});
		});
	</script>
<![endif]-->
<?php wp_head(); ?>
</head>
<?php
	$main_logo 		 = get_field('main_logo', 'option');
	$facebook_img 	 = get_field('facebook_img', 'option');
	$facebook_link 	 = get_field('facebook_link', 'option');
	$instagram_img 	 = get_field('instagram_img', 'option');
	$insta_link 	 = get_field('insta_link', 'option');
	$youtube_img	 = get_field('youtube_img', 'option');
	$youtube_link 	 = get_field('youtube_link', 'option');
    $con_form_title  = get_field('fast_contact_form_title', 'option');
    $fast_con_form   = get_field('fast_contact_form', 'option');
    $header_phone    = get_field('header_phone', 'option');
    $contact_link    = get_field('contact_link', 'option');

    $fast_contact_form_tab = get_field('fast_contact_form_tab', 'option');

?>
<body <?php body_class(); ?>>
<script>
    var domainurl = '<?php echo THEME_DIR; ?>';
</script>
<button type="button" class="blackOpacity"></button>
<?php if (is_category() || is_singular() ) { ?>
    <button type="button" class="floatingContactButton">
        <span class="floatingContactButton_span"><?php echo $fast_contact_form_tab; ?></span>
    </button>
    <div class="popup-block">
        <div class="popup-head">
            <div class="head"><?php echo $con_form_title; ?></div>
            <button type="button" class="close closePopContact"></button>
        </div>
        <div class="pop-form">
            <div class="form-section">
                <?php echo do_shortcode($fast_con_form); ?>
            </div>
        </div>
    </div>
<?php } ?>

<div class="wrapper">
	<div class="mobile-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'top_menu_mobile', 'container' => '', 'menu_class' => 'top_menu_mobile' ) ); ?>
	</div>
	<header>
    	<div class="container">
        	<div class="header-info">
            	<div class="social-section">
                	<a href="<?php echo $youtube_link; ?>" class="lnk" rel="nofollow" target="_blank">
                		<img class="icon" src="<?php echo $youtube_img['url']; ?>" width="24" height="25" alt="YouTube" />
                	</a>
                    <a href="<?php echo $insta_link; ?>" class="lnk" rel="nofollow" target="_blank">
                    	<img class="icon" src="<?php echo $instagram_img['url']; ?>" width="24" height="25" alt="Instagram" />
                    </a>
                    <a href="<?php echo $facebook_link; ?>" class="lnk" rel="nofollow" target="_blank">
                    	<img class="icon" src="<?php echo $facebook_img['url']; ?>" width="9" height="25" alt="Facebook" />
                    </a>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => '', 'menu_class' => 'top_menu' ) ); ?>
                    <div class="clear"></div>
                </nav>
            </div>
            <div class="mobile-info">
            	<button type="button" class="menu_icon mobile-fig">
					<span class="menuIconSpans menuIconSpan1"></span>
					<span class="menuIconSpans menuIconSpan2"></span>
					<span class="menuIconSpans menuIconSpan3"></span>
				</button>
                <figure class="mobile-fig">
	                <a href="<?php echo $contact_link; ?>" title="">
	               		<img src="<?php echo THEME_DIR; ?>/images/locater-icon.png" width="18" height="25" alt="מפה" />
	                </a>
                </figure>
                <button type="button" class="mobile-fig openPopContact">
                	<img src="<?php echo THEME_DIR; ?>/images/email-icon2.png" width="29" height="25" alt="אימייל" />
                </button>
                <figure class="mobile-fig">
	                <a href="tel:<?php echo $header_phone; ?>" rel="nofollow">
	                	<img src="<?php echo THEME_DIR; ?>/images/network-icon.png" width="27" height="25" alt="טלפון" />
	                </a>
                </figure>
            </div>
            <div id="logo">
				<figure>
					<a href="<?php echo home_url(); ?>">
						<img class="logoin" src="<?php echo $main_logo['url']; ?>" width="197" height="117" alt="LEVY-משפחה של עיצובים" title="LEVY-משפחה של עיצובים" />
						<img class="mobile-logo" src="<?php echo THEME_DIR; ?>/images/mobile-logo.png" width="61" height="36" alt="LEVY - משפחה של עיצובים" title="LEVY - משפחה של עיצובים" />
					</a>
				</figure>
			</div>
            <div class="clear"></div>
        </div>
    </header>
