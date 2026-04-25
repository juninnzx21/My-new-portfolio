<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Portfolio Admin') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Manage which portfolio cards appear on the main portfolio and which image each card uses.') }}
                </p>
            </div>
            <a href="{{ url('/') }}" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700">
                {{ __('Open Main Portfolio') }}
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-900 shadow-sm">
                <strong>{{ __('Admin access restricted to:') }}</strong> {{ $adminEmail }}
            </div>

            @if (session('message'))
                <div class="rounded-xl border border-blue-200 bg-blue-50 px-5 py-4 text-sm text-blue-900 shadow-sm">
                    {{ session('message.text') }}
                </div>
            @endif

            <div class="grid gap-6">
                @foreach ($portfolioItems as $item)
                    @php
                        $isPersistedModel = is_object($item) && method_exists($item, 'getKey');
                        $itemEyebrow = data_get($item, 'eyebrow');
                        $itemTitle = data_get($item, 'title');
                        $itemImage = $isPersistedModel ? $item->imageUrl() : asset(ltrim(data_get($item, 'image_path'), '/'));
                    @endphp

                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <form method="POST" action="{{ $isPersistedModel ? route('portfolio-admin.update', $item) : '#' }}" enctype="multipart/form-data" class="grid gap-0 lg:grid-cols-[260px_1fr]">
                            @csrf
                            @if ($isPersistedModel)
                                @method('PUT')
                            @endif

                            <div class="border-b border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-900/40 lg:border-b-0 lg:border-r">
                                <div class="aspect-[4/3] overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
                                    <img src="{{ $itemImage }}" alt="{{ $itemTitle }}" class="h-full w-full object-cover">
                                </div>
                                <div class="mt-4 flex items-center gap-3">
                                    <input id="visible-{{ data_get($item, 'id', data_get($item, 'slug')) }}" type="checkbox" name="is_visible" value="1" @checked(data_get($item, 'is_visible')) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    <label for="visible-{{ data_get($item, 'id', data_get($item, 'slug')) }}" class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                        {{ __('Show on main portfolio') }}
                                    </label>
                                </div>
                                <div class="mt-4">
                                    <label for="image_file_{{ data_get($item, 'id', data_get($item, 'slug')) }}" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Upload new image') }}</label>
                                    <input id="image_file_{{ data_get($item, 'id', data_get($item, 'slug')) }}" type="file" name="image_file" accept="image/*" class="block w-full text-sm text-gray-700 dark:text-gray-300" @disabled(! $isPersistedModel)>
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Label') }}</label>
                                        <input type="text" name="eyebrow" value="{{ old('eyebrow', $itemEyebrow) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Title') }}</label>
                                        <input type="text" name="title" value="{{ old('title', $itemTitle) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Custom image path or URL') }}</label>
                                        <input type="text" name="image_path" value="{{ old('image_path', data_get($item, 'image_path')) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Live URL') }}</label>
                                        <input type="url" name="live_url" value="{{ old('live_url', data_get($item, 'live_url')) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Details URL') }}</label>
                                        <input type="text" name="details_url" value="{{ old('details_url', data_get($item, 'details_url')) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Display order') }}</label>
                                        <input type="number" name="display_order" min="0" value="{{ old('display_order', data_get($item, 'display_order')) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Slug') }}</label>
                                        <input type="text" value="{{ data_get($item, 'slug') }}" disabled class="block w-full rounded-lg border-gray-200 bg-gray-100 text-sm text-gray-500 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    </div>
                                </div>

                                @if ($isPersistedModel)
                                    <div class="mt-5 flex justify-end">
                                        <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                            {{ __('Save item') }}
                                        </button>
                                    </div>
                                @else
                                    <div class="mt-5 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                                        {{ __('The portfolio table is not migrated yet. Deploy and run the migration before editing these items.') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
