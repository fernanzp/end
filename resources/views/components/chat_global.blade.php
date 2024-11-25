<style>
/* Floating Chat Button */
#chat-bubble {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #00A86B;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 1000;
}

#chat-bubble img {
    width: 30px;
    height: 30px;
}

/* Chat Window */
#chat-container {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 300px;
    max-height: 400px;
    background: #3a3c3a;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 1000;
}

#chat-header {
    background-color: #00A86B;
    color: #ffffff;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}

#messages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #00A86B #3a3c3a;
}

.message {
    display: flex;
    flex-direction: column; /* Cambiar a columna */
    align-items: flex-start; /* Alinear todo a la izquierda */
    margin-bottom: 12px;
    /*max-width: 80%;*/
}

.message.user {
    align-self: flex-end; /* Mensajes del usuario a la derecha */
    align-items: flex-end;
}

.message .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-bottom: 5px; /* Espacio entre avatar y mensaje */
}

.message.user .avatar {
    align-self: flex-end; /* Alinea avatar del usuario a la derecha */
}

.bubble {
    max-width: 100%;
    word-wrap: break-word;
    overflow-wrap: break-word;
    padding: 10px 15px;
    border-radius: 15px;
    font-size: 14px;
}

.bubble.system {
    background-color: #2a2c2a;
    color: #ffffff;
}

.bubble.user {
    background-color: #00A86B;
    color: white;
}

.bubble.global {
    background-color: #fef3c7;
    color: #8B4513;
}

/* Input Section */
#input-container {
    display: flex;
    padding: 10px;
    background-color: #3a3c3a;
}

#input-container input {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #E8E8E8;
    color: #333;
}

#input-container button {
    margin-left: 8px;
    padding: 8px 12px;
    background-color: #3a3c3a;
    color: #1bb76a;
    border: 2px solid #1bb76a;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#input-container button:hover {
    color: #3a3c3a;
    background-color: #1ab76a;
    transition: 0.5s;
}
</style>

<!-- Chat Bubble -->
<div id="chat-bubble">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/chat.png" alt="Chat">
</div>

<!-- Chat Window -->
<div id="chat-container">
    <div id="chat-header">Chat Global</div>
    <div id="messages"></div>
    <div id="input-container">
        <input type="text" id="messageInput" placeholder="Escribe un mensaje..." />
        <button id="sendButton">Enviar</button>
    </div>
</div>

<script>
const chatBubble = document.getElementById('chat-bubble');
const chatContainer = document.getElementById('chat-container');
const messagesDiv = document.getElementById('messages');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');

// Mostrar/Ocultar Chat al hacer clic en la burbuja
chatBubble.addEventListener('click', () => {
  chatContainer.style.display = chatContainer.style.display === 'flex' ? 'none' : 'flex';
});

// Función para agregar mensajes con avatar
//en avatar debe ir la direccion de la imagen
function addMessage(text, type = 'user', avatar = 'img/profile_images/1732509307_Screenshot (3).png') {
  const messageDiv = document.createElement('div');
  messageDiv.classList.add('message', type);

  const avatarImg = document.createElement('img');
  avatarImg.src = avatar;
  avatarImg.alt = 'Avatar';
  avatarImg.classList.add('avatar');

  const bubble = document.createElement('div');
  bubble.classList.add('bubble', type);
  bubble.innerText = text;

  // Añadir avatar arriba del mensaje
  messageDiv.appendChild(avatarImg);
  messageDiv.appendChild(bubble);

  messagesDiv.appendChild(messageDiv);
  // Scroll automático
  messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

// Evento de envío de mensaje
sendButton.addEventListener('click', () => {
  const text = messageInput.value.trim();
  if (text) {
    addMessage(text, 'user'); // Mensaje del usuario
    messageInput.value = '';

    // Simulación de respuesta automática
    setTimeout(() => {
      addMessage('¡Hola! Este es un mensaje global.', 'system');
    }, 1000);
  }
});

// Enviar mensaje al presionar Enter
messageInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    sendMessage();
  }
});

// Función para enviar el mensaje
function sendMessage() {
  const text = messageInput.value.trim();
  if (text) {
    addMessage(text, 'user'); // Mensaje del usuario
    messageInput.value = '';

    // Simulación de respuesta automática
    setTimeout(() => {
      addMessage('¡Hola! Este es un mensaje global.', 'system');
    }, 1000);
  }
}

// Actualizar el evento del botón para usar la función sendMessage
sendButton.addEventListener('click', sendMessage);

</script>
