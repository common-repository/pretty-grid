<div class="pretty-grid-twitter-single-feed <?php echo esc_attr(pretty_grid_single_item_class($settings)); ?>" data-src="<?php echo esc_url( $tweet['image_url'] ); ?>">
    <a class="pretty-grid-twitter-link" data-id="<?php echo esc_attr($tweet['id']); ?>" href="#" data-src="<?php echo esc_url( $tweet['image_url'] ); ?>">
        <img width="100%" src="<?php echo esc_attr($tweet['image_url']); ?>" alt="<?php echo esc_attr($tweet['text']); ?>" class="pretty-grid-twitter-image">
     </a>
</div>


