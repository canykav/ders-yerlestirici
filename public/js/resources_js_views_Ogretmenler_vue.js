(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_Ogretmenler_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      ogretmenler: null,
      ogretmenEkleModal: false,
      yeniOgretmen: {},
      ogretmen: [],
      message: null,
      dismissSecs: 5,
      dismissCountDown: 0
    };
  },
  props: {
    selectedOgretmen: Number
  },
  mounted: function mounted() {
    this.listOgretmenler();
  },
  methods: {
    listOgretmenler: function listOgretmenler() {
      var _this = this;

      axios.get('/api/ogretmenler').then(function (response) {
        _this.ogretmenler = response.data.data;
      })["catch"](function (error) {
        console.log(error.response.data);
      });
    },
    deleteOgretmen: function deleteOgretmen() {
      var _this2 = this;

      axios["delete"]('/api/ogretmenler', {
        params: {
          id: this.selectedOgretmen
        }
      }).then(function (response) {
        _this2.listOgretmenler();

        _this2.message = 'Öğretmen başarıyla silindi.';

        _this2.showAlert();
      })["catch"](function (error) {
        console.log(error.response.data);
      });
    },
    createOgretmen: function createOgretmen() {
      var _this3 = this;

      axios.post('/api/ogretmenler', {
        ad: this.yeniOgretmen.ad
      }).then(function (response) {
        _this3.listOgretmenler();

        _this3.ogretmenEkleModal = false;
        _this3.message = 'Öğretmen başarıyla eklendi.';

        _this3.showAlert();

        _this3.yeniOgretmen = {};
      })["catch"](function (error) {
        console.log(error.response.data);
      });
    },
    getOgretmenInfo: function getOgretmenInfo(ogretmen) {
      var _this4 = this;

      axios.get('/api/ogretmenler/' + ogretmen).then(function (response) {
        _this4.ogretmen = response.data.data;
      })["catch"](function (error) {
        console.log(error.response.data);
      });
    },
    showAlert: function showAlert() {
      this.dismissCountDown = this.dismissSecs;
    }
  }
});

/***/ }),

/***/ "./resources/js/views/Ogretmenler.vue":
/*!********************************************!*\
  !*** ./resources/js/views/Ogretmenler.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Ogretmenler.vue?vue&type=template&id=53939f3d& */ "./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d&");
/* harmony import */ var _Ogretmenler_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Ogretmenler.vue?vue&type=script&lang=js& */ "./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Ogretmenler_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__.render,
  _Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Ogretmenler.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Ogretmenler_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Ogretmenler.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Ogretmenler_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d&":
