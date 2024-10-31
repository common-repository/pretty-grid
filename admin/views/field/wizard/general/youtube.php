<?php
$pretty_grid_items_limit = isset($settings['pretty_grid_items_limit']) ? $settings['pretty_grid_items_limit'] : '12';
$grid_sources = array(
    "playlist" => "Playlist",
    "channel" => "Channel",
);
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
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Data Source', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Select your youtube feed gallery source data source.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="pretty-grid-source-select-wrapper">
            <span class="dropdown-el pretty-source-select">
                    <?php foreach ( $grid_sources as $key => $value ) : ?>
                        <input type="radio" name="pretty_grid_feed_source" value="<?php echo esc_attr( $key ); ?>" <?php if(isset($settings['pretty_grid_feed_source']) && $key == $settings['pretty_grid_feed_source']){echo 'checked="checked"';}elseif($key == 'playlist'){echo 'checked="checked"';} ?> id="<?php echo esc_attr( $key ); ?>">
                        <label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></label>
                    <?php endforeach; ?>
            </span>
            <div class="source-options">
                    <div class="source-select playlist <?php if(!isset($settings['pretty_grid_feed_source']) || 'playlist' == $settings['pretty_grid_feed_source']){echo 'current';} ?>">
                        <div class="pretty-form-field">
                            <input
                                type="text"
                                name="pretty_grid_youtube_playlist_id"
                                placeholder="<?php esc_attr_e( 'Enter youtube playlist id here', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php if(isset($settings['pretty_grid_youtube_playlist_id'])){echo $settings['pretty_grid_youtube_playlist_id'];}?>"
                                id="pretty_grid_youtube_playlist_id"
                                class="pretty-grid-form-control pretty-grid-trigger-feed"
                            />
                        </div>
                    </div>
                    <div class="source-select channel <?php if(isset($settings['pretty_grid_feed_source']) && 'channel' == $settings['pretty_grid_feed_source']){echo 'current';} ?>">
                        <div class="pretty-form-field">
                            <input
                                type="text"
                                name="pretty_grid_youtube_channel_id"
                                placeholder="<?php esc_attr_e( 'Enter youtube channel id here', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php if(isset($settings['pretty_grid_youtube_channel_id'])){echo $settings['pretty_grid_youtube_channel_id'];}?>"
                                id="pretty_grid_youtube_channel_id"
                                class="pretty-grid-form-control pretty-grid-trigger-feed"
                            />
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>