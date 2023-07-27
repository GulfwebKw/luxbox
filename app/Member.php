<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;
    protected $table="members";
    protected $guard = 'member';
    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function accountType()
    {
        return $this->belongsTo('App\AccountType','account_type_id');
    }
    public function language()
    {
        return $this->belongsTo('App\Language','lang_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function getAddress()
    {
        return $this->country->title_en .', ' . $this->city->title_en . ', ' . $this->area->title_en . ', block ' .
         $this->block . ', street ' . $this->street . ', avenue ' . $this->avenue;
    }

    public function getISOCODE()
    {
        return $this->country->iso_code .'-' . $this->id ;
    }


    public function getFullnameAttribute()
    {
        return $this->first_name . ' '. $this->last_name;
    }

    public function getFullnameeAttribute()
    {
        return $this->first_name . ' '. $this->last_name . '-' . $this->mobile;
    }

    public function invoices()
    {
        return $this->hasMany(PackageInvoice::class);
    }
}
