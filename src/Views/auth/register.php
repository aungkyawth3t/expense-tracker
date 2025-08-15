<?php
    include('../../function/url.php');
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
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600">Create Account</h1>
                <p class="text-gray-600 mt-2">Join Expense Tracker Admin Dashboard</p>
            </div>
            
            <form>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first-name">
                    Full Name
                </label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="first-name" type="text" placeholder="John Doe">
            </div>
                
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="email" type="email" placeholder="admin@example.com">
            </div>
                
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="password" type="password" placeholder="••••••••">
            </div>
                
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                    Confirm Password
                </label>
                <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="confirm-password" type="password" placeholder="••••••••">
            </div>
            
            <div class="mb-6">
                <div class="flex items-center">
                    <input id="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms & Conditions</a>
                    </label>
                </div>
            </div>
            
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 cursor-pointer" type="button">
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