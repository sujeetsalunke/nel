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
            <h3 class="box-title">Manage Gallery</h3>
            <a class="pull-right btn btn-primary" title="Add Gallery" href="<?php echo Router::url(array('action' => 'add')) ?>">Add New</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
                <th>Project Name</th>
            <?php /* ?>    <th>Product Name</th> <?php */ ?>
                <th>Material Name</th>
                <th>Category Name</th>
                <th>Image</th>                          
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($galleries as $gallery): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>     
                            <td><?= h($projects[$gallery->project_id]) ?></td>
                       <?php /* ?>     <td><?= h($product[$gallery->product_id]) ?></td> <?php */ ?>
                            <td><?= h($materials[$gallery->material_id]) ?></td>
                            <td><?= h($categories[$gallery->category_id]) ?></td>
                            <td><?php
                                if (h($gallery->image) != "") {
                                    echo $this->Html->image('gallery/' . $gallery->image, array('class' => "img_size", 'hieght' => 50, 'width' => 50));
                                } else {
                                    echo $this->Html->image('gallery/blank.png', array('class' => "img_size"));
                                }
                                ?>&nbsp;</td> 
                            <td><?= h($status[$gallery->status]) ?></td>        
                            <td>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $gallery->id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>   
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $gallery->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          
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





