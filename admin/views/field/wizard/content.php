<?php
$type = isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : 'images';
$id = isset( $_GET['id'] ) ? sanitize_text_field( $_GET['id'] ) : '';
// Campaign Settings
$settings = array();
if(!empty($id)){
    $model    = $this->get_single_model( $id );
    $settings = $model->settings;
    $settings['status'] = $model->status;
}

$settings_tab_text = 'Slider Settings';

?>
<div class="pretty-grid-row-with-sidenav">

    <div class="pretty-grid-sidenav">

        <div class="pretty-grid-mobile-select">
            <span class="pretty-grid-select-content"><?php esc_html_e( 'General', Pretty_Grid::DOMAIN ); ?></span>
            <ion-icon name="chevron-down" class="pretty-grid-icon-down"></ion-icon>
        </div>

        <ul class="pretty-grid-vertical-tabs pretty-grid-sidenav-hide-md">

            <li class="pretty-grid-vertical-tab current">
                <a href="#" data-nav="general"><?php esc_html_e( 'General', Pretty_Grid::DOMAIN ); ?></a>
            </li>
            <li class="pretty-grid-vertical-tab">
                <a href="#" data-nav="lightbox"><?php esc_html_e( 'Lightbox', Pretty_Grid::DOMAIN ); ?></a>
            </li>
            <li class="pretty-grid-vertical-tab">
                <a href="#" data-nav="settings">
                    <?php echo esc_html( $settings_tab_text ); ?>
                </a>
            </li>
        </ul>

        <div class="pretty-grid-sidenav-settings">
          <a class="pretty_grid_preview_button" href="<?php echo home_url() . '/?pretty_grid_preview=' . $id; ?>" target="_blank">
            <button id="pretty-grid-run-button" class="pretty-grid-button pretty-grid-sidenav-hide-md" accesskey="p">
                <?php esc_html_e( 'Preview', Pretty_Grid::DOMAIN ); ?>
            </button>
          </a>
      </div>

    </div>

    <form class="pretty-grid-campaign-form" method="post" name="pretty-grid-campaign-form" action="">

    <div class="pretty-grid-box-tabs">
        <?php $this->template( 'field/wizard/sections/tab-save',  $settings); ?>
        <?php $this->template( 'field/wizard/sections/tab-general',  $settings); ?>
        <?php $this->template( 'field/wizard/sections/tab-lightbox',  $settings); ?>
        <?php $this->template( 'field/wizard/sections/tab-settings',  $settings); ?>
    </div>
        <input type="hidden" name="pretty_grid_selected_type" value="<?php echo esc_html($type); ?>">
        <input type="hidden" name="campaign_id" value="<?php echo esc_html($id); ?>">
    </form>
</div>