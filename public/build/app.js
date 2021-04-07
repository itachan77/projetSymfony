(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$":
/*!*****************************************************************************************************************!*\
  !*** ./assets/controllers/ sync ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \.(j|t)sx?$ ***!
  \*****************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./hello_controller.js": "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$";

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json":
/*!************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
});

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js":
/*!******************************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _default)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var stimulus__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! stimulus */ "./node_modules/stimulus/index.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }




function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }


/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */

var _default = /*#__PURE__*/function (_Controller) {
  _inherits(_default, _Controller);

  var _super = _createSuper(_default);

  function _default() {
    _classCallCheck(this, _default);

    return _super.apply(this, arguments);
  }

  _createClass(_default, [{
    key: "connect",
    value: function connect() {
      this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }
  }]);

  return _default;
}(stimulus__WEBPACK_IMPORTED_MODULE_2__.Controller);



/***/ }),

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_perso_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/perso/index.js */ "./assets/components/perso/index.js");
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./bootstrap */ "./assets/bootstrap.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-dom */ "./node_modules/react-dom/index.js");
 //import Header from './components/tableau/Header.js';





react_dom__WEBPACK_IMPORTED_MODULE_4__.render( /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_3__.createElement(_components_perso_index_js__WEBPACK_IMPORTED_MODULE_0__.default, null), document.getElementById('root'));

/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "app": () => (/* binding */ app)
/* harmony export */ });
/* harmony import */ var _symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @symfony/stimulus-bridge */ "./node_modules/@symfony/stimulus-bridge/dist/index.js");
 // Registers Stimulus controllers from controllers.json and in the controllers/ directory

var app = (0,_symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__.startStimulusApp)(__webpack_require__("./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$"));

/***/ }),

/***/ "./assets/components/perso/ajouter.js":
/*!********************************************!*\
  !*** ./assets/components/perso/ajouter.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");


function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }




var Ajouter = function Ajouter(_ref) {
  var surMonadd = _ref.surMonadd;

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(""),
      _useState2 = _slicedToArray(_useState, 2),
      nom = _useState2[0],
      setnom = _useState2[1];

  var _useState3 = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(""),
      _useState4 = _slicedToArray(_useState3, 2),
      prenom = _useState4[0],
      setprenom = _useState4[1];

  var _useState5 = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(""),
      _useState6 = _slicedToArray(_useState5, 2),
      email = _useState6[0],
      setemail = _useState6[1];

  var monSubmit = function monSubmit(e) {
    e.preventDefault();
    surMonadd({
      nom: nom,
      prenom: prenom,
      email: email
    });
    setnom('');
    setprenom('');
    setemail('');
  };

  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("form", {
    onSubmit: monSubmit
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("label", {
    htmlFor: "nom"
  }, "Nom : "), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("input", {
    type: "text",
    value: nom,
    onChange: function onChange(e) {
      return setnom(e.target.value);
    }
  })), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("label", {
    htmlFor: "prenom"
  }, "Pr\xE9nom : "), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("input", {
    type: "text",
    value: prenom,
    onChange: function onChange(e) {
      return setprenom(e.target.value);
    }
  })), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("label", {
    htmlFor: "email"
  }, "Email : "), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("input", {
    type: "text",
    value: email,
    onChange: function onChange(e) {
      return setemail(e.target.value);
    }
  })), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("input", {
    type: "submit",
    value: "AJOUTER"
  })));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Ajouter);

/***/ }),

/***/ "./assets/components/perso/check.js":
/*!******************************************!*\
  !*** ./assets/components/perso/check.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");


function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }




var Check = function Check(_ref) {
  var toto = _ref.toto,
      monCheck = _ref.monCheck,
      changeBool = _ref.changeBool;

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)([{
    "coche": false
  }]),
      _useState2 = _slicedToArray(_useState, 2),
      monJson = _useState2[0],
      setmonJson = _useState2[1];

  var contraire = function contraire(coche) {
    setmonJson( /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, "coche:!monJson.coche"));
    console.log(coche);
  };

  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement("input", {
    type: "checkbox",
    onClick: function onClick() {
      return changeBool(toto.id);
    },
    onChange: function onChange() {
      return contraire(toto.coche);
    },
    checked: toto.coche
  }));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Check);

/***/ }),

/***/ "./assets/components/perso/croix.js":
/*!******************************************!*\
  !*** ./assets/components/perso/croix.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");


var Croix = function Croix(_ref) {
  var toto = _ref.toto,
      monClick = _ref.monClick;
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    onClick: function onClick() {
      monClick();
    }
  }, "X"));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Croix);

/***/ }),

/***/ "./assets/components/perso/index.js":
/*!******************************************!*\
  !*** ./assets/components/perso/index.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.filter.js */ "./node_modules/core-js/modules/es.array.filter.js");
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.map.js */ "./node_modules/core-js/modules/es.array.map.js");
/* harmony import */ var core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var regenerator_runtime_runtime_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! regenerator-runtime/runtime.js */ "./node_modules/regenerator-runtime/runtime.js");
/* harmony import */ var regenerator_runtime_runtime_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(regenerator_runtime_runtime_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _tache_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./tache.js */ "./assets/components/perso/tache.js");
/* harmony import */ var _ajouter_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./ajouter.js */ "./assets/components/perso/ajouter.js");







function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }





var adresse2 = "http://localhost:5000/eleve/";
var adresse = "http://127.0.0.1:8000/data/";

