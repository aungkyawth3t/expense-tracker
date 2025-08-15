<?php
    include('../../function/url.php');
    include('../../bootstrap.php');

    $errors = [];
    $success = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $agreeTerms = isset($_POST['terms']) ? true : false;

        // validate inputs
        if (empty($name)) {
            $errors['name'] = 'Name is required';
        } elseif(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors['name'] = 'Only letters and spaces allowed';
        }

        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        } else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $errors['email'] = 'Email already registered';
            }
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }

        if ($confirmPassword !== $password) {
            $errors['password'] = 'Passwords do not match';
        }

        if (!$agreeTerms) {
            $errors['terms'] = 'You must agree to the terms and conditions';
        }

        // register
        if (empty($errors)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // insert
            $stmt = $pdo->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?, ?)");
            $result = $stmt->execute([
                $name,
                $email,
                $hashedPassword
            ]);
            if ($result) {
                $success = true;
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;

                header("Location: ../index.php");
                exit();
            } else {
                $errors['database'] = 'Registration failed. Please try again';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Register</title>
    <link rel="stylesheet" href="../../../public/css/output.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <?php if($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">Registration successful. Redirecting...</span>
            </div>
        <?php elseif (isset($errors['database'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline"><?= htmlspecialchars($errors['database']) ?></span>
            </div>
        <?php endif ?>

        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600">Create Account</h1>
                <p class="text-gray-600 mt-2">Join Expense Tracker Admin Dashboard</p>
            </div>
            
            <form method="POST" action="">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">
                        Full Name
                    </label>
                    <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['name']) ? 'border-red-500' : '' ?>" 
                        id="full-name" 
                        type="text" 
                        name="name" 
                        placeholder="John Doe"
                        value="<?= htmlspecialchars($name ?? '') ?>">
                        <?php if (isset($errors['name'])): ?>
                            <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['name']) ?></p>
                        <?php endif; ?>
                </div>
                    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['email']) ? 'border-red-500' : '' ?>"
                    id="email" 
                    name="email" 
                    type="email" 
                    placeholder="yourname@example.com"
                    value="<?= htmlspecialchars($email ?? '') ?>">
                    <?php if (isset($errors['email'])): ?>
                        <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['email']) ?></p>
                    <?php endif; ?>
                </div>
                    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['password']) ? 'border-red-500' : '' ?>" 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="••••••••">
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['password']) ?></p>
                        <?php endif; ?>
                </div>
                    
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">
                        Confirm Password
                    </label>
                    <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['confirm_password']) ? 'border-red-500' : '' ?>" 
                    id="confirm-password" 
                    type="password" 
                    name="confirm-password" 
                    placeholder="••••••••">
                    <?php if (isset($errors['confirm_password'])): ?>
                        <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['confirm_password']) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center">
                        <input id="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded <?= isset($errors['terms']) ? 'border-red-500' : '' ?>" name="terms">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms & Conditions</a>
                        </label>
                    </div>
                    <?php if (isset($errors['terms'])): ?>
                        <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['terms']) ?></p>
                    <?php endif; ?>
                </div>
                
                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 cursor-pointer" type="submit" name="btnRegister">
                    Register
                </button>
            </form>
            
            <div class="mt-6 text-center">
            <p class="text-gray-600 text-sm">
                Already have an account? 
                <a href="<?= url('src/views/auth/login.php') ?>" class="text-indigo-600 hover:text-indigo-500 font-medium">Sign in here</a>
            </p>
            </div>
        </div>
        <?php include('../components/copyright.php'); ?>
    </div>
</body>
</html>