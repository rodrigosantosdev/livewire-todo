<div>
    <form class="border-t-4 border-blue-500">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-center my-4 font-medium text-2xl">Create New Todo</h1>
            @include('livewire.components.todo-search')
        </div>


        <div class="flex flex-col gap-4 mx-auto">

            <input type="text" placeholder="Todo" id="name" wire:model="name" class="border p-2 outline-none">
            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <textarea placeholder="Description" id="description" wire:model="description" class="border p-2 outline-none"></textarea>
            @error('description')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

        </div>
        <button type="submit" wire:click.prevent="create"
            class="bg-blue-700 text-blue-50 font-bold py-2 px-4 w-max rounded hover:bg-blue-800 mt-4">
            Create +
        </button>
        @if (session('sucess'))
            <span class="text-sm text-green-600 font-semibold">{{ session('sucess') }}</span>
        @endif
    </form>

    <section class="mt-4">
        @foreach ($todos as $todo)
            @include('livewire.components.todo-item')
        @endforeach
    </section>
</div>
