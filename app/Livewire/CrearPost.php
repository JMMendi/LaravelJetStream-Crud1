<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearPost;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearPost extends Component
{
    // Para manejar la subida de ficheros (Usa el de livewire)
    use WithFileUploads;

    public FormCrearPost $form;

    public bool $openModalCrear=false;

    public function render()
    {
        return view('livewire.crear-post');
    }

    // -------------------
    public function store() {
        $this->form->fGuardarPost();

        // Creamos un evento dirigido a la clase Show-User-Posts para notificar que se renderice
        $this->dispatch('onPostCreado')->to(ShowUserPosts::class);

        // Creamos un evento global para el sweetalert 2
        $this->dispatch('mensaje', 'Se guardó el post');

        $this->cancelar();
    }

    public function cancelar() {
        $this->openModalCrear=false;
        $this->form->fLimpiar();
    }
}
