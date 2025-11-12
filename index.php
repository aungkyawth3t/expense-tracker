<?php
include('src/function/url.php');
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login/index.php");
  exit;
}

$title = "Dashboard";

ob_start();
?>
  <?php include __DIR__ . '/src/views/components/home/welcometext.php'; ?>
  <?php include __DIR__ . '/src/views/components/home/stats-cards.php'; ?>
  <?php include __DIR__ . '/src/views/components/home/charts.php'; ?>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php include __DIR__ . '/src/views/components/home/recent-transactions.php'; ?>
    <?php include __DIR__ . '/src/views/components/home/budget-progress.php'; ?>
  </div>
<?php
$content = ob_get_clean();
include __DIR__ . '/src/views/components/layout.php';