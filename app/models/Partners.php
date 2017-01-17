<?php namespace Lfi\App\Models;

use Model;

/**
 * Partners Model
 */
class Partners extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'lfi_app_partners';

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

}

/*
$partners = PartnerModel::get();
foreach ($partners in $partner){
    print PartnerComponent::renderVignette($partner);
}

@if($partner->id == $articles->article_categorie_id)
        <a href="{{url('categorie', $categorie->id)}}">{{$categorie->titre}}</a>
        @endif

 {% foreach($partners as $partner) %}
        {{ var_dump($partners) }}
        {% endforeach %}


*/