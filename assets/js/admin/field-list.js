(function($){

    "use strict";

    var PRETTY_GRIDFieldList = {

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
            $( document ).on('click', '.pretty-grid-popup-trigger', PRETTY_GRIDFieldList._toggleModal );
            $( document ).on('click', '.pretty-grid-close-button', PRETTY_GRIDFieldList._toggleModal );
            $( document ).click(PRETTY_GRIDFieldList._hideModal);
            $( document ).on('click', '.pretty-grid-gallery-type', PRETTY_GRIDFieldList._checkedType );
            $( document ).on('click', '.pretty-grid-trigger-editor', PRETTY_GRIDFieldList._goGalleryEditor );
            $( document ).on('click', '#pretty-grid-check-all-campaigns', PRETTY_GRIDFieldList._checkAll );
            $( document ).on('click', '.pretty-grid-bulk-action-button', PRETTY_GRIDFieldList._preparePost );

        },

        /**
         * Prepare data before post action
         *
         */
         _preparePost: function( ) {

            var ids = [];
            $('.pretty-grid-check-single-campaign').each(function( index ) {
                if($(this).prop('checked')){
                    var value = $(this).val();
                    ids.push(value);
                }
            });

            $('#pretty-grid-select-campaigns-ids').val(ids);

        },

        /**
         * Check All
         *
         */
         _checkAll: function( ) {

            if($(this).prop('checked')){
                $('.pretty-grid-check-single-campaign').prop('checked', true);
            }else{
                $('.pretty-grid-check-single-campaign').prop('checked', false);

            }

        },

        /**
         * Check type
         *
         */
        _checkedType: function( event ) {
            PRETTY_GRIDFieldList.gallery_type = $(this).data('type');
        },

        /**
         * Go Gallery Editor
         *
         */
        _goGalleryEditor: function( ) {
            console.log(PRETTY_GRIDFieldList.gallery_type);
            if(PRETTY_GRIDFieldList.gallery_type == 'images'){
                var target_url = Pretty_Grid_Data.wizard_url + '&type='+ PRETTY_GRIDFieldList.gallery_type;
                window.location.replace(target_url);
            }else{
                var target_url = 'https://wphobby.com/ultimate-instagram';
                window.open(target_url, '_blank');
            }
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
     * Initialize PRETTY_GRIDFieldList
     */
    $(function(){
        PRETTY_GRIDFieldList.init();
    });

})(jQuery);
