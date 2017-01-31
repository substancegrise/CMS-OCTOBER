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
            ],
            'Lfi\Formations\FormWidgets\Profesbox' => [
                'label' => 'Profesbox field',
                'code'  => 'profesbox'
            ],
            'Lfi\Formations\FormWidgets\Daybox' => [
                'label' => 'Daybox field',
                'code'  => 'daybox'
            ]
        ];
    }

    public function registerSettings()
    {
    }
}
