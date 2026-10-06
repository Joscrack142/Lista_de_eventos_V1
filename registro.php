<?php
// ========== PROCESAMIENTO ==========
$errores = [];
$titulo = $fecha = $hora = $categoria = $descripcion = '';

$categoriasOK = ['trabajo', 'personal', 'estudio', 'ocio', 'salud', 'otro'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir datos
    $titulo      = trim($_POST['titulo']      ?? '');
    $fecha       = trim($_POST['fecha']       ?? '');
    $hora        = trim($_POST['hora']        ?? '');
    $categoria   = trim($_POST['categoria']   ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    // Validar
    if ($titulo === '') {
        $errores['titulo'] = 'El título es obligatorio.';
    } elseif (mb_strlen($titulo) > 120) {
        $errores['titulo'] = 'Máximo 120 caracteres.';
    }

    if ($fecha === '') {
        $errores['fecha'] = 'La fecha es obligatoria.';
    } elseif (!DateTime::createFromFormat('Y-m-d', $fecha)) {
        $errores['fecha'] = 'La fecha no es válida.';
    }

    if (!in_array(strtolower($categoria), $categoriasOK, true)) {
        $errores['categoria'] = 'Elige una categoría válida.';
    }

    // Si no hay errores → Guardar
    if (empty($errores)) {
        require 'conexion.ejemplo.php';

        $horaDB = ($hora === '') ? null : $hora;

        $sql = "INSERT INTO eventos (titulo, fecha, hora, categoria, descripcion)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssss", $titulo, $fecha, $horaDB, $categoria, $descripcion);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();

        // Redirigir (PRG)
        header('Location: index.php?ok=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgendaWeb — Nuevo evento</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/formulario.css">
</head>
<body class="layout">

  <header class="site-header">
    <div class="site-header__inner">
      <a href="index.php" class="logo">Agenda<span>Web</span></a>
      <nav class="nav">
        <a href="index.php" class="nav__link">Mis eventos</a>
        <a href="registro.php" class="nav__link is-active">Nuevo evento</a>
      </nav>
    </div>
  </header>

  <main class="contenedor">
    <div class="page__header" style="margin-bottom: 28px;">
      <div>
        <h1 class="page__title">Nuevo evento</h1>
        <p class="page__subtitle">Completa los datos de tu evento o cita</p>
      </div>
    </div>

    <?php if (!empty($errores)): ?>
      <div style="background:#FEF2F2; color:#B91C1C; border:1px solid #FECACA; padding:14px 18px; border-radius:12px; margin-bottom:20px;">
        Por favor corrige los siguientes errores:
        <ul style="margin:8px 0 0 18px;">
          <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form class="card form-card" method="post" action="">

      <div class="form-group">
        <label for="titulo" class="required">Título del evento</label>
        <input type="text" id="titulo" name="titulo"
               value="<?= htmlspecialchars($titulo) ?>"
               placeholder="Ej. Reunión con el equipo" required>
      </div>

      <div class="row">
        <div class="form-group">
          <label for="fecha" class="required">Fecha</label>
          <input type="date" id="fecha" name="fecha"
                 value="<?= htmlspecialchars($fecha) ?>" required>
        </div>
        <div class="form-group">
          <label for="hora">Hora</label>
          <input type="time" id="hora" name="hora"
                 value="<?= htmlspecialchars($hora) ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="categoria" class="required">Categoría</label>
        <select id="categoria" name="categoria" required>
          <option value="">Seleccionar…</option>
          <?php
          $opciones = [
            'trabajo' => 'Trabajo',
            'personal' => 'Personal',
            'estudio' => 'Estudio',
            'ocio' => 'Ocio',
            'salud' => 'Salud',
            'otro' => 'Otro'
          ];
          foreach ($opciones as $valor => $texto):
          ?>
            <option value="<?= $valor ?>" <?= strtolower($categoria) === $valor ? 'selected' : '' ?>>
              <?= $texto ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción / Notas</label>
        <textarea id="descripcion" name="descripcion"
                  placeholder="Añade detalles importantes…"><?= htmlspecialchars($descripcion) ?></textarea>
      </div>

      <div class="form-actions">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar evento</button>
      </div>

    </form>
  </main>

  <footer class="site-footer">
    <div class="contenedor">AgendaWeb · 2026</div>
  </footer>

</body>
</html>