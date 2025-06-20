// auth.js

function checkUserSession() {
  const user = JSON.parse(localStorage.getItem('usuarioActivo'));
  const loginBtn = document.querySelector('.btn-login');
  const userMenu = document.getElementById('userMenu');

  if (user) {
    // Mostrar menú de usuario logueado
    loginBtn.style.display = 'none';
    userMenu.innerHTML = `
      <div class="user-box" style="padding: 10px;">
        <span>👤 ${user.nombre.split(' ')[0]}</span>
        <div class="user-dropdown">
          <a href="dashboard.html">Mi cuenta</a>
          <a href="#" onclick="logout()">Cerrar sesión</a>
        </div>
      </div>
    `;
    userMenu.style.display = 'block';
  } else {
    // Usuario no logueado
    loginBtn.style.display = 'inline-block';
    userMenu.style.display = 'none';
  }
}

function logout() {
  localStorage.removeItem('usuarioActivo');
  window.location.href = "/";
}
