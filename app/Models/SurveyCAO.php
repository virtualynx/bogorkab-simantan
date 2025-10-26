<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class SurveyCAO extends Model
{
    use Auditable;
    
    protected $table = 'survey_custom_answer_option';

    protected $primaryKey = 'survey_cao_id';

    protected $guarded = [];
}
