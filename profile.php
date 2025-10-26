<?php
  include('src/function/url.php');
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location: src/views/auth/login.php");
    exit;
  }

  $title = "Expense Tracker | Dashboard";
  ob_start();
?>
  <div class="flex-1">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold text-gray-800">Profile</h2>
    </div>

    <div class="max-w-6xl mx-auto space-y-6">
      <?php 
        include __DIR__ . '/src/views/components/profile/profile-card.php';
        include __DIR__ . '/src/views/components/profile/account-settings.php';
        include __DIR__ . '/src/views/components/profile/statistics.php';
      ?>
    </div>
  </div>

<?php
  $content = ob_get_clean();
  include __DIR__ . '/src/views/components/layout.php';
?>