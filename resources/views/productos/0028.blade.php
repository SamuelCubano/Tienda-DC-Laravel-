<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle del Producto</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles-productos.css">
  <script src="../js/auth.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="../js/header.js" defer></script>
</head>

<body onload="checkUserSession(); actualizarCarrito();">

  <header>
 <div class="carrito-icono" onclick="toggleCarrito()">
      🛒 Carrito (<span id="contadorCarrito">0</span>)
    </div>
    <div class="carrito-container" id="carritoContainer">
      <button class="close-btn" onclick="toggleCarrito()">&times;</button>
      <h3>Carrito</h3>
      <ul id="listaCarrito"></ul>
      <p><strong>Total: $<span id="total">0</span></strong></p>
      <button class="btn-confirmar" onclick="mostrarLoginDesdeCarrito()">Concretar compra</button>
    </div>
  <a href="/"><img src="/img/logo.png" alt="DC Shoes" width="70" class="logo"></a>
  <a href="/login"><button class="btn btn-login" onclick="toggleLogin()">Iniciar sesión</button></a>
  <div id="userMenu" class="user-menu" style="display: none;"></div>
</header>

  <div class="producto-detalle">
    <img src="/img/productos/0028.jpg" alt="Producto">
    <div class="producto-info">
      <h2>Hat Buffy Solid (Neg) DC Mujer</h2>
      <p><strong>Precio: </strong><span class="precio-actual">$37,97 </span></p>
      <p><strong>Stock disponible:</strong> <span id="stock">10</span></p>
      <p>TELA 100% Algodon Piluso Tejido: Gabardina elastizada Fit: Regular Full print <br>Avios DC</p>

      <p><strong>COLOR: NEGRO </strong></p>

      <label for="categoria">Categoría:</label>
      <select id="categoria" class="btn" style="margin-bottom: 10px;">
        <option value="adulto">Adulto</option>
        <option value="niño">Niño</option>
      </select>

      <label for="talla">Talla:</label>
      <select id="talla" class="btn" style="margin-bottom: 10px;">
        <option value="U">U</option>
      </select>

      <label for="cantidad">Cantidad:</label>
      <input type="number" id="cantidad" class="btn" min="1" max="10" value="1" style="margin-bottom: 20px;">
      <br>
      <button class="btn btn-add" onclick="agregarAlCarrito('Hat Buffy Solid (Neg) DC Mujer', 37.97)">Agregar al carrito</button>
    </div>
  </div>

  <hr><br>
  <h2 class="subtitulo">También podrían interesarte estos productos!</h2>
  <main class="grid-productos"> 
    <div class="producto">
      <img src="/img/productos/0006.jpg" alt="Transit Shoes">
      <h3>Camisa Mc Scribble (Neg) DC</h3>
      <p><span class="precio-actual">$85</span> <span class="precio-anterior">$110</span></p>
      <a href="/productos/0006" class="btn btn-add">Ver más</a>
    </div>
    <div class="producto">
      <img src="/img/productos/0007.jpg" alt=" Light (Tpc0) DC">
      <h3>Remera Ml Star Ls (Ama) DC</h3>
      <p><span class="precio-actual">$85</span> <span class="precio-anterior">$110</span></p>
      <a href="/productos/0007" class="btn btn-add">Ver más</a>  
    </div>
    <div class="producto">
      <img src="/img/productos/0008.jpg" alt="Ascend Skate Shoes">
      <h3>Zapatillas Trase Tx Le (Xckc) DC</h3>
      <p><span class="precio-actual">$85</span> <span class="precio-anterior">$110</span></p>
      <a href="/productos/0008" class="btn btn-add">Ver más</a>  
    </div>
  </main>

  <footer>
    <p>&copy; 2025 DC Shoes. Todos los derechos reservados.</p>
    <p>Contacto: contacto@dcshoes.com</p>
    <p>Síguenos en redes sociales: Instagram | Facebook | Twitter</p>
  </footer>
</body>
</html>
