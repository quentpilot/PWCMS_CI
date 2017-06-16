<?= debug($list_install) ?>

<div class="row">

	<?php if (count($list_install) > 0) :

		foreach ($list_install as $plugin => $data)
		{
			$slug = $list['slug'];

	?>
		    <div class="col-sm-6 col-md-3">
		        <div class="thumbnail">
		            <img src="http://placehold.it/500x300">
		            <div class="caption">
		                <h3><?= $list['name'] ?></h3>
		                <p>
		                    <?= $list['description'] ?>
		                </p>
		                <p>
		                    <a href="<?= site_url("admin/plugins/install/$slug") ?>" class="btn bg-teal btn-lg waves-effect" role="button">Installer</a>
		                </p>
		            </div>
		        </div>
		    </div>

	<?php 

		}

	endif; 
	?>

    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="http://placehold.it/500x300">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    text ever since the 1500s
                </p>
                <p>
                    <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="http://placehold.it/500x300">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    text ever since the 1500s
                </p>
                <p>
                    <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="http://placehold.it/500x300">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    text ever since the 1500s
                </p>
                <p>
                    <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
                </p>
            </div>
        </div>
    </div>
</div>