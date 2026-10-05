<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgendaWeb — Nuevo evento</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Estilos principales (appbar, botones generales, etc.) -->
  <link rel="stylesheet" href="css/estilos.css">

  <!-- Estilos SOLO del formulario (archivo separado) -->
  <link rel="stylesheet" href="css/estiloRe.css">
</head>
<body class="layout">

  <!-- ===== APPBAR ===== -->
  <header class="site-header">
    <div class="site-header__inner">
      <a href="index.php" class="logo">Agenda<span>Web</span></a>
      <nav class="nav">
        <a href="index.php" class="nav__link">Mis eventos</a>
        <a href="registrar.php" class="nav__link is-active">Nuevo evento</a>
      </nav>
    </div>
  </header>

  <!-- ===== CONTENIDO ===== -->
  <main class="contenedor">

    <div class="page__header" style="margin-bottom: 28px;">
      <div>
        <h1 class="page__title">Nuevo evento</h1>
        <p class="page__subtitle">Completa los datos de tu evento o cita</p>
      </div>
    </div>

    <form class="card form-card" action="guardar-evento.php" method="POST">

      <!-- Título -->
      <div class="form-group">
        <label for="titulo" class="required">Título del evento</label>
        <input type="text" id="titulo" name="titulo" placeholder="Ej. Reunión con el equipo" required>
      </div>

      <!-- Fecha y hora -->
      <div class="row">
        <div class="form-group">
          <label for="fecha" class="required">Fecha</label>
          <input type="date" id="fecha" name="fecha" required>
        </div>
        <div class="form-group">
          <label for="hora">Hora de inicio</label>
          <input type="time" id="hora" name="hora">
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <label for="hora_fin">Hora de fin</label>
          <input type="time" id="hora_fin" name="hora_fin">
        </div>
        <div class="form-group">
  <label>Categoría</label>

  <div class="custom-select" id="categoria-select">
    <button type="button" class="custom-select__trigger" aria-haspopup="listbox">
      <span class="custom-select__value">Seleccionar…</span>
      <span class="custom-select__arrow"></span>
    </button>

    <ul class="custom-select__options" role="listbox">
      <li data-value="">Seleccionar…</li>
      <li data-value="Trabajo">Trabajo</li>
      <li data-value="Personal">Personal</li>
      <li data-value="Salud">Salud</li>
      <li data-value="Estudio">Estudio</li>
      <li data-value="Otro">Otro</li>
    </ul>

    <!-- Este es el valor que se envía al servidor -->
    <input type="hidden" name="categoria" id="categoria" value="">
  </div>
</div>

      <!-- Ubicación -->
      <div class="form-group">
        <label for="ubicacion">Ubicación</label>
        <input type="text" id="ubicacion" name="ubicacion" placeholder="Ej. Oficina, Zoom, Casa…">
      </div>

      <!-- Descripción -->
      <div class="form-group">
        <label for="descripcion">Descripción / Notas</label>
        <textarea id="descripcion" name="descripcion" placeholder="Añade detalles importantes, enlaces o recordatorios…"></textarea>
        <p class="hint">Opcional. Puedes usar este espacio para cualquier información extra.</p>
      </div>

      <!-- Botones -->
      <div class="form-actions">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar evento</button>
      </div>

    </form>

  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="site-footer">
    <div class="contenedor">AgendaWeb · Tu nombre · 2026</div>
  </footer>
    <script src="Js/estilo.js"></script>
</body>
</html>