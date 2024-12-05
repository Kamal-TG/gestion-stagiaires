!/**
 * Highcharts JS v12.0.2 (2024-12-04)
 * Treegraph chart series type
 * @module highcharts/modules/treegraph
 * @requires highcharts
 * @requires highcharts/modules/treemap
 *
 *  (c) 2010-2024 Pawel Lysy Grzegorz Blachlinski
 *
 * License: www.highcharts.com/license
 */function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e(t._Highcharts,t._Highcharts.SeriesRegistry,t._Highcharts.SVGRenderer,t._Highcharts.Point,t._Highcharts.Color,t._Highcharts.SVGElement):"function"==typeof define&&define.amd?define("highcharts/modules/treegraph",["highcharts/highcharts"],function(t){return e(t,t.SeriesRegistry,t.SVGRenderer,t.Point,t.Color,t.SVGElement)}):"object"==typeof exports?exports["highcharts/modules/treegraph"]=e(t._Highcharts,t._Highcharts.SeriesRegistry,t._Highcharts.SVGRenderer,t._Highcharts.Point,t._Highcharts.Color,t._Highcharts.SVGElement):t.Highcharts=e(t.Highcharts,t.Highcharts.SeriesRegistry,t.Highcharts.SVGRenderer,t.Highcharts.Point,t.Highcharts.Color,t.Highcharts.SVGElement)}("undefined"==typeof window?this:window,(t,e,i,s,o,l)=>(()=>{"use strict";var r={620:t=>{t.exports=o},260:t=>{t.exports=s},28:t=>{t.exports=l},540:t=>{t.exports=i},512:t=>{t.exports=e},944:e=>{e.exports=t}},n={};function a(t){var e=n[t];if(void 0!==e)return e.exports;var i=n[t]={exports:{}};return r[t](i,i.exports,a),i.exports}a.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return a.d(e,{a:e}),e},a.d=(t,e)=>{for(var i in e)a.o(e,i)&&!a.o(t,i)&&Object.defineProperty(t,i,{enumerable:!0,get:e[i]})},a.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e);var h={};a.d(h,{default:()=>tf});var d=a(944),p=/*#__PURE__*/a.n(d);function c(t,e){let i=[];for(let s=0;s<t.length;s++){let o=t[s][1],l=t[s][2];if("number"==typeof o&&"number"==typeof l){if(0===s)i.push(["M",o,l]);else if(s===t.length-1)i.push(["L",o,l]);else if(e){let r=t[s-1],n=t[s+1];if(r&&n){let t=r[1],s=r[2],a=n[1],h=n[2];if("number"==typeof t&&"number"==typeof a&&"number"==typeof s&&"number"==typeof h&&t!==a&&s!==h){let r=t<a?1:-1,n=s<h?1:-1;i.push(["L",o-r*Math.min(Math.abs(o-t),e),l-n*Math.min(Math.abs(l-s),e)],["C",o,l,o,l,o+r*Math.min(Math.abs(o-a),e),l+n*Math.min(Math.abs(l-h),e)])}}}else i.push(["L",o,l])}}return i}var f=a(512),u=/*#__PURE__*/a.n(f),g=a(540),v=/*#__PURE__*/a.n(g);let{seriesTypes:{treemap:{prototype:{NodeClass:b}}}}=u(),y=class extends b{constructor(){super(...arguments),this.mod=0,this.shift=0,this.change=0,this.children=[],this.preX=0,this.hidden=!1,this.wasVisited=!1,this.collapsed=!1}nextLeft(){return this.getLeftMostChild()||this.thread}nextRight(){return this.getRightMostChild()||this.thread}getAncestor(t,e){return t.ancestor.children[0]===this.children[0]?t.ancestor:e}getLeftMostSibling(){let t=this.getParent();if(t){for(let e of t.children)if(e&&e.point.visible)return e}}hasChildren(){let t=this.children;for(let e=0;e<t.length;e++)if(t[e].point.visible)return!0;return!1}getLeftSibling(){let t=this.getParent();if(t){let e=t.children;for(let t=this.relativeXPosition-1;t>=0;t--)if(e[t]&&e[t].point.visible)return e[t]}}getLeftMostChild(){let t=this.children;for(let e=0;e<t.length;e++)if(t[e].point.visible)return t[e]}getRightMostChild(){let t=this.children;for(let e=t.length-1;e>=0;e--)if(t[e].point.visible)return t[e]}getParent(){return this.parentNode}getFirstChild(){let t=this.children;for(let e=0;e<t.length;e++)if(t[e].point.visible)return t[e]}};var m=a(260),x=/*#__PURE__*/a.n(m);let{seriesTypes:{treemap:{prototype:{pointClass:L}}}}=u(),{addEvent:k,fireEvent:P,merge:C}=p();class T extends L{constructor(){super(...arguments),this.dataLabelOnHidden=!0,this.isLink=!1,this.setState=x().prototype.setState}draw(){super.draw.apply(this,arguments);let t=this.graphic;t&&t.animate({visibility:this.visible?"inherit":"hidden"}),this.renderCollapseButton()}renderCollapseButton(){let t=this.series,e=this.graphic&&this.graphic.parentGroup,i=t.mapOptionsToLevel[this.node.level||0]||{},s=C(t.options.collapseButton,i.collapseButton,this.options.collapseButton),{width:o,height:l,shape:r,style:n}=s,a=this.series.chart,h=this.visible&&(this.collapsed||!s.onlyOnHover||"hover"===this.state)?1:0;if(this.shapeArgs){if(this.collapseButtonOptions=s,this.collapseButton){if(this.node.children.length&&s.enabled){let{x:t,y:e}=this.getCollapseBtnPosition(s);this.collapseButton.attr({text:this.collapsed?"+":"-",rotation:a.inverted?90:0,rotationOriginX:o/2,rotationOriginY:l/2,visibility:this.visible?"inherit":"hidden"}).animate({x:t,y:e,opacity:h})}else this.collapseButton.destroy(),delete this.collapseButton}else{if(!this.node.children.length||!s.enabled)return;let{x:t,y:i}=this.getCollapseBtnPosition(s),d=s.fillColor||this.color||"#cccccc";this.collapseButton=a.renderer.label(this.collapsed?"+":"-",t,i,r).attr({height:l-4,width:o-4,padding:2,fill:d,rotation:a.inverted?90:0,rotationOriginX:o/2,rotationOriginY:l/2,stroke:s.lineColor||"#ffffff","stroke-width":s.lineWidth,"text-align":"center",align:"center",zIndex:1,opacity:h,visibility:this.visible?"inherit":"hidden"}).addClass("highcharts-tracker").addClass("highcharts-collapse-button").removeClass("highcharts-no-tooltip").css(C({color:"string"==typeof d?a.renderer.getContrast(d):"#333333"},n)).add(e),this.collapseButton.element.point=this}}}toggleCollapse(t){let e=this.series;this.update({collapsed:t??!this.collapsed},!1,void 0,!1),P(e,"toggleCollapse"),e.redraw()}destroy(){this.collapseButton&&(this.collapseButton.destroy(),delete this.collapseButton,this.collapseButton=void 0),this.linkToParent&&(this.linkToParent.destroy(),delete this.linkToParent),super.destroy.apply(this,arguments)}getCollapseBtnPosition(t){let e=this.series.chart.inverted,i=t.width,s=t.height,{x:o=0,y:l=0,width:r=0,height:n=0}=this.shapeArgs||{};return{x:o+t.x+(e?-(.3*s):r+-.3*i),y:l+n/2-s/2+t.y}}}k(T,"mouseOut",function(){let t=this.collapseButton,e=this.collapseButtonOptions;t&&e?.onlyOnHover&&!this.collapsed&&t.animate({opacity:0})}),k(T,"mouseOver",function(){this.collapseButton&&this.visible&&this.collapseButton.animate({opacity:1},this.series.options.states?.hover?.animation)}),k(T,"click",function(){this.toggleCollapse()});var M=a(620),X=/*#__PURE__*/a.n(M);let{extend:N,isArray:O,isNumber:S,isObject:w,merge:B,pick:A,relativeLength:R}=p(),H={getColor:function(t,e){let i,s,o,l,r,n;let a=e.index,h=e.mapOptionsToLevel,d=e.parentColor,p=e.parentColorIndex,c=e.series,f=e.colors,u=e.siblings,g=c.points,v=c.chart.options.chart;return t&&(i=g[t.i],s=h[t.level]||{},i&&s.colorByPoint&&(l=i.index%(f?f.length:v.colorCount),o=f&&f[l]),c.chart.styledMode||(r=A(i&&i.options.color,s&&s.color,o,d&&(t=>{let e=s&&s.colorVariation;return e&&"brightness"===e.key&&a&&u?X().parse(t).brighten(e.to*(a/u)).get():t})(d),c.color)),n=A(i&&i.options.colorIndex,s&&s.colorIndex,l,p,e.colorIndex)),{color:r,colorIndex:n}},getLevelOptions:function(t){let e,i,s,o,l,r;let n={};if(w(t))for(o=S(t.from)?t.from:1,r=t.levels,i={},e=w(t.defaults)?t.defaults:{},O(r)&&(i=r.reduce((t,i)=>{let s,l,r;return w(i)&&S(i.level)&&(l=A((r=B({},i)).levelIsConstant,e.levelIsConstant),delete r.levelIsConstant,delete r.level,w(t[s=i.level+(l?0:o-1)])?B(!0,t[s],r):t[s]=r),t},{})),l=S(t.to)?t.to:1,s=0;s<=l;s++)n[s]=B({},e,w(i[s])?i[s]:{});return n},getNodeWidth:function(t,e){let{chart:i,options:s}=t,{nodeDistance:o=0,nodeWidth:l=0}=s,{plotSizeX:r=1}=i;if("auto"===l){if("string"==typeof o&&/%$/.test(o))return r/(e+parseFloat(o)/100*(e-1));let t=Number(o);return(r+t)/(e||1)-t}return R(l,r)},setTreeValues:function t(e,i){let s=i.before,o=i.idRoot,l=i.mapIdToNode[o],r=!1!==i.levelIsConstant,n=i.points[e.i],a=n&&n.options||{},h=[],d=0;e.levelDynamic=e.level-(r?0:l.level),e.name=A(n&&n.name,""),e.visible=o===e.id||!0===i.visible,"function"==typeof s&&(e=s(e,i)),e.children.forEach((s,o)=>{let l=N({},i);N(l,{index:o,siblings:e.children.length,visible:e.visible}),s=t(s,l),h.push(s),s.visible&&(d+=s.val)});let p=A(a.value,d);return e.visible=p>=0&&(d>0||e.visible),e.children=h,e.childrenTotal=d,e.isLeaf=e.visible&&!d,e.val=p,e},updateRootId:function(t){let e,i;return w(t)&&(i=w(t.options)?t.options:{},e=A(t.rootNode,i.rootId,""),w(t.userOptions)&&(t.userOptions.rootId=e),t.rootNode=e),e}},{pick:W,extend:I}=p(),{seriesTypes:{column:{prototype:{pointClass:V}}}}=u(),_=class extends V{constructor(t,e,i,s){super(t,e,i),this.dataLabelOnNull=!0,this.formatPrefix="link",this.isLink=!0,this.node={},this.formatPrefix="link",this.dataLabelOnNull=!0,s&&(this.fromNode=s.node.parentNode.point,this.visible=s.visible,this.toNode=s,this.id=this.toNode.id+"-"+this.fromNode.id)}update(t,e,i,s){let o={id:this.id,formatPrefix:this.formatPrefix};x().prototype.update.call(this,t,!this.isLink&&e,i,s),this.visible=this.toNode.visible,I(this,o),W(e,!0)&&this.series.chart.redraw(i)}};class E{static createDummyNode(t,e,i){let s=new y;return s.id=t.id+"-"+i,s.ancestor=t,s.children.push(e),s.parent=t.id,s.parentNode=t,s.point=e.point,s.level=e.level-i,s.relativeXPosition=e.relativeXPosition,s.visible=e.visible,t.children[e.relativeXPosition]=s,e.oldParentNode=t,e.relativeXPosition=0,e.parentNode=s,e.parent=s.id,s}calculatePositions(t){let e=t.nodeList;this.resetValues(e);let i=t.tree;i&&(this.calculateRelativeX(i,0),this.beforeLayout(e),this.firstWalk(i),this.secondWalk(i,-i.preX),this.afterLayout(e))}beforeLayout(t){for(let e of t)for(let t of e.children)if(t&&t.level-e.level>1){let i=t.level-e.level-1;for(;i>0;)t=E.createDummyNode(e,t,i),i--}}resetValues(t){for(let e of t)e.mod=0,e.ancestor=e,e.shift=0,e.thread=void 0,e.change=0,e.preX=0}calculateRelativeX(t,e){let i=t.children;for(let t=0,e=i.length;t<e;++t)this.calculateRelativeX(i[t],t);t.relativeXPosition=e}firstWalk(t){let e;if(t.hasChildren()){let i=t.getLeftMostChild();for(let e of t.children)this.firstWalk(e),i=this.apportion(e,i);this.executeShifts(t);let s=t.getLeftMostChild(),o=t.getRightMostChild(),l=(s.preX+o.preX)/2;(e=t.getLeftSibling())?(t.preX=e.preX+1,t.mod=t.preX-l):t.preX=l}else(e=t.getLeftSibling())?(t.preX=e.preX+1,t.mod=t.preX):t.preX=0}secondWalk(t,e){for(let i of(t.yPosition=t.preX+e,t.xPosition=t.level,t.children))this.secondWalk(i,e+t.mod)}executeShifts(t){let e=0,i=0;for(let s=t.children.length-1;s>=0;s--){let o=t.children[s];o.preX+=e,o.mod+=e,i+=o.change,e+=o.shift+i}}apportion(t,e){let i=t.getLeftSibling();if(i){let s=t,o=t,l=i,r=s.getLeftMostSibling(),n=s.mod,a=o.mod,h=l.mod,d=r.mod;for(;l&&l.nextRight()&&s&&s.nextLeft();){l=l.nextRight(),r=r.nextLeft(),s=s.nextLeft(),(o=o.nextRight()).ancestor=t;let i=l.preX+h-(s.preX+n)+1;i>0&&(this.moveSubtree(t.getAncestor(l,e),t,i),n+=i,a+=i),h+=l.mod,n+=s.mod,d+=r.mod,a+=o.mod}l&&l.nextRight()&&!o.nextRight()&&(o.thread=l.nextRight(),o.mod+=h-a),s&&s.nextLeft()&&!r.nextLeft()&&(r.thread=s.nextLeft(),r.mod+=n-d),e=t}return e}moveSubtree(t,e,i){let s=e.relativeXPosition-t.relativeXPosition;e.change-=i/s,e.shift+=i,e.preX+=i,e.mod+=i,t.change+=i/s}afterLayout(t){for(let e of t)e.oldParentNode&&(e.relativeXPosition=e.parentNode.relativeXPosition,e.parent=e.oldParentNode.parent,e.parentNode=e.oldParentNode,delete e.oldParentNode.children[e.relativeXPosition],e.oldParentNode.children[e.relativeXPosition]=e,e.oldParentNode=void 0)}}var z=a(28),D=/*#__PURE__*/a.n(z);let{deg2rad:Y}=p(),{addEvent:G,merge:F,uniqueKey:j,defined:$,extend:q}=p();function U(t,e){e=F(!0,{enabled:!0,attributes:{dy:-5,startOffset:"50%",textAnchor:"middle"}},e);let i=this.renderer.url,s=this.text||this,o=s.textPath,{attributes:l,enabled:r}=e;if(t=t||o&&o.path,o&&o.undo(),t&&r){let e=G(s,"afterModifyTree",e=>{if(t&&r){let o=t.attr("id");o||t.attr("id",o=j());let r={x:0,y:0};$(l.dx)&&(r.dx=l.dx,delete l.dx),$(l.dy)&&(r.dy=l.dy,delete l.dy),s.attr(r),this.attr({transform:""}),this.box&&(this.box=this.box.destroy());let n=e.nodes.slice(0);e.nodes.length=0,e.nodes[0]={tagName:"textPath",attributes:q(l,{"text-anchor":l.textAnchor,href:`${i}#${o}`}),children:n}}});s.textPath={path:t,undo:e}}else s.attr({dx:0,dy:0}),delete s.textPath;return this.added&&(s.textCache="",this.renderer.buildText(s)),this}function J(t){let e=t.bBox,i=this.element?.querySelector("textPath");if(i){let t=[],{b:s,h:o}=this.renderer.fontMetrics(this.element),l=o-s,r=RegExp('(<tspan>|<tspan(?!\\sclass="highcharts-br")[^>]*>|<\\/tspan>)',"g"),n=i.innerHTML.replace(r,"").split(/<tspan class="highcharts-br"[^>]*>/),a=n.length,h=(t,e)=>{let{x:o,y:r}=e,n=(i.getRotationOfChar(t)-90)*Y,a=Math.cos(n),h=Math.sin(n);return[[o-l*a,r-l*h],[o+s*a,r+s*h]]};for(let e=0,s=0;s<a;s++){let o=n[s].length;for(let l=0;l<o;l+=5)try{let o=e+l+s,[r,n]=h(o,i.getStartPositionOfChar(o));0===l?(t.push(n),t.push(r)):(0===s&&t.unshift(n),s===a-1&&t.push(r))}catch(t){break}e+=o-1;try{let o=e+s,l=i.getEndPositionOfChar(o),[r,n]=h(o,l);t.unshift(n),t.unshift(r)}catch(t){break}}t.length&&t.push(t[0].slice()),e.polygon=t}return e}function K(t){let e=t.labelOptions,i=t.point,s=e[i.formatPrefix+"TextPath"]||e.textPath;s&&!e.useHTML&&(this.setTextPath(i.getDataLabelPath?.(this)||i.graphic,s),i.dataLabelPath&&!s.enabled&&(i.dataLabelPath=i.dataLabelPath.destroy()))}let{getLinkPath:Q}={applyRadius:c,getLinkPath:{default:function(t){let{x1:e,y1:i,x2:s,y2:o,width:l=0,inverted:r=!1,radius:n,parentVisible:a}=t,h=[["M",e,i],["L",e,i],["C",e,i,e,o,e,o],["L",e,o],["C",e,i,e,o,e,o],["L",e,o]];return a?c([["M",e,i],["L",e+l*(r?-.5:.5),i],["L",e+l*(r?-.5:.5),o],["L",s,o]],n):h},straight:function(t){let{x1:e,y1:i,x2:s,y2:o,width:l=0,inverted:r=!1,parentVisible:n}=t;return n?[["M",e,i],["L",e+l*(r?-1:1),o],["L",s,o]]:[["M",e,i],["L",e,o],["L",e,o]]},curved:function(t){let{x1:e,y1:i,x2:s,y2:o,offset:l=0,width:r=0,inverted:n=!1,parentVisible:a}=t;return a?[["M",e,i],["C",e+l,i,e-l+r*(n?-1:1),o,e+r*(n?-1:1),o],["L",s,o]]:[["M",e,i],["C",e,i,e,o,e,o],["L",s,o]]}}},{series:{prototype:Z},seriesTypes:{treemap:tt,column:te}}=u(),{prototype:{symbols:ti}}=v(),{getLevelOptions:ts,getNodeWidth:to}=H,{arrayMax:tl,crisp:tr,extend:tn,merge:ta,pick:th,relativeLength:td,splat:tp}=p();({compose:function(t){G(t,"afterGetBBox",J),G(t,"beforeAddingDataLabel",K);let e=t.prototype;e.setTextPath||(e.setTextPath=U)}}).compose(D());class tc extends tt{constructor(){super(...arguments),this.nodeList=[],this.links=[]}init(){super.init.apply(this,arguments),this.layoutAlgorythm=new E;let t=this,e=this.chart.labelCollectors;e.some(t=>"collectorFunc"===t.name)||e.push(function(){let e=[];if(t.options.dataLabels&&!tp(t.options.dataLabels)[0].allowOverlap)for(let i of t.links||[])i.dataLabel&&e.push(i.dataLabel);return e})}getLayoutModifiers(){let t=this.chart,e=this,i=t.plotSizeX,s=t.plotSizeY,o=tl(this.points.map(t=>t.node.xPosition)),l=1/0,r=-1/0,n=1/0,a=-1/0,h=0,d=0,p=0,c=0;this.points.forEach(t=>{if(this.options.fillSpace&&!t.visible)return;let f=t.node,u=e.mapOptionsToLevel[t.node.level]||{},g=ta(this.options.marker,u.marker,t.options.marker),v=g.width??to(this,o),b=td(g.radius||0,Math.min(i,s)),y=g.symbol,m="circle"!==y&&g.height?td(g.height,s):2*b,x="circle"!==y&&v?td(v,i):2*b;f.nodeSizeX=x,f.nodeSizeY=m,f.xPosition<=l&&(l=f.xPosition,d=Math.max(x+(g.lineWidth||0),d)),f.xPosition>=r&&(r=f.xPosition,h=Math.max(x+(g.lineWidth||0),h)),f.yPosition<=n&&(n=f.yPosition,c=Math.max(m+(g.lineWidth||0),c)),f.yPosition>=a&&(a=f.yPosition,p=Math.max(m+(g.lineWidth||0),p))});let f=a===n?1:(s-(c+p)/2)/(a-n),u=a===n?s/2:-f*n+c/2,g=r===l?1:(i-(h+h)/2)/(r-l),v=r===l?i/2:-g*l+d/2;return{ax:g,bx:v,ay:f,by:u}}getLinks(){let t=this,e=[];return this.data.forEach(i=>{let s=t.mapOptionsToLevel[i.node.level||0]||{};if(i.node.parent){let o=ta(s,i.options);if(!i.linkToParent||i.linkToParent.destroyed){let e=new t.LinkClass(t,o,void 0,i);i.linkToParent=e}else i.collapsed=th(i.collapsed,(this.mapOptionsToLevel[i.node.level]||{}).collapsed),i.linkToParent.visible=i.linkToParent.toNode.visible;i.linkToParent.index=e.push(i.linkToParent)-1}else i.linkToParent&&(t.links.splice(i.linkToParent.index),i.linkToParent.destroy(),delete i.linkToParent)}),e}buildTree(t,e,i,s,o){let l=this.points[e];return i=l&&l.level||i,super.buildTree.call(this,t,e,i,s,o)}markerAttribs(){return{}}setCollapsedStatus(t,e){let i=t.point;i&&(i.collapsed=th(i.collapsed,(this.mapOptionsToLevel[t.level]||{}).collapsed),i.visible=e,e=!1!==e&&!i.collapsed),t.children.forEach(t=>{this.setCollapsedStatus(t,e)})}drawTracker(){te.prototype.drawTracker.apply(this,arguments),te.prototype.drawTracker.call(this,this.links)}translate(){let t=this.options,e=H.updateRootId(this),i;Z.translate.call(this);let s=this.tree=this.getTree();i=this.nodeMap[e],""===e||i&&i.children.length||(this.setRootNode("",!1),e=this.rootNode,i=this.nodeMap[e]),this.mapOptionsToLevel=ts({from:i.level+1,levels:t.levels,to:s.height,defaults:{levelIsConstant:this.options.levelIsConstant,colorByPoint:t.colorByPoint}}),this.setCollapsedStatus(s,!0),this.links=this.getLinks(),this.setTreeValues(s),this.layoutAlgorythm.calculatePositions(this),this.layoutModifier=this.getLayoutModifiers(),this.points.forEach(t=>{this.translateNode(t)}),this.points.forEach(t=>{t.linkToParent&&this.translateLink(t.linkToParent)}),t.colorByPoint||this.setColorRecursive(this.tree)}translateLink(t){let e=t.fromNode,i=t.toNode,s=this.options.link?.lineWidth||0,o=th(this.options.link?.curveFactor,.5),l=th(t.options.link?.type,this.options.link?.type,"default");if(e.shapeArgs&&i.shapeArgs){let r=e.shapeArgs.width||0,n=this.chart.inverted,a=tr((e.shapeArgs.y||0)+(e.shapeArgs.height||0)/2,s),h=tr((i.shapeArgs.y||0)+(i.shapeArgs.height||0)/2,s),d=tr((e.shapeArgs.x||0)+r,s),p=tr(i.shapeArgs.x||0,s);n&&(d-=r,p+=i.shapeArgs.width||0);let c=i.node.xPosition-e.node.xPosition;t.shapeType="path";let f=(Math.abs(p-d)+r)/c-r,u=tr((p+d)/2,s);t.plotX=u,t.plotY=h,t.shapeArgs={d:Q[l]({x1:d,y1:a,x2:p,y2:h,width:f,offset:f*o*(n?-1:1),inverted:n,parentVisible:i.visible,radius:this.options.link?.radius})},t.dlBox={x:(d+p)/2,y:(a+h)/2,height:s,width:0},t.tooltipPos=n?[(this.chart.plotSizeY||0)-t.dlBox.y,(this.chart.plotSizeX||0)-t.dlBox.x]:[t.dlBox.x,t.dlBox.y]}}drawNodeLabels(t){let e,i;let s=this.mapOptionsToLevel;for(let o of t){if(i=s[o.node.level],e={style:{}},i&&i.dataLabels&&(e=ta(e,i.dataLabels),this.hasDataLabels=()=>!0),o.shapeArgs&&this.options.dataLabels){let t={},{width:i=0,height:s=0}=o.shapeArgs;this.chart.inverted&&([i,s]=[s,i]),tp(this.options.dataLabels)[0].style?.width||(t.width=`${i}px`),tp(this.options.dataLabels)[0].style?.lineClamp||(t.lineClamp=Math.floor(s/16)),tn(e.style,t),o.dataLabel?.css(t)}o.dlOptions=ta(e,o.options.dataLabels)}Z.drawDataLabels.call(this,t)}alignDataLabel(t,e){let i=t.visible;t.visible=!0,super.alignDataLabel.apply(this,arguments),e.animate({opacity:!1===i?0:1},void 0,function(){i||e.hide()}),t.visible=i}drawDataLabels(){this.options.dataLabels&&(this.options.dataLabels=tp(this.options.dataLabels),this.drawNodeLabels(this.points),Z.drawDataLabels.call(this,this.links))}destroy(){if(this.links){for(let t of this.links)t.destroy();this.links.length=0}return Z.destroy.apply(this,arguments)}pointAttribs(t,e){let i=t&&this.mapOptionsToLevel[t.node.level||0]||{},s=t&&t.options,o=i.states&&i.states[e]||{};t&&(t.options.marker=ta(this.options.marker,i.marker,t.options.marker));let l=th(o&&o.link&&o.link.color,s&&s.link&&s.link.color,i&&i.link&&i.link.color,this.options.link&&this.options.link.color),r=th(o&&o.link&&o.link.lineWidth,s&&s.link&&s.link.lineWidth,i&&i.link&&i.link.lineWidth,this.options.link&&this.options.link.lineWidth),n=Z.pointAttribs.call(this,t,e);return t&&(t.isLink&&(n.stroke=l,n["stroke-width"]=r,delete n.fill),t.visible||(n.opacity=0)),n}drawPoints(){tt.prototype.drawPoints.apply(this,arguments),te.prototype.drawPoints.call(this,this.links)}translateNode(t){let e=this.chart,i=t.node,s=e.plotSizeY,o=e.plotSizeX,{ax:l,bx:r,ay:n,by:a}=this.layoutModifier,h=l*i.xPosition+r,d=n*i.yPosition+a,p=this.mapOptionsToLevel[i.level]||{},c=ta(this.options.marker,p.marker,t.options.marker).symbol,f=i.nodeSizeY,u=i.nodeSizeX,g=this.options.reversed,v=i.x=e.inverted?o-u/2-h:h-u/2,b=i.y=g?d-f/2:s-d-f/2,y=th(t.options.borderRadius,p.borderRadius,this.options.borderRadius),m=ti[c||"circle"];if(void 0===m?(t.hasImage=!0,t.shapeType="image",t.imageUrl=c.match(/^url\((.*?)\)$/)[1]):t.shapeType="path",!t.visible&&t.linkToParent){let e=t.linkToParent.fromNode;if(e){let{x:i=0,y:s=0,width:o=0,height:l=0}=e.shapeArgs||{};t.shapeArgs||(t.shapeArgs={}),t.hasImage||tn(t.shapeArgs,{d:m(i,s,o,l,y?{r:y}:void 0)}),tn(t.shapeArgs,{x:i,y:s}),t.plotX=e.plotX,t.plotY=e.plotY}}else t.plotX=v,t.plotY=b,t.shapeArgs={x:v,y:b,width:u,height:f,cursor:t.node.isLeaf?"default":"pointer"},t.hasImage||(t.shapeArgs.d=m(v,b,u,f,y?{r:y}:void 0));t.tooltipPos=e.inverted?[s-b-f/2,o-v-u/2]:[v+u/2,b]}}tc.defaultOptions=ta(tt.defaultOptions,{reversed:!1,marker:{radius:10,lineWidth:0,symbol:"circle",fillOpacity:1,states:{}},link:{color:"#666666",lineWidth:1,radius:10,cursor:"default",type:"curved"},collapseButton:{onlyOnHover:!0,enabled:!0,lineWidth:1,x:0,y:0,height:18,width:18,shape:"circle",style:{cursor:"pointer",fontWeight:"bold",fontSize:"1em"}},fillSpace:!1,tooltip:{linkFormat:"{point.fromNode.id} → {point.toNode.id}",pointFormat:"{point.id}"},dataLabels:{defer:!0,linkTextPath:{attributes:{startOffset:"50%"}},enabled:!0,linkFormatter:()=>"",style:{textOverflow:"none"}},nodeDistance:30,nodeWidth:void 0}),tn(tc.prototype,{pointClass:T,NodeClass:y,LinkClass:_}),u().registerSeriesType("treegraph",tc);let tf=p();return h.default})());