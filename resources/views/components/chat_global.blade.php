<style>
    /* Floating Chat Button */
    #chat-bubble {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #007bff;
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
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      display: none;
      flex-direction: column;
      overflow: hidden;
      z-index: 1000;
    }

    #chat-header {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
      font-weight: bold;
    }

    #messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
    }

    .message {
      display: flex;
      margin-bottom: 12px;
      align-items: flex-start;
    }

    .message.user {
      justify-content: flex-end;
    }

    .message .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .message.user .avatar {
      margin-left: 10px;
      margin-right: 0;
    }

    .bubble {
      max-width: 70%;
      padding: 10px 15px;
      border-radius: 15px;
      font-size: 14px;
    }

    .bubble.system {
      background-color: #eee;
      color: #333;
    }

    .bubble.user {
      background-color: #007bff;
      color: white;
    }

    .bubble.global {
      background-color: #fef3c7;
      color: #c05621;
    }

    /* Input Section */
    #input-container {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ddd;
      background-color: #f9f9f9;
    }

    #input-container input {
      flex: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    #input-container button {
      margin-left: 8px;
      padding: 8px 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
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
    function addMessage(text, type = 'user', avatar = 'img/dik.png') {
      const messageDiv = document.createElement('div');
      messageDiv.classList.add('message', type);

      const avatarImg = document.createElement('img');
      avatarImg.src = avatar;
      avatarImg.alt = 'Avatar';
      avatarImg.classList.add('avatar');

      const bubble = document.createElement('div');
      bubble.classList.add('bubble', type);
      bubble.innerText = text;

      if (type === 'user') {
        messageDiv.appendChild(bubble);
        messageDiv.appendChild(avatarImg);
      } else {
        messageDiv.appendChild(avatarImg);
        messageDiv.appendChild(bubble);
      }

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
</script>