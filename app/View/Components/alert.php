<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $showModal;

    /**
     * Crear una nueva instancia del componente.
     *
     * @param string $type
     * @param string $message
     * @param bool $showModal
     * @return void
     */
    public function __construct($type, $message, $showModal = false)
    {
        $this->type = $type;
        $this->message = $message;
        $this->showModal = $showModal;
    }

    /**
     * Obtener la vista / contenido que representa el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.alert');
    }
}