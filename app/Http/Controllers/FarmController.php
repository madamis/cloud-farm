<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmOwner;
use App\Models\FarmType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    protected array $rules = [
        'name'=>'required',
        'farm_type_id'=>'required',
        'unit_size_multiplier'=>'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmTypes = FarmType::all();
        $farms = Farm::all();
        $farm = new Farm();
        return view('admin.farms.index', compact('farm','farmTypes', 'farms'));
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
        $farm = new Farm();
        $farm->name = $request->name;
        $farm->farm_type_id = $request->farm_type_id;
        $farm->unit_size_multiplier = $request->unit_size_multiplier;

        if($farm->save()){
            $this->addFarmOwner($farm->id, 100.00);
            return redirect()->back()->with(['feedback'=>'successfully created farm', 'type'=>'success']);
        }else{
            return redirect()->back()->with(['feedback'=>'failed to create farm', 'type'=>'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Farm $farm)
    {
        return view('admin.farms.show', compact('farm'));
    }

    public function take(Farm $farm)
    {
        return json_encode(['title'=>$farm->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        $farmTypes = FarmType::all();
        return view('admin.farms.edit', compact('farm','farmTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farm)
    {
        $request->validate($this->rules);
        $farm->name = $request->name;
        $farm->unit_size_multiplier = $request->unit_size_multiplier;

        if($farm->save())
        {
            return redirect()->to('/admin/farms')->with(['feedback'=>'successfully updated','type'=>'success']);
        }
        else
        {
            return redirect()->back()->with(['feedback'=>'failed to update','type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farm)
    {
        $name = $farm->name;
        if($farm->delete()) {
            return redirect()->to('/admin/farms')->with(['feedback' => "successfully deleted $name", 'type' => 'success']);
        }else{
            return redirect()->to('/admin/farms')->with(['feedback' => "failed to delete $name ", 'type' => 'danger']);
        }
    }

    protected function addFarmOwner($farm_id, $percentage){
        $user_id = Auth::user()->id;
        $farmOwner = new FarmOwner();
        $farmOwner->farm_id = $farm_id;
        $farmOwner->user_id = $user_id;
        $farmOwner->percentage = $percentage;

        $farmOwner->save();
        return $farmOwner;
    }
}
