<?php
// funciones.php
require_once 'config.php';

function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function readJSON($filename) {
    $file = __DIR__ . '/data/' . $filename;
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true);
    }
    return [];
}

function saveJSON($filename, $data) {
    $file = __DIR__ . '/data/' . $filename;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
?>
