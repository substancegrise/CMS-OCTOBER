<?php namespace LFI\App\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Actus Back-end Controller
 */
class Actus extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('LFI.App', 'app', 'actus');
    }
}
