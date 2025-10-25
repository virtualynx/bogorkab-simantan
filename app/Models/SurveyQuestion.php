<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use Auditable;
    
    protected $table = 'survey_question';

    protected $primaryKey = 'survey_question_id';

    protected $guarded = [];
}
