<?php

namespace App\Http\Controllers;


use \DB;
use \Session;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CampaignFrom;
use App\Models\PhoneModel;
use App\Models\Imei;
use App\Models\PrizeTitle;
use App\Models\PrizeDate;
use App\Models\SalesCustomer;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getIndex()
    {
        $data['campaign_from'] = CampaignFrom::all(); 
        $data['phone_model'] = PhoneModel::all(); 
        return view('home/index', compact('data'));
    }

    public function postIndex(Request $request){
        // dd($request);
        $validData = $this->validate($request, [
            'full_name' => 'required|max:40',
            'contact_no' => 'required|max:10',
            'sold_area' => 'required|max:30',
            'shop_name' => 'required|max:100',
            'imei_no' => 'required|max:30',
            'campaign_from_id' => 'required',
            'phone_model_id' => 'required'
        ]);
        
        $data = [
            'full_name' => $request->input('full_name'),
            'contact_no'    => $request->input('contact_no'),
            'shop_name'    => $request->input('shop_name'),
            'sold_area'   =>  $request->input('sold_area'),
            'phone_model_id' => $request->input('phone_model_id'),
            'campaign_from_id'   => $request->input('campaign_from_id'),
        ];
        $this->createSoldCustomer($data);

        $salesCustomerID = SalesCustomer::where('contact_no', $data['contact_no'])->get(['id']);
        
        $imei = [
            'imei' => $request->input('imei_no'),
            'sales_customer_id' => $salesCustomerID[0]->id,
        ];
        
        $this->createCustomerIMEI($imei);
        
        // got to spin page with the prize titles and data
        $data['prize_titles'] = PrizeTitle::all(); 
        $data['prize_dates'] = PrizeDate::all();
        // dd($customercontactID); 
        return View('home.spin', compact('data', 'salesCustomerID'));
        
    }

    protected function createSoldCustomer(array $data)
    {
        return SalesCustomer::create($data);
    }

    protected function createCustomerIMEI(array $imei)
    {
        return Imei::create($imei);
    }

}
