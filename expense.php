<?php
  include('src/function/url.php');
  session_start();

  if(!isset($_SESSION['user_id'])) {
      header("Location: auth/login.php");
      exit;
  }
  $title = "Expense Tracker | Expenses";
  ob_start();

  include __DIR__ . '/src/views/components/expenses/header.php';
  include __DIR__ . '/src/views/components/expenses/filters.php';

  ?>

  <div class="bg-white rounded-lg shadow overflow-hidden">
    <?php include __DIR__ . '/src/views/components/expenses/table.php'; ?>
    <?php include __DIR__ . '/src/views/components/pagination.php'; ?>
  </div>
  
  <?php include __DIR__ . '/src/views/components/modals/add-expense-modal.php' ?>
  <?php include __DIR__ . '/src/views/components/modals/delete-expense-modal.php' ?>
<?php 
$content = ob_get_clean();
include __DIR__ . '/src/views/components/layout.php';