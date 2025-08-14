<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">

        
        
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none md:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative mx-4 md:mx-0">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                        <input class="w-full py-2 pl-10 pr-4 text-gray-700 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" type="search" placeholder="Search...">
                    </div>
                </div>
                
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none mx-4">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="text-gray-500 focus:outline-none mx-4">
                        <i class="fas fa-envelope"></i>
                    </button>
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile">
                            <span class="ml-2 text-sm font-medium text-gray-700">John Doe</span>
                            <i class="fas fa-chevron-down ml-1 text-gray-500 text-xs"></i>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                    <p class="text-gray-600">Welcome back, John! Here's what's happening with your expenses today.</p>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Expenses</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">$12,345</h3>
                                <p class="text-green-500 text-sm mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                                </p>
                            </div>
                            <div class="bg-indigo-100 p-3 rounded-full">
                                <i class="fas fa-wallet text-indigo-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Monthly Budget</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">$8,000</h3>
                                <p class="text-red-500 text-sm mt-2">
                                    <i class="fas fa-arrow-down mr-1"></i> 8% over budget
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-chart-line text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Categories</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">14</h3>
                                <p class="text-gray-500 text-sm mt-2">
                                    <i class="fas fa-circle text-blue-500 mr-1"></i> 5 new this month
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-tags text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Savings</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">$3,200</h3>
                                <p class="text-green-500 text-sm mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 5% from last month
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i class="fas fa-piggy-bank text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Monthly Expenses Chart -->
                    <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Monthly Expenses</h2>
                            <div class="flex">
                                <button class="px-3 py-1 text-sm bg-indigo-100 text-indigo-700 rounded-l-lg">Month</button>
                                <button class="px-3 py-1 text-sm bg-white text-gray-600 border border-l-0">Quarter</button>
                                <button class="px-3 py-1 text-sm bg-white text-gray-600 border border-l-0 rounded-r-lg">Year</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="monthlyExpensesChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Expense Breakdown -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Expense Breakdown</h2>
                        <div class="h-64">
                            <canvas id="expenseBreakdownChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Transactions and Budget Progress -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Recent Transactions</h2>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 15, 2023</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Grocery Shopping</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Food</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$125.75</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 14, 2023</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Electric Bill</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Utilities</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$85.20</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 12, 2023</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dinner with Friends</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dining Out</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$64.30</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 10, 2023</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Gas Station</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Transportation</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$45.00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 8, 2023</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Netflix Subscription</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Entertainment</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$14.99</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Budget Progress -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Budget Progress</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Food & Dining</span>
                                    <span class="text-sm font-medium text-gray-700">$425/$600</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 70%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Transportation</span>
                                    <span class="text-sm font-medium text-gray-700">$210/$300</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 70%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Utilities</span>
                                    <span class="text-sm font-medium text-gray-700">$185/$250</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 74%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Entertainment</span>
                                    <span class="text-sm font-medium text-gray-700">$95/$150</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-purple-500 h-2.5 rounded-full" style="width: 63%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Shopping</span>
                                    <span class="text-sm font-medium text-gray-700">$320/$400</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-red-500 h-2.5 rounded-full" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                                Add New Budget
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Monthly Expenses Chart
        const monthlyExpensesCtx = document.getElementById('monthlyExpensesChart').getContext('2d');
        const monthlyExpensesChart = new Chart(monthlyExpensesCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Expenses',
                    data: [1200, 1900, 1500, 2000, 1800, 2200, 1700],
                    backgroundColor: '#6366F1',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Expense Breakdown Chart
        const expenseBreakdownCtx = document.getElementById('expenseBreakdownChart').getContext('2d');
        const expenseBreakdownChart = new Chart(expenseBreakdownCtx, {
            type: 'doughnut',
            data: {
                labels: ['Food', 'Transportation', 'Utilities', 'Entertainment', 'Shopping', 'Others'],
                datasets: [{
                    data: [25, 15, 20, 10, 20, 10],
                    backgroundColor: [
                        '#6366F1',
                        '#10B981',
                        '#F59E0B',
                        '#8B5CF6',
                        '#EF4444',
                        '#64748B'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>