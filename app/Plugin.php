<?php namespace LFI\App;

use Backend;
use System\Classes\PluginBase;

/**
 * App Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'App',
            'description' => 'No description provided yet...',
            'author'      => 'LFI',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Lfi\App\Components\Todo' => 'todoList',
            'Lfi\App\Components\TremaLab' => 'actusTrema',
            'Lfi\App\Components\ContactForm' => 'contactForm',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'lfi.app.some_permission' => [
                'tab' => 'App',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'app' => [
                'label'       => 'LFI',
                'url'         => Backend::url('lfi/app/formations'),
                'description' => 'Administration des formations',
                'icon'        => 'icon-leaf',
                'permissions' => ['lfi.app.*'],
                'order'       => 500,

                'sideMenu' => [
                    'Formations' => [
                        'label'       => 'Formations',
                        'icon'        => 'icon-book',
                        'url'         => Backend::url('lfi/app/formations'),
                        'description' => 'Administration des formations',
                        'permissions' => ['lfi.app.*']
                    ],
                    'Actus' => [
                        'label'       => 'Actus',
                        'icon'        => 'icon-newspaper-o',
                        'url'         => Backend::url('lfi/app/actus'),
                        'description' => 'Administration des actus',
                        'permissions' => ['lfi.app.*']
                    ]
                ]
            ]
        ];
    }
}
