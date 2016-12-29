<?php 	

//--------------------------     P R O D U C T - P O S T   ------------------------------

	function product_post_type() {

		$labels = array(
			'name'                  => _x( 'מוצר', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'מוצר', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'מוצר', 'text_domain' ),
			'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'כל המוצרים', 'text_domain' ),
			'add_new_item'          => __( 'מוצר חדש', 'text_domain' ),
			'add_new'               => __( 'מוצר חדש', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
			'taxonomies'            => array('product_cat'),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'product ', $args );

	}
	add_action( 'init', 'product_post_type', 0 );

//--------------------------  P R O J E C T  -  P O S T   ------------------------------

	function project_post_type() {

		$labels = array(
			'name'                  => _x( 'פרויקטים', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'פרויקט', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'פרויקט', 'text_domain' ),
			'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'כל הפרויקטים', 'text_domain' ),
			'add_new_item'          => __( 'פרויקט חדש', 'text_domain' ),
			'add_new'               => __( 'פרויקט חדש', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Project', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
			//'taxonomies'            => array('location_cat'),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'project ', $args );

	}
	add_action( 'init', 'project_post_type', 0 );



//--------------------------     P R O D U C T - P O S T   ------------------------------

	function job_post_type() {

		$labels = array(
			'name'                  => _x( 'משרה', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'משרה', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'משרה', 'text_domain' ),
			'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'כל המשרות', 'text_domain' ),
			'add_new_item'          => __( 'משרה חדשה', 'text_domain' ),
			'add_new'               => __( 'משרה חדשה', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Job', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
			// 'taxonomies'            => array('product_cat'),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'job', $args );

	}
	add_action( 'init', 'job_post_type', 0 );





//----------------------  N E W  T A X O N O M Y   ---------------------------

		function product_taxonomies() {

		$labels = array(
			'name'                       => _x( 'קטגוריות מוצרים', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'קטגוריות מוצרים', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'קטגוריות מוצרים', 'text_domain' ),
			'all_items'                  => __( 'קטגוריות מוצרים', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'product_cat', array( 'product' ), $args );

	}
	add_action( 'init', 'product_taxonomies', 0 );	
 

?>
