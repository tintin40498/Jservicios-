// J Servicios - Backend
// Todos los derechos reservados
// Contacto: jservicios636@gmail.com
// WhatsApp: 11-5908-5736

const express = require('express');
const cors = require('cors');
const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Bases de datos temporales (en memoria)
let trabajadores = [];
let empleadores = [];

// Ruta de prueba
app.get('/', (req, res) => {
    res.json({ 
        mensaje: 'J Servicios API funcionando',
        contacto: 'jservicios636@gmail.com',
        whatsapp: '1159085736'
    });
});

// Registro de trabajador
app.post('/api/registro-trabajador', (req, res) => {
    const nuevoTrabajador = {
        id: Date.now(),
        ...req.body,
        fechaRegistro: new Date().toISOString()
    };
    trabajadores.push(nuevoTrabajador);
    console.log('✅ Nuevo trabajador registrado:', nuevoTrabajador.nombre);
    res.status(201).json({ 
        mensaje: 'Registro exitoso',
        id: nuevoTrabajador.id
    });
});

// Registro de empleador
app.post('/api/registro-empleador', (req, res) => {
    const nuevoEmpleador = {
        id: Date.now(),
        ...req.body,
        fechaRegistro: new Date().toISOString()
    };
    empleadores.push(nuevoEmpleador);
    console.log('✅ Nuevo empleador registrado:', nuevoEmpleador.nombre);
    res.status(201).json({ 
        mensaje: 'Registro exitoso',
        id: nuevoEmpleador.id
    });
});

// Ver todos los trabajadores (solo para pruebas)
app.get('/api/trabajadores', (req, res) => {
    res.json(trabajadores);
});

// Ver todos los empleadores (solo para pruebas)
app.get('/api/empleadores', (req, res) => {
    res.json(empleadores);
});

// Iniciar servidor
app.listen(PORT, '0.0.0.0', () => {
    console.log('=================================');
    console.log('🚀 J Servicios backend funcionando');
    console.log('📡 Puerto: ' + PORT);
    console.log('📧 Contacto: jservicios636@gmail.com');
    console.log('📱 WhatsApp: 11-5908-5736');
    console.log('=================================');
});
