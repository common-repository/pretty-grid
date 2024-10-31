<?php
$grid_layouts = array(
    "grid" => "Grid",
    "highlight" => "Highlight",
    "masonry" => "Masonry",
);
?>
<div id="layout" class="pretty-grid-box-tab" data-nav="layout" >

	<div class="pretty-grid-box-header">
		<h2 class="pretty-grid-box-title"><?php esc_html_e( 'Layout', Pretty_Grid::DOMAIN ); ?></h2>
	</div>

    <div class="pretty-grid-box-body">
        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Gallery Layout', Pretty_Grid::DOMAIN ); ?></span>
                <span class="pretty-grid-description"><?php esc_html_e( 'Set your gallery layout.', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div class="pretty-grid-layout-select-wrapper">
                    <span class="dropdown-el pretty-layout-select">
                        <?php foreach ( $grid_layouts as $key => $value ) : ?>
                            <input type="radio" name="pretty_grid_feed_layout" value="<?php echo esc_attr( $key ); ?>" <?php if(isset($settings['pretty_grid_feed_layout']) && $key == $settings['pretty_grid_feed_layout']){echo 'checked="checked"';}elseif($key == 'grid'){echo 'checked="checked"';} ?> id="<?php echo esc_attr( $key ); ?>">
                            <label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></label>
                        <?php endforeach; ?>
                    </span>
                </div>
            </div>
        </div>
   </div>


</div>
