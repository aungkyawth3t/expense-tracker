<?php
    include('src/function/url.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">

        <?php include('src/Views/components/sidebar.php') ?>

        <div class="flex flex-col flex-1 overflow-hidden">
            <?php include('src/Views/components/navbar.php') ?>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <?php include('src/Views/components/welcometext.php') ?>
                <?php include('src/Views/components/stats-cards.php') ?>
                <?php include('src/Views/components/charts.php') ?>
                <!-- recent transactions and budget -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <?php include('src/Views/components/recent-transactions.php') ?>
                    <?php include('src/Views/components/budget-progress.php') ?>
                </div>
            </main>
        </div>
    </div>

    <script src="public/js/script.js"></script>
</body>
</html>