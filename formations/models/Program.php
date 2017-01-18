<?php namespace Lfi\Formations\Models;

use Model;

/**
 * Model
 */
class Program extends Model
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
    public $table = 'lfi_formations_programmes';

    /*protected $jsonable = ['program_name'];*/

    public $belongsToMany = [

        'formations' => [

            'Lfi\Formations\Models\Formation',

            'table' => 'lfi_formations_form_program',

            'order' => 'name'

        ]
    ];

    public function getFullNameAttribute(){
        return $this->program_title . " " . $this->program_name;
    }


}