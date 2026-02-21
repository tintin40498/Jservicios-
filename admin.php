<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { --brown: #8B4513; --gold: #FFD700; }
        body { font-family: Arial; background: #f5f5f5; }
        .menu { background: var(--brown); padding: 20px; color: white; }
        .menu a { color: white; text-decoration: none; margin: 0 15px; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        h1 { color: var(--brown); margin: 20px 0; }
        .card { background: white; padding: 30px; margin: 20px 0; border-radius: 10px; }
        .btn { background: var(--brown); color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
    </style>
</head>
<body>
    <div class="menu">
        <span>JServicios Admin</span>
        <a href="admin.php">Inicio</a>
        <a href="logout.php">Salir</a>
        <a href="index.php" target="_blank">Ver sitio</a>
    </div>
    
    <div class="container">
        <h1>Panel de Administración</h1>
        
        <div class="card">
            <h2 style="color: var(--brown); margin-bottom: 20px;">Bienvenido</h2>
            <p>Desde acá podrás administrar tu sitio JServicios.</p>
            <p style="margin-top: 20px;">Próximamente: agregar trabajos y derechos laborales.</p>
        </div>
    </div>
</body>
</html>
