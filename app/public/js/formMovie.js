const searchInput = document.querySelector(".search-input");
const searchResults = document.querySelector(".search-results");
const actorCardTemplate = document.querySelector("#actor-card-template");

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
        const suggestion = document.createElement("p");
        suggestion.classList.add("suggestion");
        suggestion.textContent = actor.full_name;
        suggestion.setAttribute("data-id", actor.id_actor);
        suggestion.addEventListener("click", selectActor);
        searchResults.insertAdjacentElement("beforeend", suggestion)
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

function selectActor() {
    const actorCard = actorCardTemplate.content.cloneNode(true).children[0];
    actorCard.querySelector(".actor-name").value = this.textContent;
    actorCard.querySelector(".actor-id").value = this.dataset.id;
    actorCard.querySelector(".actor-id").name = `actors[${this.textContent}][id_actor]`;	
    actorCard.querySelector(".actor-role").name = `actors[${this.textContent}][id_role]`;	
    actorCard.querySelector(".delete-actor").addEventListener("click", () => {
        actorCard.remove();
    });
    document.querySelector(".actors-field").insertAdjacentElement("beforeend", actorCard);
    searchInput.value = "";
    searchResults.innerHTML = "";
}

//Handle categories selection
const customSelect = document.querySelector('.select-wrapper');
const selectField = customSelect.querySelector('.select-field');
const selectItems = customSelect.querySelector('.select-items');
const checkboxes = selectItems.querySelectorAll('input[type="checkbox"]');

// Toggle dropdown
selectField.addEventListener('click', () => {
    selectField.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!customSelect.contains(e.target)) {
        selectField.classList.remove('active');
    }
});


checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
      const selectedCategories = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.nextElementSibling.textContent);

        selectField.textContent = selectedCategories.length > 0
        ? selectedCategories.join(', ')
        : 'Select Categories';
    });
});