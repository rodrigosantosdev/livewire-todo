<div>
    <form>
        <div class="flex items-center gap-2">
            <x-lucide-search class="w-5 h-5 text-zinc-500" />
            <input type="search" wire:model.live.debounce.300ms="search" name="search" id="search" placeholder="search"
                class="bg-zinc-100 placeholder:text-zinc-500 capitalize p-2 rounded outline-none" />
        </div>
    </form>
</div>
