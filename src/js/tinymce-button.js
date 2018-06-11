(function () {
    const mrkFAQModalApp = {
        insertDom() { 
            jQuery('body').append(`
            <div style="display: none;" class="mrk_faq_shortcode_builder_pop_up" id="mrk_faq_pop_up">
                <div class="mrk_faq_pop_shadow"></div>

                <div id="ninja_faq_moon" class="mrk_pop_container">
                    <div class="mrk_faq_header">
                        Insert Ninja FAQ Shortcode
                        <span class="mrkFAQ_pop_close">X</span>
                    </div>

                    <div class="mrk_faq_pop_body"> 

                            <div class="nf_options_group">
                                <div class="nf_form_group">
                                    <label> FAQ Display Type </label>
                                    <div class="nf_inline_form_items">
                                        
                                        <label m-for="nf_display, nf_displaykey in nf_displays">
                                                <input name="display_type" m-model="shortCode.nf_display" m-literal:value="nf_displaykey" type="radio"> {{ nf_display.label }}
                                        </label>

                                     </div>
                                </div>
                                <div class="nf_form_group">
                                    <label m-if="shortCode.nf_display == 'grid_items'">
                                        Item Per Grid
                                        <input type="number" max="3" min="1" value="2"/>
                                    </label>
                                </div>
                            </div> 


                            <div class="nf_options_group">
                                <div class="nf_form_group">
                                    <label> FAQ Categories Type </label>
                                    <div class="nf_inline_form_items">
                                          <label><input name="faq_category_type"  type="radio" checked> All </label>
                                          <label m-model="shortCode." ><input name="faq_category_type"  type="radio"> Selected Categories </label>
                                    </div>
                                </div>
                                <div class="nf_form_group">
                                    <label> Select Categories Types that you want to show</label>
                                    <div class="nf_inline_form_items">
                                          <label><input name="faq_category_type"  type="checkbox"> Shirt </label>
                                          <label><input name="faq_category_type"  type="checkbox"> Pant </label>
                                          <label><input name="faq_category_type"  type="checkbox"> T-shirt </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="nf_options_group">
                                <div class="nf_form_group">
                                    <label> FAQ Tags Type </label>
                                    <div class="nf_inline_form_items">
                                          <label><input name="faq_tag_type"  type="radio" checked> All </label>
                                          <label><input name="faq_tag_type"  type="radio"> Selected Tags </label>
                                    </div>
                                </div>
                                <div class="nf_form_group">
                                    <label> Select Tags Types that you want to show</label>
                                    <div class="nf_inline_form_items">
                                          <label><input name="faq_category_type"  type="checkbox"> Shirt </label>
                                          <label><input name="faq_category_type"  type="checkbox"> Pant </label>
                                          <label><input name="faq_category_type"  type="checkbox"> T-shirt </label>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="nf_pop_footer">
                        <button class="nf_insert_button"> Insert Shortcode </button>
                    </div>



                </div>
            </div>
        `);
        },
        showModal(editor) {
            window.currentCarEditor = editor;
            jQuery('#mrk_faq_pop_up').show();
        },
        closeModal() {
            jQuery('#mrk_faq_pop_up').hide();
        },

        initShortCodeBuilder() {
            window.moonApp2 = new Moon({
                el: "#ninja_faq_moon",
                data: {
                    nf_displays: window.nf_MceVars.nfdisplayTypes,
                    nf_categories: window.nf_MceVars.nfCategories,
                    nf_tags: window.nf_MceVars.nfTags,
                    myData: [1, 2],
                    shortCode: {
                        display: 'default',
                        per_grid: 2,
                        all_faq_cats: true,
                        all_faq_tags: true,
                        selectedFaq: [],
                    }
                },
                methods: {

                },
                hooks: {
                    mounted: function() {
                        console.log("APP Mounted");
                    }
                }
            })
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
                jQuery('.mrkFAQ_pop_close').on('click', function () {
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
    mrkFAQModalApp.init();
})();