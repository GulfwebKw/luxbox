<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = ['id'];
    private static $goodValueUpdateStatus = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function invoice()
    {
        return $this->hasOne(PackageInvoice::class);
    }

    public function canUpdateGoodValue()
    {
        if ( self::$goodValueUpdateStatus == []){
            self::$goodValueUpdateStatus = OrderStatus::where("can_edit_good_value", true)->get()->pluck('name');
        }
        if (in_array( $this->order_status , self::$goodValueUpdateStatus->toArray() )  )
            return true;
        return false;
    }

}
