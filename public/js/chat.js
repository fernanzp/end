const searchBar = document.querySelector("#searchBar");
const searchButton = document.querySelector("#searchButton");
const usersList = document.querySelector("#usersList");

let intervalId; // Intervalo para actualizar usuarios
let isSearching = false; // Bandera para evitar conflictos
let debounceTimeout;

// Mostrar u ocultar barra de búsqueda
searchButton.addEventListener("click", () => {
    searchBar.focus(); // Enfocar la barra
    if (searchBar.value) {
        searchBar.value = ""; // Limpiar barra
        searchUsers(""); // Reiniciar resultados
    }
});

// Evento de búsqueda con debounce
searchBar.addEventListener("keyup", () => {
    const searchTerm = searchBar.value.trim();
    isSearching = !!searchTerm;

    // Debounce para evitar demasiadas solicitudes
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(() => {
        searchUsers(searchTerm);
    }, 300); // 300ms de espera
});

// Función para buscar usuarios
function searchUsers(searchTerm) {
    fetch("./users/search", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        body: JSON.stringify({ searchTerm }),
    })
        .then(response => response.json())
        .then(data => {
            renderUsers(data.users); // Renderiza la lista de usuarios
        })
        .catch(() => {
            usersList.innerHTML = `<p class="text-center text-gray-500">Error al buscar usuarios.</p>`;
        });
}

// Función para actualizar la lista automáticamente
function updateUsersList() {
    if (!isSearching) {
        fetch("./users/fetch-messages")
            .then(response => response.json())
            .then(data => {
                renderUsers(data.users);
            })
            .catch(() => {
                usersList.innerHTML = `<p class="text-center text-gray-500">Error al actualizar usuarios.</p>`;
            });
    }
}

// Renderizar usuarios en la lista
function renderUsers(users) {
    usersList.innerHTML = "";
    if (users.length === 0) {
        usersList.innerHTML = `<p class="text-center text-gray-500">No se encontraron usuarios.</p>`;
        return;
    }
    users.forEach(user => {
        const lastMessage = user.last_message
            ? (user.last_message.isOutgoing ? `Tú: ${user.last_message.content}` : user.last_message.content)
            : "Sin mensajes";

        usersList.innerHTML += `
            <a href="./chat/${user.id}" class="block bg-customLightGray hover:bg-customDarkGray p-4 rounded-lg transition">
                <div class="flex items-center space-x-4">
                    <img src="${user.profile_img}" alt="Foto de usuario" class="w-10 h-10 rounded-full">
                    <div>
                        <h3 class="text-lg font-semibold text-customGreen">${user.name} ${user.last_name} (${user.rol})</h3>
                        <p class="text-sm text-gray-400">${lastMessage}</p>
                    </div>
                </div>
            </a>`;
    });
}

// Evitar múltiples intervalos y actualizar cada 500ms
if (intervalId) clearInterval(intervalId);
intervalId = setInterval(updateUsersList, 500);
