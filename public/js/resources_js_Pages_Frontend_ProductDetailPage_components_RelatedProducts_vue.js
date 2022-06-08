"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_ProductDetailPage_components_RelatedProducts_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "horizontal-section"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", {
  "class": "section-title"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Related"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Products")], -1
/* HOISTED */
);

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "section-container"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <div class=\"col-xl-2 col-lg-2 col-md-4 col-6 mb-4 product-item\"\r\n                    v-for=\"(product, index) in $page.props.relatedProducts\" :key=\"index\">\r\n                    <div class=\"card product-card\">\r\n                        <Link :href=\"route('productDetailPage', { product_slug: product.slug })\">\r\n                        <img loading=\"lazy\" :src=\"product.main_image\" class=\"card-img-top\" alt=\"...\" />\r\n                        </Link>\r\n\r\n                        <button tabindex=\"-1\" class=\"wishlist-btn text-center\">\r\n                            <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"wishlist-icon in-wishlist\" width=\"22\"\r\n                                height=\"22\" viewBox=\"0 0 24 24\">\r\n                                <path\r\n                                    d=\"M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z\">\r\n                                </path>\r\n                            </svg>\r\n                        </button>\r\n\r\n                        <div class=\"card-body product-content-card-body\">\r\n                            <span class=\"product-title\">\r\n                                <a href=\"/\" class=\"text-wrap text-dark\">\r\n                                    {{ product.brand_name }}\r\n                                </a>\r\n                            </span>\r\n\r\n                            <span class=\"product-description\">\r\n                                {{ product.name }}\r\n                            </span>\r\n\r\n                            <div class=\"product-price\">\r\n                                <span> {{ product.price }} SAR</span>\r\n                                <span class=\"discounted-product-price\">{{ product.price }} SAR</span>\r\n                                <span class=\"product-out-of-stock\">\r\n                                    out of stock\r\n                                </span>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div> ")])], -1
/* HOISTED */
);

var _hoisted_4 = [_hoisted_2, _hoisted_3];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_1, _hoisted_4);
}

/***/ }),

/***/ "./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _RelatedProducts_vue_vue_type_template_id_5b428f0c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./RelatedProducts.vue?vue&type=template&id=5b428f0c */ "./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_RelatedProducts_vue_vue_type_template_id_5b428f0c__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c":
/*!********************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c ***!
  \********************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_RelatedProducts_vue_vue_type_template_id_5b428f0c__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_RelatedProducts_vue_vue_type_template_id_5b428f0c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./RelatedProducts.vue?vue&type=template&id=5b428f0c */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue?vue&type=template&id=5b428f0c");


/***/ })

}]);