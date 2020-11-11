<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_permission extends Model
{
    public function permissions()
    {
        return $this->belongsTo(Permission::class,'permission_id');
    }
}
