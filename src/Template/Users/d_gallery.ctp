<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header_desktop'); ?>
<style>
    body .modal-backdrop.in{opacity: .7;}
</style>
<!-- Header -->
<div class="page innerPg_pd black_bg pg_hgt">
    <div class="container container-full">
        <div class="head_Sz innerPgHead pg_Heading"><span class="brd brd_ylw">Gallery</span></div>
        <div class="gallery_outer">
            <div class="filter_wrap deskFilter">
                <div id="show_hide" class="dropdown keep-inside-clicks-open fltDropd pull-right" data-accordion="#accordion">
                    <a class="btn btn-filter" href="javascript:;" data-toggle="dropdown"><span class="flt_nm">Filter</span><img src="<?php echo Router::url('/', true); ?>img/images/desktop/filter_Icon.png" alt="Filter" /></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li>
                            <div class="filter_col_outer">
                                <?php /* if (empty($project_id) && empty($material_id)) { ?>
                                    <div class="filter_col flt_sec_cont">
                                        <div class="flt_head">PROJECTS</div>
                                        <div class="flt_body cstScrollbar">
                                            <ul class="list-unstyled filter_subCat">
                                                <?php foreach ($project as $key => $value_project) { ?>
                                                    <li><a class="ct_link filter_project <?php if ($project_id == $value_project['id']) { ?>active<?php } ?>" attr="<?php echo $value_project['id']; ?>" href="javascript:;"><?php echo $value_project['name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" id="proj_id" value="0" />
                                <?php } */ ?>
                                <div class="filter_col flt_sec_cont">
                                    <div class="flt_head">MATERIAL</div>
                                    <div class="flt_body cstScrollbar">
                                        <ul class="list-unstyled filter_subCat">
                                            <?php if (!empty($materials)) { ?>
                                                <?php foreach ($materials as $key => $value_material) { ?>
                                            <li><a class="ct_link material_filter" attr="<?php echo $value_material['id']; ?>" href="javascript:;"><?php echo $value_material['name']; ?></a></li>
                                                <?php } ?>  
                                            <?php } ?>  
                                        </ul>
                                    </div>
                                    <input type="hidden" id="material_id" value="0" />
                                </div>
                                <div class="filter_col flt_sec_cont">
                                    <div class="flt_head">CATEGORY</div>
                                    <div class="flt_body cstScrollbar">
                                        <ul class="list-unstyled filter_subCat">
                                            <?php if (!empty($categories)) { ?>
                                                <?php foreach ($categories as $key => $value_category) { ?>
                                            <li><a class="ct_link category_filter" attr="<?php echo $value_category['id']; ?>" href="javascript:;"><?php echo $value_category['name']; ?></a></li>
                                                <?php } ?>         
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="category_id" value="0" />
                                </div>
                            </div> 
                        </li>
                        <li>
                            <div class="filter_act_wrp">
                                <div class="col-sep"><a onclick="submit_apply()" href="javascript:;" class="btn flt_actBtn">Apply</a></div>
                                <div class="col-sep"><a id="cancel_filter" href="javascript:;" class="btn flt_actBtn">Cancel</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gallerySec_Desk">
                <div id="refresh">   </div>
                <div id="refresh_hide" class="grid grd_gallery col4grid" style="height:auto;">
                    <?php if (!empty($galleries)) { ?>
                        <?php foreach ($galleries as $key => $value_gallery) { ?>
                    <div class="grid-item">
                        <div class="glr_Img" data-aos="fade-in" data-aos-once="true" data-aos-duration="700">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#galleryPopup" onclick="gallerModels('<?php echo $value_gallery['image']; ?>', '<?php echo $project_list[$value_gallery['project_id']]; ?>', '<?php echo $value_gallery['location']; ?>', '<?php echo $category_list[$value_gallery['category_id']]; ?>');" data-target="#galleryPopup">
                                <img src="<?php echo Router::url('/', true); ?>img/gallery/<?php echo $value_gallery['image']; ?>" width="200" height="200" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                        <?php } ?>   
                        <?php if (count($galleries) == 20) { ?>
                    <div id="delete_id_a" class="load-more-list">
                        <a onclick="loadMoreImages(<?php echo $last_id['id']; ?>,<?php echo $project_id; ?>,<?php echo $material_id; ?>)" style="left: 551px; top: 1396px;">Load More</a>
                    </div>
                        <?php } ?>
                    <?php } else { ?> 
                    <div class="glr_Img">
                        <h1 class="pghead text-center"><span class="underline">No Record Found</span></h1>
                    </div>
                    <?php } ?>     
                </div>
            </div>
            <?php /* ?>  <div class="glr_pagination text-right">
              <ul class="pagination pagination-sm gallery_pgnt">
              <?php if (!empty($galleries)) { ?>
              <li class="page-item">
              <a class="page-link prev" href="javascript:;"><span class="arrw"><?= $this->Paginator->prev('< ' . __('')) ?></span></a>
              </li>
              <li class="page-item"><a class="page-link" href="javascript:;"><?= $this->Paginator->numbers() ?></a></li>
              <li class="page-item">
              <a class="page-link next" href="javascript:;"><span class="arrw"><?= $this->Paginator->next(__('') . ' >') ?></span></a>
              </li>
              <?php } ?>
              </ul>
              </div> <?php */ ?>
        </div>
    </div>
</div>
<!-- /page -->

<!-- Gallery Popup -->
<div id="galleryPopup" class="modal fade" role="dialog">
    <div class="modal-dialog deskGalleryModal galleryModal">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <div class="glrImage text-center"> <img id="image_name" src="<?php echo Router::url('/', true); ?>img/images/desktop/gallery/gallery_img_1_2.jpg" alt="Gallery" /></div>
                <ul class="list-unstyled projInfo">
                    <li><span class="proHead">Project name :</span> <span id="proj_name">Test</span></li>
                    <li><span class="proHead">Location :</span> <span id="loc_name">Test</span></li>
                    <li><span class="proHead">Category :</span> <span id="cat_name">Test</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery Popup -->
<?php
echo $this->Html->script(
        array(
            'front_end/jquery.min.js',
            'front_end1/masonry.pkgd.min.js',
));
?>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<?php
echo $this->Html->script(
        array(
            'front_end1/aos.js',
));
?>
<script type="text/javascript">
                            var $container = $('.grid');
                            $container.imagesLoaded(function () {
                                $container.masonry();
                                AOS.init({
                                    easing: 'ease-in-out-sine'
                                });
                            });
                            var base_path = "<?= Router::url('/', true) ?>";
                            $(document).ready(function () {
                                $('.filter_project').click(function () {
                                    var proj_id = $(this).attr('attr');
                                    if (proj_id != '') {
                                        $('.filter_project').removeClass('active');
                                        $(this).addClass('active');
                                        $('#proj_id').val(proj_id);
                                    }
                                });
                                $('.material_filter').click(function () {
                                    var material_id = $(this).attr('attr');
                                    if (material_id != '') {
                                        $('.material_filter').removeClass('active');
                                        $(this).addClass('active');
                                        $('#material_id').val(material_id);
                                    }
                                });
                                $('.category_filter').click(function () {
                                    var category_id = $(this).attr('attr');
                                    if (category_id != '') {
                                        $('.category_filter').removeClass('active');
                                        $(this).addClass('active');
                                        $('#category_id').val(category_id);
                                    }
                                });
                                $('#cancel_filter').click(function () {
                                    $('.ct_link').removeClass('active');
                                    $('#show_hide').removeClass('open');
                                    $('.btn-filter').attr('aria-expanded', 'false');
                                });
                            });

                            function loadMoreImages(gallery_id, project_id, material_id) {
                                // alert(gallery_id);
                                var route = base_path + "users/loadMoreD/" + gallery_id + '/' + project_id + '/' + material_id;
                                $.ajax({
                                    url: route,
                                    type: 'GET',
                                    dataType: 'json'
                                }).done(function (data) {
                                    // console.log(data);
                                    $('#delete_id_a').remove();
                                    ///  $container.masonry('remove');
                                    $('#refresh_hide').append(data['result']);
                                    //var $container = $('#refresh_hide');
                                    $container.imagesLoaded(function () {
                                        $('#delete_id_a').remove();
                                        $container.append($(data['result']));
                                        //    $container.masonry('appended', $(data['result'])); //as told above
                                        $container.masonry("reloadItems");
                                        $container.masonry();
                                        // $container.masonry();
                                        AOS.init({
                                            easing: 'ease-in-out-sine'
                                        });
                                    });
                                });
                            }
                            function submit_apply() {
                                var project_id = $('#proj_id').val();
                                if (project_id == undefined) {
                                    project_id = 0;
                                }
                                var material_id = $('#material_id').val();
                                if (material_id == undefined) {
                                    material_id = 0;
                                }
                                var category_id = $('#category_id').val();
                                if (category_id == undefined) {
                                    category_id = 0;
                                }
                                var route = base_path + "users/dGalleryFilter/" + project_id + '/' + material_id + '/' + category_id;
                                $.ajax({
                                    url: route,
                                    type: 'GET',
                                    dataType: 'html'
                                }).done(function (data) {
                                    $('#refresh_hide').hide();
                                    $('#refresh').html(data);
                                    $('#show_hide').removeClass('open');
                                    $('.btn-filter').attr('aria-expanded', 'false');
                                });
                            }
                            function gallerModels(img_name, proj_name, loc_name, cate_name) {
                                document.getElementById("image_name").src = "";
                                document.getElementById("proj_name").textContent = '';
                                document.getElementById("loc_name").textContent = '';
                                document.getElementById("cat_name").textContent = '';
                                document.getElementById("image_name").src = "" + base_path + "img/gallery/" + img_name + "";
                                document.getElementById("proj_name").textContent = proj_name;
                                document.getElementById("loc_name").textContent = loc_name;
                                document.getElementById("cat_name").textContent = cate_name;
                            }
</script>
<!-- Footer -->
<?php echo $this->element('front_footer_desktop'); ?>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>
