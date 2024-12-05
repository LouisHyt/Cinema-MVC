const movieCards = document.querySelectorAll(".movie-card");


for(const movieCard of movieCards){
    movieCard.addEventListener("click", e => {
        const movieId = e.currentTarget.dataset.id;
        window.location.href = `./?action=detailsMovie&id=${movieId}`;
    })
}