<x-head />
<body class="bg-customDarkGray font-sans antialiased">
    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-6 transition-all duration-300">
        <x-navbar_configuration />

        <main class="mt-8">
            <div class="chat-area bg-gray-800 p-6 rounded-lg shadow-lg">
                <!-- Header del Chat -->
                <header class="flex items-center space-x-4 mb-6">
                    <a href="{{ route('messaging') }}" class="text-gray-300 text-lg hover:text-white transition">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <img src="{{ $user->profile_img }}" alt="Foto de perfil" class="w-12 h-12 rounded-full">
                    <div>
                        <span class="block text-lg font-bold text-white">
                            {{ $user->name }} {{ $user->last_name }}
                        </span>
                        
                        @if ($user->rol === 'admin')
                            <p class="text-sm text-blue-400">Administrador</p>
                        @elseif ($user->rol === 'coordinator')
                            <p class="text-sm text-green-400">Coordinador</p>
                        @elseif ($user->rol === 'user')
                            <p class="text-sm text-yellow-400">Usuario</p>
                        @elseif($user->rol === 'volunteer')
                            <p class="text-sm text-purple-400">Voluntario</p>
                        @elseif($user->rol === 'becario')
                            <p class="text-sm text-red-400">Becario</p>
                        @else
                            <p class="text-sm text-gray-400">{{$user->rol}}</p>

                        @endif
                    </div>
                    
                    
                </header>

                <!-- Chat Box -->
                <div id="chatBox" class="chat-box flex flex-col space-y-4 overflow-y-auto h-96 p-4 bg-gray-700 rounded-lg">
                    <!-- Mensajes se cargarán dinámicamente aquí -->
                </div>

                <!-- Área de Escritura -->
                <form id="chatForm" class="typing-area mt-4 flex">
                    <input 
                        type="hidden" 
                        name="incoming_id" 
                        value="{{ $user->id }}" 
                        class="hidden">
                    <input 
                        type="text" 
                        name="message" 
                        id="messageInput" 
                        placeholder="Escribe tu mensaje aquí..." 
                        class="w-full bg-gray-600 text-white border-none rounded-l-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 rounded-r-lg transition">
                        <i class="fab fa-telegram-plane"></i>
                    </button>
                </form>
            </div>
        </main>
    </section>

    <script>
    // Selección de elementos
    const menuBar = document.getElementById('menuBar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const notificationBell = document.getElementById('notificationBell');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const sidebarTextElements = document.querySelectorAll('.sidebar-text');

    // Mostrar/Ocultar el dropdown de notificaciones
    notificationBell.addEventListener('click', function (event) {
        event.preventDefault();
        notificationDropdown.classList.toggle('hidden');
    });

    // Ocultar el dropdown si se hace clic fuera de él
    window.addEventListener('click', function (e) {
        if (!notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add('hidden');
        }
    });

    menuBar.addEventListener('click', function () {
        // Alternar clase comprimido en el sidebar
        sidebar.classList.toggle('compressed');

        // Cambiar el ancho del sidebar y ajustar el margen del contenido
        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');
        content.classList.toggle('ml-16');
        content.classList.toggle('ml-64');
    });

    
	</script>

    <script>
        // Seleccionar todos los enlaces de apertura de modal y los botones de cierre de modal
        const modalLinks = document.querySelectorAll('.modal-link');
        const modals = document.querySelectorAll('.modal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        // Abrir el modal correspondiente al enlace clicado
        modalLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetModalId = link.getAttribute('data-modal-target');
                const targetModal = document.getElementById(targetModalId);
                if (targetModal) {
                    targetModal.classList.remove('hidden');
                }
            });
        });

        // Cerrar modal al hacer clic en el botón de cierre
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                button.closest('.modal').classList.add('hidden');
            });
        });

        // Cerrar modal al hacer clic fuera del contenido del modal
        window.addEventListener('click', function(event) {
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
    <script>
        let isNearBottom = true;
      
        // Escuchar el evento scroll del chat para detectar si el usuario está cerca del final
        chatBox.addEventListener('scroll', () => {
          const tolerance = 50; // Tolerancia en píxeles para considerar que está cerca del fondo
          isNearBottom = chatBox.scrollHeight - chatBox.scrollTop - chatBox.clientHeight <= tolerance;
      });
      
      
        function loadMessages() {
          let incoming_id = document.querySelector('input[name="incoming_id"]').value;
      
          fetch("{{ route('chat.getMessages') }}", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ incoming_id })
          })
          .then(response => response.json())
          .then(data => {
            chatBox.innerHTML = ''; // Limpiar los mensajes antes de cargar los nuevos
            data.forEach(msg => {
          let messageElement = document.createElement('div');
          messageElement.classList.add('chat');
          messageElement.classList.add(msg.outgoing_msg_id === {{ Auth::id() }} ? 'outgoing' : 'incoming');
      
          const messageContent = msg.msg.replace(
  /(https?:\/\/[^\s]+)/g,
  '<a href="$1" target="_blank" class="text-blue-400 hover:underline">$1</a>'
);

const checkIcon = msg.is_read 
  ? '<i class="fas fa-check-double text-blue-400 ml-2"></i>' 
  : '<i class="fas fa-check text-gray-400 ml-2"></i>';

// Estructura HTML del mensaje
messageElement.innerHTML = `
  <div class="details ${msg.outgoing_msg_id === {{ Auth::id() }} ? 'text-right' : 'text-left'}">
    <p class="inline-block px-4 py-2 rounded-lg ${
      msg.outgoing_msg_id === {{ Auth::id() }} 
        ? 'bg-blue-500 text-white rounded-tr-lg' 
        : 'bg-gray-200 text-gray-800 rounded-tl-lg'
    }">
      ${messageContent} ${msg.outgoing_msg_id === {{ Auth::id() }} ? checkIcon : ''}
    </p>
  </div>
`;
          chatBox.appendChild(messageElement);
      });
      
      
            // Hacer scroll solo si el usuario está cerca del final del chat
            if (isNearBottom) {
              chatBox.scrollTop = chatBox.scrollHeight;
            }
          });
        }
      
        setInterval(loadMessages, 500); // Recargar mensajes cada 500ms
      
        document.getElementById('chatForm').onsubmit = (e) => {
          e.preventDefault();
          let message = document.getElementById('messageInput').value;
          let incoming_id = document.querySelector('input[name="incoming_id"]').value;
      
          fetch("{{ route('chat.sendMessage') }}", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ incoming_id, message })
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              document.getElementById('messageInput').value = '';
              loadMessages();
            }
          });
        };
      </script>
</body>
</html>