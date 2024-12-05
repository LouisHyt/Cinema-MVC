const searchInput = document.querySelector(".search-input");
const searchResults = document.querySelector(".search-results");




const handleSearchMovie = debounce(async (e) => {
  if(!e.target.value || e.target.value === ""){
    searchResults.innerHTML = "";
    return
  }
    try {
      const results = await fetch(`./?api=searchMoviesByName&query=${e.target.value}`);
      const data = await results.json();
      searchResults.innerHTML = "";
      for(const movie of data){ 
        searchResults.insertAdjacentHTML("beforeend", `
          <a href="./?action=detailsMovie&id=${movie.id_movie}" class="suggestion">${movie.title}</a>
        `)
      }
    } catch (error) {
        console.log(error);
    }
}, 350)

searchInput.addEventListener("keydown", handleSearchMovie);

function debounce(callback, wait) {
    let timeoutId = null;
    return (...args) => {
      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(() => {
        callback(...args);
      }, wait);
    };
}