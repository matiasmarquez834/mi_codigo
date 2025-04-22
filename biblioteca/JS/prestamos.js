<<<<<<< HEAD
// Función para obtener los prestamos del servidor y mostrarlos
async function obtenerPrestamos() {
    try {
        const respuesta = await fetch("../backend/routes/api.php?seccion=prestamos"); // Petición al servidor
        const prestamos = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorPrestamos = document.getElementById("tabla");
        contenedorPrestamos.innerHTML = mostrarPrestamos(prestamos); // Mostrar los prestamos

    } catch (error) {
        console.error("Error al obtener los prestamos:", error);
        document.getElementById("tabla").innerHTML = "<p> Error al cargar los prestamos.</p>";
    }
}

// Función para mostrar los prestamos en formato de tabla
function mostrarPrestamos(prestamos) {
    let contenido = "";

    prestamos.forEach(prestamo => {
        contenido += `<tr>`;
        contenido += `<td>${prestamo.id_prestamos}</td>`;
        contenido += `<td>${prestamo.id_libro}</td>`; 
        contenido += `<td>${prestamo.id_usuario}</td>`;
        contenido += `<td>${prestamo.fecha_prestamos}</td>`; 
        contenido += `<td>${prestamo.fecha_devolucion}</td>`;
        contenido += `</tr>`;
    });

    return contenido;
}

// Llamamos a obtenerPrestamos cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
    obtenerPrestamos(); // Esto hace la llamada a la API para obtener los prestamos
=======
// Función para obtener los libros del servidor y mostrarlos
async function obtenerLibros() {
    try {
        const respuesta = await fetch("../backend/routes/api.php?seccion=libros"); // Petición al servidor
        const libros = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorLibros = document.getElementById("tabla");
        contenedorLibros.innerHTML = mostrarLibros(libros); // Mostrar los libros

    } catch (error) {
        console.error("Error al obtener los libros:", error);
        document.getElementById("contenedor-libros").innerHTML = "<p> Error al cargar los libros.</p>";
    }
}

// Función para mostrar los libros en formato de tabla
function mostrarLibros(libros) {
    let contenido = "";
    libros.forEach(libro => {
        contenido += `<tr>`;
        contenido += `<td>${libro.id_libro}</td>`;
        contenido += `<td>${libro.titulo}</td>`; 
        contenido += `<td>${libro.autor}</td>`;
        contenido += `<td>${libro.año_publicacion}</td>`; 
        contenido += `<td>${libro.disponible ? "Sí" : "No"}</td>`;
        contenido += `</tr>`;
    });
    return contenido;
}

// Llamamos a obtenerLibros cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
    obtenerLibros(); // Esto hace la llamada a la API para obtener los libros
>>>>>>> 2d7d0de (tralalero back de libros terminado)
});