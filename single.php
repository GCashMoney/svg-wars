<?php get_header();?>
<h1>SVG Wars</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	$this_post_type = get_post_type($post->ID);
	if ($this_post_type == 'post'){
		$displayPost = 'Featured: ';
	}
?>
	<h2><?php echo $displayPost; the_title();?></h2>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
        <p>Start over at <a href="/">the homepage</a>.</p>

	<?php endif; ?>

<div class="clearBoth spacer"></div>
<?php get_footer(); ?>
