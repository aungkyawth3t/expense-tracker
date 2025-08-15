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