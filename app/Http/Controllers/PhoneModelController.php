<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\PhoneModel;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['phone_model'] = PhoneModel::all(); 
        return view('admin.model.index', compact('data'));
    }

    public function create(){ 
        return view('admin.model.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'model' => 'required|max:30',
        ]);
        $phone_model = new PhoneModel([
            'model' => $request->get('model')
          ]); 
        $phone_model->save();
        Session::flash('flash_message', 'Phone model from successfully created!');
        return redirect('admin/phonemodel');
    }

    public function edit($id)
    {
        $data['phone_model'] = PhoneModel::find($id);

        return view('admin.model.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|max:30',
        ]);

        $phone_model = PhoneModel::findOrFail($id);
        $phone_model->update($validatedData);

        Session::flash('flash_message', 'Phone model from successfully updated!');

        return redirect()->route('phonemodel.index');
    }

    public function destroy($id)
    {
        $phone_model = PhoneModel::findOrFail($id);
        $phone_model->delete();
        
        $data['phone_model'] = PhoneModel::all(); 
        Session::flash('flash_message', 'Phone Model from successfully deleted!');
        return redirect()->route('phonemodel.index');
    }
}
