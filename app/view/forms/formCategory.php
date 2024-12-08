<?php 
    ob_start();
?>
<div class="add-category add-container">
    <h1><?= isset($categoryData) ? "Update Category" : "Add a Category" ?></h1>
    <form action="" method="POST">
        <div class="inner-form">
            <div class="main-content">
                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" name="categoryName" id="categoryName" value="<?= isset($categoryData) && $categoryData["label"] ? $categoryData["label"] : "" ?>" required>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="submit-btn">Send</button>
    </form>
</div>

<?php
$title = "Add a category";
$content = ob_get_clean();

require 'view/forms/formTemplate.php';