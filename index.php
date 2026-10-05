<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgendaWeb — Mis eventos</title>

  <!-- Google Fonts (igual que el formulario) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Tu marca -->
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="layout">

  <!-- ===== HEADER ===== -->
  <header class="site-header">
    <div class="contenedor site-header__inner">
      <a href="index.php" class="logo">Agenda<span>Web</span></a>
      <nav class="nav">
        <a href="index.php" class="nav__link is-active">Mis eventos</a>
        <a href="registrar.php" class="nav__link">Nuevo evento</a>
      </nav>
    </div>
  </header>

  <!-- ===== MAIN ===== -->
  <main class="contenedor">

    <!-- Aviso de éxito (en P4 solo se muestra con ?ok=1) -->
    <div class="alert alert--ok" role="status">✅ Evento guardado.</div>

    <!-- Encabezado de la página -->
    <div class="page__header">
      <div>
        <h1 class="page__title">Mis eventos</h1>
        <p class="page__subtitle">3 eventos registrados</p>
      </div>
      <a href="registro.php" class="btn btn-primary">+ Nuevo evento</a>
    </div>

    <!-- Lista de tarjetas -->
    <section class="card-list">

      <!-- ▼ INICIO de UN evento (en P4 se repetirá con foreach) -->
      <article class="card">
        <span class="card__badge">Trabajo</span>
        <h2 class="card__title">Reunión de academia</h2>
        <p class="card__meta">
          <time datetime="2026-09-25T10:30">25/09/2026 · 10:30</time>
        </p>
        <p class="card__text">Revisar calificaciones del 1er parcial y definir fechas de entrega.</p>

        <div class="card__actions">
          <a href="editar.php?id=1" class="btn btn-secondary btn-sm">Editar</a>
          <form method="post" action="borrar.php" class="form-inline">
            <input type="hidden" name="id" value="1">
            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
          </form>
        </div>
      </article>
      <!-- ▲ FIN de un evento -->

      <!-- ▼ INICIO de UN evento -->
      <article class="card">
        <span class="card__badge">Personal</span>
        <h2 class="card__title">Cita con el dentista</h2>
        <p class="card__meta">
          <time datetime="2026-10-02T16:00">02/10/2026 · 16:00</time>
        </p>
        <!-- Sin descripción a propósito -->

        <div class="card__actions">
          <a href="editar.php?id=2" class="btn btn-secondary btn-sm">Editar</a>
          <form method="post" action="borrar.php" class="form-inline">
            <input type="hidden" name="id" value="2">
            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
          </form>
        </div>
      </article>
      <!-- ▲ FIN de un evento -->

      <!-- ▼ INICIO de UN evento -->
      <article class="card">
        <span class="card__badge">Estudio</span>
        <h2 class="card__title">Entrega del proyecto final de Desarrollo de Aplicaciones Web y revisión de documentación completa del semestre</h2>
        <p class="card__meta">
          <time datetime="2026-10-15">15/10/2026</time>
        </p>
        <p class="card__text">Subir el repositorio y la documentación a DomCloud antes de la medianoche.</p>

        <div class="card__actions">
          <a href="editar.php?id=3" class="btn btn-secondary btn-sm">Editar</a>
          <form method="post" action="borrar.php" class="form-inline">
            <input type="hidden" name="id" value="3">
            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
          </form>
        </div>
      </article>
      <!-- ▲ FIN de un evento -->

    </section>

    <!-- Estado vacío (en P4 solo se muestra si no hay eventos) -->
    <div class="empty-state">
      <p>Aún no tienes eventos registrados.</p>
      <a href="registrar.php" class="btn btn-primary">Registrar el primero</a>
    </div>

  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="site-footer">
    <div class="contenedor">AgendaWeb · Tu nombre · 2026</div>
  </footer>

</body>
</html>