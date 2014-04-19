<?php $this->beginContent('@app/views/layouts/'.\app\modules\app\controllers\AppController::mainlayout.'.php'); ?>
<div id="content">
  <?= $content; ?>
</div><!-- container -->
<?php $this->endContent(); ?>
