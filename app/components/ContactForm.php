<?php namespace Lfi\App\Components;

use Cms\Classes\ComponentBase;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'contactForm Component',
            'description' => 'Contact forms for the website'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
}
