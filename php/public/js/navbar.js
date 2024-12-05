const searchInput = document.querySelector(".search-input");




const handleSearchMovie = debounce(async (e) => {
    if(!e.target.value || e.target.value === "") return;
    try {
    const results = await fetch(`./?api=searchMoviesByName&query=${e.target.value}`);
    const data = await results.json();
    console.log(data);
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