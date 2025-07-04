</div> <!--END of ROW -- move into col sidebar -->
</div><!--END of container -- move into col sidebar -->
        <div class="footer scroll">

                <ul>
                    <li><a href="https://www.ed.ac.uk/about/website/website-terms-conditions">Terms &amp; conditions</a></li>

                    <li><a href="https://www.ed.ac.uk/about/website/privacy">Privacy &amp; cookies</a></li>

                    <li><a href="./accessibility" title="Website Accessibility Link" target="_blank">Accessibility</a></li>

                    <li><a href="https://www.ed.ac.uk/about/website/freedom-information">Freedom of Information Publication Scheme</a></li>

                </ul>

                <p>Unless explicitly stated otherwise, all material is copyright © The University of Edinburgh
                    <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script></p>
        </div>



        <!-- First ensure jQuery is loaded (should be in header) -->

        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add main fancyBox script -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>

        <!-- Add Fancybox helpers -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- Your other scripts -->
        <script src="<?php echo base_url()?>assets/plugins/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/script/script.js"></script>
        <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/record_image.js"></script>
        <!--<script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/record_info.js"></script>-->
        <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/home_page.js"></script>
        <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/jquery.mCustomScrollbar.js"></script>
        <script>/*! modernizr 3.5.0 (Custom Build) | MIT *
        * https://modernizr.com/download/?-backgroundsize-bgrepeatspace_bgrepeatround-boxshadow-cssanimations-cssfilters-cssgrid_cssgridlegacy-nthchild-setclasses !*/
        !function(e,n,t){function r(e,n){return typeof e===n}function s(){var e,n,t,s,o,i,a;for(var l in C)if(C.hasOwnProperty(l)){if(e=[],n=C[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=r(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)i=e[o],a=i.split("."),1===a.length?Modernizr[a[0]]=s:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=s),S.push((s?"":"no-")+a.join("-"))}}function o(e){var n=w.className,t=Modernizr._config.classPrefix||"";if(b&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),b?w.className.baseVal=n:w.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):b?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function a(e,n){return!!~(""+e).indexOf(n)}function l(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function u(e,n){return function(){return e.apply(n,arguments)}}function d(e,n,t){var s;for(var o in e)if(e[o]in n)return t===!1?e[o]:(s=n[e[o]],r(s,"function")?u(s,t||n):s);return!1}function f(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function p(n,t,r){var s;if("getComputedStyle"in e){s=getComputedStyle.call(e,n,t);var o=e.console;if(null!==s)r&&(s=s.getPropertyValue(r));else if(o){var i=o.error?"error":"log";o[i].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else s=!t&&n.currentStyle&&n.currentStyle[r];return s}function c(){var e=n.body;return e||(e=i(b?"svg":"body"),e.fake=!0),e}function m(e,t,r,s){var o,a,l,u,d="modernizr",f=i("div"),p=c();if(parseInt(r,10))for(;r--;)l=i("div"),l.id=s?s[r]:d+(r+1),f.appendChild(l);return o=i("style"),o.type="text/css",o.id="s"+d,(p.fake?p:f).appendChild(o),p.appendChild(f),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(n.createTextNode(e)),f.id=d,p.fake&&(p.style.background="",p.style.overflow="hidden",u=w.style.overflow,w.style.overflow="hidden",w.appendChild(p)),a=t(f,e),p.fake?(p.parentNode.removeChild(p),w.style.overflow=u,w.offsetHeight):f.parentNode.removeChild(f),!!a}function g(n,r){var s=n.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(f(n[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+f(n[s])+":"+r+")");return o=o.join(" or "),m("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==p(e,null,"position")})}return t}function h(e,n,s,o){function u(){f&&(delete j.style,delete j.modElem)}if(o=r(o,"undefined")?!1:o,!r(s,"undefined")){var d=g(e,s);if(!r(d,"undefined"))return d}for(var f,p,c,m,h,v=["modernizr","tspan","samp"];!j.style&&v.length;)f=!0,j.modElem=i(v.shift()),j.style=j.modElem.style;for(c=e.length,p=0;c>p;p++)if(m=e[p],h=j.style[m],a(m,"-")&&(m=l(m)),j.style[m]!==t){if(o||r(s,"undefined"))return u(),"pfx"==n?m:!0;try{j.style[m]=s}catch(y){}if(j.style[m]!=h)return u(),"pfx"==n?m:!0}return u(),!1}function v(e,n,t,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+k.join(i+" ")+i).split(" ");return r(n,"string")||r(n,"undefined")?h(a,n,s,o):(a=(e+" "+E.join(i+" ")+i).split(" "),d(a,n,t))}function y(e,n,r){return v(e,t,t,n,r)}var S=[],C=[],x={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){C.push({name:e,fn:n,options:t})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=x,Modernizr=new Modernizr;var w=n.documentElement,b="svg"===w.nodeName.toLowerCase(),_=x._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];x._prefixes=_;var T="CSS"in e&&"supports"in e.CSS,z="supportsCSS"in e;Modernizr.addTest("supports",T||z);var P="Moz O ms Webkit",k=x._config.usePrefixes?P.split(" "):[];x._cssomPrefixes=k;var E=x._config.usePrefixes?P.toLowerCase().split(" "):[];x._domPrefixes=E;var N={elem:i("modernizr")};Modernizr._q.push(function(){delete N.elem});var j={style:N.elem.style};Modernizr._q.unshift(function(){delete j.style}),x.testAllProps=v,x.testAllProps=y,Modernizr.addTest("cssanimations",y("animationName","a",!0)),Modernizr.addTest("bgrepeatround",y("backgroundRepeat","round")),Modernizr.addTest("bgrepeatspace",y("backgroundRepeat","space")),Modernizr.addTest("backgroundsize",y("backgroundSize","100%",!0)),Modernizr.addTest("boxshadow",y("boxShadow","1px 1px",!0)),Modernizr.addTest("cssgridlegacy",y("grid-columns","10px",!0)),Modernizr.addTest("cssgrid",y("grid-template-rows","none",!0)),Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return y("filter","blur(2px)");var e=i("a");return e.style.cssText=_.join("filter:blur(2px); "),!!e.style.length&&(n.documentMode===t||n.documentMode>9)});var A=x.testStyles=m;A("#modernizr div {width:1px} #modernizr div:nth-child(2n) {width:2px;}",function(e){for(var n=e.getElementsByTagName("div"),t=!0,r=0;5>r;r++)t=t&&n[r].offsetWidth===r%2+1;Modernizr.addTest("nthchild",t)},5),s(),o(S),delete x.addTest,delete x.addAsyncTest;for(var q=0;q<Modernizr._q.length;q++)Modernizr._q[q]();e.Modernizr=Modernizr}(window,document);
        </script>
        </body>
</html>
