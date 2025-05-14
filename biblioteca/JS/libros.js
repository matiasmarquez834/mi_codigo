// Función para obtener los libros del servidor y mostrarlos
async function obtenerLibros() {
    try {
        const respuesta = await fetch("../backend/routes/api.php?seccion=libros"); // Petición al servidor
        const libros = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorLibros = document.getElementById("tabla");
        contenedorLibros.innerHTML = mostrarLibros(libros); // Mostrar los libros

    } catch (error) {
        console.error("Error al obtener los libros:", error);
        document.getElementById("tabla").innerHTML = "<p> Error al cargar los libros.</p>";
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
        contenido += `<td><button onclick="eliminarLibro(${libro.id_libro})">Eliminar</button></td>`;
        contenido += `</tr>`;
    });
    return contenido;
}

// Llamamos a obtenerLibros cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
    obtenerLibros(); // Esto hace la llamada a la API para obtener los libros
});

// Función para eliminar un libro

async function eliminarLibro(id) {
    try {
        const respuesta = await fetch(`../backend/routes/api.php?seccion=libros&id=${id}`, {
            method: 'DELETE'

            
        });

        const texto = await respuesta.text();
        console.log("Respuesta del servidor:", texto);
        
        if (respuesta.ok) {
            alert("Libro eliminado correctamente");
            obtenerLibros(); // Actualizar la lista de libros
        } else {
            alert("Error al eliminar el libro");
        }
    } catch (error) {
        console.error("Error al eliminar el libro:", error);
    }
}
