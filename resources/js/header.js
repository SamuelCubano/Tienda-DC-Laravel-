const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    function toggleCarrito() {
      const container = document.getElementById('carritoContainer');
      container.classList.toggle('active');
    }

    function toggleLogin() {
      const form = document.getElementById('loginForm');
      form.classList.toggle('active');
    }

    function mostrarLoginDesdeCarrito() {
      const form = document.getElementById('loginForm');
      if (!form.classList.contains('active')) {
        form.classList.add('active');
      }
    }

    function agregarAlCarrito(nombre, precio) {
      const cantidad = parseInt(document.getElementById('cantidad').value);
      const stock = parseInt(document.getElementById('stock').textContent);

      if (cantidad > stock) {
        alert('No hay suficiente stock disponible');
        return;
      }

      const item = carrito.find(i => i.nombre === nombre);
      if (item) {
        item.cantidad += cantidad;
      } else {
        carrito.push({ nombre, precio, cantidad });
      }

      localStorage.setItem('carrito', JSON.stringify(carrito));
      actualizarCarrito();
    }

    function borrarDelCarrito(index) {
      carrito.splice(index, 1);
      localStorage.setItem('carrito', JSON.stringify(carrito));
      actualizarCarrito();
    }

    function actualizarCarrito() {
      const lista = document.getElementById('listaCarrito');
      const total = document.getElementById('total');
      const contador = document.getElementById('contadorCarrito');

      lista.innerHTML = '';
      let suma = 0;
      let count = 0;

      carrito.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `${item.nombre} x${item.cantidad} - $${(item.precio * item.cantidad).toFixed(2)} <button class='btn btn-delete' onclick='borrarDelCarrito(${index})'>X</button>`;
        lista.appendChild(li);
        suma += item.precio * item.cantidad;
        count += item.cantidad;
      });

      total.textContent = suma.toFixed(2);
      contador.textContent = count;
    }

    actualizarCarrito();

    async function mostrarLoginDesdeCarrito() {
  const user = JSON.parse(localStorage.getItem('usuarioActivo'));

  if (!user) {
    const form = document.getElementById('loginForm');
    if (!form.classList.contains('active')) {
      form.classList.add('active');
    }
    return;
  }

  // Generar PDF del recibo
const { jsPDF } = window.jspdf;

    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
  if (carrito.length === 0) {
    alert("Tu carrito está vacío.");
    return;
  }

  const doc = new jsPDF();
  let y = 20;

  const fecha = new Date();
  const reciboId = `RCP-${fecha.getFullYear()}${String(fecha.getMonth()+1).padStart(2, '0')}${String(fecha.getDate()).padStart(2, '0')}-${Math.floor(Math.random() * 90000 + 10000)}`;

  doc.setFont("helvetica", "bold");
  doc.setFontSize(16);
  doc.text("DC SHOES - RECIBO DE COMPRA", 105, y, { align: "center" });
  y += 10;

  doc.setFontSize(12);
  doc.setFont("helvetica", "normal");
  doc.text(`Cliente: ${user.nombre}`, 20, y); y += 7;
  doc.text(`Cédula: ${user.cedula || '(no registrada)'}`, 20, y); y += 7;
  doc.text(`Correo: ${user.correo}`, 20, y); y += 7;
  doc.text(`Teléfono: ${user.telefono || '(no registrado)'}`, 20, y); y += 7;
  doc.text(`Dirección: Caracas, Venezuela`, 20, y); y += 7;
  doc.text(`Fecha: ${fecha.toLocaleString()}`, 20, y); y += 7;
  doc.text(`Recibo N°: ${reciboId}`, 20, y); y += 7;
  doc.text(`Método de Pago: Pago contra entrega`, 20, y);
  y += 10;

  // Encabezado de tabla
  doc.setFont("helvetica", "bold");
  doc.text("Producto", 20, y);
  doc.text("Cant.", 100, y);
  doc.text("P.Unit", 130, y);
  doc.text("Subtotal", 160, y);
  y += 7;

  doc.setFont("helvetica", "normal");
  let total = 0;
  carrito.forEach(item => {
    const subtotal = item.cantidad * item.precio;
    doc.text(item.nombre.slice(0, 30), 20, y);
    doc.text(String(item.cantidad), 100, y);
    doc.text(`$${item.precio.toFixed(2)}`, 130, y);
    doc.text(`$${subtotal.toFixed(2)}`, 160, y);
    y += 7;
    total += subtotal;
  });

  y += 5;
  doc.setFont("helvetica", "bold");
  doc.text(`Total: $${total.toFixed(2)}`, 160, y);

  y += 20;
  doc.setFontSize(10);
  doc.setFont("helvetica", "italic");
  doc.text("Gracias por tu compra en DC Shoes. Esperamos verte pronto.", 20, y); y += 5;
  doc.text("Las devoluciones se aceptan dentro de los 15 días con este recibo físico.", 20, y);

  doc.save(`recibo-${reciboId}.pdf`);

  // Limpiar carrito y actualizar interfaz
  localStorage.removeItem('carrito');
  actualizarCarrito();
  alert("Recibo generado con éxito. Gracias por tu compra.");
}