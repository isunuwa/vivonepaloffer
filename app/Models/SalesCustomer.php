<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesCustomer extends Model
{
    protected $fillable = ['full_name', 'contact_no', 'sold_area', 'shop_name', 'prize_id' , 'campaign_from_id', 'phone_model_id'];

    // note: the table that has foreign key it belongs to a primary table
    public function campaignFrom()
    {
        return $this->belongsTo('App\Models\CampaignFrom');
    }
    
    public function phoneModel()
    {
        return $this->belongsTo('App\Models\PhoneModel');
    }

    public function prizeTitle()
    {
        return $this->belongsTo('App\Models\PrizeTitle');
    }

    public function awardedPrizes()
    {
        return $this->hasMany('App\Models\AwardedPrize');
    }

    public function imeis()
    {
        return $this->hasMany('App\Models\Imei');
    }
}
