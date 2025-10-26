<?php

namespace App\Traits;

trait Auditable
{
    /**
     * Boot the auditable trait for a model.
     */
    protected static function bootAuditable(): void
    {
        static::creating(function ($model) {
            $userinfo = session()->get('userlogin');
            if(!empty($userinfo)){
                $model->created_by = $userinfo->user_id;
            }

            $model->updated_at = null;
        });

        static::updating(function ($model) {
            $userinfo = session()->get('userlogin');
            if(!empty($userinfo)){
                $model->updated_by = $userinfo->user_id;
            }
        });
    }
}