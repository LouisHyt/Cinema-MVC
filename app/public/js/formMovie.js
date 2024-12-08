const searchInput = document.querySelector(".search-input");
const searchResults = document.querySelector(".search-results");

const handleSearchActor = debounce(async (e) => {
    if(!e.target.value || e.target.value === ""){
      searchResults.innerHTML = "";
      return
    }
      try {
        const results = await fetch(`./?api=searchActorsByName&query=${e.target.value}`);
        const data = await results.json();
        
        searchResults.innerHTML = "";
        for(const actor of data){ 
          searchResults.insertAdjacentHTML("beforeend", `
            <p class="suggestion" data-id="${actor.id_actor}">${actor.full_name}</p>
          `)
        }
      } catch (error) {
          console.log(error);
      }
  }, 350)
  
  searchInput.addEventListener("keydown", handleSearchActor);
  
  function debounce(callback, wait) {
      let timeoutId = null;
      return (...args) => {
        window.clearTimeout(timeoutId);
        timeoutId = window.setTimeout(() => {
          callback(...args);
        }, wait);
      };
  }