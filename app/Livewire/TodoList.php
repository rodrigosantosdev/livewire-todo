<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|min:5|max:100')]
    public $description;

    public $search;

    public $editingTodoID;

    public $editingTodoName;

    public function create()
    {
        $this->validate();

        Todo::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->reset();

        // session flash -> uma função que armazena uma mensagem na sessão temporaria.
        session()->flash('sucess', 'Todo Created...');

        $this->resetPage();
    }

    public function delete($todoID)
    {
        Todo::find($todoID)->delete();
    }

    public function isCompleted($todoID)
    {
        $todo = Todo::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($todoID)
    {
        $this->editingTodoID = $todoID;
        $this->editingTodoName = Todo::find($todoID)->name;
    }

    public function cancelEdit()
    {
        $this->reset('editingTodoID', 'editingTodoName');
    }

    public function update()
    {
        Todo::find($this->editingTodoID)->update([
            'name' => $this->editingTodoName
        ]);
        $this->cancelEdit();
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(4)
        ]);
    }
}
