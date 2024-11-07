<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        } // <-- Ajout de l'accolade fermante manquante ici
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
         // Partager le nom de l'application avec toutes les vues
    view()->share('appName', config('app.name'));

    // Définir une longueur par défaut pour les colonnes VARCHAR dans MySQL
    Schema::defaultStringLength(191);
    
    // (Facultatif) Enregistrer un composant Blade
    Blade::component('components.alert', 'alert');
    }
    

}