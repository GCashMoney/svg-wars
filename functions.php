<?php
// --------------------------------
// Create a custom module for the homepage
// --------------------------------


// Removes wordpress headers
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	
// Remove jquery from front-facing pages
	//wp_deregister_script('jquery');
	
/* Add additional thumbnail sizes*/
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( 970, 999, true ); 
	add_image_size( 'central-thumbnail-full', 970, 300, true);
	add_image_size( 'central-thumbnail-85', 85, 85, true );
	add_image_size( 'central-thumbnail-100', 100, 100, true );
	add_image_size( 'central-post-head', 495, 125, true);
	add_image_size( 'central-home-large', 400, 266, true);
	add_image_size( 'central-home-thumb', 180, 130, true);

	
// Add custom posttypes to the RSS feed
/*function add_custom_posts_to_feed( $query ) {
	if ( is_feed() )
	$query->set( 'post_type', array( 'post', 'central_news', 'central_news_release' ) );
	return $query;
}
add_filter( 'pre_get_posts', 'add_custom_posts_to_feed' );*/

function add_custom_posts_to_feed($qv){
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'add_custom_posts_to_feed');

//Add notification on post pages that the aggregator only picks up stories during certain times
function cui_admin_notice(){
	global $pagenow;
	if($pagenow == 'post-new.php' || $pagenow == 'post.php'){
		echo '<div class="error"><p>The story aggregator only picks up stories between 7 a.m. and 11 p.m. If you are posting a story outside of these hours, you need to schedule the post to fall within those hours.</p><p>Failure to post within these hours will exclude this story from being aggregated to other parts of the Central website.</p></div>';		
	}
}
add_action('admin_notices', 'cui_admin_notice');

// Remove dashboard widgets
	add_action('wp_dashboard_setup', 'CUI_remove_dashboard_widgets' );
	function CUI_remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side');
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side');
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side');
	}
	
/*Allow users to add custom navigation menus*/
	function register_my_menus() {
		register_nav_menus(
			array('sidebar-menu' => __( 'Sidebar Menu' ))
  		);
	}
	add_action( 'init', 'register_my_menus' );
	
	/*Allow users to add widgets to the sidebar*/
	if ( function_exists('register_sidebar') )
	    register_sidebar(array(
			'name' => 'Right sidebar', 
			'description' => 'These widgets show on the right side of all your pages',
			'before_widget' => '<div class="sideBarGrouping">',
			'after_widget' => '</div>'
		));

//Create a custom post type for featured stories
/*add_action('init', 'create_news_post_type');
function create_news_post_type(){
	register_post_type('central_news',
		array( 'labels' => array(
				'name' => __( 'In The News' ),
				'singular_name' => __( 'In The News' ),
				'add_new' => __( 'Add new story' ),
				'all_items' => __( 'All news stories' ),
				'add_new_item' => __( 'Add New news story' ),
				'edit_item' => __( 'Edit news story' ),
				'new_item' => __( 'New news story' ),
				'view_item' => __( 'View In The News Story' ),
				'search_items' => __( 'Search In The News' ),
				'not_found' => __( 'In The News item not found' ),
				'not_found_in_trash' => __( 'In The News item not found in trash' ),
				'menu_name' => __( 'In The News' )
				),
				'public' => true,
				'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
				'has_archive' => true,
				'rewrite' => array('slug' => 'in-the-news', 'with_front' => true),
				'menu_position' => 5,
				'menu_icon' => 'http://img.centralcollege.info/icons/newspaper.png',
				'taxonomies' => array('category', 'post_tag')
			)
		);
}*/
/* Allow custom post types to show on tag pages */
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post','central_news_release'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
	return $query;
    }
}

/*Flush rewrite rules on init*/
add_action('init', 'central_flush_rewrite', 11);
function central_flush_rewrite(){
	flush_rewrite_rules( false );
}

//Alter the read more [...] string
function central_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'central_excerpt_more');

//Create a custom post meta box
add_action('load-post.php', 'central_post_meta_boxes_setup');
add_action('load-post-new.php', 'central_post_meta_boxes_setup');

function central_post_meta_boxes_setup(){
	// Add meta boxes using the add_meta_boxes hook
	add_action('add_meta_boxes', 'central_add_post_meta_boxes');

	//Save post meta
	add_action('save_post', 'central_save_post_source_meta', 10,2);
}

function central_add_post_meta_boxes(){
	add_meta_box(
		'central-post-source',
		esc_html__( 'Story source', 'example' ),
		'central_post_source_meta_box',
		'central_news',
		'normal', 
		'default'
	);
	add_meta_box(
		'central-post-source-link',
		esc_html__( 'Story source link', 'example' ),
		'central_post_source_link_meta_box',
		'central_news',
		'normal', 
		'default'
	);
}

/* Save the meta box's post metadata. */
function central_save_post_source_meta( $post_id, $post ) {
	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['central_post_source_nonce'] ) || !wp_verify_nonce( $_POST['central_post_source_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = $_POST['central-post-source'];
	$new_meta_value1 = $_POST['central-post-source-link'];

	/* Get the meta key. */
	$meta_key = 'central_post_source';
	$meta_key1 = 'central_post_source_link';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );
	$meta_value1 = get_post_meta( $post_id, $meta_key1, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		
	if ( $new_meta_value1 && '' == $meta_value1 )
		add_post_meta( $post_id, $meta_key1, $new_meta_value1, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	
	elseif ( $new_meta_value1 && $new_meta_value1 != $meta_value1 )
		update_post_meta( $post_id, $meta_key1, $new_meta_value1 );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
	
	elseif ( '' == $new_meta_valu1e && $meta_value1 )
		delete_post_meta( $post_id, $meta_key1, $meta_value1 );
}
		
// Register a sidebar for the Popular Posts plugin
	register_sidebar(array('name' => 'primary-widget-area', 'description' => 'These widgets show on the left side of all your pages'));
	
/* Shorten excerpt length
	function new_excerpt_length($length) {
		return 25;
	}
	add_filter('excerpt_length', 'new_excerpt_length');*/
	
//Modify the search template
	function search_form ( $form ) {
		$form = '<form role="search" method="get" class="searchform" action="' . home_url( '/' ) . '" >
			<input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" class="s" />
			<button type="image" id="searchsubmit" value="'. esc_attr__('Search') .'" />Search</button>
			</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'search_form' );

//Modify the commenting function
	if ( ! function_exists( 'civitas_comment' ) ) :
		function civitas_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard"><?php printf( __( '%s', 'civitas' ), sprintf( '<h3 class="fn">%s</h3>', get_comment_author_link() ) ); ?>
				<p class="commentStrike">|</p>				
				<p><?php printf( __( '%2$s on %1$s', 'civitas' ), get_comment_date(),  get_comment_time() ); ?></p><?php edit_comment_link( __( '(Edit)', 'civitas' ),' ' );?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'civitas' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-body"><?php comment_text(); ?></div>
		</div><!-- #comment-##  -->
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'civitas' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'civitas'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

	
