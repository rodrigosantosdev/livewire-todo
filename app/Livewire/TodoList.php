<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:5|max:60')]
    public $name;

    #[Rule('required|min:10|max:150')]
    public $description;

    public $search;

    public function create()
    {
        $this->validate();

        Todo::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->reset();

        // session flash -> uma função que armazena uma mensagem na sessão temporaria.
        session()->flash('sucess', 'Todo Created');
    }
    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->get()
        ]);
    }
}
