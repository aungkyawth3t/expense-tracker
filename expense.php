<?php
  include __DIR__ . '/src/function/url.php';
  require_once __DIR__ . '/src/function/isLoggedIn.php';
  require_once __DIR__ . '/src/bootstrap.php';
  $title = "Expenses";

  $stmt = $pdo->prepare("SELECT * FROM categories");
  $stmt->execute();
  $categories = $stmt->fetchAll();

  $errors = "";
  if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btnSaveExpense']) {
    $expenseDate = $_POST['expense_date'] ?? null;
    $amount = $_POST['amount'] ?? 0;
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $paymentMethod = trim($_POST['payment_method'] ?? '');
    $status = $_POST['paid'] ? true : false;

    if(empty($expenseDate)) {
      $errors['expense_date'] = "Expense date is required";
    }

    if(empty($amount)) {
      $errors['amount'] = "Amount is required";
    }

    if(empty($description)) {
      $errors['description'] = "Description is required";
    }

    if(empty($category)) {
      $errors['category'] = "Category is required";
    } else {
      $stmt = $pdo->prepare("SELECT * FROM categories WHERE name = ?");
      $stmt->execute([$category]);
      $category_result = $stmt->fetch();
      $category_id = $category_result['id'];
    }

    if(empty($paymentMethod)) {
      $errors['payment_method'] = "Payment method is required";
    }

    if(empty($errors)) {
      $stmt = $pdo->prepare("INSERT INTO expenses(user_id, category_id, amount, description, expense_date, payment_method, status) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $stmt->execute([
        $_SESSION['user_id'],
        $category_id,
        $amount,
        $description,
        $expenseDate,
        $paymentMethod,
        $status
      ]);
      header("Location: expense.php");
      exit();
    } else {
      header("Location: index.php");
    }
  }




  ob_start();
  include __DIR__ . '/src/views/components/expenses/header.php';
  include __DIR__ . '/src/views/components/expenses/filters.php';
?>

<div class="bg-white rounded-lg shadow overflow-hidden">
  <?php include __DIR__ . '/src/views/components/expenses/table.php'; ?>
  <?php include __DIR__ . '/src/views/components/pagination.php'; ?>
</div>

<?php include __DIR__ . '/src/views/components/modals/add-expense-modal.php' ?>
<?php include __DIR__ . '/src/views/components/modals/delete-expense-modal.php' ?>

<?php
  $content = ob_get_clean();
  include __DIR__ . '/src/views/components/layout.php';
?>