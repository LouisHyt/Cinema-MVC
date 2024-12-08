const searchInput = document.querySelector(".search-input");

searchInput.addEventListener("input", e => {
    const searchValue = e.target.value.toLowerCase();
    const rows = document.querySelectorAll(".table tr[data-name]");

    for(const row of rows){
        const rowName = row.dataset.name.toLowerCase();
        if(rowName.includes(searchValue)){
            row.style.display = "table-row";
        }else{
            row.style.display = "none";
        }
    }
})