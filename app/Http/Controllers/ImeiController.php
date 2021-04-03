<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\Imei;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['imeis'] = Imei::all(); 
        return view('admin.imei.index', compact('data'));
    }

    public function create(){ 
        return view('admin.imei.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'imei' => 'required|max:30',
            'sales_customer_id' => 'required'
        ]);
        $imei = [
            'imei' => $request->get('imei'),
            'sales_customer_id' => $request->get('sales_customer_id')
          ]; 
        $imei->save();
        Session::flash('flash_message', 'IMEI successfully created!');
        return redirect('admin/imei');
    }
    public function createIMEI(array $imei)
    {
        return Imei::create($imei);
    }

    public function edit($id)
    {
        $data['imei'] = Imei::find($id);

        return view('admin.imei.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'imei' => 'required|max:30',
            'sales_customer_id' => 'required'
        ]);

        $imei = Imei::findOrFail($id);
        $imei->update($validatedData);

        Session::flash('flash_message', 'IMEI successfully updated!');

        return redirect()->route('imei.index');
    }

    public function destroy($id)
    {
        $imei = Imei::findOrFail($id);
        $imei->delete();
        
        $data['imei'] = Imei::all(); 
        Session::flash('flash_message', 'IMEI successfully deleted!');
        return redirect()->route('imei.index');
    }
}
