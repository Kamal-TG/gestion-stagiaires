!/**
 * Highcharts JS v12.0.2 (2024-12-04)
 * @module highcharts/modules/series-on-point
 * @requires highcharts
 *
 * Series on point module
 *
 * (c) 2010-2024 Highsoft AS
 * Author: Rafal Sebestjanski and Piotr Madej
 *
 * License: www.highcharts.com/license
 */function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e(require("highcharts"),require("highcharts").Point,require("highcharts").Series,require("highcharts").SeriesRegistry,require("highcharts").SVGRenderer):"function"==typeof define&&define.amd?define("highcharts/modules/series-on-point",[["highcharts/highcharts"],["highcharts/highcharts","Point"],["highcharts/highcharts","Series"],["highcharts/highcharts","SeriesRegistry"],["highcharts/highcharts","SVGRenderer"]],e):"object"==typeof exports?exports["highcharts/modules/series-on-point"]=e(require("highcharts"),require("highcharts").Point,require("highcharts").Series,require("highcharts").SeriesRegistry,require("highcharts").SVGRenderer):t.Highcharts=e(t.Highcharts,t.Highcharts.Point,t.Highcharts.Series,t.Highcharts.SeriesRegistry,t.Highcharts.SVGRenderer)}(this,function(t,e,i,o,r){return function(){"use strict";var n,s,h,a={260:function(t){t.exports=e},540:function(t){t.exports=r},820:function(t){t.exports=i},512:function(t){t.exports=o},944:function(e){e.exports=t}},u={};function c(t){var e=u[t];if(void 0!==e)return e.exports;var i=u[t]={exports:{}};return a[t](i,i.exports,c),i.exports}c.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return c.d(e,{a:e}),e},c.d=function(t,e){for(var i in e)c.o(e,i)&&!c.o(t,i)&&Object.defineProperty(t,i,{enumerable:!0,get:e[i]})},c.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)};var p={};c.d(p,{default:function(){return X}});var f=c(944),d=/*#__PURE__*/c.n(f),l=d().fireEvent,g=d().isArray,v=d().objectEach,y=d().uniqueKey,m=function(){function t(t){void 0===t&&(t={});var e=this;this.autoId=!t.id,this.columns={},this.id=t.id||y(),this.modified=this,this.rowCount=0,this.versionTag=y();var i=0;v(t.columns||{},function(t,o){e.columns[o]=t.slice(),i=Math.max(i,t.length)}),this.applyRowCount(i)}return t.prototype.applyRowCount=function(t){this.rowCount=t,v(this.columns,function(e){g(e)&&(e.length=t)})},t.prototype.getColumn=function(t,e){return this.columns[t]},t.prototype.getColumns=function(t,e){var i=this;return(t||Object.keys(this.columns)).reduce(function(t,e){return t[e]=i.columns[e],t},{})},t.prototype.getRow=function(t,e){var i=this;return(e||Object.keys(this.columns)).map(function(e){var o;return null===(o=i.columns[e])||void 0===o?void 0:o[t]})},t.prototype.setColumn=function(t,e,i,o){var r;void 0===e&&(e=[]),void 0===i&&(i=0),this.setColumns(((r={})[t]=e,r),i,o)},t.prototype.setColumns=function(t,e,i){var o=this,r=this.rowCount;v(t,function(t,e){o.columns[e]=t.slice(),r=t.length}),this.applyRowCount(r),(null==i?void 0:i.silent)||(l(this,"afterSetColumns"),this.versionTag=y())},t.prototype.setRow=function(t,e,i,o){void 0===e&&(e=this.rowCount);var r=this.columns,n=i?this.rowCount+1:e+1;v(t,function(t,s){var h=r[s]||(null==o?void 0:o.addColumns)!==!1&&Array(n);h&&(i?h.splice(e,0,t):h[e]=t,r[s]=h)}),n>this.rowCount&&this.applyRowCount(n),(null==o?void 0:o.silent)||(l(this,"afterSetRows"),this.versionTag=y())},t}(),C=c(260),b=/*#__PURE__*/c.n(C);c(820);var x=c(512),P=/*#__PURE__*/c.n(x),R=c(540),w=/*#__PURE__*/c.n(R),S=d().composed,q=P().seriesTypes.bubble,E=d().addEvent,G=d().defined,A=d().find,O=d().isNumber,j=d().pushUnique;(n=h||(h={})).compose=function(t,e){if(j(S,"SeriesOnPoint")){var i=s.prototype,o=i.chartGetZData,r=i.seriesAfterInit,n=i.seriesAfterRender,h=i.seriesGetCenter,a=i.seriesShowOrHide,u=i.seriesTranslate;t.types.pie.prototype.onPointSupported=!0,E(t,"afterInit",r),E(t,"afterRender",n),E(t,"afterGetCenter",h),E(t,"hide",a),E(t,"show",a),E(t,"translate",u),E(e,"beforeRender",o),E(e,"beforeRedraw",o)}return t},s=function(){function t(t){this.getColumn=q.prototype.getColumn,this.getRadii=q.prototype.getRadii,this.getRadius=q.prototype.getRadius,this.getPxExtremes=q.prototype.getPxExtremes,this.getZExtremes=q.prototype.getZExtremes,this.chart=t.chart,this.series=t,this.options=t.options.onPoint}return t.prototype.drawConnector=function(){this.connector||(this.connector=this.series.chart.renderer.path().addClass("highcharts-connector-seriesonpoint").attr({zIndex:-1}).add(this.series.markerGroup));var t=this.getConnectorAttributes();t&&this.connector.animate(t)},t.prototype.getConnectorAttributes=function(){var t=this.series.chart,e=this.options;if(e){var i=e.connectorOptions||{},o=e.position,r=t.get(e.id);if(r instanceof b()&&o&&G(r.plotX)&&G(r.plotY)){var n=G(o.x)?o.x:r.plotX,s=G(o.y)?o.y:r.plotY,h=n+(o.offsetX||0),a=s+(o.offsetY||0),u=i.width||1,c=i.stroke||this.series.color,p=i.dashstyle,f={d:w().prototype.crispLine([["M",n,s],["L",h,a]],u),"stroke-width":u};return t.styledMode||(f.stroke=c,f.dashstyle=p),f}}},t.prototype.seriesAfterInit=function(){this.onPointSupported&&this.options.onPoint&&(this.bubblePadding=!0,this.useMapGeometry=!0,this.onPoint=new t(this))},t.prototype.seriesAfterRender=function(){delete this.chart.bubbleZExtremes,this.onPoint&&this.onPoint.drawConnector()},t.prototype.seriesGetCenter=function(t){var e=this.options.onPoint,i=t.positions;if(e){var o=this.chart.get(e.id);o instanceof b()&&G(o.plotX)&&G(o.plotY)&&(i[0]=o.plotX,i[1]=o.plotY);var r=e.position;r&&(G(r.x)&&(i[0]=r.x),G(r.y)&&(i[1]=r.y),r.offsetX&&(i[0]+=r.offsetX),r.offsetY&&(i[1]+=r.offsetY))}var n=this.radii&&this.radii[this.index];O(n)&&(i[2]=2*n),t.positions=i},t.prototype.seriesShowOrHide=function(){var t,e=this.chart.series;null===(t=this.points)||void 0===t||t.forEach(function(t){var i=A(e,function(e){var i=((e.onPoint||{}).options||{}).id;return!!i&&i===t.id});i&&i.setVisible(!i.visible,!1)})},t.prototype.seriesTranslate=function(){this.onPoint&&(this.onPoint.getRadii(),this.radii=this.onPoint.radii)},t.prototype.chartGetZData=function(){var t=[];this.series.forEach(function(e){var i,o=e.options.onPoint;t.push(null!==(i=null==o?void 0:o.z)&&void 0!==i?i:null)});var e=new m({columns:{z:t}});this.series.forEach(function(t){t.onPoint&&(t.onPoint.dataTable=t.dataTable=e)})},t}(),n.Additions=s;var H=h,T=d();H.compose(T.Series,T.Chart);var X=d();return p.default}()});