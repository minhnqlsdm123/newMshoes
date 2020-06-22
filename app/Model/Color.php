<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $table = 'colors';

    protected $fillable = ['name','code'];

    protected $dates=['deleted_at'];

    protected $primaryKey='id_color';
}
