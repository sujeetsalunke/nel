<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    var base_path = "<?= Router::url('/', true) ?>";
    $(document).ready(function() {
        $('#add_page').bValidator();
        $('#project_id').change(function() {
            $("#product_id").prop('disabled', true);
            var id = $('#project_id').val();
            if (id != '') {
                var urls = base_path + "Galleries/dropdwn_fill_product/" + id;
                $.ajax({
                    url: urls,
                    dataType: 'json'
                }).done(function(data) {
                    console.log(data['products']);
                    if (data['projects'].length != 0) {
                        $("#product_id_div").show();
                        $("#product_id").prop('disabled', false);
                        $("#product_id").empty();
                        $("#product_id").append(
                                $("<option></option>").text('--Select Product--').val('')
                                );
                        $.each(data['projects'], function(i, val) {
                            $("#product_id").append(
                                    $("<option></option>").text(val).val(i)
                                    );
                        });
                    } else {
                        $("#product_id").prop('disabled', false);
                        $("#product_id").empty();
                        $("#product_id").append(
                                $("<option></option>").text('--Select--').val('')
                                );
                    }
                });
            } else {
                $("#product_id_div").hide();
                $("#product_id").prop('disabled', true);
                $("#product_id").empty();
                $("#product_id").append(
                        $("<option></option>").text('--Select--').val('')
                        );
            }
        });
        var _URL = window.URL || window.webkitURL;
        $("#image").change(function(e) {
            var control = $("#image");
            //alert(control);
            var image, file;
            if ((file = this.files[0])) {
                //console.log(file);
                var name = file.name;
                var extension = name.substr((name.lastIndexOf('.') + 1));
                if (extension == 'jpeg' || extension == 'png' || extension == 'gif' || extension == 'jpg') {
                    image = new Image();
                    image.onload = function() {
                        //alert("The image width is " + this.width + " and image height is " + this.height);
                        $(".error").hide();
                        if (this.width == 1905 && this.height == 567) {
                            $("#img_error1").hide();
                            $('#check_dimention_btn').removeAttr('disabled');
                        } else {
                            $('#Msg').hide();
                            $("#img_error1").show();
                            $('#check_dimention_btn').attr('disabled', 'disabled');
                            $("#image").val('');
                            //control.replaceWith(control = control.clone(true));
                        }
                    };
                    image.src = _URL.createObjectURL(file);
                } else {
                    $(".error").hide();
                    $('#Msg').hide();
                    $("#img_error3").show();
                    $("#image").val('');
                    //control.replaceWith(control = control.clone(true));
                }
            }
        });
    });

</script>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Galleries</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($gallery, array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Project Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('project_id', array('options' => $projects, 'id' => '', 'empty' => 'Select Project Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <?php /* ?>
                    <div class="form-group" id="product_id_div">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Product Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('product_id', array('options' => $product, 'id' => 'product_id', 'empty' => 'Select Product Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>                   
                    <?php  */ ?>
                    <div class="form-group" id="material_id_div">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Material Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('material_id', array('options' => $materials, 'id' => 'material_id', 'empty' => 'Select Material Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group" id="category_id_div">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Category Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('category_id', array('options' => $categories, 'id' => 'category_id', 'empty' => 'Select Category Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <?php if (!empty($gallery['image'])): ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-lg-3 control-label">Old Image:</label>
                                <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('gallery/' . $gallery['image'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                                </div>                                               
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select New Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('image_new', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'Select image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Location<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('location', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Location', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Status<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('status', array('options' => $status, 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>   
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-lg-1">
                        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-info pull-right')); ?>
                    </div>
                    <div class="col-lg-1">
                        <a onclick="goBack();" class="btn btn-danger pull-right">Cancel</a>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div>
        </div>
    </div>
</section>






