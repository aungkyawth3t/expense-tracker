<?php
  include('../function/url.php');
  session_start();

  if(!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
  }

  $title = "Expense Tracker | Reports";
  ob_start();
?>
  <?php include __DIR__ . '/components/reports/header.php'; ?>
  <?php include __DIR__ . '/components/reports/filter.php'; ?>
  <?php include __DIR__ . '/components/reports/summary-cards.php'; ?>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <?php include __DIR__ . '/components/reports/charts.php'; ?>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php include __DIR__ . '/components/reports/secondary-report.php'; ?>
    <?php include __DIR__ . '/components/reports/recent-expenses.php'; ?>
  </div>
<?php

$content = ob_get_clean();
include __DIR__ . '/components/layout.php';