<?php

use Cake\Routing\Router; ?>
<?php
echo $this->Html->script(
        array(
            'front_end/jquery.min.js',
            'front_end1/masonry.pkgd.min.js',
              'front_end1/aos.js',
));
?>
<script>
    $('.grid').masonry({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        // use element for option
        //percentPosition: true,
        horizontalOrder: true
    });
</script>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>
<div class="grid grd_gallery col4grid">
    <?php if (!empty($galleries)) { ?>
        <?php foreach ($galleries as $key => $value_gallery) { ?>
            <div class="grid-item">
                <div class="glr_Img" data-aos="fade-in" data-aos-once="true" data-aos-duration="700">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#galleryPopup" onclick="gallerModels('<?php echo $value_gallery['image']; ?>', '<?php echo $project_list[$value_gallery['project_id']]; ?>', '<?php echo $value_gallery['location']; ?>', '<?php echo $category_list[$value_gallery['category_id']]; ?>');" data-target="#galleryPopup">
                        <img src="<?php echo Router::url('/', true); ?>img/gallery/<?php echo $value_gallery['image']; ?>" alt="Gallery" />
                    </a>
                </div>
            </div>    
        <?php } ?>                   
    <?php } else { ?> 
        <div class="glr_Img">
            <h1 class="pghead text-center"><span class="underline">No Record Found</span></h1>
        </div>
    <?php } ?>     
</div>