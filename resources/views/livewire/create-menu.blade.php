<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-5">
                    <div class="mb-2">
                        <label for="name" class="mb-5">{{ __('Name') }}</label>
                    </div>
                    <input id="name" type="text" name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label for="foods">{{ __('Foods') }}</label>
                </div>

                <div class="mb-4">
                    @foreach ($foods as $food)
                        <div class="food mb-3 flex gap-x-2">
                            <div class="flex-1 flex items-center text-sm">
                                {{ $food->name }}
                            </div>

                            <input type="number" name="quantity" class="w-24 text-sm" value="100">

                            <select name="foods[${counter}][unit]" class="unit-select w-20 text-sm">
                                <option value="g">g</option>
                            </select>

                            <button type="button" wire:click="removeFood({{ $loop->index }})"
                                class="remove-food-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                                {{ __('Remove') }}
                            </button>
                        </div>
                    @endforeach

                </div>
                <div class="mb-4">
                    <button type="button" wire:click="$emit('openModal', 'search-food')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Add Food') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
