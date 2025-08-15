<?php
    include('../function/url.php');
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