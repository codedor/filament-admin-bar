<?php

namespace Codedor\FilamentAdminBar\Http\Livewire;

use Codedor\TranslatableStrings\Models\TranslatableString;
use Illuminate\Support\Collection;
use Livewire\Component;

class TranslatableStringsTab extends Component
{
    public Collection $session;

    public null | string $message = null;

    public array $fields = [];

    public function mount()
    {
        $this->session = Collection::wrap(session()->pull('translatable-strings', []));

        // Don't send HTML to the frontend, link-picker will break other Livewire components on the page
        $this->fields = $this->strings()
            ->mapWithKeys(fn ($string) => [$string->key => ($string->is_html ? '_HTML_' : $string->value)])
            ->toArray();
    }

    public function render()
    {
        return view('filament-admin-bar::livewire.translatable-strings-tab', [
            'strings' => $this->strings(),
        ]);
    }

    public function submit()
    {
        $data = collect($this->fields)
            ->reject(fn ($value) => $value === '_HTML_')
            ->dot();

        TranslatableString::query()
            ->whereIn('key', $data->keys())
            ->get()
            ->each(fn ($string) => $string->update([
                'value' => $data->get($string->key),
            ]));

        $this->message = __('filament-admin-bar::translatable-strings-tab.save success');
    }

    private function strings()
    {
        return TranslatableString::query()
            ->whereIn('key', $this->session->dot()->keys())
            ->get();
    }
}
