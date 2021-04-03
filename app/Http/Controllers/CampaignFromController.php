<?php

namespace App\Http\Controllers;

use \Session;
use App\Models\CampaignFrom;
use Illuminate\Http\Request;

class CampaignFromController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $data['campaign_from'] = CampaignFrom::all(); 
        return view('admin.campaign.index', compact('data'));
    }

    public function create(){ 
        return view('admin.campaign.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'campaign_from' => 'required|max:30',
        ]);
        $campaign_from = new CampaignFrom([
            'campaign_from' => $request->get('campaign_from')
          ]); 
        $campaign_from->save();
        Session::flash('flash_message', 'Campaign from successfully created!');
        return redirect('admin/campaignfrom');
    }

    public function edit($id)
    {
        $data['campaign_from'] = CampaignFrom::find($id);

        return view('admin.campaign.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'campaign_from' => 'required|max:30',
        ]);

        $campaign_from = CampaignFrom::findOrFail($id);
        $campaign_from->update($validatedData);

        Session::flash('flash_message', 'Campaign from successfully updated!');

        return redirect()->route('campaignfrom.index');
    }

    public function destroy($id)
    {
        $campaign_from = CampaignFrom::findOrFail($id);
        $campaign_from->delete();
        
        $data['campaign_from'] = CampaignFrom::all(); 
        Session::flash('flash_message', 'Campaign from successfully deleted!');
        return redirect()->route('campaignfrom.index');
    }
}
