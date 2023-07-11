<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected array $rules = [
        'name'=>'required',
        'duration'=>'required',
        'cost'=>'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at')->get();
        $activity = new Activity();
        $parentActivities = Activity::orderBy('name')->get();
        $previousActivities = Activity::orderBy('name')->get();
        return view('admin.activities.index', compact('activities', 'activity',
            'parentActivities', 'previousActivities'));
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
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->duration = $request->duration;
        $activity->cost = $request->cost;
        $activity->description = $request->description;
        $activity->parent_activity = $request->parent_activity;
        $activity->previous_activity = $request->previous_activity;

        if($activity->save()){
            return redirect()->back()->with(['feedback'=>'successfully created Activity', 'type'=>'success']);
        }else{
            return redirect()->back()->with(['feedback'=>'failed to create Activity', 'type'=>'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    public function take(Activity $activity)
    {
        return json_encode(['title'=>$activity->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $parentActivities = Activity::whereNot('id',$activity->id)->orderBy('name')->get();
        $previousActivities = Activity::whereNot('id',$activity->id)->orderBy('name')->get();
        return view('admin.activities.edit', compact('activity','parentActivities', 'previousActivities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate($this->rules);
        $activity->name = $request->name;
        $activity->duration = $request->duration;
        $activity->cost = $request->cost;
        $activity->description = $request->description;
        $activity->parent_activity = $request->parent_activity;
        $activity->previous_activity = $request->previous_activity;

        if($activity->save())
        {
            return redirect()->to('/admin/activities')->with(['feedback'=>'successfully updated','type'=>'success']);
        }
        else
        {
            return redirect()->back()->with(['feedback'=>'failed to update','type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $name = $activity->name;
        if($activity->delete()) {
            return redirect()->to('/admin/activities')->with(['feedback' => "successfully deleted $name", 'type' => 'success']);
        }else{
            return redirect()->to('/admin/activities')->with(['feedback' => "failed to delete $name ", 'type' => 'danger']);
        }
    }
}
