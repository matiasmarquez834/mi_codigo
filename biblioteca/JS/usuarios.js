// Función para obtener los usuarios del servidor y mostrarlos\async function obtenerUsuarios() {
async function obtenerUsuarios() {    
    try {
        const respuesta = await fetch("../backend/routes/api.php?seccion=usuarios"); // Petición al servidor 
        const usuarios = await respuesta.json(); // Convertir la respuesta a JSON

        const contenedorUsuarios = document.getElementById("tabla");
        contenedorUsuarios.innerHTML = mostrarUsuarios(usuarios); // Mostrar los usuarios

    } catch (error) {
        console.error("Error al obtener los usuarios:", error);
        document.getElementById("tabla").innerHTML = "<p> Error al cargar los usuarios.</p>";
    }
}

// Función para mostrar los usuarios en formato de tabla
function mostrarUsuarios(usuarios) {
    let contenido = "";

    usuarios.forEach(usuario => {
        contenido += `<tr>`;
        contenido += `<td>${usuario.id_usuario}</td>`;
        contenido += `<td>${usuario.nombre}</td>`;
        contenido += `<td>${usuario.email}</td>`;
        contenido += `<td>${usuario.telefono}</td>`; 
        contenido += `<td> <button>Eliminar</button> </td>`;
        contenido += `</tr>`;
    });
    return contenido;
}

// Llamamos a obtenerUsuarios cuando el DOM esté listo

document.addEventListener("DOMContentLoaded", function () {
    obtenerUsuarios();
});
