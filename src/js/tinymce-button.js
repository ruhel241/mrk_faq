(function () {
    const FaqNinjaModalApp = {
        insertDom() { 
            jQuery('body').append(`
            <div style="display: none;" class="faq_ninja_shortcode_builder_pop_up" id="faq_ninja_pop_up">
                <div class="faq_ninja_pop_shadow"></div>
                
                <div id="ninja_faq_moon" class="faq_ninja_pop_container">
                    <div class="faq_ninja_header">
                        Insert Ninja FAQ Shortcode
                        <span class="faq_ninja_pop_close">X</span>
                    </div>

                    <div class="faq_ninja_pop_body"> 
                            <div class="fn_options_group">
                                <div class="fn_form_group">
                                    <label> FAQ Display Type </label>
                                    <div class="fn_inline_form_items">
                                        <label m-for="fn_display, fn_displaykey in fn_displays">
                                            <input name="display_type" m-model="shortCode.fn_display" m-literal:value="fn_displaykey" type="radio"> {{ fn_display.label }}
                                        </label>
                                    </div>
                                </div>
                                <div class="fn_form_group">
                                    <label m-if="shortCode.fn_display == 'grid'">
                                        Item Per Grid
                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />
                                    </label>
                                </div>
                            </div> 

                            <div class="fn_options_group">
                                <div class="fn_form_group">
                                    <label> FAQ Categories Type </label>
                                    <div class="fn_inline_form_items">
                                          <label>
                                            <input m-model="shortCode.all_faq_cats" m-literal:value="true" name="faq_category_type"  type="radio"> All 
                                          </label>
                                          <label>
                                             <input m-model="shortCode.all_faq_cats" m-literal:value="false" name="faq_category_type"  type="radio"> Selected Categories 
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_faq_cats == false" class="fn_form_group">
                                    <label> Select Categories Types that you want to show</label>
                                    <div class="fn_inline_form_items">
                                        <label m-for="fn_category, fn_categoryKey in fn_categories">
                                            <input name="faq_category_type" m-on:change="changeData(fn_categoryKey, 'selectedFaqCats')"  type="checkbox"> {{ fn_category }} 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="fn_options_group">
                                <div class="fn_form_group">
                                    <label> FAQ Tags Type </label>
                                    <div class="fn_inline_form_items">
                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="true" name="faq_tag_type"  type="radio"> All </label>
                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="false" name="faq_tag_type"  type="radio"> Selected Tags </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_faq_tags == false" class="fn_form_group">
                                    <label> Select Tags Types that you want to show</label>
                                    <div class="fn_inline_form_items">
                                          <label m-for="fn_tag, fn_tagKey in fn_tags">
                                            <input name="faq_tag_type" m-on:change="changeData(fn_tagKey, 'selectedFaqTags')" type="checkbox"> {{fn_tag}} 
                                          </label>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="fn_pop_footer">
                        <button m-on:click="fn_insertSortCode"  class="fn_insert_button" id=""> Insert Shortcode </button>
                    </div>
                </div>
            </div>
        `);
        },
        showModal(editor) {
            window.currentFnEditor = editor;
            jQuery('#faq_ninja_pop_up').show();
        },
        closeModal() {
            jQuery('#faq_ninja_pop_up').hide();
        },

        initShortCodeBuilder() {
            let mainApp = this;
            window.moonApp2 = new Moon({
                el: "#ninja_faq_moon",
                data: {
                    fn_displays: window.fn_MceVars.fndisplayTypes,
                    fn_categories: window.fn_MceVars.fnCategories,
                    fn_tags: window.fn_MceVars.fnTags,
                    myData: [1, 2],
                    shortCode: {
                        fn_display: 'default',
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

                    fn_insertSortCode() {
                        let shortCode = this.get('shortCode');
                        let shortCodeParts = [
                            'faq_ninja',
                            "display='" + shortCode.fn_display + "'"
                        ];
                        
                        if(shortCode.fn_display == 'grid') {
                            shortCodeParts.push('per_grid='+shortCode.per_grid);
                        }
                        
                        if(!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push( "faq_cat='"+ shortCode.selectedFaqCats.toLocaleString()+"'");
                        }
                        if(!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push( "faq_tag='"+ shortCode.selectedFaqTags.toLocaleString()+"'");
                        }
                        
                        let shortcodeString = '['+shortCodeParts.join(' ')+']';
                        currentFnEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }

                }

            })
        },


        initTinyMce() {
            let mainApp = this;
            tinymce.PluginManager.add('faq_ninja_mce_class', function (editor, url) {
                // Add Button to Visual Editor Toolbar
                editor.addButton('faq_ninja_mce_class', {
                    title: 'Insert Ninja FAQ Shortcode',
                    cmd: 'faq_ninja_mce_command'
                });
                editor.addCommand('faq_ninja_mce_command', function () {
                    mainApp.showModal(editor);
                    // alert("Opened");
                });
                jQuery('.faq_ninja_pop_close, .faq_ninja_pop_shadow').on('click', function () {
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
    FaqNinjaModalApp.init();
})();