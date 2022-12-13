<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_page').bValidator();
    });
</script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Cms Pages</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($cmsPage, array('type' => 'file', 'role' => 'form', 'id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Title<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('title', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Title', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Display Name<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('display_name', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Display Name', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Meta Title<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('meta_title', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Enter Meta Title', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Meta Keyword<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('meta_keyword', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Meta Keyword', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Meta Description<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('meta_description', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Meta Description', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Description<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('description', array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Description', 'label' => false, 'data-bvalidator' => 'required')); ?>
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





