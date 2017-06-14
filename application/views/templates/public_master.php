<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('templates/_parts/public_master_header'); ?>

<!-- custom view content ($this->render($view_file)) -->
<?= $view_content ?>

<?php $this->load->view('templates/_parts/public_master_footer');?>