<?php
    include('../function/url.php');
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: auth/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Categories</title>
    <link rel="stylesheet" href="../../public/css/output.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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