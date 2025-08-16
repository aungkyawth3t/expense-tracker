<?php
if (!isset($title)) {
    $title = "Expense Tracker";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="/public/css/output.css?v=<?= time() ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- data picker package -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex h-screen overflow-hidden">
    
    <?php include __DIR__ . '/sidebar.php'; ?>
    
    <div class="flex flex-col flex-1 overflow-hidden">
      <?php include __DIR__ . '/navbar.php'; ?>

      <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
        <?= $content ?? '' ?>
      </main>
    </div>
  </div>

  <!-- Common JS -->
  <script src="/public/js/index.js"></script>
  <script src="/public/js/reports.js"></script>
  <script src="/public/js/expenses.js"></script>
  <script src="/public/js/categories.js"></script>

</body>
</html>
