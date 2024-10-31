<div class="pretty-grid-product <?php echo esc_attr(pretty_grid_single_item_class($settings)); ?>" data-src="<?php echo esc_url( wp_get_attachment_image_url($attachment) ); ?>">
    <div class="pretty-grid-product__content">
        <div class="pretty-grid-product__img">
            <a href="#" class="pretty-grid-modal-trigger" data-src="<?php echo esc_url( wp_get_attachment_image_url($attachment) ); ?>">
                <img src="<?php echo esc_url( wp_get_attachment_image_url($attachment, 'medium') ); ?>" >
            </a>
        </div>
    </div>
</div><!-- ends: .pretty-grid-product -->

