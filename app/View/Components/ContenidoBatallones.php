<?php

namespace App\View\Components;

use App\Models\Batallones_users;
use App\Models\User;
use Illuminate\View\Component;

class ContenidoBatallones extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $idbatallon;

    public function __construct($title, $idbatallon)
    {
        $this->title = $title;
        $this->idbatallon = $idbatallon;
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

        $brigadas = Batallones_users::where('batallon_id', $this->idbatallon)->get();

        return view('components.pages.contenido-batallones')
            ->with([
                'users' => $users,
                'title' => $this->title,
                'brigadas' => $brigadas
            ]);
    }
}
