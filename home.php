<?php get_header();
//Featured Story Loop
$topStoryLoop = new WP_Query( array('post_type' => 'post', 'posts_per_page'=>3)); 
?>
<div id="wrapper">
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus lectus mauris, nec elementum erat feugiat a. Cras lacinia tristique mollis. Sed vel aliquam felis. Phasellus aliquet ac est at placerat. Quisque tincidunt, lacus vitae volutpat tempus, massa nisi tempor ex, vitae fermentum nunc dui eu elit. Integer et arcu tortor. Suspendisse vel congue mi. Praesent porta arcu id ex malesuada, ac lacinia erat porta. Ut id orci efficitur, accumsan orci quis, aliquet ante. Mauris sit amet purus et nulla iaculis varius. Praesent tincidunt rhoncus consectetur. Curabitur lacinia laoreet nisi vel tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed porttitor sollicitudin est, in tempus sem cursus eget. Curabitur sagittis, nibh dignissim mollis pretium, urna ligula iaculis erat, a suscipit mauris ligula sed libero.
    Nullam porttitor gravida accumsan. Nullam maximus suscipit arcu, at hendrerit enim. Vivamus et congue nibh. In nunc tortor, luctus non orci sit amet, ultricies sodales erat. Maecenas cursus ultrices risus, ac congue risus faucibus in. Ut vitae fringilla quam. Vestibulum elit velit, mollis at mattis vel, tincidunt in mi. Maecenas a mi vel ipsum convallis feugiat a vel leo. Donec maximus tristique justo, vel varius urna. Aliquam pulvinar vitae metus in efficitur. Maecenas congue, tortor laoreet venenatis mollis, justo orci lobortis nibh, ut interdum justo tellus sit amet turpis. Nulla facilisi. Praesent molestie viverra ipsum ac varius. Quisque porttitor libero nec commodo bibendum. Donec sollicitudin aliquet nisi quis rhoncus. Fusce non bibendum quam.

    Maecenas condimentum varius dui, vel vulputate lectus feugiat vitae. Curabitur feugiat sollicitudin erat sit amet tincidunt. Vestibulum ut mi ullamcorper, imperdiet magna ac, semper lorem. Etiam scelerisque vehicula nulla eu mattis. Sed at finibus sem. Quisque ante nibh, mollis eu ultrices quis, ornare eu libero. Nullam porttitor eget nibh eget semper. Proin convallis magna at nulla luctus finibus. Vestibulum eget placerat arcu, et interdum odio.

    Vivamus vulputate at turpis nec sollicitudin. Donec congue lacus id lobortis maximus. Cras ante justo, auctor vel bibendum eget, ullamcorper at tellus. Duis pulvinar dictum lacus, vitae sodales risus pretium faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel mattis justo. Vivamus ac orci orci. Quisque felis dui, placerat sed rhoncus id, hendrerit eu sapien. Vivamus vel auctor nisl. Nullam non nisl facilisis mi faucibus luctus a non orci. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras interdum eu justo in mollis. Donec eu libero ac mi tempus ultricies.

    Nunc dolor dui, laoreet eget auctor eget, molestie non ligula. Cras sit amet ligula vitae tortor ultricies tempor maximus laoreet tortor. Curabitur varius imperdiet arcu placerat sodales. Proin at ligula porttitor, vehicula risus non, aliquam enim. Donec interdum ornare quam vel lacinia. Aenean non diam vitae leo congue suscipit pharetra vel est. Aenean porta leo sed ex rhoncus auctor. Maecenas dignissim nulla maximus lorem tempus, eget interdum neque molestie. Aliquam a semper lorem.
  </p>
</div>

<?php get_footer(); ?>
