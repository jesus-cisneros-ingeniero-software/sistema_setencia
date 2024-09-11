<form method="post" action="<?= site_url('auth/validateUser') ?>">
  <label for="username">Usuario</label>
  <input type="text" name="username" required>

  <label for="password">Contraseña</label>
  <input type="password" name="password" required>

  <button type="submit">Iniciar sesión</button>
</form>