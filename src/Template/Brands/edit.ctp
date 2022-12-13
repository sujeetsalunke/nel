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
                    <h3 class="box-title">Edit Brand</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($brand, array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Name', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <?php if (!empty($brand['image'])): ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-lg-3 control-label">Old Mobile Image:</label>
                                <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('brand/' . $brand['image'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                                </div>                                               
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Mobile Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('image_new', array('type' => 'file', 'id' => '', 'class' => 'form-control', 'placeholder' => 'Mobile image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <?php if (!empty($brand['image_desktop'])): ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-lg-3 control-label">Old Desktop Image:</label>
                                <div class="col-lg-5">                                 
                                    <?php echo $this->Html->image('brand/' . $brand['image_desktop'], array('height' => '40%', 'width' => '40%')); ?>                                                          
                                </div>                                               
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">New Desktop Image</label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('new_image_desktop', array('type' => 'file', 'id' => '', 'class' => 'form-control', 'placeholder' => 'Desktop image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="Msg" hidden>Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image dimensions not valid, Image should be 1905 X 567 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image extension not valid, Image should be png,jpeg,jpg.</span>
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





