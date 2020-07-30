<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Page;
use App\Setting;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // MENU
        $frontMenu = [
            '/' => 'Home'
        ];
        $pages = Page::all();
        foreach ($pages AS $page) {
            $frontMenu[$page['slug']] = $page['title'];
        }
        View::share('front_menu', $frontMenu);

        // CONFIGURAÇÔES DO SITE
        $config = [];
        $settings = Setting::all();

        foreach ($settings AS $setting) {
            $config[$setting['name']] = $setting['content'];
        }
        View::share('front_config', $config);

        // HORA LOCAL CORRETA
        setlocale(LC_TIME, 'pt-br'); // alterado em 27/07/2020 tentativa de corrigir data para formato DD/MM/AAAA
    }

}
