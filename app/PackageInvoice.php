<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageInvoice extends Model
{
    protected $guarded = ['id'];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
