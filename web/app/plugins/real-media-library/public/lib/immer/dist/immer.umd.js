var e,r;e=this,r=function(e){"use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n="undefined"!=typeof Symbol?Symbol("immer-proxy-state"):"__$immer_state",t="An immer producer returned a new value *and* modified its draft. Either return a new value *or* modify the draft.";var o=!("undefined"!=typeof process&&"production"===process.env.NODE_ENV||"verifyMinified"!==function(){}.name),i="undefined"!=typeof Proxy;function f(e){return!!e&&!!e[n]}function u(e){if(!e)return!1;if("object"!==(void 0===e?"undefined":r(e)))return!1;if(Array.isArray(e))return!0;var n=Object.getPrototypeOf(e);return null===n||n===Object.prototype}function a(e){return o&&Object.freeze(e),e}function c(e){return Array.isArray(e)?e.slice():void 0===e.__proto__?Object.assign(Object.create(null),e):Object.assign({},e)}function s(e,r){if(Array.isArray(e))for(var n=0;n<e.length;n++)r(n,e[n]);else for(var t in e)r(t,e[t])}function d(e,r){return Object.prototype.hasOwnProperty.call(e,r)}function p(e){if(f(e)){var r=e[n];return!0===r.modified?!0===r.finalized?r.copy:(r.finalized=!0,t=i?r.copy:r.copy=c(e),o=r.base,s(t,function(e,r){r!==o[e]&&(t[e]=p(r))}),a(t)):r.base}var t,o;return function e(r){if(!u(r))return;if(Object.isFrozen(r))return;s(r,function(n,t){f(t)?r[n]=p(t):e(t)});a(r)}(e),e}function y(e,r){return e===r?0!==e||1/e==1/r:e!=e&&r!=r}var l=null,b={get:function(e,r){if(r===n)return e;if(e.modified){var t=e.copy[r];return t===e.base[r]&&u(t)?e.copy[r]=g(e,t):t}if(d(e.proxies,r))return e.proxies[r];var o=e.base[r];return!f(o)&&u(o)?e.proxies[r]=g(e,o):o},has:function(e,r){return r in m(e)},ownKeys:function(e){return Reflect.ownKeys(m(e))},set:function(e,r,n){if(!e.modified){if(r in e.base&&y(e.base[r],n)||d(e.proxies,r)&&e.proxies[r]===n)return!0;h(e)}return e.copy[r]=n,!0},deleteProperty:function(e,r){return h(e),delete e.copy[r],!0},getOwnPropertyDescriptor:function(e,r){var n=e.modified?e.copy:d(e.proxies,r)?e.proxies:e.base,t=Reflect.getOwnPropertyDescriptor(n,r);!t||Array.isArray(n)&&"length"===r||(t.configurable=!0);return t},defineProperty:function(){throw new Error("Immer does currently not support defining properties on draft objects")},setPrototypeOf:function(){throw new Error("Don't even try this...")}},v={};function m(e){return!0===e.modified?e.copy:e.base}function h(e){e.modified||(e.modified=!0,e.copy=c(e.base),Object.assign(e.copy,e.proxies),e.parent&&h(e.parent))}function g(e,r){var n={modified:!1,finalized:!1,parent:e,base:r,copy:void 0,proxies:{}},t=Array.isArray(r)?Proxy.revocable([n],v):Proxy.revocable(n,b);return l.push(t),t.proxy}s(b,function(e,r){v[e]=function(){return arguments[0]=arguments[0][0],r.apply(this,arguments)}});var w={},j=null;function O(e){return e.hasCopy?e.copy:e.base}function x(e){e.modified||(e.modified=!0,e.parent&&x(e.parent))}function P(e){e.hasCopy||(e.hasCopy=!0,e.copy=c(e.base))}function A(e,r){var t=c(r);s(r,function(e){var r;Object.defineProperty(t,""+e,w[r=""+e]||(w[r]={configurable:!0,enumerable:!0,get:function(){return function(e,r){E(e);var n=O(e)[r];return!e.finalizing&&n===e.base[r]&&u(n)?(P(e),e.copy[r]=A(e,n)):n}(this[n],r)},set:function(e){!function(e,r,n){if(E(e),!e.modified){if(y(O(e)[r],n))return;x(e),P(e)}e.copy[r]=n}(this[n],r,e)}}))});var o,i,f,a={modified:!1,hasCopy:!1,parent:e,base:r,proxy:t,copy:void 0,finished:!1,finalizing:!1,finalized:!1};return o=t,i=n,f=a,Object.defineProperty(o,i,{value:f,enumerable:!1,writable:!0}),j.push(a),t}function E(e){if(!0===e.finished)throw new Error("Cannot use a proxy that has been revoked. Did you pass an object from inside an immer function to an async process?")}function z(e){var r=e.proxy;if(r.length!==e.base.length)return!0;var n=Object.getOwnPropertyDescriptor(r,r.length-1);return!(!n||n.get)}function _(e,o){var i=j;j=[];try{var f=A(void 0,e),u=o.call(f,f);s(j,function(e,r){r.finalizing=!0}),function(){for(var e=j.length-1;e>=0;e--){var n=j[e];!1===n.modified&&(Array.isArray(n.base)?z(n)&&x(n):(t=n,o=Object.keys(t.base),i=Object.keys(t.proxy),function(e,n){if(y(e,n))return!0;if("object"!==(void 0===e?"undefined":r(e))||null===e||"object"!==(void 0===n?"undefined":r(n))||null===n)return!1;var t=Object.keys(e),o=Object.keys(n);if(t.length!==o.length)return!1;for(var i=0;i<t.length;i++)if(!hasOwnProperty.call(n,t[i])||!y(e[t[i]],n[t[i]]))return!1;return!0}(o,i)||x(n)))}var t,o,i}();var a=void 0;if(void 0!==u&&u!==f){if(f[n].modified)throw new Error(t);a=p(u)}else a=p(f);return s(j,function(e,r){r.finished=!0}),a}finally{j=i}}e.default=function e(o,f){if(1!==arguments.length&&2!==arguments.length)throw new Error("produce expects 1 or 2 arguments, got "+arguments.length);if("function"==typeof o){if("function"==typeof f)throw new Error("if first argument is a function (curried invocation), the second argument to produce cannot be a function");var a=f,c=o;return function(){var r=arguments;return e(void 0===r[0]&&void 0!==a?a:r[0],function(e){return r[0]=e,c.apply(e,r)})}}if("function"!=typeof f)throw new Error("if first argument is not a function, the second argument to produce should be a function");if("object"!==(void 0===o?"undefined":r(o))||null===o)return f(o);if(!u(o))throw new Error("the first argument to an immer producer should be a primitive, plain object or array, got "+(void 0===o?"undefined":r(o))+': "'+o+'"');return i?function(e,r){var o=l;l=[];try{var i=g(void 0,e),f=r.call(i,i),u=void 0;if(void 0!==f&&f!==i){if(i[n].modified)throw new Error(t);u=p(f)}else u=p(i);return s(l,function(e,r){return r.revoke()}),u}finally{l=o}}(o,f):_(o,f)},e.setAutoFreeze=function(e){o=e},e.setUseProxies=function(e){i=e},Object.defineProperty(e,"__esModule",{value:!0})},"object"==typeof exports&&"undefined"!=typeof module?r(exports):"function"==typeof define&&define.amd?define(["exports"],r):r(e.immer={});
//# sourceMappingURL=immer.umd.js.map