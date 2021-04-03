<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeDate extends Model
{
    protected $fillable = [
        'date', 'total_qty', 'balance_qty',
    ];
}
