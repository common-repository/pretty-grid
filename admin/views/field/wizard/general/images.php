<?php
$pretty_grid_items_limit = isset($settings['pretty_grid_items_limit']) ? $settings['pretty_grid_items_limit'] : '12';
$has_attachments = isset($settings['attachments']) ? count($settings['attachments']) : false;
if(!$has_attachments){
    $hidden_attachments = 'hidden';
}else{
    $hidden_attachments = '';
}
?>
<div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Gallery Name', Pretty_Grid::DOMAIN ); ?></span>
                <span class="pretty-grid-description"><?php esc_html_e( 'Set your pretty grid gallery name.', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <input
                        type="text"
                        name="pretty_grid_campaign_name"
                        placeholder=""
                        value="<?php if(isset($settings['pretty_grid_campaign_name'])){echo esc_attr($settings['pretty_grid_campaign_name']);}?>"
                        id="pretty_grid_campaign_name"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_campaign_name"
                    />
                </div>
            </div>
</div>

<div class="pretty-grid-box-settings-row">
            <div class="pretty-grid-box-settings-col-1">
                <span class="pretty-grid-settings-label"><?php esc_html_e( 'Items Limit', Pretty_Grid::DOMAIN ); ?></span>
                <span class="pretty-grid-description"><?php esc_html_e( 'Set how many items limit you want to display.', Pretty_Grid::DOMAIN ); ?></span>
            </div>
            <div class="pretty-grid-box-settings-col-2">
                <div>
                    <input
                        type="text"
                        name="pretty_grid_items_limit"
                        placeholder=""
                        value="<?php echo esc_attr($pretty_grid_items_limit); ?>"
                        id="pretty_grid_items_limit"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_items_limit"
                    />
                </div>
            </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Choose Images', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Select images to display in your gallery.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div id="pretty-grid-images-uploader-container">
            <div class="inside">
			    <div class="prettygallery-items-view prettygallery-items-view-manage">
				    <div class="prettygallery-items-list">
                        <?php
                            if (!$has_attachments) :
                        ?>
					    <div class="prettygallery-items-empty" style="padding-top:20px; text-align: center">
						    <p><?php esc_html_e( 'Your gallery is currently empty. Add items to see a preview.', Pretty_Grid::DOMAIN ); ?></p>
					    </div>
                        <?php
                            endif;
                        ?>
                        <div class="prettygallery-attachments-list-container <?php echo esc_attr($hidden_attachments); ?>">
                            <ul class="prettygallery-attachments-list ui-sortable">
                                <?php
                                    //render all attachments that have been added to the gallery from the media library
                                    if ($has_attachments) {
                                        foreach ( $settings['attachments'] as $key => $attachment ) {
                                            pretty_grid_render_attachment_item( $attachment );
                                        }
                                    }
                                ?>

					                <li class="add-attachment datasource-medialibrary">
                                        <a href="#" class="upload_image_button media-modal-button">
                                            <div class="dashicons dashicons-plus"></div>
                                        </a>
                                    </li>

                            </ul>
                            <div style="clear: both;"></div>
                            <textarea style="display: none" id="prettygallery-attachment-template"></textarea>
                            <div class="prettygallery-attachments-list-bar">
                                <button type="button" class="media-modal-button button button-primary button-large alignright upload_image_button">
                                    <?php esc_html_e( 'Add Media', Pretty_Grid::DOMAIN ); ?>
                                </button>
                                <button type="button" class="button button-primary button-large alignright remove_all_media">
		                            <?php esc_html_e( 'Remove All Media', Pretty_Grid::DOMAIN ); ?>
                                </button>
                            </div>
                        </div>
				    </div>
                    <?php
                       if (!$has_attachments) :
                    ?>
				    <div class="prettygallery-items-add">
						<button type="button" id="open-media-modal" class="media-modal-button button button-primary button-hero upload_image_button">
				            <span class="dashicons dashicons-admin-media"></span><?php esc_html_e( 'Add From Media Library', Pretty_Grid::DOMAIN ); ?>
                        </button>
            	    </div>
                    <?php
                        endif;
                    ?>
			    </div>
			</div>
        </div>


    </div>
</div>