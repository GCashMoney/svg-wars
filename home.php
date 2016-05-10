<?php get_header();
//Featured Story Loop
$topStoryLoop = new WP_Query( array('post_type' => 'post', 'posts_per_page'=>3)); 
?>
<body>
  <div id="home">
    
    <div id="wrapper">
      <div id="homegray">
    <!--<div id="anakin">
      <object type="image/svg+xml" data="<?php echo bloginfo('template_directory')?>/images/anakin.svg"></object>
      <img src="<?php echo bloginfo('template_directory')?>/images/anakin.svg"></img>
    </div>!-->
    <p>
      Here you can learn all about Scalable Vector Graphics or SVG's. <a href="<?php echo bloginfo('template_directory')?>/what-is-svg/">What is a SVG?</a> Basically it is a type of image
	  file that can be customized with a text editor and scaled easily. <a href="<?php echo bloginfo('template_directory')?>/animation/">Animation is just one of the awesome 
	  things that SVG's can do!</a> There are a few Star Wars images that have been animated, so check them out below!
	  
    </p>
	<div id="icons">
	<a href="<?php echo bloginfo('template_directory')?>/lightsabers/"><img class="homeIcons" src="<?php echo get_stylesheet_directory_uri(); ?>/images/sabericon.svg"></a>
	<a href="<?php echo bloginfo('template_directory')?>/bb-8/"><img class="homeIcons" src="<?php echo get_stylesheet_directory_uri(); ?>/images/droidicon.svg"></a>
	<a href="<?php echo bloginfo('template_directory')?>/x-wing/"><img class="homeIcons" src="<?php echo get_stylesheet_directory_uri(); ?>/images/shipicon.svg"></a>
	</div>
  </div>
    </div>
</div>
</body>
<?php get_footer(); ?>
