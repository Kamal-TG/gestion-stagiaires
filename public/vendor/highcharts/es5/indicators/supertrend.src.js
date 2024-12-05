/**
 * @license Highstock JS v12.0.2 (2024-12-04)
 * @module highcharts/indicators/supertrend
 * @requires highcharts
 * @requires highcharts/modules/stock
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2024 Wojciech Chmiel
 *
 * License: www.highcharts.com/license
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory(require("highcharts"), require("highcharts")["SeriesRegistry"]);
	else if(typeof define === 'function' && define.amd)
		define("highcharts/indicators/supertrend", [["highcharts/highcharts"], ["highcharts/highcharts","SeriesRegistry"]], factory);
	else if(typeof exports === 'object')
		exports["highcharts/indicators/supertrend"] = factory(require("highcharts"), require("highcharts")["SeriesRegistry"]);
	else
		root["Highcharts"] = factory(root["Highcharts"], root["Highcharts"]["SeriesRegistry"]);
})(this, function(__WEBPACK_EXTERNAL_MODULE__944__, __WEBPACK_EXTERNAL_MODULE__512__) {
return /******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ 512:
/***/ (function(module) {

module.exports = __WEBPACK_EXTERNAL_MODULE__512__;

/***/ }),

/***/ 944:
/***/ (function(module) {

module.exports = __WEBPACK_EXTERNAL_MODULE__944__;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};

// EXPORTS
__webpack_require__.d(__webpack_exports__, {
  "default": function() { return /* binding */ supertrend_src; }
});

// EXTERNAL MODULE: external {"amd":["highcharts/highcharts"],"commonjs":["highcharts"],"commonjs2":["highcharts"],"root":["Highcharts"]}
var highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_ = __webpack_require__(944);
var highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default = /*#__PURE__*/__webpack_require__.n(highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_);
// EXTERNAL MODULE: external {"amd":["highcharts/highcharts","SeriesRegistry"],"commonjs":["highcharts","SeriesRegistry"],"commonjs2":["highcharts","SeriesRegistry"],"root":["Highcharts","SeriesRegistry"]}
var highcharts_SeriesRegistry_commonjs_highcharts_SeriesRegistry_commonjs2_highcharts_SeriesRegistry_root_Highcharts_SeriesRegistry_ = __webpack_require__(512);
var highcharts_SeriesRegistry_commonjs_highcharts_SeriesRegistry_commonjs2_highcharts_SeriesRegistry_root_Highcharts_SeriesRegistry_default = /*#__PURE__*/__webpack_require__.n(highcharts_SeriesRegistry_commonjs_highcharts_SeriesRegistry_commonjs2_highcharts_SeriesRegistry_root_Highcharts_SeriesRegistry_);
;// ./code/es5/es-modules/Stock/Indicators/Supertrend/SupertrendIndicator.js
/* *
 *
 *  License: www.highcharts.com/license
 *
 *  !!!!!!! SOURCE GETS TRANSPILED BY TYPESCRIPT. EDIT TS FILE ONLY. !!!!!!!
 *
 * */

var __extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d,
        b) {
            extendStatics = Object.setPrototypeOf ||
                ({ __proto__: [] } instanceof Array && function (d,
        b) { d.__proto__ = b; }) ||
                function (d,
        b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

var _a = (highcharts_SeriesRegistry_commonjs_highcharts_SeriesRegistry_commonjs2_highcharts_SeriesRegistry_root_Highcharts_SeriesRegistry_default()).seriesTypes, ATRIndicator = _a.atr, SMAIndicator = _a.sma;

var addEvent = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).addEvent, correctFloat = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).correctFloat, isArray = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).isArray, isNumber = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).isNumber, extend = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).extend, merge = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).merge, objectEach = (highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()).objectEach;
/* *
 *
 *  Functions
 *
 * */
// Utils:
/**
 * @private
 */
function createPointObj(mainSeries, index) {
    return {
        index: index,
        close: mainSeries.getColumn('close')[index],
        x: mainSeries.getColumn('x')[index]
    };
}
/* *
 *
 *  Class
 *
 * */
/**
 * The Supertrend series type.
 *
 * @private
 * @class
 * @name Highcharts.seriesTypes.supertrend
 *
 * @augments Highcharts.Series
 */
