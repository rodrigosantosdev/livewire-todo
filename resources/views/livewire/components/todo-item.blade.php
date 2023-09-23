<div wire:key='{{ $todo->id }}' class="p-4 rounded bg-blue-50">
    <div class="flex items-center gap-2">
        @if ($todo->completed)
            <input type="checkbox" wire:click='isCompleted({{ $todo->id }})' name="checkbox" id="checkbox" checked>
        @else
            <input type="checkbox" wire:click='isCompleted({{ $todo->id }})' name="checkbox" id="checkbox">
        @endif


        <h2 class="relative text-lg font-bold text-blue-600">{{ $todo->name }}</h2>

        @if ($editingTodoID == $todo->id)
            <div class="absolute flex justify-between w-max">
                <input type="text" placeholder="Todo.." class="px-2 mr-4" wire:model='editingTodoName'>
                @if ($editingTodoID === $todo->id)
                    <div class="flex gap-2">
                        <button wire:click='update' class="px-3 py-1 text-white bg-green-600 rounded">Update</button>
                        <button wire:click='cancelEdit' class="px-3 py-1 text-white bg-red-600 rounded">Cancel</button>
                    </div>
            </div>
        @endif
    @else
        @error('editingTodoName')
            <span>{{ $message }}</span>
        @enderror
        @endif



    </div>
    <p class="py-4 break-words text-zinc-800">{{ $todo->description }}</p>
    <div class="flex items-center justify-between">

        <span class="text-gray-500">{{ $todo->created_at }}</span>
        <div class="flex gap-2">
            <button wire:click='edit({{ $todo->id }})'>
                <x-lucide-pencil class="w-5 h-5 text-blue-700 cursor-pointer hover:text-blue-500" />
            </button>
            <button wire:click='delete({{ $todo->id }})'>
                <x-lucide-trash class="w-5 h-5 text-red-500 cursor-pointer hover:text-red-800" />
            </button>
        </div>
    </div>
</div>
