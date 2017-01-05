<?php namespace Lfi\App\Models;

use Model;

/**
 * ContactForm Model
 */
class ContactForm extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'lfi_app_contact_forms';

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
