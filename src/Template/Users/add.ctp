<?php

use Cake\Routing\Router; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_page').bValidator();
        $('#email').blur(function() {
            var email_id = $('#email').val();
            if (email_id != '') {
                var base_path = "<?= Router::url('/', true) ?>";
                var urls = base_path + "users/check_email/" + email_id;
                $.ajax({url: urls, dataType: 'json'}).done(function(data) {                
                    if (data['result'] == 1) {
                        $('#error_email').show();
                        $("#email").val("");
                    } else if (data['result'] == 0) {
                        $('#error_email').hide();
                    }
                });
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
                    <h3 class="box-title">Add User</h3>
                </div>
                <!-- form start -->
                <?php echo $this->Form->create($user, array('id' => 'add_page')); ?>
                <div class="box-body">
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Name <span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Enter Name', 'label' => false, 'data-bvalidator' => 'required,alpha')); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Email<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter User Name', 'label' => false, 'data-bvalidator' => 'required,email')); ?>
                                <span id="error_email" style="color: red" hidden>Email Already exists</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Password<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter Password', 'label' => false, 'data-bvalidator' => 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="row">
                            <label class="col-lg-3 control-label">Mobile<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('mobile', array('class' => 'form-control', 'placeholder' => 'Enter Mobile','maxlength' => '10', 'label' => false, 'data-bvalidator' => 'required,minlength[10]')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class ="row">
                            <label class="col-lg-3 control-label">Role<span class="required" aria-required="true"> * </span></label>
                            <div class="col-lg-5">
                                <?php echo $this->Form->input('role', array('class' => 'form-control','value' => 1, 'placeholder' => 'Enter Role', 'label' => false, 'data-bvalidator' => 'required')); ?>
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




