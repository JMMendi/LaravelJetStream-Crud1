<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormCrearPost extends Form
{
    // Anotaciones (Son para hacer las validaciones directamente)
    #[Validate(['required', 'string', 'min:3', 'max:100', 'unique:posts,titulo'])]
    public string $titulo = "";

    #[Validate(['required', 'string', 'min:10', 'max:250'])]
    public string $contenido = "";

    #[Validate(['required', 'in:Publicado,Borrador'])]
    public string $estado = "";
    
    #[Validate(['nullable', 'image', 'max:4096'])]
    public $imagen;

    public function fGuardarPost() {
        $this->validate();
        // Si todo sale bien, guardo el post

        Post::create([
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'estado' => $this->estado,
            'imagen' => ($this->imagen) ? $this->imagen->store('posts-images/') : "post-images/Mog_FFIX_Art.webp",
            'user_id' => Auth::user()->id,
        ]);
    }

    public function fLimpiar(){
        $this->reset();
    }

    /*
    Sería lo mismo que hacer lo de rules
    public function rules() {
        return([
            'titulo' => ['blablabla', ...]
        ])
    }
    */
}
