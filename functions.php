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

	
