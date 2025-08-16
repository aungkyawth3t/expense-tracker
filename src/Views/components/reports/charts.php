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