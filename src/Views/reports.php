<?php
  include('../function/url.php');
  
  session_start();
  if(!isset($_SESSION['user_id'])) {
      header("Location: /auth/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Reports</title>
    <!-- tailwind css -->
    <link rel="stylesheet" href="../../public/css/output.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- charts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
      <?php include('components/sidebar.php'); ?>

        <div class="flex flex-col flex-1 overflow-hidden">
          <?php include('components/navbar.php'); ?>
            <!-- main -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
              <?php include('components/reports/header.php') ?>
              <?php include('components/reports/filter.php') ?>
              
              <!-- summary cards -->
              <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between">
                    <div>
                      <p class="text-gray-500 text-sm font-medium">Total Expenses</p>
                      <h3 class="text-2xl font-bold text-gray-800 mt-1">$3,245</h3>
                      <p class="text-green-500 text-sm mt-2">
                        <i class="fas fa-arrow-down mr-1"></i> 8% from last period
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
                        <p class="text-gray-500 text-sm font-medium">Average Daily</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">$108</h3>
                        <p class="text-red-500 text-sm mt-2">
                            <i class="fas fa-arrow-up mr-1"></i> 12% from last period
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
                      <p class="text-gray-500 text-sm font-medium">Categories Used</p>
                      <h3 class="text-2xl font-bold text-gray-800 mt-1">8</h3>
                      <p class="text-gray-500 text-sm mt-2">
                        <i class="fas fa-circle text-blue-500 mr-1"></i> 3 most active
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
                      <p class="text-gray-500 text-sm font-medium">Transactions</p>
                      <h3 class="text-2xl font-bold text-gray-800 mt-1">42</h3>
                      <p class="text-green-500 text-sm mt-2">
                          <i class="fas fa-arrow-down mr-1"></i> 5% from last period
                      </p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                      <i class="fas fa-receipt text-purple-600 text-xl"></i>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Main Report Charts -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                  <!-- Expense Trend Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Expense Trend</h2>
                    <div class="flex">
                      <button class="px-3 py-1 text-sm bg-indigo-100 text-indigo-700 rounded-l-lg">Daily</button>
                      <button class="px-3 py-1 text-sm bg-white text-gray-600 border border-l-0">Weekly</button>
                      <button class="px-3 py-1 text-sm bg-white text-gray-600 border border-l-0 rounded-r-lg">Monthly</button>
                    </div>
                  </div>
                  <div class="h-80">
                    <canvas id="expenseTrendChart"></canvas>
                  </div>
                </div>
                  
                  <!-- Category Distribution Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                  <h2 class="text-lg font-semibold text-gray-800 mb-4">Category Distribution</h2>
                  <div class="h-80">
                    <canvas id="categoryDistributionChart"></canvas>
                  </div>
                </div>
              </div>
              
              <!-- Secondary Report Sections -->
              <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                  <!-- Top Categories -->
                <div class="bg-white rounded-lg shadow p-6 lg:col-span-1">
                  <h2 class="text-lg font-semibold text-gray-800 mb-4">Top Categories</h2>
                  <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Food & Dining</span>
                            <span class="text-sm font-medium text-gray-700">$1,245 (38%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-500 h-2 rounded-full" style="width: 38%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Shopping</span>
                            <span class="text-sm font-medium text-gray-700">$845 (26%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 26%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Transportation</span>
                            <span class="text-sm font-medium text-gray-700">$520 (16%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 16%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Utilities</span>
                            <span class="text-sm font-medium text-gray-700">$320 (10%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 10%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-gray-700">Entertainment</span>
                            <span class="text-sm font-medium text-gray-700">$215 (7%)</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: 7%"></div>
                        </div>
                    </div>
                  </div>
                </div>
                  
                  <!-- Recent Large Expenses -->
                <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                  <div class="flex items-center justify-between mb-4">
                      <h2 class="text-lg font-semibold text-gray-800">Recent Large Expenses</h2>
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
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 15, 2023</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Grocery Shopping</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Food</span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$245.75</td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 12, 2023</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">New Laptop</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Shopping</span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$899.00</td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 10, 2023</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Car Repair</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Transportation</span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$320.50</td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 8, 2023</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dinner Party</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Food</span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$175.30</td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 5, 2023</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Monthly Rent</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Housing</span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$1,200.00</td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </main>
        </div>
    </div>

    <script>
        // Initialize date picker
        flatpickr("#date-range", {
            mode: "range",
            dateFormat: "Y-m-d",
        });

        // Toggle custom date range visibility
        document.getElementById('report-period').addEventListener('change', function() {
            const customRangeDiv = document.getElementById('custom-date-range');
            if (this.value === 'custom') {
                customRangeDiv.classList.remove('hidden');
            } else {
                customRangeDiv.classList.add('hidden');
            }
        });

        // Expense Trend Chart
        const trendCtx = document.getElementById('expenseTrendChart').getContext('2d');
        const expenseTrendChart = new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Jun 1', 'Jun 5', 'Jun 10', 'Jun 15', 'Jun 20', 'Jun 25', 'Jun 30'],
                datasets: [{
                    label: 'Daily Expenses',
                    data: [85, 120, 95, 245, 180, 150, 90],
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderColor: '#6366F1',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
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

        // Category Distribution Chart
        const categoryCtx = document.getElementById('categoryDistributionChart').getContext('2d');
        const categoryDistributionChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Food & Dining', 'Shopping', 'Transportation', 'Utilities', 'Entertainment', 'Others'],
                datasets: [{
                    data: [1245, 845, 520, 320, 215, 100],
                    backgroundColor: [
                        '#EF4444',
                        '#10B981',
                        '#3B82F6',
                        '#F59E0B',
                        '#8B5CF6',
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
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 20
                        }
                    }
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>