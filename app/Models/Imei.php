<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    protected $fillable = ['imei', 'sales_customer_id'];

    public function salesCustomer()
    {
        return $this->belongsTo('App\Models\SalesCustomer');
    }
}
