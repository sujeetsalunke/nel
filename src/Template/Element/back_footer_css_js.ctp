<?php
echo $this->Html->script(array(
    'back_end/plugins/jQuery/jQuery-2.1.4.min.js',
    'back_end/bootstrap/js/bootstrap.min.js'
));
?>

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<?php
echo $this->Html->script(array(
    'back_end/plugins/morris/morris.min.js',
    'back_end/plugins/sparkline/jquery.sparkline.min.js',
    'back_end/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'back_end/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'back_end/plugins/knob/jquery.knob.js',            
));
?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<?php
echo $this->Html->script(array(
    'back_end/plugins/daterangepicker/daterangepicker.js',
    'back_end/plugins/datepicker/bootstrap-datepicker.js',
    'back_end/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'back_end/plugins/slimScroll/jquery.slimscroll.min.js',
    'back_end/plugins/fastclick/fastclick.min.js',     
    'back_end/dist/js/app.min.js',
    'back_end/dist/js/pages/dashboard.js'
));
?>