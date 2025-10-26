<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'master_provinces';

    protected $primaryKey = 'province_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
