// Función para obtener los libros del servidor y mostrarlos
async function obtenerLibros() {
    try {
        const respuesta = await fetch ("../backend/routes/api.php?seccion=libros"); // Petición al servidor
        const libros = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorLibros = document.getElementById("contenedor-libros");
        contenedorLibros.innerHTML = mostrarLibros(libros); // Mostrar los libros
    } catch (error) {
        console.error("Error al obtener los libros:", error);
        document.getElementById("contenedor-libros").innerHTML = "<p> Error al cargar los libros.</p>";

 }
}

// Función para mostrar los libros en formato de tabla
function mostrarLibros(libros) {
let contenido= "";

libros.forEach(libro => {
    contenido += `<tr>`;
    contenido += `<td>${libro.titulo}</td>`; 
    contenido += `<td>${libro.autor}</td>`;
    contenido += `<td>${libro.genero}</td>`;
    contenido += `</tr>`;
});

return (contenido);
}
obtenerLibros();