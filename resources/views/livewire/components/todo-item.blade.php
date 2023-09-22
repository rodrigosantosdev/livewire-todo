<div wire:key='{{ $todo->id }}' class="bg-blue-50 p-4 rounded">
    <div class="flex items-center gap-2">
        @if ($todo->completed)
            <input type="checkbox" wire:click='isCompleted({{ $todo->id }})' name="checkbox" id="checkbox" checked>
        @else
            <input type="checkbox" wire:click='isCompleted({{ $todo->id }})' name="checkbox" id="checkbox">
        @endif
        <h2 class="text-blue-600 font-bold text-lg">{{ $todo->name }}</h2>

        @if ($editingTodoID == $todo->id)
            <input type="text" placeholder="Todo.." class="" wire:model='editingTodoName'>
        @else
            @error('editingTodoName')
                <span>{{ $message }}</span>
            @enderror
        @endif

    </div>
    <p class="break-words text-zinc-800 py-4">{{ $todo->description }}</p>
    <div class="flex justify-between items-center">

        <span class="text-gray-500">{{ $todo->created_at }}</span>

        @if ($editingTodoID === $todo->id)
            <button wire:click='update'>Update</button>
            <button wire:click='cancelEdit'>Cancel</button>
        @endif

        <div class="flex gap-2">
            <button wire:click='edit({{ $todo->id }})'>
                <x-lucide-pencil class="text-blue-700 hover:text-blue-500 w-5 h-5 cursor-pointer" />
            </button>
            <button wire:click='delete({{ $todo->id }})'>
                <x-lucide-trash class="text-red-500 hover:text-red-800 w-5 h-5 cursor-pointer" />
            </button>
        </div>
    </div>
</div>
