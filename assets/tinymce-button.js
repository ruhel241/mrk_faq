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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(6);


/***/ }),

/***/ 6:
/***/ (function(module, exports) {

(function () {
    var FaqNinjaModalApp = {
        insertDom: function insertDom() {
            jQuery('body').append('\n            <div style="display: none;" class="faq_ninja_shortcode_builder_pop_up" id="faq_ninja_pop_up">\n                <div class="faq_ninja_pop_shadow"></div>\n                \n                <div id="ninja_faq_moon" class="faq_ninja_pop_container">\n                    <div class="faq_ninja_header">\n                        Insert Ninja FAQ Shortcode\n                        <span class="faq_ninja_pop_close">X</span>\n                    </div>\n\n                    <div class="faq_ninja_pop_body"> \n                            <div class="fn_options_group">\n                                <div class="fn_form_group">\n                                    <label> FAQ Display Type </label>\n                                    <div class="fn_inline_form_items">\n                                        <label m-for="fn_display, fn_displaykey in fn_displays">\n                                            <input name="display_type" m-model="shortCode.fn_display" m-literal:value="fn_displaykey" type="radio"> {{ fn_display.label }}\n                                        </label>\n                                    </div>\n                                </div>\n                                <div class="fn_form_group">\n                                    <label m-if="shortCode.fn_display == \'grid\'">\n                                        Item Per Grid\n                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />\n                                    </label>\n                                </div>\n                            </div> \n\n                            <div class="fn_options_group">\n                                <div class="fn_form_group">\n                                    <label> FAQ Categories Type </label>\n                                    <div class="fn_inline_form_items">\n                                          <label>\n                                            <input m-model="shortCode.all_faq_cats" m-literal:value="true" name="faq_category_type"  type="radio"> All \n                                          </label>\n                                          <label>\n                                             <input m-model="shortCode.all_faq_cats" m-literal:value="false" name="faq_category_type"  type="radio"> Selected Categories \n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_faq_cats == false" class="fn_form_group">\n                                    <label> Select Categories Types that you want to show</label>\n                                    <div class="fn_inline_form_items">\n                                        <label m-for="fn_category, fn_categoryKey in fn_categories">\n                                            <input name="faq_category_type" m-on:change="changeData(fn_categoryKey, \'selectedFaqCats\')"  type="checkbox"> {{ fn_category }} \n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n                            \n                            <div class="fn_options_group">\n                                <div class="fn_form_group">\n                                    <label> FAQ Tags Type </label>\n                                    <div class="fn_inline_form_items">\n                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="true" name="faq_tag_type"  type="radio"> All </label>\n                                          <label><input m-model="shortCode.all_faq_tags" m-literal:value="false" name="faq_tag_type"  type="radio"> Selected Tags </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_faq_tags == false" class="fn_form_group">\n                                    <label> Select Tags Types that you want to show</label>\n                                    <div class="fn_inline_form_items">\n                                          <label m-for="fn_tag, fn_tagKey in fn_tags">\n                                            <input name="faq_tag_type" m-on:change="changeData(fn_tagKey, \'selectedFaqTags\')" type="checkbox"> {{fn_tag}} \n                                          </label>\n                                    </div>\n                                </div>\n                            </div>\n                    </div>\n\n                    <div class="fn_pop_footer">\n                        <button m-on:click="fn_insertSortCode"  class="fn_insert_button" id=""> Insert Shortcode </button>\n                    </div>\n                </div>\n            </div>\n        ');
        },
        showModal: function showModal(editor) {
            window.currentFnEditor = editor;
            jQuery('#faq_ninja_pop_up').show();
        },
        closeModal: function closeModal() {
            jQuery('#faq_ninja_pop_up').hide();
        },
        initShortCodeBuilder: function initShortCodeBuilder() {
            var mainApp = this;
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
                    fn_insertSortCode: function fn_insertSortCode() {
                        var shortCode = this.get('shortCode');
                        var shortCodeParts = ['faq_ninja', "display='" + shortCode.fn_display + "'"];

                        if (shortCode.fn_display == 'grid') {
                            shortCodeParts.push('per_grid=' + shortCode.per_grid);
                        }

                        if (!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push("faq_cat='" + shortCode.selectedFaqCats.toLocaleString() + "'");
                        }
                        if (!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push("faq_tag='" + shortCode.selectedFaqTags.toLocaleString() + "'");
                        }

                        var shortcodeString = '[' + shortCodeParts.join(' ') + ']';
                        currentFnEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }
                }

            });
        },
        initTinyMce: function initTinyMce() {
            var mainApp = this;
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
        init: function init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    FaqNinjaModalApp.init();
})();

/***/ })

/******/ });