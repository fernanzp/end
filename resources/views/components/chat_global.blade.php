<style>
  /* Floating Chat Button */
  #chat-bubble {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #1ab76a;
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
    background-color: #1ab76a;
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
    flex-direction: column;
  }

  .message.user {
    justify-content: flex-end;
  }

  .message.other {
    justify-content: flex-start;
  }

  .message .name {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .message .bubble.user {
    background-color: #007bff;
    color: white;
    border-bottom-right-radius: 0;
  }

  .message .bubble.other {
    background-color: #eee;
    color: #333;
    border-bottom-left-radius: 0;
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
</style>

{{-- @csrf token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

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
  const currentUserName = @json(Auth::check() ? Auth::user()->name : 'Desconocido');
</script>


<script>
  const chatBubble = document.getElementById('chat-bubble');
  const chatContainer = document.getElementById('chat-container');
  const messagesDiv = document.getElementById('messages');
  const messageInput = document.getElementById('messageInput');
  const sendButton = document.getElementById('sendButton');

  // Mostrar/Ocultar Chat al hacer clic en la burbuja
  chatBubble.addEventListener('click', () => {
    chatContainer.style.display = chatContainer.style.display === 'flex' ? 'none' : 'flex';

    if (chatContainer.style.display === 'flex') {
      loadMessages(); // Cargar mensajes al abrir el chat
    }
  });

  // Función para agregar mensajes con avatar y nombre
  function addMessage(text, type = 'user', avatar = 'https://img.icons8.com/ios-filled/50/ffffff/chat.png', name = 'Usuario') {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message', type);

    const nameDiv = document.createElement('div');
    nameDiv.classList.add('name');
    nameDiv.innerText = name;

    const avatarImg = document.createElement('img');
    avatarImg.src = avatar;
    avatarImg.alt = 'Avatar';
    avatarImg.classList.add('avatar');

    const bubble = document.createElement('div');
    bubble.classList.add('bubble', type);
    bubble.innerText = text;

    if (type === 'user') {
      messageDiv.appendChild(nameDiv);  // Agregar el nombre
      messageDiv.appendChild(bubble);
      messageDiv.appendChild(avatarImg);
    } else {
      messageDiv.appendChild(avatarImg);
      messageDiv.appendChild(nameDiv);  // Agregar el nombre
      messageDiv.appendChild(bubble);
    }

    messagesDiv.appendChild(messageDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight; // Scroll automático
  }

  // Modificar la función loadMessages
  function loadMessages() {
    fetch("{{ route('chatGlobal.getMessages') }}")
      .then(response => response.json())
      .then(data => {
        messagesDiv.innerHTML = ''; // Limpiar mensajes existentes
        const currentUserId = {{ Auth::id() }}; // ID del usuario actual
        data.forEach(msg => {
          const isMine = msg.user && msg.user.id === currentUserId; // Verifica si el mensaje es del usuario actual
          const type = isMine ? 'user' : 'other';
          const avatar = msg.user && msg.user.avatar ? msg.user.avatar : 'https://img.icons8.com/ios-filled/50/ffffff/chat.png';
          const text = msg.msg;
          const name = msg.user ? msg.user.name : 'Desconocido';  // Nombre del usuario
          addMessage(text, type, avatar, name); // Agrega el mensaje con la clase correspondiente
        });
      })
      .catch(error => {
        console.error('Error al cargar mensajes:', error);
      });
  }
// Evento de envío de mensaje
sendButton.addEventListener('click', () => {
  const text = messageInput.value.trim();
  if (text) {

    addMessage(text, 'user', 'https://img.icons8.com/ios-filled/50/ffffff/chat.png', currentUserName);
    messageInput.value = '';

    // Enviar mensaje al servidor
    fetch("{{ route('chatGlobal.sendMessage') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({ message: text })
    })
    .then(response => response.json())
    .then(() => {
      loadMessages(); // Recargar los mensajes después de enviar
    })
    .catch(error => {
      console.error('Error al enviar mensaje:', error);
    });
  }
});

  // Recargar los mensajes cada 500ms
  setInterval(loadMessages, 500);
</script>
