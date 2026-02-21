<?php
// funciones.php
require_once 'config.php';

// Verificar si el admin está logueado
function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Redirigir a otra página
function redirect($url) {
    header("Location: $url");
    exit;
}

// Leer archivos JSON
function readJSON($filename) {
    $file = __DIR__ . '/data/' . $filename;
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true);
    }
    return [];
}

// Guardar archivos JSON
function saveJSON($filename, $data) {
    $file = __DIR__ . '/data/' . $filename;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
?>
