// Configuración del bot
const configBot = {
    nombre: "Asistente J Servicios",
    emailContacto: "jservicios636@gmail.com",
    whatsappContacto: "5491159085736",
    mensajeBienvenida: "👋 ¡Hola! Soy el asistente de J Servicios. ¿En qué puedo ayudarte?",
    mensajeNoEntiendo: "😕 No entendí. Contactanos directamente:"
};

// Respuestas automáticas
const respuestas = [
    {
        palabras: ["hola", "buenas", "buenos dias", "saludos"],
        respuesta: "👋 ¡Hola! Bienvenido a J Servicios. ¿Cómo puedo ayudarte?"
    },
    {
        palabras: ["registro", "registrarme", "crear cuenta", "alta"],
        respuesta: "📝 Para registrarte: hacé clic en 'Soy Trabajador' o 'Soy Empleador' en el menú superior."
    },
    {
        palabras: ["trabajador", "trabajar", "oficio", "laburar"],
        respuesta: "🛠️ Registrate como trabajador, contá qué sabés hacer y empezá a recibir contactos."
    },
    {
        palabras: ["empleador", "contratar", "busco", "necesito"],
        respuesta: "🔍 Registrate como empleador y buscá trabajadores por zona o palabra clave."
    },
    {
        palabras: ["whatsapp", "wp", "contacto", "telefono", "hablar"],
        respuesta: "📱 WhatsApp: 11-5908-5736 | Email: jservicios636@gmail.com"
    }
];

// Función para crear el bot
function crearBotAyuda() {
    // Agregar estilos
    const estilos = document.createElement('style');
    estilos.textContent = `
        .bot-ayuda-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .bot-ayuda-boton {
            width: 60px;
            height: 60px;
            background-color: #D4AF37;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            border: 2px solid #5D3A1A;
        }
        
        .bot-ayuda-chat {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 300px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
            display: none;
            overflow: hidden;
            border: 2px solid #5D3A1A;
        }
        
        .bot-ayuda-chat.activo {
            display: block;
        }
        
        .bot-ayuda-header {
            background: #5D3A1A;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .bot-ayuda-header h3 {
            margin: 0;
            color: #D4AF37;
            font-size: 16px;
        }
        
        .bot-ayuda-header button {
            background: none;
            border: none;
            color: #D4AF37;
            font-size: 20px;
            cursor: pointer;
        }
        
        .bot-ayuda-mensajes {
            height: 250px;
            overflow-y: auto;
            padding: 15px;
            background: #f5f5f5;
        }
        
        .mensaje-bot {
            background: #D4AF37;
            color: #5D3A1A;
            padding: 10px;
            border-radius: 15px 15px 15px 0;
            margin-bottom: 10px;
            max-width: 80%;
        }
        
        .mensaje-usuario {
            background: #5D3A1A;
            color: white;
            padding: 10px;
            border-radius: 15px 15px 0 15px;
            margin-bottom: 10px;
            max-width: 80%;
            margin-left: auto;
        }
        
        .bot-ayuda-input {
            display: flex;
            padding: 10px;
            background: white;
            border-top: 1px solid #ddd;
        }
        
        .bot-ayuda-input input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }
        
        .bot-ayuda-input button {
            background: #D4AF37;
            color: #5D3A1A;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-left: 5px;
            cursor: pointer;
        }
        
        .bot-ayuda-footer {
            padding: 8px;
            background: #f0f0f0;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }
        
        .bot-ayuda-footer a {
            color: #5D3A1A;
            font-weight: bold;
            text-decoration: none;
        }
    `;
    document.head.appendChild(estilos);
    
    // Crear el HTML del bot
    const container = document.createElement('div');
    container.className = 'bot-ayuda-container';
    container.innerHTML = `
        <div class="bot-ayuda-boton" id="botAyudaBoton">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12c0 1.83.49 3.53 1.35 5L2 22l5-1.35c1.47.86 3.17 1.35 5 1.35 5.52 0 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z'/%3E%3C/svg%3E" alt="Ayuda">
        </div>
        
        <div class="bot-ayuda-chat" id="botAyudaChat">
            <div class="bot-ayuda-header">
                <h3>${configBot.nombre}</h3>
                <button id="botAyudaCerrar">×</button>
            </div>
            
            <div class="bot-ayuda-mensajes" id="botAyudaMensajes">
                <div class="mensaje-bot">${configBot.mensajeBienvenida}</div>
            </div>
            
            <div class="bot-ayuda-input">
                <input type="text" id="botAyudaInput" placeholder="Escribí tu pregunta...">
                <button id="botAyudaEnviar">➤</button>
            </div>
            
            <div class="bot-ayuda-footer">
                <a href="https://wa.me/${configBot.whatsappContacto}" target="_blank">📱 WhatsApp</a> | 
                <a href="mailto:${configBot.emailContacto}">📧 Email</a>
            </div>
        </div>
    `;
    
    document.body.appendChild(container);
    
    // Lógica del bot
    const boton = document.getElementById('botAyudaBoton');
    const chat = document.getElementById('botAyudaChat');
    const cerrar = document.getElementById('botAyudaCerrar');
    const input = document.getElementById('botAyudaInput');
    const enviar = document.getElementById('botAyudaEnviar');
    const mensajes = document.getElementById('botAyudaMensajes');
    
    boton.addEventListener('click', () => {
        chat.classList.toggle('activo');
    });
    
    cerrar.addEventListener('click', () => {
        chat.classList.remove('activo');
    });
    
    function buscarRespuesta(pregunta) {
        const texto = pregunta.toLowerCase();
        for (let item of respuestas) {
            for (let palabra of item.palabras) {
                if (texto.includes(palabra)) {
                    return item.respuesta;
                }
            }
        }
        return `${configBot.mensajeNoEntiendo}\n📱 WhatsApp: ${configBot.whatsappContacto}\n📧 Email: ${configBot.emailContacto}`;
    }
    
    function agregarMensaje(texto, esUsuario = false) {
        const div = document.createElement('div');
        div.className = esUsuario ? 'mensaje-usuario' : 'mensaje-bot';
        div.textContent = texto;
        mensajes.appendChild(div);
        mensajes.scrollTop = mensajes.scrollHeight;
    }
    
    function enviarMensaje() {
        const texto = input.value.trim();
        if (texto === '') return;
        agregarMensaje(texto, true);
        input.value = '';
        setTimeout(() => {
            const respuesta = buscarRespuesta(texto);
            agregarMensaje(respuesta);
        }, 500);
    }
    
    enviar.addEventListener('click', enviarMensaje);
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') enviarMensaje();
    });
}

// Iniciar el bot cuando cargue la página
window.addEventListener('load', crearBotAyuda);
