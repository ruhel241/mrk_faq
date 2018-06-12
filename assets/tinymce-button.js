/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),

/***/ 5:
/***/ (function(module, exports) {

(function () {
    var mrkFAQModalApp = {
        insertDom: function insertDom() {
            jQuery('body').append('\n            <div style="display: none;" class="mrk_faq_shortcode_builder_pop_up" id="mrk_faq_pop_up">\n                <div class="mrk_faq_pop_shadow"></div>\n\n                <div id="ninja_faq_moon" class="mrk_pop_container">\n                    <div class="mrk_faq_header">\n                        Insert Ninja FAQ Shortcode\n                        <span class="mrkFAQ_pop_close">X</span>\n                    </div>\n\n                    <div class="mrk_faq_pop_body"> \n\n                            <div class="nf_options_group">\n                                <div class="nf_form_group">\n                                    <label> FAQ Display Type </label>\n                                    <div class="nf_inline_form_items">\n\n\n                                        <label m-for="nf_display, nf_displaykey in nf_displays">\n                                            <input name="display_type" m-model="shortCode.nf_display" m-literal:value="nf_displaykey" type="radio"> {{ nf_display.label }}\n                                        </label>\n                                    </div>\n                                </div>\n                                <div class="nf_form_group">\n                                    <label m-if="shortCode.nf_display == \'grid\'">\n                                        Item Per Grid\n                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />\n                                    </label>\n                                </div>\n                            </div> \n\n\n                            <div class="nf_options_group">\n                                <div class="nf_form_group">\n                                    <label> FAQ Categories Type </label>\n                                    <div class="nf_inline_form_items">\n                                          <label>\n                                            <input m-model="shortCode.all_faq_cats" m-literal:value="true" name="faq_category_type"  type="radio"> All \n                                          </label>\n                                          <label>\n                                             <input m-model="shortCode.all_faq_cats" m-literal:value="false" name="faq_category_type"  type="radio"> Selected Categories \n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_faq_cats == false" class="nf_form_group">\n                                    <label> Select Categories Types that you want to show</label>\n                                    <div class="nf_inline_form_items">\n                                        <label m-for="nf_category, nf_categoryKey in nf_categories">\n                                            <input name="faq_category_type" m-on:change="changeData(nf_categoryKey, \'selectedFaqCats\')"  type="checkbox"> {{ nf_category }} \n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n                            \n                            <div class="nf_options_group">\n                                <div class="nf_form_group">\n                                    <label> FAQ Tags Type </label>\n                                    <div class="nf_inline_form_items">\n                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="true" name="faq_tag_type"  type="radio"> All </label>\n                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="false" name="faq_tag_type"  type="radio"> Selected Tags </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_faq_tags == false" class="nf_form_group">\n                                    <label> Select Tags Types that you want to show</label>\n                                    <div class="nf_inline_form_items">\n                                          <label m-for="nf_tag, nf_tagKey in nf_tags">\n                                            <input name="faq_tag_type" m-on:change="changeData(nf_tagKey, \'selectedFaqTags\')" type="checkbox"> {{nf_tag}} \n                                          </label>\n                                    </div>\n                                </div>\n                            </div>\n                    </div>\n\n\n                    <div class="nf_pop_footer">\n                        <button m-on:click="nf_insertSortCode"  class="nf_insert_button" id=""> Insert Shortcode </button>\n                    </div>\n                   \n\n\n                </div>\n            </div>\n        ');
        },
        showModal: function showModal(editor) {
            window.currentNFEditor = editor;
            jQuery('#mrk_faq_pop_up').show();
        },
        closeModal: function closeModal() {
            jQuery('#mrk_faq_pop_up').hide();
        },
        initShortCodeBuilder: function initShortCodeBuilder() {
            var mainApp = this;
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
                        selectedFaqTags: []
                    }
                },

                computed: {},

                methods: {
                    changeData: function changeData(key, type) {
                        var prevalues = this.get('shortCode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },
                    nf_insertSortCode: function nf_insertSortCode() {
                        var shortCode = this.get('shortCode');
                        var shortCodeParts = ['mrk_faq', "display='" + shortCode.nf_display + "'"];

                        if (shortCode.nf_display == 'grid') {
                            shortCodeParts.push('per_grid=' + shortCode.per_grid);
                        }

                        if (!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push("faq_cat='" + shortCode.selectedFaqCats.toLocaleString() + "'");
                        }
                        if (!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push("faq_tag='" + shortCode.selectedFaqTags.toLocaleString() + "'");
                        }

                        var shortcodeString = '[' + shortCodeParts.join(' ') + ']';
                        currentNFEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }
                }

            });
        },
        initTinyMce: function initTinyMce() {
            var mainApp = this;
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
        init: function init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    mrkFAQModalApp.init();
})();

/***/ })

/******/ });