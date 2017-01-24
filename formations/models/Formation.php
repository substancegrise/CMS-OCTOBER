<?php namespace Lfi\Formations\Models;

use Model;

/**
 * Model
 */
class Formation extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'lfi_formations_';

    /*
     * *

    protected $jsonable = ['program_name']; */
    
    /*
     *Relation
     s*/
    public $belongsToMany = [
        
        'categories' => [
            
            'Lfi\Formations\Models\Category',
        
            'table' => 'lfi_formations_form_categ',
        
            'order' => 'formation_category'
        
        ],

         'programsgeneral' => [

            'Lfi\Formations\Models\Program',

            'table' => 'lfi_formations_form_program',

            'order' => 'program_title'

        ],

         'interviews' => [

            'Lfi\Formations\Models\Interview',

            'table' => 'lfi_formations_form_interview',

            'order' => 'title'

        ]

    ];
    
    public $attachOne = [

        'meformer' => 'System\Models\File',
        'imghome'  =>  'System\Models\File',
        'imgright'  =>  'System\Models\File',
        'imgcenter'  =>  'System\Models\File',
        'imgback'  =>  'System\Models\File',
        'fiche_formation'  =>  'System\Models\File',

    ];
    
    public $attachMany = [
        
        
    ];
    
}