<?php namespace Lfi\App\Models;

use Model;

/**
 * Trema Model
 */
class Trema extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'lfi_app_tremas';

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
    public $attachMany = [];
}
