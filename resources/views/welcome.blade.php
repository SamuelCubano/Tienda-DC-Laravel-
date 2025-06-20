<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC Shoes - Tienda Online</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/styles-index.css">

  <script src="https://kit.fontawesome.com/cf1fb60fea.js" crossorigin="anonymous"></script>

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


<section class="categorias">
    <div class="categorias-grid">
      <a href="/mujeres" class="categoria-item">
        <img src="/img/mujer-categoria.png" alt="Mujeres">
        Mujeres
      </a>
      <a href="hombres.html" class="categoria-item">
        <img src="/img/hombre-categoria.png" alt="Hombres">
        Hombres
      </a>
      <a href="zapatos.html" class="categoria-item">
        <img src="/img/zapatos-categoria.png" alt="Zapatos">
        Zapatos
      </a>
      <a href="camisas.html" class="categoria-item">
        <img src="/img/camisas-categoria.png" alt="Camisas">
        Camisas
      </a>
      <a href="gorros.html" class="categoria-item">
        <img src="/img/gorras-categoria.png" alt="Gorros">
        Gorros
      </a>
      <a href="swetters.html" class="categoria-item">
        <img src="/img/sueters-categoria.png" alt="Swetters">
        Swetters
      </a>
    </div>
  </section>

  <h2 class="subtitulo">Ultimas Tendencias</h2>
  
  <main class="grid-productos">
    <div class="producto">
      <img src="/img/productos/0001.jpg" alt="Pure (Bpc2)">
      <h3>Zapatilla Pure (Bpc2) DC Mujer</h3>
      <p>122,80$</p>
      <a href="productos/0001" class="btn btn-add">Ver más</a>
    </div>
    <div class="producto">
      <img src="/img/productos/0002.jpg" alt="Chester (Rqr0)">
      <h3>Beanie Snow Chester (Rqr0) DC</h3>
      <p>$29,64</p>
      <a href="productos/0002" class="btn btn-add">Ver más</a>
    </div>
    <div class="producto">
      <img src="/img/productos/0003.jpg" alt="Transit Shoes">
      <h3>Campera Navigator Light (Tpc0) DC</h3>
      <p>$211,74</p>
      <a href="productos/0003" class="btn btn-add">Ver más</a>
    </div>
    <div class="producto">
      <img src="/img/productos/0004.jpg" alt=" Light (Tpc0) DC">
      <h3>Cap Dyenotts (Xggc) DC</h3>
      <p>$33,88</p>
      <a href="productos/0004" class="btn btn-add">Ver más</a>  
    </div>
    <div class="producto">
      <img src="/img/productos/0005.jpg" alt="Ascend Skate Shoes">
      <h3>Zapatillas Pure (Blww) Dc</h3>
      <p>$127,04</p>
      <a href="productos/0005" class="btn btn-add">Ver más</a>
    </div>
  </main>
  <h2 class="subtitulo">OFERTAS SEMANALES</h2>
  <main class="grid-productos"> 
    <div class="producto">
      <img src="/img/productos/0006.jpg" alt="Transit Shoes">
      <h3>Camisa Mc Scribble (Neg) DC</h3>
      <p><span class="precio-actual">$85</span> <span class="precio-anterior">$110</span></p>
      <a href="productos/0006" class="btn btn-add">Ver más</a>
    </div>
    <div class="producto">
      <img src="/img/productos/0007.jpg" alt=" Light (Tpc0) DC">
      <h3>Remera Ml Star Ls (Ama) DC</h3>
      <p><span class="precio-actual">$21,17</span> <span class="precio-anterior">$42,35</span></p>
      <a href="productos/0007" class="btn btn-add">Ver más</a>  
    </div>
    <div class="producto">
      <img src="/img/productos/0008.jpg" alt="Ascend Skate Shoes">
      <h3>Zapatillas Trase Tx Le (Xckc) DC</h3>
      <p><span class="precio-actual">$42,35</span> <span class="precio-anterior">$84,69</span></p>
      <a href="productos/0008" class="btn btn-add">Ver más</a>  
    </div>
    </main>
   <section class="redes">
    <h2 class="subtitulo">Síguenos en redes sociales</h2>
    <a href="https://www.instagram.com/samuelcubano/"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://www.facebook.com/dcshoes  "><i class="fa-brands fa-facebook"></i></a>
    <a href="https://x.com/dcshoes"><i class="fa-brands fa-x-twitter"></i></a>
  </section>

  <footer>
    <p>&copy; 2025 DC Shoes. Todos los derechos reservados.</p>
    <p>Contacto: contacto@dcshoes.com</p>
    <p>Síguenos en redes sociales: Instagram | Facebook | Twitter</p>
  </footer>
</body>
</html>
