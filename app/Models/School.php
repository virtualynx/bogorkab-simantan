<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuidPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasUuidPrimaryKey, Auditable;
    
    protected $table = 'school';

    protected $primaryKey = 'school_id';

    protected $guarded = [];
}
