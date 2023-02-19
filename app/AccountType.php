<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    public $table="account_types";
    public function member()
    {
        return $this->hasMany(\App\Member::class);
    }
}
