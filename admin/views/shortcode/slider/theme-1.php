<div class="pretty-grid-product">
    <div class="pretty-grid-product__content">
        <div class="pretty-grid-product__img">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                <img src="<?php echo esc_url( $wpcsu_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            </a>

            <?php pretty_grid_ribbon_badge( $settings, pretty_grid_show_discount_percentage() ); ?>

            <?php if( 'on' == $settings['pretty_grid_product_cart'] ) { ?>
            <div class="pretty-grid-overlay-content-bottom">
                <div class="pretty-grid-cart-button">
                    <?php echo wp_kses_post( do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price = "false"]') ); ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="pretty-grid-product__details the-pretty-grid-product__details">
            <?php if( 'on' == $settings['pretty_grid_product_title'] ) { ?>
            <h2 class="pretty-grid-product__title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
            <?php } ?>
            <?php if( 'on' == $settings['pretty_grid_product_price'] ) { ?>
            <div class="pretty-grid-product__price">

                <span class="pretty-grid-product__price__sale"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>

                <?php if( ! empty( $sale_price ) ) { ?>

                    <span class="pretty-grid-badge pretty-grid-badge--sm pretty-grid-badge--outlined pretty-grid-badge--rounded">-<?php echo esc_html( pretty_grid_show_discount_percentage() ); ?></span>

                <?php } ?>

            </div>
            <?php } ?>

            <?php if( 'on' == $settings['pretty_grid_product_rating'] ) { ?>
                <div class="pretty-grid-product__rating">
                    <div class="pretty-grid-product__rating__stars" title="<?php echo esc_attr( $ratings ); ?>%">
                        <div class="pretty-grid-product__rating__stars__wrap">
                            <?php
                                for ( $x = 0; $x <= 4; $x++ ) {
                                    echo '<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M 16 2.125 L 15.09375 4.1875 L 11.84375 11.46875 L 3.90625 12.3125 L 1.65625 12.5625 L 3.34375 14.0625 L 9.25 19.40625 L 7.59375 27.21875 L 7.125 29.40625 L 9.09375 28.28125 L 16 24.28125 L 22.90625 28.28125 L 24.875 29.40625 L 24.40625 27.21875 L 22.75 19.40625 L 28.65625 14.0625 L 30.34375 12.5625 L 28.09375 12.3125 L 20.15625 11.46875 L 16.90625 4.1875 Z M 16 7.03125 L 18.5625 12.8125 L 18.8125 13.34375 L 19.375 13.40625 L 25.65625 14.0625 L 20.96875 18.28125 L 20.53125 18.6875 L 20.65625 19.25 L 21.96875 25.40625 L 16.5 22.28125 L 16 21.96875 L 15.5 22.28125 L 10.03125 25.40625 L 11.34375 19.25 L 11.46875 18.6875 L 11.03125 18.28125 L 6.34375 14.0625 L 12.625 13.40625 L 13.1875 13.34375 L 13.4375 12.8125 Z"/></svg>';
                                }
                            ?>
                        </div>
                        <div class="pretty-grid-product__rating__stars__solid" style="width: <?php echo esc_attr( $ratings ); ?>%;">
                            <?php
                                for ( $x = 0; $x <= 4; $x++ ) {
                                    echo '<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"><path d="M 30.335938 12.546875 L 20.164063 11.472656 L 16 2.132813 L 11.835938 11.472656 L 1.664063 12.546875 L 9.261719 19.394531 L 7.140625 29.398438 L 16 24.289063 L 24.859375 29.398438 L 22.738281 19.394531 Z"/></svg>';
                                }
                            ?>
                        </div>
                    </div>
                    <span class="pretty-grid-product__rating__total">(<?php echo esc_attr( $product->get_rating_count() ); ?>)</span>
                </div>
            <?php } ?>
        </div>
    </div>
</div><!-- ends: .pretty-grid-product -->

