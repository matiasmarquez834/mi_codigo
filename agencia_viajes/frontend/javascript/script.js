async function obtenerDestinos() {
    try {
        const respuesta = await fetch("../backend/api/api.php?seccion=destinos"); // Petición al servidor
        const destinos = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorDestinos = document.getElementById("destinos");
        contenedorDestinos.innerHTML = mostrarDestinos(destinos); // Mostrar los destinos

    } catch (error) {
        console.error("Error al obtener los destinos:", error);
        document.getElementById("destinos").innerHTML = "<p> Error al cargar los destinos.</p>";
    }
}

// Función para mostrar los destinos en formato de tarjeta
function mostrarDestinos(destinos) {
    let contenido = "";
    destinos.forEach(destino => {
        contenido += `<div class="card-container">`;
        contenido += `<img src="${destino.imagen_destino}" alt="Imagen 1">`;
        contenido += `<div class="card-content">`;
        contenido += `<h3 class="card-title">${destino.nombre_destino}</h3>`;
        contenido += `<p class="card-text">${destino.descripcion_destino}</p>`;
        contenido += `<a href="#" class="card-button">Ver más</a>`;
        contenido += `</div>`;
        contenido += `</div>`;
    });
    return contenido;
}

// Llamamos a obtenerLibros cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
    obtenerDestinos(); // Esto hace la llamada a la API para obtener los destinos
    mostrarDestinos(); // Esto muestra los destinos en la tarjeta
});