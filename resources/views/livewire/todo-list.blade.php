<div class="px-4">
    <form class="border-t-4 border-blue-700">
        <div class="flex items-center justify-between py-4">
            <h1 class="my-4 text-2xl font-medium text-center">Create New Todo</h1>
            @include('livewire.components.todo-search')
        </div>


        <div class="flex flex-col gap-4 mx-auto md:flex-row">

            <input type="text" placeholder="Add New Todo" id="name" wire:model="name"
                class="p-2 border outline-none md:w-full">
            @error('name')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <textarea placeholder="Description" id="description" wire:model="description" class="p-2 border outline-none md:w-full"></textarea>
            @error('description')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <button type="submit" wire:click.prevent="create"
            class="px-4 py-2 mt-4 font-bold bg-blue-700 rounded text-blue-50 w-max hover:bg-blue-800">
            Create +
        </button>
        @if (session('sucess'))
            <span class="text-sm font-semibold text-green-600">{{ session('sucess') }}</span>
        @endif
    </form>

    <section class="grid grid-cols-1 gap-4 mt-8 lg:grid-cols-2">
        @forelse ($todos as $todo)
            @include('livewire.components.todo-item')
        @empty
            <span class="flex flex-col items-center gap-2 font-medium text-center text-blue-300">
                <x-lucide-book-open class="w-12 h-12 text-center text-blue-300" />
                None all registered...
            </span>
        @endforelse
    </section>

    <div class="my-8">
        {{ $todos->links('vendor.livewire.tailwind') }}
    </div>
</div>
