<x-self.base>
    <x-button class="mr-2" wire:click="decrementar">
        -
    </x-button>
    {{$cont}}
    <x-button class="ml-2" wire:click="incrementar">
        +
    </x-button>
    <div class="mt-2">
        <p>{{$pais}}</p>
        <x-input wire:model.blur="pais" aria-placeholder="Introduce un país..."/>
        <x-button class="mr-2" wire:click="addPais">
            ENVIAR
        </x-button>
        <ul>
            @foreach ($paises as $pais)
                <li>{{$pais}}</li>
            @endforeach
        </ul>
    </div>
</x-self.base>