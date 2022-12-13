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
            <h3 class="box-title">Manage Cities</h3>
            <?php if (!empty($user_data) && isset($user_data) && $user_data['role'] == '1') { ?>
                <a class="pull-right btn btn-primary" title="Add Cities" href="<?php echo Router::url(array('action' => 'add')) ?>">Add New</a>
            <?php } ?>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
                <th>City Name</th>  
                <th>Status</th>  
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($cities as $city): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>
                            <td><?= h($city->name) ?></td>
                            <td><?= h($status[$city->status]) ?></td>                    
                            <td>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $city->id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>            
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $city->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          

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

