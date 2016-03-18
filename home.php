<?php get_header();
//Featured Story Loop
$topStoryLoop = new WP_Query( array('post_type' => 'post', 'posts_per_page'=>3)); 
?>
<body>
<div id="wrapper">
  <div id="home">
    <!--<div id="anakin">
      <object type="image/svg+xml" data="<?php echo bloginfo('template_directory')?>/images/anakin.svg"></object>
      <img src="<?php echo bloginfo('template_directory')?>/images/anakin.svg"></img>
    </div>!-->
    <p>
      This is the home page of SVG Wars. There will be icons to help guide people.
    </p>
  </div>
</div>
</body>
<?php get_footer(); ?>
