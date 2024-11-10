<a href="{{ route('programview', ['id' => $program->id]) }}" class="bg-customLighterGray shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105 group">
    <img class="w-full h-48 object-cover" src="{{ asset('img/programs_images/' . $program->img) }}" alt="Imagen">
    <div class="p-4">
        <h3 class="font-bold text-xl mb-2 text-customGreen">{{ $program->title }}</h3>
        <p class="text-sm text-gray-400 mb-2">85% Participants: 1,500 - Donated Money: 14,000$</p>
        <p class="text-sm text-gray-400 mb-4">Fecha: {{ ucfirst(\Carbon\Carbon::parse($program->start_date)->locale('es')->translatedFormat('l d \\d\\e F \\d\\e\\l Y')) }}</p>
        <p class="text-customBeige">{{ $program->short_description }}</p>
        <div class="mt-[1rem] flex items-center">
        <p class="text-lg font-bold text-customGreen">¡Quiero participar!</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#1ab76a" class="w-5 h-5 ml-[0.25rem] transition-all duration-300 group-hover:ml-[0.6rem]">
            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
        </svg>
        </div>
    </div>
</a>