<?php
    include('../function/url.php');
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: auth/login.php");
        exit;
    }

    $title = "Expense Tracker | Categories";
    ob_start();
?>
    <?php include __DIR__ . '/components/categories/header.php'; ?>
    <?php include __DIR__ . '/components/categories/table.php'; ?>
    <?php include __DIR__ . '/components/pagination.php'; ?>
    <!-- modals -->
    <?php include __DIR__ . '/components/modals/add-category-modal.php'; ?>
    <?php include __DIR__ . '/components/modals/delete-category-modal.php'; ?>
<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';