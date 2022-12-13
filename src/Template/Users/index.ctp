<?php

use Cake\Routing\Router; ?>
<script>
    $(function() {
        $('#example1').DataTable({
            "lengthMenu": [[20, 50, -1], [20, 50, "All"]]
        });
    });
</script>
<?php $user_data = $this->request->Session()->read('Auth.User'); ?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Manage Users</h3>
            <?php if (!empty($user_data) && isset($user_data) && $user_data['role'] == '1') { ?>
                <a class="pull-right btn btn-primary" title="Add User" href="<?php echo Router::url(array('action' => 'add')) ?>">Add New</a>
            <?php } ?>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
                <th>Full Name</th>  
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>
                            <td><?= h($user->name) ?></td>                         
                            <td><?= h($status[$user->status]) ?></td>
                            <td>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $user->id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>
                              
                                    <?php if ($user->status == 1): ?>
                                        <?php echo $this->Html->link(__(' '), array('action' => 'change_status', $user->id), array('class' => 'btn btn-success btn-xs fa fa-check', 'title' => 'Deactivate', 'data-toggle' => "tooltip")); ?>
                                    <?php else: ?>
                                        <?php echo $this->Html->link(__(' '), array('action' => 'change_status', $user->id), array('class' => 'btn btn-warning btn-xs fa fa-times', 'title' => 'Activate', 'data-toggle' => "tooltip")); ?>
                                    <?php endif; ?>
                                    <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $user->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          
                              
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
