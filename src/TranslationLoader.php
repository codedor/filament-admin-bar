<?php

namespace Codedor\FilamentAdminBar;

use Illuminate\Translation\TranslationServiceProvider;

class TranslationLoader extends TranslationServiceProvider
{
    public function register()
    {
        $this->registerLoader();

        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            $trans = new Translator($loader, $locale); // < different translator
            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });
    }
}
