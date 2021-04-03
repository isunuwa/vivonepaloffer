<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\AwardedPrizes;
use App\Models\SalesCustomer;
use App\Models\CampaignFrom;
use App\Models\PrizeTitle;
use App\Models\PhoneModel;
use App\Models\PrizeDate;
use App\Models\Imei;
use Illuminate\Http\Request;

class AwardedPrizesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['awardedprizes'] = AwardedPrizes::all();  
        return view('admin.winner.index', compact('data'));
    }

    public function create(){ 
        $data['awardedprizes'] = AwardedPrizes::all(); 
        $data['campaign_from'] = CampaignFrom::all(); 
        $data['phone_model'] = PhoneModel::all(); 
        $data['prize_title'] = PrizeTitle::all();
        return view('admin.winner.create', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:40',
            'contact_no' => 'required|max:10',
            'sold_area' => 'required|max:30',
            'shop_name' => 'required|max:100',
            'imei' => 'required|max:30',
            'campaign_from_id' => 'required',
            'phone_model_id' => 'required',
            'prize_title' => 'required',
            'date' => 'required|date|date_format:Y-m-d'
        ]);

        $salescustomer = [
            'full_name' => $request->get('full_name'),
            'contact_no' => $request->get('contact_no'),
            'sold_area' => $request->get('sold_area'),
            'shop_name' => $request->get('shop_name'),
            'campaign_from_id' => $request->get('campaign_from_id'),
            'phone_model_id' => $request->get('phone_model_id')
          ]; 
          
        $this->createSalesCustomer($salescustomer);
        
        // accesing customer row after saving and saving imei
        $customercontact = SalesCustomer::where('contact_no', $salescustomer['contact_no'])->get(['id']);

        // assigneing to an array for imei and award winner
        $imei = [
            'imei' => $request->get('imei'),
            'sales_customer_id' => $customercontact[0]->id,
        ];
        $prizewinner = [
            'sales_customer_id' => $customercontact[0]->id,
            'prize_title_id' =>  $request->get('prize_title'),
            'date' => $request->get('date')
        ];

        // create method called
        $this->createCustomerIMEI($imei);
        $this->createWinner($prizewinner);

        Session::flash('flash_message', 'Winner successfully created!');
        return redirect('admin/awardedprize');
    }

    protected function createWinner(array $prizewinner)
    {
        return AwardedPrizes::create($prizewinner);
    }

    protected function createSalesCustomer(array $salescustomer)
    {
        return SalesCustomer::create($salescustomer);
    }

    protected function createCustomerIMEI(array $imei)
    {
        return Imei::create($imei);
    }

    public function edit($id)
    {
        $data['awarded_prizes'] = AwardedPrizes::find($id);
        // dd($data['awarded_prizes']);
        $data['campaign_from'] = CampaignFrom::all();
        
        $data['sales_customer'] = SalesCustomer::all(); 
        $customercontact = Imei::where('sales_customer_id', $data['awarded_prizes']->sales_customer_id)->first(['imei']);

        $data['imei'] = $customercontact['imei'];
        // dd($data['imei']);

        $data['phone_model'] = PhoneModel::all(); 
        $data['prize_title'] = PrizeTitle::all();

        return view('admin.winner.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedWinner = $request->validate([
            'prize_title' => 'required|max:30',
            'date' => 'required|date|date_format:Y-m-d'
        ]);
        
        $validatedCustomer = $request->validate([
            'full_name' => 'required|max:40',
            'contact_no' => 'required|max:10',
            'sold_area' => 'required|max:30',
            'shop_name' => 'required|max:100',
            'campaign_from_id' => 'required',
            'phone_model_id' => 'required',
        ]);

        $validatedIMEI = $request->validate([
            'imei' => 'required|max:30',
        ]); 
        
        // find the particular row and update
        $awardedprizes = AwardedPrizes::findOrFail($id);
        $customerId = $awardedprizes->sales_customer_id;
        $customerInfo = SalesCustomer::where('id', $customerId)->first(['id']);
        $customerIMEI = Imei::where('sales_customer_id', $customerId)->first(['id']);

        // dd($awardedprizes, $customerInfo, $customerIMEI);
        $awardedprizes->update($validatedWinner);
        $customerInfo->update($validatedCustomer);
        $customerIMEI->update($validatedIMEI);
    

        Session::flash('flash_message', 'Winner successfully updated!');

        return redirect()->route('awardedprize.index');
    }

    public function destroy($id)
    {
        $awardedprizes = AwardedPrizes::findOrFail($id);
        
        $customerId = $awardedprizes->sales_customer_id;
        $customerInfo = SalesCustomer::where('id', $customerId)->first(['id']);
        $customerIMEI = Imei::where('sales_customer_id', $customerId)->first(['id']);

        $awardedprizes->delete();
        $customerInfo->delete();
        $customerIMEI->delete();

        Session::flash('flash_message', 'Winner successfully deleted!');
        return redirect()->route('awardedprize.index');
    }
}
