<?php

namespace Codedor\FilamentAdminBar\Tabs;

use Illuminate\View\View;

class SeoTab extends Tab
{
    public string $name = 'SEO';

    public function render(): View
    {
        return view('filament-admin-bar::tabs.seo', [

        ]);
    }
}
