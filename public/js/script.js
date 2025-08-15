// Monthly Expenses Chart
const monthlyExpensesCtx = document.getElementById('monthlyExpensesChart').getContext('2d');
const monthlyExpensesChart = new Chart(monthlyExpensesCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'Expenses',
            data: [100000, 190000, 150000, 200000, 180000, 220000, 170000],
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

// category modal
function openAddCategoryModal() {
    document.getElementById('addCategoryModal').classList.remove('hidden');
}

function closeAddCategoryModal() {
    document.getElementById('addCategoryModal').classList.add('hidden');
}

function openEditCategoryModal() {
    // Pre-fill form with category data
    document.getElementById('categoryName').value = 'Food & Dining';
    document.getElementById('categoryDescription').value = 'Groceries, restaurants, etc.';
    document.getElementById('categoryBudget').value = '600';
    document.getElementById('categoryIcon').value = 'utensils';
    document.getElementById('categoryColor').value = 'red';
    document.getElementById('modal-title').textContent = 'Edit Category';
    openAddCategoryModal();
}

function openDeleteCategoryModal() {
    document.getElementById('deleteCategoryModal').classList.remove('hidden');
}

function closeDeleteCategoryModal() {
    document.getElementById('deleteCategoryModal').classList.add('hidden');
}