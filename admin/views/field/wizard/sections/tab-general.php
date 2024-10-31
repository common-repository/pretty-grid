<?php
$type= isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : 'images';
$components = pretty_grid_field_general_components($type);
?>

<div id="general" class="pretty-grid-box-tab active" data-nav="general" >

	<div class="pretty-grid-box-header">
		<h2 class="pretty-grid-box-title"><?php esc_html_e( 'General', Pretty_Grid::DOMAIN ); ?></h2>
	</div>

    <div class="pretty-grid-box-body">
            <?php
				foreach ($components as $key => $value) {
					$this->template($value, $settings);
			    }
 			?>
   </div>


</div>
