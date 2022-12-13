<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_page').bValidator();
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
                    <h3 class="box-title">Edit About Us</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($aboutU, array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Title<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('title', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Title', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <?php if (!empty($aboutU['image_1'])): ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-lg-3 control-label">Old Image One:</label>
                                <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('about_us/' . $aboutU['image_1'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                                </div>                                               
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Select Image One<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('image_1_new', array('type' => 'file', 'id' => 'image_1', 'class' => 'form-control', 'placeholder' => 'New Select image One', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Description One<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('description_1', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Description One', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div> 
                    <?php if (!empty($aboutU['image_2'])): ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-lg-3 control-label">Old Image Two:</label>
                                <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('about_us/' . $aboutU['image_2'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                                </div>                                               
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Select Image Two<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('image_2_new', array('type' => 'file', 'id' => 'image_2', 'class' => 'form-control', 'placeholder' => 'New Select image Two', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Description Two<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('description_2', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter description Two', 'label' => false, 'data-bvalidator' => 'required')); ?>
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





