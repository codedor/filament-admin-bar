<div>
    <div wire:loading>
        > Loading icon <
    </div>

    <div wire:loading.remove>
        @if ($message)
            {{ $message }}
        @endif

        <table>
            @foreach ($strings as $string)
                <tr>
                    <td>
                        {{ $string->key }}
                    </td>

                    <td>
                        @if ($string->is_html)
                            <a
                                href="/admin/translatable-strings/{{ $string->id }}/edit?locale=-{{ app()->getLocale() }}-tab"
                                target="_blank"
                            >
                                {{ __('filament-admin-bar::translatable-strings-tab.edit in the cms') }}
                            </a>
                        @else
                            <input type="text" wire:model.defer="fields.{{ $string->key }}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <button wire:click="submit">
            {{ __('filament-admin-bar::translatable-strings-tab.submit') }}
        </button>
    </div>
</div>
