const switchPersons = document.querySelectorAll(".switch-persons");

for(const switchPerson of switchPersons){
    switchPerson.addEventListener("click", e => {
        const personBlock = e.currentTarget.closest(".persons");
        const hiddenElement = document.querySelector(".persons.hidden");
        personBlock.classList.add("hidden");
        hiddenElement.classList.remove("hidden");
    })
}