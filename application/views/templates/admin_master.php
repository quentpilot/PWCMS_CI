<?php defined('BASEPATH') OR exit('No direct script access allowed');

				// display header page
$this->load->view("templates/$template/parts/header"); ?>

<!--<?= $sidebar_menu ?>-->

<!-- display second part of html offset render -->

<?php if (isLoged()) : ?>

<?php 			// display navbar menu
$this->load->view("templates/$template/parts/navbar_menu"); ?>

<?php 			// display sidebar menu
$this->load->view("templates/$template/parts/sidebar_menu"); ?>

	<!-- common head main sections -->

	<section class="content">
	    <div class="container-fluid">
	        <div class="block-header">
	    	    <p class="lead"><?= $module_title ?></p>
	        </div>
			
	        <!-- display alert type bootstrap set from PW_Controller core class -->

			<?php $this->load->view("templates/$template/parts/flash_alert"); ?>

<?php endif ?>

<!-- custom view content ($this->render($view_file)) -->

<?= $view_content ?>

<!-- display second part of html offset render -->

<?php if (isLoged()) : ?>

	<!-- common foot main sections -->

		</div>
	</section>

<?php endif ?>

 <!-- display header page -->

<?php $this->load->view("templates/$template/parts/footer"); ?>