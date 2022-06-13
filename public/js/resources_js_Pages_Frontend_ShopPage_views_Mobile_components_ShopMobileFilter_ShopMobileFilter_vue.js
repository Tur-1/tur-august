"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_ShopPage_views_Mobile_components_ShopMobileFilter_ShopMobileFilter_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js":
/*!***************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js ***!
  \***************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileCategories.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileBrands.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileColors.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileSizeOptions.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _Pages_Frontend_ShopPage_Helpers_useProductsFilters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/Pages/Frontend/ShopPage/Helpers/useProductsFilters */ "./resources/js/Pages/Frontend/ShopPage/Helpers/useProductsFilters.js");





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'ShopMobileFilter',
  props: {
    categorySlug: String,
    queryString: Object
  },
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var props = __props;

    var _useProductsFilters = (0,_Pages_Frontend_ShopPage_Helpers_useProductsFilters__WEBPACK_IMPORTED_MODULE_1__["default"])(props.queryString),
        filters = _useProductsFilters.filters,
        clearProductsFilters = _useProductsFilters.clearProductsFilters,
        getFilteredProducts = _useProductsFilters.getFilteredProducts,
        removeFilteredValue = _useProductsFilters.removeFilteredValue;

    var showFilteredProducts = function showFilteredProducts() {
      getFilteredProducts(props.categorySlug);
    };

    var closeMobileOffcanvasFilter = function closeMobileOffcanvasFilter() {
      $("#mobile-offcanvas-filter").offcanvas('hide');
      showFilteredProducts();
    };

    var __returned__ = {
      props: props,
      filters: filters,
      clearProductsFilters: clearProductsFilters,
      getFilteredProducts: getFilteredProducts,
      removeFilteredValue: removeFilteredValue,
      showFilteredProducts: showFilteredProducts,
      closeMobileOffcanvasFilter: closeMobileOffcanvasFilter,
      ShopMobileCategories: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileCategories.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
      ShopMobileBrands: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileBrands.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
      ShopMobileColors: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileColors.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
      ShopMobileSizeOptions: Object(function webpackMissingModule() { var e = new Error("Cannot find module '@/Pages/Frontend/ShopPage/views/Mobile/components/FilterItems/ShopMobileSizeOptions.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
      useProductsFilters: _Pages_Frontend_ShopPage_Helpers_useProductsFilters__WEBPACK_IMPORTED_MODULE_1__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988 ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col border-start"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "sort-filter-btns",
  "data-bs-toggle": "offcanvas",
  "data-bs-target": "#mobile-offcanvas-filter",
  "aria-controls": "offcanvasExample",
  type: "button",
  id: "mobile-offcanvas-filter-btn"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "bi bi-funnel-fill"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Filter")])], -1
/* HOISTED */
);

var _hoisted_2 = {
  "class": "offcanvas offcanvas-bottom",
  tabindex: "-1",
  id: "mobile-offcanvas-filter",
  "aria-labelledby": "offcanvasBottomLabel"
};
var _hoisted_3 = {
  "class": "offcanvas-header mobile-offcanvas-filter-header"
};

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "border-top"
}, null, -1
/* HOISTED */
);

var _hoisted_5 = {
  "class": "header"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "Fliter", -1
/* HOISTED */
);

var _hoisted_7 = {
  "class": "offcanvas-body small mobile-offcanvas-filter-body"
};
var _hoisted_8 = {
  "class": "offcanvas-footer mobile-offcanvas-filter-footer"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [_hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [_hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": "clear-all-btn",
    type: "button",
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return $setup.clearProductsFilters($setup.props.categorySlug);
    })
  }, "clear All")])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ShopMobileCategories"], {
    showFilteredProducts: $setup.showFilteredProducts
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ShopMobileBrands"], {
    filters: $setup.filters,
    removeFilteredValue: $setup.removeFilteredValue,
    showFilteredProducts: $setup.showFilteredProducts
  }, null, 8
  /* PROPS */
  , ["filters", "removeFilteredValue"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ShopMobileColors"], {
    filters: $setup.filters,
    removeFilteredValue: $setup.removeFilteredValue,
    showFilteredProducts: $setup.showFilteredProducts
  }, null, 8
  /* PROPS */
  , ["filters", "removeFilteredValue"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["ShopMobileSizeOptions"], {
    filters: $setup.filters,
    removeFilteredValue: $setup.removeFilteredValue,
    showFilteredProducts: $setup.showFilteredProducts
  }, null, 8
  /* PROPS */
  , ["filters", "removeFilteredValue"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    type: "button",
    "class": "filter-products-button btn btn-primary",
    onClick: $setup.closeMobileOffcanvasFilter
  }, " (" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$page.props.productsCount) + ") products ", 1
  /* TEXT */
  )])])], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./resources/js/Pages/Frontend/ShopPage/Helpers/useProductsFilters.js":
/*!****************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/Helpers/useProductsFilters.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useProductsFilters)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


function useProductsFilters(queryString) {
  var _queryString$brand, _queryString$color, _queryString$sizeOpti;

  var filters = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({
    brand: (_queryString$brand = queryString.brand) !== null && _queryString$brand !== void 0 ? _queryString$brand : [],
    color: (_queryString$color = queryString.color) !== null && _queryString$color !== void 0 ? _queryString$color : [],
    sizeOptions: (_queryString$sizeOpti = queryString.sizeOptions) !== null && _queryString$sizeOpti !== void 0 ? _queryString$sizeOpti : []
  });

  var getFilteredProducts = function getFilteredProducts(link) {
    _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__.Inertia.get(link, {
      brand: filters.value.brand,
      color: filters.value.color,
      sort: filters.value.sort,
      sizeOptions: filters.value.sizeOptions
    }, {
      preserveState: true,
      replace: true
    });
  };

  var removeFilteredValue = function removeFilteredValue(link, queryString, value) {
    queryString.splice(queryString.indexOf(value), 1);
    getFilteredProducts(link);
  };

  var clearProductsFilters = function clearProductsFilters(link) {
    filters.value.brand = [];
    filters.value.color = [];
    filters.value.sizeOptions = [];
    getFilteredProducts(link);
  };

  return {
    filters: filters,
    clearProductsFilters: clearProductsFilters,
    getFilteredProducts: getFilteredProducts,
    removeFilteredValue: removeFilteredValue
  };
}

/***/ }),

/***/ "./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue":
/*!************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ShopMobileFilter_vue_vue_type_template_id_a6275988__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShopMobileFilter.vue?vue&type=template&id=a6275988 */ "./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988");
/* harmony import */ var _ShopMobileFilter_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShopMobileFilter.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_ShopMobileFilter_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_ShopMobileFilter_vue_vue_type_template_id_a6275988__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js":
/*!***********************************************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileFilter_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileFilter_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ShopMobileFilter.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988":
/*!******************************************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988 ***!
  \******************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileFilter_vue_vue_type_template_id_a6275988__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_ShopMobileFilter_vue_vue_type_template_id_a6275988__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./ShopMobileFilter.vue?vue&type=template&id=a6275988 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileFilter.vue?vue&type=template&id=a6275988");


/***/ })

}]);