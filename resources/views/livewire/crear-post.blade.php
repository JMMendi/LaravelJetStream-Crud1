<div>
    <x-button wire:click="$set('openModalCrear', true)">
        <i class="fas fa-add mr-1"></i>Nuevo
    </x-button>
    <x-dialog-modal maxWidth='2xl' wire:model="openModalCrear">
        <x-slot name="title">
            Nuevo Post
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                <input type="titulo" id="titulo" name="titulo" wire:model="form.titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <x-input-error for="form.titulo"/>
            </div>
            <div class="mb-5">
                <label for="contenido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                <textarea name="contenido" wire:model="form.contenido" id="contenido"></textarea>
                <x-input-error for="form.contenido"/>
            </div>
            <div class="mb-5">
                <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                <input type="radio" name="estado" wire:model="form.estado" value="Publicado" class="mr-2">Publicado
                <input type="radio" name="estado" wire:model="form.estado" value="Borrador" class="mr-2">Borrador
                <x-input-error for="form.estado"/>
            </div>
            
            <label class="block text-gray-700 font-medium mb-2" for="cimagen">Imagen</label>
            <div class="w-full h-96 bg-gray-200 relative rounded-lg">
                <label for="cimagen" class="absolute bottom-2 end-2 p-2 rounded-xl bg-gray-700 text-white font-bold hover:bg-black"><i class="fas fa-upload mr-2"></i>Subir</label>
                <input type="file" name="imagen" wire:model="form.imagen" accept="image/*" id="cimagen" hidden />
                <!-- El id del input será importante. c de crear y lo que creará -->
                
                @isset($form->imagen)
                    <img src="{{$form->imagen->temporaryUrl()}}" class="bg-no-repeat bg-cover w-full h-full bg-center">
                @endisset

            </div>
            <x-input-error for="form.imagen"/>

        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="store" wire:loading.attr="hidden" class="mr-2 ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            <button type="reset" wire:click="cancelar" class="mr-2 ml-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Reset</button>
            <a class="mr-2 ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Volver</a>

        </x-slot>
    </x-dialog-modal>
</div>