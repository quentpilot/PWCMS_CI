<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('templates/_parts/public_master_header'); ?>
<div class="container">
    <div class="main-content" style="padding-top:40px;">
        <?php echo $view_content; ?>
    </div>
</div>
<?php $this->load->view('templates/_parts/public_master_footer');?>