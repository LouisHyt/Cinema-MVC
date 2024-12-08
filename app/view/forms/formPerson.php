<?php 
    ob_start();
?>
<div class="add-person add-container">
    <h1><?= isset($personData) ? "Update Person" : "Add a Person" ?></h1>
    <form action="" method="POST">
        <div class="inner-form">
            <div class="main-content">
                <div class="form-grid">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" value="<?= isset($personData) && $personData["first_name"] ? $personData["first_name"] : "" ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" id="lastName" value="<?= isset($personData) && $personData["last_name"] ? $personData["last_name"] : "" ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="genre">genre</label>
                            <select name="genre" id="genre">
                                <option value="Male" <?= isset($personData) && $personData["genre"] == "Male" ? "selected" : "" ?>>Male</option>
                                <option value="Female" <?= isset($personData) && $personData["genre"] == "Female" ? "selected" : "" ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group">
                            <label for="profileImage">Profile Image</label>
                            <input type="text" name="profileImage" id="profileImage" value="<?= isset($personData) && $personData["profile_image"] ? $personData["profile_image"] : "" ?>">
                        </div>
                        <div class="form-group">
                            <label for="birthDate">Birth Date</label>
                            <input type="date" name="birthDate" id="birthDate" value="<?= isset($personData) && $personData["birth_date"] ? \DateTime::createFromFormat('d/m/Y', $personData["birth_date"])->format('Y-m-d') : "" ?>">
                        </div>
                        <div class="form-group">
                            <label for="deathDate">Death Date</label>
                            <input type="date" name="deathDate" id="deathDate" value="<?= isset($personData) && $personData["death_date"] ? \DateTime::createFromFormat('d/m/Y', $personData["death_date"])->format('Y-m-d') : "" ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Roles</label>
                    <div class="role-cards">
                        <label class="role-card">
                            <input type="checkbox" name="isDirector" value="true" class="role-input" <?= isset($personData) && $personData["id_director"] ? "checked" : "" ?>>
                            <div class="card-content">
                                <i class="fas fa-video"></i>
                                <span>Director</span>
                            </div>
                        </label>
                        <label class="role-card">
                            <input type="checkbox" name="isActor" value="true" class="role-input" <?= isset($personData) && $personData["id_actor"] ? "checked" : "" ?>>
                            <div class="card-content">
                                <i class="fas fa-user"></i>
                                <span>Actor</span>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" rows="4"><?= isset($personData) && $personData["bio"] ? $personData["bio"] : "" ?></textarea>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="submit-btn">Send</button>
    </form>
</div>

<?php
$title = "Add a Person";
$content = ob_get_clean();

require 'view/forms/formTemplate.php';