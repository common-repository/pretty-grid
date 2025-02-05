(function($){

    "use strict";

    var WooPsgFront = {

        attributes: [],

        init: function()
        {
            // Document ready.
            $( document ).ready( WooPsgFront._feedGallery() );
            this._bind();
        },

        /**
         * Binds events for the Ultimate Instagram Front.
         *
         * @since 1.0.0
         * @access private
         * @method _bind
         */
        _bind: function()
        {
            $( document ).on('mouseover', '.pretty-grid-product__img--hover-effect', WooPsgFront._mouseOverEffect );
            $( document ).on('mouseout', '.pretty-grid-product__img--hover-effect', WooPsgFront._mouseOutEffect );

            $( document ).on('click', '.pretty-grid-quick-view-btn', WooPsgFront._quickView );
            $( document ).on('click', '.pretty-grid-wishlist-btn', WooPsgFront._wishList );
            $( document ).on('click', '.pretty-grid-close-button', WooPsgFront._toggleModal );
            $( document ).click(WooPsgFront._hideModal);
        },

        /**
         * Image hover effect
         *
         */
        _mouseOverEffect: function( ) {
            $(this).find('.pretty-grid-overlay-content-bottom').css({"visibility": "visible", "opacity": 1});
        },

        /**
         * Image hover effect
         *
         */
         _mouseOutEffect: function( ) {
            $(this).find('.pretty-grid-overlay-content-bottom').css({"visibility": "hidden", "opacity": 0});
        },


        /**
         * Ajax request complete
         *
         */
         _ajaxComplete: function( id ) {
            var is_lightbox = (Pretty_Grid_Settings_Data.lightbox === 'on');
            if(is_lightbox){
                WooPsgFront._loadLightGallery();
            }
            WooPsgFront._loadSlick(id);

            // Load different layout.
            // var is_carousel = (Pretty_Grid_Settings_Data.pretty_grid_feed_layout === 'grid');
            // if(is_carousel){
            //     WooPsgFront._loadSlick(id);
            // }

            // var is_highlight = (Pretty_Grid_Settings_Data.pretty_grid_feed_layout === 'highlight');
            // if(is_highlight){
            //     WooPsgFront._loadJustifiedGallery(id);
            // }

            // var is_masonry = (Pretty_Grid_Settings_Data.pretty_grid_feed_layout === 'masonry');
            // if(is_masonry){
            //     WooPsgFront._loadMasonry(id);
            // }

            WooPsgFront._updateStyles();
        },

        /**
         * Load justified gallery
         *
         */
         _loadJustifiedGallery: function( id ) {
            var myGallery = $('.pretty_grid_gallery_container_' + id);
            console.log(myGallery);
            myGallery.justifiedGallery({
                rowHeight: 250,
                lastRow: 'justify',
                margins: 0,
                captions: false,
                randomize: true,
                waitThumbnailsLoad:	true,
            });
        },

        /**
         * Load masonry
         *
         */
        _loadMasonry: function( id ) {
            var myGallery = $('.pretty_grid_gallery_container_' + id);
            console.log(myGallery);
            myGallery.css({"margin": "0 auto"});
            // Init Masonry
            var $grid = myGallery.masonry({
                // options
                itemSelector: '.grid-item',
                fitWidth: true,
                originLeft: false
            });
            // layout Masonry after each image loads
            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });


        },

        /**
         * Update Styles
         *
         */
        _updateStyles: function( ) {
            var padding = Pretty_Grid_Settings_Data.pretty_grid_space;
            $('.single-feed').css({"padding": padding});
            $('.pretty-grid-twitter-image').css({"height": "400px !important"});
        },

        /**
         * Load light gallery
         *
         */
        _loadLightGallery: function( ) {
            lightGallery(document.getElementById('pretty-grid-light-gallery'), {
                plugins: [lgZoom, lgThumbnail],
                speed: 500,
            });
        },

        /**
         * Load Slick
         *
         */
         _loadSlick: function( id ) {
            var is_scroll = 'on';
            var is_arrows = (Pretty_Grid_Settings_Data.navigation_arrow === 'single-navigation');
            var is_dots = (Pretty_Grid_Settings_Data.dots_mode === 'single-dots');
            var is_vertical = (Pretty_Grid_Settings_Data.direction_mode === 'vertical');
            var is_autoplay = (Pretty_Grid_Settings_Data.autoplay_mode === 'on');

            if (is_scroll) {
                $(".instagram-gallery").on('wheel', (function(e) {
                    e.preventDefault();

                    if (e.originalEvent.deltaY > 0) {
                        $(this).slick('slickNext');
                    } else {
                        $(this).slick('slickPrev');
                    }
                }));
            }

            var $myCarousel = $('.pretty_grid_gallery_container_' + id);

console.log(Pretty_Grid_Settings_Data.pretty_grid_slide_desktop_columns);

            $myCarousel.slick({
                slidesToShow: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_desktop_columns),
                slidesToScroll: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_desktop_columns),
                rows: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_rows),
                cssEase: 'linear',
                arrows : is_arrows,
                dots : is_dots,
                vertical: is_vertical,
                autoplay: is_autoplay,
                speed: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_switch_speed),
                prevArrow: '<svg class="slick-prev arrow-icon" height="572pt" viewBox="-18 -18 572.00902 572" width="572pt" xmlns="http://www.w3.org/2000/svg"><path d="m430.292969 255.601562h-250.0625l94.164062-94.164062c4.855469-4.855469 4.855469-12.730469 0-17.582031-4.859375-4.855469-12.730469-4.855469-17.582031 0l-115.367188 115.367187c-2.347656 2.34375-3.65625 5.535156-3.621093 8.851563.023437 3.308593 1.320312 6.480469 3.621093 8.859375l115.367188 115.363281c2.335938 2.355469 5.53125 3.660156 8.851562 3.617187 3.308594-.015624 6.484376-1.3125 8.855469-3.617187 2.335938-2.332031 3.648438-5.492187 3.648438-8.792969 0-3.296875-1.3125-6.464844-3.648438-8.792968l-94.289062-94.164063h250.0625c6.890625 0 12.472656-5.582031 12.472656-12.472656 0-6.886719-5.582031-12.472657-12.472656-12.472657zm0 0"/><path d="m268.15625-.0742188c-108.457031-.0195312-206.242188 65.3085938-247.746094 165.5117188-41.496094 100.207031-18.542968 215.542969 58.171875 292.210938 104.703125 104.703124 274.453125 104.703124 379.152344 0 104.699219-104.695313 104.699219-274.445313 0-379.148438-50.167969-50.453125-118.429687-78.746094-189.578125-78.5742188zm0 511.3554688c-134.074219 0-243.203125-109.132812-243.203125-243.207031s109.128906-243.203125 243.203125-243.203125 243.207031 109.128906 243.207031 243.203125-109.132812 243.207031-243.207031 243.207031zm0 0"/></svg>',
                nextArrow: '<svg class="slick-next arrow-icon" height="572pt" viewBox="-18 -18 572.00902 572" width="572pt" xmlns="http://www.w3.org/2000/svg"><path d="m279.628906 143.855469c-4.851562-4.855469-12.722656-4.855469-17.582031 0-4.855469 4.851562-4.855469 12.726562 0 17.582031l94.164063 94.164062h-250.191407c-6.886719 0-12.472656 5.585938-12.472656 12.472657 0 6.890625 5.585937 12.472656 12.472656 12.472656h250.066407l-94.164063 94.164063c-2.335937 2.328124-3.648437 5.496093-3.648437 8.792968 0 3.300782 1.3125 6.460938 3.648437 8.792969 2.335937 2.355469 5.535156 3.660156 8.855469 3.617187 3.308594-.015624 6.484375-1.3125 8.851562-3.617187l115.367188-115.363281c2.347656-2.351563 3.65625-5.542969 3.621094-8.859375-.023438-3.308594-1.320313-6.472657-3.621094-8.851563zm0 0"/><path d="m268.15625-.0742188c-108.457031-.0195312-206.242188 65.3085938-247.746094 165.5117188-41.496094 100.207031-18.542968 215.542969 58.171875 292.210938 104.703125 104.703124 274.453125 104.703124 379.152344 0 104.699219-104.695313 104.699219-274.445313 0-379.148438-50.167969-50.453125-118.429687-78.746094-189.578125-78.5742188zm0 511.3554688c-134.074219 0-243.203125-109.132812-243.203125-243.207031s109.128906-243.203125 243.203125-243.203125 243.207031 109.128906 243.207031 243.203125-109.132812 243.207031-243.207031 243.207031zm0 0"/></svg>',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_note_columns),
                          slidesToScroll: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_note_columns)
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_tablet_columns),
                            slidesToScroll: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_tablet_columns)
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_mobile_columns),
                            slidesToScroll: parseInt(Pretty_Grid_Settings_Data.pretty_grid_slide_mobile_columns)
                        }
                    },
                ]
            });

            /* Step 2 */
            $myCarousel.on('breakpoint', function(event, slick, breakpoint) {
                console.log('breakpoint ' + breakpoint);
            });


        },

        /**
         * Feed Gallery
         *
         */
        _feedGallery: function( ) {
            $('.pretty-grid-gallery-wrapper').each(function() {
                var galleryId = $(this).attr("data-id");
                WooPsgFront._refreshFeed(galleryId);
            });
        },

        /**
         * Refresh Feed
         *
         */
        _refreshFeed: function( id ) {
            var gallerySelector = '.pretty-grid-container-' + id;
            console.log(gallerySelector);
            var galleryContainer = $(gallerySelector);
            console.log(galleryContainer);
            var fields = {};
            fields['id'] = id;


            //console.log(fields);

            $.ajax({
                    url  : Pretty_Grid_Ajax_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'html',
                    data : {
                        action       : 'woo_psg_refresh_feed',
                        fields_data  : fields,
                    },
                    beforeSend: function() {
                        galleryContainer.html('<div class="text-center"><div class="loader1"><span></span><span></span><span></span><span></span><span></span></div></div>');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( option ) {
                    if( false === option.success ) {
                        console.log(option);
                        galleryContainer.html('Error');
                    } else {
                        console.log(option);
                        var content = option;
                        galleryContainer.html(content);
                        // Load js after ajax complete
                        WooPsgFront._ajaxComplete(id);
                    }

                });


        },

        /**
         * Trigger Wish List
         *
         */
        _wishList: function( e ) {

            e.preventDefault();

            var fields = {};
            fields['id'] = $(this).attr("data-product-id");
            fields['url'] = $(this).attr("data-product-url");

            var quickViewModal = $(this).closest('.pretty-grid-product__content').find('.pretty-grid-quick-view-modal');

            $.ajax({
                    url  : Pretty_Grid_Ajax_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'html',
                    data : {
                        action       : 'megamio_product_wishlist',
                        fields_data  : fields,
                    },
                    beforeSend: function() {
                        //$('.pretty-grid-container').html('<div class="text-center"><div class="loader1"><span></span><span></span><span></span><span></span><span></span></div></div>');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( option ) {
                    console.log(option);

                });


        },

        /**
         * Trigger Quick View
         *
         */
        _quickView: function( ) {

            var fields = {};
            fields['id'] = $(this).attr("data-product-id");

            var quickViewModal = $(this).closest('.pretty-grid-product__content').find('.pretty-grid-quick-view-modal');

            $.ajax({
                    url  : Pretty_Grid_Ajax_Data.ajaxurl,
                    type : 'POST',
                    dataType: 'html',
                    data : {
                        action       : 'megamio_product_quick_view',
                        fields_data  : fields,
                    },
                    beforeSend: function() {
                        //$('.pretty-grid-container').html('<div class="text-center"><div class="loader1"><span></span><span></span><span></span><span></span><span></span></div></div>');
                    },
                })
                .fail(function( jqXHR ){
                    console.log( jqXHR.status + ' ' + jqXHR.responseText);
                })
                .done(function ( option ) {
                    $('.modal').html(option);
                    var modal = $('.modal');
                    modal.toggleClass("show-modal");
                    // if( false === option.success ) {
                    //     console.log(option);
                    // } else {
                    //     console.log(option);
                    // }

                });


        },

        /**
         * Hide Modal
         *
         */
         _hideModal: function( event ) {
            var modal = $('.modal');
            var closeButton = $('.pretty-grid-close-button');
            if ($(event.target).hasClass('modal') || $(event.target).hasClass('pretty-grid-close-button')) {
                if(modal.hasClass('show-modal')){
                    console.log('the hide modal');
                    modal.removeClass("show-modal");
                }

            }
        },

        /**
         * Toggle Modal
         *
         */
         _toggleModal: function( event ) {
            var modal = $('.modal');
            modal.toggleClass("show-modal");
        },

    };

    /**
     * Initialize WooPsgFront
     */
    $(function(){
        WooPsgFront.init();
    });

})(jQuery);