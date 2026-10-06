<?php
require 'conexion.ejemplo.php';

// Traer todos los eventos
$sql = "SELECT * FROM eventos ORDER BY fecha ASC, hora ASC";
$resultado = $mysqli->query($sql);
$eventos = $resultado->fetch_all(MYSQLI_ASSOC);
$total = count($eventos);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgendaWeb — Mis eventos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="layout">

  <header class="site-header">
    <div class="site-header__inner">
      <a href="index.php" class="logo">Agenda<span>Web</span></a>
      <nav class="nav">
        <a href="index.php" class="nav__link is-active">Mis eventos</a>
        <a href="registro.php" class="nav__link">Nuevo evento</a>
      </nav>
    </div>
  </header>

  <main class="contenedor">

    <?php if (isset($_GET['ok'])): ?>
      <div class="alert alert--ok" role="status">
        ✅ Evento guardado correctamente.
      </div>
    <?php endif; ?>

    <div class="page__header">
      <div>
        <h1 class="page__title">Mis eventos</h1>
        <p class="page__subtitle">
          <?= $total ?> evento<?= $total !== 1 ? 's' : '' ?> registrado<?= $total !== 1 ? 's' : '' ?>
        </p>
      </div>
      <a href="registro.php" class="btn btn-primary">+ Nuevo evento</a>
    </div>

    <?php if ($total === 0): ?>
      <div class="empty-state">
        <p>Aún no tienes eventos registrados.</p>
        <a href="registro.php" class="btn btn-primary">Registrar el primero</a>
      </div>
    <?php else: ?>
      <section class="card-list">
        <?php foreach ($eventos as $evento): ?>
          <article class="card">
            <span class="card__badge"><?= htmlspecialchars(ucfirst($evento['categoria'])) ?></span>
            <h2 class="card__title"><?= htmlspecialchars($evento['titulo']) ?></h2>
            <p class="card__meta">
              <time datetime="<?= $evento['fecha'] ?><?= $evento['hora'] ? 'T'.$evento['hora'] : '' ?>">
                <?= date('d/m/Y', strtotime($evento['fecha'])) ?>
                <?php if ($evento['hora']): ?>
                  · <?= substr($evento['hora'], 0, 5) ?>
                <?php endif; ?>
              </time>
            </p>
            <?php if (!empty($evento['descripcion'])): ?>
              <p class="card__text"><?= htmlspecialchars($evento['descripcion']) ?></p>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </section>
    <?php endif; ?>

  </main>

  <footer class="site-footer">
    <div class="contenedor">AgendaWeb · 2026</div>
  </footer>

</body>
</html>