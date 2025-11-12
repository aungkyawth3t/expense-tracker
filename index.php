<?php
  include __DIR__ . '/src/function/url.php';
  require_once __DIR__ . '/src/function/auth_check.php';
  $title = "Dashboard";

  ob_start();

  include __DIR__ . '/src/views/components/home/welcometext.php';
  include __DIR__ . '/src/views/components/home/stats-cards.php';
  include __DIR__ . '/src/views/components/home/charts.php';

?>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php include __DIR__ . '/src/views/components/home/recent-transactions.php'; ?>
    <?php include __DIR__ . '/src/views/components/home/budget-progress.php'; ?>
  </div>
  
<?php
  $content = ob_get_clean();
  include __DIR__ . '/src/views/components/layout.php';
?>