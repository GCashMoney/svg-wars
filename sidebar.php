<?php if(! is_home()){?>
    <div class="sideBarGrouping">
    	<h2>Features &raquo;</h2>
        <ul>
       <?php 
	   	$featuresLoop = new WP_Query( array('post_type' => 'post', 'posts_per_page'=>5));
		
		if ($featuresLoop->have_posts()) : while ($featuresLoop->have_posts()) : $featuresLoop->the_post();?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;
				endif; 
				wp_reset_query();
				?>	
    </ul>
	<p align="right" style="margin-top:10px;"><a href="/category/features/" style="color:#cb2026;">Read more features</a></p>
	</div>
	<?php
	}
	?>

<div class="sideBarGrouping">
	<h2>News &raquo;</h2>
    <ul>
       <?php 
		$newsReleasesLoop = get_posts(array('post_type' => 'central_news_release', 'posts_per_page'=>5));
		foreach($newsReleasesLoop as $post){?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php }
		wp_reset_query();?>	
    </ul>
	<p align="right" style="margin-top:10px;"><a href="/news-release" style="color:#cb2026;">Read more news</a></p>
</div>
<div class="sideBarGrouping">
	<h2>Central In The News &raquo;</h2>
    <ul>
       <?php 
	   $inTheNewsLoop = new WP_Query( array('post_type' => 'central_news', 'posts_per_page'=>5));
		if ($inTheNewsLoop->have_posts()) : while ($inTheNewsLoop->have_posts()) : $inTheNewsLoop->the_post();
			$postMetaSource = get_post_meta(get_the_ID(), 'central_post_source', true);
			$postMetaLink = get_post_meta(get_the_ID(), 'central_post_source_link', true);
		?>
				<li><a href="<?php echo $postMetaLink; ?>"><?php echo "<strong>". $postMetaSource . "</strong> - "; the_title(); ?></a></li>
				<?php endwhile;
				endif; 
				wp_reset_query();?>	
    </ul>
	<p align="right" style="margin-top:10px;"><a href="/in-the-news/" style="color:#cb2026;">Read more of Central in the News</a></p>
</div>

<div class="sideBarGrouping">
	<h2>Video &raquo;</h2>
    <?php $xml = simplexml_load_file('http://www.central.edu/api/video');
			$count = 0;
			foreach($xml->video as $youTubeVideo){
				if ($count < 1){
					echo '<p align="center"><iframe width="300" height="160" src="http://www.youtube.com/embed/' . $youTubeVideo->video_id . '" frameborder="0" allowfullscreen></iframe></p>';
					echo '<p align="center">' . $youTubeVideo->title . '</p>';
				}
				$count++;
			}?>
	<!---<p align="right" style="margin-top:10px;"><a href="#" style="color:#cb2026;">More videos</a></p>!--->
</div>
<?php if(!is_front_page()){
	dynamic_sidebar(); 
}?>
