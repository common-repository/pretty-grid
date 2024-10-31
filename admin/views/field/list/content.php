<?php
// Count total forms
$count        = $this->countModules();
$count_active = $this->countModules( 'publish' );

// available bulk actions
$bulk_actions = $this->bulk_actions();
?>

<?php if ( $count > 0 ) { ?>

    <!-- START: Bulk actions and pagination -->
    <div class="pretty-grid-listings-pagination">

        <div class="pretty-grid-pagination-mobile pretty-grid-pagination-wrap">
            <span class="pretty-grid-pagination-results">
                            <?php /* translators: ... */ echo esc_html( sprintf( _n( '%s result', '%s results', $count, Pretty_Grid::DOMAIN ), $count ) ); ?>
                        </span>
            <?php $this->pagination(); ?>
        </div>

        <div class="pretty-grid-pagination-desktop pretty-grid-box">
            <div class="pretty-grid-box-search">

                <form method="post" name="pretty-grid-bulk-action-form" class="pretty-grid-search-left">

                    <input type="hidden" id="pretty-grid-nonce" name="pretty_grid_nonce" value="<?php echo wp_create_nonce( 'pretty-grid-field-request' );?>">
                    <input type="hidden" name="_wp_http_referer" value="<?php admin_url( 'admin.php?page=pretty-grid-fields' ); ?>">
                    <input type="hidden" name="ids" id="pretty-grid-select-campaigns-ids" value="">

                    <label for="pretty-grid-check-all-campaigns" class="pretty-grid-checkbox">
                        <input type="checkbox" id="pretty-grid-check-all-campaigns">
                        <span aria-hidden="true"></span>
                        <span class="pretty-grid-screen-reader-text">Select all</span>
                    </label>

                    <div class="pretty-grid-select-wrapper">
                        <select name="pretty_grid_bulk_action" id="bulk-action-selector-top">
                            <option value=""><?php esc_html_e( 'Bulk Action', Pretty_Grid::DOMAIN ); ?></option>
                            <?php foreach ( $bulk_actions as $val => $label ) : ?>
                                <option value="<?php echo esc_attr( $val ); ?>"><?php echo esc_html( $label ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="pretty-grid-button pretty-grid-bulk-action-button"><?php esc_html_e( 'Apply', Pretty_Grid::DOMAIN ); ?></button>

                </form>

                <div class="pretty-grid-search-right">

                    <div class="pretty-grid-pagination-wrap">
                        <span class="pretty-grid-pagination-results">
                            <?php /* translators: ... */ echo esc_html( sprintf( _n( '%s result', '%s results', $count, Pretty_Grid::DOMAIN ), $count ) ); ?>
                        </span>
                        <?php $this->pagination(); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- END: Bulk actions and pagination -->

    <div class="pretty-grid-accordion pretty-grid-accordion-block" id="pretty-grid-modules-list">

        <?php
        foreach ( $this->getModules() as $module ) {
        ?>
            <div class="pretty-grid-accordion-item">
                <div class="pretty-grid-accordion-item-header">

                    <div class="pretty-grid-accordion-item-title pretty-grid-trim-title">
                        <label for="wpf-module-<?php echo esc_attr( $module['id'] ); ?>" class="pretty-grid-checkbox pretty-grid-accordion-item-action">
                            <input type="checkbox" id="wpf-module-<?php echo esc_attr( $module['id'] ); ?>" class="pretty-grid-check-single-campaign" value="<?php echo esc_html( $module['id'] ); ?>">
                            <span aria-hidden="true"></span>
                            <span class="pretty-grid-screen-reader-text"><?php esc_html_e( 'Select this form', Pretty_Grid::DOMAIN ); ?></span>
                        </label>
                        <span class="pretty-grid-trim-text">
                            <?php echo pretty_grid_get_campaign_name( $module['id'] ); ?>
                        </span>
                        <?php
                        if ( 'publish' === $module['status'] ) {
                            echo '<span class="pretty-grid-tag pretty-grid-tag-blue">' . esc_html__( 'Published', Pretty_Grid::DOMAIN ) . '</span>';
                        }
                        ?>

                        <?php
                        if ( 'draft' === $module['status'] ) {
                            echo '<span class="pretty-grid-tag">' . esc_html__( 'Draft', Pretty_Grid::DOMAIN ) . '</span>';
                        }
                        ?>
                    </div>

                    <div class="pretty-grid-accordion-item-date">
                        <strong><?php esc_html_e( 'Shortcode', Pretty_Grid::DOMAIN ); ?></strong>
                        <?php
                            $shortcode_text = '[pretty_grid_gallery id="'.$module['id'].'"][/pretty_grid_gallery]';
                            esc_html_e( $shortcode_text );
                        ?>
                    </div>

                    <div class="pretty-grid-accordion-col-auto">

                        <a href="<?php echo admin_url( 'admin.php?page=pretty-grid-field-wizard&id=' . $module['id'].'&type='.$module['type'] ); ?>"
                           class="pretty-grid-button pretty-grid-button-ghost pretty-grid-accordion-item-action pretty-grid-desktop-visible">
                            <ion-icon name="pencil" class="pretty-grid-icon-pencil"></ion-icon>
                            <?php esc_html_e( 'Edit', Pretty_Grid::DOMAIN ); ?>
                        </a>

                        <div class="pretty-grid-dropdown pretty-grid-accordion-item-action">
                            <button class="pretty-grid-button-icon pretty-grid-dropdown-anchor">
                                <ion-icon name="settings"></ion-icon>
                            </button>
                            <ul class="pretty-grid-dropdown-list">

                                <li>
                                    <form method="post">
                                        <input type="hidden" name="pretty_grid_single_action" value="update-status">
                                        <input type="hidden" name="id" value="<?php echo esc_attr( $module['id'] ); ?>">
                                        <?php
                                        if ( 'publish' === $module['status'] ) {
                                            ?>
                                            <input type="hidden" name="status" value="draft">
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if ( 'draft' === $module['status'] ) {
                                            ?>
                                            <input type="hidden" name="status" value="publish">
                                            <?php
                                        }
                                        ?>
                                        <input type="hidden" id="pretty_grid_nonce" name="pretty_grid_nonce" value="<?php echo wp_create_nonce('pretty-grid-field-request'); ?>">
                                        <button type="submit">
                                            <ion-icon class="pretty-grid-icon-cloud" name="cloud"></ion-icon>
                                            <?php
                                            if ( 'publish' === $module['status'] ) {
                                                echo esc_html__( 'Unpublish', Pretty_Grid::DOMAIN );
                                            }
                                            ?>

                                            <?php
                                            if ( 'draft' === $module['status'] ) {
                                                echo esc_html__( 'Publish', Pretty_Grid::DOMAIN );
                                            }
                                            ?>
                                        </button>
                                    </form>
                                </li>

                                <li>
                                    <a href="#delete-popup" class="open-popup-delete" data-effect="mfp-zoom-in">
                                    <button
                                        class="pretty-grid-option-red pretty-grid-delete-action"
                                        data-campaign-id="<?php echo esc_attr( $module['id'] ); ?>">
                                        <ion-icon class="pretty-grid-icon-trash" name="trash"></ion-icon> <?php esc_html_e( 'Delete', Pretty_Grid::DOMAIN ); ?>
                                    </button>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <button class="pretty-grid-button-icon pretty-grid-accordion-open-indicator" aria-label="<?php esc_html_e( 'Open item', Pretty_Grid::DOMAIN ); ?>">
                            <ion-icon name="chevron-down"></ion-icon>
                        </button>


                    </div>

                </div>
                <div class="pretty-grid-accordion-item-body pretty-grid-campaign-detail-hide">
                    <ul class="pretty-grid-accordion-item-data">
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Last Run', Pretty_Grid::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['last_run_time'] ); ?>
                        </li>
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Type', Pretty_Grid::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['type'] ); ?>
                        </li>
                        <li data-col="large">
                            <strong><?php esc_html_e( 'Keywords', Pretty_Grid::DOMAIN ); ?></strong>
                            <?php esc_html_e( $module['keywords'] ); ?>
                        </li>
                    </ul>
                </div>

            </div>

        <?php

        }

        ?>

    </div>

<?php } else { ?>
    <div class="pretty-grid-box pretty-grid-message pretty-grid-message-lg">

        <img src="<?php echo esc_url(PRETTY_GRID_URL.'/assets/images/prettygrid.png'); ?>" class="pretty-grid-image pretty-grid-image-center" aria-hidden="true" alt="<?php esc_attr_e( 'Auto Robot', Pretty_Grid::DOMAIN ); ?>">

        <div class="pretty-grid-message-content">

            <p><?php esc_html_e( 'Create campaign for all your needs with as many article source as you like, include RSS Feed, Social Media, Videos, Images, Sound and etc.', Pretty_Grid::DOMAIN ); ?></p>

            <p>
				<a href="#" class="pretty-grid-popup-trigger">
                    <button class="pretty-grid-button pretty-grid-button-blue" data-modal="custom_forms">
                  		<i class="pretty-grid-icon-plus" aria-hidden="true"></i> <?php esc_html_e( 'Create', Pretty_Grid::DOMAIN ); ?>
               		</button>
                </a>
            </p>


        </div>

    </div>

<?php } ?>



<div class="modal">
        <div class="modal-content">
            <span class="pretty-grid-close-button">×</span>
            <div class="pretty-grid-box-header pretty-grid-block-content-center">
		        <h3 class="pretty-grid-popup-title"><?php esc_html_e( 'Create New Gallery', Pretty_Grid::DOMAIN ); ?></h3>
	        </div>

            <div class="pretty-grid-box-body pretty-grid-block-content-center">
			        <p>
                        <small>
                            <?php esc_html_e( 'Choose your pretty gird gallery type.', Pretty_Grid::DOMAIN ); ?>
                        </small>
                    </p>
                    <div class="hub-box-selectors">
					<ul class="type-list">
                        <li>
							<label for="hub-type-image" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-image" class="hub-type pretty-grid-gallery-type" data-type = "images" value="images" checked="checked">
								<span class="hub-plantform" data-plantform="image">
                                    <ion-icon name="images" class="pretty-grid-icon-image"></ion-icon>
									<?php esc_html_e( 'Images (Free Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
						<li>
							<label for="hub-type-youtube" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-youtube" class="hub-type pretty-grid-gallery-type" data-type = "youtube" value="youtube">
								<span class="hub-plantform" data-plantform="youtube">
                                    <ion-icon name="logo-youtube" class="pretty-grid-icon-youtube"></ion-icon>
                                    <?php esc_html_e( 'Youtube (Pro Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
                        <li>
							<label for="hub-type-vimeo" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-vimeo" class="hub-type pretty-grid-gallery-type" data-type = "vimeo" value="vimeo">
								<span class="hub-plantform" data-plantform="vimeo">
                                    <ion-icon name="logo-vimeo" class="pretty-grid-icon-vimeo"></ion-icon>
                                    <?php esc_html_e( 'Vimeo (Pro Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
                        <li>
							<label for="hub-type-twitter" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-twitter" class="hub-type pretty-grid-gallery-type" data-type = "twitter" value="twitter">
								<span class="hub-plantform" data-plantform="twitter">
                                    <ion-icon name="logo-twitter" class="pretty-grid-icon-twitter"></ion-icon>
                                    <?php esc_html_e( 'Twitter (Pro Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
                        <li>
							<label for="hub-type-woocommerce" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-woocommerce" class="hub-type pretty-grid-gallery-type" data-type = "woocommerce" value="woocommerce">
								<span class="hub-plantform" data-plantform="woocommerce">
                                    <ion-icon name="storefront" class="pretty-grid-icon-woocommerce"></ion-icon>
                                    <?php esc_html_e( 'Woocommerce (Pro Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
                        <li>
							<label for="hub-type-post" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-post" class="hub-type pretty-grid-gallery-type" data-type = "post" value="post">
								<span class="hub-plantform" data-plantform="post">
                                    <ion-icon name="create" class="pretty-grid-icon-post"></ion-icon>
                                    <?php esc_html_e( 'Post (Pro Version)', Pretty_Grid::DOMAIN ); ?>
								</span>
							</label>
						</li>
					</ul>
				</div>
            </div>

            <div class="pretty-grid-box-footer">
				<div class="pretty-grid-actions-left">
					<a href="#">
                            <button class="pretty-grid-button pretty-grid-close-button">
                                <?php esc_html_e( 'Cancel', Pretty_Grid::DOMAIN ); ?>
                            </button>
                    </a>
				</div>
				<div class="pretty-grid-actions-right">
					<a href="#" class="pretty-grid-trigger-editor">
                        <button class="pretty-grid-button pretty-grid-button-blue">
                            <?php esc_html_e( 'Create', Pretty_Grid::DOMAIN ); ?>
                        </button>
                    </a>
				</div>
			</div>
        </div>
    </div>