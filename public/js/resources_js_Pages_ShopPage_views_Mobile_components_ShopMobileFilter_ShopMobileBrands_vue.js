"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_ShopPage_views_Mobile_components_ShopMobileFilter_ShopMobileBrands_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js":
/*!******************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js ***!
  \******************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'ShopMobileBrands',
  props: {
    filters: Object,
    showFilteredProducts: Function,
    removeFilteredValue: Function
  },
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var props = __props;

    var openBrandsOffcanvas = function openBrandsOffcanvas() {
      $("#filter-item-offcanvas-brands").offcanvas('show');
    };

    var closeBrandsOffcanvas = function closeBrandsOffcanvas() {
      props.showFilteredProducts();
      $("#filter-item-offcanvas-brands").offcanvas('hide');
    };

    var __returned__ = {
      props: props,
      openBrandsOffcanvas: openBrandsOffcanvas,
      closeBrandsOffcanvas: closeBrandsOffcanvas
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355 ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "filter-item-wrap"
};
var _hoisted_2 = {
  "class": "filter-item"
};

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "Brands", -1
/* HOISTED */
);

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "bi bi-chevron-right fa-lg"
}, null, -1
/* HOISTED */
);

var _hoisted_5 = [_hoisted_3, _hoisted_4];
var _hoisted_6 = {
  "class": "filtered-items"
};
var _hoisted_7 = {
  "class": "filtered-items-card"
};
var _hoisted_8 = {
  "class": "me-2"
};
var _hoisted_9 = ["onClick"];

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-close"
}, null, -1
/* HOISTED */
);

var _hoisted_11 = [_hoisted_10];
var _hoisted_12 = {
  "class": "offcanvas offcanvas-end filter-item-offcanvas",
  id: "filter-item-offcanvas-brands",
  "aria-labelledby": "staticBackdropLabel"
};

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "bi bi-chevron-left fa-lg"
}, null, -1
/* HOISTED */
);

var _hoisted_14 = [_hoisted_13];

var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "offcanvas-title"
}, "Brands", -1
/* HOISTED */
);

var _hoisted_16 = {
  "class": "offcanvas-body filter-item-offcanvas-body"
};
var _hoisted_17 = {
  "class": "list-group"
};
var _hoisted_18 = {
  "class": "ms-2"
};
var _hoisted_19 = {
  "class": "form-check-input-warp"
};
var _hoisted_20 = ["id", "value", "onUpdate:modelValue"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "filter-item-name",
    type: "button",
    id: "filter-item-brands-btn",
    onClick: $setup.openBrandsOffcanvas
  }, _hoisted_5), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.filters.brand, function (brand, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(brand), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
      onClick: function onClick($event) {
        return $props.removeFilteredValue(_ctx.$page.props.category.slug, $props.filters.brand, brand);
      },
      type: "button"
    }, _hoisted_11, 8
    /* PROPS */
    , _hoisted_9)]);
  }), 256
  /* UNKEYED_FRAGMENT */
  ))], 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vShow, $props.filters.brand.length > 0]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "offcanvas-header border-bottom"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    type: "button",
    "class": "bg-transparent border-0",
    onClick: $setup.closeBrandsOffcanvas,
    "aria-label": "Close"
  }, _hoisted_14), _hoisted_15]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(_ctx.$page.props.brands, function (brand, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("label", {
      key: brand.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(brand.name) + " (" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(brand.products_count) + ")", 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
      "class": "form-check-input",
      type: "checkbox",
      name: "brand[]",
      id: 'brand-' + brand.id,
      value: brand.slug,
      "onUpdate:modelValue": function onUpdateModelValue($event) {
        return $props.filters.brand = $event;
      }
    }, null, 8
    /* PROPS */
    , _hoisted_20), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $props.filters.brand]])])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])])])]);
}

/***/ }),

/***/ "./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue":
/*!***************************************************************************************************!*\
  !*** ./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue ***!
  \***************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ShopMobileBrands_vue_vue_type_template_id_3191a355__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShopMobileBrands.vue?vue&type=template&id=3191a355 */ "./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355");
/* harmony import */ var _ShopMobileBrands_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShopMobileBrands.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_xampp_htdocs_tur_august_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_tur_august_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_ShopMobileBrands_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_ShopMobileBrands_vue_vue_type_template_id_3191a355__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js":
/*!**************************************************************************************************************************************!*\
  !*** ./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js ***!
  \**************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileBrands_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileBrands_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ShopMobileBrands.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355":
/*!*********************************************************************************************************************************!*\
  !*** ./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355 ***!
  \*********************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileBrands_vue_vue_type_template_id_3191a355__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileBrands_vue_vue_type_template_id_3191a355__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ShopMobileBrands.vue?vue&type=template&id=3191a355 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue?vue&type=template&id=3191a355");


/***/ })

}]);