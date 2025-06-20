<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zapatos - Filtrar Productos</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles-categoria.css">
  <link rel="stylesheet" href="../css/styles-productos.css">
  <script src="../js/auth.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="../js/header.js" defer></script>
  <script src="../js/filtro.js" defer></script>
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

  <button class="toggle-filtros-btn" onclick="toggleFiltros()">Filtros</button>
  <div class="main-content">
    
    <aside class="filtro-lateral" id="filtroLateral">
        <h1>MUJERES</h1>
      <button class="btn-close-mobile" onclick="toggleFiltros()">✖ Cerrar</button>
      <h2>Filtrar por</h2>
      <div class="filtro-section">
        <h3>Género</h3>
        <label><input type="checkbox" class="filtro-genero" value="zapatos"> Zapatos</label><br>
        <label><input type="checkbox" class="filtro-genero" value="camisas"> Camisas</label><br>
        <label><input type="checkbox" class="filtro-genero" value="gorros"> Gorras</label><br>
        <label><input type="checkbox" class="filtro-genero" value="sueters"> Suéteres</label>
      </div>
      <div class="filtro-section">
        <h3>Categoría</h3>
        <label><input type="checkbox" class="filtro-categoria" value="adulto"> Adulto</label><br>
        <label><input type="checkbox" class="filtro-categoria" value="niño"> Niño</label>
      </div>
      <div class="filtro-section">
        <h3>Color</h3>
        <div id="color-container">
          <span class="color-option" style="background: #000" data-color="negro"></span>
          <span class="color-option" style="background: #fff; border: 1px solid #ccc;" data-color="blanco"></span>
          <span class="color-option" style="background: red" data-color="rojo"></span>
          <span class="color-option" style="background: blue" data-color="azul"></span>
          <span class="color-option" style="background: green" data-color="verde"></span>
          <span class="color-option" style="background: orange" data-color="naranja"></span>
        </div>
      </div>
      <div class="filtro-section">
        <h3>Temporada</h3>
        <label><input type="checkbox" class="filtro-temporada" value="invierno"> Invierno</label><br>
        <label><input type="checkbox" class="filtro-temporada" value="verano"> Verano</label>
      </div>
      <div class="filtro-section">
        <h3>Precio</h3>
        <input type="range" id="filtro-precio" min="10" max="400" value="400">
        <p id="precio-actual">Hasta $400</p>
      </div>
      <button class="btn-add" style="width: 100%; margin-top: 10px;" onclick="aplicarFiltros()">Aplicar Filtros</button>
      <button class="btn-add" style="width: 100%; margin-top: 10px; background-color: #999;" onclick="resetearFiltros()">Resetear Filtros</button>
    </aside>

    <section class="productos-contenedor">
      <div class="grid-productos" id="lista-productos">
        <div class="producto" data-genero="zapatos" data-categoria="adulto" data-temporada="verano" data-color="negro" data-precio="122.80">
          <img src="/img/productos/0001.jpg" alt="Zapatilla Negra">
          <h3>Zapatilla Pure (Bpc2) DC Mujer</h3>
          <p>122,80$</p>
          <a href="productos/0001" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="niño" data-temporada="verano" data-color="negro" data-precio="127.04">
          <img src="/img/productos/0005.jpg" alt="Zapatilla Blanca">
          <h3>Zapatillas Pure (Blww) DC Mujer</h3>
          <p>$127,04</p>
          <a href="productos/0005" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="camisas" data-categoria="adulto" data-temporada="verano" data-color="rojo" data-precio="23.64">
          <img src="/img/productos/0009.jpg" alt="Zapatilla Roja Niño">
          <h3>Remera ML Drip (Ros) DC Mujer</h3>
          <p>$23,64</p>
          <a href="productos/0009" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="sueters" data-categoria="niño" data-temporada="invierno" data-color="blanco" data-precio="379.98">
          <img src="/img/productos/0010.jpg" alt="Zapatilla Roja Niño">
          <h3>Campera Snow Cruiser (Xwwp) DC Mujer</h3>
          <p>$379,98</p>
          <a href="productos/0010" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="camisas" data-categoria="niño" data-temporada="verano" data-color="azul" data-precio="14.78">
          <img src="/img/productos/0011.jpg" alt="Zapatilla Roja Niño">
          <h3>Remera Ml DC Op Crest (Azf) DC Mujer</h3>
          <p>$14,78</p>
          <a href="productos/0011" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="sueters" data-categoria="adulto" data-temporada="invierno" data-color="blanco" data-precio="19.00">
          <img src="/img/productos/0012.jpg" alt="Zapatilla Roja Niño">
          <h3>Remera Ml Everyday Thermal (Bla) DC Mujer</h3>
          <p>$19,00</p>
          <a href="productos/0012" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="camisas" data-categoria="niño" data-temporada="verano" data-color="negro" data-precio="14.78">
          <img src="/img/productos/0013.jpg" alt="Zapatilla Roja Niño">
          <h3>Musculosa DC Magic Eye (Neg) DC Mujer</h3>
          <p>$14,78</p>
          <a href="productos/0013" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="camisas" data-categoria="adulto" data-temporada="verano" data-color="azul" data-precio="27.86">
          <img src="/img/productos/0014.jpg" alt="Zapatilla Roja Niño">
          <h3>Remera Mc Star Flame Boyfriend (Azf) DC Mujer</h3>
          <p>$27,86</p>
          <a href="productos/0014" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="sueters" data-categoria="niño" data-temporada="invierno" data-color="blanco" data-precio="67.55">
          <img src="/img/productos/0015.jpg" alt="Zapatilla Roja Niño">
          <h3>Buzo Life Changes (Hue) DC Mujer</h3>
          <p>$67,55</p>
          <a href="productos/0015" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="adulto" data-temporada="verano" data-color="naranja" data-precio="50.66">
          <img src="/img/productos/0016.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Midway Sn Knit (Whl) DC Mujer</h3>
          <p>$50,66</p>
          <a href="productos/0016" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="niño" data-temporada="verano" data-color="blanco" data-precio="50.66">
          <img src="/img/productos/0017.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Midway Sn (Wg11) DC Mujer</h3>
          <p>$50,66</p>
          <a href="productos/0017" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="adulto" data-temporada="invierno" data-color="negro" data-precio="33.78">
          <img src="/img/productos/0018.jpg" alt="Zapatilla Roja Niño">
          <h3>Beanie Snow Splendid (Neg) DC Mujer</h3>
          <p>$33,78</p>
          <a href="productos/0018" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="niño" data-temporada="invierno" data-color="verde" data-precio="33.78">
          <img src="/img/productos/0019.jpg" alt="Zapatilla Roja Niño">
          <h3>Beanie Snow Splendid (Ver) DC Mujer</h3>
          <p>$33,78</p>
          <a href="productos/0019" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="adulto" data-temporada="invierno" data-color="rojo" data-precio="33.78">
          <img src="/img/productos/0020.jpg" alt="Zapatilla Roja Niño">
          <h3>Beanie Snow Splendid (Vio) DC Mujer</h3>
          <p>$33,78</p>
          <a href="productos/0020" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="niño" data-temporada="invierno" data-color="blanco" data-precio="33.78">
          <img src="/img/productos/0021.jpg" alt="Zapatilla Roja Niño">
          <h3>Beanie Snow Splendid A (Cru) DC Mujer</h3>
          <p>$33,78</p>
          <a href="productos/0021" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="adulto" data-temporada="invierno" data-color="negro" data-precio="33.78">
          <img src="/img/productos/0022.jpg" alt="Zapatilla Roja Niño">
          <h3>Gorro Snow Splendid A (Neg) DC Mujer</h3>
          <p>$33,78</p>
          <a href="productos/0022" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="niño" data-temporada="verano" data-color="azul" data-precio="143.43">
          <img src="/img/productos/0023.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Manteca V Ss (2be) Dc Mujer</h3>
          <p>$143,43</p>
          <a href="productos/0023" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="adulto" data-temporada="verano" data-color="naranja" data-precio="143.43">
          <img src="/img/productos/0024.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Manteca V Ss (Owm) Dc Mujer</h3>
          <p>$143,43</p>
          <a href="productos/0024" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="niño" data-temporada="verano" data-color="negro" data-precio="134.99">
          <img src="/img/productos/0025.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Manteca 4 Platform (Bkw) Dc Mujer</h3>
          <p>$134,99</p>
          <a href="productos/0025" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="adulto" data-temporada="verano" data-color="blanco" data-precio="134.99">
          <img src="/img/productos/0026.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatillas Manteca 4 Mid (Whk) Dc Mujer</h3>
          <p>$134,99</p>
          <a href="productos/0026" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="sueters" data-categoria="niño" data-temporada="invierno" data-color="negro" data-precio="67.50">
          <img src="/img/productos/0027.jpg" alt="Zapatilla Roja Niño">
          <h3>Buzo Life Changes (Neg) DC Mujer</h3>
          <p>$67,50</p>
          <a href="productos/0027" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="adulto" data-temporada="verano" data-color="negro" data-precio="37.97">
          <img src="/img/productos/0028.jpg" alt="Zapatilla Roja Niño">
          <h3>Hat Buffy Solid (Neg) DC Mujer</h3>
          <p>$37,97</p>
          <a href="productos/0028" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="gorros" data-categoria="niño" data-temporada="verano" data-color="blanco" data-precio="37.97">
          <img src="/img/productos/0029.jpg" alt="Zapatilla Roja Niño">
          <h3>Hat Buffy Solid (Bla) DC Mujer</h3>
          <p>$37,97</p>
          <a href="productos/0029" class="btn btn-add">Ver más</a>
        </div>
        <div class="producto" data-genero="zapatos" data-categoria="adulto" data-temporada="invierno" data-color="blanco" data-precio="130.77">
          <img src="/img/productos/0030.jpg" alt="Zapatilla Roja Niño">
          <h3>Zapatilla Manteca Ss (Trw) DC Mujer</h3>
          <p>$130,77</p>
          <a href="productos/0030" class="btn btn-add">Ver más</a>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
