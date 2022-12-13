<?php

use Cake\Routing\Router; ?>
<script>
    $(function () {
        $('#example1').DataTable({
            "lengthMenu": [[20, 50, -1], [20, 50, "All"]]
        });
    });
</script>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Manage Query</h3>         
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($queries as $query): ?>
                    <tr role="row" class="odd">
                        <td><?php echo $i; ?></td>
                        <td><?= h($query->name) ?></td>
                        <td><?= h($query->email) ?></td>
                        <?php if(!empty($query->subject)){ ?>
                        <td><?= h($query->subject) ?></td>
                        <?php }else{ ?>
                        <td>-</td>
                     <?php } ?>
                        <td><?= h($query->phone) ?></td>  
                        <td><?= h($query->msg) ?></td>  
                        <td>                               
                                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $query->id), array('class' => 'btn btn-xs btn-rounded btn-danger fa fa-trash-o', 'data-placement' => 'top', 'title' => 'Delete', 'data-placement' => 'top', 'data-toggle' => 'tooltip'), __('Are you sure you want to delete # %s?')); ?>          
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




