<div>
    <div class="px-4 space-y-4 my-8">
        <form method="get">
            <input class="border-solid border border-gray-300 p-2 w-full" type="text"
                placeholder="{{ __('Search foods') }}" wire:model="term" autofocus>
        </form>

        <div wire:loading>Searching foods...</div>
        <div wire:loading.remove>
            @foreach ($foods as $food)
                <div wire:click="foodSelect({{ $food->id }})">
                    <p class="text-sm text-gray-900 text-bold">{{ $food->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
