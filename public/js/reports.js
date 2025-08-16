// Initialize date picker
flatpickr("#date-range", {
  mode: "range",
  dateFormat: "Y-m-d",
});

// Toggle custom date range visibility
document.getElementById('report-period').addEventListener('change', function () {
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