var SupertrendIndicator = /** @class */ (function (_super) {
    __extends(SupertrendIndicator, _super);
    function SupertrendIndicator() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    /* *
     *
     *  Functions
     *
     * */
    SupertrendIndicator.prototype.init = function () {
        var indicator = this;
        _super.prototype.init.apply(indicator, arguments);
        // Only after series are linked add some additional logic/properties.
        var unbinder = addEvent(this.chart.constructor, 'afterLinkSeries',
            function () {
                // Protection for a case where the indicator is being updated,
                // for a brief moment the indicator is deleted.
                if (indicator.options) {
                    var options = indicator.options,
            parentOptions = indicator.linkedParent.options;
                // Indicator cropThreshold has to be equal linked series one
                // reduced by period due to points comparison in drawGraph
                // (#9787)
                options.cropThreshold = (parentOptions.cropThreshold -
                    (options.params.period - 1));
            }
            unbinder();
        }, {
            order: 1
        });
    };
    SupertrendIndicator.prototype.drawGraph = function () {
        var indicator = this,
            indicOptions = indicator.options, 
            // Series that indicator is linked to
            mainSeries = indicator.linkedParent,
            mainXData = mainSeries.getColumn('x'),
            mainLinePoints = (mainSeries ? mainSeries.points : []),
            indicPoints = indicator.points,
            indicPath = indicator.graph, 
            // Points offset between lines
            tempOffset = mainLinePoints.length - indicPoints.length,
            offset = tempOffset > 0 ? tempOffset : 0, 
            // @todo: fix when ichi-moku indicator is merged to master.
            gappedExtend = {
                options: {
                    gapSize: indicOptions.gapSize
                }
            }, 
            // Sorted supertrend points array
            groupedPoints = {
                top: [], // Rising trend line points
                bottom: [], // Falling trend line points
                intersect: [] // Change trend line points
            }, 
            // Options for trend lines
            supertrendLineOptions = {
                top: {
                    styles: {
                        lineWidth: indicOptions.lineWidth,
                        lineColor: (indicOptions.fallingTrendColor ||
                            indicOptions.color),
                        dashStyle: indicOptions.dashStyle
                    }
                },
                bottom: {
                    styles: {
                        lineWidth: indicOptions.lineWidth,
                        lineColor: (indicOptions.risingTrendColor ||
                            indicOptions.color),
                        dashStyle: indicOptions.dashStyle
                    }
                },
                intersect: indicOptions.changeTrendLine
            };
        var // Supertrend line point
            point, 
            // Supertrend line next point (has smaller x pos than point)
            nextPoint, 
            // Main series points
            mainPoint,
            nextMainPoint, 
            // Used when supertrend and main points are shifted
            // relative to each other
            prevMainPoint,
            prevPrevMainPoint, 
            // Used when particular point color is set
            pointColor, 
            // Temporary points that fill groupedPoints array
            newPoint,
            newNextPoint,
            indicPointsLen = indicPoints.length;
        // Loop which sort supertrend points
        while (indicPointsLen--) {
            point = indicPoints[indicPointsLen];
            nextPoint = indicPoints[indicPointsLen - 1];
            mainPoint = mainLinePoints[indicPointsLen - 1 + offset];
            nextMainPoint = mainLinePoints[indicPointsLen - 2 + offset];
            prevMainPoint = mainLinePoints[indicPointsLen + offset];
            prevPrevMainPoint = mainLinePoints[indicPointsLen + offset + 1];
            pointColor = point.options.color;
            newPoint = {
                x: point.x,
                plotX: point.plotX,
                plotY: point.plotY,
                isNull: false
            };
            // When mainPoint is the last one (left plot area edge)
            // but supertrend has additional one
            if (!nextMainPoint &&
                mainPoint &&
                isNumber(mainXData[mainPoint.index - 1])) {
                nextMainPoint = createPointObj(mainSeries, mainPoint.index - 1);
            }
            // When prevMainPoint is the last one (right plot area edge)
            // but supertrend has additional one (and points are shifted)
            if (!prevPrevMainPoint &&
                prevMainPoint &&
                isNumber(mainXData[prevMainPoint.index + 1])) {
                prevPrevMainPoint = createPointObj(mainSeries, prevMainPoint.index + 1);
            }
            // When points are shifted (right or left plot area edge)
            if (!mainPoint &&
                nextMainPoint &&
                isNumber(mainXData[nextMainPoint.index + 1])) {
                mainPoint = createPointObj(mainSeries, nextMainPoint.index + 1);
            }
            else if (!mainPoint &&
                prevMainPoint &&
                isNumber(mainXData[prevMainPoint.index - 1])) {
                mainPoint = createPointObj(mainSeries, prevMainPoint.index - 1);
            }
            // Check if points are shifted relative to each other
            if (point &&
                mainPoint &&
                prevMainPoint &&
                nextMainPoint &&
                point.x !== mainPoint.x) {
                if (point.x === prevMainPoint.x) {
                    nextMainPoint = mainPoint;
                    mainPoint = prevMainPoint;
                }
                else if (point.x === nextMainPoint.x) {
                    mainPoint = nextMainPoint;
                    nextMainPoint = {
                        close: mainSeries.getColumn('close')[mainPoint.index - 1],
                        x: mainXData[mainPoint.index - 1]
                    };
                }
                else if (prevPrevMainPoint && point.x === prevPrevMainPoint.x) {
                    mainPoint = prevPrevMainPoint;
                    nextMainPoint = prevMainPoint;
                }
            }
            if (nextPoint && nextMainPoint && mainPoint) {
                newNextPoint = {
                    x: nextPoint.x,
                    plotX: nextPoint.plotX,
                    plotY: nextPoint.plotY,
                    isNull: false
                };
                if (point.y >= mainPoint.close &&
                    nextPoint.y >= nextMainPoint.close) {
                    point.color = (pointColor || indicOptions.fallingTrendColor ||
                        indicOptions.color);
                    groupedPoints.top.push(newPoint);
                }
                else if (point.y < mainPoint.close &&
                    nextPoint.y < nextMainPoint.close) {
                    point.color = (pointColor || indicOptions.risingTrendColor ||
                        indicOptions.color);
                    groupedPoints.bottom.push(newPoint);
                }
                else {
                    groupedPoints.intersect.push(newPoint);
                    groupedPoints.intersect.push(newNextPoint);
                    // Additional null point to make a gap in line
                    groupedPoints.intersect.push(merge(newNextPoint, {
                        isNull: true
                    }));
                    if (point.y >= mainPoint.close &&
                        nextPoint.y < nextMainPoint.close) {
                        point.color = (pointColor || indicOptions.fallingTrendColor ||
                            indicOptions.color);
                        nextPoint.color = (pointColor || indicOptions.risingTrendColor ||
                            indicOptions.color);
                        groupedPoints.top.push(newPoint);
                        groupedPoints.top.push(merge(newNextPoint, {
                            isNull: true
                        }));
                    }
                    else if (point.y < mainPoint.close &&
                        nextPoint.y >= nextMainPoint.close) {
                        point.color = (pointColor || indicOptions.risingTrendColor ||
                            indicOptions.color);
                        nextPoint.color = (pointColor || indicOptions.fallingTrendColor ||
                            indicOptions.color);
                        groupedPoints.bottom.push(newPoint);
                        groupedPoints.bottom.push(merge(newNextPoint, {
                            isNull: true
                        }));
                    }
                }
            }
            else if (mainPoint) {
                if (point.y >= mainPoint.close) {
                    point.color = (pointColor || indicOptions.fallingTrendColor ||
                        indicOptions.color);
                    groupedPoints.top.push(newPoint);
                }
                else {
                    point.color = (pointColor || indicOptions.risingTrendColor ||
                        indicOptions.color);
                    groupedPoints.bottom.push(newPoint);
                }
            }
        }
        // Generate lines:
        objectEach(groupedPoints, function (values, lineName) {
            indicator.points = values;
            indicator.options = merge(supertrendLineOptions[lineName].styles, gappedExtend);
            indicator.graph = indicator['graph' + lineName + 'Line'];
            SMAIndicator.prototype.drawGraph.call(indicator);
            // Now save line
            indicator['graph' + lineName + 'Line'] = indicator.graph;
        });
        // Restore options:
        indicator.points = indicPoints;
        indicator.options = indicOptions;
        indicator.graph = indicPath;
    };
    // Supertrend (Multiplier, Period) Formula:
    // BASIC UPPERBAND = (HIGH + LOW) / 2 + Multiplier * ATR(Period)
    // BASIC LOWERBAND = (HIGH + LOW) / 2 - Multiplier * ATR(Period)
    // FINAL UPPERBAND =
    //     IF(
    //      Current BASICUPPERBAND  < Previous FINAL UPPERBAND AND
    //      Previous Close > Previous FINAL UPPERBAND
    //     ) THEN (Current BASIC UPPERBAND)
    //     ELSE (Previous FINALUPPERBAND)
    // FINAL LOWERBAND =
    //     IF(
    //      Current BASIC LOWERBAND  > Previous FINAL LOWERBAND AND
    //      Previous Close < Previous FINAL LOWERBAND
    //     ) THEN (Current BASIC LOWERBAND)
    //     ELSE (Previous FINAL LOWERBAND)
    // SUPERTREND =
    //     IF(
    //      Previous Supertrend == Previous FINAL UPPERBAND AND
    //      Current Close < Current FINAL UPPERBAND
    //     ) THAN Current FINAL UPPERBAND
    //     ELSE IF(
    //      Previous Supertrend == Previous FINAL LOWERBAND AND
    //      Current Close < Current FINAL LOWERBAND
    //     ) THAN Current FINAL UPPERBAND
    //     ELSE IF(
    //      Previous Supertrend == Previous FINAL UPPERBAND AND
    //      Current Close > Current FINAL UPPERBAND
    //     ) THAN Current FINAL LOWERBAND
    //     ELSE IF(
    //      Previous Supertrend == Previous FINAL LOWERBAND AND
    //      Current Close > Current FINAL LOWERBAND
    //     ) THAN Current FINAL LOWERBAND
    SupertrendIndicator.prototype.getValues = function (series, params) {
        var period = params.period,
            multiplier = params.multiplier,
            xVal = series.xData,
            yVal = series.yData, 
            // 0- date, 1- Supertrend indicator
            st = [],
            xData = [],
            yData = [],
            close = 3,
            low = 2,
            high = 1,
            periodsOffset = (period === 0) ? 0 : period - 1,
            finalUp = [],
            finalDown = [];
        var atrData = [],
            basicUp,
            basicDown,
            supertrend,
            prevFinalUp,
            prevFinalDown,
            prevST, // Previous Supertrend
            prevY,
            y,
            i;
        if ((xVal.length <= period) || !isArray(yVal[0]) ||
            yVal[0].length !== 4 || period < 0) {
            return;
        }
        atrData = ATRIndicator.prototype.getValues.call(this, series, {
            period: period
        }).yData;
        for (i = 0; i < atrData.length; i++) {
            y = yVal[periodsOffset + i];
            prevY = yVal[periodsOffset + i - 1] || [];
            prevFinalUp = finalUp[i - 1];
            prevFinalDown = finalDown[i - 1];
            prevST = yData[i - 1];
            if (i === 0) {
                prevFinalUp = prevFinalDown = prevST = 0;
            }
            basicUp = correctFloat((y[high] + y[low]) / 2 + multiplier * atrData[i]);
            basicDown = correctFloat((y[high] + y[low]) / 2 - multiplier * atrData[i]);
            if ((basicUp < prevFinalUp) ||
                (prevY[close] > prevFinalUp)) {
                finalUp[i] = basicUp;
            }
            else {
                finalUp[i] = prevFinalUp;
            }
            if ((basicDown > prevFinalDown) ||
                (prevY[close] < prevFinalDown)) {
                finalDown[i] = basicDown;
            }
            else {
                finalDown[i] = prevFinalDown;
            }
            if (prevST === prevFinalUp && y[close] < finalUp[i] ||
                prevST === prevFinalDown && y[close] < finalDown[i]) {
                supertrend = finalUp[i];
            }
            else if (prevST === prevFinalUp && y[close] > finalUp[i] ||
                prevST === prevFinalDown && y[close] > finalDown[i]) {
                supertrend = finalDown[i];
            }
            st.push([xVal[periodsOffset + i], supertrend]);
            xData.push(xVal[periodsOffset + i]);
            yData.push(supertrend);
        }
        return {
            values: st,
            xData: xData,
            yData: yData
        };
    };
    /* *
     *
     *  Static Properties
     *
     * */
    /**
     * Supertrend indicator. This series requires the `linkedTo` option to be
     * set and should be loaded after the `stock/indicators/indicators.js` and
     * `stock/indicators/sma.js`.
     *
     * @sample {highstock} stock/indicators/supertrend
     *         Supertrend indicator
     *
     * @extends      plotOptions.sma
     * @since        7.0.0
     * @product      highstock
     * @excluding    allAreas, cropThreshold, negativeColor, colorAxis, joinBy,
     *               keys, navigatorOptions, pointInterval, pointIntervalUnit,
     *               pointPlacement, pointRange, pointStart, showInNavigator,
     *               stacking, threshold
     * @requires     stock/indicators/indicators
     * @requires     stock/indicators/supertrend
     * @optionparent plotOptions.supertrend
     */
    SupertrendIndicator.defaultOptions = merge(SMAIndicator.defaultOptions, {
        /**
         * Parameters used in calculation of Supertrend indicator series points.
         *
         * @excluding index
         */
        params: {
            index: void 0, // Unchangeable index, do not inherit (#15362)
            /**
             * Multiplier for Supertrend Indicator.
             */
            multiplier: 3,
            /**
             * The base period for indicator Supertrend Indicator calculations.
             * This is the number of data points which are taken into account
             * for the indicator calculations.
             */
            period: 10
        },
        /**
         * Color of the Supertrend series line that is beneath the main series.
         *
         * @sample {highstock} stock/indicators/supertrend/
         *         Example with risingTrendColor
         *
         * @type {Highcharts.ColorString|Highcharts.GradientColorObject|Highcharts.PatternObject}
         */
        risingTrendColor: "#06b535" /* Palette.positiveColor */,
        /**
         * Color of the Supertrend series line that is above the main series.
         *
         * @sample {highstock} stock/indicators/supertrend/
         *         Example with fallingTrendColor
         *
         * @type {Highcharts.ColorString|Highcharts.GradientColorObject|Highcharts.PatternObject}
         */
        fallingTrendColor: "#f21313" /* Palette.negativeColor */,
        /**
         * The styles for the Supertrend line that intersect main series.
         *
         * @sample {highstock} stock/indicators/supertrend/
         *         Example with changeTrendLine
         */
        changeTrendLine: {
            styles: {
                /**
                 * Pixel width of the line.
                 */
                lineWidth: 1,
                /**
                 * Color of the line.
                 *
                 * @type {Highcharts.ColorString}
                 */
                lineColor: "#333333" /* Palette.neutralColor80 */,
                /**
                 * The dash or dot style of the grid lines. For possible
                 * values, see
                 * [this demonstration](https://jsfiddle.net/gh/get/library/pure/highcharts/highcharts/tree/master/samples/highcharts/plotoptions/series-dashstyle-all/).
                 *
                 * @sample {highcharts} highcharts/yaxis/gridlinedashstyle/
                 *         Long dashes
                 * @sample {highstock} stock/xaxis/gridlinedashstyle/
                 *         Long dashes
                 *
                 * @type  {Highcharts.DashStyleValue}
                 * @since 7.0.0
                 */
                dashStyle: 'LongDash'
            }
        }
    });
    return SupertrendIndicator;
}(SMAIndicator));
extend(SupertrendIndicator.prototype, {
    nameBase: 'Supertrend',
    nameComponents: ['multiplier', 'period']
});
highcharts_SeriesRegistry_commonjs_highcharts_SeriesRegistry_commonjs2_highcharts_SeriesRegistry_root_Highcharts_SeriesRegistry_default().registerSeriesType('supertrend', SupertrendIndicator);
/* *
 *
 *  Default Export
 *
 * */
/* harmony default export */ var Supertrend_SupertrendIndicator = ((/* unused pure expression or super */ null && (SupertrendIndicator)));
/* *
 *
 *  API Options
 *
 * */
/**
 * A `Supertrend indicator` series. If the [type](#series.supertrend.type)
 * option is not specified, it is inherited from [chart.type](#chart.type).
 *
 * @extends   series,plotOptions.supertrend
 * @since     7.0.0
 * @product   highstock
 * @excluding allAreas, colorAxis, cropThreshold, data, dataParser, dataURL,
 *            joinBy, keys, navigatorOptions, negativeColor, pointInterval,
 *            pointIntervalUnit, pointPlacement, pointRange, pointStart,
 *            showInNavigator, stacking, threshold
 * @requires  stock/indicators/indicators
 * @requires  stock/indicators/supertrend
 * @apioption series.supertrend
 */
''; // To include the above in the js output

;// ./code/es5/es-modules/masters/indicators/supertrend.src.js




/* harmony default export */ var supertrend_src = ((highcharts_commonjs_highcharts_commonjs2_highcharts_root_Highcharts_default()));

__webpack_exports__ = __webpack_exports__["default"];
/******/ 	return __webpack_exports__;
/******/ })()
;
});