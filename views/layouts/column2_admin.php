<?php $this->beginContent('@app/views/layouts/main_admin.php'); ?>
<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">          
      <?= $this->blocks['sidebar']; ?>
  </div>      
</nav>

<div id="page-wrapper">
    <?= $content; ?>
</div>
<!-- /#page-wrapper -->

<?php $this->endContent(); ?>
