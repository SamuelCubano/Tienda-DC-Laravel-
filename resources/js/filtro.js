    function toggleFiltros() {
      document.getElementById('filtroLateral').classList.toggle('active');
    }

    const productos = document.querySelectorAll('.producto');
    const colorOptions = document.querySelectorAll('.color-option');
    let colorSeleccionado = null;

    colorOptions.forEach(color => {
      color.addEventListener('click', () => {
        colorOptions.forEach(c => c.classList.remove('selected'));
        if (colorSeleccionado === color.dataset.color) {
          colorSeleccionado = null;
        } else {
          color.classList.add('selected');
          colorSeleccionado = color.dataset.color;
        }
        aplicarFiltros();
      });
    });

    document.getElementById('filtro-precio').addEventListener('input', function () {
      document.getElementById('precio-actual').textContent = `Hasta $${this.value}`;
      aplicarFiltros();
    });

    document.querySelectorAll('.filtro-genero, .filtro-categoria, .filtro-temporada').forEach(el => {
      el.addEventListener('change', aplicarFiltros);
    });

    function aplicarFiltros() {
      const generos = Array.from(document.querySelectorAll('.filtro-genero:checked')).map(el => el.value);
      const categorias = Array.from(document.querySelectorAll('.filtro-categoria:checked')).map(el => el.value);
      const temporadas = Array.from(document.querySelectorAll('.filtro-temporada:checked')).map(el => el.value);
      const maxPrecio = parseFloat(document.getElementById('filtro-precio').value);

      productos.forEach(p => {
        const genero = p.dataset.genero;
        const categoria = p.dataset.categoria;
        const temporada = p.dataset.temporada;
        const color = p.dataset.color;
        const precio = parseFloat(p.dataset.precio);

        const mostrar =
          (generos.length === 0 || generos.includes(genero)) &&
          (categorias.length === 0 || categorias.includes(categoria)) &&
          (temporadas.length === 0 || temporadas.includes(temporada)) &&
          (!colorSeleccionado || colorSeleccionado === color) &&
          (precio <= maxPrecio);

        p.classList.toggle('hidden', !mostrar);
      });
    }

    function resetearFiltros() {
      document.querySelectorAll('.filtro-lateral input[type="checkbox"]').forEach(el => el.checked = false);
      document.getElementById('filtro-precio').value = 200;
      document.getElementById('precio-actual').textContent = 'Hasta $200';
      colorSeleccionado = null;
      colorOptions.forEach(c => c.classList.remove('selected'));
      productos.forEach(p => p.classList.remove('hidden'));
    }

    function toggleFiltros() {
      document.getElementById('filtroLateral').classList.toggle('active');
    }