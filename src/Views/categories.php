<?php
    include('../function/url.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Categories</title>
    <link rel="stylesheet" href="../../public/css/output.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">

        <?php include 'components/sidebar.php'; ?>
        
        <!-- main -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <?php include 'components/navbar.php'; ?>
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <?php include('components/categories/header.php'); ?>
                <?php include('components/categories/table.php'); ?>
                <?php include('components/pagination.php'); ?>
            </main>
        </div>
    </div>

    <!-- modals -->
    <?php include('components/modals/add-category-modal.php'); ?>
    <?php include('components/modals/delete-category-modal.php'); ?>


    <script src="../../public/js/categories.js"></script>
</body>
</html>