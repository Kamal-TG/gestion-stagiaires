!/**
 * Highstock JS v12.0.2 (2024-12-04)
 * @module highcharts/indicators/psar
 * @requires highcharts
 * @requires highcharts/modules/stock
 *
 * Parabolic SAR Indicator for Highcharts Stock
 *
 * (c) 2010-2024 Grzegorz Blachliński
 *
 * License: www.highcharts.com/license
 */function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e(require("highcharts"),require("highcharts").SeriesRegistry):"function"==typeof define&&define.amd?define("highcharts/indicators/psar",[["highcharts/highcharts"],["highcharts/highcharts","SeriesRegistry"]],e):"object"==typeof exports?exports["highcharts/indicators/psar"]=e(require("highcharts"),require("highcharts").SeriesRegistry):t.Highcharts=e(t.Highcharts,t.Highcharts.SeriesRegistry)}(this,function(t,e){return function(){"use strict";var r,n={512:function(t){t.exports=e},944:function(e){e.exports=t}},i={};function o(t){var e=i[t];if(void 0!==e)return e.exports;var r=i[t]={exports:{}};return n[t](r,r.exports,o),r.exports}o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,{a:e}),e},o.d=function(t,e){for(var r in e)o.o(e,r)&&!o.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)};var a={};o.d(a,{default:function(){return y}});var c=o(944),s=/*#__PURE__*/o.n(c),u=o(512),h=/*#__PURE__*/o.n(u),l=(r=function(t,e){return(r=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var r in e)e.hasOwnProperty(r)&&(t[r]=e[r])})(t,e)},function(t,e){function n(){this.constructor=t}r(t,e),t.prototype=null===e?Object.create(e):(n.prototype=e.prototype,new n)}),p=h().seriesTypes.sma,f=s().merge;function d(t,e){return parseFloat(t.toFixed(e))}var g=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.nameComponents=void 0,e}return l(e,t),e.prototype.getValues=function(t,e){var r,n,i,o,a,c,s,u,h,l,p,f,g,y,m,x,v,_,b,O,F,j,A,M,P,S=t.xData,q=t.yData,D=e.maxAccelerationFactor,R=e.increment,w=e.initialAccelerationFactor,H=e.decimals,T=e.index,W=[],k=[],C=[],V=e.initialAccelerationFactor,z=q[0][1],B=1,E=q[0][2];if(!(T>=q.length)){for(P=0;P<T;P++)z=Math.max(q[P][1],z),E=Math.min(q[P][2],d(E,H));for(y=q[P][1]>E?1:-1,m=z-E,x=(V=e.initialAccelerationFactor)*m,W.push([S[T],E]),k.push(S[T]),C.push(d(E,H)),P=T+1;P<q.length;P++)_=q[P-1][2],b=q[P-2][2],O=q[P-1][1],F=q[P-2][1],A=q[P][1],M=q[P][2],null!==b&&null!==F&&null!==_&&null!==O&&null!==A&&null!==M&&(r=y,n=B,i=E,o=x,a=z,E=r===n?1===r?i+o<Math.min(b,_)?i+o:Math.min(b,_):i+o>Math.max(F,O)?i+o:Math.max(F,O):a,l=y,p=z,j=1===l?A>p?A:p:M<p?M:p,f=B,g=E,c=v=1===f&&M>g||-1===f&&A>g?1:-1,s=y,u=z,h=V,x=(V=c===s?1===c&&j>u||-1===c&&j<u?h===D?D:d(h+R,2):h:w)*(m=j-E),W.push([S[P],d(E,H)]),k.push(S[P]),C.push(d(E,H)),B=y,y=v,z=j);return{values:W,xData:k,yData:C}}},e.defaultOptions=f(p.defaultOptions,{lineWidth:0,marker:{enabled:!0},states:{hover:{lineWidthPlus:0}},params:{period:void 0,initialAccelerationFactor:.02,maxAccelerationFactor:.2,increment:.02,index:2,decimals:4}}),e}(p);h().registerSeriesType("psar",g);var y=s();return a.default}()});