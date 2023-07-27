<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

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
        if (in_array( $this->order_status , (array) self::$goodValueUpdateStatus)  )
            return true;
        return false;
    }

}
