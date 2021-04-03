<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeTitle extends Model
{
    protected $fillable = [
        'prize', 'prize_description', 'total_qty', 'balance_qty'
    ];

    public function salesCustomers()
    {
        return $this->hasMany('App\Models\SalesCustomer');
    }

    public function awardedPrizes()
    {
        return $this->hasMany('App\Models\AwardedPrize');
    }
}
