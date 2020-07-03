<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    protected $table = 'categories_translation';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'category_id',
        'lang_code',
        'category_name',
    ];

    public $timestamps = false;

}
