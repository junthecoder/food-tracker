<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($menus as $menu)
                        <li class="py-3">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $menu->name }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{--

                <div class="flex justify-center">
                    @foreach ($menus as $menu)
                        <div class="block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
                            <h5 class="mb-4 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                {{ $menu->name }}</h2>
                            </h5>

                            <ul>
                                @foreach ($menu->foods as $food)
                                    <li>
                                        <p class="mb-2 text-base text-neutral-600 dark:text-neutral-200">
                                            {{ $food->name }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
