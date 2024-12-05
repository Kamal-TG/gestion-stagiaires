!/**
 * Highstock JS v12.0.2 (2024-12-04)
 * @module highcharts/indicators/obv
 * @requires highcharts
 * @requires highcharts/modules/stock
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2024 Karol Kolodziej
 *
 * License: www.highcharts.com/license
 */function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t(require("highcharts"),require("highcharts").SeriesRegistry):"function"==typeof define&&define.amd?define("highcharts/indicators/obv",[["highcharts/highcharts"],["highcharts/highcharts","SeriesRegistry"]],t):"object"==typeof exports?exports["highcharts/indicators/obv"]=t(require("highcharts"),require("highcharts").SeriesRegistry):e.Highcharts=t(e.Highcharts,e.Highcharts.SeriesRegistry)}(this,function(e,t){return function(){"use strict";var r,o={512:function(e){e.exports=t},944:function(t){t.exports=e}},n={};function i(e){var t=n[e];if(void 0!==t)return t.exports;var r=n[e]={exports:{}};return o[e](r,r.exports,i),r.exports}i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,{a:t}),t},i.d=function(e,t){for(var r in t)i.o(t,r)&&!i.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)};var s={};i.d(s,{default:function(){return m}});var u=i(944),a=/*#__PURE__*/i.n(u),c=i(512),h=/*#__PURE__*/i.n(c),p=(r=function(e,t){return(r=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(e,t){e.__proto__=t}||function(e,t){for(var r in t)t.hasOwnProperty(r)&&(e[r]=t[r])})(e,t)},function(e,t){function o(){this.constructor=e}r(e,t),e.prototype=null===t?Object.create(t):(o.prototype=t.prototype,new o)}),f=h().seriesTypes.sma,l=a().isNumber,d=a().error,y=a().extend,g=a().merge,v=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return p(t,e),t.prototype.getValues=function(e,t){var r,o=e.chart.get(t.volumeSeriesID),n=e.xData,i=e.yData,s=[],u=[],a=[],c=!l(i[0]),h=[],p=1,f=0,y=0,g=0,v=0;if(o)for(r=o.getColumn("y"),h=[n[0],f],g=c?i[0][3]:i[0],s.push(h),u.push(n[0]),a.push(h[1]);p<i.length;p++)y=(v=c?i[p][3]:i[p])>g?f+r[p]:v===g?f:f-r[p],h=[n[p],y],f=y,g=v,s.push(h),u.push(n[p]),a.push(h[1]);else{d("Series "+t.volumeSeriesID+" not found! Check `volumeSeriesID`.",!0,e.chart);return}return{values:s,xData:u,yData:a}},t.defaultOptions=g(f.defaultOptions,{marker:{enabled:!1},params:{index:void 0,period:void 0,volumeSeriesID:"volume"},tooltip:{valueDecimals:0}}),t}(f);y(v.prototype,{nameComponents:void 0}),h().registerSeriesType("obv",v);var m=a();return s.default}()});