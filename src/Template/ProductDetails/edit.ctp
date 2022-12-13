<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add_page').bValidator();
        var _URL = window.URL || window.webkitURL;
        $("#image").change(function (e) {
            var control = $("#image");
            //alert(control);
            var image, file;
            if ((file = this.files[0])) {
                //console.log(file);
                var name = file.name;
                var extension = name.substr((name.lastIndexOf('.') + 1));
                if (extension == 'jpeg' || extension == 'png' || extension == 'gif' || extension == 'jpg') {
                    image = new Image();
                    image.onload = function () {
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
                <div class="box box-solid">
                    <div class="box-body layout-top-nav">
                        <span class="eg">Edit Product Details</span>
                    </div>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($productDetail, array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Product Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('product_id', array('options' => $Products, 'empty' => 'Select Product Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('name', array('type' => 'text', 'empty' => 'Name', 'class' => 'form-control', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>   
                    <?php if (!empty($productDetail['cft_img_1'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Old Left Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/cft/' . $productDetail['cft_img_1'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Left Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_img_1_new', array('type' => 'file', 'id' => 'image_1', 'class' => 'form-control', 'placeholder' => 'Select Left Image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <?php if (!empty($productDetail['cft_img_2'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Old Right Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/cft/' . $productDetail['cft_img_2'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Right Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_img_2_new', array('type' => 'file', 'id' => 'image_1', 'class' => 'form-control', 'placeholder' => 'Select Right Image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <?php if (!empty($productDetail['sizes'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Old Sizes Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/sizes/' . $productDetail['sizes'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Sizes Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('sizes_new', array('type' => 'file', 'id' => 'sizes', 'class' => 'form-control', 'placeholder' => 'Select Sizes Image', 'label' => false)); ?>
                            </div>                          
                        </div>
                    </div>
                    <?php if (!empty($productDetail['varient'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Old Sizes Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/varient/' . $productDetail['varient'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Variant Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('varient_new', array('type' => 'file', 'id' => 'Variant', 'class' => 'form-control', 'placeholder' => 'Select Variant Image', 'label' => false)); ?>
                            </div>                          
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">CFT Description<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_description', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter CFT Description', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($productDetail['color_image'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Old Color Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/csn/' . $productDetail['color_image'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Color Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('color_image_new', array('type' => 'file', 'id' => 'image_1', 'class' => 'form-control', 'placeholder' => 'Select Color Image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Installed Description</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('install_text', array('class' => 'form-control ckeditor', 'placeholder' => 'Installed Description', 'label' => false)); ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($productDetail['install_img'])): ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-lg-3 control-label">Installed Image:</label>
                            <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('product/details/csn/' . $productDetail['install_img'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                            </div>                                               
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Installed Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('install_img_new', array('type' => 'file', 'id' => 'install_img', 'class' => 'form-control', 'placeholder' => 'Installed Image', 'label' => false)); ?>
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
                        <a href="<?php echo Router::url(array('controller' => 'ProductDetails', 'action' => 'index')); ?>" class="btn btn-danger pull-right">Cancel</a>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div>
        </div>
    </div>
</section>






