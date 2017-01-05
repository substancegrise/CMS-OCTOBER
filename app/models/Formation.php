<?php namespace LFI\App\Models;

use Model;
use \October\Rain\Database\Traits\Validation;

/**
 * Formation Model
 */
class Formation extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'lfi_app_formations';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
    'images' => 'System\Models\File',
        'categories' => ['Acme\Plugin\Models\Category']
    ];


    public $rules = [
        'title'                  => 'required|alpha_num',
    ];

    public function getThumbsnailsAttribute(){
        return $this->images;
    }

    public function afterDelete(){
        foreach ($this->images as $image) {
            $image->delete();
        }
    }

    public function getStatusOptions()
    {
        return ['formante' => 'formante', 'certifiante' => 'certifiante', 'diplomante' => 'diplomante'];
    }

}
