<?php
$pretty_grid_items_limit = isset($settings['pretty_grid_items_limit']) ? $settings['pretty_grid_items_limit'] : '12';
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
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Keywords', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Customize the dashboard as per your liking.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <label class="pretty-grid-settings-label"><?php esc_html_e( 'Campaign keywords', Pretty_Grid::DOMAIN ); ?></label>
        <span class="pretty-grid-description"><?php esc_html_e( 'Campaign keywords (search for these keywords) (comma separated).', Pretty_Grid::DOMAIN ); ?></span>
        <div class="pretty-grid-form-field">
            <label for="pretty_grid_vimeo_keywords" id="pretty-grid-feed-link" class="pretty-grid-label"><?php esc_html_e( 'Selected Keywords', Pretty_Grid::DOMAIN ); ?></label>
            <textarea class="pretty-grid-form-control" id="pretty-grid-selected-keywords" rows="5" cols="20" name="pretty_grid_vimeo_keywords" required="required"><?php if(isset($settings['pretty_grid_vimeo_keywords'])){echo $settings['pretty_grid_vimeo_keywords'];}?></textarea>
        </div>


    </div>

</div>
