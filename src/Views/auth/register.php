<?php
    include __DIR__ . '/../../function/url.php';
    include __DIR__ . '/../../bootstrap.php';
    
    if(isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit;
    }

    $title = "Expense Tracker | Register";
    ob_start();
    $errors = [];
    $success = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $agreeTerms = isset($_POST['terms']) ? true : false;

        // validate inputs
        if (empty($username)) {
            $errors['username'] = 'UserName is required and cannot be empty.';
        } 
        elseif (preg_match("/\s/", $username)) {
            $errors['username'] = 'No spaces allowed';
        }
        elseif($username) {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                $errors['username'] = "This username is already taken.";
            }
        }

        if (empty($email)) {
            $errors['email'] = 'Email is required and cannot be empty.';
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        } 
        else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $errors['email'] = 'Email already registered';
            }
        }

        if(empty($password)) {
            $errors['password'] = 'Password is required and cannot be empty.';
        } 
        elseif(strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }

        if ($confirmPassword !== $password) {
            $errors['password'] = 'Passwords do not match';
        }

        if(!$agreeTerms) {
            $errors['terms'] = 'You must agree to the terms and conditions';
        }

        // register
        if (empty($errors)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // insert
            $stmt = $pdo->prepare("INSERT INTO users(username, email, password) VALUES (?, ?, ?)");
            $result = $stmt->execute([
                $username,
                $email,
                $hashedPassword
            ]);
            if ($result) {
                $success = true;
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $username;

                header("Location: ../../../index.php");
                exit();
            } else {
                $errors['database'] = 'Registration failed. Please try again';
            }
        }
    }
?>
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
    
    <form method="POST" action="register.php">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">
                User Name
            </label>
            <input class="appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['name']) ? 'border-red-500' : '' ?>" 
                id="full-name" 
                type="text" 
                name="username" 
                placeholder="johndoe123"
                value="<?= htmlspecialchars($username ?? '') ?>">
                <?php if (isset($errors['username'])): ?>
                    <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['username']) ?></p>
                <?php endif; ?>
        </div>
            
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['email']) ? 'border-red-500' : '' ?>"
            id="email" 
            name="email" 
            type="email" 
            placeholder="johndoe123@example.com"
            value="<?= htmlspecialchars($email ?? '') ?>">
            <?php if (isset($errors['email'])): ?>
                <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['email']) ?></p>
            <?php endif; ?>
        </div>
            
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['password']) ? 'border-red-500' : '' ?>" 
                id="password" 
                type="password" 
                name="password" 
                placeholder="•••••••••">
                <?php if (isset($errors['password'])): ?>
                    <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['password']) ?></p>
                <?php endif; ?>
        </div>
            
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">
                Confirm Password
            </label>
            <input class="appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 <?= isset($errors['confirm_password']) ? 'border-red-500' : '' ?>" 
            id="confirm-password" 
            type="password" 
            name="confirm_password" 
            placeholder="Confirm password">
            <?php if (isset($errors['confirm_password'])): ?>
                <p class="text-red-500 text-xs italic mt-1"><?= htmlspecialchars($errors['confirm_password']) ?></p>
            <?php endif; ?>
        </div>
        
        <div class="mb-6">
            <div class="flex items-center">
                <input id="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded <?= isset($errors['terms']) ? 'border-red-500' : '' ?>" name="terms">
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500 cursor-pointer">Terms & Conditions</a>
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
<?php include __DIR__ . '/../components/copyright.php'; ?>
<?php
$content = ob_get_clean();
include __DIR__ . '/../components/auth_layout.php';