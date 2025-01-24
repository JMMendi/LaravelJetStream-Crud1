<?php

namespace App\Livewire;

use Livewire\Component;

class Prueba extends Component
{
    public int $cont = 0;
    public array $paises = ['España', 'Alemania'];
    public string $pais;
    
    
    public function render()
    {
        return view('livewire.prueba');
    }

    public function incrementar() {
        $this->cont++;
    }

    public function decrementar() {
        $this->cont--;
    }

    public function addPais() {
        $this->paises[] =$this->pais;
        $this->pais="";
    }
}
