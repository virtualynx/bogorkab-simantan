<?php

namespace App\Models\Master;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class SpmLevel extends Model
{
    use Auditable;
    
    protected $table = 'spm_level';

    protected $primaryKey = 'spm_level_id';

    protected $guarded = [];
}
