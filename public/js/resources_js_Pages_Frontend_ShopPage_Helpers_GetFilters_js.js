"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_ShopPage_Helpers_GetFilters_js"],{

/***/ "./resources/js/Pages/Frontend/ShopPage/Helpers/GetFilters.js":
/*!********************************************************************!*\
  !*** ./resources/js/Pages/Frontend/ShopPage/Helpers/GetFilters.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");


var GetFilters = function GetFilters(checked, link) {
  _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_0__.Inertia.get(link, {
    brand: checked.brand,
    color: checked.color,
    sort: checked.sort,
    sizeOptions: checked.sizeOptions
  }, {
    preserveState: true,
    replace: true
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GetFilters);

/***/ })

}]);