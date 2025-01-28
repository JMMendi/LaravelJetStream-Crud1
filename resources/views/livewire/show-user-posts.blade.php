<x-self.base>
    <div class="flex w-full items-center justify-between">
        <div>
            <x-input type="search" placeholder="Buscar..." wire:model.live="cadena"/><i class="fas fa-search"></i>
        </div>
        <div>
            @livewire('crear-post')
        </div>
    </div>
    @if($posts->count())
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Imagen</span>
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('titulo')">
                        Título<i class="fas fa-sort ml-1"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('contenido')">
                        Contenido<i class="fas fa-sort ml-1"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('estado')">
                        Estado<i class="fas fa-sort ml-1"></i>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4">
                        <img src="{{Storage::url($item->imagen)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Imagen de {{$item->titulo}}">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{$item->titulo}}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{$item->contenido}}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{$item->estado}}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="mostrarAlerta({{$item}})"><i class="fas fa-trash text-gray-500 hover:text-gray-800 hover:text-xl"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{$posts->links()}}
    </div>
    @else
    <div class="bg-black text-white p-2 rounded-xl font-semibold mt-2">
        No se encontró ningún post o aún no se ha escrito ninguno. Aproveche para crear el post de sus sueños.
    </div>
    @endif

</x-self.base>