<?php namespace Lfi\Formations;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Lfi\Formations\FormWidgets\Programbox' => [
                'label' => 'Programbox field',
                'code'  => 'programbox'
            ]
        ];
    }

    public function registerSettings()
    {
    }
}
