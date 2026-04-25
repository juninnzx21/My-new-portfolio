<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Portfolio Admin') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Choose which portfolio cards stay visible and expand each item only when you need to edit it.') }}
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

            @if ($errors->any())
                <div class="rounded-xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-900 shadow-sm">
                    <p class="font-semibold">{{ __('Please fix the highlighted fields and try again.') }}</p>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <details class="group overflow-hidden rounded-2xl border border-indigo-200 bg-white shadow-sm open:shadow-md dark:border-indigo-700 dark:bg-gray-800" {{ $errors->any() ? 'open' : '' }}>
                <summary class="list-none cursor-pointer p-4 sm:p-5">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-indigo-600">{{ __('Create') }}</p>
                            <h3 class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Add new portfolio item') }}</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Insert a new portfolio with title, slug, target URL, details URL, image, order, and visibility.') }}
                            </p>
                        </div>
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-indigo-200 text-indigo-500 transition group-open:rotate-45 dark:border-indigo-700 dark:text-indigo-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </div>
                </summary>

                <div class="border-t border-indigo-100 bg-indigo-50/40 p-4 dark:border-indigo-800 dark:bg-indigo-950/10 sm:p-5">
                    <form method="POST" action="{{ route('portfolio-admin.store') }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Slug') }}</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" placeholder="new-portfolio-item" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Label') }}</label>
                                <input type="text" name="eyebrow" value="{{ old('eyebrow') }}" placeholder="Web App" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Title') }}</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="New Portfolio Title" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Custom image path or URL') }}</label>
                                <input type="text" name="image_path" value="{{ old('image_path') }}" placeholder="assets/img/portfolio/example.png or https://..." class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Live URL') }}</label>
                                <input type="url" name="live_url" value="{{ old('live_url') }}" placeholder="https://..." class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Details URL') }}</label>
                                <input type="text" name="details_url" value="{{ old('details_url') }}" placeholder="projeto-9.html or https://..." class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Display order') }}</label>
                                <input type="number" name="display_order" min="0" value="{{ old('display_order', 140) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="flex items-end">
                                <label class="inline-flex items-center gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200">
                                    <input type="checkbox" name="is_visible" value="1" @checked(old('is_visible', true)) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span>{{ __('Show on main portfolio') }}</span>
                                </label>
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Upload image') }}</label>
                                <input type="file" name="image_file" accept="image/*" class="block w-full rounded-lg border border-dashed border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-3 border-t border-indigo-100 pt-4 dark:border-indigo-800">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ __('If you upload an image, it will override the text path above.') }}
                            </p>
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                {{ __('Create item') }}
                            </button>
                        </div>
                    </form>
                </div>
            </details>

            <div class="grid gap-5 lg:grid-cols-2">
                @foreach ($portfolioItems as $item)
                    @php
                        $isPersistedModel = is_object($item) && method_exists($item, 'getKey');
                        $itemEyebrow = data_get($item, 'eyebrow');
                        $itemTitle = data_get($item, 'title');
                        $itemSlug = data_get($item, 'slug');
                        $itemOrder = data_get($item, 'display_order');
                        $itemVisible = data_get($item, 'is_visible');
                        $itemLiveUrl = data_get($item, 'live_url');
                        $itemDetailsUrl = data_get($item, 'details_url');
                        $itemImage = $isPersistedModel ? $item->imageUrl() : asset(ltrim(data_get($item, 'image_path'), '/'));
                    @endphp

                    <details class="group overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition open:shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <summary class="list-none cursor-pointer p-4 sm:p-5">
                            <div class="flex items-start gap-4">
                                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-xl border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
                                    <img src="{{ $itemImage }}" alt="{{ $itemTitle }}" class="h-full w-full object-cover">
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-indigo-700">
                                            {{ $itemEyebrow }}
                                        </span>
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $itemVisible ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                                            {{ $itemVisible ? __('Visible') : __('Hidden') }}
                                        </span>
                                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                            {{ __('Order') }}: {{ $itemOrder }}
                                        </span>
                                    </div>

                                    <h3 class="mt-3 truncate text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $itemTitle }}
                                    </h3>

                                    <div class="mt-2 grid gap-2 text-sm text-gray-500 dark:text-gray-400">
                                        <p class="truncate"><strong>{{ __('Slug:') }}</strong> {{ $itemSlug }}</p>
                                        <p class="truncate"><strong>{{ __('Live:') }}</strong> {{ $itemLiveUrl }}</p>
                                        <p class="truncate"><strong>{{ __('Details:') }}</strong> {{ $itemDetailsUrl }}</p>
                                    </div>
                                </div>

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition group-open:rotate-45 dark:border-gray-700 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                            </div>
                        </summary>

                        <div class="border-t border-gray-200 bg-gray-50/70 p-4 dark:border-gray-700 dark:bg-gray-900/30 sm:p-5">
                            <form method="POST" action="{{ $isPersistedModel ? route('portfolio-admin.update', $item) : '#' }}" enctype="multipart/form-data" class="space-y-5">
                                @csrf
                                @if ($isPersistedModel)
                                    @method('PUT')
                                @endif

                                @if ($isPersistedModel)
                                    <div class="flex items-center justify-between gap-3 rounded-xl border border-indigo-100 bg-white px-4 py-3 shadow-sm dark:border-indigo-800 dark:bg-gray-800">
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                            {{ __('Editing this portfolio item.') }}
                                        </p>
                                        <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                            {{ __('Save changes') }}
                                        </button>
                                    </div>
                                @endif

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
                                        <input type="url" name="live_url" value="{{ old('live_url', $itemLiveUrl) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Details URL') }}</label>
                                        <input type="text" name="details_url" value="{{ old('details_url', $itemDetailsUrl) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Display order') }}</label>
                                        <input type="number" name="display_order" min="0" value="{{ old('display_order', $itemOrder) }}" class="block w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                    </div>
                                    <div class="flex items-end">
                                        <label class="inline-flex items-center gap-3 rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200">
                                            <input id="visible-{{ data_get($item, 'id', $itemSlug) }}" type="checkbox" name="is_visible" value="1" @checked($itemVisible) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" @disabled(! $isPersistedModel)>
                                            <span>{{ __('Show on main portfolio') }}</span>
                                        </label>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="image_file_{{ data_get($item, 'id', $itemSlug) }}" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Upload new image') }}</label>
                                        <input id="image_file_{{ data_get($item, 'id', $itemSlug) }}" type="file" name="image_file" accept="image/*" class="block w-full rounded-lg border border-dashed border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300" @disabled(! $isPersistedModel)>
                                    </div>
                                </div>

                                @if ($isPersistedModel)
                                    <div class="flex items-center justify-between gap-3 border-t border-gray-200 pt-4 dark:border-gray-700">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ __('Edit, save, and the main portfolio will use these values.') }}
                                        </p>
                                        <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                            {{ __('Save changes') }}
                                        </button>
                                    </div>
                                @else
                                    <div class="rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                                        {{ __('The portfolio table is not migrated yet. Deploy and run the migration before editing these items.') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
