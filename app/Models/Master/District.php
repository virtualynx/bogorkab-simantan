<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'master_districts';

    protected $primaryKey = 'district_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
