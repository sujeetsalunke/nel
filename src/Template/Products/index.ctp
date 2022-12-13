<?php

use Cake\Routing\Router; ?>
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
            <h3 class="box-title">Manage Product</h3>
            <a class="pull-right btn btn-primary" title="Add Project" href="<?php echo Router::url(array('action' => 'add')) ?>">Add New</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
             <?php /* ?>    <th>Project Name</th> <?php */ ?>
                <th>Name</th>
                <th>Image</th> 
                <th>Home</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($products as $product): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>
                          <?php /* ?>   <td><?= h($projects[$product->project_id]) ?></td> <?php */ ?>
                            <td><?= h($product->name) ?></td>
                            <td><?php
                                if (h($product->image) != "") {
                                    echo $this->Html->image('product/main/' . $product->image, array('class' => "img_size", 'hieght' => 50, 'width' => 50));
                                } else {
                                    echo $this->Html->image('project/main/blank.png', array('class' => "img_size"));
                                }
                                ?>&nbsp;</td> 
                            <?php if (!empty($product->home_active) && $product->home_active == 1) { ?>
                                <td>Yes</td>
                            <?php } else { ?>
                                <td>No</td>
                            <?php } ?>
                            <td><?= h($status[$product->status]) ?></td>        
                            <td>
                                <?php if ($product->home_active == 1): ?>
                                    <?php echo $this->Html->link(__(' '), array('action' => 'change_status', $product->id), array('class' => 'btn btn-success btn-xs fa fa-check', 'title' => 'Deactivate', 'data-toggle' => "tooltip")); ?>
                                <?php else: ?>
                                    <?php echo $this->Html->link(__(' '), array('action' => 'change_status', $product->id), array('class' => 'btn btn-warning btn-xs fa fa-times', 'title' => 'Activate', 'data-toggle' => "tooltip")); ?>
                                <?php endif; ?>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $product->id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>   
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $product->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          
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





