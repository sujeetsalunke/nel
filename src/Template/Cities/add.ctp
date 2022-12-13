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
                    <h3 class="box-title">Add City</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($city, array('id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">City Name <span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Enter City Name', 'label' => false, 'data-bvalidator' => 'required,alpha')); ?>
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




