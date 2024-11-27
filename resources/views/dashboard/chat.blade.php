<x-head />
<body class="bg-customDarkGray font-sans antialiased">
    <style>
        <x-styles />

        /* Oculta el texto del sidebar cuando está comprimido */
        #sidebar.compressed .sidebar-text {
            display: none;
        }

        /* Ajusta la visibilidad del tooltip */
        #sidebar .tooltip-text {
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.2s, opacity 0.2s ease-in-out;
        }

        /* Muestra el tooltip cuando se hace hover */
        #sidebar.compressed .my-2:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
    <x-dashboard_sidebar />

    <!-- CONTENT -->
    <section id="content" class="ml-64 p-6 transition-all duration-300">
        <x-navbar_configuration />

        <main class="mt-8">
            <div class="chat-area bg-customLightGray p-6 rounded-lg shadow-lg">
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
                            <p class="text-sm text-blue-500">Administrador</p>
                        @elseif ($user->rol === 'coordinator')
                            <p class="text-sm text-green-500">Coordinador</p>
                        @elseif ($user->rol === 'user')
                            <p class="text-sm text-yellow-500">Usuario</p>
                        @elseif($user->rol === 'volunteer')
                            <p class="text-sm text-purple-500">Voluntario</p>
                        @elseif($user->rol === 'becario')
                            <p class="text-sm text-red-500">Becario</p>
                        @else
                            <p class="text-sm text-gray-500">{{$user->rol}}</p>

                        @endif
                    </div>
                    
                    
                </header>

                <!-- Chat Box -->
                <div id="chatBox" class="chat-box flex flex-col space-y-4 overflow-y-auto h-96 p-4 bg-customLighterGray rounded-lg">
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
                        class="w-full bg-customGrayWhatsappInput text-white !border-none rounded-l-lg px-4 py-2 focus:ring-2 focus:border-customLighterGray ">
                    <button 
                        type="submit" 
                        class="bg-customGreen hover:bg-customDarkGreen text-white px-4 rounded-r-lg transition">
                        <!-- <i class="fab fa-telegram-plane"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-white w-4 h-4"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
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
        ? 'bg-blue-600 text-white rounded-tr-lg font-semibold' 
        : 'bg-gray-300 text-gray-800 rounded-tl-lg font-semibold'
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