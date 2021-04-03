<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\PrizeTitle;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['prize'] = PrizeTitle::all(); 
        return view('admin.prize.index', compact('data'));
    }

    public function create(){ 
        return view('admin.prize.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'prize' => 'required|max:30',
            'prize_description' => 'required',
            'total_qty' => 'required',
            'balance_qty' => 'required',
        ]);
        $prize = new PrizeTitle([
            'prize' => $request->get('prize'),
            'prize_description' => $request->get('prize_description'),
            'total_qty' => $request->get('total_qty'),
            'balance_qty' => $request->get('balance_qty')
          ]); 
        $prize->save();
        Session::flash('flash_message', 'Prize successfully created!');
        return redirect('admin/prize');
    }

    public function edit($id)
    {
        $data['prize'] = PrizeTitle::find($id);

        return view('admin.prize.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'prize' => 'required|max:30',
            'prize_description' => 'required',
            'total_qty' => 'required',
            'balance_qty' => 'required',
        ]);

        $prize = PrizeTitle::findOrFail($id);
        $prize->update($validatedData);

        Session::flash('flash_message', 'Prize successfully updated!');

        return redirect()->route('prize.index');
    }

    public function destroy($id)
    {
        $prize = PrizeTitle::findOrFail($id);
        $prize->delete();
        
        Session::flash('flash_message', 'Prize successfully deleted!');
        return redirect()->route('prize.index');
    }
}
