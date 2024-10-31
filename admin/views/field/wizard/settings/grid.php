<?php
$pretty_grid_slide_desktop_columns = isset($settings['pretty_grid_slide_desktop_columns']) ? $settings['pretty_grid_slide_desktop_columns'] : '3';
$pretty_grid_slide_note_columns = isset($settings['pretty_grid_slide_note_columns']) ? $settings['pretty_grid_slide_note_columns'] : '3';
$pretty_grid_slide_tablet_columns = isset($settings['pretty_grid_slide_tablet_columns']) ? $settings['pretty_grid_slide_tablet_columns'] : '2';
$pretty_grid_slide_mobile_columns = isset($settings['pretty_grid_slide_mobile_columns']) ? $settings['pretty_grid_slide_mobile_columns'] : '1';
$pretty_grid_slide_switch_speed = isset($settings['pretty_grid_slide_switch_speed']) ? $settings['pretty_grid_slide_switch_speed'] : '600';
?>
<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Products columns', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Set products column(s) in different devices.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="cmb-product-columns">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#5A5F7D" width="18" id="null" class="svg_compile replaced-svg"><path d="M528 0h-480C21.5 0 0 21.5 0 48v320C0 394.5 21.5 416 48 416h192L224 464H152C138.8 464 128 474.8 128 488S138.8 512 152 512h272c13.25 0 24-10.75 24-24s-10.75-24-24-24H352L336 416h192c26.5 0 48-21.5 48-48v-320C576 21.5 554.5 0 528 0zM512 288H64V64h448V288z"></path></svg>
								</div>
							</div>
                            <input
                                type="text"
                                name="pretty_grid_slide_desktop_columns"
                                placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php echo esc_attr($pretty_grid_slide_desktop_columns); ?>"
                                id="pretty_grid_slide_desktop_columns"
                                class="cmb2-text-small"
                            />
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon">
								  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#5A5F7D" width="20" id="null" class="svg_compile replaced-svg"><path d="M128 96h384v256h64v-272c0-26.38-21.62-48-48-48h-416c-26.38 0-48 21.62-48 48V352h64V96zM624 383.1h-608c-8.75 0-16 7.25-16 16v16c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.2 632.8 383.1 624 383.1z"></path></svg>
								</div>
							</div>
                            <input
                                type="text"
                                name="pretty_grid_slide_note_columns"
                                placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php echo esc_attr($pretty_grid_slide_note_columns); ?>"
                                id="pretty_grid_slide_note_columns"
                                class="cmb2-text-small"
                            />						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#5A5F7D" width="16" height="18" id="null" class="svg_compile replaced-svg"><path d="M384 .0001H64c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 63.1 64 63.1h320c35.35 0 64-28.65 64-63.1v-384C448 28.65 419.3 .0001 384 .0001zM224 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S241.8 480 224 480zM384 384H64v-320h320V384z"></path></svg>
								</div>
							</div>
							<input
                                type="text"
                                name="pretty_grid_slide_tablet_columns"
                                placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php echo esc_attr($pretty_grid_slide_tablet_columns); ?>"
                                id="pretty_grid_slide_tablet_columns"
                                class="cmb2-text-small"
                            />
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon">
								   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="#5A5F7D" width="16" height="18" id="null" class="svg_compile replaced-svg"><path d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"></path></svg>
								</div>
							</div>
							<input
                                type="text"
                                name="pretty_grid_slide_mobile_columns"
                                placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                                value="<?php echo esc_attr($pretty_grid_slide_mobile_columns); ?>"
                                id="pretty_grid_slide_mobile_columns"
                                class="cmb2-text-small"
                            />
						</div>
		</div>
    </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Navigation Show', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Show navigation arrow on slider or not.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="sui-tabs-container">
            <div class="sui-tabs-menu">
                <div class="sui-tab-item navigation-arrow <?php if(isset($settings['navigation_arrow']) && $settings['navigation_arrow'] == 'single-navigation'){echo 'active';}else if(!isset($settings['navigation_arrow'])){echo 'active';} ?>" data-nav="single-navigation"><?php esc_html_e( 'On', Pretty_Grid::DOMAIN ); ?></div>
                <div class="sui-tab-item navigation-arrow <?php if(isset($settings['navigation_arrow']) && $settings['navigation_arrow'] == 'double-navigation'){echo 'active';}?>" data-nav="double-navigation"><?php esc_html_e( 'Off', Pretty_Grid::DOMAIN ); ?></div>
            </div>
            <div class="sui-tabs-content">
                <div class="sui-tab-content active" id="single-navigation">
                </div>

                <div class="sui-tab-content" id="double-navigation">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Dots Show', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Show navigation arrow on slider or not.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="sui-tabs-container">
            <div class="sui-tabs-menu">
                <div class="sui-tab-item dots-mode <?php if(isset($settings['dots_mode']) && $settings['dots_mode'] == 'single-dots'){echo 'active';}else if(!isset($settings['dots_mode'])){echo 'active';} ?>" data-nav="single-dots"><?php esc_html_e( 'On', Pretty_Grid::DOMAIN ); ?></div>
                <div class="sui-tab-item dots-mode <?php if(isset($settings['dots_mode']) && $settings['dots_mode'] == 'double-dots'){echo 'active';}?>" data-nav="double-dots"><?php esc_html_e( 'Off', Pretty_Grid::DOMAIN ); ?></div>
            </div>
            <div class="sui-tabs-content">
                <div class="sui-tab-content active" id="single-dots">
                </div>

                <div class="sui-tab-content" id="double-dots">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Slider Direction', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Slider direct to horizontal or vertical.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="sui-tabs-container">
            <div class="sui-tabs-menu">
                <div class="sui-tab-item direction-mode <?php if(isset($settings['direction_mode']) && $settings['direction_mode'] == 'horizontal'){echo 'active';}else if(!isset($settings['direction_mode'])){echo 'active';} ?>" data-nav="horizontal"><?php esc_html_e( 'Horizontal', Pretty_Grid::DOMAIN ); ?></div>
                <div class="sui-tab-item direction-mode <?php if(isset($settings['direction_mode']) && $settings['direction_mode'] == 'vertical'){echo 'active';}?>" data-nav="vertical"><?php esc_html_e( 'Vertical', Pretty_Grid::DOMAIN ); ?></div>
            </div>
            <div class="sui-tabs-content">
                <div class="sui-tab-content active" id="horizontal">
                </div>

                <div class="sui-tab-content" id="vertical">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Slide Switch Effect', Pretty_Grid::DOMAIN ); ?></span>
        <span class="pretty-grid-description"><?php esc_html_e( 'Slider autoplay effect to slide or autoplay.', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
        <div class="sui-tabs-container">
            <div class="sui-tabs-menu">
                <div class="sui-tab-item autoplay-mode <?php if(isset($settings['autoplay_mode']) && $settings['autoplay_mode'] == 'slide'){echo 'active';}else if(!isset($settings['autoplay_mode'])){echo 'active';} ?>" data-nav="on"><?php esc_html_e( 'On', Pretty_Grid::DOMAIN ); ?></div>
                <div class="sui-tab-item autoplay-mode <?php if(isset($settings['autoplay_mode']) && $settings['autoplay_mode'] == 'autoplay'){echo 'active';}?>" data-nav="off"><?php esc_html_e( 'Off', Pretty_Grid::DOMAIN ); ?></div>
            </div>
            <div class="sui-tabs-content">
                <div class="sui-tab-content active" id="on">
                </div>

                <div class="sui-tab-content" id="off">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pretty-grid-box-settings-row">
    <div class="pretty-grid-box-settings-col-1">
        <span class="pretty-grid-settings-label"><?php esc_html_e( 'Slide Switch Speed (ms)', Pretty_Grid::DOMAIN ); ?></span>
    </div>
    <div class="pretty-grid-box-settings-col-2">
                <div>
                    <input
                        type="text"
                        name="pretty_grid_slide_switch_speed"
                        placeholder="<?php esc_html_e( '', Pretty_Grid::DOMAIN ); ?>"
                        value="<?php echo $pretty_grid_slide_switch_speed; ?>"
                        id="pretty_grid_slide_switch_speed"
                        class="pretty-grid-form-control"
                        aria-labelledby="pretty_grid_slide_switch_speed"
                    />
                </div>
    </div>
</div>