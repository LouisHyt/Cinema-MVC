<?php 

?>

<script src="public/js/navbar.js" defer></script>
<nav id="navbar">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Look for a movie">
        <i class="fas fa-search search-icon"></i>
        <div class="search-results"></div>
    </div>
    <div class="nav-icons">
        <a href="#" class="nav-icon">
            <i class="fas fa-bell"></i>
            <span class="notifications">2</span>
        </a>
        <a href="./?action=admin&entity=movies" class="nav-icon">
            <i class="fas fa-plus"></i>
        </a>
        <a href="#" class="nav-icon">
            <i class="fas fa-user"></i>
        </a>
    </div>
</nav>