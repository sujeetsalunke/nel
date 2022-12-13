<?php

use Cake\Routing\Router; ?>
<div class="footer_add_wrp"> 
    <div class="container">
        <div class="contact_wrp footerDesk top_wrp">
            <div class="address_sec">
                <h3 class="text-center">New Era Industries</h3>
                <div class="text-cont text-center">

                    <p class="addrs"><a href="https://goo.gl/maps/nnSpW7SvuRk" target="_blank">2nd Floor, Plot No. 4, Khasra No. 132, IGNOU Road, Neb Sarai, New Delhi – 110068</a></p>
                    <ul class="list-unstyled cont_Info">
                        <li>Phone: <a href="tel:+91-11-29536471">+91-11-29536471</a>/<a href="tel:+91-11-29536473">73</a></li>
                        <!--<li>Fax: +91-11-29536469</li>-->
                        <li>E-mail: <a href="mailto:sales@neweralivingdeco.com">sales@neweralivingdeco.com</a></li>
                    </ul>
                </div>
            </div>
            <!-- /address_sec -->
        </div>
        <!-- /contact_wrp -->
    </div>
</div>
<a href="javascript:void(0);" class="go_top" id="scroll" title="Scroll to Top" style="display: none;">Top</a>
<?php
echo $this->Html->script(
        array(
            'front_end1/jquery.min.js',
            'front_end1/bootstrap.min.js',
            'front_end1/owl.carousel.min.js',
            'front_end1/aos.js',
            'front_end1/jquery.mCustomScrollbar.concat.min.js',
            'front_end1/desktop/desk-all-scripts.js',
            'front_end1/sweetalert.min.js',
            'back_end/jquery.bvalidator.js'
));
?>
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
<!-- animation -->
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>
</body>
</html>