(function($){

    "use strict";

    var PRETTY_GRIDDashboard = {

        gallery_type: 'images',

        init: function()
        {
            // Document ready.
            this._bind();
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
            // Popup modal
            $( document ).on('click', '.pretty-grid-popup-trigger', PRETTY_GRIDDashboard._toggleModal );
            $( document ).on('click', '.pretty-grid-close-button', PRETTY_GRIDDashboard._toggleModal );
            $( document ).click(PRETTY_GRIDDashboard._hideModal);
            $( document ).on('click', '.pretty-grid-gallery-type', PRETTY_GRIDDashboard._checkedType );
            $( document ).on('click', '.pretty-grid-trigger-editor', PRETTY_GRIDDashboard._goGalleryEditor );

        },

        /**
         * Check type
         *
         */
        _checkedType: function( event ) {
            PRETTY_GRIDDashboard.gallery_type = $(this).data('type');
        },

        /**
         * Go Gallery Editor
         *
         */
        _goGalleryEditor: function( ) {
            if(PRETTY_GRIDDashboard.gallery_type == 'images'){
                var target_url = Pretty_Grid_Data.wizard_url + '&type='+ PRETTY_GRIDDashboard.gallery_type;
                window.location.replace(target_url);
            }else{
                var target_url = 'https://wphobby.com/ultimate-instagram';
                window.open(target_url, '_blank');
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

    };

    /**
     * Initialize PRETTY_GRIDDashboard
     */
    $(function(){
        PRETTY_GRIDDashboard.init();
    });

})(jQuery);
