<?php 
    ob_start();
?>
<div class="add-category add-container">
    <h1>Add a new category</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" name="categoryName" id="categoryName" required>
        </div>
        <button type="submit" name="submit" class="submit-btn">Add Category</button>
    </form>
</div>

<?php
$title = "Add a category";
$content = ob_get_clean();

require 'view/forms/formTemplate.php';