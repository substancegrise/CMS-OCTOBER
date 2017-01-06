<?php namespace LFI\App\Models;

use Model;
use \October\Rain\Database\Traits\Validation;

use Cms\Classes\Theme;
use Cms\Classes\Page;
class ContactFormSettings extends Model
{
        
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'lfi_app_contact_form_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function getRedirectToUrlOptions($keyValue = null){

        $currentTheme = Theme::getEditTheme();
        $allPages = Page::listInTheme($currentTheme, true);

        $pages = [];
        $pages[""] = "--Select--";

        foreach ($allPages as $pg) {
            $pages[$pg->url] = $pg->title;
        }

        return $pages;
    }
}