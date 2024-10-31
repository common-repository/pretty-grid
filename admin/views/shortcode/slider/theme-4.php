<div class="pretty-grid-product">
    <div class="pretty-grid-product__content">
        <div class="pretty-grid-product__img pretty-grid-pos-relative pretty-grid-product__img--hover-effect">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                <img src="<?php echo esc_url( $wpcsu_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            </a>

            <?php pretty_grid_ribbon_badge( $settings, pretty_grid_show_discount_percentage() ); ?>

            <?php if( 'on' == $settings['pretty_grid_product_cart'] ) { ?>
                <div class="pretty-grid-overlay-content-bottom">
<div class="pretty-grid-product__action-icons">
    <a href="#" class="pretty-grid-quick-view-btn" data-product-id="<?php echo get_the_ID(); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1056" height="896" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1056 896" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path d="M531 257q-39 0-74.5 15.5t-61 41t-41 61T339 449t15.5 75t41 61.5t61 40.5t74.5 15q53 0 97-25.5t69.5-69.5t25.5-97q0-79-56-135.5T531 257zm0 320q-34 0-64-17.5t-47.5-47T402 448q0-26 10-49.5t27.5-41t41-27.5t49.5-10q53 0 90.5 37.5T658 448t-37 91t-90 38zm509-136q0-1-.5-2.5t-.5-2.5t-.5-1.5l-.5-.5v-1l-1-2q-68-157-206-246.5T530 95q-107 0-206 39T144.5 249.5T18 431v2.5l-1 1.5v3l-1 2q-1 6-1 9q0 2 .5 4t.5 4q0 1 1 3v2l.5 1.5l.5.5v3q69 157 207.5 245.5T528 801q107 0 205.5-38.5T912 648t125-181q1 0 1-1v-1.5l.5-1l.5-.5v-3l1-2q1-6 1-9q0-2-.5-4t-.5-4zM528 737q-142 0-263-74.5T81 449q63-139 185-214.5T530 159q92 0 176.5 32T862 289.5T975 449q-63 139-184 213.5T528 737z"></path><rect x="0" y="0" width="1056" height="896" fill="rgba(0, 0, 0, 0)"></rect></svg></a>
    <a
		href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'add_to_wishlist', get_the_ID(), pretty_grid_get_current_url() ), 'add_to_wishlist' ) ); ?>"
		class="pretty-grid-wishlist-btn"
		data-product-id="<?php echo esc_attr(get_the_ID()); ?>"
		data-product-type="simple"
		data-original-product-id="<?php echo esc_attr( get_the_ID() ); ?>"
		data-title="<?php echo esc_attr( apply_filters( 'pretty_grid_add_to_wishlist_title', $label ) ); ?>"
		rel="nofollow"
        target="_blank"
	>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1056" height="896" preserveAspectRatio="xMidYMid meet" viewBox="-10 -10 1056 896" style="-ms-transform: rotate(180deg); -webkit-transform: rotate(180deg); transform: rotate(180deg);"><path d="M287.984 845.84c31.376 0 88.0938 -15.0078 180.094 -105.616l45.6162 -44.9121l44.9277 45.6318c63.8721 64.8965 131.84 105.2 177.376 105.2c61.4082 0 109.809 -21.0078 157.009 -68.0957c44.4639 -44.3682 68.9922 -103.36 68.9922 -166.112 c0.0322266 -62.7842 -24.4482 -121.824 -69.4082 -166.672c-3.66406 -3.71191 -196.992 -212.304 -358.96 -387.104c-7.63184 -7.24805 -16.3516 -8.32031 -20.9912 -8.32031c-4.57617 0 -13.2002 1.02441 -20.7998 8.09668c-39.4717 43.9043 -325.552 362 -358.815 395.232 c-44.5283 44.416 -69.0244 103.456 -69.0244 166.224c0.015625 62.752 24.5117 121.728 69.04 166.144c43.2959 43.2637 93.9844 60.3037 154.944 60.3037zM287.982 909.84c-76.5283 0 -144 -22.8955 -200.176 -79.0078c-117.072 -116.768 -117.072 -306.128 0 -422.96 c33.4238 -33.4404 357.855 -394.337 357.855 -394.337c18.4805 -18.4961 42.7529 -27.6797 66.9609 -27.6797c24.2236 0 48.3994 9.18359 66.9111 27.6797c0 0 354.88 383.024 358.656 386.849c117.04 116.88 117.04 306.24 0 423.008 c-58.1123 58 -123.024 86.7842 -202.208 86.7842c-75.6484 0 -160 -60.3203 -223.008 -124.32c-64.9922 63.9844 -146.736 123.984 -224.992 123.984v0z"></path></svg>
    </a>
    <p class="product woocommerce add_to_cart_inline " style="none">
    <a href="?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product-id="<?php echo get_the_ID(); ?>" data-product_sku="" aria-label="Add “Product Title 6” to your cart" rel="nofollow">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1056" height="896" preserveAspectRatio="xMidYMid meet" viewBox="-3.63064 -66.0327 1030.76 1000.035" style="-ms-transform: rotate(180deg); -webkit-transform: rotate(180deg); transform: rotate(180deg);"><path d="M1022.74 17.3604l-83.4072 503.777c-7.44043 65.3115 -66.9766 118.432 -132.721 118.432h-70.6562v85.2803c0 130.16 -92.8477 236.032 -222.976 236.032c-130.096 0 -224.943 -105.872 -224.943 -236.032v-85.2803h-76.6719 c-65.7441 0 -125.28 -53.1201 -132.528 -117.056l-77.2803 -504.16c-2.97559 -26.5596 2.22461 -47.5039 15.4082 -62.2881c12.4316 -13.9043 30.5273 -20.9766 53.7432 -20.9766h873.568c32.9121 0 51.7764 13.2158 61.8408 24.3203 c9.21582 10.208 19.6475 28.1436 16.623 57.9512zM352.049 724.865c0 94.8477 66.127 172.031 160.943 172.031c94.816 0 158.977 -77.1836 158.977 -172.031v-85.2803h-319.92zM947.168 -0.446289l-872.498 -0.449219c-5.50391 0 -11.0078 2.94434 -9.71191 10.6885 l77.248 504.096c3.83984 33.4404 35.5039 61.6807 69.1523 61.6807h76.6885v-72.9277c-19.0723 -11.0723 -32.0479 -31.4883 -32.0479 -55.1367c0 -35.3438 28.6562 -64 64 -64s64 28.6562 64 64c0 23.6162 -12.9277 44 -31.9521 55.0879v72.9922h319.904v-72.9922 c-19.0078 -11.0879 -31.9521 -31.4883 -31.9521 -55.0879c0 -35.3438 28.6562 -64 64 -64s64 28.6562 64 64c0 23.6484 -12.9756 44.0645 -32.0479 55.1523v72.9277h70.6562c33.6641 0 65.3125 -28.2559 69.4082 -63.4395l83.3438 -503.28 c0.400391 -4.0957 -2.81543 -9.31152 -12.1914 -9.31152z"></path></svg>
    </a>
    </p>
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
        <div class='pretty-grid-quick-view-modal'></div>
    </div>
</div><!-- ends: .pretty-grid-product -->

