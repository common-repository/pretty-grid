<div id="lightbox" class="pretty-grid-box-tab" data-nav="lightbox" >

	<div class="pretty-grid-box-header">
		<h2 class="pretty-grid-box-title"><?php esc_html_e( 'Lightbox', Pretty_Grid::DOMAIN ); ?></h2>
	</div>

    <div class="pretty-grid-box-body">
        <div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Enable LightBox', Pretty_Grid::DOMAIN ); ?></span>
                <span class="pretty-grid-description"><?php esc_html_e( 'Enbable lightbox feature for your gallery.', Pretty_Grid::DOMAIN ); ?></span>
            </div>
        <div class="pretty-grid-box-settings-col-2">
            <div class="sui-tabs-container">
                <div class="sui-tabs-menu">
                    <div class="sui-tab-item lightbox-mode <?php if(isset($settings['lightbox']) && $settings['lightbox'] == 'on'){echo 'active';}else if(!isset($settings['lightbox'])){echo 'active';} ?>" data-nav="on"><?php esc_html_e( 'On', Pretty_Grid::DOMAIN ); ?></div>
                    <div class="sui-tab-item lightbox-mode <?php if(isset($settings['lightbox']) && $settings['lightbox'] == 'off'){echo 'active';}?>" data-nav="off"><?php esc_html_e( 'Off', Pretty_Grid::DOMAIN ); ?></div>
                </div>
                <div class="sui-tabs-content">
                    <div class="sui-tab-content active">
                    </div>

                    <div class="sui-tab-content">
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>


</div>
