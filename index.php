<?php
// index.php
include_once 'includes/header.php';
?>

<!-- INICIO -->
<section id="inicio" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122'); background-size: cover; color: white; text-align: center; padding: 100px 0;">
    <div class="container">
        <h1 style="font-size: 48px; color: #FFD700;">JServicios</h1>
        <h2 style="font-size: 24px; margin: 20px 0;">Trabajo obrero con derechos y dignidad</h2>
        <a href="#contacto" style="display: inline-block; background: #FFD700; color: #8B4513; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;">Solicitar presupuesto</a>
    </div>
</section>

<!-- SERVICIOS -->
<section id="servicios" style="padding: 60px 0;">
    <div class="container">
        <h2 style="text-align: center; color: #8B4513; font-size: 32px; margin-bottom: 40px;">Nuestros Servicios</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="background: #f5f5f5; padding: 30px; border-radius: 10px; text-align: center;">
                <div style="font-size: 48px;">🏗️</div>
                <h3 style="color: #8B4513;">Construcción</h3>
                <p>Obra nueva y reformas integrales</p>
            </div>
            <div style="background: #f5f5f5; padding: 30px; border-radius: 10px; text-align: center;">
                <div style="font-size: 48px;">🧱</div>
                <h3 style="color: #8B4513;">Albañilería</h3>
                <p>Tabiques, revoques y contrapisos</p>
            </div>
            <div style="background: #f5f5f5; padding: 30px; border-radius: 10px; text-align: center;">
                <div style="font-size: 48px;">🔧</div>
                <h3 style="color: #8B4513;">Reparaciones</h3>
                <p>Filtraciones, grietas y mantenimiento</p>
            </div>
            <div style="background: #f5f5f5; padding: 30px; border-radius: 10px; text-align: center;">
                <div style="font-size: 48px;">🎨</div>
                <h3 style="color: #8B4513;">Pintura</h3>
                <p>Interior y exterior</p>
            </div>
        </div>
    </div>
</section>

<!-- DERECHOS -->
<section id="derechos" style="background: #f5f5f5; padding: 60px 0;">
    <div class="container">
        <h2 style="text-align: center; color: #8B4513; font-size: 32px; margin-bottom: 40px;">Derechos del Trabajador</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div style="background: white; padding: 25px; border-radius: 10px;">
                <h3 style="color: #8B4513;">ART</h3>
                <p>La ART es OBLIGATORIA. Cubre accidentes laborales.</p>
            </div>
            <div style="background: white; padding: 25px; border-radius: 10px;">
                <h3 style="color: #8B4513;">Indemnización</h3>
                <p>Despido sin causa: 1 mes por año trabajado.</p>
            </div>
            <div style="background: white; padding: 25px; border-radius: 10px;">
                <h3 style="color: #8B4513;">Vacaciones</h3>
                <p>14 a 35 días según antigüedad.</p>
            </div>
        </div>
    </div>
</section>

<!-- TRABAJOS -->
<section id="trabajos" style="padding: 60px 0;">
    <div class="container">
        <h2 style="text-align: center; color: #8B4513; font-size: 32px; margin-bottom: 40px;">Trabajos Realizados</h2>
        <p style="text-align: center;">Pronto subiremos fotos de nuestros trabajos</p>
    </div>
</section>

<!-- CONTACTO -->
<section id="contacto" style="background: #8B4513; color: white; padding: 60px 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 32px; margin-bottom: 40px;">Contacto</h2>
        <div style="text-align: center; font-size: 18px;">
            <p style="margin: 15px 0;"><i class="fas fa-phone"></i> (011) 15-1234-5678</p>
            <p style="margin: 15px 0;"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/5491123456789" style="color: white;">WhatsApp</a></p>
            <p style="margin: 15px 0;"><i class="fas fa-envelope"></i> info@jservicios.com</p>
            <p style="margin: 15px 0;"><i class="fas fa-map-marker"></i> Zona Norte, Buenos Aires</p>
        </div>
    </div>
</section>

<?php include_once 'includes/footer.php'; ?>
