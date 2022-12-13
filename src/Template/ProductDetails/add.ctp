<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add_page').bValidator();
    });
</script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">               
                <div class="box box-solid">
                    <div class="box-body layout-top-nav">
                        <span class="eg">Add Product Details</span>
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
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select Left Image<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_img_1', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'Select Left Image', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select Right Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_img_2', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'Select Right Image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select Sizes Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('sizes', array('type' => 'file', 'id' => 'Sizes', 'class' => 'form-control', 'placeholder' => 'Select Sizes Image', 'label' => false)); ?>
                            </div>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select Variant Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('varient', array('type' => 'file', 'id' => 'Sizes', 'class' => 'form-control', 'placeholder' => 'Select Variant Image', 'label' => false)); ?>
                            </div>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Description<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('cft_description', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Description', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Select Color Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('color_image', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'Select Color Image', 'label' => false)); ?>
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
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Installed Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('install_img', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'Installed Image', 'label' => false)); ?>
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






