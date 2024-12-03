@if($showModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50" id="alert-modal">
        <div class="bg-customDarkGray p-6 rounded-lg shadow-lg w-96 relative">
            <!-- Botón de cierre -->
            <button id="close-modal" class="absolute top-2 right-4 text-gray-400 hover:text-gray-500 text-2xl">&times;</button>
            
            <!-- Título y contenido del modal -->
            <div>
                @if($type === 'success')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-customGreen w-8 h-8 mr-2">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                        </svg>
                        <p class="text-customGreen font-bold text-2xl">{{ ucfirst($title) }}</p>
                    </div>
                @elseif($type === 'danger')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-customGreen w-8 h-8 mr-2">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                        </svg>
                        <p class="text-customGreen font-bold text-2xl">{{ ucfirst($title) }}</p>
                    </div>
                @elseif($type === 'info')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-customGreen w-8 h-8 mr-2">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                        </svg>
                        <p class="text-customGreen font-bold text-2xl">{{ ucfirst($title) }}</p>
                    </div>
                @endif
                <p class="mt-4 text-customBeige">{{ $message }}</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('alert-modal');
            const closeModal = document.getElementById('close-modal');

            // Cerrar automáticamente después de 5 segundos
            setTimeout(() => {
                if (modal) modal.remove();
            }, 10000);

            // Cerrar el modal al hacer clic fuera de él
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                }
            });

            // Cerrar el modal al hacer clic en el botón "x"
            closeModal.addEventListener('click', () => {
                modal.remove();
            });
        });
    </script>
@endif