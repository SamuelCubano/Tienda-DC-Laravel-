<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="auth.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="/header.js" defer></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f3f3f3;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .card {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
    }

    .btn {
      padding: 12px 20px;
      background-color: #202020;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      cursor: pointer;
    }

    .historial {
      margin-top: 30px;
    }

    .compra {
      background-color: #f8f8f8;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      border-left: 4px solid #202020;
    }

    .compra ul {
      list-style: none;
      padding-left: 0;
    }

    .compra li {
      margin: 5px 0;
    }

    .no-compras {
      color: #888;
      font-style: italic;
    }

  </style>
</head>
<body>

  <div class="card">
    <h1 id="welcome"></h1>
    <a href="/" class="btn">Volver a la tienda</a>
    <button class="btn" onclick="logout()">Cerrar sesión</button>
    <button class="btn" onclick="descargarHistorialPDF()">Descargar historial en PDF</button>
  </div>
  <div class="historial">
      <h2>Historial de Compras</h2>
      <div id="historial"></div>
    </div>

  <script>
    const usuario = JSON.parse(localStorage.getItem('usuarioActivo'));

    if (!usuario) {
      window.location.href = '/login';
    } else {
      document.getElementById('welcome').textContent = `¡Bienvenido, ${usuario.nombre}!`;
      mostrarHistorial(usuario);
    }

    function logout() {
      localStorage.removeItem('usuarioActivo');
      window.location.href = '/login';
    }

    function mostrarHistorial(user) {
      const clave = `historial_${user.correo}`;
      const historial = JSON.parse(localStorage.getItem(clave)) || [];
      const contenedor = document.getElementById('historial');

      if (historial.length === 0) {
        contenedor.innerHTML = "<p class='no-compras'>No tienes compras registradas.</p>";
        return;
      }

      historial.forEach(compra => {
        const div = document.createElement("div");
        div.classList.add("compra");
        div.innerHTML = `
          <h3>Compra del ${compra.fecha}</h3>
          <ul>
            ${compra.productos.map(p => `<li>${p.nombre} x${p.cantidad} - $${(p.precio).toFixed(2)}</li>`).join("")}
          </ul>
          <p><strong>Total: $${compra.total}</strong></p>
          <p><em>Recibo Nº: ${compra.numeroRecibo}</em></p>
        `;
        contenedor.appendChild(div);
      });
    }

    function descargarHistorialPDF() {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();
      const clave = `historial_${usuario.correo}`;
      const historial = JSON.parse(localStorage.getItem(clave)) || [];

      if (historial.length === 0) {
        alert("No tienes compras registradas para descargar.");
        return;
      }

      let y = 20;
      doc.setFont("helvetica", "bold");
      doc.setFontSize(16);
      doc.text("Historial de Compras - DC Shoes", 105, y, { align: "center" });
      y += 10;

      historial.forEach((compra, index) => {
        if (y > 270) { // salto de página
          doc.addPage();
          y = 20;
        }

        doc.setFontSize(12);
        doc.setFont("helvetica", "bold");
        doc.text(`Compra ${index + 1} - ${compra.fecha}`, 20, y); y += 7;
        doc.setFont("helvetica", "normal");

        compra.productos.forEach(p => {
          doc.text(`- ${p.nombre.slice(0, 50)} x${p.cantidad} - $${p.precio.toFixed(2)}`, 25, y);
          y += 6;
        });

        doc.text(`Total: $${compra.total}`, 25, y); y += 6;
        doc.text(`Recibo Nº: ${compra.numeroRecibo}`, 25, y); y += 10;
      });

      doc.save(`historial_${usuario.nombre.replace(/\s+/g, '_')}.pdf`);
    }

    localStorage.getItem("usuarioActivo")

  </script>

</body>
</html>
