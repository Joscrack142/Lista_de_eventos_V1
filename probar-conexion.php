<?php
require '.gitignore/conexion.php';

echo "<h2>✅ Conexión exitosa</h2>";
echo "<p>Se conectó correctamente a la base de datos.</p>";

// Probar que la tabla existe
$resultado = $mysqli->query("SHOW TABLES LIKE 'eventos'");

if ($resultado && $resultado->num_rows > 0) {
    echo "<p>✅ La tabla <strong>eventos</strong> existe.</p>";
} else {
    echo "<p>❌ La tabla <strong>eventos</strong> NO existe. Ejecuta el SQL de creación.</p>";
}

$mysqli->close();
?>