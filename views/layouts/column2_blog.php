<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="row">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main pull-right">
    <?= $content; ?> 
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 side pull-left">
    <div class="pg-sidebar">          
      <?= $this->blocks['sidebar']; ?>
      
      <?= $this->blocks['toolbar']; ?>
    </div>
  </div>
</div>
<?php $this->endContent(); ?>
