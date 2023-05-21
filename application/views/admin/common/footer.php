 <div class="sidebar-overlay" data-reff="#sidebar"></div>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

 <script>
     var type = "<?php echo $this->session->flashdata('alert-type'); ?>";
     switch (type) {
         case 'success':
             toastr.success('<?php echo $this->session->flashdata('message'); ?>', 'success', {
                 timeOut: 3000
             });
             break
         case 'info':
             toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'info', {
                 timeOut: 5000
             });
             break;
         case 'info':
             toastr.warning('<?php echo $this->session->flashdata('message'); ?>', 'warning', {
                 timeOut: 5000
             });
             break;
         case 'error':
             toastr.error('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                 timeOut: 5000
             });
             break;
     }
 </script>