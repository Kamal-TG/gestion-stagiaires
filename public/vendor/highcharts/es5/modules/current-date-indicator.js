!/**
 * Highcharts Gantt JS v12.0.2 (2024-12-04)
 * @module highcharts/modules/current-date-indicator
 * @requires highcharts
 *
 * CurrentDateIndicator
 *
 * (c) 2010-2024 Lars A. V. Cabrera
 *
 * License: www.highcharts.com/license
 */function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e(require("highcharts")):"function"==typeof define&&define.amd?define("highcharts/modules/current-date-indicator",[["highcharts/highcharts"]],e):"object"==typeof exports?exports["highcharts/modules/current-date-indicator"]=e(require("highcharts")):t.Highcharts=e(t.Highcharts)}(this,function(t){return function(){"use strict";var e={944:function(e){e.exports=t}},r={};function o(t){var n=r[t];if(void 0!==n)return n.exports;var a=r[t]={exports:{}};return e[t](a,a.exports,o),a.exports}o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,{a:e}),e},o.d=function(t,e){for(var r in e)o.o(e,r)&&!o.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)};var n={};o.d(n,{default:function(){return v}});var a=o(944),i=/*#__PURE__*/o.n(a),c=i().composed,s=i().addEvent,u=i().merge,l=i().pushUnique,f=i().wrap,h={color:"#ccd3ff",width:2,label:{format:"%[abdYHM]",formatter:function(t,e){return this.axis.chart.time.dateFormat(e||"",t,!0)},rotation:0,style:{fontSize:"0.7em"}}};function d(){var t=this.options,e=t.currentDateIndicator;if(e){var r="object"==typeof e?u(h,e):u(h);r.value=Date.now(),r.className="highcharts-current-date-indicator",t.plotLines||(t.plotLines=[]),t.plotLines.push(r)}}function p(){this.label&&this.label.attr({text:this.getLabelText(this.options.label)})}function m(t,e){var r=this.options;return r&&r.className&&-1!==r.className.indexOf("highcharts-current-date-indicator")&&r.label&&"function"==typeof r.label.formatter?(r.value=Date.now(),r.label.formatter.call(this,r.value,r.label.format)):t.call(this,e)}var b=i();({compose:function(t,e){l(c,"CurrentDateIndication")&&(s(t,"afterSetOptions",d),s(e,"render",p),f(e.prototype,"getLabelText",m))}}).compose(b.Axis,b.PlotLineOrBand);var v=i();return n.default}()});