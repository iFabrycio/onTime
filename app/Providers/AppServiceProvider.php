<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;
use App\Event;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('Eventos');
            $event->menu->add([
                        'text' => 'Eventos',
                        'url'  => 'list',
                        'can'  => 'list-events',
                    ]);

            $event->menu->add([
                        'text'        => 'Eventos Próximos',
                        'url'         => 'event/list',
                        'icon'        => 'calendar',
                        'label'       => Event::where('start', '<', Carbon::now()->addMonth())->count(),
                        'label_color' => 'success',
                    ]);
            
            $event->menu->add('ACCOUNT SETTINGS');
            $event->menu->add([
                        'text' => 'Profile',
                        'url'  => 'admin/settings',
                        'icon' => 'user',
                    ]);
            $event->menu->add([
                        'text' => 'Change Password',
                        'url'  => 'admin/settings',
                        'icon' => 'lock',
                    ]);
        });
    }
}
