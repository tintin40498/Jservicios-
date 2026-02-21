<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JServicios - Trabajo con Dignidad</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { --brown: #8B4513; --gold: #FFD700; }
        body { font-family: Arial, sans-serif; }
        .whatsapp-float {
            position: fixed; bottom: 20px; right: 20px;
            background: #25D366; color: white;
            width: 60px; height: 60px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 30px; text-decoration: none; z-index: 100;
        }
        header { background: var(--brown); color: white; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .logo h1 { color: var(--gold); }
        nav ul { list-style: none; display: flex; gap: 20px; }
        nav a { color: white; text-decoration: none; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <a href="https://wa.me/5491123456789" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <header>
        <div class="container">
            <div class="logo">
                <h1>JServicios</h1>
                <p>Trabajo obrero con derechos y dignidad</p>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#derechos">Derechos</a></li>
                    <li><a href="#trabajos">Trabajos</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
