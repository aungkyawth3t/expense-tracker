<?php
  include('src/function/url.php');
  session_start();
  if(!isset($_SESSION['user_id'])) {
    header("Location: login/index.php");
    exit;
  }

  $title = "Categories";
  ob_start();

 include __DIR__ . '/src/views/components/categories/header.php';
 include __DIR__ . '/src/views/components/categories/table.php';
 include __DIR__ . '/src/views/components/pagination.php';
// modals
 include __DIR__ . '/src/views/components/modals/add-category-modal.php';
 include __DIR__ . '/src/views/components/modals/delete-category-modal.php';

 $content = ob_get_clean();
 include __DIR__ . '/src/views/components/layout.php';
?>