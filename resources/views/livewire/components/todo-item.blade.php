<section>
    <div class="grid grid-cols-1 gap-4 border-b-[2px]  border-blue-500 py-4">
        <h2 class="text-blue-600 font-bold text-lg">{{ $todo->name }}</h2>
        <p class="text-gray-700">{{ $todo->description }}</p>
        <div class="flex justify-between items-center">
            <span class="text-gray-500">{{ $todo->created_at }}</span>
            <div class="flex gap-2">
                <x-lucide-pencil class="text-blue-500 w-6 h-6 cursor-pointer" />
                <x-lucide-trash class="text-red-500 w-6 h-6 cursor-pointer" />
            </div>
        </div>
    </div>
</section>
