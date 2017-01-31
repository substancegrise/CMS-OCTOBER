<?php namespace Lfi\Formations\Models;

use Model;

/**
 * Model
 */
class Day extends Model
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
    public $table = 'lfi_formations_day';


    public $belongsToMany = [

        'formations' => [

            'Lfi\Formations\Models\Formation',

            'table' => 'lfi_formations_form_day',

            'order' => 'name'

        ]
    ];

    public function getFullNameAttribute(){
        return $this->day_number . " " . $this->day_speaker. " - " . $this->day_title1 . " " . $this->day_title2;
    }

}