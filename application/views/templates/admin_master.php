<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view("templates/$template/parts/header"); ?>

<!-- display second part of html offset render -->

<?php if (isLoged()) : ?>

	<section class="content">
	    <div class="container-fluid">
	        <div class="block-header">
	    	    <p class="lead"><?= $module_title ?></p>
	        </div>
			
	        <!-- display alert type bootstrap set from PW_Controller core class -->

			<?= $flash_alert ?>

<?php endif ?>

<!-- custom view content ($this->render($view_file)) -->

<?= $view_content ?>

<!-- display second part of html offset render -->

<?php if (isLoged()) : ?>

		</div>
	</section>

<?php endif ?>

<?php $this->load->view("templates/$template/parts/footer"); ?>