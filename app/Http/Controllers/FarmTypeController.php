<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\FarmTypeActivity;
use App\Models\FarmType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FarmTypeController extends Controller
{
    protected array $rules = [
        'name'=>'required',
        'unit'=>'required',
        'unit_size'=>'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $farmType = new FarmType();
        $farm_types = FarmType::all();
        return view('admin.farm_types.index', compact('farm_types', 'farmType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $farm_type = new FarmType();
        $farm_type->name = $request->name;
        $farm_type->unit = $request->unit;
        $farm_type->unit_size = $request->unit_size;
        $farm_type->description = $request->description;

        if($farm_type->save())
        {
            return redirect()->back()->with(['feedback'=>'successfully created','type'=>'success']);
        }
        else
        {
            return redirect()->back()->with(['feedback'=>'failed to create','type'=>'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmType $farmType)
    {
        //
    }

    public function take(FarmType $farmType)
    {
        return json_encode(['title'=>$farmType->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmType $farmType)
    {
        return view('admin.farm_types.edit', compact('farmType'));
    }

    /**
     * Show the page for editing activities of the specified resource.
     */
    public function activities(FarmType $farmType)
    {
        $allocatedActivitiesIDs = $farmType->farmTypeActivities()->pluck('activity_id');
        $possibleActivities = Activity::whereNotIn('id',$allocatedActivitiesIDs)->get();
//        dd($farmType->activities());
        return view('admin.farm_types.activities', compact('farmType','possibleActivities'));
    }

    public function postFarmActivity(Request $request, FarmType $farmType)
    {
        $request->validate([
            'activity'=>'required'
        ]);
        $lastPosition = FarmTypeActivity::where('farm_type_id', $farmType->id)->max('position');
        $position = $lastPosition++ ? $lastPosition : 1;

        $farmActivity = new FarmTypeActivity();
        $farmActivity->farm_type_id = $farmType->id;
        $farmActivity->activity_id = $request->activity;
        $farmActivity->position = $position;
        $farmActivity->cost = $request->cost;
        $farmActivity->description = $request->description;

        if($farmActivity->save())
        {
            return redirect()->back()->with(['feedback'=>'successfully added activity','type'=>'success']);
        }
        return redirect()->back()->with(['feedback'=>'failed to add activity','type'=>'warning']);



    }

    public function takeFarmTypeActivity(FarmTypeActivity $farmTypeActivity)
    {
        $farmTypeName = $farmTypeActivity->farmType->name;
        $activityName = $farmTypeActivity->activity->name;
        return json_encode(['title'=>"$activityName for $farmTypeName"]);
    }

    public function deleteFarmTypeActivity(FarmTypeActivity $farmTypeActivity)
    {
        $name = $farmTypeActivity->activity->name ." for ". $farmTypeActivity->farmType->name;
        $id = $farmTypeActivity->farmType->id;
        if($farmTypeActivity->delete()) {
            return redirect()->to("/admin/farm_types/activities/$id")->with(['feedback' => "successfully deleted $name", 'type' => 'success']);
        }else{
            return redirect()->to("/admin/farm_types/activities/$id")->with(['feedback' => "failed to delete $name ", 'type' => 'danger']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmType $farmType)
    {
        $request->validate($this->rules);
        $farmType->name = $request->name;
        $farmType->unit = $request->unit;
        $farmType->unit_size = $request->unit_size;
        $farmType->description = $request->description;

        if($farmType->save())
        {
            return redirect()->to('/admin/farm_types')->with(['feedback'=>'successfully updated','type'=>'success']);
        }
        else
        {
            return redirect()->back()->with(['feedback'=>'failed to update','type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmType $farmType)
    {
        $name = $farmType->name;
        if($farmType->delete()) {
            return redirect()->to('/admin/farm_types')->with(['feedback' => "successfully deleted $name", 'type' => 'success']);
        }else{
            return redirect()->to('/admin/farm_types')->with(['feedback' => "failed to delete $name ", 'type' => 'danger']);
        }
    }
}
