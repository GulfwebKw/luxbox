<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table="languages";
    public function member()
    {
        return $this->hasMany(\App\Member::class);
    }
}
