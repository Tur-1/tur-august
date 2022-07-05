"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_MyAccountPage_components_MyOrders_OrderPage_OrderProducts_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js ***!
  \*********************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'OrderProducts',
  props: ["products"],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var __returned__ = {};
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3 ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "card border-0 mt-4"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "p-2 text-uppercase"
}, " 4 items", -1
/* HOISTED */
);

var _hoisted_3 = {
  "class": "p-2 border-top"
};
var _hoisted_4 = {
  "class": "card-body border-bottom mb-2"
};
var _hoisted_5 = {
  "class": "row"
};
var _hoisted_6 = {
  "class": "col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3"
};
var _hoisted_7 = {
  href: "http://august.com/product-detail/jin-cole",
  "class": "w-100"
};
var _hoisted_8 = ["src"];
var _hoisted_9 = {
  "class": "col-md-10 col-lg-9 col-xl-10 col-sm-9 col-9 mt-1"
};
var _hoisted_10 = {
  "class": "row"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [_hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.products, function (product, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      "class": "w-100",
      src: product.main_image_url,
      alt: "product-thumbnail"
    }, null, 8
    /* PROPS */
    , _hoisted_8)])]);
  }), 256
  /* UNKEYED_FRAGMENT */
  )), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.product.name), 1
  /* TEXT */
  )])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <div class=\"row\">\r\n                            <div class=\"row mt-2 mb-2\">\r\n                                <span class=\"text-muted text-uppercase\">\r\n                                    {{ product.pivot.quantity }}: 1</span\r\n                                >\r\n                            </div>\r\n\r\n                            <div class=\"d-flex justify-content-between\">\r\n                                <span class=\"text-muted text-uppercase\"\r\n                                    >Size: {{ product.pivot.size_id }}</span\r\n                                >\r\n                                <p class=\"mb-0\">\r\n                                    <span>\r\n                                        <strong id=\"summary\">\r\n                                            {{ product.pivot.total_price }}\r\n                                            SAR\r\n                                        </strong>\r\n                                    </span>\r\n                                </p>\r\n                            </div>\r\n                        </div> ")])])])])]);
}

/***/ }),

/***/ "./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue":
/*!******************************************************************************************!*\
  !*** ./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _OrderProducts_vue_vue_type_template_id_0ee718c3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OrderProducts.vue?vue&type=template&id=0ee718c3 */ "./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3");
/* harmony import */ var _OrderProducts_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OrderProducts.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_xampp_htdocs_tur_august_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_tur_august_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_OrderProducts_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_OrderProducts_vue_vue_type_template_id_0ee718c3__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************************************************************!*\
  !*** ./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_OrderProducts_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_OrderProducts_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./OrderProducts.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3":
/*!************************************************************************************************************************!*\
  !*** ./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3 ***!
  \************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_OrderProducts_vue_vue_type_template_id_0ee718c3__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_OrderProducts_vue_vue_type_template_id_0ee718c3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./OrderProducts.vue?vue&type=template&id=0ee718c3 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue?vue&type=template&id=0ee718c3");


/***/ })

}]);