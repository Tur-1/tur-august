"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_ShopPage_Helpers_useProductsFilter_js"],{

/***/ "./resources/js/Pages/Frontend/ShopPage/Helpers/useProductsFilter.js":
/*!***************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/Helpers/useProductsFilter.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");


var useProductsFilter = function useProductsFilter(queryString) {
  var _queryString$brand, _queryString$color, _queryString$sizeOpti;

  var filters = ref({
    brand: (_queryString$brand = queryString.brand) !== null && _queryString$brand !== void 0 ? _queryString$brand : [],
    color: (_queryString$color = queryString.color) !== null && _queryString$color !== void 0 ? _queryString$color : [],
    sizeOptions: (_queryString$sizeOpti = queryString.sizeOptions) !== null && _queryString$sizeOpti !== void 0 ? _queryString$sizeOpti : []
  });

  var clearProductsFilters = function clearProductsFilters() {
    filters.length = 0;
  };

  return {
    filters: filters,
    clearProductsFilters: clearProductsFilters
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useProductsFilter);

/***/ })

}]);