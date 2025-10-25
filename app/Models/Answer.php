<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuidPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasUuidPrimaryKey, Auditable;
    
    protected $table = 'answer';

    protected $primaryKey = 'answer_id';

    protected $guarded = [];
}
