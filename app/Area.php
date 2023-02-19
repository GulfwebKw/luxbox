<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = "gwc_areas";

    /**
     * The area belongsTo a certain city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(\App\City::class);
    }
}
