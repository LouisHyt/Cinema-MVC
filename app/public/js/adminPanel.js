const searchInput = document.querySelector(".search-input");
const deleteButtons = document.querySelectorAll(".action.delete");

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

for(const deleteButton of deleteButtons){
    deleteButton.addEventListener("click", async (e) => {
        const currentRow = e.target.closest("tr");
        const id = currentRow.dataset.id ? parseInt(currentRow.dataset.id) : null;
        const entity = currentRow.dataset.entity ? currentRow.dataset.entity : null;
        try {
            let url = "";
            switch(entity){
                case "movies":
                        url = `./?api=deleteMovie&id=${id}`;
                    break;
                    case "persons":
                        url = `./?api=deletePerson&id=${id}`;
                    break;
                    case "categories":
                        url = `./?api=deleteCategory&id=${id}`;
                    break;
            }
            const request = await fetch(url, {
                method: "DELETE"
            });
            const res = await request.json();
            console.log(res);
            currentRow.remove();
        } catch (error) {
            console.log(error);
        }
    })
}