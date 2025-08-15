<?php
    include('../function/url.php');
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: /auth/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Dashboard</title>
    <!-- tailwind css -->
    <link rel="stylesheet" href="../../public/css/output.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">

        <?php include('components/sidebar.php') ?>

        <div class="flex flex-col flex-1 overflow-hidden">
            <?php include('components/navbar.php') ?>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <?php include('components/home/welcometext.php') ?>
                <?php include('components/home/stats-cards.php') ?>
                <?php include('components/home/charts.php') ?>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <?php include('components/home/recent-transactions.php') ?>
                    <?php include('components/home/budget-progress.php') ?>
                </div>
            </main>
        </div>
    </div>

    <script src="../../public/js/index.js"></script>
</body>
</html>