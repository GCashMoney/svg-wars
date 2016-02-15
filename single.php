<?php get_header();?>
<div id="bodyContent">
<h1>SVG Wars</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	$this_post_type = get_post_type($post->ID);
	if ($this_post_type == 'post'){
		$displayPost = 'Featured: ';
	}
?>
	<h2><?php echo $displayPost; the_title();?></h2>
    <div id="storyDate"><?php the_time('F j, Y') ?></div>
		<div class="post" id="post-<?php the_ID(); ?>" >
            <div class="feature-info">
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
            <h2>Share</h2>
            <div class="social" style="">
	            <div class="social_FB"><div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></div>
                <div class="social_GPlus"><g:plusone size="tall" annotation="none"></g:plusone></div>
                <div class="social_twitter">
                	<a href="https://twitter.com/share" class="twitter-share-button"{count} data-via="CentralCollege">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
                <div class="clearBoth"></div>
    		</div>
            <h2>Comment</h2>
            <div class="comments">
	            <div class="fb-comments" data-href="<?php the_permalink();?>" data-num-posts="10" data-width="100%"></div>
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
