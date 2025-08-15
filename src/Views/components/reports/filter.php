<div class="bg-white rounded-lg shadow p-6 mb-6">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div>
          <label for="report-period" class="block text-sm font-medium text-gray-700 mb-1">Report Period</label>
          <select id="report-period" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option value="this-month">This Month</option>
              <option value="last-month">Last Month</option>
              <option value="this-quarter">This Quarter</option>
              <option value="last-quarter">Last Quarter</option>
              <option value="this-year">This Year</option>
              <option value="custom">Custom Range</option>
          </select>
      </div>
      <div id="custom-date-range" class="hidden">
          <label for="date-range" class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
          <input id="date-range" type="text" class="flatpickr block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" placeholder="Select date range">
      </div>
      <div>
          <label for="report-type" class="block text-sm font-medium text-gray-700 mb-1">Report Type</label>
          <select id="report-type" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option value="summary">Summary Report</option>
              <option value="category">Category Breakdown</option>
              <option value="trend">Trend Analysis</option>
              <option value="comparison">Month Comparison</option>
          </select>
      </div>
      <div class="flex items-end">
          <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">
              <i class="fas fa-filter mr-2"></i> Generate Report
          </button>
      </div>
  </div>
</div>