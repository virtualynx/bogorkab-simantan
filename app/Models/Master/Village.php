<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'master_villages';

    protected $primaryKey = 'village_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
