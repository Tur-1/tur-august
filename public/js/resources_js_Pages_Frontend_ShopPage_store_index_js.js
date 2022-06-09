"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_ShopPage_store_index_js"],{

/***/ "./resources/js/Pages/Frontend/ShopPage/store/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/store/index.js ***!
  \*************************************************************/
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
  return {
    filters: filters
  };
}

/***/ })

}]);