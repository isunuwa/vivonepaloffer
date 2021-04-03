<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\PrizeDate;
use Illuminate\Http\Request;

class PrizeDateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['prizedate'] = PrizeDate::all(); 
        return view('admin.prizedate.index', compact('data'));
    }

    public function create(){ 
        return view('admin.prizedate.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date|date_format:Y-m-d',
            'total_qty' => 'required',
            'balance_qty' => 'required',
        ]);
        $prizedate = new PrizeDate([
            'date' => $request->get('date'),
            'total_qty' => $request->get('total_qty'),
            'balance_qty' => $request->get('balance_qty')
          ]); 
        $prizedate->save();
        Session::flash('flash_message', 'Prize Date successfully created!');
        return redirect('admin/prizedate');
    }

    public function edit($id)
    {
        $data['prizedate'] = PrizeDate::find($id);

        return view('admin.prizedate.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
            'total_qty' => 'required',
            'balance_qty' => 'required',
        ]);

        $prizedate = PrizeDate::findOrFail($id);
        $prizedate->update($validatedData);

        Session::flash('flash_message', 'Prize Date successfully updated!');

        return redirect()->route('prizedate.index');
    }

    public function destroy($id)
    {
        $prizedate = PrizeDate::findOrFail($id);
        $prizedate->delete();

        Session::flash('flash_message', 'Prize Date successfully deleted!');
        return redirect()->route('prizedate.index');
    }
}