var Index = function Index() {
  //super raccourci : rafc 
  //1 Méthode permettant de récupérer les tâches sur le serveur
  var fetchMonJson = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
      var res, data;
      return regeneratorRuntime.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return fetch(adresse);

            case 2:
              res = _context.sent;
              _context.next = 5;
              return res.json();

            case 5:
              data = _context.sent;
              return _context.abrupt("return", data);

            case 7:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }));

    return function fetchMonJson() {
      return _ref.apply(this, arguments);
    };
  }(); //2


  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_6__.useState)([]),
      _useState2 = _slicedToArray(_useState, 2),
      monJson = _useState2[0],
      setmonJson = _useState2[1]; //3


  (0,react__WEBPACK_IMPORTED_MODULE_6__.useEffect)(function () {
    //je récupère ma réponse asynchrone
    var getMonJson = /*#__PURE__*/function () {
      var _ref2 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
        var dataFromServer;
        return regeneratorRuntime.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return fetchMonJson();

              case 2:
                dataFromServer = _context2.sent;
                //Mise à jour du State
                setmonJson(dataFromServer);

              case 4:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }));

      return function getMonJson() {
        return _ref2.apply(this, arguments);
      };
    }();

    getMonJson();
  }, []); //Nous mettons un array vide pour que React ne refasse un fetch
  // que si le render a changé sur la page
  //4 Supprimer uen tâche sur le serveur

  var maSupp = /*#__PURE__*/function () {
    var _ref3 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee3(id) {
      return regeneratorRuntime.wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              _context3.next = 2;
              return fetch(adresse + "".concat(id), {
                method: "DELETE"
              });

            case 2:
              setmonJson(monJson.filter(function (toto) {
                return toto.id !== id;
              }));

            case 3:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3);
    }));

    return function maSupp(_x) {
      return _ref3.apply(this, arguments);
    };
  }();

  var monAdd = /*#__PURE__*/function () {
    var _ref4 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee4(tabloJsonexistant) {
      var res, data;
      return regeneratorRuntime.wrap(function _callee4$(_context4) {
        while (1) {
          switch (_context4.prev = _context4.next) {
            case 0:
              _context4.next = 2;
              return fetch(adresse, {
                method: "POST",
                headers: {
                  'Content-type': 'application/json'
                },
                body: JSON.stringify(tabloJsonexistant)
              });

            case 2:
              res = _context4.sent;
              _context4.next = 5;
              return res.json();

            case 5:
              data = _context4.sent;
              console.log(data); //Je modifie le state avec la liste actuelle plus la tâche ajoutée

              setmonJson([].concat(_toConsumableArray(monJson), [data]));

            case 8:
            case "end":
              return _context4.stop();
          }
        }
      }, _callee4);
    }));

    return function monAdd(_x2) {
      return _ref4.apply(this, arguments);
    };
  }();
  /*
    const plusi = (toto) => {
      return(
          <Tache tache={toto.tache} id={toto.id}/>
      )
  }
    const maMod = (id) => {
      setmonJson(
          monJson.filter(
              (toto)=>(toto.id!=id)
          )
      )
  }
    const changeBool = (id) => {
      setmonJson(
          monJson.map(
              (toto)=>
              (toto.id===id ? {...toto,coche:!toto.coche}:toto)
          )
      )
  }
    const monAdd2 = (rtache) => {
      const id = Math.floor(Math.random() * 100000) + 4
      const newTache = {id,...rtache}
      setmonJson(
          [...monJson, newTache]
      )
  }
    const monAjout = (e) => {
      e.preventDefault;
      let plus = e.target.value;
      setmonJson(
          monJson.filter((toto)=>([...toto,plus]))
      )
  }
  */


  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement("div", {
    style: {
      textAlign: "center"
    },
    className: "carre"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(_ajouter_js__WEBPACK_IMPORTED_MODULE_8__.default, {
    surMonadd: monAdd
  })), monJson.length > 0 ? /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement("div", null, monJson.map(function (toto, key) {
    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(react__WEBPACK_IMPORTED_MODULE_6__.Fragment, null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement("div", {
      key: toto.id
    }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6__.createElement(_tache_js__WEBPACK_IMPORTED_MODULE_7__.default, {
      ide: toto.id,
      toto: toto,
      maSupp: maSupp
    })));
  })) : "tableau vide"));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Index);

/***/ }),

/***/ "./assets/components/perso/tache.js":
/*!******************************************!*\
  !*** ./assets/components/perso/tache.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _croix_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./croix.js */ "./assets/components/perso/croix.js");
/* harmony import */ var _check_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./check.js */ "./assets/components/perso/check.js");



var bool;

