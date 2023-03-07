<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="my-4 divide-y divide-gray-200 dark:divide-gray-700">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm"
                            href="{{ route('menus.create') }}">
                            {{ __('Add Menu') }}
                        </a>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($menus as $menu)
                            <li class="py-3">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $menu->name }}
                                        </p>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                                            {{ __('Edit') }}
                                        </button>
                                    </div>
                                    <div>
                                        <button type="button" wire:click="removeMenu({{ $menu->id }})"
                                            class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                                            {{ __('Remove') }}
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
