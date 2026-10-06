<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $mysqli = new mysqli(
        "localhost",
        "hector-josue",           // tu usuario real
        "N8A5W_8tws_y5X2F(o",               // tu contraseña real (vacía si no tienes)
        "hector_josue_db"
    );
    $mysqli->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("No se pudo conectar a la base de datos.");
}