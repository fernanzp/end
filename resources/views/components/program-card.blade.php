<div class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105">
    <img class="w-full h-48 object-cover" src="{{ asset('img/programs_images/' . $program->img) }}" alt="Imagen">
    <div class="p-4">
        <h3 class="font-bold text-xl mb-2 text-customGreen">{{ $program->title }}</h3>
        <p class="text-sm text-gray-400 mb-2">85% Participants: 1,500 - Donated Money: 14,000$</p>
        <p class="text-sm text-gray-400 mb-4">Fecha: {{ \Carbon\Carbon::parse($program->start_date)->locale('es')->translatedFormat('l d \\d\\e F \\d\\e\\l Y') }}</p>
        <p class="text-customBeige">{{ $program->short_description }}</p>
        <div class="flex justify-end">
            <button class="mt-4 bg-customGreen text-white px-4 py-2 rounded hover:bg-green-600">¡Quiero participar!</button>
        </div>
    </div>
</div>