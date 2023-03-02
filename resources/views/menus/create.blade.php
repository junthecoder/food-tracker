<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('menus.store') }}" method="post">
                        @csrf

                        <div class="container mx-auto">
                            <div class="p-5 mx-auto bg-white rounded-md shadow-sm">
                                <div class="mb-5">
                                    <div class="mb-2">
                                        <label for="name" class="mb-5">{{ __('Name') }}</label>
                                    </div>
                                    <input id="name" type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-2">
                                    <label for="foods">{{ __('Foods') }}</label>
                                </div>
                                <div id="foods" class="mb-4">
                                </div>
                                <div class="mb-4">
                                    <button type="button" id="add-food-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Add Food') }}
                                    </button>
                                </div>
                                <div class="overflow-hidden">
                                    <input type="submit" class="w-32 float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="{{ __('Add Menu') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        let counter = 0;
        function addFood() {
            $('#foods').append($(`
                <div class="food mb-3 flex gap-x-2">
                    <select name="foods[${counter}]" id="food" class="flex-1">
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="remove-food-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Remove') }}
                    </button>
                </div>`));
            ++counter;
        }

        addFood();

        $('#add-food-button').click(() => {
            addFood();
        });

        $('#foods').on('click', '.remove-food-button', function () {
            $(this).closest('.food').remove();
        });
    </script>
</x-app-layout>
