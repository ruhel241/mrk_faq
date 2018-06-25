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
                                    <label m-if="shortCode.nf_display == 'grid'">
                                        Item Per Grid
                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />
                                    </label>
                                </div>
                            </div> 

                            <div class="nf_options_group">
                                <div class="nf_form_group">
                                    <label> FAQ Categories Type </label>
                                    <div class="nf_inline_form_items">
                                          <label>
                                            <input m-model="shortCode.all_faq_cats" m-literal:value="true" name="faq_category_type"  type="radio"> All 
                                          </label>
                                          <label>
                                             <input m-model="shortCode.all_faq_cats" m-literal:value="false" name="faq_category_type"  type="radio"> Selected Categories 
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_faq_cats == false" class="nf_form_group">
                                    <label> Select Categories Types that you want to show</label>
                                    <div class="nf_inline_form_items">
                                        <label m-for="nf_category, nf_categoryKey in nf_categories">
                                            <input name="faq_category_type" m-on:change="changeData(nf_categoryKey, 'selectedFaqCats')"  type="checkbox"> {{ nf_category }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="nf_options_group">
                                <div class="nf_form_group">
                                    <label> FAQ Tags Type </label>
                                    <div class="nf_inline_form_items">
                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="true" name="faq_tag_type"  type="radio"> All </label>
                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="false" name="faq_tag_type"  type="radio"> Selected Tags </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_faq_tags == false" class="nf_form_group">
                                    <label> Select Tags Types that you want to show</label>
                                    <div class="nf_inline_form_items">
                                          <label m-for="nf_tag, nf_tagKey in nf_tags">
                                            <input name="faq_tag_type" m-on:change="changeData(nf_tagKey, 'selectedFaqTags')" type="checkbox"> {{nf_tag}} 
                                          </label>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="nf_pop_footer">
                        <button m-on:click="nf_insertSortCode"  class="nf_insert_button" id=""> Insert Shortcode </button>
                    </div>
                </div>
            </div>
        `);
        },
        showModal(editor) {
            window.currentNFEditor = editor;
            jQuery('#mrk_faq_pop_up').show();
        },
        closeModal() {
            jQuery('#mrk_faq_pop_up').hide();
        },

        initShortCodeBuilder() {
            let mainApp = this;
            window.moonApp2 = new Moon({
                el: "#ninja_faq_moon",
                data: {
                    nf_displays: window.nf_MceVars.nfdisplayTypes,
                    nf_categories: window.nf_MceVars.nfCategories,
                    nf_tags: window.nf_MceVars.nfTags,
                    myData: [1, 2],
                    shortCode: {
                        nf_display: 'default',
                        per_grid: 2,
                        all_faq_cats: true,
                        selectedFaqCats: [],
                        all_faq_tags: true,
                        selectedFaqTags: [],
                    }
                },
                

                computed: {
                },

                methods: { 
                    changeData(key, type) {
                        let prevalues = this.get('shortCode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },

                    nf_insertSortCode() {
                        let shortCode = this.get('shortCode');
                        let shortCodeParts = [
                            'mrk_faq',
                            "display='" + shortCode.nf_display + "'"
                        ];
                        
                        if(shortCode.nf_display == 'grid') {
                            shortCodeParts.push('per_grid='+shortCode.per_grid);
                        }
                        
                        if(!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push( "faq_cat='"+ shortCode.selectedFaqCats.toLocaleString()+"'");
                        }
                        if(!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push( "faq_tag='"+ shortCode.selectedFaqTags.toLocaleString()+"'");
                        }
                        
                        let shortcodeString = '['+shortCodeParts.join(' ')+']';
                        currentNFEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
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
                jQuery('.mrkFAQ_pop_close, .mrk_faq_pop_shadow').on('click', function () {
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