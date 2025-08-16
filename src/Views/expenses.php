<?php
    include('../function/url.php');
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: auth/login.php");
        exit;
    }
    $title = "Expense Tracker | Expenses";
    ob_start();
?>
    <?php include __DIR__ . '/components/expenses/header.php'; ?>
    <?php include __DIR__ . '/components/expenses/filters.php'; ?>
    <!-- table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <?php include __DIR__ . '/components/expenses/table.php'; ?>
        <?php include __DIR__ . '/components/pagination.php'; ?>
    </div>
    <!-- modals -->
    <?php include('components/modals/add-expense-modal.php'); ?>
    <?php include('components/modals/delete-expense-modal.php'); ?>
<?php 
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';