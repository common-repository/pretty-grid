<?php
$type= isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : 'slider';
$components = pretty_grid_field_settings_components($type);
?>

<div id="settings" class="pretty-grid-box-tab" data-nav="settings" >

	<div class="pretty-grid-box-header">
		<h2 class="pretty-grid-box-title"><?php esc_html_e( 'Settings', Pretty_Grid::DOMAIN ); ?></h2>
	</div>

    <div class="pretty-grid-box-body">
            <?php
				foreach ($components as $key => $value) {
					$this->template($value, $settings);
			    }
 			?>
   </div>


</div>
