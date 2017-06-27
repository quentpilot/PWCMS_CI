<?php
        
if($this->session->flashdata('message') && !$this->session->flashdata('done'))
{
  $color = $this->session->flashdata('class');
?>
  <div class="container-fluid">
    <div class="alert alert-<?= $color ?> alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p>
          <?php echo $this->session->flashdata('message');?>
      </p>
    </div>
  </div>
  
<?php
}
?>