<?php
// admin.php
require_once 'config.php';
require_once 'funciones.php';

// Verificar si está logueado
if (!isAdminLoggedIn()) {
    redirect('login.php');
}

$mensaje = '';
$error = '';

// Cargar datos
$trabajos = readJSON('trabajos.json');
$derechos = readJSON('derechos.json');
$servicios = readJSON('servicios.json');

// Procesar agregar trabajo
if (isset($_POST['accion']) && $_POST['accion'] === 'agregar_trabajo') {
    $nuevo_trabajo = [
        'id' => count($trabajos) + 1,
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'imagen' => 'imagenes/ejemplo.jpg', // Temporal
        'fecha' => date('Y-m-d')
    ];
    $trabajos[] = $nuevo_trabajo;
    saveJSON('trabajos.json', $trabajos);
    $mensaje = 'Trabajo agregado correctamente';
}

// Procesar agregar derecho
if (isset($_POST['accion']) && $_POST['accion'] === 'agregar_derecho') {
    $nuevo_derecho = [
        'id' => count($derechos) + 1,
        'titulo' => $_POST['titulo'],
        'contenido' => $_POST['contenido'],
        'categoria' => $_POST['categoria'],
        'fecha' => date('Y-m-d')
    ];
    $derechos[] = $nuevo_derecho;
    saveJSON('derechos.json', $derechos);
    $mensaje = 'Información agregada correctamente';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - JServicios</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { --brown: #8B4513; --gold: #FFD700; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .admin-header {
            background: var(--brown);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-header h1 {
            color: var(--gold);
        }
        .admin-header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .admin-header a:hover {
            color: var(--gold);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .mensaje {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .admin-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .admin-section h2 {
            color: var(--brown);
            margin-bottom: 20px;
            border-bottom: 2px solid var(--gold);
            padding-bottom: 10px;
        }
        .admin-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--gold);
        }
        .btn {
            background: var(--brown);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background: #5a2e0c;
        }
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .item-card {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid var(--gold);
        }
        .item-card h3 {
            color: var(--brown);
            margin-bottom: 10px;
        }
        .item-card p {
            color: #666;
            margin-bottom: 10px;
        }
        .item-card small {
            color: #999;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .stat-card h3 {
            font-size: 36px;
            color: var(--brown);
        }
        .stat-card p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>JServicios - Panel Admin</h1>
        <div>
            <a href="index.php" target="_blank">Ver sitio</a>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </div>
    
    <div class="container">
        <?php if ($mensaje): ?>
        <div class="mensaje"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <!-- Estadísticas -->
        <div class="stats">
            <div class="stat-card">
                <h3><?php echo count($trabajos); ?></h3>
                <p>Trabajos publicados</p>
            </div>
            <div class="stat-card">
                <h3><?php echo count($derechos); ?></h3>
                <p>Derechos laborales</p>
            </div>
            <div class="stat-card">
                <h3><?php echo count($servicios); ?></h3>
                <p>Servicios</p>
            </div>
        </div>
        
        <!-- Agregar Trabajo -->
        <div class="admin-section">
            <h2>Agregar nuevo trabajo realizado</h2>
            <form method="POST" class="admin-form">
                <input type="hidden" name="accion" value="agregar_trabajo">
                
                <div class="form-group">
                    <label>Título del trabajo:</label>
                    <input type="text" name="titulo" required placeholder="Ej: Remodelación de cocina">
                </div>
                
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea name="descripcion" rows="3" required placeholder="Describe el trabajo realizado..."></textarea>
                </div>
                
                <button type="submit" class="btn">Guardar trabajo</button>
            </form>
        </div>
        
        <!-- Agregar Derecho -->
        <div class="admin-section">
            <h2>Agregar información sobre derechos laborales</h2>
            <form method="POST" class="admin-form">
                <input type="hidden" name="accion" value="agregar_derecho">
                
                <div class="form-group">
                    <label>Título:</label>
                    <input type="text" name="titulo" required placeholder="Ej: ART - Aseguradora de Riesgos">
                </div>
                
                <div class="form-group">
                    <label>Contenido:</label>
                    <textarea name="contenido" rows="4" required placeholder="Explicación del derecho..."></textarea>
                </div>
                
                <div class="form-group">
                    <label>Categoría:</label>
                    <select name="categoria">
                        <option value="derechos">Derechos generales</option>
                        <option value="seguridad">Seguridad laboral</option>
                        <option value="despido">Despidos</option>
                        <option value="salario">Salarios</option>
                    </select>
                </div>
                
                <button type="submit" class="btn">Guardar información</button>
            </form>
        </div>
        
        <!-- Lista de trabajos -->
        <div class="admin-section">
            <h2>Trabajos publicados</h2>
            <div class="items-grid">
                <?php foreach ($trabajos as $t): ?>
                <div class="item-card">
                    <h3><?php echo $t['titulo']; ?></h3>
                    <p><?php echo $t['descripcion']; ?></p>
                    <small>Fecha: <?php echo $t['fecha']; ?></small>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Lista de derechos -->
        <div class="admin-section">
            <h2>Información sobre derechos</h2>
            <div class="items-grid">
                <?php foreach ($derechos as $d): ?>
                <div class="item-card">
                    <h3><?php echo $d['titulo']; ?></h3>
                    <p><?php echo $d['contenido']; ?></p>
                    <small>Categoría: <?php echo $d['categoria']; ?> | Actualizado: <?php echo $d['fecha']; ?></small>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
