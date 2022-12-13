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
            <h3 class="box-title">Manage About US</h3>
            <a style="display: none;" class="pull-right btn btn-primary" title="Add About US" href="<?php echo Router::url(array('action' => 'add')) ?>">Add New</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
                <th>Title</th>
                <th>Image One</th> 
                <th>Image Two</th> 
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aboutUs as $aboutU): ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>
                            <td><?= h($aboutU->title) ?></td>
                            <td><?php
                                if (h($aboutU->image_1) != "") {
                                    echo $this->Html->image('about_us/' . $aboutU->image_1, array('class' => "img_size", 'hieght' => 50, 'width' => 50));
                                } else {
                                    echo $this->Html->image('about_us/blank.png', array('class' => "img_size"));
                                }
                                ?>&nbsp;</td>
                            <td><?php
                                if (h($aboutU->image_2) != "") {
                                    echo $this->Html->image('about_us/' . $aboutU->image_2, array('class' => "img_size", 'hieght' => 50, 'width' => 50));
                                } else {
                                    echo $this->Html->image('about_us/blank.png', array('class' => "img_size"));
                                }
                                ?>&nbsp;</td>                           
                            <td><?= h($status[$aboutU->status]) ?></td>        
                            <td>
                                <?php echo $this->Html->link(__(''), array('action' => 'edit', $aboutU->id), array('class' => 'btn btn-xs btn-rounded btn-primary fa fa-pencil hastip', 'data-placement' => 'top', 'title' => 'Edit', 'data-toggle' => 'tooltip')); ?>   
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $aboutU->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          
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