var Tache = function Tache(_ref) {
  var toto = _ref.toto,
      maSupp = _ref.maSupp,
      changeBool = _ref.changeBool,
      ide = _ref.ide;

  var monCheck = function monCheck() {
    console.log("cliqué");
    console.log(toto.id);
  };
  /*
  const monStyle = () => {
      if (toto.coche) {
          return {borderLeft:"3px solid red"};
      }
  }
  */


  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("table", {
    border: "1",
    width: "50%"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("tbody", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("tr", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("td", {
    width: "250px"
  }, toto.nom, " ", toto.prenom, " ", toto.email, " ", ide), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("td", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(_check_js__WEBPACK_IMPORTED_MODULE_2__.default, {
    toto: toto,
    monCheck: monCheck,
    changeBool: changeBool
  })), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("td", null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(_croix_js__WEBPACK_IMPORTED_MODULE_1__.default, {
    toto: toto,
    monClick: function monClick() {
      return maSupp(toto.id);
    }
  })))))));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Tache);

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
0,[["./assets/app.js","runtime","vendors-node_modules_symfony_stimulus-bridge_dist_index_js-node_modules_core-js_modules_es_ar-871e39"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vfC9cXC4oanx0KXN4Iiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy5qc29uIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY29tcG9uZW50cy9wZXJzby9ham91dGVyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb21wb25lbnRzL3BlcnNvL2NoZWNrLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb21wb25lbnRzL3BlcnNvL2Nyb2l4LmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb21wb25lbnRzL3BlcnNvL2luZGV4LmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jb21wb25lbnRzL3BlcnNvL3RhY2hlLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3MiXSwibmFtZXMiOlsiUmVhY3RET00iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYXBwIiwic3RhcnRTdGltdWx1c0FwcCIsInJlcXVpcmUiLCJBam91dGVyIiwic3VyTW9uYWRkIiwidXNlU3RhdGUiLCJub20iLCJzZXRub20iLCJwcmVub20iLCJzZXRwcmVub20iLCJlbWFpbCIsInNldGVtYWlsIiwibW9uU3VibWl0IiwiZSIsInByZXZlbnREZWZhdWx0IiwidGFyZ2V0IiwidmFsdWUiLCJDaGVjayIsInRvdG8iLCJtb25DaGVjayIsImNoYW5nZUJvb2wiLCJtb25Kc29uIiwic2V0bW9uSnNvbiIsImNvbnRyYWlyZSIsImNvY2hlIiwiY29uc29sZSIsImxvZyIsImlkIiwiQ3JvaXgiLCJtb25DbGljayIsImFkcmVzc2UyIiwiYWRyZXNzZSIsIkluZGV4IiwiZmV0Y2hNb25Kc29uIiwiZmV0Y2giLCJyZXMiLCJqc29uIiwiZGF0YSIsInVzZUVmZmVjdCIsImdldE1vbkpzb24iLCJkYXRhRnJvbVNlcnZlciIsIm1hU3VwcCIsIm1ldGhvZCIsImZpbHRlciIsIm1vbkFkZCIsInRhYmxvSnNvbmV4aXN0YW50IiwiaGVhZGVycyIsImJvZHkiLCJKU09OIiwic3RyaW5naWZ5IiwidGV4dEFsaWduIiwibGVuZ3RoIiwibWFwIiwia2V5IiwiYm9vbCIsIlRhY2hlIiwiaWRlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDBJOzs7Ozs7Ozs7Ozs7Ozs7QUN0QkEsaUVBQWU7QUFDZixDQUFDLEU7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDREQsdUJBQXVCLDJCQUEyQiwyRUFBMkUsa0NBQWtDLG1CQUFtQixHQUFHLEVBQUUsT0FBTyxrQ0FBa0MsOEhBQThILEdBQUcsRUFBRSxxQkFBcUI7O0FBRWpVO0FBQ0E7O0FBRXZELGlEQUFpRCwwQ0FBMEMsMERBQTBELEVBQUU7O0FBRXZKLDJDQUEyQyxnQkFBZ0Isa0JBQWtCLE9BQU8sMkJBQTJCLHdEQUF3RCxnQ0FBZ0MsdURBQXVELDJEQUEyRCxFQUFFOztBQUUzVCw2REFBNkQsc0VBQXNFLDhEQUE4RCxvQkFBb0I7O0FBRXJOLDBDQUEwQywrREFBK0QsMkVBQTJFLEVBQUUseUVBQXlFLGVBQWUsc0RBQXNELEVBQUUsRUFBRSx1REFBdUQ7O0FBRS9YLGdDQUFnQyw0RUFBNEUsaUJBQWlCLFVBQVUsR0FBRyw4QkFBOEI7O0FBRXhLLGdDQUFnQyw2REFBNkQseUNBQXlDLDhDQUE4QyxpQ0FBaUMsbURBQW1ELHlEQUF5RCxFQUFFLE9BQU8sdUNBQXVDLEVBQUUsaURBQWlELEdBQUc7O0FBRXZhLGlEQUFpRCwwRUFBMEUsYUFBYSxFQUFFLHFDQUFxQzs7QUFFL0ssdUNBQXVDLHVCQUF1Qix1RkFBdUYsRUFBRSxhQUFhOztB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QUssRUFBQztBQUFWLEtBQW1CVCxJQUFJLENBQUNaLEdBQXhCLE9BQThCWSxJQUFJLENBQUNWLE1BQW5DLE9BQTRDVSxJQUFJLENBQUNSLEtBQWpELE9BQXlEOEMsR0FBekQsQ0FESixlQUNzRSwwRUFBSSxpREFBQyw4Q0FBRDtBQUFPLFFBQUksRUFBRXRDLElBQWI7QUFBbUIsWUFBUSxFQUFFQyxRQUE3QjtBQUF1QyxjQUFVLEVBQUVDO0FBQW5ELElBQUosQ0FEdEUsZUFDZ0osMEVBQUksaURBQUMsOENBQUQ7QUFBTyxRQUFJLEVBQUVGLElBQWI7QUFBbUIsWUFBUSxFQUFFO0FBQUEsYUFBSXVCLE1BQU0sQ0FBQ3ZCLElBQUksQ0FBQ1MsRUFBTixDQUFWO0FBQUE7QUFBN0IsSUFBSixDQURoSixDQURKLENBREosQ0FGSixDQURKLENBREo7QUFvQkgsQ0F2Q0Q7O0FBeUNBLGlFQUFlNEIsS0FBZixFOzs7Ozs7Ozs7Ozs7QUNqREEiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIG1hcCA9IHtcblx0XCIuL2hlbGxvX2NvbnRyb2xsZXIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9Ac3ltZm9ueS9zdGltdWx1cy1icmlkZ2UvbGF6eS1jb250cm9sbGVyLWxvYWRlci5qcyEuL2Fzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vYXNzZXRzL2NvbnRyb2xsZXJzIHN5bmMgcmVjdXJzaXZlIC4vbm9kZV9tb2R1bGVzL0BzeW1mb255L3N0aW11bHVzLWJyaWRnZS9sYXp5LWNvbnRyb2xsZXItbG9hZGVyLmpzISBcXFxcLihqfHQpc3g/JFwiOyIsImV4cG9ydCBkZWZhdWx0IHtcbn07IiwiZnVuY3Rpb24gX3R5cGVvZihvYmopIHsgXCJAYmFiZWwvaGVscGVycyAtIHR5cGVvZlwiOyBpZiAodHlwZW9mIFN5bWJvbCA9PT0gXCJmdW5jdGlvblwiICYmIHR5cGVvZiBTeW1ib2wuaXRlcmF0b3IgPT09IFwic3ltYm9sXCIpIHsgX3R5cGVvZiA9IGZ1bmN0aW9uIF90eXBlb2Yob2JqKSB7IHJldHVybiB0eXBlb2Ygb2JqOyB9OyB9IGVsc2UgeyBfdHlwZW9mID0gZnVuY3Rpb24gX3R5cGVvZihvYmopIHsgcmV0dXJuIG9iaiAmJiB0eXBlb2YgU3ltYm9sID09PSBcImZ1bmN0aW9uXCIgJiYgb2JqLmNvbnN0cnVjdG9yID09PSBTeW1ib2wgJiYgb2JqICE9PSBTeW1ib2wucHJvdG90eXBlID8gXCJzeW1ib2xcIiA6IHR5cGVvZiBvYmo7IH07IH0gcmV0dXJuIF90eXBlb2Yob2JqKTsgfVxuXG5pbXBvcnQgXCJjb3JlLWpzL21vZHVsZXMvZXMub2JqZWN0LmdldC1wcm90b3R5cGUtb2YuanNcIjtcbmltcG9ydCBcImNvcmUtanMvbW9kdWxlcy9lcy5vYmplY3Quc2V0LXByb3RvdHlwZS1vZi5qc1wiO1xuXG5mdW5jdGlvbiBfY2xhc3NDYWxsQ2hlY2soaW5zdGFuY2UsIENvbnN0cnVjdG9yKSB7IGlmICghKGluc3RhbmNlIGluc3RhbmNlb2YgQ29uc3RydWN0b3IpKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJDYW5ub3QgY2FsbCBhIGNsYXNzIGFzIGEgZnVuY3Rpb25cIik7IH0gfVxuXG5mdW5jdGlvbiBfZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7IGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHsgdmFyIGRlc2NyaXB0b3IgPSBwcm9wc1tpXTsgZGVzY3JpcHRvci5lbnVtZXJhYmxlID0gZGVzY3JpcHRvci5lbnVtZXJhYmxlIHx8IGZhbHNlOyBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7IGlmIChcInZhbHVlXCIgaW4gZGVzY3JpcHRvcikgZGVzY3JpcHRvci53cml0YWJsZSA9IHRydWU7IE9iamVjdC5kZWZpbmVQcm9wZXJ0eSh0YXJnZXQsIGRlc2NyaXB0b3Iua2V5LCBkZXNjcmlwdG9yKTsgfSB9XG5cbmZ1bmN0aW9uIF9jcmVhdGVDbGFzcyhDb25zdHJ1Y3RvciwgcHJvdG9Qcm9wcywgc3RhdGljUHJvcHMpIHsgaWYgKHByb3RvUHJvcHMpIF9kZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLnByb3RvdHlwZSwgcHJvdG9Qcm9wcyk7IGlmIChzdGF0aWNQcm9wcykgX2RlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykgeyBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJTdXBlciBleHByZXNzaW9uIG11c3QgZWl0aGVyIGJlIG51bGwgb3IgYSBmdW5jdGlvblwiKTsgfSBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MgJiYgc3VwZXJDbGFzcy5wcm90b3R5cGUsIHsgY29uc3RydWN0b3I6IHsgdmFsdWU6IHN1YkNsYXNzLCB3cml0YWJsZTogdHJ1ZSwgY29uZmlndXJhYmxlOiB0cnVlIH0gfSk7IGlmIChzdXBlckNsYXNzKSBfc2V0UHJvdG90eXBlT2Yoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpOyB9XG5cbmZ1bmN0aW9uIF9zZXRQcm90b3R5cGVPZihvLCBwKSB7IF9zZXRQcm90b3R5cGVPZiA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fCBmdW5jdGlvbiBfc2V0UHJvdG90eXBlT2YobywgcCkgeyBvLl9fcHJvdG9fXyA9IHA7IHJldHVybiBvOyB9OyByZXR1cm4gX3NldFByb3RvdHlwZU9mKG8sIHApOyB9XG5cbmZ1bmN0aW9uIF9jcmVhdGVTdXBlcihEZXJpdmVkKSB7IHZhciBoYXNOYXRpdmVSZWZsZWN0Q29uc3RydWN0ID0gX2lzTmF0aXZlUmVmbGVjdENvbnN0cnVjdCgpOyByZXR1cm4gZnVuY3Rpb24gX2NyZWF0ZVN1cGVySW50ZXJuYWwoKSB7IHZhciBTdXBlciA9IF9nZXRQcm90b3R5cGVPZihEZXJpdmVkKSwgcmVzdWx0OyBpZiAoaGFzTmF0aXZlUmVmbGVjdENvbnN0cnVjdCkgeyB2YXIgTmV3VGFyZ2V0ID0gX2dldFByb3RvdHlwZU9mKHRoaXMpLmNvbnN0cnVjdG9yOyByZXN1bHQgPSBSZWZsZWN0LmNvbnN0cnVjdChTdXBlciwgYXJndW1lbnRzLCBOZXdUYXJnZXQpOyB9IGVsc2UgeyByZXN1bHQgPSBTdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpOyB9IHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCByZXN1bHQpOyB9OyB9XG5cbmZ1bmN0aW9uIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHNlbGYsIGNhbGwpIHsgaWYgKGNhbGwgJiYgKF90eXBlb2YoY2FsbCkgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikpIHsgcmV0dXJuIGNhbGw7IH0gcmV0dXJuIF9hc3NlcnRUaGlzSW5pdGlhbGl6ZWQoc2VsZik7IH1cblxuZnVuY3Rpb24gX2Fzc2VydFRoaXNJbml0aWFsaXplZChzZWxmKSB7IGlmIChzZWxmID09PSB2b2lkIDApIHsgdGhyb3cgbmV3IFJlZmVyZW5jZUVycm9yKFwidGhpcyBoYXNuJ3QgYmVlbiBpbml0aWFsaXNlZCAtIHN1cGVyKCkgaGFzbid0IGJlZW4gY2FsbGVkXCIpOyB9IHJldHVybiBzZWxmOyB9XG5cbmZ1bmN0aW9uIF9pc05hdGl2ZVJlZmxlY3RDb25zdHJ1Y3QoKSB7IGlmICh0eXBlb2YgUmVmbGVjdCA9PT0gXCJ1bmRlZmluZWRcIiB8fCAhUmVmbGVjdC5jb25zdHJ1Y3QpIHJldHVybiBmYWxzZTsgaWYgKFJlZmxlY3QuY29uc3RydWN0LnNoYW0pIHJldHVybiBmYWxzZTsgaWYgKHR5cGVvZiBQcm94eSA9PT0gXCJmdW5jdGlvblwiKSByZXR1cm4gdHJ1ZTsgdHJ5IHsgRGF0ZS5wcm90b3R5cGUudG9TdHJpbmcuY2FsbChSZWZsZWN0LmNvbnN0cnVjdChEYXRlLCBbXSwgZnVuY3Rpb24gKCkge30pKTsgcmV0dXJuIHRydWU7IH0gY2F0Y2ggKGUpIHsgcmV0dXJuIGZhbHNlOyB9IH1cblxuZnVuY3Rpb24gX2dldFByb3RvdHlwZU9mKG8pIHsgX2dldFByb3RvdHlwZU9mID0gT2JqZWN0LnNldFByb3RvdHlwZU9mID8gT2JqZWN0LmdldFByb3RvdHlwZU9mIDogZnVuY3Rpb24gX2dldFByb3RvdHlwZU9mKG8pIHsgcmV0dXJuIG8uX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihvKTsgfTsgcmV0dXJuIF9nZXRQcm90b3R5cGVPZihvKTsgfVxuXG5pbXBvcnQgeyBDb250cm9sbGVyIH0gZnJvbSAnc3RpbXVsdXMnO1xuLypcbiAqIFRoaXMgaXMgYW4gZXhhbXBsZSBTdGltdWx1cyBjb250cm9sbGVyIVxuICpcbiAqIEFueSBlbGVtZW50IHdpdGggYSBkYXRhLWNvbnRyb2xsZXI9XCJoZWxsb1wiIGF0dHJpYnV0ZSB3aWxsIGNhdXNlXG4gKiB0aGlzIGNvbnRyb2xsZXIgdG8gYmUgZXhlY3V0ZWQuIFRoZSBuYW1lIFwiaGVsbG9cIiBjb21lcyBmcm9tIHRoZSBmaWxlbmFtZTpcbiAqIGhlbGxvX2NvbnRyb2xsZXIuanMgLT4gXCJoZWxsb1wiXG4gKlxuICogRGVsZXRlIHRoaXMgZmlsZSBvciBhZGFwdCBpdCBmb3IgeW91ciB1c2UhXG4gKi9cblxudmFyIF9kZWZhdWx0ID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfQ29udHJvbGxlcikge1xuICBfaW5oZXJpdHMoX2RlZmF1bHQsIF9Db250cm9sbGVyKTtcblxuICB2YXIgX3N1cGVyID0gX2NyZWF0ZVN1cGVyKF9kZWZhdWx0KTtcblxuICBmdW5jdGlvbiBfZGVmYXVsdCgpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgX2RlZmF1bHQpO1xuXG4gICAgcmV0dXJuIF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICB9XG5cbiAgX2NyZWF0ZUNsYXNzKF9kZWZhdWx0LCBbe1xuICAgIGtleTogXCJjb25uZWN0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNvbm5lY3QoKSB7XG4gICAgICB0aGlzLmVsZW1lbnQudGV4dENvbnRlbnQgPSAnSGVsbG8gU3RpbXVsdXMhIEVkaXQgbWUgaW4gYXNzZXRzL2NvbnRyb2xsZXJzL2hlbGxvX2NvbnRyb2xsZXIuanMnO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBfZGVmYXVsdDtcbn0oQ29udHJvbGxlcik7XG5cbmV4cG9ydCB7IF9kZWZhdWx0IGFzIGRlZmF1bHQgfTsiLCJpbXBvcnQgSW5kZXggZnJvbSAnLi9jb21wb25lbnRzL3BlcnNvL2luZGV4LmpzJztcclxuLy9pbXBvcnQgSGVhZGVyIGZyb20gJy4vY29tcG9uZW50cy90YWJsZWF1L0hlYWRlci5qcyc7XHJcbmltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xyXG5pbXBvcnQgJy4vYm9vdHN0cmFwJztcclxuaW1wb3J0IFJlYWN0IGZyb20gJ3JlYWN0JztcclxuaW1wb3J0IFJlYWN0RE9NIGZyb20gJ3JlYWN0LWRvbSc7XHJcblxyXG5cclxuUmVhY3RET00ucmVuZGVyKFxyXG5cclxuPEluZGV4Lz5cclxuLGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyb290JylcclxuKTsiLCJpbXBvcnQgeyBzdGFydFN0aW11bHVzQXBwIH0gZnJvbSAnQHN5bWZvbnkvc3RpbXVsdXMtYnJpZGdlJztcblxuLy8gUmVnaXN0ZXJzIFN0aW11bHVzIGNvbnRyb2xsZXJzIGZyb20gY29udHJvbGxlcnMuanNvbiBhbmQgaW4gdGhlIGNvbnRyb2xsZXJzLyBkaXJlY3RvcnlcbmV4cG9ydCBjb25zdCBhcHAgPSBzdGFydFN0aW11bHVzQXBwKHJlcXVpcmUuY29udGV4dChcbiAgICAnQHN5bWZvbnkvc3RpbXVsdXMtYnJpZGdlL2xhenktY29udHJvbGxlci1sb2FkZXIhLi9jb250cm9sbGVycycsXG4gICAgdHJ1ZSxcbiAgICAvXFwuKGp8dClzeD8kL1xuKSk7XG4iLCJpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnO1xyXG5pbXBvcnQge3VzZVN0YXRlfSBmcm9tICdyZWFjdCc7XHJcblxyXG5cclxuY29uc3QgQWpvdXRlciA9ICh7c3VyTW9uYWRkfSkgPT4ge1xyXG4gICAgY29uc3QgW25vbSwgc2V0bm9tXSA9IHVzZVN0YXRlKFwiXCIpO1xyXG4gICAgY29uc3QgW3ByZW5vbSwgc2V0cHJlbm9tXSA9IHVzZVN0YXRlKFwiXCIpO1xyXG4gICAgY29uc3QgW2VtYWlsLCBzZXRlbWFpbF0gPSB1c2VTdGF0ZShcIlwiKTtcclxuXHJcbiAgICBjb25zdCBtb25TdWJtaXQgPSAoZSkgPT4ge1xyXG4gICAgICAgIFxyXG4gICAgICAgIFxyXG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTsgXHJcbiAgICAgICAgc3VyTW9uYWRkKHtub20sIHByZW5vbSwgZW1haWx9KTtcclxuXHJcbiAgICAgICAgc2V0bm9tKCcnKVxyXG4gICAgICAgIHNldHByZW5vbSgnJylcclxuICAgICAgICBzZXRlbWFpbCgnJylcclxuICAgIH1cclxuXHJcblxyXG4gICAgcmV0dXJuIChcclxuICAgICAgICA8ZGl2PlxyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICA8Zm9ybSBvblN1Ym1pdD17bW9uU3VibWl0fT5cclxuXHJcbiAgICAgICAgICAgICAgICA8ZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxsYWJlbCBodG1sRm9yPVwibm9tXCI+Tm9tIDogPC9sYWJlbD5cclxuICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInRleHRcIiB2YWx1ZT17bm9tfSAgb25DaGFuZ2U9eyhlKT0+c2V0bm9tKGUudGFyZ2V0LnZhbHVlKX0vPjwvZGl2PlxyXG5cclxuICAgICAgICAgICAgICAgIDxkaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgPGxhYmVsIGh0bWxGb3I9XCJwcmVub21cIj5QcsOpbm9tIDogPC9sYWJlbD5cclxuICAgICAgICAgICAgICAgICAgICA8aW5wdXQgdHlwZT1cInRleHRcIiB2YWx1ZT17cHJlbm9tfSBvbkNoYW5nZT17KGUpPT5zZXRwcmVub20oZS50YXJnZXQudmFsdWUpfS8+PC9kaXY+XHJcblxyXG4gICAgICAgICAgICAgICAgPGRpdj5cclxuICAgICAgICAgICAgICAgICAgICA8bGFiZWwgaHRtbEZvcj1cImVtYWlsXCI+RW1haWwgOiA8L2xhYmVsPlxyXG4gICAgICAgICAgICAgICAgICAgIDxpbnB1dCB0eXBlPVwidGV4dFwiIHZhbHVlPXtlbWFpbH0gb25DaGFuZ2U9eyhlKT0+c2V0ZW1haWwoZS50YXJnZXQudmFsdWUpfS8+PC9kaXY+XHJcblxyXG4gICAgICAgICAgICAgICAgPGlucHV0IHR5cGU9XCJzdWJtaXRcIiB2YWx1ZT1cIkFKT1VURVJcIi8+XHJcblxyXG4gICAgICAgICAgICAgICAgPC9mb3JtPlxyXG4gICAgICAgIDwvZGl2PlxyXG4gICAgKVxyXG59XHJcblxyXG5cclxuZXhwb3J0IGRlZmF1bHQgQWpvdXRlclxyXG4iLCJpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnXHJcbmltcG9ydCB7dXNlU3RhdGV9IGZyb20gJ3JlYWN0JztcclxuXHJcbmNvbnN0IENoZWNrID0gKHt0b3RvLG1vbkNoZWNrLGNoYW5nZUJvb2x9KSA9PiB7XHJcbiAgICBcclxuICAgIGNvbnN0IFttb25Kc29uLCBzZXRtb25Kc29uXT11c2VTdGF0ZShbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBcImNvY2hlXCI6ZmFsc2VcclxuICAgICAgICB9LFxyXG4gICAgXSlcclxuXHJcbiAgICBjb25zdCBjb250cmFpcmUgPSAoY29jaGUpID0+IHtcclxuICAgIHNldG1vbkpzb24oXHJcbiAgICAgICAgPGRpdj5jb2NoZTohbW9uSnNvbi5jb2NoZTwvZGl2PlxyXG4gICAgKVxyXG5cclxuICAgIGNvbnNvbGUubG9nKGNvY2hlKVxyXG4gICAgfVxyXG5cclxuXHJcbiAgICBcclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPGRpdj5cclxuXHJcbiAgICAgICAgPGlucHV0IHR5cGU9XCJjaGVja2JveFwiIG9uQ2xpY2s9eygpPT5jaGFuZ2VCb29sKHRvdG8uaWQpfSBvbkNoYW5nZT17KCk9PmNvbnRyYWlyZSh0b3RvLmNvY2hlKX0gIGNoZWNrZWQ9e3RvdG8uY29jaGV9Lz5cclxuICAgICAgICBcclxuICAgICAgICA8L2Rpdj5cclxuICAgIClcclxuXHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IENoZWNrIiwiaW1wb3J0IFJlYWN0IGZyb20gJ3JlYWN0J1xyXG5cclxuY29uc3QgQ3JvaXggPSAoe3RvdG8sIG1vbkNsaWNrfSkgPT4ge1xyXG4gICAgXHJcblxyXG5cclxuXHJcbiAgICBcclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPGRpdj5cclxuXHJcbiAgICAgICAgPGRpdiBvbkNsaWNrPXsoKT0+e21vbkNsaWNrKCl9fT5YPC9kaXY+XHJcbiAgICAgICAgXHJcbiAgICAgICAgPC9kaXY+XHJcbiAgICApXHJcblxyXG59XHJcblxyXG5leHBvcnQgZGVmYXVsdCBDcm9peCIsImltcG9ydCBSZWFjdCBmcm9tICdyZWFjdCc7XHJcbmltcG9ydCBUYWNoZSBmcm9tICcuL3RhY2hlLmpzJ1xyXG5pbXBvcnQge3VzZVN0YXRlLCB1c2VFZmZlY3R9IGZyb20gJ3JlYWN0JztcclxuaW1wb3J0IEFqb3V0ZXIgZnJvbSAnLi9ham91dGVyLmpzJ1xyXG5cclxuXHJcbmNvbnN0IGFkcmVzc2UyID0gXCJodHRwOi8vbG9jYWxob3N0OjUwMDAvZWxldmUvXCI7XHJcbmNvbnN0IGFkcmVzc2UgPSBcImh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXRhL1wiO1xyXG5cclxuY29uc3QgSW5kZXggPSAoKSA9PiB7XHJcbi8vc3VwZXIgcmFjY291cmNpIDogcmFmYyBcclxuXHJcbiAgICAvLzEgTcOpdGhvZGUgcGVybWV0dGFudCBkZSByw6ljdXDDqXJlciBsZXMgdMOiY2hlcyBzdXIgbGUgc2VydmV1clxyXG4gICAgY29uc3QgZmV0Y2hNb25Kc29uID0gYXN5bmMoKSA9PiB7XHJcbiAgICAgICAgY29uc3QgcmVzID0gYXdhaXQgZmV0Y2goYWRyZXNzZSlcclxuICAgICAgICBjb25zdCBkYXRhID0gYXdhaXQgcmVzLmpzb24oKVxyXG4gICAgICAgIHJldHVybiBkYXRhXHJcbiAgICB9XHJcblxyXG4gICAgLy8yXHJcbiAgICBjb25zdCBbbW9uSnNvbiwgc2V0bW9uSnNvbl09dXNlU3RhdGUoW10pO1xyXG5cclxuICAgIC8vM1xyXG4gICAgdXNlRWZmZWN0KCgpPT4ge1xyXG4gICAgICAgICAgICAvL2plIHLDqWN1cMOocmUgbWEgcsOpcG9uc2UgYXN5bmNocm9uZVxyXG4gICAgICAgICAgICBjb25zdCBnZXRNb25Kc29uID0gYXN5bmMoKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zdCBkYXRhRnJvbVNlcnZlciA9IGF3YWl0IGZldGNoTW9uSnNvbigpO1xyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAvL01pc2Ugw6Agam91ciBkdSBTdGF0ZVxyXG4gICAgICAgICAgICAgICAgc2V0bW9uSnNvbihkYXRhRnJvbVNlcnZlcilcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIGdldE1vbkpzb24oKVxyXG4gICAgICAgIH0sIFtdKVxyXG4gICAgICAgIC8vTm91cyBtZXR0b25zIHVuIGFycmF5IHZpZGUgcG91ciBxdWUgUmVhY3QgbmUgcmVmYXNzZSB1biBmZXRjaFxyXG4gICAgICAgIC8vIHF1ZSBzaSBsZSByZW5kZXIgYSBjaGFuZ8OpIHN1ciBsYSBwYWdlXHJcblxyXG5cclxuXHJcbiAgICAvLzQgU3VwcHJpbWVyIHVlbiB0w6JjaGUgc3VyIGxlIHNlcnZldXJcclxuICAgIGNvbnN0IG1hU3VwcCA9IGFzeW5jIChpZCkgPT4ge1xyXG4gICAgICAgIGF3YWl0IGZldGNoKGFkcmVzc2UgKyBgJHtpZH1gLCB7XHJcbiAgICAgICAgICAgIG1ldGhvZDpcIkRFTEVURVwiXHJcbiAgICAgICAgfSlcclxuICAgICAgICBzZXRtb25Kc29uKFxyXG4gICAgICAgICAgICBtb25Kc29uLmZpbHRlcihcclxuICAgICAgICAgICAgICAgICh0b3RvKSA9PiB0b3RvLmlkICE9PSBpZFxyXG4gICAgICAgICAgICApXHJcbiAgICAgICAgKVxyXG4gICAgfVxyXG5cclxuICAgIGNvbnN0IG1vbkFkZCA9IGFzeW5jICh0YWJsb0pzb25leGlzdGFudCkgPT4ge1xyXG4gICAgICAgIFxyXG4gICAgICAgIC8vQWpvdXQgZCd1bmUgdMOiY2hlIHN1ciBsZSBzZXJ2ZXVyXHJcbiAgICAgICAgXHJcbiAgICAgICAgY29uc3QgcmVzID0gYXdhaXQgZmV0Y2goYWRyZXNzZSwge1xyXG4gICAgICAgICAgICBtZXRob2Q6XCJQT1NUXCIsXHJcbiAgICAgICAgICAgIGhlYWRlcnM6e1xyXG4gICAgICAgICAgICAgICAgJ0NvbnRlbnQtdHlwZScgOiAnYXBwbGljYXRpb24vanNvbicsXHJcbiAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgfSwgXHJcblxyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgYm9keTogSlNPTi5zdHJpbmdpZnkodGFibG9Kc29uZXhpc3RhbnQpXHJcbiAgICAgICAgfSlcclxuICAgICAgICAgICAgY29uc3QgZGF0YSA9IGF3YWl0IHJlcy5qc29uKClcclxuICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcblxyXG4gICAgICAgIC8vSmUgbW9kaWZpZSBsZSBzdGF0ZSBhdmVjIGxhIGxpc3RlIGFjdHVlbGxlIHBsdXMgbGEgdMOiY2hlIGFqb3V0w6llXHJcbiAgICAgICAgc2V0bW9uSnNvbihcclxuICAgICAgICAgICAgWy4uLm1vbkpzb24sIGRhdGFdKVxyXG4gICAgfVxyXG5cclxuICAgIC8qXHJcblxyXG4gICAgY29uc3QgcGx1c2kgPSAodG90bykgPT4ge1xyXG4gICAgICAgIHJldHVybihcclxuICAgICAgICAgICAgPFRhY2hlIHRhY2hlPXt0b3RvLnRhY2hlfSBpZD17dG90by5pZH0vPlxyXG4gICAgICAgIClcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBtYU1vZCA9IChpZCkgPT4ge1xyXG4gICAgICAgIHNldG1vbkpzb24oXHJcbiAgICAgICAgICAgIG1vbkpzb24uZmlsdGVyKFxyXG4gICAgICAgICAgICAgICAgKHRvdG8pPT4odG90by5pZCE9aWQpXHJcbiAgICAgICAgICAgIClcclxuICAgICAgICApXHJcbiAgICB9XHJcblxyXG4gICAgY29uc3QgY2hhbmdlQm9vbCA9IChpZCkgPT4ge1xyXG4gICAgICAgIHNldG1vbkpzb24oXHJcbiAgICAgICAgICAgIG1vbkpzb24ubWFwKFxyXG4gICAgICAgICAgICAgICAgKHRvdG8pPT5cclxuICAgICAgICAgICAgICAgICh0b3RvLmlkPT09aWQgPyB7Li4udG90byxjb2NoZTohdG90by5jb2NoZX06dG90bylcclxuICAgICAgICAgICAgKVxyXG4gICAgICAgIClcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBtb25BZGQyID0gKHJ0YWNoZSkgPT4ge1xyXG4gICAgICAgIGNvbnN0IGlkID0gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogMTAwMDAwKSArIDRcclxuICAgICAgICBjb25zdCBuZXdUYWNoZSA9IHtpZCwuLi5ydGFjaGV9XHJcbiAgICAgICAgc2V0bW9uSnNvbihcclxuICAgICAgICAgICAgWy4uLm1vbkpzb24sIG5ld1RhY2hlXVxyXG4gICAgICAgIClcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBtb25Bam91dCA9IChlKSA9PiB7XHJcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdDtcclxuICAgICAgICBsZXQgcGx1cyA9IGUudGFyZ2V0LnZhbHVlO1xyXG4gICAgICAgIHNldG1vbkpzb24oXHJcbiAgICAgICAgICAgIG1vbkpzb24uZmlsdGVyKCh0b3RvKT0+KFsuLi50b3RvLHBsdXNdKSlcclxuICAgICAgICApXHJcbiAgICB9XHJcbiovXHJcbiAgICBcclxuXHJcbnJldHVybihcclxuXHJcbiAgICA8ZGl2PlxyXG4gICAgICAgIDxkaXYgc3R5bGU9e3t0ZXh0QWxpZ246XCJjZW50ZXJcIn19IGNsYXNzTmFtZT1cImNhcnJlXCI+XHJcblxyXG4gICAgICAgICAgICA8ZGl2PlxyXG4gICAgICAgICAgICAgICAgPEFqb3V0ZXIgc3VyTW9uYWRkPXttb25BZGR9Lz5cclxuICAgICAgICAgICAgPC9kaXY+XHJcblxyXG5cclxuICAgICAgICAgICAge21vbkpzb24ubGVuZ3RoPjAgPyAgPGRpdj5cclxuICAgICAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIG1vbkpzb24ubWFwKCh0b3RvLCBrZXkpPT4oXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBrZXk9e3RvdG8uaWR9PjxUYWNoZSBpZGU9e3RvdG8uaWR9IHRvdG89e3RvdG99IG1hU3VwcD17bWFTdXBwfSAvPjwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICkpXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICA6IFwidGFibGVhdSB2aWRlXCJ9XHJcblxyXG4gICAgICAgIDwvZGl2PlxyXG5cclxuICAgIDwvZGl2PlxyXG4pXHJcblxyXG59XHJcblxyXG5leHBvcnQgZGVmYXVsdCBJbmRleCIsImltcG9ydCBSZWFjdCBmcm9tICdyZWFjdCc7XHJcbmltcG9ydCBDcm9peCBmcm9tICcuL2Nyb2l4LmpzJ1xyXG5pbXBvcnQgQ2hlY2sgZnJvbSAnLi9jaGVjay5qcydcclxuXHJcblxyXG5cclxubGV0IGJvb2w7XHJcblxyXG5jb25zdCBUYWNoZSA9ICh7dG90bywgbWFTdXBwLGNoYW5nZUJvb2wsIGlkZX0pID0+IHtcclxuXHJcbiAgICBjb25zdCBtb25DaGVjayA9ICgpID0+IHtcclxuICAgICAgICBjb25zb2xlLmxvZyhcImNsaXF1w6lcIik7XHJcbiAgICAgICAgY29uc29sZS5sb2codG90by5pZCk7XHJcbiAgICB9XHJcblxyXG5cclxuICAgIC8qXHJcbiAgICBjb25zdCBtb25TdHlsZSA9ICgpID0+IHtcclxuICAgICAgICBpZiAodG90by5jb2NoZSkge1xyXG4gICAgICAgICAgICByZXR1cm4ge2JvcmRlckxlZnQ6XCIzcHggc29saWQgcmVkXCJ9O1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuICAgICovXHJcblxyXG5cclxuXHJcblxyXG4gICAgcmV0dXJuIChcclxuICAgICAgICA8ZGl2PlxyXG4gICAgICAgICAgICA8dGFibGUgYm9yZGVyPVwiMVwiIHdpZHRoPVwiNTAlXCI+XHJcbiAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIDx0Ym9keT5cclxuICAgICAgICAgICAgICAgICAgICA8dHI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDw+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8dGQgd2lkdGg9XCIyNTBweFwiPnt0b3RvLm5vbX0ge3RvdG8ucHJlbm9tfSB7dG90by5lbWFpbH0ge2lkZX08L3RkPjx0ZD48Q2hlY2sgdG90bz17dG90b30gbW9uQ2hlY2s9e21vbkNoZWNrfSBjaGFuZ2VCb29sPXtjaGFuZ2VCb29sfSAvPjwvdGQ+PHRkPjxDcm9peCB0b3RvPXt0b3RvfSBtb25DbGljaz17KCk9Pm1hU3VwcCh0b3RvLmlkKX0gLz48L3RkPlxyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC8+XHJcbiAgICAgICAgICAgICAgICAgICAgPC90cj5cclxuICAgICAgICAgICAgICAgIDwvdGJvZHk+XHJcblxyXG4gICAgICAgICAgICA8L3RhYmxlPlxyXG5cclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgIDwvZGl2PlxyXG4gICAgKVxyXG5cclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgVGFjaGUiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwic291cmNlUm9vdCI6IiJ9