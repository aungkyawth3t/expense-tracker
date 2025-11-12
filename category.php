<?php

  include __DIR__ . '/src/function/url.php';
  require_once __DIR__ . '/src/function/auth_check.php';
  $title = "Categories";

  ob_start();

  include __DIR__ . '/src/views/components/categories/header.php';
  include __DIR__ . '/src/views/components/categories/table.php';
  include __DIR__ . '/src/views/components/pagination.php';
  include __DIR__ . '/src/views/components/modals/add-category-modal.php';
  include __DIR__ . '/src/views/components/modals/delete-category-modal.php';
  
 $content = ob_get_clean();
 include __DIR__ . '/src/views/components/layout.php';

?>