(function($){

    "use strict";

    var PRETTY_GRIDFieldEditor = {

        attachments : [],
        dragSource : [],

        init: function()
        {
            // Document ready.
            this._bind();
            $( document ).ready( PRETTY_GRIDFieldEditor._loadNavigationTabs() );
            $( document ).ready( PRETTY_GRIDFieldEditor._loadPaginationTabs() );
            $( document ).ready( PRETTY_GRIDFieldEditor._imagePreloadDragDrop() );

            $( document ).ready( PRETTY_GRIDFieldEditor._gallerySourceSelector() );

        },

        /**
         * Binds events for the Form Builder.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            // Switch tabs
            $( document ).on('click', '.pretty-grid-vertical-tab a', PRETTY_GRIDFieldEditor._switchTabs );
            $( document ).ready( PRETTY_GRIDFieldEditor._triggerSelector() );
            $( document ).on('click', '.sui-tab-item', PRETTY_GRIDFieldEditor._switchSuiTabs );
            $( document ).on('click', '#pretty-grid-campaign-publish', PRETTY_GRIDFieldEditor._publishCampaign );
            // Load WP Media selector
            $( document ).ready( PRETTY_GRIDFieldEditor._WPMediaSelector() );
            $( document ).on('mouseover', '.prettygallery-attachments-list .attachment-preview', PRETTY_GRIDFieldEditor._imagePreviewShowInfo );
            $( document ).on('mouseout', '.prettygallery-attachments-list .attachment-preview', PRETTY_GRIDFieldEditor._imagePreviewHideInfo );
            $( document ).on('click', '.prettygallery-attachments-list a.remove', PRETTY_GRIDFieldEditor._removeAttachmentFromGalleryList );
            $( document ).on('click', '.remove_all_media', PRETTY_GRIDFieldEditor._removeAllAttachments );
        },

        /**
         * Gallery Source Selector
         *
         */
         _gallerySourceSelector: function( ) {

            $('.pretty-source-select').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                /* shortcode type expanded */
                $(this).toggleClass('expanded');

                /* set source value */
                var selected_source = $('#'+$(e.target).attr('for'));
                selected_source.prop('checked',true);

                $('.source-select').hide();
                $('.source-select').removeClass('current');
                $('.'+$(e.target).attr('for')).show();
                $('.'+$(e.target).attr('for')).addClass('current');
            });

            $('.pretty-layout-select').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                /* shortcode type expanded */
                $(this).toggleClass('expanded');

                /* set layout value */
                var selected_layout = $('#'+$(e.target).attr('for'));
                selected_layout.prop('checked',true);
            });



        },

        /**
         * Image preload drag and drop
         *
         */
         _imagePreloadDragDrop: function(elementID) {
            var columns = document.querySelectorAll('.pretty-grid-attachment');
            console.log(columns);

            var draggingClass = 'dragging';

            Array.prototype.forEach.call(columns, function (col) {
                col.addEventListener('dragstart', handleDragStart, false);
                col.addEventListener('dragenter', handleDragEnter, false)
                col.addEventListener('dragover', handleDragOver, false);
                col.addEventListener('dragleave', handleDragLeave, false);
                col.addEventListener('drop', handleDrop, false);
                col.addEventListener('dragend', handleDragEnd, false);
              });


            function handleDragStart (evt) {
                PRETTY_GRIDFieldEditor.dragSource = this;
                evt.target.classList.add(draggingClass);
                evt.dataTransfer.effectAllowed = 'move';
                evt.dataTransfer.setData('text/html', this.innerHTML);
            }

            function handleDragOver (evt) {
                evt.dataTransfer.dropEffect = 'move';
                evt.preventDefault();
            }

            function handleDragEnter (evt) {
                this.classList.add('over');
            }

            function handleDragLeave (evt) {
                this.classList.remove('over');
            }

            function handleDrop (evt) {
                evt.stopPropagation();

                if (PRETTY_GRIDFieldEditor.dragSource !== this) {
                    PRETTY_GRIDFieldEditor.dragSource.innerHTML = this.innerHTML;
                    this.innerHTML = evt.dataTransfer.getData('text/html');
                }

                evt.preventDefault();
            }

            function handleDragEnd (evt) {
                var columns = document.querySelectorAll('.pretty-grid-attachment');

                Array.prototype.forEach.call(columns, function (col) {
                  ['over', 'dragging'].forEach(function (className) {
                    col.classList.remove(className);
                  });
                });
            }

        },

        /**
         * Image preview drag and drop
         *
         */
        _imagePreviewDragDrop: function(elementID) {
            //var columns = document.querySelectorAll('.pretty-grid-attachment');

            var draggingClass = 'dragging';
            //var dragSource;

                var col = document.querySelector("#"+elementID);

                col.addEventListener('dragstart', handleDragStart, false);
                col.addEventListener('dragenter', handleDragEnter, false)
                col.addEventListener('dragover', handleDragOver, false);
                col.addEventListener('dragleave', handleDragLeave, false);
                col.addEventListener('drop', handleDrop, false);
                col.addEventListener('dragend', handleDragEnd, false);


            function handleDragStart (evt) {
                PRETTY_GRIDFieldEditor.dragSource = this;
                evt.target.classList.add(draggingClass);
                evt.dataTransfer.effectAllowed = 'move';
                evt.dataTransfer.setData('text/html', this.innerHTML);
            }

            function handleDragOver (evt) {
                evt.dataTransfer.dropEffect = 'move';
                evt.preventDefault();
            }

            function handleDragEnter (evt) {
                this.classList.add('over');
            }

            function handleDragLeave (evt) {
                this.classList.remove('over');
            }

            function handleDrop (evt) {
                evt.stopPropagation();

                if (PRETTY_GRIDFieldEditor.dragSource !== this) {
                    PRETTY_GRIDFieldEditor.dragSource.innerHTML = this.innerHTML;
                    this.innerHTML = evt.dataTransfer.getData('text/html');
                }

                evt.preventDefault();
            }

            function handleDragEnd (evt) {
                var columns = document.querySelectorAll('.pretty-grid-attachment');

                Array.prototype.forEach.call(columns, function (col) {
                  ['over', 'dragging'].forEach(function (className) {
                    col.classList.remove(className);
                  });
                });
            }

        },

        /**
         * Image hover effect
         *
         */
        _imagePreviewShowInfo: function( ) {
            $(this).find("a").css({"display": "block"});
        },

        /**
         * Image hover effect
         *
         */
        _imagePreviewHideInfo: function( ) {
            $(this).find("a").css({"display": "none"});
        },

        /**
         * WP media selector
         *
         */
        _WPMediaSelector: function( ) {
            var ds = ds || {};
            var media;

	        ds.media = media = {
		        buttonId: '.media-modal-button',
		        detailsTemplate: '#pretty-grid-images-uploader-container',

		        frame: function() {
			        if ( this._frame )
				        return this._frame;

			        this._frame = wp.media( {
				        title: 'Select Your Images',
				        button: {
					        text: 'Choose'
				        },
				        multiple: true,
				        library: {
					    type: 'image'
				    }
			    } );

			    this._frame.on( 'ready', this.ready );

			    this._frame.state( 'library' ).on( 'select', this.select );

			    return this._frame;
		    },

		    ready: function() {
			    $( '.media-modal' ).addClass( 'no-sidebar smaller' );
		    },

		    select: function() {
			    var settings = wp.media.view.settings,
				    selection = this.get( 'selection' );

			    $( '.added' ).remove();
			    selection.map( media.showAttachmentDetails );
		    },

		    showAttachmentDetails: function( attachment ) {
                PRETTY_GRIDFieldEditor._addAttachmentToGalleryList(attachment);
		    },

		    init: function() {
			    $( media.buttonId ).on( 'click', function( e ) {
				    e.preventDefault();

				    media.frame().open();
			    });
		        }
	        };

	        $( media.init );
        },

        /**
         * Remove All Attachments from Gallery List
         *
         */
        _removeAllAttachments: function( ) {
            $('.prettygallery-attachments-list a.remove').click();
        },

        /**
         * Remove Attachment from Gallery List
         *
         */
        _removeAttachmentFromGalleryList: function( ) {

            console.log('remove attachment');

            var id = $(this).data('attachment-id');

            console.log(id);

            var index = $.inArray(id, PRETTY_GRIDFieldEditor.attachments);
            if (index !== -1) {
                PRETTY_GRIDFieldEditor.attachments.splice(index, 1);
            }
		    $('.prettygallery-attachments-list [data-attachment-id="' + id + '"]').remove();

            //PRETTY_GRIDFieldEditor._calculateAttachmentIds();

		    //PRETTY_GRIDFieldEditor._calculateHiddenAreas();

        },

        /**
         * Add Attachment to Gallery List
         *
         */
        _addAttachmentToGalleryList: function( attachment ) {
            console.log(attachment);
            var attachmentId = 'pretty-grid-attachment-'+attachment.attributes.id;
            var details = '<li draggable="true" class="pretty-grid-attachment attachment details" data-attachment-id="'+attachment.attributes.id+'" id="pretty-grid-attachment-'+attachment.attributes.id+'"><div class="attachment-preview type-image subtype-png"><div class="thumbnail"><div class="centered"><img width="150" height="150" src="'+attachment.attributes.url+'"></div></div><a class="remove" href="#" data-attachment-id="'+attachment.attributes.id+'" title="Remove from gallery"><span class="dashicons dashicons-dismiss"></span></a></div></li>';

            if ( $('.prettygallery-attachments-list').hasClass('prettygallery-add-media-button-start') ) {
                $('.prettygallery-attachments-list .datasource-medialibrary').after(details);
            } else {
                $('.prettygallery-attachments-list .datasource-medialibrary').before(details);
            }

            PRETTY_GRIDFieldEditor.attachments.push( attachment.id );

            //PRETTY_GRIDFieldEditor._calculateAttachmentIds();

            PRETTY_GRIDFieldEditor._calculateHiddenAreas();
            PRETTY_GRIDFieldEditor._imagePreviewDragDrop(attachmentId);

        },

        /**
         * Add Attachment to Gallery List
         *
         */
        _calculateHiddenAreas: function( ) {
            PRETTY_GRIDFieldEditor._showHiddenAreas( PRETTY_GRIDFieldEditor.attachments.length === 0 );
        },

         /**
         * Add Attachment to Gallery List
         *
         */
        _showHiddenAreas: function( show ) {
            if ( show ) {
                $('.prettygallery-items-add').removeClass('hidden');
                $('.prettygallery-attachments-list-container').addClass('hidden');
                $('.prettygallery-items-empty').removeClass('hidden');
            } else {
                $('.prettygallery-items-add').addClass('hidden');
                $('.prettygallery-attachments-list-container').removeClass('hidden');
                $('.prettygallery-items-empty').addClass('hidden');
            }
        },

        /**
         * Publish Campaign
         *
         */
        _publishCampaign: function( ) {

            var formdata = $('.pretty-grid-campaign-form').serializeArray();
            var fields = {};
            $(formdata ).each(function(index, obj){
                fields[obj.name] = obj.value;
            });
            fields['campaign_status'] = 'publish';
            fields['navigation_arrow'] = $('.navigation-arrow.active').data('nav');
            fields['dots_mode'] = $('.dots-mode.active').data('nav');
            fields['direction_mode'] = $('.direction-mode.active').data('nav');
            fields['autoplay_mode'] = $('.autoplay-mode.active').data('nav');
            fields['lightbox'] = $('.lightbox-mode.active').data('nav');
            fields['attachments'] = [];
            $('.pretty-grid-attachment').each(function(index, obj){
                console.log( $( this ).data('attachment-id') );
                fields['attachments'][index] = $( this ).data('attachment-id');
            });

            fields['sub_type_youtube'] = $("input[name=pretty_grid_feed_source]:checked").val();

            console.log(fields);

            $.ajax({
                    url  : Pretty_Grid_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'json',
                    data : {
                        action       : 'pretty_grid_save_campaign',
                        fields_data  : fields,
                        _ajax_nonce  : Pretty_Grid_Data._ajax_nonce,
                    },
                    beforeSend: function() {
                        $('.pretty-grid-status-changes').html('<ion-icon name="reload-circle"></ion-icon></ion-icon>Saving');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( options ) {
                    if( false === options.success ) {
                        console.log(options);
                    } else {
                        $( "input[name='campaign_id']" ).val(options.data);

                        // update campaign save icon status
                        $('.pretty-grid-status-changes').html('<ion-icon class="pretty-grid-icon-saved" name="checkmark-circle"></ion-icon>Saved');

                        // update campaign button text
                        $('.campaign-save-text').text('unpublish');
                        $('.campaign-publish-text').text('update');

                        //update page url with campaign id
                        var campaign_url = Pretty_Grid_Data.wizard_url + '&id=' + options.data + '&type=' + fields['pretty_grid_selected_type'];
                        window.history.replaceState('','',campaign_url);

                        var preview_url = Pretty_Grid_Data.preview_url + options.data;
                        $( ".pretty_grid_preview_button" ).attr("href", preview_url);
                    }
                });

        },

        /**
         * Load Navigation Tabs
         *
         */
        _loadNavigationTabs: function( ) {

            // onClick new options list of new select
            var activeTab = $('.navigation-arrow.active');

            var tab = '#' + activeTab.data('nav');

            activeTab.closest('.sui-tabs-container').find('.sui-tab-content').removeClass('active');
            activeTab.closest('.sui-tabs-container').find(tab).addClass('active');

        },

        /**
         * Load Pagination Tabs
         *
         */
         _loadPaginationTabs: function( ) {

            // onClick new options list of new select
            var activeTab = $('.pagination-mode.active');

            //console.log(activeTab);

            var tab = '#' + activeTab.data('nav');
            console.log(tab);

            //console.log(activeTab.closest('.sui-tabs-container').find(tab));
            activeTab.closest('.sui-tabs-container').find('.sui-tab-content').removeClass('active');
            activeTab.closest('.sui-tabs-container').find(tab).addClass('active');

        },

        /**
         * Switch Tabs
         *
         */
         _switchTabs: function( event ) {

            event.preventDefault();

            var tab = '#' + $(this).data('nav');

            $('.pretty-grid-vertical-tab').removeClass('current');
            $(this).parent().addClass('current');

            $('.pretty-grid-box-tab').removeClass('active');
            $('.pretty-grid-box-tabs').find(tab).addClass('active');

        },

        /**
         * Trigger Selector
         *
         */
         _triggerSelector: function( ) {
            $('.pretty-grid-theme-selector, .pretty-grid-header-position-selector, .pretty-grid-product-type-selector, .pretty-grid-sale-badge-position-selector, .pretty-grid-featured-badge-position-selector, .pretty-grid-soldout-badge-position-selector, .pretty-grid-discount-badge-position-selector, .pretty-grid-desktop-columns-selector, .pretty-grid-tablet-columns-selector, .pretty-grid-mobile-columns-selector').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                /* api type expanded */
                $(this).toggleClass('expanded');

                /* set from trigger value */
                var trigger = $(this).find('#'+$(e.target).attr('for'));
                console.log(trigger);
                trigger.prop('checked',true);
            });
        },

        /**
         * Switch Sui Tabs
         *
         */
         _switchSuiTabs: function( event ) {

            event.preventDefault();

            var tab = '#' + $(this).data('nav');

            console.log($(this).closest('.sui-tabs-menu').find('.sui-tab-item'));
            $(this).closest('.sui-tabs-menu').find('.sui-tab-item').removeClass('active');
            $(this).addClass('active');

            console.log($(this).closest('.sui-tabs-container').find(tab));
            $(this).closest('.sui-tabs-container').find('.sui-tab-content').removeClass('active');
            $(this).closest('.sui-tabs-container').find(tab).addClass('active');

            console.log($(this).data('nav'));

        },


    };

    /**
     * Initialize PRETTY_GRIDFieldEditor
     */
    $(function(){
        PRETTY_GRIDFieldEditor.init();
    });

})(jQuery);
