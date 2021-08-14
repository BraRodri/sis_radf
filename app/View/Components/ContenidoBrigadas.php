<?php

namespace App\View\Components;

use App\Models\Brigada_users;
use App\Models\User;
use Illuminate\View\Component;

class ContenidoBrigadas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title, $idbrigada;

    public function __construct($title, $idbrigada)
    {
        $this->title = $title;
        $this->idbrigada = $idbrigada;
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

        $brigadas = Brigada_users::where('brigada_id', $this->idbrigada)->get();

        return view('components.pages.contenido-brigadas')
            ->with([
                'users' => $users,
                'title' => $this->title,
                'brigadas' => $brigadas
            ]);
    }
}
