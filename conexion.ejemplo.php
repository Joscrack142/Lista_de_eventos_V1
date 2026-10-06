<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $mysqli = new mysqli(
        "localhost",      // host
        "hector-josue",        // ← cambia esto
        "hector_josue_db",     // ← cambia esto
        "agenda"          // nombre de la base
    );
    $mysqli->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("No se pudo conectar a la base de datos.");
}