"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Frontend_MyAccountPage_Desktop_DesktopUi_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js ***!
  \****************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Pages_Frontend_MyAccountPage_components_MyAccountHeader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/Pages/Frontend/MyAccountPage/components/MyAccountHeader */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue");
/* harmony import */ var _Pages_Frontend_MyAccountPage_components_MyAccountSettings__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/Pages/Frontend/MyAccountPage/components/MyAccountSettings */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue");
/* harmony import */ var _Pages_Frontend_MyAccountPage_components_MyOrders__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/Pages/Frontend/MyAccountPage/components/MyOrders */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue");
/* harmony import */ var _Pages_Frontend_MyAccountPage_components_MyAddressBook__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/Pages/Frontend/MyAccountPage/components/MyAddressBook */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'DesktopUi',
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();

    var openAccountSettings = function openAccountSettings() {
      $('.collapse').each(function () {
        $(this).collapse("hide");
      });
      $("#account-settings").collapse("toggle");
    };

    var openMyOrders = function openMyOrders() {
      $('.collapse').each(function () {
        $(this).collapse("hide");
      });
      $("#my-orders").collapse("toggle");
    };

    var openAddressBook = function openAddressBook() {
      $('.collapse').each(function () {
        $(this).collapse("hide");
      });
      $("#address-book").collapse("toggle");
    };

    var __returned__ = {
      openAccountSettings: openAccountSettings,
      openMyOrders: openMyOrders,
      openAddressBook: openAddressBook,
      MyAccountHeader: _Pages_Frontend_MyAccountPage_components_MyAccountHeader__WEBPACK_IMPORTED_MODULE_0__["default"],
      MyAccountSettings: _Pages_Frontend_MyAccountPage_components_MyAccountSettings__WEBPACK_IMPORTED_MODULE_1__["default"],
      MyOrders: _Pages_Frontend_MyAccountPage_components_MyOrders__WEBPACK_IMPORTED_MODULE_2__["default"],
      MyAddressBook: _Pages_Frontend_MyAccountPage_components_MyAddressBook__WEBPACK_IMPORTED_MODULE_3__["default"]
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "container mb-5 mt-5"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "nav nav-tabs d-flex flex-row justify-content-between",
  style: {
    "flex-wrap": "unset !important"
  },
  role: "tablist"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  role: "tab",
  "class": "card shadow-sm w-100 collapse-btn me-1 active",
  id: "account-settings-tab",
  "data-bs-toggle": "tab",
  "data-bs-target": "#account-settings"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body text-center p-4"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title d-flex flex-row align-items-center text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-cog me-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Account Settings ")])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  role: "tab",
  "class": "card shadow-sm w-100 collapse-btn me-1",
  id: "my-orders-tab",
  "data-bs-toggle": "tab",
  "data-bs-target": "#my-orders"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body text-center p-4"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title d-flex flex-row align-items-center text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-boxes me-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" My Orders ")])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  role: "tab",
  "class": "card shadow-sm w-100 collapse-btn",
  id: "address-book-tab",
  "data-bs-toggle": "tab",
  "data-bs-target": "#address-book"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body text-center p-4"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title d-flex flex-row align-items-center text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "far fa-address-card me-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Address Book ")])])])], -1
/* HOISTED */
);

var _hoisted_3 = {
  "class": "tab-content bg-white shadow-sm mt-2",
  id: "myTabContent"
};
var _hoisted_4 = {
  "class": "tab-pane fade show active p-3",
  id: "account-settings",
  role: "tabpanel",
  "aria-labelledby": "home-tab"
};
var _hoisted_5 = {
  "class": "tab-pane fade p-3",
  id: "my-orders",
  role: "tabpanel",
  "aria-labelledby": "my-orders-tab"
};
var _hoisted_6 = {
  "class": "tab-pane fade p-3",
  id: "address-book",
  role: "tabpanel",
  "aria-labelledby": "address-book-tab"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("section", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["MyAccountHeader"]), _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["MyAccountSettings"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["MyOrders"])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["MyAddressBook"])])])]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8 ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "card shadow-sm mb-3"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body text-center p-4"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h5", {
  "class": "card-title"
}, " Profile ")], -1
/* HOISTED */
);

var _hoisted_3 = [_hoisted_2];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, _hoisted_3);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "row p-3"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-md-7"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card shadow-sm"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "wire:id": "bzgUtuEANz79Q3V4AiwS"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("header", {
  "class": "d-flex justify-content-between mb-2 align-items-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "ACCOUNT INFO ")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "bg-transparent border-0",
  "wire:click.prevent": "OpenAccountInfoModal()"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "bi bi-pencil-square"
})])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Name :"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Admin"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Email :"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "admin@admin.com"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Gender :"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Female")])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Livewire Component wire-end:bzgUtuEANz79Q3V4AiwS ")])])], -1
/* HOISTED */
);

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-md-5"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row mb-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card shadow-sm"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "wire:id": "8MbtLTrynBn0TDd3Bq0P"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("header", {
  "class": "d-flex justify-content-between mb-2 align-items-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "PASSWORD")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "bg-transparent border-0",
  "wire:click.prevent": "OpenPasswordModal"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "wire:loading.remove": "",
  "wire:target": "OpenPasswordModal",
  "class": "bi bi-pencil-square"
})])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
  "class": "w-100 p-2",
  placeholder: "*********",
  disabled: ""
})])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row mb-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card shadow-sm"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "wire:id": "3XVzsGsO7yl4cn5avLBs"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("header", {
  "class": "d-flex justify-content-between mb-2 align-items-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "PHONE NUMBER ")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "bg-transparent border-0",
  "wire:click.prevent": "OpenPhoneNumberModal"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "wire:loading.remove": "",
  "wire:target": "OpenPhoneNumberModal",
  "class": "far fa-edit fa-lg"
})])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "w-100 text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "436345643 ")])])])])])], -1
/* HOISTED */
);

