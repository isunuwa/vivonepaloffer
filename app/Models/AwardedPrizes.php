<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardedPrizes extends Model
{
    protected $fillable = [
        'sales_customer_id', 'prize_title_id', 'date'
    ];

    public function salesCustomer()
    {
        return $this->belongsTo('App\Models\SalesCustomer');
    }

    public function prizeTitle()
    {
        return $this->belongsTo('App\Models\PrizeTitle');
    }
    
}
