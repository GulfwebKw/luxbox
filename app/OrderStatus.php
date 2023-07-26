<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $guarded = ['id'];
    protected $casts=[
        'can_edit_good_value'=>'boolean',
        'show_in_shiped_package'=>'boolean',
        'show_in_received_package'=>'boolean',
    ];
}