/*!***************************************************************************!*\
  !*** ./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Ogretmenler_vue_vue_type_template_id_53939f3d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Ogretmenler.vue?vue&type=template&id=53939f3d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Ogretmenler.vue?vue&type=template&id=53939f3d& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "CAlert",
        {
          attrs: {
            show: _vm.dismissCountDown,
            closeButton: "",
            color: "success"
          },
          on: {
            "update:show": function($event) {
              _vm.dismissCountDown = $event
            }
          }
        },
        [
          _vm._v(
            "\r\n              " + _vm._s(_vm.message) + "\r\n            "
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "CCard",
        [
          _c("CCardHeader", [
            _vm._v("\r\n            Öğretmenler\r\n            "),
            _c(
              "div",
              { staticClass: "card-header-actions" },
              [
                _c(
                  "CButton",
                  {
                    attrs: { type: "submit", color: "dark" },
                    on: {
                      click: function($event) {
                        _vm.ogretmenEkleModal = true
                      }
                    }
                  },
                  [_vm._v("Öğretmen Ekle")]
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("CCardBody", [
            _c(
              "div",
              {
                staticClass: "d-flex align-items-center justify-content-between"
              },
              [
                _c(
                  "div",
                  { staticClass: "form-group", staticStyle: { width: "100%" } },
                  [
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.selectedOgretmen,
                            expression: "selectedOgretmen"
                          }
                        ],
                        staticClass: "form-control",
                        on: {
                          change: [
                            function($event) {
                              var $$selectedVal = Array.prototype.filter
                                .call($event.target.options, function(o) {
                                  return o.selected
                                })
                                .map(function(o) {
                                  var val = "_value" in o ? o._value : o.value
                                  return val
                                })
                              _vm.selectedOgretmen = $event.target.multiple
                                ? $$selectedVal
                                : $$selectedVal[0]
                            },
                            function($event) {
                              return _vm.getOgretmenInfo(_vm.selectedOgretmen)
                            }
                          ]
                        }
                      },
                      [
                        _vm.ogretmenler.length != 0
                          ? _c(
                              "option",
                              {
                                attrs: { selected: "", hidden: "" },
                                domProps: { value: undefined }
                              },
                              [_vm._v("Seçiniz")]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.ogretmenler.length == 0
                          ? _c(
                              "option",
                              {
                                attrs: { selected: "", hidden: "" },
                                domProps: { value: undefined }
                              },
                              [_vm._v("Listelenecek öğretmen bulunamadı")]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm._l(_vm.ogretmenler, function(ogretmen) {
                          return _c(
                            "option",
                            {
                              key: ogretmen.id,
                              domProps: { value: ogretmen.id }
                            },
                            [_vm._v(_vm._s(ogretmen.ad))]
                          )
                        })
                      ],
                      2
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "CButton",
                  {
                    staticStyle: {
                      "margin-bottom": "16px",
                      width: "150px",
                      "margin-left": "10px"
                    },
                    attrs: { color: "danger" },
                    on: {
                      click: function($event) {
                        return _vm.deleteOgretmen()
                      }
                    }
                  },
                  [_vm._v("\r\n              Öğretmeni Sil\r\n            ")]
                )
              ],
              1
            )
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "CRow",
        [
          _c(
            "CCol",
            { attrs: { sm: "6" } },
            [
              _c(
                "CCard",
                [
                  _c("CCardHeader", [
                    _vm._v("\r\n            Öğretmen Bilgisi\r\n          ")
                  ]),
                  _vm._v(" "),
                  _c(
                    "CCardBody",
                    [
                      _c("label", [_vm._v("Girdiği Dersler")]),
                      _vm._v(" "),
                      _c(
                        "select",
                        { staticClass: "custom-select", attrs: { size: "4" } },
                        _vm._l(_vm.ogretmen.dersler, function(ders) {
                          return _c(
                            "option",
                            { key: ders.id, domProps: { value: ders.id } },
                            [_vm._v(_vm._s(ders.ad))]
                          )
                        }),
                        0
                      ),
                      _vm._v(" "),
                      _c(
                        "CRow",
                        [
                          _c(
                            "CCol",
                            { staticClass: "mt-2", attrs: { sm: "6" } },
                            [
                              _c("CInput", {
                                attrs: {
                                  label: "Toplam Ders Saati",
                                  value: _vm.ogretmen.toplam_saat,
                                  readonly: ""
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "CCol",
                            { staticClass: "mt-2", attrs: { sm: "6" } },
                            [
                              _c("CInput", {
                                attrs: {
                                  label: "Uygun Ders Saati",
                                  readonly: ""
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "CCol",
            { attrs: { sm: "6" } },
            [
              _c(
                "CCard",
                [
                  _c("CCardHeader", [
                    _vm._v(
                      "\r\n            Öğretmenin Haftalık Programı\r\n          "
                    )
                  ]),
                  _vm._v(" "),
                  _c("CCardBody", [
                    _c("table", { staticClass: "table table-bordered" }, [
                      _c("thead", [
                        _c("tr", [
                          _c("th", { attrs: { scope: "col" } }, [_vm._v("#")]),
                          _vm._v(" "),
                          _c("th", { attrs: { scope: "col" } }, [
                            _vm._v("First")
                          ]),
                          _vm._v(" "),
                          _c("th", { attrs: { scope: "col" } }, [
                            _vm._v("Last")
                          ]),
                          _vm._v(" "),
                          _c("th", { attrs: { scope: "col" } }, [
                            _vm._v("Handle")
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("tbody", [
                        _c("tr", [
                          _c("th", { attrs: { scope: "row" } }, [_vm._v("1")]),
                          _vm._v(" "),
                          _c("td", [_vm._v("Mark")]),
                          _vm._v(" "),
                          _c("td", [_vm._v("Otto")]),
                          _vm._v(" "),
                          _c("td", [_vm._v("@mdo")])
                        ])
                      ])
                    ])
                  ])
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          attrs: { id: "createOgretmenForm" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.createOgretmen()
            }
          }
        },
        [
          _c(
            "CModal",
            {
              attrs: {
                title: "Yeni Öğretmen",
                size: "sm",
                show: _vm.ogretmenEkleModal
              },
              on: {
                "update:show": function($event) {
                  _vm.ogretmenEkleModal = $event
                }
              },
              scopedSlots: _vm._u([
                {
                  key: "footer",
                  fn: function() {
                    return [
                      _c(
                        "CButton",
                        {
                          attrs: { color: "secondary" },
                          on: {
                            click: function($event) {
                              _vm.ogretmenEkleModal = false
                            }
                          }
                        },
                        [_vm._v("Vazgeç")]
                      ),
                      _vm._v(" "),
                      _c(
                        "CButton",
                        {
                          attrs: {
                            form: "createOgretmenForm",
                            type: "submit",
                            color: "primary"
                          }
                        },
                        [_vm._v("Kaydet")]
                      )
                    ]
                  },
                  proxy: true
                }
              ])
            },
            [
              _c("CInput", {
                attrs: {
                  label: "Adı Soyadı",
                  value: _vm.yeniOgretmen.ad,
                  required: ""
                },
                on: {
                  "update:value": function($event) {
                    return _vm.$set(_vm.yeniOgretmen, "ad", $event)
                  }
                }
              })
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);