<?php 
    ob_start();
?>
<div class="add-movie add-container">
    <h1>Add a new Movie</h1>
    <form action="" method="POST">
        <div class="form-grid">
            <div class="form-column">
                <div class="form-group">
                    <label for="movieTitle">Title</label>
                    <input type="text" name="movieTitle" id="movieTitle" required>
                </div>
                <div class="form-group">
                    <label for="releaseDate">Release Date</label>
                    <input type="date" name="releaseDate" id="releaseDate" required>
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number" name="duration" id="duration" required min="0">
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="number" name="note" id="note" min="0" max="5">
                </div>
            </div>
            <div class="form-column">
                <div class="form-group">
                    <label for="bannerUrl">Banner Url</label>
                    <input type="text" name="bannerUrl" id="bannerUrl">
                </div>
                <div class="form-group">
                    <label for="posterUrl">Poster Url</label>
                    <input type="text" name="posterUrl" id="posterUrl">
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <select name="director" id="director">
                        <option value="0" selected>None</option>
                        <option value="1">Director 1</option>
                        <option value="2">Director 2</option>
                        <option value="3">Director 3</option>
                        <option value="4">Director 4</option>
                        <option value="5">Director 5</option>
                    </select>
                    <p class="subtext">Can't find your director ? <a href="./?action=form&entity=persons&operation=add">Add one</a></p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="synopsis" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="submit-btn">Add Movie</button>
    </form>
</div>

<?php
$title = "Add a movie";
$content = ob_get_clean();

require 'view/forms/formTemplate.php';