<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'master_regencies';

    protected $primaryKey = 'regency_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
