<?php
include('../function/url.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

$title = "Expense Tracker | Dashboard";

ob_start();
?>
  <?php include __DIR__ . '/components/home/welcometext.php'; ?>
  <?php include __DIR__ . '/components/home/stats-cards.php'; ?>
  <?php include __DIR__ . '/components/home/charts.php'; ?>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php include __DIR__ . '/components/home/recent-transactions.php'; ?>
    <?php include __DIR__ . '/components/home/budget-progress.php'; ?>
  </div>
<?php
$content = ob_get_clean();
// Render inside layout
include __DIR__ . '/components/layout.php';
