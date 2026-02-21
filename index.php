<?php
// Página principal
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JServicios</title>
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
        header { background: var(--brown); color: white; padding: 20px; text-align: center; }
        .logo h1 { color: var(--gold); font-size: 48px; }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122');
            background-size: cover; color: white; text-align: center; padding: 100px 20px;
        }
        .hero h2 { font-size: 32px; margin: 20px 0; color: var(--gold); }
        .btn {
            display: inline-block; background: var(--gold); color: var(--brown);
            padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;
        }
        section { padding: 60px 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h2 { text-align: center; color: var(--brown); font-size: 32px; margin-bottom: 40px; }
        .servicios-grid, .derechos-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;
        }
        .card {
            background: #f5f5f5; padding: 30px; border-radius: 10px; text-align: center;
        }
        .card h3 { color: var(--brown); margin: 15px 0; }
        .contacto { background: var(--brown); color: white; text-align: center; }
        .contacto p { margin: 15px 0; font-size: 18px; }
        footer { background: #333; color: white; text-align: center; padding: 30px; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <a href="https://wa.me/1159085736" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <header>
        <div class="logo">
            <h1>JServicios</h1>
            <p>Trabajo obrero con derechos y dignidad</p>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Construimos tus sueños</h2>
            <p style="font-size: 20px; margin: 20px 0;">con derechos y dignidad</p>
            <a href="#contacto" class="btn">Solicitar presupuesto</a>
        </div>
    </section>

    <section id="servicios">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="servicios-grid">
                <div class="card">
                    <i class="fas fa-hard-hat" style="font-size: 48px; color: var(--gold);"></i>
                    <h3>Construcción</h3>
                    <p>Obra nueva y reformas integrales</p>
                </div>
                <div class="card">
                    <i class="fas fa-trowel" style="font-size: 48px; color: var(--gold);"></i>
                    <h3>Albañilería</h3>
                    <p>Tabiques, revoques y contrapisos</p>
                </div>
                <div class="card">
                    <i class="fas fa-tools" style="font-size: 48px; color: var(--gold);"></i>
                    <h3>Reparaciones</h3>
                    <p>Filtraciones y mantenimiento</p>
                </div>
                <div class="card">
                    <i class="fas fa-paint-roller" style="font-size: 48px; color: var(--gold);"></i>
                    <h3>Pintura</h3>
                    <p>Interior y exterior</p>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #f5f5f5;">
        <div class="container">
            <h2>Derechos del Trabajador</h2>
            <div class="derechos-grid">
                <div class="card">
                    <h3>ART</h3>
                    <p>Cobertura obligatoria para accidentes laborales</p>
                </div>
                <div class="card">
                    <h3>Indemnización</h3>
                    <p>1 mes por año trabajado en caso de despido</p>
                </div>
                <div class="card">
                    <h3>Vacaciones</h3>
                    <p>14 a 35 días según antigüedad</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="contacto">
        <div class="container">
            <h2 style="color: white;">Contacto</h2>
            <p><i class="fas fa-phone"></i> 1159085736</p>
            <p><i class="fab fa-whatsapp"></i> 1159085736</p>
            <p><i class="fas fa-envelope"></i> jservicios636@gmail.com</p>
            <p><i class="fas fa-map-marker"></i> Guernica, Av. Atahualpa Yupanqui 2698-2600</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 JServicios - Todos los derechos reservados</p>
    </footer>
</body>
</html>
