// Initialize date pickers
flatpickr("#date-range", {
    mode: "range",
    dateFormat: "Y-m-d",
});

flatpickr("#expenseDate", {
    dateFormat: "Y-m-d",
    defaultDate: "today"
});

// Modal functions
function openAddExpenseModal() {
    document.getElementById('addExpenseModal').classList.remove('hidden');
}

function closeAddExpenseModal() {
    document.getElementById('addExpenseModal').classList.add('hidden');
}

function openEditExpenseModal() {
    // Pre-fill form with expense data
    document.getElementById('expenseDate').value = '2023-06-15';
    document.getElementById('expenseAmount').value = '125.75';
    document.getElementById('expenseDescription').value = 'Grocery Shopping';
    document.getElementById('expenseCategory').value = 'food';
    document.getElementById('expensePayment').value = 'credit-card';
    document.getElementById('expenseNotes').value = 'Whole Foods Market';
    document.getElementById('expense-modal-title').textContent = 'Edit Expense';
    openAddExpenseModal();
}

function openDeleteExpenseModal() {
    document.getElementById('deleteExpenseModal').classList.remove('hidden');
}

function closeDeleteExpenseModal() {
    document.getElementById('deleteExpenseModal').classList.add('hidden');
}