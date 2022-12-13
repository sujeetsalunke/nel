<?php

use Cake\Routing\Router; ?>
</div> <!-- /pgHwrp -->
<div class="footer_add_wrp" id="footer_adrs"> 
    <div class="container">
        <div class="contact_wrp top_wrp">
            <div class="address_sec">
                <h3 class="text-center">New Era Industries</h3>
                <div class="text-cont text-center">
                    <p class="addrs"><a href="https://goo.gl/maps/nnSpW7SvuRk" target="_blank">2nd Floor, 
                                            Plot No. 4, Khasra No. 132,<br> IGNOU Road, Neb Sarai, New Delhi – 110068</a></p>
                    <span class="phn">Phone: <a href="tel:+91-11-29536471">+91-11-29536471</a>/<a href="tel:+91-11-29536473">73</a></span> 
                    <!--<span class="fax">Fax: +91-11-29536469</span> -->
                    <p class="email">E-mail: <a href="mailto:sales@neweralivingdeco.com">sales@neweralivingdeco.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page -->
<a href="javascript:void(0);" class="go_top" id="scroll" title="Scroll to Top" style="display: none;">Top</a>
<!-- Menu -->
<!-- drawer Menu -->
<div class="mobile-nav sidebar-off-canvas site-Nav">
<div class="menu_hamburger">
        <div class="hamburger hamburger--spin cust-position ripplelink">
                                <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    </div>
                    
    <ul id="menu" class="nav navbar-nav">
        <li class="<?php echo (($this->request->controller == 'Users' && $this->request->action == 'home') ) ? 'active' : 'inactive' ?>"><a href="<?php echo Router::url('/mobile', true); ?>">Home</a></li>
        <li class="<?php echo (($this->request->controller == 'Users' && $this->request->action == 'aboutUs') ) ? 'active' : 'inactive' ?>"><a href="<?php echo Router::url('/', true); ?>about-us">About Us</a></li>
        <li class="<?php echo (($this->request->controller == 'Users' && $this->request->action == 'products' || $this->request->action == 'productDetails') ) ? 'active' : 'inactive' ?>"><a href="<?php echo Router::url('/', true); ?>products">Products</a></li>
        <li class="<?php echo (($this->request->controller == 'Users' && $this->request->action == 'gallery') ) ? 'active' : 'inactive' ?>"><a href="<?php echo Router::url('/', true); ?>gallery/0/0">Project Gallery</a></li>
        <li><a href="<?php echo Router::url('/', true); ?>mobile#contactsec">Contact Us</a></li>
        <li><a href="<?php echo Router::url('/', true); ?>#section5">Subsidiaries</a>
            <ul>
                <li><a href="https://nel.net.in/nel-fze">New Era Livingdeco FZE, U.A.E.</a></li>
                <li><a href="https://nel.net.in/nellc">New Era Livingdeco Limited Company, Vietnam (NELLC)</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- /drawer -->
<!-- End Menu -->

<!-- Gallery Popup -->
<div id="galleryPopup" class="modal fade" role="dialog">
    <div class="modal-dialog galleryModal">

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <div class="glrImage"> <img id="image_name" src="<?php echo Router::url('/', true); ?>img/images/gallery_lg.jpg" alt="Gallery" /></div>
                <ul class="list-unstyled projInfo">
                    <li><span class="proHead">Project name :</span><span id="proj_name">Test</span></li>
                    <li><span class="proHead">Location :</span><span id="loc_name">Test</span></li>
                    <li><span class="proHead">Category :</span><span id="cat_name">Test</span></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Gallery Popup -->

<?php echo $this->element('front_other_js'); ?>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function() {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });
</script>
<script>
$(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function (e) {
  e.stopPropagation();
});
</script>
<script>
(function($){
			$(window).on("load",function(){
				$(".cstScrollbar").mCustomScrollbar({
					theme:"dark-thin"
				});	
	});
})(jQuery);
</script>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>

</body>
</html>