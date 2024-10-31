<?php
$pretty_grid_header_font_size = isset($settings['pretty_grid_header_font_size']) ? $settings['pretty_grid_header_font_size'] : '24';
$pretty_grid_header_color = isset($settings['pretty_grid_header_color']) ? $settings['pretty_grid_header_color'] : '#000000';
$pretty_grid_product_title_size = isset($settings['pretty_grid_product_title_size']) ? $settings['pretty_grid_product_title_size'] : '16';
$pretty_grid_product_title_color = isset($settings['pretty_grid_product_title_color']) ? $settings['pretty_grid_product_title_color'] : '#000000';
$pretty_grid_product_price_size = isset($settings['pretty_grid_product_price_size']) ? $settings['pretty_grid_product_price_size'] : '16';
$pretty_grid_product_price_color = isset($settings['pretty_grid_product_price_color']) ? $settings['pretty_grid_product_price_color'] : '#000000';
$pretty_grid_product_rating_size = isset($settings['pretty_grid_product_rating_size']) ? $settings['pretty_grid_product_rating_size'] : '16';
$pretty_grid_product_rating_color = isset($settings['pretty_grid_product_rating_color']) ? $settings['pretty_grid_product_rating_color'] : '#dd9933';
$pretty_grid_cart_font_color = isset($settings['pretty_grid_cart_font_color']) ? $settings['pretty_grid_cart_font_color'] : '#000000';
$pretty_grid_cart_bg_color = isset($settings['pretty_grid_cart_bg_color']) ? $settings['pretty_grid_cart_bg_color'] : '#d14530';
$pretty_grid_cart_font_color_hover = isset($settings['pretty_grid_cart_font_color_hover']) ? $settings['pretty_grid_cart_font_color_hover'] : '#000000';
$pretty_grid_cart_bg_color_hover = isset($settings['pretty_grid_cart_bg_color_hover']) ? $settings['pretty_grid_cart_bg_color_hover'] : '#d14530';
$pretty_grid_ribbon_bg_color = isset($settings['pretty_grid_ribbon_bg_color']) ? $settings['pretty_grid_ribbon_bg_color'] : '#ff5500';
?>
<div id="style" class="pretty-grid-box-tab" data-nav="style" >
    <div class="pretty-grid-box-header">
		<h2 class="pretty-grid-box-title"><?php esc_html_e( 'Style Settings', Pretty_Grid::DOMAIN ); ?></h2>
	</div>

    <div class="pretty-grid-box-body">
        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Header Font', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <label class="pretty-grid-subtitle-label">
                        <span>
                           <?php esc_html_e( "Font Size", Pretty_Grid::DOMAIN ); ?>
                        </span>
                    </label>
                    <input
                        type="text"
                        name="pretty_grid_header_font_size"
                        placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                        value="<?php echo $pretty_grid_header_font_size; ?>"
                        id="pretty_grid_header_font_size"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_header_font_size"
                    />
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Font Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_header_color" value="<?php echo esc_url( $pretty_grid_header_color ); ?>" />
                        </div>
                </div>
            </div>
        </div>

        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Product Title Font', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <label class="pretty-grid-subtitle-label">
                        <span>
                           <?php esc_html_e( "Product Title Size", Pretty_Grid::DOMAIN ); ?>
                        </span>
                    </label>
                    <input
                        type="text"
                        name="pretty_grid_product_title_size"
                        placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                        value="<?php echo $pretty_grid_product_title_size; ?>"
                        id="pretty_grid_product_title_size"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_product_title_size"
                    />
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Product Title Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_product_title_color" value="<?php echo esc_url( $pretty_grid_product_title_color ); ?>" />
                        </div>
                </div>
            </div>
        </div>

        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Product Price Font', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <label class="pretty-grid-subtitle-label">
                        <span>
                           <?php esc_html_e( "Product Price Size", Pretty_Grid::DOMAIN ); ?>
                        </span>
                    </label>
                    <input
                        type="text"
                        name="pretty_grid_product_price_size"
                        placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                        value="<?php echo $pretty_grid_product_price_size; ?>"
                        id="pretty_grid_product_price_size"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_product_price_size"
                    />
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Product Price Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_product_price_color" value="<?php echo esc_url( $pretty_grid_product_price_color ); ?>" />
                        </div>
                </div>
            </div>
        </div>

        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Product Rating Font', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <label class="pretty-grid-subtitle-label">
                        <span>
                           <?php esc_html_e( "Product Rating Size", Pretty_Grid::DOMAIN ); ?>
                        </span>
                    </label>
                    <input
                        type="text"
                        name="pretty_grid_product_rating_size"
                        placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                        value="<?php echo $pretty_grid_product_rating_size; ?>"
                        id="pretty_grid_product_rating_size"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_product_rating_size"
                    />
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Product Rating Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_product_rating_color" value="<?php echo esc_url( $pretty_grid_product_rating_color ); ?>" />
                        </div>
                </div>
            </div>
        </div>

        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( '"Add to Cart" Button', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Font Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_cart_font_color" value="<?php echo esc_url( $pretty_grid_cart_font_color ); ?>" />
                        </div>
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Background Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_cart_bg_color" value="<?php echo esc_url( $pretty_grid_cart_bg_color ); ?>" />
                        </div>
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Font Hover Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_cart_font_color_hover" value="<?php echo esc_url( $pretty_grid_cart_font_color_hover ); ?>" />
                        </div>
                </div>
                <div class="pretty-grid-form-field">
                        <label class="pretty-grid-subtitle-label">
                            <span>
                                <?php esc_html_e( "Background Hover Color", Pretty_Grid::DOMAIN ); ?>
                            </span>
                        </label>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_cart_bg_color_hover" value="<?php echo esc_url( $pretty_grid_cart_bg_color_hover ); ?>" />
                        </div>
                </div>
            </div>
        </div>

        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( '"Ribbon" Background Color', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                        <div>
                            <input type="text" class="color-picker" data-alpha-enabled="true" data-default-color="rgba(0,0,0,0.85)" name="pretty_grid_ribbon_bg_color" value="<?php echo esc_url( $pretty_grid_ribbon_bg_color ); ?>" />
                        </div>
                </div>
            </div>
        </div>


    </div>
</div>
