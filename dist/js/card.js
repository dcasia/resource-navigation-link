(()=>{"use strict";var e,n={941:(e,n,t)=>{const r=Vue;var o={class:"resource-navigation-link"};const a={props:["card"],setup:function(){return{component:function(e){return e.external?"a":"Link"},active:function(e){return window.location.pathname.endsWith(e.url)},target:function(e){return e.openInNewTab?"_blank":"_self"}}}};var i=t(379),c=t.n(i),l=t(349),s={insert:"head",singleton:!1};c()(l.Z,s);l.Z.locals;const u=(0,t(744).Z)(a,[["render",function(e,n,t,a,i,c){var l=(0,r.resolveComponent)("Card");return(0,r.openBlock)(),(0,r.createElementBlock)("div",o,[(0,r.createVNode)(l,{class:"whitespace-nowrap overflow-x-auto flex flex-row items-center md:justify-center"},{default:(0,r.withCtx)((function(){return[((0,r.openBlock)(!0),(0,r.createElementBlock)(r.Fragment,null,(0,r.renderList)(t.card.links,(function(e,n){return(0,r.openBlock)(),(0,r.createBlock)((0,r.resolveDynamicComponent)(a.component(e)),{key:n,href:e.url,target:a.target(e),class:(0,r.normalizeClass)(["p-4 pt-6 flex-1 text-center cursor-pointer leading-tight text-sm transition",[{"border-b-2 first:rounded-l-lg last:rounded-r-lg":!0},{"hover:border-[rgba(var(--colors-primary-500))]":!0},{"border-transparent":!1===a.active(e)},{"inertia-link-active font-bold border-[rgba(var(--colors-primary-500))]":a.active(e)}]])},{default:(0,r.withCtx)((function(){return[(0,r.createTextVNode)((0,r.toDisplayString)(e.label),1)]})),_:2},1032,["href","target","class"])})),128))]})),_:1})])}],["__scopeId","data-v-c4f34f76"]]);Nova.booting((function(e,n,t){e.component("resource-navigation-link",u)}))},349:(e,n,t)=>{t.d(n,{Z:()=>a});var r=t(645),o=t.n(r)()((function(e){return e[1]}));o.push([e.id,".resource-navigation-link[data-v-c4f34f76]{min-height:auto}.resource-navigation-link:last-child.resource-navigation-link[data-v-c4f34f76]{margin-bottom:1rem}",""]);const a=o},645:e=>{e.exports=function(e){var n=[];return n.toString=function(){return this.map((function(n){var t=e(n);return n[2]?"@media ".concat(n[2]," {").concat(t,"}"):t})).join("")},n.i=function(e,t,r){"string"==typeof e&&(e=[[null,e,""]]);var o={};if(r)for(var a=0;a<this.length;a++){var i=this[a][0];null!=i&&(o[i]=!0)}for(var c=0;c<e.length;c++){var l=[].concat(e[c]);r&&o[l[0]]||(t&&(l[2]?l[2]="".concat(t," and ").concat(l[2]):l[2]=t),n.push(l))}},n}},962:()=>{},379:(e,n,t)=>{var r,o=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},a=function(){var e={};return function(n){if(void 0===e[n]){var t=document.querySelector(n);if(window.HTMLIFrameElement&&t instanceof window.HTMLIFrameElement)try{t=t.contentDocument.head}catch(e){t=null}e[n]=t}return e[n]}}(),i=[];function c(e){for(var n=-1,t=0;t<i.length;t++)if(i[t].identifier===e){n=t;break}return n}function l(e,n){for(var t={},r=[],o=0;o<e.length;o++){var a=e[o],l=n.base?a[0]+n.base:a[0],s=t[l]||0,u="".concat(l," ").concat(s);t[l]=s+1;var f=c(u),d={css:a[1],media:a[2],sourceMap:a[3]};-1!==f?(i[f].references++,i[f].updater(d)):i.push({identifier:u,updater:m(d,n),references:1}),r.push(u)}return r}function s(e){var n=document.createElement("style"),r=e.attributes||{};if(void 0===r.nonce){var o=t.nc;o&&(r.nonce=o)}if(Object.keys(r).forEach((function(e){n.setAttribute(e,r[e])})),"function"==typeof e.insert)e.insert(n);else{var i=a(e.insert||"head");if(!i)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");i.appendChild(n)}return n}var u,f=(u=[],function(e,n){return u[e]=n,u.filter(Boolean).join("\n")});function d(e,n,t,r){var o=t?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(e.styleSheet)e.styleSheet.cssText=f(n,o);else{var a=document.createTextNode(o),i=e.childNodes;i[n]&&e.removeChild(i[n]),i.length?e.insertBefore(a,i[n]):e.appendChild(a)}}function v(e,n,t){var r=t.css,o=t.media,a=t.sourceMap;if(o?e.setAttribute("media",o):e.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),e.styleSheet)e.styleSheet.cssText=r;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(r))}}var p=null,h=0;function m(e,n){var t,r,o;if(n.singleton){var a=h++;t=p||(p=s(n)),r=d.bind(null,t,a,!1),o=d.bind(null,t,a,!0)}else t=s(n),r=v.bind(null,t,n),o=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(t)};return r(e),function(n){if(n){if(n.css===e.css&&n.media===e.media&&n.sourceMap===e.sourceMap)return;r(e=n)}else o()}}e.exports=function(e,n){(n=n||{}).singleton||"boolean"==typeof n.singleton||(n.singleton=o());var t=l(e=e||[],n);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var r=0;r<t.length;r++){var o=c(t[r]);i[o].references--}for(var a=l(e,n),s=0;s<t.length;s++){var u=c(t[s]);0===i[u].references&&(i[u].updater(),i.splice(u,1))}t=a}}}},744:(e,n)=>{n.Z=(e,n)=>{const t=e.__vccOpts||e;for(const[e,r]of n)t[e]=r;return t}}},t={};function r(e){var o=t[e];if(void 0!==o)return o.exports;var a=t[e]={id:e,exports:{}};return n[e](a,a.exports,r),a.exports}r.m=n,e=[],r.O=(n,t,o,a)=>{if(!t){var i=1/0;for(u=0;u<e.length;u++){for(var[t,o,a]=e[u],c=!0,l=0;l<t.length;l++)(!1&a||i>=a)&&Object.keys(r.O).every((e=>r.O[e](t[l])))?t.splice(l--,1):(c=!1,a<i&&(i=a));if(c){e.splice(u--,1);var s=o();void 0!==s&&(n=s)}}return n}a=a||0;for(var u=e.length;u>0&&e[u-1][2]>a;u--)e[u]=e[u-1];e[u]=[t,o,a]},r.n=e=>{var n=e&&e.__esModule?()=>e.default:()=>e;return r.d(n,{a:n}),n},r.d=(e,n)=>{for(var t in n)r.o(n,t)&&!r.o(e,t)&&Object.defineProperty(e,t,{enumerable:!0,get:n[t]})},r.o=(e,n)=>Object.prototype.hasOwnProperty.call(e,n),(()=>{var e={440:0,458:0};r.O.j=n=>0===e[n];var n=(n,t)=>{var o,a,[i,c,l]=t,s=0;if(i.some((n=>0!==e[n]))){for(o in c)r.o(c,o)&&(r.m[o]=c[o]);if(l)var u=l(r)}for(n&&n(t);s<i.length;s++)a=i[s],r.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return r.O(u)},t=self.webpackChunkdigital_creative_resource_navigation_link=self.webpackChunkdigital_creative_resource_navigation_link||[];t.forEach(n.bind(null,0)),t.push=n.bind(null,t.push.bind(t))})(),r.nc=void 0,r.O(void 0,[458],(()=>r(941)));var o=r.O(void 0,[458],(()=>r(962)));o=r.O(o)})();