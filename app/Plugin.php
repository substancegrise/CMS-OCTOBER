<?php namespace LFI\App;

use Backend;
use System\Classes\PluginBase;
use LFI\App\Controllers\ContactForm AS ContactFormController;

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
            'LFI\App\Components\Todo' => 'todoList',
            'LFI\App\Components\ContactForm' => 'contactForm',
            'LFI\App\Components\PartnersComp' => 'partnersComp',

        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'lfi.app.some_permission' => [
                'tab' => 'App',
                'label' => 'Some permission'
            ],
        ];
    }
    
    
    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'LFI Contact Form',
                'icon'        => 'icon-envelope',
                'description' => 'Manage Settings.',
                'class'       => 'LFI\App\Models\ContactFormSettings',
                'permissions' => ['lfi.contactform.manage_settings'],
                'order'       => 60
            ]
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
                    ],
                    'Contacts' => [
                        'label'       => 'lfi.app::lang.contactform.submenu',
                        'icon'        => 'icon-inbox',
                        'url'         => Backend::url('lfi/app/contactform'),
                        'permissions' => ['lfi.app.inbox'],
                        'counter'     => ContactFormController::countUnreadMessages(),
                        'counterLabel' => 'Un-Read Messages',
                        'description' => 'Demande de contacts'
                    ],
                    'Partners' => [
                        'label'       => 'Partners',
                        'icon'        => 'icon-object-ungroup',
                        'url'         => Backend::url('lfi/app/partners'),
                        'permissions' => ['lfi.app.*'],
                        'description' => 'Administration des logos partners'
                    ],
                ]
            ]
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'lfi.app::mail.reply' => 'Formulaire de contact -- Réponse',
            'lfi.app::mail.auto-response' => 'Formulaire de contact -- Réponse automatique',
            'lfi.app::mail.notification' => 'Formulaire de contact -- Email de notification',
        ];
    }
}
