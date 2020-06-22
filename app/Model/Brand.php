<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_brand','name','description','country','slug'];

    protected $table='brands';

    protected $primaryKey = 'id_brand';

    protected $dates=['deleted_at'];

}
