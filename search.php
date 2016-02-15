<?php get_header(); ?>
<div id="bodyContent">
<h1>Search</h1>
<h2>search results</h2>
<div id="breadcrumb"><a href="<?php bloginfo('url');?>">home</a> &frasl; <a href="/">Search Results</a></div>
	<div class="searchAnnounce infoBox">Search results for <strong><?php echo get_search_query();?></strong>.</div>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="moreFeatures" style="border-bottom: 1px solid #ccc;">
        	<?php if(has_post_thumbnail($post->ID)){?>
        		<div class="featureImg" style="float:left; padding: 1em;"><?php echo get_the_post_thumbnail( $post->ID, 'central-home-thumb');?></div>
            <?php }?>
            <div class="story">
                <h4><?php echo the_title(); ?></h4>
                <p><?php echo the_excerpt();?></p>
                <p align="right"><a href="<?php the_permalink(); ?>" class="redButton">Read more...</a></p>
            </div>
            <div class="clearBoth"></div>
        </div>
		<?php endwhile; ?>

		<div id="moreStories">
            <p align="center"><?php posts_nav_link('&nbsp; &mdash; &nbsp;', 'Newer Stories', 'Older Stories'); ?></p>
        </div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>
    
<div class="clearBoth"></div>

</div>



<?php get_footer(); ?>
