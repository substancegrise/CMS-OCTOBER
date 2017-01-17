<?php namespace Lfi\App\Components;

use Cms\Classes\ComponentBase;
use LFI\App\Models\Partners;

class PartnersComp extends ComponentBase
{
    /**
     * @var string The database table used by the model.
     */
    public $partners;


    public function componentDetails()
    {
        return [
            'name'        => 'partnersComp Component',
            'description' => 'Administration des visuels partenaires'
        ];
    }

    public function defineProperties()
    {
        return [
            'name' => [
                'description'       => 'nome of picture',
                'title'             => 'Max items',
                'default'           => 20,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'required'          => true,
                'validationMessage' => 'The Max Items value is required and should be integer.'
            ],
            'image' => [
                'description'       => 'image of partners',
                'title'             => 'name',
                'default'           => 'image',
                'type'              => 'uri',
                'required'          => true,
                'validationMessage' => 'image is required.'
            ],
        ];
    }


    public function onRun(){

        $this->partners = $this->page['partners'] = $this->loadPartners();

    }
    protected function loadPartners()
    {

        //$partners = Partners::lists('name'); // retourn un tableau des noms

        // AVEC RELATION IMAGE QU'ON ARRIVE PAS A REMONTER POUR L'INSTANT
        //$partners = Partners::with('images')->select('name')->where('is_published', true )->get();

        $partners = Partners::select('name')->where('is_published', true )->get();

        return $partners;
    }


    public function init(){

    }

}
