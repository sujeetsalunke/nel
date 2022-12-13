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
                        if (this.width == 940 && this.height == 627) {
                            $("#img_error1").hide();
                            $("#img_error_msg").hide();
                            $('#check_dimention_btn').removeAttr('disabled');
                        } else {
                            $("#img_error1").show();
                            $('#check_dimention_btn').attr('disabled', 'disabled');
                            $("#image").val('');
                            //control.replaceWith(control = control.clone(true));
                        }
                    };
                    image.src = _URL.createObjectURL(file);
                } else {
                    $(".error").hide();
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
                        <span class="eg">Product Color Images</span>
                        <header class="main-header">
                            <nav class="navbar navbar-static-top">
                                <div class="container-fluid">
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?php echo Router::url(array('controller' => 'ProductDetails', 'action' => 'edit', $id)); ?>">Product Color Image <span class="sr-only"></span></a></li>
                                            <li class="active"><a href="#">Product Color Image <span class="sr-only"></span></a></li>                                            
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </header>
                    </div>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create('productColorImage', array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Type<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('type', array('options' => array('1' => 'CFT', '2' => 'CSN'), 'class' => 'form-control', 'empty' => 'Select Type', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Name', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Image<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('image', array('type' => 'file', 'id' => '', 'class' => 'form-control', 'placeholder' => 'Select image', 'label' => false)); ?>
                            </div>
                            <span style="color:red" class="error" id="img_error_msg" hidden>Image should be 940 X 627 (pixel).</span>
                            <span style="color:red" class="error" id="img_error1" hidden>Image icon dimensions not valid, Image should be 940 X 627 (pixel).</span>
                            <span style="color:red" class="error" id="img_error3" hidden>Image icon extension not valid, Image should be png,jpeg,jpg.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Status<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('status', array('options' => $status, 'class' => 'form-control', 'empty' => 'Select', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-lg-1">
                        <?= $this->Html->link(__('Prev'), ['controller' => 'ProductDetails', 'action' => 'edit', $id], ['class' => 'btn  btn-warning pull-right', 'escape' => false]) ?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-info pull-right')); ?>
                    </div>
                    <div class="col-lg-1">
                        <?= $this->Html->link(__('Skip'), ['controller' => 'ProductDetails', 'action' => 'index'], ['class' => 'btn  btn-warning pull-right', 'escape' => false]) ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div>
        </div>
    </div>
</section>



<script>
    $(function() {
        $('#example1').DataTable({
            "lengthMenu": [[20, 50, -1], [20, 50, "All"]]
        });
    });
</script>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Manage Studio Images</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>     
                <th>Type</th> 
                <th>Name</th>  
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($productColorImages as $productColorImage): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>   
                            <?php if (!empty($productColorImage->type) && $productColorImage->type == 1) { ?>
                                <td>CFT</td>
                            <?php } else { ?>
                                <td>CSN</td>
                            <?php } ?>
                            <td><?= h($productColorImage->name) ?></td>
                            <td><?= h($productColorImage->image) ?></td>
                            <td><?php
                                if (h($productColorImage->image) != "") {
                                    echo $this->Html->image('product/details/color_image/' . $productColorImage->image, array('class' => "img_size", 'hieght' => 50, 'width' => 50));
                                } else {
                                    echo $this->Html->image('product/details/color_image/blank.png', array('class' => "img_size"));
                                }
                                ?>&nbsp;</td>
                            <td><?= h($status[$productColorImage->status]) ?></td>
                            <td>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $productColorImage->id, $productColorImage->product_detail_id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $productColorImage->id, $productColorImage->product_detail_id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>
                            </td>
                        </tr>
                        <?php $i = $i + 1; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->









