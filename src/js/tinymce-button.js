(function () {
    const mrkFAQModalApp = {
        insertDom() { 
            jQuery('body').append(`<div style="display: none;" class="mrk_faq_shortcode_builder_pop_up" id="mrk_faq_pop_up"> 

            </div>`);
        },
        showModal(editor) {
            window.currentCarEditor = editor;
            jQuery('#mrk_faq_pop_up').show();
        },
        closeModal() {
            jQuery('#mrk_faq_pop_up').hide();
        },

        initShortCodeBuilder() {
        },


        initTinyMce() {
            let mainApp = this;
            tinymce.PluginManager.add('mrk_faq_mce_class', function (editor, url) {
                // Add Button to Visual Editor Toolbar
                editor.addButton('mrk_faq_mce_class', {
                    title: 'Insert Ninja FAQ Shortcode',
                    cmd: 'mrk_faq_mce_command'
                });
                editor.addCommand('mrk_faq_mce_command', function () {
                    mainApp.showModal(editor);
                    // alert("Opened");
                });
                jQuery('.car_pop_close').on('click', function () {
                    mainApp.closeModal();
                });
            });
        },
        init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    carShopModalApp.init();
})();