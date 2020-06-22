<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable=['id_cat','name','slug'];

    protected $table='categories';

    protected $primaryKey='id_cat';

    protected $dates=['deleted_at'];
}
