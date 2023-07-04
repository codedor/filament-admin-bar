<?php

return [
    'tabs' => [
        Codedor\FilamentAdminBar\Tabs\SeoTab::class,
        Codedor\FilamentAdminBar\Tabs\TranslatableStringsTab::class,
    ],
    'translatable-strings-tab' => [
        'excluded' => [
            'filament-admin-bar::*',
            'routes.*',
        ],
    ],
];
