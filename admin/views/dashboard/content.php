<?php
$premium_link = '<a href="https://wphobby.com/ultimate-instagram/" target="_blank">' . __( 'premium version', Pretty_Grid::DOMAIN ) . '</a>';
$document_link = '<a href="https://wphobby.com/ultimate-instagram/" target="_blank">' . __( 'document', Pretty_Grid::DOMAIN ) . '</a>';
$demos = array(
	array(
		'href' => 'https://www.youtube.com/watch?v=eeuAVH5W2GM/',
		'demo' => 'RSS Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=fnu4hgrcATQ/',
		'demo' => 'Instagram Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=nDm58uxiZLE/',
		'demo' => 'Vimeo Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=X-kO589Byso/',
		'demo' => 'Flickr Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=m339MVd6tuA/',
		'demo' => 'Vimeo Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=nHYa633aj3M/',
		'demo' => 'Youtube Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=W8lvU6Anj1c/',
		'demo' => 'Schedule Settings'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=M-fARSJFKF4/',
		'demo' => 'Post Template'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=anFfEyfrSFY/',
		'demo' => 'Set Feature Image'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=LwApQaIDb_M/',
		'demo' => 'Video Template'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=guFze2Krfjc/',
		'demo' => 'System Settings'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=dSGtphbXYdU/',
		'demo' => 'Logs System'
	),
);
$support_url = 'https://wphobby.com/ultimate-instagram/';
$document_url = 'https://wphobby.com/ultimate-instagram/';
?>
<div class="wrap about-wrap pretty-grid-welcome-wrap">
	<h1>
		<?php
              printf(
                  esc_html__( 'Welcome to Pretty Grid %1$s', Pretty_Grid::DOMAIN ),
                  PRETTY_GRID_VERSION
              );
        ?>
	</h1>
	<div class="about-text">
		<?php
              printf(
                  esc_html__( 'Thank you for choosing Pretty Grid %1$s, the most intuitive and extensible tool to generate WordPress posts from RSS Feed, Social Media, Videos, Images and etc! - %2$s', Pretty_Grid::DOMAIN ),
                  PRETTY_GRID_VERSION,
				  '<a href="https://wphobby.com/ultimate-instagram/" target="_blank">Visit Plugin Homepage</a>'
              );
        ?>
	</div>
		<div class="pretty-grid-badge-logo">
			<img src="<?php echo esc_url(PRETTY_GRID_URL.'/assets/images/prettygrid.png'); ?>"aria-hidden="true" alt="<?php esc_attr_e( 'Pretty Grid', Pretty_Grid::DOMAIN ); ?>">
		</div>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab nav-tab-active" href="#" data-nav="help">
				<?php esc_html_e( 'Getting Started', Pretty_Grid::DOMAIN ); ?>
			</a>
			<a class="nav-tab" href="#" data-nav="demo">
				<?php esc_html_e( 'Demos', Pretty_Grid::DOMAIN ); ?>
			</a>
			<a class="nav-tab" href="#" data-nav="support">
				<?php esc_html_e( 'Help & Support', Pretty_Grid::DOMAIN ); ?>
			</a>
	</h2>
	<div class="pretty-grid-welcome-tabs">
	<div id="help" class="active nav-container">
		<div class="changelog section-getting-started">
			<div class="feature-section">
				<h2><?php esc_html_e( 'Create Your First Gallery', Pretty_Grid::DOMAIN ); ?></h2>

				<img src="<?php echo esc_url('https://wphobby.com/ultimate-instagram/wp-content/uploads/2022/07/create-new-campaign.png') ?>" class="pretty-grid-help-screenshot" alt="<?php esc_attr_e( 'Pretty Grid', Pretty_Grid::DOMAIN ); ?>">

				<h4><?php printf( __( '1. <a href="#" class="pretty-grid-popup-trigger">Create New Field</a>', Pretty_Grid::DOMAIN ), esc_url ( admin_url( 'admin.php?page=pretty-grid-field-wizard' ) ) ); ?></h4>
				<p><?php _e( 'To create your first gallery, simply click the Create button.', Pretty_Grid::DOMAIN ); ?></p>

				<h4><?php _e( '2. Select Gallery Source Type', Pretty_Grid::DOMAIN );?></h4>
				<p><?php _e( 'You will need to select the source type between RSS Feed, Social Media, Video.', Pretty_Grid::DOMAIN ); ?></p>

				<h4><?php _e( '3. Save Your Gallery Settings', Pretty_Grid::DOMAIN );?></h4>
				<p><?php _e( 'There are tons of settings to help you customize the gallery to suit your needs.', Pretty_Grid::DOMAIN );?></p>
			</div>
		</div>
		<div class="changelog section-getting-started">
			<div class="pretty-grid-tip">
			<?php printf( __( 'Want to more custom gallery types and customize options? Check out all our %s.', Pretty_Grid::DOMAIN ), $document_link ); ?>
			</div>
		</div>
		<div class="changelog section-getting-started">
			<div class="feature-section">
				<h2><?php _e( 'Manage Your Gallerys', Pretty_Grid::DOMAIN ); ?></h2>

				<img src="<?php echo esc_url('https://wphobby.com/ultimate-instagram/wp-content/uploads/2022/07/campaigns-list.png') ?>" class="pretty-grid-help-screenshot" alt="<?php esc_attr_e( 'Pretty Grid', Pretty_Grid::DOMAIN ); ?>">

				<h4><?php printf( __( '1. <a href="%s" target="_blank">Go to Gallerys List</a>', Pretty_Grid::DOMAIN ), esc_url ( admin_url( 'admin.php?page=pretty-grid-fields' ) ) ); ?></h4>
				<p><?php _e( 'We make your life easy! Just use the bulk actions you can publish, unpublish and delete gallerys. ', Pretty_Grid::DOMAIN );?></p>

				<h4><?php _e( '2. Edit Gallerys', Pretty_Grid::DOMAIN );?></h4>
				<p><?php _e( 'To edit any your gallery, simply click the Edit button.', Pretty_Grid::DOMAIN ); ?></p>

			</div>
		</div>
	</div>
	<div id="demo" class="nav-container">
		<h2><?php _e( 'Videos Demo', Pretty_Grid::DOMAIN ); ?></h2>
		<div class="demos_masonry">
		<?php
			foreach ( $demos as $demo ) {
		?>
				<div class="demo_section">
					<h3><a href="<?php echo esc_url($demo['href']); ?>" target="_blank" title="<?php __('Open demo in new tab',Pretty_Grid::DOMAIN); ?>"><?php echo $demo['demo']; ?></a></h3>
				</div>
		<?php
			}
		?>

		</div>
	</div>
	<div id="support" class="nav-container">
		<h2><?php _e( "Need help? We're here for you...", Pretty_Grid::DOMAIN ); ?></h2>
		<p class="document-center">
			<span class="dashicons dashicons-editor-help"></span>
			<a href="<?php echo esc_url ( $document_url ); ?>" target="_blank">
			<?php _e('Document',Pretty_Grid::DOMAIN); ?>
			- <?php _e('The document articles will help you troubleshoot issues that have previously been solved.', Pretty_Grid::DOMAIN); ?>
			</a>
		</p>
		<div class="feature-cta">
			<p><?php _e('Still stuck? Please open a support ticket and we will help:', Pretty_Grid::DOMAIN); ?></p>
			<a target="_blank" href="<?php echo esc_url ( $support_url ); ?>"><?php _e('Open a support ticket', Pretty_Grid::DOMAIN ); ?></a>
		</div>
	</div>
	</div>

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
							<label for="hub-type-images" class="hub-box-selector hub-box-selector-vertical">
								<input type="radio" name="hub-selected-type" id="hub-type-images" class="hub-type pretty-grid-gallery-type" data-type = "images" value="images" checked="checked">
								<span class="hub-plantform" data-plantform="images">
                                    <ion-icon name="images" class="pretty-grid-icon-images"></ion-icon>
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
</div>