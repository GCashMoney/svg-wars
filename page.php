<?php get_header();?>
<div id="pageContent">
<h1>SVG Wars</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	$this_post_type = get_post_type($post->ID);
	if ($this_post_type == 'post'){
		$displayPost = 'Featured: ';
	}
?>
	<h2><?php echo $displayPost; the_title();?></h2>
		<div class="post" id="post-<?php the_ID(); ?>" >
            <div class="feature-info">
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
        <p>Start over at <a href="/">the homepage</a>.</p>

	<?php endif; ?>

<div class="clearBoth spacer"></div>
</div>
<?php get_footer(); ?>
