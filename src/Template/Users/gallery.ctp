<?php

use Cake\Routing\Router; ?>
<?php echo $this->element('front_header'); ?>
<style>
    body .modal-backdrop.in{opacity: .7;}
</style>
<!-- Header -->
<div class="container mainPgWrap">
    <h1 class="pghead text-center text-uppercase"><span class="underline">Gallery</span></h1>
    <div class="gallery_outer">
        <div class="filter_wrap">
            <div id="show_hide" class="dropdown keep-inside-clicks-open fltDropd dropdown-accordion pull-right" data-accordion="#accordion">
                <a class="btn btn-filter" href="javascript:;" data-toggle="dropdown"><img src="<?php echo Router::url('/', true); ?>img/images/filter_icon.png" alt="Filter" /></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li class="headingFilter">Filter</li>
                    <li>
                        <div class="panel-group" id="accordion">
                            <?php /*  if (empty($project_id) && empty($material_id)) { ?>
                                <div class="panel panel-default cst_accrd">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#collapse_1" data-toggle="collapse" data-parent="#accordion">Projects <span class="arrow_icon"><img src="<?php echo Router::url('/', true); ?>img/images/dropd_arrow.png" alt="arrow" /></span></a> </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse_1">
                                        <div class="panel-body cstScrollbar">
                                            <ul class="list-unstyled filter_subCat">
                                                <?php foreach ($project as $key => $value_project) { ?>
                                                    <li><a class="ct_link filter_project <?php if ($project_id == $value_project['id']) { ?>active<?php } ?>" attr="<?php echo $value_project['id']; ?>" href="javascript:;"><?php echo $value_project['name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" id="proj_id" value="0" />
                                </div>
                            <?php } */ ?>
                            <div class="panel panel-default cst_accrd">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapse_2" data-toggle="collapse" data-parent="#accordion">Materials <span class="arrow_icon"><img src="<?php echo Router::url('/', true); ?>img/images/dropd_arrow.png" alt="arrow" /></span></a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse_2">
                                    <div class="panel-body cstScrollbar">
                                        <ul class="list-unstyled filter_subCat">
                                            <?php if (!empty($materials)) { ?>
                                                <?php foreach ($materials as $key => $value_material) { ?>
                                                    <li><a class="ct_link material_filter" attr="<?php echo $value_material['id']; ?>" href="javascript:;"><?php echo $value_material['name']; ?></a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <input type="hidden" id="material_id" value="0" />
                            </div>
                            <div class="panel panel-default cst_accrd">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapse_3" data-toggle="collapse" data-parent="#accordion">Category <span class="arrow_icon"><img src="<?php echo Router::url('/', true); ?>img/images/dropd_arrow.png" alt="arrow" /></span></a></h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse_3">
                                    <div class="panel-body cstScrollbar">
                                        <ul class="list-unstyled filter_subCat">
                                            <?php if (!empty($categories)) { ?>
                                                <?php foreach ($categories as $key => $value_category) { ?>
                                                    <li><a class="ct_link category_filter" attr="<?php echo $value_category['id']; ?>" href="javascript:;"><?php echo $value_category['name']; ?></a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
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
        <div class="gallerySec">
            <div id="refresh">   </div>
            <ul id="refresh_hide" class="galleryGrid">
                <?php if (!empty($galleries)) { ?>
                    <?php foreach ($galleries as $key => $value_gallery) { ?>
                        <li>
                            <div class="imgSec">
                                <a href="javascript:void(0);" data-toggle="modal" onclick="gallerModels('<?php echo $value_gallery['image']; ?>', '<?php echo $project_list[$value_gallery['project_id']]; ?>', '<?php echo $value_gallery['location']; ?>', '<?php echo $category_list[$value_gallery['category_id']]; ?>');" data-target="#galleryPopup"><img src="<?php echo Router::url('/', true); ?>img/gallery/<?php echo $value_gallery['image']; ?>" alt="Gallery" /></a>
                            </div>
                        </li>
                    <?php } ?>                   
                <?php } else { ?> 
                    <li>
                        <h1 class="pghead text-center"><span class="underline">No Record Found</span></h1>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php
echo $this->Html->script(
        array(
            'front_end/jquery.min.js',
));
?>
<script type="text/javascript">
    var base_path = "<?= Router::url('/', true) ?>";
    $(document).ready(function() {
        $('.filter_project').click(function() {
            var proj_id = $(this).attr('attr');
            if (proj_id != '') {
                $('.filter_project').removeClass('active');
                $(this).addClass('active');
                $('#proj_id').val(proj_id);
            }
        });
        $('.material_filter').click(function() {
            var material_id = $(this).attr('attr');
            if (material_id != '') {
                $('.material_filter').removeClass('active');
                $(this).addClass('active');
                $('#material_id').val(material_id);
            }
        });
        $('.category_filter').click(function() {
            var category_id = $(this).attr('attr');
            if (category_id != '') {
                $('.category_filter').removeClass('active');
                $(this).addClass('active');
                $('#category_id').val(category_id);
            }
        });
        $('#cancel_filter').click(function() {
            $('.ct_link').removeClass('active');
            $('#show_hide').removeClass('open');
            $('.btn-filter').attr('aria-expanded', 'false');
        });
    });
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
        var route = base_path + "users/galleryFilter/" + project_id + '/' + material_id + '/' + category_id;
        $.ajax({
            url: route,
            type: 'GET',
            dataType: 'html'
        }).done(function(data) {
            $('#refresh_hide').hide();
            $('#refresh').html(data);
            $('#show_hide').removeClass('open');
            $('.btn-filter').attr('aria-expanded', 'false');
        });
    }
    function gallerModels(img_name, proj_name, loc_name, cate_name) {
        document.getElementById("image_name").src = "" + base_path + "img/gallery/" + img_name + "";
        document.getElementById("proj_name").textContent = proj_name;
        document.getElementById("loc_name").textContent = loc_name;
        document.getElementById("cat_name").textContent = cate_name;
    }
</script>
<!-- Footer -->
<?php echo $this->element('front_footer'); ?>