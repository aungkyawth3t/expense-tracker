<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600">Expense Tracker</h1>
                <p class="text-gray-600 mt-2">Admin Dashboard</p>
            </div>
            
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="email" type="email" placeholder="admin@example.com">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="password" type="password" placeholder="••••••••">
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
                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150" type="button">
                    Sign In
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    Don't have an account? 
                    <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Register here</a>
                </p>
            </div>
        </div>
        
        <div class="mt-6 text-center text-gray-500 text-xs">
            &copy;2025 Aung Kyaw Thet. All rights reserved.
        </div>
    </div>
</body>
</html>