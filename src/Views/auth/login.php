<?php
    include __DIR__ . '/../../function/url.php';
    include __DIR__ . '/../../bootstrap.php';

    $title = "Expense Tracker | Login";
    ob_start();
    $errors = [];
    $success = false;

    if(isset($_SERVER['REQUEST_METHOD' === 'POST'])) {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }
    }
?>

<div class="bg-white rounded-lg shadow-xl p-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-indigo-600">Expense Tracker</h1>
        <p class="text-gray-600 mt-2">Admin Dashboard</p>
    </div>
    
    <form method="POST" action="login.php">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                id="email" 
                type="email" 
                placeholder="admin@example.com"
                name="email">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                id="password" 
                type="password" 
                placeholder="••••••••"
                name="password">
        </div>
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>
            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">
                Forgot password?
            </a>
        </div>
        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 cursor-pointer" 
            type="submit"
            name="btnSignin">
            Sign In
        </button>
    </form>
    
    <div class="mt-6 text-center">
        <p class="text-gray-600 text-sm">
            Don't have an account? 
            <a href="<?= url('src/views/auth/register.php') ?>" class="text-indigo-600 hover:text-indigo-500 font-medium">Register here</a>
        </p>
    </div>
</div>
<!-- <?php include __DIR__ . '/../components/copyright.php'; ?> -->

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/auth_layout.php';