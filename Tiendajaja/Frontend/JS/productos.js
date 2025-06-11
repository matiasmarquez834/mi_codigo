// URL base del endpoint
const API_URL = "http://localhost/mi_codigo/Tiendajaja/Backend/routes/api_productos.php"; // Cambia esta URL según corresponda
// Obtener todos los productos (GET)
function listarProductos() {
  const urlConSeccion = `${API_URL}?seccion=productos`;
  fetch(urlConSeccion) // Realiza la solicitud GET a la URL con la sección "productos"
    .then(res => res.json()) // Convierte la respuesta a JSON
    .then(data => {
      console.log("Productos:", data); // Muestra los productos en consola
      mostrarTablaProductos(data); // Llama a la función para mostrar la tabla en el HTML
    })
    .catch(err => console.error("Error al obtener productos:", err));
}

// Función para mostrar la tabla de productos en el div 'productosContainer'
function mostrarTablaProductos(productos) {
  const container = document.getElementById('productosContainer');
  if (!Array.isArray(productos) || productos.length === 0) {
    container.innerHTML = '<p>No hay productos para mostrar.</p>';
    return;
  }
  let html = '<table border="1" cellpadding="5"><thead><tr>';
  html += '<th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Acciones</th></tr></thead><tbody>';
  productos.forEach(p => {
    html += `<tr><td>${p.id}</td><td>${p.nombre}</td><td>${p.descripcion}</td><td>${p.precio}</td><td><button onclick="eliminarProducto(${p.id})">Eliminar</button><button onclick="cargarProducto(${p.id}, '${p.nombre}', '${p.descripcion}', ${p.precio})">Modificar</button></td></tr>`;
  });
  html += '</tbody></table>';
  container.innerHTML = html;
}

// Obtener un producto por ID (GET)
function mostrarProducto(id) {
  const container = document.getElementById('productosContainer');
  fetch(`${API_URL}?id=${id}`)
    .then(res => res.json()) // Convierte la respuesta a JSON
    .then(data => {
      if (data && !data.error) {
        let html = '<table border="1" cellpadding="5"><thead><tr>';
        html += '<th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr></thead><tbody>';
        html += `<tr><td>${data.id}</td><td>${data.nombre}</td><td>${data.descripcion}</td><td>${data.precio}</td><td><button onclick="eliminarProducto(${p.id})">Eliminar</button><button onclick="cargarProducto(${p.id}, '${p.nombre}', '${p.descripcion}', ${p.precio})">Modificar</button></td></tr>`;
        html += '</tbody></table>';
        container.innerHTML = html;
      } else {
        container.innerHTML = '<p>Producto no encontrado.</p>';
      }
    })
    .catch(err => {
      console.error("Error al obtener producto:", err);
      container.innerHTML = '<p style="color:red;">Error al obtener el producto.</p>';
    });
}


// Agregar un producto nuevo (POST)
function agregarProducto(nombre, descripcion, precio) {
  // Construir la URL con la sección "agregarProducto"
  const urlConSeccion = `${API_URL}?seccion=agregarProducto`;

  // Realizar la solicitud POST con los datos
  fetch(urlConSeccion, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ nombre, descripcion, precio })
  })
    .then(res => res.json()) // Convierte la respuesta a JSON
    .then(data => console.log("Producto agregado:", data)) // Muestra el resultado en consola
    .catch(err => console.error("Error al agregar producto:", err));
    listarProductos();
}

function cargarProducto (id,nombre,descripcion,precio) {
  document.getElementById('idProducto').value = id;
  document.getElementById('nombreProducto').value = nombre;
  document.getElementById('descripcionProducto').value = descripcion;
  document.getElementById('precioProducto').value = precio;
}

// Modificar un producto (PUT)
function modificarProducto(id, nombre, descripcion, precio) {
  const urlConSeccion = `${API_URL}?id=${id}`;
  fetch(urlConSeccion, {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, nombre, descripcion, precio })
  })
    .then(res => res.json()) // Convierte la respuesta a JSON
    .then(data => console.log("Producto modificado:", data)) // Muestra el resultado en consola
    .catch(err => console.error("Error al modificar producto:", err));
    listarProductos();
}

// Eliminar un producto (DELETE)
function eliminarProducto(id) {
  const urlConSeccion = `${API_URL}?id=${id}`;

  fetch(urlConSeccion, {
    method: "DELETE"
  })
    .then(res => res.json())
    .then(data => {
      console.log("Producto eliminado:", data);
      listarProductos();
    })
    .catch(err => console.error("Error al eliminar producto:", err));
}