document.getElementById("searchQuery").addEventListener("input", function () {
    // Obtener el valor del campo de búsqueda
    const query = this.value.trim();

    // Si el campo de búsqueda está vacío, ocultar la lista desplegable
    if (query === "") {
        document.getElementById("searchResults").innerHTML = "";
        return;
    }

    // Realizar una solicitud a la API para obtener las coincidencias de búsqueda
    fetch(`https://rickandmortyapi.com/api/character/?name=${query}`)
        .then((response) => response.json())
        .then((data) => {
            // Mostrar las coincidencias de búsqueda en la lista desplegable
            const results = data.results.map((character) => character.name);
            const searchResultsElement =
                document.getElementById("searchResults");
            searchResultsElement.innerHTML = "";

            if (results.length > 0) {
                const dropdown = document.createElement("div");
                dropdown.classList.add("dropdown", "mt-2");

                const button = document.createElement("button");
                button.classList.add("btn", "btn-secondary", "dropdown-toggle");
                button.type = "button";
                button.id = "dropdownMenuButton";
                button.setAttribute("data-toggle", "dropdown");
                button.setAttribute("aria-haspopup", "true");
                button.setAttribute("aria-expanded", "false");
                button.textContent = "Coincidencias de búsqueda";

                const dropdownMenu = document.createElement("div");
                dropdownMenu.classList.add("dropdown-menu");
                dropdownMenu.setAttribute(
                    "aria-labelledby",
                    "dropdownMenuButton"
                );

                results.forEach((result) => {
                    const item = document.createElement("a");
                    item.classList.add("dropdown-item");
                    item.href = `/characters?search_query=${result}`;
                    item.textContent = result;
                    dropdownMenu.appendChild(item);
                });

                dropdown.appendChild(button);
                dropdown.appendChild(dropdownMenu);
                searchResultsElement.appendChild(dropdown);
            } else {
                searchResultsElement.innerHTML =
                    '<p class="mt-2">No se encontraron coincidencias.</p>';
            }
        })
        .catch((error) => {
            console.error("Error al obtener las coincidencias:", error);
        });
});
