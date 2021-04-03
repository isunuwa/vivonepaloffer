<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    protected $fillable = [
        'model'
    ];

    // public function salesCustomer()
    // {
    //     return $this->belongsTo('App\Models\SalesCustomer');
    // }

    public function salesCustomers()
    {
        return $this->hasMany('App\Models\SalesCustomer');
    }
}
