<?php if($this->session->flashdata('flash_message')):?>
<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <?php echo $this->session->flashdata('flash_message');?>
</div>
<?php endif;?>
<?php if($this->session->flashdata('error_message')):?>
<div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
         <?php echo $this->session->flashdata('error_message');?>
</div>
<?php endif;?>