var _hoisted_4 = [_hoisted_2, _hoisted_3];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, _hoisted_4);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row mb-3 p-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-4"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card border-0 mb-3 shadow-sm"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-header bg-white d-flex justify-content-between align-items-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "card-title"
}, "Turki Alharbi"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "bg-transparent border-0 btn-sm",
  "wire:click.prevent": "OpenEditAddressModal(3)"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-edit fa-lg"
})]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "border-start m-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  "class": "bg-transparent border-0 btn-sm",
  "wire:click.prevent": "OpenDeleteAddressModal(3)"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fas fa-trash fa-lg"
})])])]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card-body d-flex flex-column"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row text-dark"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, " medina "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, " medina "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, " medina ")]), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", {
  "class": "text-secondary",
  style: {
    "font-size": "12px"
  }
}, " 0552952593 ")])])])], -1
/* HOISTED */
);

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "card border-0 mt-4 w-50 shadow-sm"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  role: "button",
  "class": "card-body text-dark",
  "wire:click.prevent": "OpenNewAddressModal"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fa-solid fa-circle-plus fa-lg me-2"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-bold"
}, "Add new address")])], -1
/* HOISTED */
);

function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [_hoisted_1, _hoisted_2], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92 ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "row"
};

var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<a class=\"col-md-4 col-12 mb-2 pb-1 mt-2\" href=\"http://august.com/my-account/orders/1 \"><div class=\"card shadow-sm p-2\"><div class=\"card-body d-flex justify-content-between\"><h5>order no #1</h5><span class=\"text-primary\">order details</span></div></div><div class=\"rounded text-center pt-2 pe-3 ps-3 d-flex justify-content-between bg-light text-primary\"><p>February 18 ,2022</p><p>269.10 SAR</p></div></a><a class=\"col-md-4 col-12 mb-2 pb-1 mt-2\" href=\"http://august.com/my-account/orders/1 \"><div class=\"card shadow-sm p-2\"><div class=\"card-body d-flex justify-content-between\"><h5>order no #1</h5><span class=\"text-primary\">order details</span></div></div><div class=\"rounded text-center pt-2 pe-3 ps-3 d-flex justify-content-between bg-light text-primary\"><p>February 18 ,2022</p><p>269.10 SAR</p></div></a>", 2);

var _hoisted_4 = [_hoisted_2];
function render(_ctx, _cache) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, _hoisted_4);
}

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue":
/*!*************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _DesktopUi_vue_vue_type_template_id_4ba9902a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DesktopUi.vue?vue&type=template&id=4ba9902a */ "./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a");
/* harmony import */ var _DesktopUi_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DesktopUi.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_DesktopUi_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_DesktopUi_vue_vue_type_template_id_4ba9902a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue":
/*!**********************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MyAccountHeader_vue_vue_type_template_id_73b504b8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MyAccountHeader.vue?vue&type=template&id=73b504b8 */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_MyAccountHeader_vue_vue_type_template_id_73b504b8__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue":
/*!************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MyAccountSettings_vue_vue_type_template_id_41c8ea8e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MyAccountSettings.vue?vue&type=template&id=41c8ea8e */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_MyAccountSettings_vue_vue_type_template_id_41c8ea8e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue":
/*!********************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MyAddressBook_vue_vue_type_template_id_1986929b__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MyAddressBook.vue?vue&type=template&id=1986929b */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_MyAddressBook_vue_vue_type_template_id_1986929b__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue":
/*!***************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MyOrders_vue_vue_type_template_id_1c506c92__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MyOrders.vue?vue&type=template&id=1c506c92 */ "./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92");
/* harmony import */ var C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");

const script = {}

;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_August2_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(script, [['render',_MyOrders_vue_vue_type_template_id_1c506c92__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js":
/*!************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_DesktopUi_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_DesktopUi_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./DesktopUi.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a":
/*!*******************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a ***!
  \*******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_DesktopUi_vue_vue_type_template_id_4ba9902a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_DesktopUi_vue_vue_type_template_id_4ba9902a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./DesktopUi.vue?vue&type=template&id=4ba9902a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue?vue&type=template&id=4ba9902a");


/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8":
/*!****************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8 ***!
  \****************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAccountHeader_vue_vue_type_template_id_73b504b8__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAccountHeader_vue_vue_type_template_id_73b504b8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyAccountHeader.vue?vue&type=template&id=73b504b8 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountHeader.vue?vue&type=template&id=73b504b8");


/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAccountSettings_vue_vue_type_template_id_41c8ea8e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAccountSettings_vue_vue_type_template_id_41c8ea8e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyAccountSettings.vue?vue&type=template&id=41c8ea8e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAccountSettings.vue?vue&type=template&id=41c8ea8e");


/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b":
/*!**************************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b ***!
  \**************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAddressBook_vue_vue_type_template_id_1986929b__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyAddressBook_vue_vue_type_template_id_1986929b__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyAddressBook.vue?vue&type=template&id=1986929b */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyAddressBook.vue?vue&type=template&id=1986929b");


/***/ }),

/***/ "./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92 ***!
  \*********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyOrders_vue_vue_type_template_id_1c506c92__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MyOrders_vue_vue_type_template_id_1c506c92__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MyOrders.vue?vue&type=template&id=1c506c92 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Frontend/MyAccountPage/components/MyOrders.vue?vue&type=template&id=1c506c92");


/***/ })

}]);