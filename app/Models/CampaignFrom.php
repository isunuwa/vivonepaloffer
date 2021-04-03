<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignFrom extends Model
{
    protected $fillable = ['campaign_from'];

    public function salesCustomers()
    {
        return $this->hasMany('App\Models\SalesCustomers');
    }
    
}
