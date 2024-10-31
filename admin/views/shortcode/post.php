<div class="single-post post-gallery-single-feed <?php echo esc_attr(pretty_grid_single_item_class($settings)); ?>">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
    <a href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_url( $wpcsu_img ); ?>" alt="<?php the_title(); ?>">
    </a>
<?php endif; ?>
</div>