<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmType;
use Illuminate\Http\Request;

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
        $farms = Farm::all();
        $farmTypes = FarmType::all();
        return view('admin.farms.index', compact('farms','farmTypes'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farm)
    {
        //
    }
}
