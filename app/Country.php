<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = "gwc_countries";


    /**
     * The country has many cities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(\App\City::class);
    }
    public function member()
    {
        return $this->hasMany(\App\Member::class);
    }
}
