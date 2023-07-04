<?php

namespace Codedor\FilamentAdminBar\Tabs;

use Codedor\Seo\Facades\SeoBuilder;
use Illuminate\View\View;

class SeoTab extends Tab
{
    public string $name = 'SEO';

    public array $data = [];

    public function data(): array
    {
        return SeoBuilder::contents()->toArray();
    }

    public function render(): View
    {
        return view('filament-admin-bar::tabs.seo', [
            'data' => $this->data(),
        ]);
    }
}
