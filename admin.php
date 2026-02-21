<?php
// admin.php
require_once 'config.php';
require_once 'funciones.php';

if (!isAdminLoggedIn()) {
    redirect('login.php');
}

$mensaje = '';

// Agregar trabajo
if (isset($_POST['agregar_trabajo'])) {
    $trabajos = readJSON('trabajos.json');
    $nuevo = [
        'id' => count($trabajos) + 1,
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'imagen' => 'imagenes/ejemplo.jpg',
        'fecha' => date('Y-m-d')
    ];
    $trabajos[] = $nuevo;
    saveJSON('trabajos.json', $trabajos);
    $mensaje = 'Trabajo agregado';
}

// Agregar derecho
if (isset($_POST['agregar_derecho'])) {
    $derechos = readJSON('derechos.json');
    $nuevo = [
        'id' => count($derechos) + 1,
        'titulo' => $_POST['titulo'],
        'contenido' => $_POST['contenido'],
        'categoria' => $_POST['categoria'],
        'fecha' => date('Y-m-d')
    ];
    $derechos[] = $nuevo;
    saveJSON('derechos.json', $derechos);
    $mensaje = 'Derecho agregado';
}

$trabajos = readJSON('trabajos.json');
$derechos = readJSON('derechos.json');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root { --brown: #8B4513; --gold: #FFD700; }
        body { font-family: Arial; background: #f5f5f5; }
        .menu { background: var(--brown); padding: 20px; }
        .menu a { color: white; text-decoration: none; margin: 0 15px; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .section { background: white; padding: 30px; margin: 20px 0; border-radius: 10px; }
        input, textarea, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { background: var(--brown); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .item { background: #f5f5f5; padding: 15px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="menu">
        <a href="admin.php">Inicio</a>
        <a href="logout.php">Salir</a>
        <a href="index.php" target="_blank">Ver sitio</a>
    </div>
    
    <div class="container">
        <h1 style="color: var(--brown); margin: 20px 0;">Panel de Administración</h1>
        
        <?php if($mensaje): ?>
        <div class="success"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        
        <!-- Agregar Trabajo -->
        <div class="section">
            <h2 style="color: var(--brown); margin-bottom: 20px;">Agregar Trabajo</h2>
            <form method="POST">
                <input type="text" name="titulo" placeholder="Título del trabajo" required>
                <textarea name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                <button type="submit" name="agregar_trabajo">Guardar Trabajo</button>
            </form>
            
            <h3 style="margin: 30px 0 15px;">Trabajos publicados:</h3>
            <?php foreach($trabajos as $t): ?>
            <div class="item">
                <strong><?php echo $t['titulo']; ?></strong><br>
                <small><?php echo $t['fecha']; ?></small>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Agregar Derecho -->
        <div class="section">
            <h2 style="color: var(--brown); margin-bottom: 20px;">Agregar Derecho Laboral</h2>
            <form method="POST">
                <input type="text" name="titulo" placeholder="Título" required>
                <textarea name="contenido" placeholder="Contenido" rows="4" required></textarea>
                <select name="categoria">
                    <option value="derechos">Derechos generales</option>
                    <option value="seguridad">Seguridad</option>
                    <option value="despido">Despidos</option>
                </select>
                <button type="submit" name="agregar_derecho">Guardar</button>
            </form>
            
            <h3 style="margin: 30px 0 15px;">Información publicada:</h3>
            <?php foreach($derechos as $d): ?>
            <div class="item">
                <strong><?php echo $d['titulo']; ?></strong><br>
                <small><?php echo $d['categoria']; ?></small>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
