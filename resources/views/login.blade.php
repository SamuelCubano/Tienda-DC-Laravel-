<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC Shoes - Acceso</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fdfdfd;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    header {
      width: 100%;
      padding: 20px;
      text-align: left;
      background-color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .back-btn {
      background-color: #202020;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
    }

    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      margin-top: auto;
      margin-bottom: auto;
    }

    h2 {
      margin-bottom: 20px;
      color: #202020;
      text-align: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"]{
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background-color: #202020;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      cursor: pointer;
    }

    .toggle-link {
      display: block;
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
    }

    .toggle-link a {
      text-decoration: none;
      color: #202020;
      font-weight: bold;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <header>
    <a href="index.html" class="back-btn">⬅ Volver a la tienda</a>
  </header>

  <div class="form-container">
    <div id="loginForm">
      <h2>Iniciar sesión</h2>
      <form id="login">
        <input type="email" placeholder="Correo electrónico" required>
        <input type="password" placeholder="Contraseña" required>
        <button class="btn" type="submit">Entrar</button>
      </form>
      <div class="toggle-link">
        ¿No tienes cuenta? <a href="#" onclick="toggleForms('registro')">Regístrate</a>
      </div>
    </div>

    <div id="registroForm" class="hidden">
      <h2>Registro</h2>
      <form id="register">
  <input type="text" placeholder="Nombre completo" required>
  <input type="email" placeholder="Correo electrónico" required>
  <input type="text" placeholder="Cédula" required>
  <input type="tel" placeholder="Número telefónico" required>
  <input type="password" placeholder="Contraseña" required>
  <input type="password" placeholder="Repetir contraseña" required>
  <button class="btn" type="submit">Registrarse</button>
</form>
      <div class="toggle-link">
        ¿Ya tienes cuenta? <a href="#" onclick="toggleForms('login')">Inicia sesión</a>
      </div>
    </div>
  </div>

  <script>
    function toggleForms(form) {
      document.getElementById('loginForm').classList.toggle('hidden', form !== 'login');
      document.getElementById('registroForm').classList.toggle('hidden', form !== 'registro');
    }

    // Registro
    document.getElementById('register').addEventListener('submit', function (e) {
  e.preventDefault();

  const inputs = this.querySelectorAll('input');
  const nombre = inputs[0].value.trim();
  const correo = inputs[1].value.trim();
  const cedula = inputs[2].value.trim();
  const telefono = inputs[3].value.trim();
  const password = inputs[4].value;
  const repetir = inputs[5].value;

  if (password !== repetir) {
    alert("Las contraseñas no coinciden.");
    return;
  }

  if (!cedula || !telefono) {
    alert("Debes ingresar tu cédula y número telefónico.");
    return;
  }

  let usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

  if (usuarios.some(u => u.correo === correo)) {
    alert("Ya existe un usuario con ese correo.");
    return;
  }

  usuarios.push({ nombre, correo, cedula, telefono, password });
  localStorage.setItem('usuarios', JSON.stringify(usuarios));

  alert("Registro exitoso. Ahora puedes iniciar sesión.");
  toggleForms('login');
});


    // Login
    document.getElementById('login').addEventListener('submit', function (e) {
      e.preventDefault();

      const correo = this.querySelectorAll('input')[0].value.trim();
      const password = this.querySelectorAll('input')[1].value;

      const usuarios = JSON.parse(localStorage.getItem('usuarios')) || [];
      const user = usuarios.find(u => u.correo === correo && u.password === password);

      if (!user) {
        alert("Correo o contraseña incorrectos.");
        return;
      }

      localStorage.setItem('usuarioActivo', JSON.stringify(user));
      window.location.href = "/dashboard";
    });
  </script>
</body>
</html>
