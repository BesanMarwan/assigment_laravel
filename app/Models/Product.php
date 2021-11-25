<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    public $fillable     = ['name','description','price','quantity','category_id','image_path','slug','status'];
    public $translatable = ['name','description'];

    ######################## Begin Relation ###################
    public function category(){
        return $this->belongsTo(Category::class);
    }
    ######################## End Relation ###################

}
