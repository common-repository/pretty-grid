<?php
$status = isset( $settings['status'] ) ? sanitize_text_field( $settings['status'] ) : 'draft';
?>
<div id="pretty-grid-builder-status" class="pretty-grid-box pretty-grid-box-sticky">
    <div class="pretty-grid-box-status">
        <div class="pretty-grid-status">
            <div class="pretty-grid-status-module">
                <?php esc_html_e( 'Status', Pretty_Grid::DOMAIN ); ?>
                    <?php
                    if( $status === 'draft'){
                        ?>
                    <span class="pretty-grid-tag pretty-grid-tag-draft">
                        <?php esc_html_e( 'draft', Pretty_Grid::DOMAIN ); ?>
                    </span>
                    <?php
                    }else if($status === 'publish'){
                        ?>
                    <span class="pretty-grid-tag pretty-grid-tag-published">
                       <?php esc_html_e( 'published', Pretty_Grid::DOMAIN ); ?>
                    </span>
                    <?php
                    }
                    ?>
            </div>
            <div class="pretty-grid-status-changes">

            </div>
        </div>
        <div class="pretty-grid-actions">
            <button id="pretty-grid-campaign-save" class="pretty-grid-button" type="button">
                <span class="pretty-grid-loading-text">
                    <ion-icon name="reload-circle"></ion-icon>
                    <span class="button-text campaign-save-text">
                        <?php
                        if($status === 'publish'){
                            echo esc_html( 'unpublish', Pretty_Grid::DOMAIN );
                        }else{
                            echo esc_html( 'save draft', Pretty_Grid::DOMAIN );
                        }
                        ?>
                    </span>
                </span>
            </button>
            <button id="pretty-grid-campaign-publish" class="pretty-grid-button pretty-grid-button-blue" type="button">
                <span class="pretty-grid-loading-text">
                    <ion-icon name="save"></ion-icon>
                    <span class="button-text campaign-publish-text">
                        <?php
                        if($status === 'publish'){
                            echo esc_html( 'update', Pretty_Grid::DOMAIN );
                        }else{
                            echo esc_html( 'publish', Pretty_Grid::DOMAIN );
                        }
                        ?>
                    </span>
                </span>
            </button>
        </div>
    </div>
</div>
