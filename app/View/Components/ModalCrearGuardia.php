<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ModalCrearGuardia extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = User::where('estado', 'Activo')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('components.modals.modal-crear-guardia')
            ->with('users', $users);
    }
}
