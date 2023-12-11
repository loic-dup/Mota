<?php $next_post = get_post(); ?>
<div class="box"><a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, $size = "large"); ?></a></div>