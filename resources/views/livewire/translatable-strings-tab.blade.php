<div>
    <div class="filament-tables-search-input mb-5">
        <label class="group relative flex items-center">
            <span
                class="
                    absolute inset-y-0 left-0
                    flex items-center justify-center h-9 w-9
                    text-gray-400
                    group-focus-within:text-primary-500
                "
            >
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>
            <input
                type="text"
                wire:model.live.debounce.1000ms="query"
                class="
                    block h-9 w-full max-w-xs pl-9
                    placeholder-gray-400
                    rounded-lg border-gray-300 shadow-sm
                    outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500
                    transition duration-75
                "
            >
        </label>
    </div>

    <div wire:loading>
        <div class="flex gap-3 w-full py-4">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 animate-spin"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            loading...
        </div>
    </div>

    <div wire:loading.remove>
        @if ($message)
            <div class="flex gap-3 w-full py-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="filament-notifications-icon h-6 w-6 text-success-400"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
            </div>
        @endif

        <div class="rounded-xl border border-gray-300 bg-white shadow-sm">
        <table class="w-full">
            <tr class="bg-gray-500/5">
                <th class="p-3 text-left text-sm font-medium text-gray-600">Name</th>
                <th class="p-3 text-left text-sm font-medium text-gray-600">Translation</th>
            </tr>
            @foreach ($strings as $string)
                <tr class="border-t border-gray-300">
                    <td class="py-3 px-3">
                        {{ $string->key }}
                    </td>

                    <td class="py-3 px-3">
                        @if ($string->is_html)
                            <a
                                class="
                                    filament-link filament-tables-link-action
                                    inline-flex items-center justify-center gap-0.5
                                    font-medium text-sm text-primary-600
                                    outline-none focus:underline
                                    hover:underline hover:text-primary-500
                                "
                                href="/admin/translatable-strings/{{ $string->id }}/edit?locale=-{{ app()->getLocale() }}-tab"
                                target="_blank"
                            >
                                <x-heroicon-o-pencil class="filament-link-icon w-4 h-4 mr-1 rtl:ml-1"/>
                                {{ __('filament-admin-bar::translatable-strings-tab.edit in the cms') }}
                            </a>
                        @else
                            <input
                                class="
                                    filament-forms-input
                                    block w-full
                                    rounded-lg shadow-sm border-gray-300
                                    outline-none
                                    transition duration-75
                                    focus:ring-1 focus:ring-inset focus:border-primary-500 focus:ring-primary-500
                                    disabled:opacity-70
                                "
                                type="text"
                                wire:model.defer="fields.{{ $string->key }}"
                            >
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        </div>

        <button
            class="
                filament-button filament-button-size-md filament-page-button-action
                inline-flex items-center justify-center gap-1
                py-1 px-4 min-h-[2.25rem] mt-5
                font-medium text-sm text-white
                rounded-lg border shadow border-transparent bg-primary-600
                transition-colors
                outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset focus:ring-white
                focus:bg-primary-700 focus:ring-offset-primary-700
                hover:bg-primary-500
            "
            wire:click="submit"
        >
            {{ __('filament-admin-bar::translatable-strings-tab.submit') }}
        </button>
    </div>
</div>
