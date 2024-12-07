<?php 
    ob_start();
?>
<div class="add-person add-container">
    <h1>Add a new Person</h1>
    <form action="" method="POST">
        <div class="form-grid">
            <div class="form-column">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" required>
                </div>
                <div class="form-group">
                    <label for="genre">genre</label>
                    <select name="genre" id="genre">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-column">
                <div class="form-group">
                    <label for="profileImage">Profile Image</label>
                    <input type="text" name="profileImage" id="profileImage">
                </div>
                <div class="form-group">
                    <label for="birthDate">Birth Date</label>
                    <input type="date" name="birthDate" id="birthDate">
                </div>
                <div class="form-group">
                    <label for="deathDate">Death Date</label>
                    <input type="date" name="deathDate" id="deathDate">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="submit-btn">Add Person</button>
    </form>
</div>

<?php
$title = "Add a Person";
$content = ob_get_clean();

require 'view/forms/formTemplate.php';