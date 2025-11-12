<?php
  include __DIR__ . '/src/function/url.php';
  require_once __DIR__ . '/src/function/isLoggedIn.php';
  $title = "Expenses";

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
?>