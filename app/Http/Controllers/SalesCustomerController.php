<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\SalesCustomer;
use App\Models\CampaignFrom;
use App\Models\PhoneModel;
use App\Models\Imei;
use Illuminate\Http\Request;

class SalesCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['salescustomer'] = SalesCustomer::all();
        return view('admin.customer.index', compact('data'));
    }

    public function create(){ 
         
        $data['campaign_from'] = CampaignFrom::all();
        $data['phone_model'] = PhoneModel::all();
        // $data['imei'] = Imei::all(); 
        return view('admin.customer.create', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:40',
            'contact_no' => 'required|max:10',
            'sold_area' => 'required|max:30',
            'shop_name' => 'required|max:100',
            'imei' => 'required|max:30',
            'campaign_from_id' => 'required',
            'phone_model_id' => 'required'
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
        $customercontact = SalesCustomer::where('contact_no', $salescustomer['contact_no'])->get(['id']);
        
        $imei = [
            'imei' => $request->get('imei'),
            'sales_customer_id' => $customercontact[0]->id,
        ];
        $this->createCustomerIMEI($imei);

        Session::flash('flash_message', 'Customer successfully created!');
        // return View('home.spin');
        return redirect('admin/customer');
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
        $data['salescustomer'] = SalesCustomer::find($id);
        $data['campaign_from'] = CampaignFrom::all();
        $data['phone_model'] = PhoneModel::all();
        
        $customercontact = Imei::where('sales_customer_id', $data['salescustomer']->id)->first(['imei']);

        $data['imei'] = $customercontact['imei'];

        return view('admin.customer.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:40',
            'contact_no' => 'required|max:10',
            'sold_area' => 'required|max:30',
            'shop_name' => 'required|max:100',
            'campaign_from_id' => 'required',
            'phone_model_id' => 'required',
        ]);
        $validImeiData = $request->validate([
            'imei' => 'required|max:30',
        ]);
        // finding the primary id column
        $salescustomer = SalesCustomer::findOrFail($id);
        $customerIMEI = Imei::where('sales_customer_id', $salescustomer->id)->first(['id']);

        // dd($customerIMEI);
        // update the validted data
        $salescustomer->update($validatedData);
        $customerIMEI->update($validImeiData);

        Session::flash('flash_message', 'Customer successfully updated!');
        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $salescustomer = SalesCustomer::findOrFail($id);
        $customerIMEI = Imei::where('sales_customer_id', $salescustomer->id)->first(['id']);
        // dd($customerIMEI);
        $salescustomer->delete();
        $customerIMEI->delete();
        
        Session::flash('flash_message', 'Customer successfully deleted!');
        return redirect()->route('customer.index');
    }

    

}
