<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    protected $table = 'languages';

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['code', 'name', 'is_active'];

    protected $dates = ['deleted_at'];

    public function getTableColumns(){
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->table);
    }

    public $timestamps = false;

}
