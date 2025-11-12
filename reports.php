<?php
  include __DIR__ . '/src/function/url.php';
  require_once __DIR__ . '/src/function/isLoggedIn.php';
  $title = "Reports";

  ob_start();
  include __DIR__ . '/src/views/components/reports/header.php';
  include __DIR__ . '/src/views/components/reports/filter.php';
  include __DIR__ . '/src/views/components/reports/summary-cards.php';

?>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <?php include __DIR__ . '/src/views/components/reports/charts.php'; ?>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php include __DIR__ . '/src/views/components/reports/secondary-report.php'; ?>
    <?php include __DIR__ . '/src/views/components/reports/recent-expenses.php'; ?>
  </div>

<?php
  $content = ob_get_clean();
  include __DIR__ . '/src/views/components/layout.php';
?>